<?php

namespace App\Http\Controllers;

use App\Models\ZakatPayment;
use Illuminate\Http\Request;
use App\Models\FundAProjectPayment;
use App\Models\SupportPleagePayment;
use App\Models\SupportScholarPayment;
use App\Models\EndowmentSupportOneYear;
use App\Models\EndowmentSupportFourYear;
use App\Models\EndowmentSupportPerpetualSeatInYourName;

class DashboardEndowmentController extends Controller
{
    public function one_year()
    {
        $oneyeareduction = EndowmentSupportOneYear::orderBy('created_at', 'desc')->paginate(7); // 7 items per page
        return view('adminpage.endowments.oneyear', compact('oneyeareduction'));
    }


    public function entire_degree()
    {
        $entiredegree = EndowmentSupportFourYear::orderBy('created_at', 'desc')->paginate(7);
        return view('adminpage.endowments.entire_degree', compact('entiredegree'));

    }
    public function perpetual_seat()
    {
        $perpetual_seat = EndowmentSupportPerpetualSeatInYourName::orderBy('created_at', 'desc')->paginate(7);
        return view('adminpage.endowments.perpetual_seat', compact('perpetual_seat'));

    }
    public function zakat_support_for_student()
    {
        $zakat_support = ZakatPayment::orderBy('created_at', 'desc')->paginate(7);
        return view('adminpage.endowments.zakat_support_', compact('zakat_support'));

    }

    public function scholor_payment()
    {
        $support_payment = SupportScholarPayment::orderBy('created_at', 'desc')->paginate(7);
        return view('adminpage.support_scholor.scholor_payments', compact('support_payment'));

    }

    public function scholor_pledge()
    {
        $support_pledge = SupportPleagePayment::orderBy('created_at', 'desc')->paginate(7);
        return view('adminpage.support_scholor.scholor_pledge', compact('support_pledge'));

    }

    public function fund_project()
    {

        $fundproject = SupportScholarPayment::orderBy('created_at', 'desc')->paginate(7);
        // dd('jfjfj');
        return view('adminpage.fund_project.fund_project', compact('fundproject'));

    }
}
