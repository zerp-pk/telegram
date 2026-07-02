<?php

namespace Zerp\Telegram\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Events\CreateUser;
use Zerp\Telegram\Listeners\CreateUserLis;

use App\Events\CreatePurchaseInvoice;
use Zerp\Telegram\Listeners\CreatePurchaseInvoiceLis;

use Zerp\Appointment\Events\AppointmentStatus;
use Zerp\Telegram\Listeners\AppointmentStatusLis;

use Zerp\Appointment\Events\CreateSchedule;
use Zerp\Telegram\Listeners\CreateScheduleLis;

use Zerp\CMMS\Events\CreateComponent;
use Zerp\Telegram\Listeners\CreateComponentLis;

use Zerp\CMMS\Events\CreateLocation;
use Zerp\Telegram\Listeners\CreateLocationLis;

use Zerp\CMMS\Events\CreateSupplier;
use Zerp\Telegram\Listeners\CreateSupplierLis;

use Zerp\CMMS\Events\CreatePreventiveMaintenance;
use Zerp\Telegram\Listeners\CreatePreventiveMaintenanceLis;

use Zerp\CMMS\Events\CreateCmmsPos;
use Zerp\Telegram\Listeners\CreateCmmsPosLis;

use Zerp\CMMS\Events\CreateWorkOrder;
use Zerp\Telegram\Listeners\CreateWorkorderLis;

use Zerp\CMMS\Events\CreateWorkRequest;
use Zerp\Telegram\Listeners\CreateWorkRequestLis;

use Zerp\Contract\Events\CreateContract;
use Zerp\Telegram\Listeners\CreateContractLis;

use Zerp\Lead\Events\CreateLead;
use Zerp\Telegram\Listeners\CreateLeadLis;

use Zerp\Lead\Events\LeadConvertDeal;
use Zerp\Telegram\Listeners\LeadConvertDealLis;

use Zerp\Lead\Events\CreateDeal;
use Zerp\Telegram\Listeners\CreateDealLis;

use Zerp\Lead\Events\LeadMoved;
use Zerp\Telegram\Listeners\LeadMovedLis;

use Zerp\Lead\Events\DealMoved;
use Zerp\Telegram\Listeners\DealMovedLis;

use Zerp\Sales\Events\CreateSalesQuote;
use Zerp\Telegram\Listeners\CreateSalesQuoteLis;

use Zerp\Sales\Events\CreateSalesOrder;
use Zerp\Telegram\Listeners\CreateSalesOrderLis;

use App\Events\CreateSalesInvoice;
use Zerp\Telegram\Listeners\CreateSalesInvoiceLis;

use App\Events\CreateSalesProposal;
use Zerp\Telegram\Listeners\CreateSalesProposalLis;

use App\Events\CreateWarehouse;
use Zerp\Telegram\Listeners\CreateWarehouseLis;

use App\Events\PostSalesInvoice;
use Zerp\Telegram\Listeners\PostSalesInvoiceLis;

use App\Events\SentSalesProposal;
use Zerp\Telegram\Listeners\SentSalesProposalLis;

use Zerp\Account\Events\CreateBankTransfer;
use Zerp\Telegram\Listeners\CreateBankTransferLis;

use Zerp\Account\Events\CreateCustomer;
use Zerp\Telegram\Listeners\CreateCustomerLis;

use Zerp\Account\Events\CreateRevenue;
use Zerp\Telegram\Listeners\CreateRevenueLis;

use Zerp\Account\Events\CreateVendor;
use Zerp\Telegram\Listeners\CreateVendorLis;

use Zerp\Sales\Events\CreateSalesMeeting;
use Zerp\Telegram\Listeners\CreateSalesMeetingLis;

use Zerp\Taskly\Events\CreateProject;
use Zerp\Telegram\Listeners\CreateProjectLis;

use Zerp\Taskly\Events\CreateProjectTask;
use Zerp\Telegram\Listeners\CreateProjectTaskLis;

use Zerp\Taskly\Events\CreateProjectBug;
use Zerp\Telegram\Listeners\CreateProjectBugLis;

use Zerp\Taskly\Events\CreateProjectMilestone;
use Zerp\Telegram\Listeners\CreateProjectMilestoneLis;

use Zerp\Taskly\Events\UpdateProjectTaskStage;
use Zerp\Telegram\Listeners\UpdateProjectTaskStageLis;

use Zerp\Taskly\Events\CreateTaskComment;
use Zerp\Telegram\Listeners\CreateTaskCommentLis;

use Zerp\ZoomMeeting\Events\CreateZoomMeeting;
use Zerp\Telegram\Listeners\CreateZoommeetingLis;

use Zerp\FixEquipment\Events\CreateFixEquipmentAccessory;
use Zerp\Telegram\Listeners\CreateFixEquipmentAccessoryLis;

use Zerp\FixEquipment\Events\CreateFixEquipmentAsset;
use Zerp\Telegram\Listeners\CreateFixEquipmentAssetLis;

use Zerp\FixEquipment\Events\CreateFixEquipmentAudit;
use Zerp\Telegram\Listeners\CreateFixEquipmentAuditLis;

use Zerp\FixEquipment\Events\CreateFixEquipmentComponent;
use Zerp\Telegram\Listeners\CreateFixEquipmentComponentLis;

use Zerp\FixEquipment\Events\CreateFixEquipmentConsumable;
use Zerp\Telegram\Listeners\CreateFixEquipmentConsumableLis;

use Zerp\FixEquipment\Events\CreateFixEquipmentLicense;
use Zerp\Telegram\Listeners\CreateFixEquipmentLicenseLis;

use Zerp\FixEquipment\Events\CreateFixEquipmentLocation;
use Zerp\Telegram\Listeners\CreateFixEquipmentLocationLis;

use Zerp\FixEquipment\Events\CreateFixEquipmentMaintenance;
use Zerp\Telegram\Listeners\CreateFixEquipmentMaintenanceLis;

use Zerp\Feedback\Events\CreateHistory;
use Zerp\Telegram\Listeners\CreateHistoryLis;

use Zerp\Feedback\Events\CreateTemplate;
use Zerp\Telegram\Listeners\CreateTemplateLis;

use Zerp\VisitorManagement\Events\CreateVisitor;
use Zerp\Telegram\Listeners\CreateVisitorLis;

use Zerp\VisitorManagement\Events\CreateVisitPurpose;
use Zerp\Telegram\Listeners\CreateVisitPurposeLis;

use Zerp\School\Events\CreateEmployee;
use Zerp\Telegram\Listeners\CreateSchoolEmployeeLis;

use Zerp\School\Events\CreateAdmission;
use Zerp\Telegram\Listeners\CreateAdmissionLis;

use Zerp\School\Events\CreateParent;
use Zerp\Telegram\Listeners\CreateParentLis;

use Zerp\School\Events\CreateStudent;
use Zerp\Telegram\Listeners\CreateSchoolStudentLis;

use Zerp\School\Events\CreateHomework;
use Zerp\Telegram\Listeners\CreateHomeworkLis;

use Zerp\School\Events\CreateSubject;
use Zerp\Telegram\Listeners\CreateSubjectLis;

use Zerp\School\Events\CreateClassTimetable;
use Zerp\Telegram\Listeners\CreateClassTimetableLis;

use Zerp\CleaningManagement\Events\CreateCleaningTeam;
use Zerp\Telegram\Listeners\CreateCleaningTeamLis;

use Zerp\Telegram\Listeners\CreateCleaningBookingLis;
use Zerp\CleaningManagement\Events\CreateCleaningBooking;

use Zerp\CleaningManagement\Events\CreateCleaningInvoice;
use Zerp\Telegram\Listeners\CreateCleaningInvoiceLis;

use Zerp\MachineRepairManagement\Events\CreateMachine;
use Zerp\MachineRepairManagement\Events\CreateMachineRepairRequest;

use Zerp\Telegram\Listeners\CreateMachineLis;
use Zerp\Telegram\Listeners\CreateMachineRepairRequestLis;

use Zerp\HospitalManagement\Events\CreateHospitalDoctor;
use Zerp\Telegram\Listeners\CreateHospitalDoctorLis;

use Zerp\HospitalManagement\Events\CreateHospitalMedicine;
use Zerp\Telegram\Listeners\CreateHospitalMedicineLis;

use Zerp\HospitalManagement\Events\CreateHospitalPatient;
use Zerp\Telegram\Listeners\CreateHospitalPatientLis;

use Zerp\HospitalManagement\Events\CreateHospitalAppointment;
use Zerp\Telegram\Listeners\CreateHospitalAppointmentLis;

use Zerp\Timesheet\Events\CreateTimesheet;
use Zerp\Telegram\Listeners\CreateTimesheetLis;

use Zerp\Notes\Events\CreateNote;
use Zerp\Telegram\Listeners\CreateNoteLis;

use Zerp\Internalknowledge\Events\CreateInternalknowledgeBook;
use Zerp\Telegram\Listeners\CreateInternalknowledgeBookLis;

use Zerp\Internalknowledge\Events\CreateInternalknowledgeArticle;
use Zerp\Telegram\Listeners\CreateInternalknowledgeArticleLis;

use Zerp\InnovationCenter\Events\CreateCreativity;
use Zerp\Telegram\Listeners\CreateCreativityLis;

use Zerp\InnovationCenter\Events\CreateChallenge;
use Zerp\Telegram\Listeners\CreateChallengeLis;

use Zerp\InnovationCenter\Events\CreateCategory;
use Zerp\Telegram\Listeners\CreateCategoryLis;

use Zerp\ToDo\Events\CreateToDo;
use Zerp\Telegram\Listeners\CreateToDoLis;

use Zerp\ToDo\Events\CompleteToDo;
use Zerp\Telegram\Listeners\CompleteToDoLis;

use Zerp\Documents\Events\CreateDocument;
use Zerp\Telegram\Listeners\CreateDocumentLis;

use Zerp\Documents\Events\StatusChangeDocument;
use Zerp\Telegram\Listeners\StatusChangeDocumentLis;

use Zerp\Hrm\Events\CreateAnnouncement;
use Zerp\Telegram\Listeners\CreateAnnouncementLis;

use Zerp\Hrm\Events\CreateAward;
use Zerp\Telegram\Listeners\CreateAwardLis;

use Zerp\Hrm\Events\CreateEvent;
use Zerp\Telegram\Listeners\CreateEventLis;

use Zerp\Hrm\Events\CreateHoliday;
use Zerp\Telegram\Listeners\CreateHolidayLis;

use Zerp\Hrm\Events\CreatePayroll;
use Zerp\Telegram\Listeners\CreatePayrollLis;

use Zerp\Hrm\Events\UpdateLeaveStatus;
use Zerp\Telegram\Listeners\UpdateLeaveStatusLis;

use Zerp\Taskly\Events\UpdateTaskStage;
use Zerp\Telegram\Listeners\UpdateTaskStageLis;

use Zerp\WordpressWoocommerce\Events\CreateWoocommerceProduct;
use Zerp\Telegram\Listeners\CreateWoocommerceProductLis;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        CreateUser::class => [
            CreateUserLis::class,
        ],

        PostSalesInvoice::class => [
            PostSalesInvoiceLis::class,
        ],

        SentSalesProposal::class => [
            SentSalesProposalLis::class,
        ],

        CreatePurchaseInvoice::class => [
            CreatePurchaseInvoiceLis::class,
        ],

        CreateWarehouse::class => [
            CreateWarehouseLis::class,
        ],

        CreateSalesProposal::class => [
            CreateSalesProposalLis::class,
        ],

        CreateCustomer::class => [
            CreateCustomerLis::class,
        ],

        CreateVendor::class => [
            CreateVendorLis::class,
        ],

        CreateRevenue::class => [
            CreateRevenueLis::class,
        ],

        CreateBankTransfer::class => [
            CreateBankTransferLis::class,
        ],

        AppointmentStatus::class => [
            AppointmentStatusLis::class,
        ],

        CreateSchedule::class => [
            CreateScheduleLis::class,
        ],

        CreateLocation::class => [
            CreateLocationLis::class,
        ],

        CreateSupplier::class => [
            CreateSupplierLis::class,
        ],

        CreateComponent::class => [
            CreateComponentLis::class,
        ],

        CreatePreventiveMaintenance::class => [
            CreatePreventiveMaintenanceLis::class,
        ],

        CreateCmmsPos::class => [
            CreateCmmsPosLis::class,
        ],

        CreateWorkOrder::class => [
            CreateWorkorderLis::class,
        ],

        CreateWorkRequest::class => [
            CreateWorkRequestLis::class,
        ],

        CreateContract::class => [
            CreateContractLis::class,
        ],

        CreatePayroll::class => [
            CreatePayrollLis::class,
        ],

        CreateAward::class => [
            CreateAwardLis::class,
        ],

        CreateEvent::class => [
            CreateEventLis::class,
        ],

        UpdateLeaveStatus::class => [
            UpdateLeaveStatusLis::class,
        ],

        CreateAnnouncement::class => [
            CreateAnnouncementLis::class,
        ],

        CreateHoliday::class => [
            CreateHolidayLis::class,
        ],

        CreateLead::class => [
            CreateLeadLis::class,
        ],

        LeadConvertDeal::class => [
            LeadConvertDealLis::class,
        ],

        CreateDeal::class => [
            CreateDealLis::class,
        ],

        LeadMoved::class => [
            LeadMovedLis::class,
        ],

        DealMoved::class => [
            DealMovedLis::class,
        ],

        CreateSalesQuote::class => [
            CreateSalesQuoteLis::class,
        ],

        CreateSalesOrder::class => [
            CreateSalesOrderLis::class,
        ],

        CreateSalesInvoice::class => [
            CreateSalesInvoiceLis::class,
        ],

        CreateSalesMeeting::class => [
            CreateSalesMeetingLis::class,
        ],

        CreateProject::class => [
            CreateProjectLis::class,
        ],

        CreateProjectTask::class => [
            CreateProjectTaskLis::class,
        ],

        CreateProjectBug::class => [
            CreateProjectBugLis::class,
        ],

        CreateProjectMilestone::class => [
            CreateProjectMilestoneLis::class,
        ],

        UpdateProjectTaskStage::class => [
            UpdateProjectTaskStageLis::class,
        ],

        UpdateTaskStage::class => [
            UpdateTaskStageLis::class,
        ],

        CreateTaskComment::class => [
            CreateTaskCommentLis::class,
        ],

        CreateZoomMeeting::class => [
            CreateZoommeetingLis::class
        ],

        CreateFixEquipmentAccessory::class => [
            CreateFixEquipmentAccessoryLis::class,
        ],

        CreateFixEquipmentAsset::class => [
            CreateFixEquipmentAssetLis::class,
        ],

        CreateFixEquipmentAudit::class => [
            CreateFixEquipmentAuditLis::class,
        ],

        CreateFixEquipmentComponent::class => [
            CreateFixEquipmentComponentLis::class,
        ],

        CreateFixEquipmentConsumable::class => [
            CreateFixEquipmentConsumableLis::class,
        ],

        CreateFixEquipmentLicense::class => [
            CreateFixEquipmentLicenseLis::class,
        ],

        CreateFixEquipmentLocation::class => [
            CreateFixEquipmentLocationLis::class,
        ],

        CreateFixEquipmentMaintenance::class => [
            CreateFixEquipmentMaintenanceLis::class,
        ],

        CreateVisitor::class => [
            CreateVisitorLis::class,
        ],

        CreateVisitPurpose::class => [
            CreateVisitPurposeLis::class,
        ],

        CreateTemplate::class => [
            CreateTemplateLis::class,
        ],

        CreateHistory::class => [
            CreateHistoryLis::class,
        ],

        CreateEmployee::class => [
            CreateSchoolEmployeeLis::class,
        ],

        CreateAdmission::class => [
            CreateAdmissionLis::class,
        ],

        CreateParent::class => [
            CreateParentLis::class,
        ],

        CreateStudent::class => [
            CreateSchoolStudentLis::class,
        ],

        CreateHomework::class => [
            CreateHomeworkLis::class,
        ],

        CreateSubject::class => [
            CreateSubjectLis::class,
        ],

        CreateClassTimetable::class => [
            CreateClassTimetableLis::class,
        ],

        CreateCleaningTeam::class => [
            CreateCleaningTeamLis::class,
        ],

        CreateCleaningBooking::class => [
            CreateCleaningBookingLis::class,
        ],

        CreateCleaningInvoice::class => [
            CreateCleaningInvoiceLis::class,
        ],

        CreateMachine::class => [
            CreateMachineLis::class,
        ],

        CreateMachineRepairRequest::class => [
            CreateMachineRepairRequestLis::class,
        ],

        CreateHospitalDoctor::class => [
            CreateHospitalDoctorLis::class,
        ],

        CreateHospitalPatient::class => [
            CreateHospitalPatientLis::class,
        ],

        CreateHospitalAppointment::class => [
            CreateHospitalAppointmentLis::class,
        ],

        CreateHospitalMedicine::class => [
            CreateHospitalMedicineLis::class,
        ],

        CreateTimesheet::class => [
            CreateTimesheetLis::class,
        ],

        CreateNote::class => [
            CreateNoteLis::class,
        ],

        CreateInternalknowledgeArticle::class => [
            CreateInternalknowledgeArticleLis::class,
        ],

        CreateInternalknowledgeBook::class => [
            CreateInternalknowledgeBookLis::class,
        ],

        CreateCreativity::class => [
            CreateCreativityLis::class,
        ],

        CreateChallenge::class => [
            CreateChallengeLis::class,
        ],

        CreateCategory::class => [
            CreateCategoryLis::class,
        ],

        CreateToDo::class => [
            CreateToDoLis::class,
        ],

        CompleteToDo::class => [
            CompleteToDoLis::class,
        ],

        CreateDocument::class => [
            CreateDocumentLis::class,
        ],

        StatusChangeDocument::class => [
            StatusChangeDocumentLis::class,
        ],

        CreateWoocommerceProduct::class => [
            CreateWoocommerceProductLis::class,
        ],
    ];
}
