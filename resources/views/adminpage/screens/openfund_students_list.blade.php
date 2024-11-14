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

                    <form action="{{ url('open_fundlist') }}" method="POST" enctype="multipart/form-data" class="mt-2">
                        @csrf
                        <div class="form-group">
                            <label for="file">Upload Excel File:</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </form>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2>Open Funds Students List</h2>
                                    <!-- Search Form -->
                                    <form action="{{ url('open_fundlist') }}" method="GET" class="form-inline">
                                        <input type="text" name="query" class="form-control" value="{{ $searchQuery ?? '' }}" placeholder="Search students...">
                                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                                    </form>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <form id="multiDeleteForm" method="POST" action="{{ url('multidelete') }}">
                                            @csrf
                                            @method('DELETE')
                                            <table id="productsTable" class="table table-hover table-product table-sm" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="select-all"></th>
                                                        <th>Qalam ID</th>
                                                        <th>Student Name</th>
                                                        <th>Father Name</th>
                                                        <th>Institution</th>
                                                        <th>Discipline</th>
                                                        <th>Contact No</th>
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
                                                        <th>Remark</th>
                                                        <th>Images</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($openfundsstudents as $item)
                                                        <tr>
                                                            <td><input type="checkbox" name="ids[]" value="{{ $item->id }}"></td>
                                                            <td>{{ $item->qalam_id }}</td>
                                                            <td>{{ $item->student_name }}</td>
                                                            <td>{{ $item->father_name }}</td>
                                                            <td>{{ $item->institutions }}</td>
                                                            <td>{{ $item->discipline }}</td>
                                                            <td>{{ $item->contact_no }}</td>
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
                                                            <td>{{ $item->remarks }}</td>
                                                            <td>
                                                                @if ($item->images)
                                                                    <img src="{{ asset('students_images/' . $item->images) }}" alt="Student Image" style="max-width: 80px; max-height: 80px;">
                                                                @else
                                                                    No Image Available
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('openfundstudents_edit', $item->id) }}" class="btn btn-primary btn-sm">Update</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <!-- Multi-delete button -->
                                            <button type="submit" class="btn btn-danger mt-2">Delete Selected</button>
                                        </form>
                                    </div>

                                    <!-- Pagination Links -->
                                  
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

<script>
    document.getElementById('select-all').addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('input[name="ids[]"]');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = this.checked;
        });
    });
</script>
