<?php

namespace Zerp\Telegram\Listeners;

use Workdo\School\Events\CreateSubject;
use Zerp\Telegram\Services\SendMsg;

class CreateSubjectLis
{
    public function __construct()
    {
        //
    }

    public function handle(CreateSubject $event)
    {
        $subject = $event->subject;
        if (company_setting('Telegram New Subject')  == 'on') {

            $uArr = [
                'subject_name' => $subject->name,
            ];
            SendMsg::SendMsgs($uArr , 'New Subject');
        }
    }
}
