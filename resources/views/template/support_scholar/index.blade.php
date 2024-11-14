<!DOCTYPE html>
<html lang="en">
<head>
    <title>Students Stories</title>
    @include('template.head')
    <style>
        .pagination li.active a {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .pagination li a:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: white;
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

        /* Custom class for filter col-md-2 */
        .filter-col {
            width: 16.666667%; /* 1/6th of the container width */
        }

        /* New style for active filter */
        .filter-active {
            background-color: #FFB606 !important; /* Green background */
            color: white !important; /* White text */
        }

        @media (max-width: 767.98px) {
    .filter-col {
        width: 100%;
        margin-bottom: 10px;
    }

    .filter-label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }
}
    </style>
</head>
<body>

<div class="super_container">

    <!-- Header -->
    @include('template.navbar')

    <!-- Home -->
    @include('template.home')

    <!-- Teachers -->
    <div class="teachers page_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form id="filterForm">
                        <div class="row">
                            <div class="col-md-2 mb-3 filter-col">
                                <select name="gender" id="genderFilter" class="form-control filter-select" aria-label="Select Gender">
                                    <option value="all" selected>All Genders</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-lg-2  mb-3 filter-col">
                                <select name="province" id="provinceFilter" class="form-control filter-select" aria-label="Select Province">
                                    <option value="all" selected>All Provinces</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Sindh">Sindh</option>
                                    <option value="Azad Jamu & Kashmir">Azad Jamu & Kashmir</option>
                                    <option value="Khyber Pakhtunkhwa">Khyber Pakhtunkhwa</option>
                                    <option value="Gilgit Baltistan">Gilgit Baltistan</option>
                                    <option value="Balochistan">Balochistan</option>
                                    <option value="Balochistan">Capital</option>
                                    <!-- Add more options for provinces -->
                                </select>
                            </div>
                            <div class="col-lg-2  mb-3 filter-col">
                                <select name="discipline" id="disciplineFilter" class="form-control filter-select" aria-label="Select Discipline">
                                    <option value="all" selected>All Disciplines</option>
                                    <option value="Engineering & IT">Engineering & IT</option>
                                    <option value="Bio Sciences">Bio Sciences</option>
                                    <option value="Management Sciences">Management Sciences</option>
                                    <option value="Natural Sciences">Natural Sciences</option>
                                    <option value="Architecture">Architecture</option>
                                    <option value="Chemical Engineering ">Chemical Engineering </option>
                                    <option value="CE">CE</option>
                                    <option value="Bachelor of Science in  Mass Communication">Bachelor of Science in  Mass Communication</option>
                                    <option value="Bachelor of Business Administration">Bachelor of Business Administration</option>
                                    <option value="Biotechnology">Biotechnology</option>
                                    <option value="MS in Clinical Psychology">MS in Clinical Psychology</option>
                                    <!-- Add more options for disciplines -->
                                </select>
                            </div>
                            <div class="col-lg-2  mb-3 filter-col">
                                <select name="degree" id="degreeFilter" class="form-control filter-select" aria-label="Select degree">
                                    <option value="all" selected>All Degrees</option>
                                    <option value="UG">Undergraduate (UG)</option>
                                    <option value="MS">Postgraduate (PG)</option>
                                    <!-- Add more options for degrees -->
                                </select>
                            </div>
                            <div class="col-lg-2  mb-3 filter-col">
                                <select name="domicile" id="cityFilter" class="form-control filter-select" aria-label="Select City">
                                    <option value="all" selected>All Cities</option>
                                    <option value="Abbottabad">Abbottabad</option>
                                    <option value="Astore">Astore</option>
                                    <option value="Attock">Attock</option>
                                    <option value="Bahawalnagar">Bahawalnagar</option>
                                    <option value="Bahawalpur">Bahawalpur</option>
                                    <option value="Bagh">Bagh</option>
                                    <option value="Bhakkar">Bhakkar</option>
                                    <option value="Bolan">Bolan</option>
                                    <option value="Chakwal">Chakwal</option>
                                    <option value="Chiniot">Chiniot</option>
                                    <option value="Chitral">Chitral</option>
                                    <option value="Dadu">Dadu</option>
                                    <option value="Dera Bugti">Dera Bugti</option>
                                    <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                    <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                                    <option value="Faisalabad">Faisalabad</option>
                                    <option value="Ghizer">Ghizer</option>
                                    <option value="Gilgit">Gilgit</option>
                                    <option value="Ghanche">Ghanche</option>
                                    <option value="Ghotki">Ghotki</option>
                                    <option value="Gwadar">Gwadar</option>
                                    <option value="Hattian">Hattian</option>
                                    <option value="Haripur">Haripur</option>
                                    <option value="Hunza-Nagar">Hunza-Nagar</option>
                                    <option value="Islamabad">Islamabad</option>
                                    <option value="Jafarabad">Jafarabad</option>
                                    <option value="Jhang">Jhang</option>
                                    <option value="Jhelum">Jhelum</option>
                                    <option value="Karak">Karak</option>
                                    <option value="Karachi">Karachi</option>
                                    <option value="Kashmore">Kashmore</option>
                                    <option value="Kech (Turbat)">Kech (Turbat)</option>
                                    <option value="Khairpur">Khairpur</option>
                                    <option value="Khanewal">Khanewal</option>
                                    <option value="Khuzdar">Khuzdar</option>
                                    <option value="Kohat">Kohat</option>
                                    <option value="Kotli">Kotli</option>
                                    <option value="Kurram">Kurram</option>
                                    <option value="Lahore">Lahore</option>
                                    <option value="Lakki Marwat">Lakki Marwat</option>
                                    <option value="Larkana">Larkana</option>
                                    <option value="Layyah">Layyah</option>
                                    <option value="Lodhran">Lodhran</option>
                                    <option value="Lower Dir">Lower Dir</option>
                                    <option value="Loralai">Loralai</option>
                                    <option value="Malakand">Malakand</option>
                                    <option value="Mansehra">Mansehra</option>
                                    <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                                    <option value="Mardan">Mardan</option>
                                    <option value="Matiari">Matiari</option>
                                    <option value="Mianwali">Mianwali</option>
                                    <option value="Multan">Multan</option>
                                    <option value="Muzaffarabad">Muzaffarabad</option>
                                    <option value="Muzaffargarh">Muzaffargarh</option>
                                    <option value="Nankana Sahib">Nankana Sahib</option>
                                    <option value="Narowal">Narowal</option>
                                    <option value="Naushahro Firoze">Naushahro Firoze</option>
                                    <option value="Nowshera">Nowshera</option>
                                    <option value="Okara">Okara</option>
                                    <option value="Pakpattan">Pakpattan</option>
                                    <option value="Panjgur">Panjgur</option>
                                    <option value="Peshawar">Peshawar</option>
                                    <option value="Poonch">Poonch</option>
                                    <option value="Quetta">Quetta</option>
                                    <option value="Qambar Shahdadkot">Qambar Shahdadkot</option>
                                    <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                                    <option value="Rawalpindi">Rawalpindi</option>
                                    <option value="Sargodha">Sargodha</option>
                                    <option value="Sahiwal">Sahiwal</option>
                                    <option value="Shaheed Benazirabad">Shaheed Benazirabad</option>
                                    <option value="Sibi">Sibi</option>
                                    <option value="Sialkot">Sialkot</option>
                                    <option value="Skardu">Skardu</option>
                                    <option value="Sukkur">Sukkur</option>
                                    <option value="Tank">Tank</option>
                                    <option value="Toba Tek Singh">Toba Tek Singh</option>
                                    <option value="Upper Dir">Upper Dir</option>
                                    <option value="Vehari">Vehari</option>
                                    <option value="Zhob">Zhob</option>
                                    <!-- Add more options for cities -->
                                </select>
                            </div>
                            <div class="col-lg-2  mb-3 filter-col">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mt-3" id="studentsContainer">
                @include('template.support_scholar.partials.students', ['students' => $students])
            </div>

            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm justify-content-center" id="pagination">
                    @include('template.support_scholar.partials.pagination', ['students' => $students])
                </ul>
            </nav>
        </div>
    </div>

    <!-- Milestones -->
    <div class="milestones">
        <div class="milestones_background" style="background-image:url('{{ asset('images/milestones_background.jpg') }}')">
            <!-- Milestones Background Content -->
        </div>

        <div class="container">
            <div class="row">
                <!-- Milestone Content -->
            </div>
        </div>
    </div>

</div>

@include('template.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function fetchStudents(page = 1) {
            const formData = $('#filterForm').serialize();

            $.ajax({
                url: "{{ url('student_stories') }}?page=" + page,
                type: 'GET',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $('#studentsContainer').html(response.studentsHtml);
                    $('#pagination').html(response.paginationHtml);
                    highlightActiveFilters();
                }
            });
        }

        function highlightActiveFilters() {
            $('.filter-select').each(function() {
                const value = $(this).val();
                if (value && value !== 'all') {
                    $(this).addClass('filter-active');
                } else {
                    $(this).removeClass('filter-active');
                }
            });
        }

        $('#filterForm').on('submit', function(event) {
            event.preventDefault();
            fetchStudents();
            highlightActiveFilters(); // Ensure filters are highlighted immediately after form submission
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            const page = $(this).attr('href').split('page=')[1];
            fetchStudents(page);
        });

        highlightActiveFilters(); // Initial call to highlight any pre-selected filters
    });
</script>

</body>
</html>
