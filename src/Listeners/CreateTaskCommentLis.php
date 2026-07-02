<?php

namespace Zerp\Telegram\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Zerp\Taskly\Events\CreateTaskComment;
use Zerp\Taskly\Models\ProjectTask;
use Zerp\Telegram\Services\SendMsg;

class CreateTaskCommentLis
{
    public function __construct()
    {
        //
    }

    public function handle(CreateTaskComment $event)
    {
        if(company_setting('Telegram New Task Comment')  == 'on')
        {
            $comment = $event->comment;
            if(!empty($comment))
            {
                $task = ProjectTask::where('id',$comment->task_id)->first();
                $uArr = [
                    'task_name' => $task->title,
                ];
                SendMsg::SendMsgs($uArr , 'New Task Comment');
            }
        }
    }
}
