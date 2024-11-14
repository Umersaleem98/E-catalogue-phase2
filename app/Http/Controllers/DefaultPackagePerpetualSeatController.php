<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DefaultPackagePerpetualSeat;

class DefaultPackagePerpetualSeatController extends Controller
{

    public function perpetualseat()
    {
        $perpetual_seat = DefaultPackagePerpetualSeat::all();
        return view('adminpage.defult_packages.perpetual_seat', compact('perpetual_seat'));
    }

    public function store(Request $request)
    {
        $perpetual_seat = new DefaultPackagePerpetualSeat;
        $perpetual_seat->program_type = $request->program_type;
        $perpetual_seat->degree = $request->degree;
        $perpetual_seat->seats = $request->seats ?? 1;
        $perpetual_seat->totalAmount = $request->totalAmount;
        $perpetual_seat->donor_name = $request->donor_name;
        $perpetual_seat->donor_email = $request->donor_email;
        $perpetual_seat->phone = $request->phone;
        $perpetual_seat->about_partner = $request->about_partner;
        $perpetual_seat->philanthropist_text = $request->philanthropist_text;
        $perpetual_seat->country = $request->country;
        $perpetual_seat->year = $request->year;
        $perpetual_seat->payments_status = $request->payments_status;
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('defult_package_perpetual_seat'), $fileName); // Save in perpetual_seat_prove folder
            $perpetual_seat->prove = $fileName;
        }
        $perpetual_seat->save();
        return back()->with('success', 'Data saved successfully!');

    }
}
