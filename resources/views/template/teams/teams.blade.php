<!DOCTYPE html>
<html lang="en">
<head>
    <title>Teams</title>
    @include('template.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        b {
            font-size: 1.25rem; /* Use relative units for font size */
        }
        .image-container img {
            width: 100%;
            height: auto;
            max-height: 500px; /* Set max height for large screens */
        }
        .text-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            position: relative;
            padding: 1rem; /* Add padding for better spacing */
        }
        .text-container p {
            font-size: 1rem; /* Use relative units for font size */
            text-align: left;
            overflow: hidden;
            position: relative;
            margin: 0;
        }
        /* Collapse text only on small screens */
        @media (max-width: 768px) {
            .text-container p.collapsed {
                max-height: 200px; /* Limit the height when collapsed */
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .show-more {
                display: block; /* Show the "Show More" button on small screens */
            }
        }
        /* Ensure full text is shown on larger screens */
        @media (min-width: 769px) {
            .text-container p {
                max-height: none; /* Show full text on larger screens */
            }
            .show-more {
                display: none; /* Hide the "Show More" button on larger screens */
            }
        }
        .show-more {
            color: blue;
            cursor: pointer;
            font-weight: bold;
            margin-top: 1rem; /* Adjust spacing */
            display: none; /* Hidden by default */
        }
        .author {
            font-size: 1.1rem; /* Use relative units for font size */
            color: black;
            font-weight: bold;
            margin-top: 1rem; /* Adjust spacing */
            text-align: left;
        }



        .members {
    padding: 30px 0;
}
.members .member {
    border: 0;
    background-color: #f2f2f2;
}
.card-body {
    /* padding: 62px 22px; */
    padding: 10px;
    transition: 0.5s;
    cursor: pointer;
}
.hover {
    margin-top: -70px;
    background-color: #ffffff;
    margin-bottom: 70px;
}
.card-body p {
    color: #ffa400;
    margin-bottom: 12px;

}
ul {
    margin: 0;
    padding: 0;
}
.card-body ul li{
    list-style: none;
    display: inline-block;
    padding: 6px;
}
.card-body ul li a {
    color: #000000;
    font-weight: 300;
    width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    text-decoration: none;
    transition: all 0.4s ease-in-out;
}
.card-body ul li a:hover {
    color: #ffffff;
    background-color: #000000;
}


    </style>
</head>
<body>

@include('template.home')

<div class="super_container">
    @include('template.navbar')
    <br><br><br><br><br>

    <div class="row mt-2">
        <div class="col">
            <div class="section_title text-center">
                <h1>MEET OUR TEAM</h1>
            </div>
        </div>
    </div>

    <!-- Header -->
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12 col-sm-12 image-container">
                <img src="{{ asset('team/Arooba_Gillani.png') }}" class="img-fluid" alt="CEO Image" style="box-shadow: 0 0 6px red; border:3px solid orange;">
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 text-container">
                <p class="text-dark collapsed" id="text">
                    <b style="color: #085590; font-size: 16px;">A commitment</b> to quality faculty and students has fueled NUST’s impressive rise in rankings and the success of our international alumni network. As Director Advancement, I am privileged to steer a self-sustaining system that supports <b style="color: #085590; font-size: 16px;">Pakistan’s leading science and technology university.</b> Our aim is to become the driving force of Pakistan’s knowledge economy, with the <b style="color: #085590; font-size: 16px;">dream of making NUST a need-blind university.</b>
                    Many deserving students face significant financial challenges, with <b style="color: #085590; font-size: 16px;">nearly half of our undergraduates requiring scholarships. Despite our best efforts, a gap remains, affecting 150 to 250 students</b> annually. Our <b style="color: #085590; font-size: 16px;">NEED Initiative Campaign</b> aims to bridge this gap, ensuring all talented students can afford higher education.
                    <br>
                    Your support is crucial to this campaign, dedicated to making need-blind admissions a reality and empowering our youth. <b style="color: #085590; font-size: 16px;">Join us in sponsoring dreams and lighting the way for an equitable future.</b>
                </p>
                <span class="show-more" id="showMoreBtn">Show More</span>
                <div class="author text-end">
                    Arooba Gillani,<br>
                    Director<br>
                    University Advancement Office
                </div>
            </div>
        </div>
    </div>
    

    <br>

    <section class="members">
        <div class="container">
          <div class="row">
            @foreach ($teams as $item)

            <div class="col-md-4 col-lg-4 mb-3">
              <div class="card text-center member">
                <img class="card-img-top " src="{{ asset('team/' . $item->image) }}" alt="Card image cap" style="max-height: 350px; border-radius: 20px;">
                <div class="card-body">
                  {{-- <h3 class="card-title text-dark">{{$item->name}}</h3> --}}
                  <a href="{{ url('meet_out_team', ['id' => $item->id]) }}" class="mt-3 text-center text-dark"> <h3 class="card-title text-dark">{{$item->name}}</h3></a>
                  <p class="card-text text-primary">{{$item->designation}} </p>
                  <ul class="list-inline">
                    <li class="list-inline-item">

                        <a href="{{$item->social_media}}" target="_blank"><i class="fa-brands fa-linkedin" style="font-size: 30px; color:#0A66C2;"></i></a>
                    </li>
                  </ul>
                </div>
              </div>

            </div>
            @endforeach

          </div>
        </div>
      </section>


    @include('template.event')
    @include('template.footer')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var showMoreBtn = document.getElementById('showMoreBtn');
        var text = document.getElementById('text');

        showMoreBtn.addEventListener('click', function() {
            if (text.classList.contains('collapsed')) {
                text.classList.remove('collapsed');
                this.innerText = 'Show Less';
            } else {
                text.classList.add('collapsed');
                this.innerText = 'Show More';
            }
        });

        // Ensure button visibility based on screen width
        function updateShowMoreVisibility() {
            if (window.innerWidth <= 768) {
                showMoreBtn.style.display = 'block';
            } else {
                showMoreBtn.style.display = 'none';
            }
        }

        updateShowMoreVisibility();
        window.addEventListener('resize', updateShowMoreVisibility);
    });
</script>

</body>
</html>
