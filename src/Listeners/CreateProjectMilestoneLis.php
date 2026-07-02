<?php

namespace Zerp\Telegram\Listeners;

use Zerp\Telegram\Services\SendMsg;
use Zerp\Taskly\Events\CreateProjectMilestone;


class CreateProjectMilestoneLis
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CreateProjectMilestone $event)
    {
        if(company_setting('Telegram New Milestone')  == 'on')
        {
                $uArr = [];
                SendMsg::SendMsgs($uArr , 'New Milestone');
        }
    }
}
