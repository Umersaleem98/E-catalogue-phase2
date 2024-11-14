<?php

namespace App\Http\Controllers;

use App\Models\ZakatPayment;
use Illuminate\Http\Request;
use App\Models\EndowmentSupportOneYear;
use App\Models\EndowmentSupportFourYear;
use App\Models\SupportADegreeForOneYearPg;
use App\Models\SupportADegreeForOneYearUg;
use App\Models\EndowmentSupportPerpetualSeatInYourName;

class EndowmentController extends Controller
{
    public function index()
    {
        return view('template.endowment_model.index');
    }

    public function oneyearindex()
    {
        $undergraduate = SupportADegreeForOneYearUg::all();
        $postgraduate = SupportADegreeForOneYearPg::all();

        return view('template.endowment_model.one_year', compact('undergraduate', 'postgraduate'));
    }

    public function oneyear_store(Request $request)
    {
        $oneyear = new EndowmentSupportOneYear;
        $oneyear->program = $request->program;
        $oneyear->degree = $request->degree;
        $oneyear->seats = $request->seats;
        $oneyear->degree_name = $request->degree_name;
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
        return back()->with('success', 'Data saved successfully!');
    }





    public function entireyear()
    {
        $undergraduate = SupportADegreeForOneYearUg::all();
        $postgraduate = SupportADegreeForOneYearPg::all();

        // Retrieve the first matching record
        return view('template.endowment_model.fout_year', compact('undergraduate', 'postgraduate'));
    }



    public function entire_store(Request $request)
    {
        $fouryear = new EndowmentSupportFourYear;
        $fouryear->program = $request->program;
        $fouryear->degree = $request->degree;
        $fouryear->seats = $request->seats;
        $fouryear->degree_name = $request->degree_name;
        $fouryear->totalAmount = $request->totalAmount;
        $fouryear->donor_name = $request->donor_name;
        $fouryear->donor_email = $request->donor_email;
        $fouryear->phone = $request->phone;
        $fouryear->about_partner = $request->about_partner;
        $fouryear->philanthropist_text = $request->philanthropist_text;
        $fouryear->country = $request->country;
        $fouryear->year = $request->year;
        $fouryear->payments_status = $request->payments_status;
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('fouryear_prove'), $fileName); // Save in fouryear_prove folder
            $fouryear->prove = $fileName;
        }
        $fouryear->save();
        return back()->with('success', 'Data saved successfully!');
    }




    public function oneyear_index()
    {
        $undergraduate = SupportADegreeForOneYearUg::all();
        $postgraduate = SupportADegreeForOneYearPg::all();

        // Retrieve the first matching record
        return view('template.endowment_model.perpetual_seat_your_name', compact('undergraduate', 'postgraduate'));
    }
   
   
    public function perpetualseat_index()
    {
        $undergraduate = SupportADegreeForOneYearUg::all();
        $postgraduate = SupportADegreeForOneYearPg::all();

        // Retrieve the first matching record
        return view('template.endowment_model.perpetual_seat_your_name', compact('undergraduate', 'postgraduate'));
    }




    public function perpetualseat_store(Request $request)
    {
        $perpetualseat = new EndowmentSupportPerpetualSeatInYourName;
        $perpetualseat->program = $request->program;
        $perpetualseat->degree = $request->degree;
        $perpetualseat->seats = $request->seats;
        $perpetualseat->totalAmount = $request->totalAmount;
        $perpetualseat->donor_name = $request->donor_name;
        $perpetualseat->donor_email = $request->donor_email;
        $perpetualseat->phone = $request->phone;
        $perpetualseat->about_partner = $request->about_partner;
        $perpetualseat->philanthropist_text = $request->philanthropist_text;
        $perpetualseat->country = $request->country;
        $perpetualseat->year = $request->year;
        $perpetualseat->payments_status = $request->payments_status;
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('perpetualseat_prove'), $fileName); // Save in perpetualseat_prove folder
            $perpetualseat->prove = $fileName;
        }
        $perpetualseat->save();
        return back()->with('success', 'Data saved successfully!');
    }

    public function zakat_index()
    {
        return view('template.endowment_model.zakat');
    }

    public function zakat_payment_index()
    {
        return view('template.endowment_model.payments');
    }
    public function zakat_payment_store(Request $request)
    {
        $zakat = new ZakatPayment;
        $zakat->payment_type = $request->payment_type;
        $zakat->donor_name = $request->donor_name;
        $zakat->donor_email = $request->donor_email;
        $zakat->phone = $request->phone;
        $zakat->duration = $request->duration;
        $zakat->amount = $request->amount;
        $zakat->save();

        return back()->with('success', 'Data saved successfully!');
    }


}
