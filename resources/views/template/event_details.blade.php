<!DOCTYPE html>
<html lang="en">
<head>
    <title>Event Details</title>
    @include('template.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="super_container">
    <!-- Header -->
    @include('template.navbar')
    
    <!-- Home -->
    @include('template.home')
    
    <div class="row mt-5">
        <div class="col-12">
            <div class="section_title text-center">
                <h1>Event Details</h1>
            </div>
        </div>
    </div>
    
    <!-- About Section -->
    <div class="about-section mt-4">
        <div class="container">
            <div class="row">
                <!-- Left Section for Images -->
                <div class="col-lg-4 col-md-4 col-sm-12 mb-4 mb-lg-0">
                    <div class="image-container">
                        <img src="{{ asset('events/' . $event->images) }}" class="img-fluid mb-3" alt="{{ $event->images }} Image" style="max-height: 220px; width:100%">
                    </div>
                </div>
                <!-- Right Section for Content -->
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="content-container">
                        <h2>{{ $event->event_title }}</h2>
                        <h2>{{ $event->date }}</h2>
                        <p class="justified-content">{{ $event->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- All Events Section -->
    <div class="all-events-section mt-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="section_title text-center">
                        <h1>Event Details</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($allEvents as $singleEvent)
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card">
                            <img src="{{ asset('events/' . $singleEvent->images) }}" class="card-img-top" alt="{{ $singleEvent->event_title }} Image" style="max-height: 150px; width:100%">
                            <div class="card-body">
                                <h4 class="card-title text-dark">{{ $singleEvent->event_title }}</h4>
                                <p class="card-text text-dark">{{ Str::limit($singleEvent->description, 50) }}</p>
                                <a href="{{ url('event-details', ['id' => $singleEvent->id]) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

<br>

@include('template.footer')

</body>
</html>
