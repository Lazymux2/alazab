<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DenyOrderEmailNotification extends Notification implements ShouldQueue
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
        return (new MailMessage)->error()->subject(__('Alazab.TR||Oredre Deny||رفض طلب '))
        ->line(__('عذرا عزيزنا العميل').$this->data['uname'])
        ->line(__('تم رفض طلبك   ['.$this->data['pro_name'].']   وذلك بسبب بعض الاسباب'))
        ->line(__('يمكنك اعادة ارسال الطلب عن طريق الرابط التالي'))
                    ->action('اعد ارسال الطلب', $this->data['urll'])
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
