<?php

namespace App\Notifications;

use App\Models\Camp;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CampStatusChange extends Notification {
    use Queueable;

    public Camp $camp;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Camp $camp) {
        $this->camp = $camp;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        return (new MailMessage)
            ->subject('營隊狀態更新')
            ->line('營隊狀態已變更')
            ->action('查看營隊前端', "https://camp.university.tw/camp/{$this->camp->id}")
            ->line("審核意見： {$this->camp->comment}")
            ->line('感謝您使用營隊搜尋平台');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
            //
        ];
    }
}
