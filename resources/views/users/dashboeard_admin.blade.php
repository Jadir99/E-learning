@extends('courses.layoutt')

@section('title')
E-Learning dashboard
@endsection
    
@section('courses')


<div class=" justify-content-center">
    <div class="card ">
        <div class=" row">
          <div class="col-sm-7">
            <div class="card-body">
                <h5 class="card-title text-primary">Hello {{Auth::user()->name}}! </h5>
              <p class="mb-4">
                this is all about your website !!
              <h5 class="text-primary opacity-10">Have a nice day 🎉</h5>
              </p>
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img
                src="/images/users/man.png"
                height="140"
                alt="View Badge User"
                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                data-app-light-img="illustrations/man-with-laptop-light.png"
              />
            </div>
          </div>
        </div>
      </div>
    
    
    
</div>


<div class="card m-3">
    <div class="card-body px-xxl-0 pt-4">
      <div class="row g-0">
        <div class="col-xxl-3 col-md-6 px-3 text-center border-end-md border-bottom border-bottom-xxl-0 pb-3 p-xxl-0 ps-md-0">
          <div class="icon-circle icon-circle-primary"><span class="fs-2 fas fa-user-graduate text-primary"></span></div>
          <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"10"}'>0</span><span class="fw-normal text-600">New Learners</span></h4>
          <p class="fs--1 fw-semi-bold mb-0">4203 <span class="text-600 fw-normal">last month</span></p>
        </div>
        <div class="col-xxl-3 col-md-6 px-3 text-center border-end-xxl border-bottom border-bottom-xxl-0 pb-3 pt-4 pt-md-0 pe-md-0 p-xxl-0">
          <div class="icon-circle icon-circle-info"><span class="fs-2 fas fa-chalkboard-teacher text-info"></span></div>
          <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"324"}'>0</span><span class="fw-normal text-600">New Trainers</span></h4>
          <p class="fs--1 fw-semi-bold mb-0">301 <span class="text-600 fw-normal">last month</span></p>
        </div>
        <div class="col-xxl-3 col-md-6 px-3 text-center border-end-md border-bottom border-bottom-md-0 pb-3 pt-4 p-xxl-0 pb-md-0 ps-md-0">
          <div class="icon-circle icon-circle-success"><span class="fs-2 fas fa-book-open text-success"></span></div>
          <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"3712"}'>0</span><span class="fw-normal text-600">New Courses</span></h4>
          <p class="fs--1 fw-semi-bold mb-0">2779 <span class="text-600 fw-normal">last month</span></p>
        </div>
        <div class="col-xxl-3 col-md-6 px-3 text-center pt-4 p-xxl-0 pb-0 pe-md-0">
          <div class="icon-circle icon-circle-warning"><span class="fs-2 fas fa-dollar-sign text-warning"></span></div>
          <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"1054"}'>0</span><span class="fw-normal text-600">Refunds</span></h4>
          <p class="fs--1 fw-semi-bold mb-0">1201 <span class="text-600 fw-normal">last month</span></p>
        </div>
      </div>
    </div>
  </div>

  {{-- charts for users courses reviews --}}
<div>
        <canvas id="myChart" class="card col m-5"></canvas>
    </div>
  
  
  
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
    // Retrieve the data from the server-side variable
  
    // Create the chart
    const ctx = document.getElementById('myChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June','July','August','September','October','November','December'],
            datasets: [
                {
                label: 'number of courses',
                data: [{{$courses[1]}}, {{$courses[2]}},{{$courses[3]}}+0, {{$courses[4]}}, {{$courses[5]}}, {{$courses[6]}},{{$courses[7]}}, {{$courses[8]}}, {{$courses[9]}}, {{$courses[10]}}, {{$courses[11]}}, {{$courses[12]}}],
                backgroundColor: [
                    '#0B2545',
                ],
                borderColor: [
                  'black',
                ],
                borderWidth: 1
            },
            {
                label: 'number of users',
                data: [{{$users_count[1]}}, {{$users_count[2]}},{{$users_count[3]}}+0, {{$users_count[4]}}, {{$users_count[5]}}, {{$users_count[6]}},{{$users_count[7]}}, {{$users_count[8]}}, {{$users_count[9]}}, {{$users_count[10]}}, {{$users_count[11]}}, {{$users_count[12]}}],
                backgroundColor: [
                    '#134074',
                ],
                borderColor: [
                  'black',
                ],
                borderWidth: 1
            },
            {
                label: 'number of reviews',
                data: [{{$reviews_count[1]}}, {{$reviews_count[2]}},{{$reviews_count[3]}}+0, {{$reviews_count[4]}}, {{$reviews_count[5]}}, {{$reviews_count[6]}},{{$reviews_count[7]}}, {{$reviews_count[8]}}, {{$reviews_count[9]}}, {{$reviews_count[10]}}, {{$reviews_count[11]}}, {{$reviews_count[12]}}],
                backgroundColor: [
                    '#8DA9C4',
                ],
                borderColor: [
                  'black',
                ],
                borderWidth: 1
            }
        ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
  </script>   
@endsection