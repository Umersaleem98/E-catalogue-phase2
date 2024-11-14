<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <title>Fund a Project List</title>

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
                                    <h2>Fund a Project List</h2>

                                </div>
                                <div class="card-body">
                                    <table id="productsTable" class="table table-hover table-product"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Total Amount</th>
                                                <th>Donor Name</th>
                                                <th>Donor Email</th>
                                                <th>Phone</th>
                                                <th>Amount For</th>
                                                <th>Amount </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fundproject as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->project_name }}</td>
                                                    <td>{{ $item->donor_name }}</td>
                                                    <td>{{ $item->donor_email }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>{{ $item->amount_for }}</td>
                                                    <td>{{ $item->amount }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
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

    <!-- Card Offcanvas -->


    @include('adminpage.script')
</body>

</html>
