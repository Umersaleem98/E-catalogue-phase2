<!DOCTYPE html>
<html lang="en" dir="ltr">

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

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
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
                                    <h2>Students</h2>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="productsTable" class="table table-hover table-product table-sm"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Qalam ID</th>
                                                    <th>Name</th>
                                                    <th>Father Name</th>
                                                    <th>Institution</th>
                                                    <th>Discipline</th>
                                                    <th>Scholarship Name</th>
                                                    <th>Province</th>
                                                    <th>City</th>
                                                    <th>Gender</th>
                                                    <th>Program</th>
                                                    <th>Degree</th>
                                                    <th>Year of Admission</th>
                                                    <th>Father Status</th>
                                                    <th>Father Profession</th>
                                                    <th>Monthly Income</th>
                                                    <th>Make Pledge</th>
                                                    <th>Paynow approved</th>
                                                    <th>Images</th>
                                                    <th>Update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $item)
                                                    <tr>
                                                        <td>{{ $item->qalam_id }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->father_name }}</td>
                                                        <td>{{ $item->institution }}</td>
                                                        <td>{{ $item->discipline }}</td>
                                                        <td>{{ $item->scholarship_name }}</td>
                                                        <td>{{ $item->province }}</td>
                                                        <td>{{ $item->city }}</td>
                                                        <td>{{ $item->gender }}</td>
                                                        <td>{{ $item->program }}</td>
                                                        <td>{{ $item->degree }}</td>
                                                        <td>{{ $item->year_of_admission }}</td>
                                                        <td>{{ $item->father_status }}</td>
                                                        <td>{{ $item->father_profession }}</td>
                                                        <td>{{ $item->monthly_income }}</td>
                                                        <td>{{ $item->make_pledge }}</td>
                                                        <td>{{ $item->payment_approved }}</td>
                                                        <td>
                                                            <!-- Display image if available -->
                                                            @if ($item->images)
                                                                <img src="{{ asset('students_images/' . $item->images) }}"
                                                                    alt="Student Image"
                                                                    style="max-width: 80px; max-height: 80px;">
                                                            @else
                                                                No Image Available
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('students_edit', $item->id) }}"
                                                                class="btn btn-primary btn-sm">Update</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('adminpage.script')
</body>

</html>
