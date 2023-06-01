@extends('Courses.layoutt')


@section('title')
E-Learning courses
@endsection

@section('courses')
@if (session('status'))
<script>
  Swal.fire(
  'Good job!',
  '{{session('status')}}!',
  'success'
)
</script>
@endif

<div class="card mb-3 ">
    <div class="card-header position-relative min-vh-25 mb-7">
      <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/images/users/{{$profile->cover_image_path}});"></div>
      <!--/.bg-holder-->
      <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="\images\users\{{$profile->profile_image_path}}" width="200" alt="" /></div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">
          <h4 class="mb-1"> {{$profile->name}} <span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></h4>
          <h5 class="fs-0 fw-normal"> {{$profile->job}} </h5>
          <p class="text-500">{{$profile->city}}, {{$profile->contry}}</p>
        </div>
      </div>
    </div>
  </div>

  
  <div class="row g-0">
    <div class="col-lg-8 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header bg-light">
          <h5 class="mb-0">Intro</h5>
        </div>
        <div class="card-body text-justify">
          <p class="mb-0 text-1000">Dedicated, passionate, and accomplished Full Stack Developer with 9+ years of progressive experience working as an Independent Contractor for Google and developing and growing my educational social network that helps others learn programming, web design, game development, networking.</p>
          <div class="collapse show" id="profile-intro">
            <p class="mt-3 text-1000"> {{$profile->Description_about_u}}  </p>
            <p class="text-1000">It’s great that we live in an age where we can share so much with technology but I’m but I’m ready for the next phase of my career, with a healthy balance between the virtual world and a workplace where I help others face-to-face.</p>
            <p class="text-1000 mb-0">There’s always something new to learn, especially in IT-related fields. People like working with me because I can explain technology to everyone, from staff to executives who need me to tie together the details and the big picture. I can also implement the technologies that successful projects need.</p>
          </div>
        </div>
        <div class="card-footer bg-light p-0 border-top"><button class="btn btn-link d-block w-100 btn-intro-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#profile-intro" aria-expanded="true" aria-controls="profile-intro">Show <span class="less">less<span class="fas fa-chevron-up ms-2 fs--2"></span></span><span class="full">full<span class="fas fa-chevron-down ms-2 fs--2"></span></span></button></div>
      </div>
      <div class="card mb-3">
        <div class="card-header">
            <h6 class="fs-0 mb-0">Similar Courses</h6>
          </div>
          <div class="card-body py-0 bg-light">
            <div class="swiper-container theme-slider py-x1" data-swiper='{"autoplay":true,"spaceBetween":10,"slidesPerView":1,"breakpoints":{"460":{"slidesPerView":1.5},"768":{"slidesPerView":2},"1540":{"slidesPerView":2.5}},"loop":true,"navigation":{"nextEl":".swiper-button-next","prevEl":".swiper-button-prev"}}'>
              <div class="swiper-wrapper">
             @if ($profile->former)
    


              @foreach ($profile->former as $course)          
                      <article class="col-md-6 col-xxl-4 swiper-slide h-auto">
                          <div class="card h-101 overflow-hidden">
                          <div class="card-body p-0 d-flex flex-column justify-content-between">
                              <div>
                              <div class="hoverbox text-center"><a class="text-decoration-none" href="\iamges\{{$course->image}}" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="\iamges\{{$course->image}}" alt="" /></a>
                              </div>
                              <div class=" ps-3">
                                  <h5 class="fs-0 mt-2"><a class="text-dark" href="{{route('courses.show',['course'=>$course->id])}}">{{$course->title}}</a></h5>
                                  <h5 class="fs-0 "><a href="#profile"> {{$profile->name	}}</a></h5><br>
                              </div>
                              </div>
                              <div class="row g-0 mb-2 align-items-end">
                              <div class="col ps-3 ">
                                  <h6 class="fs-1 text-warning d-flex align-items-center"> 
                                  <span class="">
                                  @foreach ($reviews as $review)
                                      <span class="d-none">{{$review->course_id}}</span>
                                      @if ($review->id==$course->id)
                                      {{-- show the stars --}}
                                      <span class="d-none">{{$nbr=$review->learner->avg('pivot.review') /20}}</span>
                                      @for ($i = 0; $i < $nbr; $i++)
                                          <span class="fa fa-star text-warning"></span>
                                      @endfor
                                      @for ($i = 0; $i < 5-$nbr; $i++)
                                          <span class="far fa-star text-warning"></span>
                                      @endfor
                                      <span class="text-info ms-2">({{$review->learner->count('pivot.review')}})</span></p>
                                      
                                      @endif
                                  @endforeach
                                  
                                  </span></h6>
                              </div>
                              <div class="col-auto pe-3">
                                  <a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="far fa-heart" data-fa-transform="down-2"></span></a>
                                  
                                  
                                  <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none float-end" type="button" id="dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                      <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-0">
                                      <a class="dropdown-item" href="{{route('courses.show',['course'=>$course->id])}}">View</a>
                                      @if (Auth::user()->id==$course->user->id)
                                      <a class="dropdown-item" href="{{route('courses.edit',['course'=>$course->id])}}">Edit</a>
                                      <form action="{{route('courses.destroy',['course'=>$course->id ])}}" method="post" >
                                          @csrf
                                          @method('delete')
                                      <div class="dropdown-divider"></div> <button type="submit" class="dropdown-item text-danger">Delete</button> 
                                      </form>
                                      @endif
                                      </div>
                              </div>
                              </div>
                          </div>
                          </div>
                      </article>

              @endforeach  
        
                
            @else
            

            <h1>Empty</h1>
                        
                
            @endif
              </div>
              <div class="swiper-nav">
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end py-1"><a class="btn btn-link btn-sm py-2 px-0" href="{{route('courses.index')}}">All courses<span class="fas fa-external-link-alt ms-1"></span></a></div>
        
      </div>
    </div>
    <div class="col-lg-4 ps-lg-2">
      <div class="sticky-sidebar">
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h5 class="mb-0">About {{$profile->name}} </h5>
          </div>
            <div class="card-body fs--1 ">
              <div class="flex-1 position-relative ps-3  m-2">
                <h6 class="fs-0 mb-0">E-mail: <br><span class="text-500">{{$profile->email}}</span> </h6>
              </div>
              <div class="flex-1 position-relative ps-3 m-2">
                <h6 class="fs-0 mb-0">Number Phone: <br> <span class="text-500">{{$profile->tele}}</span> </h6>
              </div>
              <div class="flex-1 position-relative ps-3 m-2">
                <h6 class="fs-0 mb-0 "> Job : <br><span class="text-500"> {{$profile->job}}  </span> </h6>
              </div>
              <div class="flex-1 position-relative ps-3 m-2">
                <h6 class="fs-0 mb-0">Address: <br> <span class="text-500">{{$profile->contry}} | {{$profile->city}}</span> </h6>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
@endsection