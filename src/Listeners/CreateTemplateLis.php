<?php

namespace Zerp\Telegram\Listeners;

use Zerp\Feedback\Events\CreateTemplate;
use Zerp\Feedback\Models\TemplateModule;
use Zerp\Telegram\Services\SendMsg;

class CreateTemplateLis
{
    public function __construct()
    {
        //
    }

    public function handle(CreateTemplate $event)
    {
        $templates = $event->template;
        $module    = TemplateModule::find($templates->module);
        if (company_setting('Telegram New Template')  == 'on') {
            if(!empty($module))
            {
                $uArr = [
                    'submodule_name' => $module->submodule,
                    'module_name'    => $module->module,
                ];
            }

            SendMsg::SendMsgs($uArr , 'New Template');
        }
    }
}
