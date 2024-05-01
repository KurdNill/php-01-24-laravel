<?php

namespace App\Notifications\Admin;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    public function viaQueues()
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(User $user): array
    {
        return $user->telegram_id ? ['telegram', 'mail'] : ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toTelegram($notifiable)
    {
        $url = url('/invoice/'.$this->invoice->id);

        //        return TelegramMessage::create()
        //            // Optional recipient user id.
        //            ->to($notifiable->telegram_user_id)
        //            // Markdown supported.
        //            ->content('Hello there!')
        //            ->line('Your invoice has been *PAID*')
        //            ->lineIf($notifiable->amount > 0, "Amount paid: {$notifiable->amount}")
        //            ->line('Thank you!')
        //
        //            // (Optional) Blade template for the content.
        //            // ->view('notification', ['url' => $url])
        //
        //            // (Optional) Inline Buttons
        //            ->button('View Invoice', $url)
        //            ->button('Download Invoice', $url)
        //            // (Optional) Inline Button with callback. You can handle callback in your bot instance
        //            ->buttonWithCallback('Confirm', 'confirm_invoice '.$this->invoice->id);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
