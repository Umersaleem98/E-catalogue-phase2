<title>Resource Mobilization Officer</title>
@include('template.head')
<style>
    /* Custom CSS for responsiveness */
    @media (max-width: 767px) {
        .ml-sm-5 {
            margin-left: 0 !important;
        }
    }

    /* Custom class for image styling */
    .custom-img-fluid {
        max-height: 400px; /* Increased height */
        width: 100%;
        height: auto;
        transition: transform 0.3s ease; /* Smooth transition */
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    /* Hover effect to increase image size */
    .custom-img-fluid:hover {
        transform: scale(1.1); /* Scale image up to 110% */
    }

    /* Card styling with border */
    .card {
        border: 4px solid #004476; /* 4px border with black color */
    }

    /* Center text within columns */
    .center-text {
        text-align: left;
        margin-top: 50px;
    }

    #right-text {
        text-align: right;
        margin-top: 50px;
    }
</style>

<div class="super_container">

    <!-- Header -->
    @include('template.navbar')

    @include('template.home')

    <div class="events page_section">
        <div class="container">

            <div class="row mb-5">
                <div class="col">
                    <div class="section_title text-center">
                        <h1 class="">Resource Mobilization Officers</h1>
                    </div>
                </div>
            </div>

            <div class="container-fluid py-2">
                <div class="row">
                    <div class="col-12">
                        {{-- <h2 class="text-dark text-center mb-3">Members of NUST Advisory Council of Resource Mobilization</h2> --}}
                    </div>
                    <div class="col-md-12 mb-4">
                        <p class="text-dark"><b>The NUST Advisory Council of Resource Mobilization includes dedicated</b> Resource Mobilization Officers who play a crucial role in executing strategies to secure support from corporate entities, businesses, and philanthropists. Their industrial insights and connections are instrumental in:</p>
                        <p class="text-dark">
                            <b>Developing NUST as an Inclusive Education Institution:</b> Leveraging their expertise and networks to promote inclusivity and diversity within the university, ensuring that education is accessible to all, regardless of financial barriers.
                        </p>

                        <p class="text-dark">
                            <b>Strengthening Academic and Research Capabilities:</b>
                            Facilitating partnerships and securing funding that enhance NUST's academic programs and research initiatives.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <!-- First Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('templates/rmo/Danish_Aman.jpeg') }}" alt="Image 1" class="card-img-top custom-img-fluid">
                    </div>
                </div>
                <!-- Second Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('templates/rmo/Zafar_Sultan.jpg') }}" alt="Image 2" class="card-img-top custom-img-fluid">
                    </div>
                </div>
                <!-- Third Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('templates/rmo/sidra.jpg') }}" alt="Image 3" class="card-img-top custom-img-fluid">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <!-- Fourth Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('templates/rmo/sadia_sadat.jpg') }}" alt="Image 4" class="card-img-top custom-img-fluid">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('templates/rmo/abc.jpg') }}" alt="Image 4" class="card-img-top custom-img-fluid">
                    </div>
                </div>
                <!-- Add more cards here if needed -->
            </div>

        </div>
    </div>

    <!-- Footer -->
    @include('template.footer')

</div>

<!-- Bootstrap JS and dependencies -->
