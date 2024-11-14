<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\SupportPleagePayment;
use App\Models\SupportScholarPayment;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        return view('template.stories', compact('students'));
    }



    public function student_stories(Request $request)
{
    $gender = $request->input('gender');
    $province = $request->input('province');
    $discipline = $request->input('discipline');
    $degree = $request->input('degree');
    $domicile = $request->input('domicile'); // Add city filter

    $query = Student::query();

    if ($gender && $gender !== 'all') {
        $query->where('gender', $gender);
    }

    if ($province && $province !== 'all') {
        $query->where('province', $province);
    }

    if ($discipline && $discipline !== 'all') {
        $query->where('discipline', $discipline);
    }

    if ($degree && $degree !== 'all') {
        $query->where('degree', $degree);
    }

    if ($domicile && $domicile !== 'all') { // Add city condition
        $query->where('domicile', $domicile);
    }

    // Sort the query by monthly_income in ascending order
    $query->orderBy('monthly_income', 'asc');

    // Additional sorting logic if needed
    $query->orderByRaw("CASE WHEN images = 'dummy.png' THEN 1 ELSE 0 END, images");

    $students = $query->paginate(8);

    if ($request->ajax()) {
        $studentsHtml = view('template.support_scholar.partials.students', compact('students'))->render();
        $paginationHtml = view('template.support_scholar.partials.pagination', compact('students'))->render();
        return response()->json(['studentsHtml' => $studentsHtml, 'paginationHtml' => $paginationHtml]);
    }

    // Determine if pledge and payment are approved based on the first student in the collection
    $isPledgeApproved = $students->first()->make_pledge ?? 0;
    $isPaymentApproved = $students->first()->payment_approved ?? 0;

    return view('template.support_scholar.index', compact('students', 'isPledgeApproved', 'isPaymentApproved'));
}



    public function student_stories_ind($id)
    {
        $events = Event::all();
        $students = Student::find($id); // Use findOrFail to handle non-existent IDs gracefully

        // Access the make_pledge and payment_approved attributes with default value 0
        $isPledgeApproved = $students->make_pledge ?? 0;
        $isPaymentApproved = $students->payment_approved ?? 0;

        // dd($isPaymentApproved);

        return view('template.support_scholar.student_stories', compact('events', 'students', 'isPledgeApproved', 'isPaymentApproved'));
    }



    public function payment_index($id)
    {
        $students= Student::find($id);
        return view('template.payments.payment', compact('students'));
    }


    public function Make_a_Pledge($id)
    {
        $students= Student::find($id);
        return view('template.payments.Make_a_Pledge', compact('students'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'student_name' => 'required|string|max:255',
            'donor_name' => 'required|string|max:255',
            'donor_email' => 'required|email|max:255',
            'duration' => 'required|integer',
            'amount' => 'required|numeric',
            'payment_approved' => 'required|boolean', // Ensure payment_approved is validated
            'prove' => 'required_if:payment_approved,true|file|mimes:jpeg,png,pdf|max:2048', // Validate prove file if payment_approved is true
        ]);

        // Check if the same donor has already made a payment for the same student


        // Handle file upload for 'prove' field
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('payment_prove'), $fileName);
        } else {
            // If prove file is not provided but payment is approved, return error
            return redirect()->back()->withErrors(['prove' => 'Prove file is required if payment is approved.']);
        }

        // Create a new Payment instance
        $payment = new SupportScholarPayment;
        $payment->student_name = $request->student_name;
        $payment->donor_name = $request->donor_name;
        $payment->donor_email = $request->donor_email;
        $payment->duration = $request->duration;
        $payment->amount = $request->amount;
        $payment->payment_approved = $request->payment_approved;
        $payment->prove = $fileName ?? null; // Assign fileName if it's set

        // Save the Payment instance to the database
        $payment->save();

        // Update the payment_approved field in the Student model
        $student = Student::where('student_name', $request->student_name)->first();

        if ($student) {
            $student->payment_approved = false;
            $student->save();
        }

        // Return a response, redirecting back with a success message
        return redirect()->back()->with('success', 'Payment successfully made.');
    }




    public function pledge_store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string',
            'donor_name' => 'required|string',
            'donor_email' => 'required|email',
            'phone' => 'required|string',
            'donation_percent' => 'required|integer',
            'donation_for' => 'required|string',
        ]);

        // Create a new Payment instance
        $payment = new SupportPleagePayment;
        $payment->student_name = $request->student_name;
        $payment->donor_name = $request->donor_name;
        $payment->donor_email = $request->donor_email;
        $payment->phone = $request->phone;
        $payment->donation_percent = $request->donation_percent;
        $payment->donation_for = $request->donation_for;
        $payment->pledge_approved = "0";  // Default to false or set based on your logic
        $payment->save();

        // Find the corresponding student
        $student = Student::where('student_name', $request->student_name)->first();

        if ($student) {
            // Update the pledge_approved field
            $student->make_pledge = "0";  // Set this based on your requirements
            $student->save();
        }

        // Return a response, redirecting back with a success message
        return redirect()->back()->with('success', 'Payment successfully made and student pledge status updated.');
    }




}
