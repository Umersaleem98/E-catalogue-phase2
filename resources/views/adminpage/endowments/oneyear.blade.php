<!DOCTYPE html>
<html lang="en" dir="ltr">
<title>One Year</title>

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
                                    <h2>One Year Education list</h2>

                                </div>
                                <div class="card-body">
                                   <div class="table-responsive">
                                    <table id="productsTable" class="table table-hover table-product"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Program</th>
                                            <th>Degree</th>
                                            <th>Seats</th>
                                            <th>Total Amount</th>
                                            <th>Donor Name</th>
                                            <th>Donor Email</th>
                                            <th>Phone</th>
                                            <th>About Partner</th>
                                            <th>Country</th>
                                            <th>Year</th>
                                            <th>Status</th>
                                            <th>Prove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($oneyeareduction as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->program }}</td>
                                                <td>{{ $item->degree }}</td>
                                                <td>{{ $item->seats }}</td>
                                                <td>{{ $item->totalAmount }}</td>
                                                <td>{{ $item->donor_name }}</td>
                                                <td>{{ $item->donor_email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->payments_status }}</td>
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

    <!-- Card Offcanvas -->


    @include('adminpage.script')
</body>

</html>
