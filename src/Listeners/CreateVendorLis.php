<?php

namespace Zerp\Telegram\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Zerp\Account\Events\CreateVendor;
use Zerp\Telegram\Services\SendMsg;

class CreateVendorLis
{
    public function __construct()
    {
        //
    }

    public function handle(CreateVendor $event)
    {
        if(company_setting('Telegram New Vendor')  == 'on')
        {
            $uArr = [];

            SendMsg::SendMsgs($uArr , 'New Vendor');
        }
    }
}
