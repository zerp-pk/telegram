<?php

namespace Zerp\Telegram\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Zerp\HospitalManagement\Events\CreateHospitalDoctor;
use Zerp\HospitalManagement\Models\HospitalSpecialization;
use Zerp\Telegram\Services\SendMsg;

class CreateHospitalDoctorLis
{
    public function __construct()
    {
        //
    }

    public function handle(CreateHospitalDoctor $event)
    {
        $doctor = $event->hospitaldoctor;
        $specialization = HospitalSpecialization::find($doctor->hospital_specialization_id);
        if (company_setting('Telegram New Doctor')  == 'on') {

            if(!empty($specialization))
            {
                $uArr = [
                    'doctor_name'    => $doctor->user->name,
                    'specialization' => $specialization->name
                ];
                SendMsg::SendMsgs($uArr , 'New Doctor');
            }
        }
    }
}
