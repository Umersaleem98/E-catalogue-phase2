<!DOCTYPE html>


<html lang="en" dir="ltr">

<head>
    @include('adminpage.css')
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

            <!-- Header -->
            @include('adminpage.header')

            <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <!-- Total Number of Students Card -->
                                <div class="col-md-6 col-lg-3 mb-4">
                                    <div class="card shadow-sm">
                                        <div class="card-body bg-dark">
                                            <h5 class="card-title text-light">Total Students</h5>
                                            <p class="card-text ">
                                                <span class="h2 text-light">{{ $totalStudents }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Open Fund Students Card -->
                                <div class="col-md-6 col-lg-3 mb-4">
                                    <div class="card shadow-sm">
                                        <div class="card-body bg-dark">
                                            <h5 class="card-title text-light">Adoped Students</h5>
                                            <p class="card-text ">
                                                <span class="h2 text-light">{{ $Adopedstudents }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Undergraduate Students Card -->
                                <div class="col-md-6 col-lg-3 mb-4">
                                    <div class="card shadow-sm">
                                        <div class="card-body bg-dark">
                                            <h5 class="card-title text-light">UG Students</h5>
                                            <p class="card-text ">
                                                <span class="h2 text-light">{{ $ugStudents }}</span>
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <!-- Postgraduate Students Card -->
                                <div class="col-md-6 col-lg-3 mb-4">
                                    <div class="card shadow-sm">
                                        <div class="card-body bg-dark">
                                            <h5 class="card-title text-light">PG Students</h5>
                                            <p class="card-text ">
                                                <span class="h2 text-light">{{ $pgStudents }}</span>
                                            </p>
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
