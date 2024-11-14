<!DOCTYPE html>
<html lang="en" dir="ltr">
<title>Entire Degree </title>

<head>


    @include('adminpage.css')

    <style>
        body,
        table,
        th,
        td {
            color: #000;
            /* Black color */
        }
    </style>
</head>


<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>


    <div id="toaster"></div>
    <div class="wrapper">
        @include('adminpage.sidebar')
        <div class="page-wrapper">
            @include('adminpage.header')

            <div class="content-wrapper">
                <div class="content">
                    <!-- Top Statistics -->
                    <!-- Table Product -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2>Adobed Students List</h2>

                                </div>


                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="productsTable" class="table table-hover table-product table-sm"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Qalam ID</th>
                                                    <th>Student Name</th>
                                                    <th>Father Name</th>
                                                    <th>Institution</th>
                                                    <th>Discipline</th>
                                                    <th>Contact No</th>
                                                    {{-- <th>home Address</th> --}}
                                                    <th>Scholarship Name</th>
                                                    <th>nust_trust_fund_donor_name</th>
                                                    <th>Province</th>
                                                    <th>Domicile</th>
                                                    <th>Gender</th>
                                                    <th>Program</th>
                                                    <th>Degree</th>
                                                    <th>Year of Admission</th>
                                                    <th>Father Status</th>
                                                    <th>Father Profession</th>
                                                    <th>Monthly Income</th>
                                                    {{-- <th>Status of Purpose</th> --}}
                                                    <th>Remark</th>
                                                    <th>Images</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $item)
                                                    <tr>
                                                        <td>{{ $item->qalam_id }}</td>
                                                        <td>{{ $item->student_name }}</td>
                                                        <td>{{ $item->father_name }}</td>
                                                        <td>{{ $item->institutions }}</td>
                                                        <td>{{ $item->discipline }}</td>
                                                        <td>{{ $item->contact_no }}</td>
                                                        {{-- <td>{{ $item->home_address }}</td> --}}
                                                        <td>{{ $item->scholarship_name }}</td>
                                                        <td>{{ $item->nust_trust_fund_donor_name }}</td>
                                                        <td>{{ $item->province }}</td>
                                                        <td>{{ $item->domicile }}</td>
                                                        <td>{{ $item->gender }}</td>
                                                        <td>{{ $item->program }}</td>
                                                        <td>{{ $item->degree }}</td>
                                                        <td>{{ $item->year_of_admission }}</td>
                                                        <td>{{ $item->father_status }}</td>
                                                        <td>{{ $item->father_profession }}</td>
                                                        <td>{{ $item->monthly_income }}</td>
                                                        {{-- <td>{{ $item->statement_of_purpose }}</td> --}}
                                                        <td>{{ $item->remarks }}</td>
                                                        <td>
                                                            @if ($item->images)
                                                                <img src="{{ asset('students_images/' . $item->images) }}"
                                                                    alt="Student Image"
                                                                    style="max-width: 80px; max-height: 80px;">
                                                            @else
                                                                No Image Available
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>

                                    <!-- Pagination -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>

    <!-- Card Offcanvas -->


    @include('adminpage.script')
</body>

</html>
