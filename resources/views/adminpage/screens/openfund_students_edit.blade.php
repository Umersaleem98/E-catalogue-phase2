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



                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2>Open Funds Students List</h2>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <form action="{{ url('openfundstudents_update', $openfundsstudents->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-2">
                                                <div class="col-md-4">
                                                    <input type="text" name="qalam_id"
                                                        value="{{ $openfundsstudents->qalam_id }}" class="form-control"
                                                        readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="student_name"
                                                        value="{{ $openfundsstudents->student_name }}"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="father_name"
                                                        value="{{ $openfundsstudents->father_name }}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-4">
                                                    <input type="text" name="institutions"
                                                        value="{{ $openfundsstudents->institutions }}"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="discipline"
                                                        value="{{ $openfundsstudents->discipline }}"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" name="contact_no"
                                                        value="{{ $openfundsstudents->contact_no }}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-4">
                                                    <input type="text" name="scholarship_name"
                                                        value="{{ $openfundsstudents->scholarship_name }}"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="nust_trust_fund_donor_name"
                                                        value="{{ $openfundsstudents->nust_trust_fund_donor_name }}"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="province"
                                                        value="{{ $openfundsstudents->province }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-4">
                                                    <input type="text" name="domicile"
                                                        value="{{ $openfundsstudents->domicile }}"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <!-- Gender as Radio Buttons -->
                                                    <label>Gender</label><br>
                                                    <input type="radio" name="gender" value="Male"
                                                        {{ $openfundsstudents->gender == 'Male' ? 'checked' : '' }}>
                                                    Male
                                                    <input type="radio" name="gender" value="Female"
                                                        {{ $openfundsstudents->gender == 'Female' ? 'checked' : '' }}>
                                                    Female
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="program"
                                                        value="{{ $openfundsstudents->program }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-4">
                                                    <input type="text" name="degree"
                                                        value="{{ $openfundsstudents->degree }}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="year_of_admission"
                                                        value="{{ $openfundsstudents->year_of_admission }}"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="father_status"
                                                        value="{{ $openfundsstudents->father_status }}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-4">
                                                    <input type="text" name="father_profession"
                                                        value="{{ $openfundsstudents->father_profession }}"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" name="monthly_income"
                                                        value="{{ $openfundsstudents->monthly_income }}"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="remarks"
                                                        value="{{ $openfundsstudents->remarks }}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="statement_of_purpose">Statement of Purpose</label>
                                                        <!-- Increase rows to 7 for Statement of Purpose -->
                                                        <textarea name="statement_of_purpose" class="form-control" id="statement_of_purpose" rows="7">{{ $openfundsstudents->statement_of_purpose }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="images">Images</label><br>
                                                        <!-- Show the current image before the file input -->
                                                        @if ($openfundsstudents->images)
                                                            <img src="{{ asset('students_images/' . $openfundsstudents->images) }}"
                                                                alt="Current Image" width="150">
                                                        @endif
                                                        <input type="file" name="images" class="form-control"
                                                            id="images" value="{{ $openfundsstudents->images }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="submit" name="submit" class="btn btn-primary">
                                        </form>
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
