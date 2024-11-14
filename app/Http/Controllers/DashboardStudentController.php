<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\OpenfundStudent;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\OpenfundStudentImport;
use Illuminate\Support\Facades\Storage;

class DashboardStudentController extends Controller
{
    public function list(Request $request)
    {
        $searchQuery = $request->input('query');

    
        // Fetch students data with optional search query and paginate results
        $openfundsstudents = Student::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('student_name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('father_name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('institutions', 'like', '%' . $searchQuery . '%')
                  ->orWhere('discipline', 'like', '%' . $searchQuery . '%')
                  ->orWhere('scholarship_name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('province', 'like', '%' . $searchQuery . '%')
                  ->orWhere('gender', 'like', '%' . $searchQuery . '%')
                  ->orWhere('program', 'like', '%' . $searchQuery . '%')
                  ->orWhere('degree', 'like', '%' . $searchQuery . '%')
                  ->orWhere('year_of_admission', 'like', '%' . $searchQuery . '%')
                  ->orWhere('father_status', 'like', '%' . $searchQuery . '%')
                  ->orWhere('father_profession', 'like', '%' . $searchQuery . '%')
                  ->orWhere('monthly_income', 'like', '%' . $searchQuery . '%');
        })->paginate(10); // Display 10 records per page
    
        return view('adminpage.screens.students_list', compact('openfundsstudents', 'searchQuery'));
    }
    

    public function store(Request $request)
    {

        $students = new Student;
        $students->name= $request->name;
        $students->father_name= $request->father_name;
        $students->institution= $request->institution;
        $students->discipline= $request->discipline;
        $students->scholarship_name= $request->scholarship_name;
        $students->province= $request->province;
        $students->gender= $request->gender;
        $students->program= $request->program;
        $students->city= $request->city;
        $students->degree= $request->degree;
        $students->year_of_admission= $request->year_of_admission;
        $students->father_status= $request->father_status;
        $students->father_profession= $request->father_profession;
        $students->monthly_income= $request->monthly_income;
        $students->statement_of_purpose= $request->statement_of_purpose;
        $students->images= $request->images;
        $students->save();

        
        return redirect()->back()->with('success', 'Payment successfully made.');
    }

    public function edit($id)
    {
        $students = Student::find($id);
        return view('adminpage.screens.update_students', compact('students'));
    }


    public function update(Request $request, $id)
    {
        // Find the student record by ID
        $student = Student::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'discipline' => 'required|string|max:255',
            'scholarship_name' => 'required|string|max:255',
            'donor_name' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'year_of_admission' => 'required|numeric',
            'father_status' => 'required|string|max:255',
            'father_profession' => 'required|string|max:255',
            'monthly_income' => 'required|numeric',
            'statement_of_purpose' => 'nullable|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the student record with the validated data
        $student->update($validatedData);

        // Handle file upload if 'images' is included in the form
        if ($request->hasFile('images')) {
            // Check if there is an existing image
            if ($student->images) {
                // Define the image path
                $existingImagePath = public_path('students_images') . '/' . $student->images;

                // Delete the existing image if it exists
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }

            // Process and move the new uploaded image
            $file = $request->file('images');
            $fileName = time() . '_' . $file->getClientOriginalName();
            if ($file->move(public_path('students_images'), $fileName)) {
                // Update the images attribute on the student model
                $student->images = $fileName;
            } else {
                // Handle file upload error
                return redirect()->back()->with('error', 'Failed to upload image');
            }
        }

        // Save the student model with updated data and image
        $student->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Student updated successfully');
    }

    public function open_funds_students(Request $request)
    {
        $searchQuery = $request->input('query');
        $showAll = $request->input('showAll', false); // Determine whether to show all

        // If "Select All" is checked, retrieve all records; otherwise, paginate with 50 items per page
        $openfundsstudents = OpenfundStudent::when($searchQuery, function ($query, $searchQuery) {
            return $query->where('student_name', 'like', "%{$searchQuery}%")
                         ->orWhere('qalam_id', 'like', "%{$searchQuery}%")
                         ->orWhere('father_name', 'like', "%{$searchQuery}%")
                         ->orWhere('institutions', 'like', "%{$searchQuery}%");
        })
        ->when($showAll, function ($query) {
            return $query->get(); // Return all records without pagination
        }, function ($query) {
            return $query->paginate(50); // Paginate with 50 items per page
        });

        return view('adminpage.screens.openfund_students_list', compact('openfundsstudents', 'searchQuery'));
    }




    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new OpenfundStudentImport, $request->file('file'));

        return back()->with('success', 'Students imported successfully!');
    }

    public function edit_openfund($id)
    {
        $openfundsstudents = OpenfundStudent::find($id);
        return view('adminpage.screens.openfund_students_edit', compact('openfundsstudents'));
    }


    public function update_openfund(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'qalam_id' => 'required|string|max:255',
            'student_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'institutions' => 'required|string|max:255',
            'discipline' => 'required|string|max:255',
            'contact_no' => 'required|string|max:15', // Adjust max length as needed
            'scholarship_name' => 'required|string|max:255',
            'nust_trust_fund_donor_name' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'domicile' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'year_of_admission' => 'required|numeric',
            'father_status' => 'required|string|max:255',
            'father_profession' => 'required|string|max:255',
            'monthly_income' => 'required|numeric',
            'remarks' => 'nullable|string',
            'statement_of_purpose' => 'nullable|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the student record by ID
        $student = OpenFundStudent::find($id);

        // Convert and sanitize input values
        $validatedData['qalam_id'] = trim($validatedData['qalam_id']);
        $validatedData['student_name'] = trim($validatedData['student_name']);
        $validatedData['father_name'] = trim($validatedData['father_name']);
        $validatedData['institutions'] = trim($validatedData['institutions']);
        $validatedData['discipline'] = trim($validatedData['discipline']);
        $validatedData['contact_no'] = trim($validatedData['contact_no']);
        $validatedData['scholarship_name'] = trim($validatedData['scholarship_name']);
        $validatedData['nust_trust_fund_donor_name'] = trim($validatedData['nust_trust_fund_donor_name']);
        $validatedData['province'] = trim($validatedData['province']);
        $validatedData['domicile'] = trim($validatedData['domicile']);
        $validatedData['gender'] = trim($validatedData['gender']);
        $validatedData['program'] = trim($validatedData['program']);
        $validatedData['degree'] = trim($validatedData['degree']);
        $validatedData['year_of_admission'] = (int)$validatedData['year_of_admission'];
        $validatedData['father_status'] = trim($validatedData['father_status']);
        $validatedData['father_profession'] = trim($validatedData['father_profession']);
        $validatedData['monthly_income'] = (float)$validatedData['monthly_income'];

        if (!empty($validatedData['remarks'])) {
            $validatedData['remarks'] = trim($validatedData['remarks']);
        }

        if (!empty($validatedData['statement_of_purpose'])) {
            $validatedData['statement_of_purpose'] = trim($validatedData['statement_of_purpose']);
        }

        // Update the student record with the validated data
        $student->update($validatedData);

        // Handle file upload if 'images' is included in the form
        if ($request->hasFile('images')) {
            // Check if there is an existing image
            if ($student->images) {
                // Define the image path
                $existingImagePath = public_path('students_images') . '/' . $student->images;

                // Delete the existing image if it exists
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }

            // Process and move the new uploaded image
            $file = $request->file('images');
            $fileName = time() . '_' . $file->getClientOriginalName();
            if ($file->move(public_path('students_images'), $fileName)) {
                // Update the images attribute on the student model
                $student->images = $fileName;
            } else {
                // Handle file upload error
                return redirect()->back()->with('error', 'Failed to upload image');
            }
        }

        // Save the student model with updated data and image
        $student->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Student updated successfully');
    }










    public function bulkDelete(Request $request)
{
    $ids = $request->ids;

    if (!empty($ids)) {
        OpenfundStudent::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Selected students have been deleted successfully.');
    }

    return redirect()->back()->with('error', 'Please select at least one student to delete.');
}
}
