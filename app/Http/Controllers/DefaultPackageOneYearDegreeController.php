<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DefaultPackageOneYearDegree;

class DefaultPackageOneYearDegreeController extends Controller
{

    public function defultoneyear()
    {
        $oneyear = DefaultPackageOneYearDegree::all();
        return view('adminpage.defult_packages.oneyear', compact('oneyear'));
    }


    public function store(Request $request)
    {

        $oneyear = new DefaultPackageOneYearDegree;
        $oneyear->program_type = $request->program_type;
        $oneyear->degree = $request->degree;
        $oneyear->seats = $request->seats ?? 1;
        $oneyear->totalAmount = $request->totalAmount;
        $oneyear->donor_name = $request->donor_name;
        $oneyear->donor_email = $request->donor_email;
        $oneyear->phone = $request->phone;
        $oneyear->about_partner = $request->about_partner;
        $oneyear->philanthropist_text = $request->philanthropist_text;
        $oneyear->country = $request->country;
        $oneyear->year = $request->year;
        $oneyear->payments_status = $request->payments_status;
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('oneyear_prove'), $fileName); // Save in oneyear_prove folder
            $oneyear->prove = $fileName;
        }
        $oneyear->save();

        // return view('template.endowment_model.one_year', compact('undergraduate','postgraduate' ));
        return back()->with('success', 'Data saved successfully!');
        // return view('template.endowment_model.one_year', compact('undergraduate', 'postgraduate'))->with('success', 'Data saved successfully!');
    }
}
