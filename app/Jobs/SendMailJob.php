<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $dataMail;
    protected $dataUser;
    public function __construct($dataMail,$dataUser)
    {
        $this->dataMail = $dataMail;
        $this->dataUser = $dataUser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $dataUser['email'];

        Mail::to($dataUser['email'])->send(new SendMail($dataMail));
        session(
            [
                "fullname" => $dataMail['fullname'],
                // "code_order" => $code_order,
                // "qty_empty" => $qty_empty,
                // "price_empty" => $price_empty,
                // "sub_total_empty" => $sub_total_empty,
                // "total_price" => $total_price,
                // "name_customer" => $name_customer,
                // "email_customer" => $email_customer,
                // "address_customer" => $address_customer,
                // "phone_customer" => $phone_customer
            ]
        );

    }

}