
@extends('Courses.layoutt')


@section('title')
E-Learning courses
@endsection
@section('courses')
<span class="d-none">{{$courses=App\Http\Controllers\CourseController::show_courses_allowed()}}</span>


<div class="container " data-layout="container">
  <div class="content  ">
    <script>
      var navbarPosition = localStorage.getItem('navbarPosition');
      var navbarTop = document.querySelector('[data-layout] .navbar-top:not([data-double-top-nav');
      var navbarDoubleTop = document.querySelector('[data-double-top-nav]');

      if (localStorage.getItem('navbarPosition') === 'double-top') {
        document.documentElement.classList.toggle('double-top-nav-layout');
      }

      if (navbarPosition === 'double-top') {
        navbarDoubleTop.removeAttribute('style');
        navbarTop.remove(navbarTop);
      } else {
        navbarTop.removeAttribute('style');
        navbarDoubleTop.remove(navbarDoubleTop);
      }
    </script>
    <div class="row g-3 ">
      <div class="col-lg-4 col-xl-3">
        <div class="sticky-sidebar top-navbar-height">
          <div class="card">
            <div class="card-body">
              <div class="row g-3 align-items-center">
                <div class="col-md-6 col-lg-12 text-center"><img class="img-fluid rounded-3" src="\images\users\{{Auth::user()->profile_image_path}}" alt="" /></div>
                <div class="col-md-6 col-lg-12">
                  <div class="row row-cols-1 g-0">
                    <div class="col text-center">
                      <h4>{{Auth::user()->name}} </h4>
                      <h5 class="mb-1 text-800 fs-0">{{Auth::user()->job}}</h5>
                      <h5 class="mb-1 text-800 fs-0">{{Auth::user()->tele}}</ >
                      <p class="mb-0 fs--1">  {{Auth::user()->city}} in {{Auth::user()->contry}} </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-xl-9">
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h6 class="mb-0">About me </h6>
          </div>
          <div class="card-body">
            <div class="row flex-between-center">
              <div class="col-xxl-9 text-1000">
                <p>{{Auth::user()->Description_about_u}}.</p>
              </div>
              <div class="col-xxl-3 mt-4 mt-xxl-0 d-flex justify-content-center">
                <ul class="list-unstyled mb-0 d-flex flex-wrap flex-xxl-column gap-3 justify-content-center">
                  <li><a class="text-800 hover-primary hover-text-decoration-none" href="#!"><span class="fas fa-globe"></span><span class="fw-semi-bold ms-2">Website</span></a></li>
                  <li><a class="text-800 hover-primary hover-text-decoration-none" href="#!"><span class="fab fa-linkedin"></span><span class="fw-semi-bold ms-2">LinkedIn</span></a></li>
                  <li><a class="text-800 hover-primary hover-text-decoration-none" href="#!"><span class="fab fa-facebook"></span><span class="fw-semi-bold ms-2">Facebook</span></a></li>
                  <li><a class="text-800 hover-primary hover-text-decoration-none" href="#!"><span class="fab fa-instagram"></span><span class="fw-semi-bold ms-2">Instagram</span></a></li>
                  <li><a class="text-800 hover-primary hover-text-decoration-none" href="#!"><span class="fab fa-pinterest"></span><span class="fw-semi-bold ms-2">Pinterest</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header bg-light d-flex flex-between-center py-2">
            <h6 class="mb-0">The courses I signed up for</h6>
            <div><select class="form-select form-select-sm">
                <option value="" selected="selected">Sort by</option>
                <option value="oldest">Oldest</option>
                <option value="newest">Newest</option>
                <option value="name">Name</option>
              </select></div>
          </div>
          <div class="row mb-3 g-3" id="allcourses">
            
            @foreach ($courses as $course)
            <article class="col-md-6 col-xxl-4">
              <div class="card h-101 overflow-hidden">
                <div class="card-body p-0 d-flex flex-column justify-content-between">
                  <div>
                    <div class="hoverbox text-center"><a class="text-decoration-none" href="\iamges\{{$course->image}}" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="\iamges\{{$course->image}}" alt="" /></a>
                    </div>
                    <div class="p-2 pb-1 ">
                      <h5 class="fs-0 mb-2"><a class="text-dark" href="{{route('courses.show',['course'=>$course->course_id])}}"> {{$course->title}}</a></h5>
                      <h5 class="fs-0"><a href="">{{$course->name_former	}}</a></h5><br>
                    </div>
                  </div>
                  <div class="row g-0 mb-2 align-items-end">
                    <div class="col ps-3">
                      <h4 class="fs-1 text-warning d-flex align-items-center"> 
                        <span>
                          
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
                        </span></h4> 
                    </div>
                    <div class="col-auto pe-3">
                      <a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="far fa-heart" data-fa-transform="down-2"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </article>
            @endforeach
    
          </div>
          <div class="card-footer py-2 bg-light d-flex justify-content-end"><button class="btn btn-falcon-default btn-sm me-2" type="button" disabled="disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Prev"><span class="fas fa-chevron-left"></span></button><a class="btn btn-sm btn-falcon-default text-primary me-2" href="#!">1</a><a class="btn btn-sm btn-falcon-default me-2" href="#!">2</a><a class="btn btn-sm btn-falcon-default me-2" href="#!">3</a><button class="btn btn-falcon-default btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Next"><span class="fas fa-chevron-right"></span></button></div>
        </div>
        
    {{-- my courses  --}} <br>
        <div class="card">
          <div class="card-header bg-light d-flex flex-between-center py-2">
            <h6 class="mb-0">My courses </h6>
            <div><select class="form-select form-select-sm">
                <option value="" selected="selected">Sort by</option>
                <option value="oldest">Oldest</option>
                <option value="newest">Newest</option>
                <option value="name">Name</option>
              </select></div>
          </div>
          <div class="row mb-3 g-3" id="allcourses">
            
            @foreach ($user_courses as $user_course)
          @if ($user_course->id==Auth::user()->id)
              
          
              @foreach ($user_course->former as $item)
              <article class="col-md-6 col-xxl-4">
                <div class="card h-120 overflow-hidden">
                  <div class="card-body p-0 d-flex flex-column justify-content-between">
                    <div>
                      <div class="hoverbox text-center"><a class="text-decoration-none" href="\iamges\{{$item->image}}" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="\iamges\{{$item->image}}" alt="" /></a>
                      </div>
                      <div class="p-2 pb-1 ">
                        <h5 class="fs-0 mb-2"><a class="text-dark" href="{{route('courses.show',['course'=>$item->id])}}"> {{$item->title}}</a></h5>
                        <h5 class="fs-0"><a href="">{{Auth::user()->name	}}</a></h5><br>
                      </div>
                    </div>
                    <div class="row g-0 mb-3 align-items-end">
                      <div class="col ps-3">
                        <h4 class="fs-1 text-warning d-flex align-items-center"> 
                          <span>
                          
                            @foreach ($reviews as $review)
                              <span class="d-none">{{$review->course_id}}</span>
                              @if ($review->id==$item->id)
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
              
                      </span></h4> <br>
                      
                    </div>
                    <div class="col-auto pe-3">
                      <a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="far fa-heart" data-fa-transform="down-2"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </article>
            @endforeach
            @endif
            @endforeach
          
          </div>
          <div class="card-footer py-2 bg-light d-flex justify-content-end"><button class="btn btn-falcon-default btn-sm me-2" type="button" disabled="disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Prev"><span class="fas fa-chevron-left"></span></button><a class="btn btn-sm btn-falcon-default text-primary me-2" href="#!">1</a><a class="btn btn-sm btn-falcon-default me-2" href="#!">2</a><a class="btn btn-sm btn-falcon-default me-2" href="#!">3</a><button class="btn btn-falcon-default btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Next"><span class="fas fa-chevron-right"></span></button></div>
        </div>
      </div>
      
    </div>
    
    
  </div>
  
</div>

    
@endsection