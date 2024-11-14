<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Application Brand -->
        <div class="app-brand">
            <a href="{{ url('dashboard') }}">
                {{-- <img src="admin2/images/logo.png" alt="Mono" style="width: 30px; height: 30px;"> --}}
                <img src="admin/images/logo.png" alt="Mono"
                    style="width: 40px; height: 40px; filter: brightness(250%);">

                <span class="brand-name">catalog</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="active">
                    <a class="sidenav-item-link" href="{{ url('dashboard') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="nav-text">Admin Dashboard</span>
                    </a>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#users"
                        aria-expanded="false" aria-controls="users">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Students</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="users" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            {{-- <li>
                                <a class="sidenav-item-link" href="{{ url('students_get') }}">
                                    <span class="nav-text">Students List</span>
                                </a>
                            </li> --}}
                            <li>
                                <a class="sidenav-item-link" href="{{ url('open_funds_students_list') }}">
                                    <span class="nav-text">Open Funds Students</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#adoped_student" aria-expanded="false" aria-controls="adoped_student">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Adoped Students</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="adoped_student" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('adoped_students') }}">
                                    <span class="nav-text">Adoped Students List</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#Giving_Avenues" aria-expanded="false" aria-controls="Giving_Avenues">
                        <i class="mdi mdi-charity"></i>
                        <span class="nav-text">Giving Avenues</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="Giving_Avenues" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('one_year_education') }}">
                                    <span class="nav-text">One year Education</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('entire_degree_education') }}">
                                    <span class="nav-text">Entire Degree</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('perpetual_seat_in__your__name') }}">
                                    <span class="nav-text">Perpetual Seat</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('zakat_support') }}">
                                    <span class="nav-text">Zakat for Students</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#defult_package" aria-expanded="false" aria-controls="defult_package">
                        <i class="mdi mdi-charity"></i>
                        <span class="nav-text">Defult Packages</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="defult_package" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('default_defultoneyear') }}">
                                    <span class="nav-text">One year Education</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('default_package_defultfouryear') }}">
                                    <span class="nav-text">Entire Degree</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('default_perpetualseat') }}">
                                    <span class="nav-text">Perpetual Seat</span>
                                </a>
                            </li>
                           
                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#FundaProject" aria-expanded="false" aria-controls="FundaProject">
                        <i class="mdi mdi-currency-usd"></i>
                        <span class="nav-text">Fund a Project</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="FundaProject" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('fundaproject') }}">
                                    <span class="nav-text">Fund a Project</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#SupportScholor" aria-expanded="false" aria-controls="SupportScholor">
                        <i class="mdi mdi-school"></i>
                        <span class="nav-text">Support Scholar</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="SupportScholor" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('suport_scholor_payment') }}">
                                    <span class="nav-text">Payment Scholar</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('suport_scholor_pledge') }}">
                                    <span class="nav-text">Pledge Scholar</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#Team" aria-expanded="false" aria-controls="Team">
                        <i class="mdi mdi-account-multiple"></i>
                        <span class="nav-text">Team</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="Team" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('team_list') }}">
                                    <span class="nav-text">Team List</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('add_team') }}">
                                    <span class="nav-text">Add Team</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>


                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#Users" aria-expanded="false" aria-controls="Users">
                        <i class="mdi mdi-account"></i>
                        <span class="nav-text">Users</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="Users" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('user_list') }}">
                                    <span class="nav-text">User List</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('create') }}">
                                    <span class="nav-text">Add User</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#Events" aria-expanded="false" aria-controls="Events">
                        <i class="mdi mdi-calendar"></i>
                        <span class="nav-text">Events</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="Events" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('event_list') }}">
                                    <span class="nav-text">Events List</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('event_create') }}">
                                    <span class="nav-text">Add Events</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside>
