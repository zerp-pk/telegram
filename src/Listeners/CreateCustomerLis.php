<?php

namespace Zerp\Telegram\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Zerp\Account\Events\CreateCustomer;
use Zerp\Telegram\Services\SendMsg;

class CreateCustomerLis
{
    public function __construct()
    {
        //
    }

    public function handle(CreateCustomer $event)
    {
        if(company_setting('Telegram New Customer')  == 'on')
        {
            $uArr = [];

            SendMsg::SendMsgs($uArr , 'New Customer');
        }
    }
}
