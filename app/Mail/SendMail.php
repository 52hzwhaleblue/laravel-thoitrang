<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
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
        return $this->view('mails.sendMail')->from('laravel.serve123@gmail.com', 'THỜI TRANG C665')->subject('[CỬA HÀNG THỜI TRANG C665] Thư xác nhận đơn hàng')-> with($this->dataMail);

    }
}
