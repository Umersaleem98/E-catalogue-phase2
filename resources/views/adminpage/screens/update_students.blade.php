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

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2>Students Update <a href="{{ url('students_get') }}" class="btn btn-dark">Student
                                            List</a></h2>

                                </div>
                                <div class="card-body">
                                    <div class="card-body">
                                        <form action="{{ url('students_update', $students->id) }}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" name="name" class="form-control"
                                                            id="name" value="{{ $students->name }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="father_name">Father Name</label>
                                                        <input type="text" name="father_name" class="form-control"
                                                            id="father_name" value="{{ $students->father_name }}"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="institution">Institution</label>
                                                        <input type="text" name="institution" class="form-control"
                                                            id="institution" value="{{ $students->institution }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="discipline">Discipline</label>
                                                        <input type="text" name="discipline" class="form-control"
                                                            id="discipline" value="{{ $students->discipline }}"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="scholarship_name">Scholarship Name</label>
                                                        <input type="text" name="scholarship_name"
                                                            class="form-control" id="scholarship_name"
                                                            value="{{ $students->scholarship_name }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="donor_name">Donor Name</label>
                                                        <input type="text" name="donor_name" class="form-control"
                                                            id="donor_name" value="{{ $students->donor_name }}"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="province">Province</label>
                                                        <input type="text" name="province" class="form-control"
                                                            id="province" value="{{ $students->province }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <input type="text" name="city" class="form-control"
                                                            id="city" value="{{ $students->city }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label>
                                                        <input type="text" name="gender" class="form-control"
                                                            id="gender" value="{{ $students->gender }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="program">Program</label>
                                                        <input type="text" name="program" class="form-control"
                                                            id="program" value="{{ $students->program }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree">Degree</label>
                                                        <input type="text" name="degree" class="form-control"
                                                            id="degree" value="{{ $students->degree }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="year_of_admission">Year of Admission</label>
                                                        <input type="number" name="year_of_admission"
                                                            class="form-control" id="year_of_admission"
                                                            value="{{ $students->year_of_admission }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="father_status">Father Status</label>
                                                        <input type="text" name="father_status"
                                                            class="form-control" id="father_status"
                                                            value="{{ $students->father_status }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="father_profession">Father Profession</label>
                                                        <input type="text" name="father_profession"
                                                            class="form-control" id="father_profession"
                                                            value="{{ $students->father_profession }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="monthly_income">Monthly Income</label>
                                                        <input type="number" step="0.01" name="monthly_income"
                                                            class="form-control" id="monthly_income"
                                                            value="{{ $students->monthly_income }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="statement_of_purpose">Statement of Purpose</label>
                                                        <textarea name="statement_of_purpose" class="form-control" id="statement_of_purpose">{{ $students->statement_of_purpose }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="images">Images</label>
                                                        <input type="file" name="images" class="form-control"
                                                            id="images" value="{{ $students->images }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="submit"
                                                class="btn btn-primary">Submit</button>
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

    <!-- Card Offcanvas -->


    @include('adminpage.script')
</body>

</html>
