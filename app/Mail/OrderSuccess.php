<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $dataMail;
    public function __construct($dataMail)
    {
        $this->dataMail=$dataMail;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.sendMail')->from('josephminhlnog@gmail.com', 'LARAVEL THOITRANG')->subject('[LARAVEL THOITRANG SHOP] Thư xác nhận đơn hàng')-> with($this->dataMail);

    }
}
