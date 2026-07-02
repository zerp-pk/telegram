<?php

namespace Zerp\Telegram\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Zerp\FixEquipment\Events\CreateFixEquipmentLicense;
use Zerp\FixEquipment\Models\FixEquipmentAsset;
use Zerp\Telegram\Services\SendMsg;

class CreateFixEquipmentLicenseLis
{
    public function __construct()
    {
        //
    }

    public function handle(CreateFixEquipmentLicense $event)
    {
        $license = $event->fixEquipmentLicense;
        $asset   = FixEquipmentAsset::find($license->asset_id);

        if (company_setting('Telegram New Licence')  == 'on') {

            $uArr = [
                'name'   => $license->title,
                'assets' => $asset->asset_name
            ];
            SendMsg::SendMsgs($uArr , 'New Licence');
        }
    }
}
