<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderEmailNot extends Notification implements ShouldQueue
{
    use Queueable;

    
    public $details;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //
        $this->details=$details;
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
        ->markdown('emails.orderemail',[ 
            'u_name'=>$this->details['u_name'],
        'email'=>$this->details['email'],
        'phone'=>$this->details['phone'],
        'pro_name'=>$this->details['pro_name'],
        'count'=>$this->details['count'],
        'loc'=>"https://www.google.com/maps?q=".$this->details['loc'],
        'price'=>$this->details['price'],
        'mess'=>$this->details['mess'],


        ])
        ->subject('Alazab.TR||NewOredr');
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
