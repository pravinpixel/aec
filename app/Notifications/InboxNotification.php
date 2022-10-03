<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Kutia\Larafirebase\Messages\FirebaseMessage;
use Illuminate\Notifications\Notification;

class InboxNotification extends Notification
{
    use Queueable;

    protected $title;
    protected $message;
    protected $link;
    protected $fcmTokens;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($title,$message,$link,$fcmTokens)
    {
        $this->title     = $title;
        $this->message   = $message;
        $this->link      = $link;
        $this->fcmTokens = $fcmTokens;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['firebase'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toFirebase($notifiable)
    {
        return (new FirebaseMessage)
        ->withImage('https://firebase.google.com/images/social.png')
        ->withIcon('https://seeklogo.com/images/F/firebase-logo-402F407EE0-seeklogo.com.png')
        ->withTitle($this->title)
        ->withBody($this->message)
        ->withPriority('high') 
        ->withClickAction($this->link)
        ->asMessage($this->fcmTokens);
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
