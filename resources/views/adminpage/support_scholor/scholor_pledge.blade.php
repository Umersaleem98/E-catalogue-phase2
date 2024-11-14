<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Support Scholar Pledge list</title>

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
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="content">
                    <!-- Top Statistics -->
                    <!-- Table Product -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2>Support Scholar Pledge list</h2>
                                </div>

                                <div class="card-body">
                                    <table id="productsTable" class="table table-hover table-product"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Student Name</th>
                                                <th>Donor Name</th>
                                                <th>Donor Email</th>
                                                <th>Phone</th>
                                                <th>Donation %</th>
                                                <th>Donation for</th>
                                                <th>Pledge Status</th>
                                                <th>Approved</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($support_pledge as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->student_name }}</td>
                                                    <td>{{ $item->donor_name }}</td>
                                                    <td>{{ $item->donor_email }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>{{ $item->donation_percent }} %</td>
                                                    <td>{{ $item->donation_for }}</td>
                                                    <td>{{ $item->pledge_approved ? 'Approved' : 'Pending' }}</td>
                                                    <td>
                                                        @if (!$item->pledge_approved)
                                                            <form action="{{ url('/pledge_approved', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-info btn-sm">Approve</button>
                                                            </form>
                                                        @else
                                                            <button class="btn btn-success btn-sm"
                                                                disabled>Approved</button>
                                                        @endif
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

    @include('adminpage.script')
</body>

</html>
