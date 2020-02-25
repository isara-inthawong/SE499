<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetPassword extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
            ->greeting(Lang::get('เรียนคุณ ' . $notifiable->getEmailForPasswordReset() . ','))
            ->subject(Lang::get('แจ้งเตือนการรีเซ็ตรหัสผ่าน'))
            ->line(Lang::get('คุณได้รับอีเมลนี้เนื่องจากเราได้รับคำขอรีเซ็ตรหัสผ่านสำหรับบัญชีของคุณ.'))
            ->action(Lang::get('เซ็ตรหัสผ่าน'), url(config('app.url') . route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false)))
            ->line(Lang::get('ลิงก์รีเซ็ตรหัสผ่านนี้จะหมดอายุใน :count นาที.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
            ->line(Lang::get('หากคุณไม่ได้ร้องขอการรีเซ็ตรหัสผ่านคุณไม่จำเป็นต้องดำเนินการใด ๆ อีก.'))
            ->line(Lang::get('ของเเสดงความนับถือ,'))
            ->salutation(Lang::get(config('app.name')));
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
