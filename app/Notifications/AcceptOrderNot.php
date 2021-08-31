<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcceptOrderNot extends Notification implements ShouldQueue
{
    use Queueable;

    public $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data=$data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject(__('Alazab.TR||Accepted order||قبول طلبك '))->greeting('تهانينا')
        ->line(__('اهلا عزيزنا العميل').$this->data['uname'])
        ->line(__('لقد نم قبول طلبك ل  ['.$this->data['pro_name'].']'))
        ->line(__('يرجى التواصل معنا ب احد الطرق التالية'))
        ->line('Email:'.$this->data['ad_email'])
        ->line('Phone :'.$this->data['ad_phone'])
                    ->action('عرض الطلب', $this->data['urll'])
                    ->line('Thank you for using our WebSite!')->salutation(config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
