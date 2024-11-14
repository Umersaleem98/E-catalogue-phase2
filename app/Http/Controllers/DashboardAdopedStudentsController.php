<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DashboardAdopedStudentsController extends Controller
{
    public function adoped_student_list()
    {
        $students = Student::where('make_pledge', 0)
                           ->where('payment_approved', 0)
                           ->get();

        return view('adminpage.adoped_students.adoped_list', compact('students'));
    }

}
