<?php

namespace Zerp\Telegram\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Zerp\Documents\Events\CreateDocument;
use Zerp\Telegram\Services\SendMsg;

class CreateDocumentLis
{
    public function __construct()
    {
        //
    }

    public function handle(CreateDocument $event)
    {
        $documents = $event->document;
        $assignedUsers = $documents->assignedUsers->pluck('name');
        $user = implode(', ', $assignedUsers->toArray());

        if (company_setting('Telegram New Document')  == 'on') {

            $uArr = [
                'name'      => $documents->subject,
                'user_name' => !empty($user) ? $user : '-'
            ];
            SendMsg::SendMsgs($uArr , 'New Document');
        }
    }
}
