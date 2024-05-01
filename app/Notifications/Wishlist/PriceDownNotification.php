<?php

namespace App\Notifications\Wishlist;

use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PriceDownNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public readonly Product $product)
    {
        $this->onQueue('wishilist-notify');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // [toMail, toTelegram, toSlack]
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(User $user): MailMessage
    {
        return (new MailMessage)
            ->line('Hey, '.$user->name.' '.$user->lastname)
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    //    /**
    //     * Get the array representation of the notification.
    //     *
    //     * @return array<string, mixed>
    //     */
    //    public function toArray(object $notifiable): array
    //    {
    //        return [
    //            //
    //        ];
    //    }
}
