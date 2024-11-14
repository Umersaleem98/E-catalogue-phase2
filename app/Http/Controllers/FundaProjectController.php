<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Models\FundAProjectPayment;

class FundaProjectController extends Controller
{
    public function index()
    {
        $project_categories = ProjectCategory::all();

        return view('template.fund_project.select_project', compact('project_categories'));
        // return view('template.fund_project.select_project', compact('project_categories'));
    }

    public function fund_project($id)
    {
        $project_categories = ProjectCategory::find($id);

        return view('template.fund_project.fund_screen', compact('project_categories'));

    }


    public function payment_fund_a_project($id)
    {
        $project_categories = ProjectCategory::find($id);
        return view('template.payments.payment_fund_a_project', compact('project_categories'));
    }


    public function payment_project(Request $request)
    {
        $payments = new FundAProjectPayment;
        $payments->project_name = $request->project_name;
        $payments->donor_name = $request->donor_name;
        $payments->donor_email = $request->donor_email;
        $payments->phone = $request->phone;
        $payments->amount_for = $request->amount_for;
        $payments->amount = $request->amount;
        $payments->save();
        return redirect()->back()->with('success', 'Payment successfully made.');
    }

}
