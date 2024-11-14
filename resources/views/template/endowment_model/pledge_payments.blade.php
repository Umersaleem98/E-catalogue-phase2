<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment </title>
    @include('template.head')
    <style>
        /* Custom CSS for responsiveness */
        @media (max-width: 767px) {
            .ml-sm-5 {
                margin-left: 0 !important;
            }
        }
        h2, p {
            color: black;
        }

        /* Style for input text color */
        input.form-control {
            color: black;
        }

        /* Style for placeholder text color */
        input.form-control::placeholder {
            color: black;
            opacity: 1; /* Override default opacity */
        }

        select.form-control {
        color: black;
    }

    /* Style for select option text color */
    select.form-control option {
        color: black;
    }
        </style>
</head>
<body>

<div class="super_container">

    <!-- Header -->

    @include('template.navbar')

    @include('template.home')

    <div class="events page_section">

        <div class="container">

            <div class="row mb-5">
                <div class="col">
                    <div class="section_title text-center">
                        <h1 class=""> Make a Pledge</h1>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="container">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="alert alert-info mt-3 text-center" role="alert">
                                Further correspondence will be carried out on your provided valid email address..
                            </div>
                            {{-- <div class="card-body mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h2>Non-Zakat Donation</h2>
                                        <p>Account Number: 2292-79173812-01</p>
                                        <p>IBAN Number: PK80HABB0022927917381201</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h2>Zakat Donation</h2>
                                        <p>Account Number: 2292-79173861-03</p>
                                        <p>IBAN Number: PK34HABB0022927917386103</p>                                    </div>
                                    <div class="col-md-4">
                                        <h2>Endowment Fund Donations</h2>
                                         <p>Account Number: 2292-79173811-01</p>
                                        <p>IBAN Number: PK64HABB0022927917381101</p>                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form method="POST" action="{{ url('payments') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="text" name="student_name" class="form-control" value="{{$students->name}}" hidden> --}}
                            <div class="row mb-3">
                                <div class="col-9">
                                    <label for="donor_name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="donor_name" name="donor_name" placeholder="Enter Your Name">
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-9">
                                    <label for="donor_email" class="form-label">Your Valid Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Your Valid Email" id="donor_email" name="donor_email">
                                </div>

                            </div>
                            {{-- <div class="row mb-3">

                                <div class="col-9">
                                    <label for="cnic_number" class="form-label">CNIC Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Your CNIC " id="cnic_number" name="cnic_number">
                                </div>
                            </div> --}}

                            <div class="row mb-3">

                                <div class="col-9">
                                    <label for="cnic_number" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Your Phone Number " id="cnic_number" name="cnic_number">
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col">
                                    <label for="cnic_number" class="form-label">Donation</label>
                                    <select name="" id="" class="form-control">
                                        <option value="50%">50%</option>
                                        <option value="100%">100%</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="cnic_number" class="form-label">For</label>
                                    <select name="" id="" class="form-control">
                                        <option value="50%">Tuition Fee </option>
                                        <option value="50%">Accommodation </option>
                                        <option value="100%">Messing</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <img src="{{ asset('templates/images/charity2.gif') }}" alt="Image 1" class="img-fluid rounded" style="max-width: 100%; height:400px">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    @include('template.footer')
</body>
</html>
