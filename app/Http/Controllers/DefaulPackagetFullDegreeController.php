<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DefaultPackageFullDegree;

class DefaulPackagetFullDegreeController extends Controller
{
    public function defultfouryear()
    {
        $full_degree = DefaultPackageFullDegree::all();
        return view('adminpage.defult_packages.entire_degree', compact('full_degree'));
    }


    public function store(Request $request)
    {
        $full_degree = new DefaultPackageFullDegree;
        $full_degree->program_type = $request->program_type;
        $full_degree->degree = $request->degree;
        $full_degree->seats = $request->seats ?? 1;
        $full_degree->totalAmount = $request->totalAmount;
        $full_degree->donor_name = $request->donor_name;
        $full_degree->donor_email = $request->donor_email;
        $full_degree->phone = $request->phone;
        $full_degree->about_partner = $request->about_partner;
        $full_degree->philanthropist_text = $request->philanthropist_text;
        $full_degree->country = $request->country;
        $full_degree->year = $request->year;
        $full_degree->payments_status = $request->payments_status;
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('defult_package_four_year'), $fileName); // Save in full_degree_prove folder
            $full_degree->prove = $fileName;
        }
        $full_degree->save();
        return back()->with('success', 'Data saved successfully!');

    }
}
