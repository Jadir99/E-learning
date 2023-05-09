@extends('Courses.layoutt')


@section('title')
E-Learning detail
@endsection


@section('courses')
    
<div class="content">
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
    <div class="card overflow-hidden mb-3" data-bs-theme="light">
      <div class="card-body bg-black">
        {{-- l'image de toutes les choses --}}
        <div class="bg-holder rounded-3 bg-dark" style="background-image:url(../../../assets/img/icons/spot-illustrations/course-details-bg.png);" ></div>
        <!--/.bg-holder-->
        <div class="row">
          <div class="col-xl-8 position-relative">
            <div class="row g-3 align-items-center">
              <div class="col-lg-5">
                <div class="position-relative">
                    {{-- l'image de video  --}}
                  <div class="bg-holder rounded-1 overlay" style="background-image:url('{{ asset("iamges/". $course->image) }}');"></div>
                  <!--/.bg-holder-->
                  <a class="text-decoration-none position-relative d-block py-7 text-center" href="\iamges\{{$course->image}}" data-gallery="attachment-bg"><img class="rounded-1" src="" width="60" alt="" /></a>
                </div>
              </div>
              <div class="col-lg-7">
                <h6 class="fw-semi-bold text-400">A course by <a class="text-info" href="../trainer-profile.html">{{$course->user->name}}/{{($course->count())}}</a></h6>
                
                <p class="text-white fw-semi-bold fs--1"><span class="me-1">4.8</span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star-half-alt text-warning star-icon"></span><span class="text-info ms-2">(6,899 reviews)</span></p>
                <p class="mb-0 fw-medium text-400"> {{$course->description}} ...<a class="text-info" href="#!"> See more</a></p>
              </div>
            </div>
            <hr class="text-secondary text-opacity-50" />
            <ul class="list-unstyled d-flex flex-wrap gap-3 fs--1 fw-semi-bold text-300 mt-3 mb-0">
              <li><span class="fas fa-graduation-cap text-white me-1"> </span>7,302 Learners </li>
              <li><span class="fas fa-user-graduate text-white me-1"> </span>91% Completion</li>
              <li><span class="fas fa-headphones text-white me-1"> </span>English</li>
              <li><span class="fas fa-closed-captioning text-white me-1"> </span>English</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row g-lg-3">
      <div class="col-lg-8 order-1 order-lg-0">
        <div class="card mb-3 bg-transparent border shadow-none">
          <div class="card-body">
            <div class="row gy-4 text-center text-md-start">
              <div class="col-md-4"><img class="mb-3" src="../../../assets/img/icons/target.svg" width="36" alt="" />
                <h6 class="fs-0 text-primary">Improve in A purposed Manner</h6>
                <p class="fs--1 mb-0">Improve your skills by immersing yourself in a learning environment with professional instruction and limited access at a time.</p>
              </div>
              <div class="col-md-4"><img class="mb-3" src="../../../assets/img/icons/discount.svg" width="36" alt="" />
                <h6 class="fs-0 text-primary">Get Exclusive Deals and Discounts</h6>
                <p class="fs--1 mb-0">Online discussion and crucial insights, Adobe vouchers, and more are all available solely to you and your fellow learners to get you going.</p>
              </div>
              <div class="col-md-4"><img class="mb-3" src="../../../assets/img/icons/networking.svg" width="36" alt="" />
                <h6 class="fs-0 text-primary">Networking with Fellow Artists</h6>
                <p class="fs--1 mb-0">Learn, work together and connect with other learners tools like a common purpose Discord and Slack channel and showcase your works.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h5 class="mb-0">Lesson Plans</h5>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive scrollbar">
              <table class="table table-borderless mb-0 fs--1 overflow-hidden">
                <tbody>
                  @foreach ($parties as $part)
      
                  <tr class="btn-reveal-trigger bg-light">
                    <td class="align-middle white-space-nowrap">
                      <div class="d-flex gap-3 align-items-center position-relative"><img class="rounded-1 border border-200" src="../../../assets/img/elearning/lessons/intro.png" width="60" alt="" />
                        <div>
                          <h5 class="fs-0 text-primary"><a href="{{route('parties.show',['party'=>$part->id])}}">{{$part->title_partie}}</a><span data-bs-toggle="tooltip" data-bs-placement="top" title="Requirement fulfilled"><span class="text-primary fs-0 ms-2 fas fa-check-circle"></span></span></h5>
                          <p class="fs--1 text-900 mb-0">{{$part->description_partie}}</p>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle white-space-nowrap fs--1 text-700">
                      <p class="mb-1">create at {{$part->date_pub_partie}}</p>
                    </td>
                    @if ($course->user_id==Auth::user()->id)

                    <td class="align-middle white-space-nowrap text-end">
                      <div class="dropdown font-sans-serif position-static d-inline-block btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none float-end" type="button" id="dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-0"><a class="dropdown-item" href="{{route('parties.show',['party'=>$part->id])}}">View</a><a class="dropdown-item" href="#!">Edit</a>
                          <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Delete</a>
                        </div>
                      </div>
                    </td>
                        
                    @endif
                  </tr>
                      
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer text-end py-1 bg-light"><a class="btn btn-link btn-sm py-2 px-0" href="#!">Full Lesson Plan<span class="fas fa-chevron-down ms-1 fs--2"></span></a></div>
        </div>
        <div class="card mb-3">
          <div class="card-header bg-light d-flex flex-between-center">
            <h5 class="mb-0">Reviews</h5>
            <div class="d-flex gap-2"> <button class="btn btn-falcon-default btn-sm" type="button"><span class="d-none d-sm-inline-block me-1">Filter</span><span class="fs--2 fas fa-filter"></span></button>
              <div> <select class="form-select form-select-sm">
                  <option value="" selected="selected">Sort by</option>
                  <option value="oldest">Oldest</option>
                  <option value="newest">Newest</option>
                  <option value="name">Name</option>
                </select></div>
            </div>
          </div>
        <div class="card-body py-0">

          @foreach ($reviews as $review)
              
          
            <div class="row g-3 align-items-center text-center text-md-start py-3 border-bottom border-200">

              <div class="col-md-auto"><a href="#!">
                  <div class="avatar avatar-3xl">
                    <img class="rounded-circle" src="\images\users\{{$review->profile_image_path}}" alt="" />
                  </div>
                </a></div>
              <div class="col px-x1 py-2">
                <div class="row">
                  <div class="col-12">
                    <h6 class="fs-0"><a class="me-2" href="#!">{{$review->name}}</a>
                      <span class="d-none">{{$nbr=$review->review/20}}</span>
                      @for ($i = 0; $i < $nbr; $i++)
                        <span class="fa fa-star text-warning"></span>
                      @endfor
                      @for ($i = 0; $i < 5-$nbr; $i++)
                        <span class="far fa-star text-warning"></span>
                      @endfor
                    </h6>
                  </div>
                  <div class="col-md-10">
                    <p class="fs--1 text-800"> {{$review->comment}}.</p>
                  </div>
                  <div class="col-12">
                    <div class="fs--2 text-600 d-flex flex-column flex-md-row align-items-center gap-2">
                      <h6 class="fs--2 text-600 mb-0">At {{$review->date_review}} </h6>
                      </p>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-auto d-flex justify-content-center gap-2"><button class="btn btn-falcon-default icon-item focus-bg-primary"><span class="fs--2 fas fa-thumbs-up"></span></button><button class="btn btn-falcon-default icon-item focus-bg-secondary"><span class="fs--2 fas fa-thumbs-up" data-fa-transform="rotate-180"></span></button></div>
            </div>

          @endforeach
          </div>
            <div class=" ">
              <div class="container">
                <p>Click on a star to rate:</p>
                <!-- <span class="far fa-star text-warning " id="star1" onclick="rate(1)"></span> -->
                  
                <span class="far fa-star text-warning "id="star1" onclick="rate(1)"></span> 
                <span class="far fa-star text-warning " id="star2" onclick="rate(2)"></span>
                <span class="far fa-star text-warning " id="star3" onclick="rate(3)"></span>
                <span class="far fa-star text-warning " id="star4" onclick="rate(4)"></span>
                <span class="far fa-star text-warning " id="star5" onclick="rate(5)"></span>
              {{-- <p>Your rating is: <span id="rating"></span></p> --}}
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            

            <form action="{{route('courses.insert_review_comment')}}" method="post">
              @csrf
              {{-- @method('put') --}}
              <input type="hidden" name="review" id="rating" value="">
              <input type="hidden" name="course_id" value="{{$course->id}}">
              <textarea name="comment" id=""  cols="80%"placeholder="print your comment"></textarea>
              {{-- <div class="emojiarea-editor outline-none scrollbar" contenteditable="true"></div>
              <div class="btn btn-link emoji-icon" data-picmo="data-picmo" data-picmo-input-target=".emojiarea-editor"><span class="far fa-laugh-beam"></span></div> --}}
              <button type='submit'>kkkkkkkkkk</button>
            </form>
            <form action="{{route('courses.insert_review_comment')}}" method="post" enctype="multipart/form-data">
              @csrf
              {{-- @method('put')  --}}
              <button type="submit">nnnnnnnn</button>
            </form>
            <script>
              // Define a function to handle rating
              function rate(star) {
                for (var i = 1; i <= 5; i++) {
                  if (i <= star) {
                    $('#star' + i).removeClass('far fa-star text-warning').addClass('fa fa-star text-warning');
                  } else {
                    $('#star' + i).removeClass('fa fa-star text-warning').addClass('far fa-star text-warning');
                  }
                }
                // Set the rating value as 20% per star
                var rating1 = star * 20;
                // Update the rating display
                $('#rating').val(rating1);
                
                
              }
            </script>
          </div>

        </div>
        <div class="card">
          <div class="card-header">
            <h6 class="fs-0 mb-0">Similar Courses</h6>
          </div>
          <div class="card-body py-0 bg-light">
            <div class="swiper-container theme-slider py-x1" data-swiper='{"autoplay":true,"spaceBetween":10,"slidesPerView":1,"breakpoints":{"460":{"slidesPerView":1.5},"768":{"slidesPerView":2},"1540":{"slidesPerView":2.5}},"loop":true,"navigation":{"nextEl":".swiper-button-next","prevEl":".swiper-button-prev"}}'>
              <div class="swiper-wrapper">
                <article class="swiper-slide h-auto">
                  <div class="card h-100 overflow-hidden">
                    <div class="card-body p-0 d-flex flex-column justify-content-between">
                      <div>
                        <div class="hoverbox text-center"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="../../../assets/img/elearning/courses/course1.png" alt="" /></a>
                          <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-2"><img class="z-1" src="../../../assets/img/icons/play.svg" width="60" alt="" /></div>
                        </div>
                        <div class="p-3">
                          <h5 class="fs-0 mb-2"><a class="text-dark" href="course-details.html">Script Writing Masterclass: Introdution to Industry Cliches</a></h5>
                          <h5 class="fs-0"><a href="../trainer-profile.html">Bill Finger</a></h5>
                        </div>
                      </div>
                      <div class="row g-0 mb-3 align-items-end">
                        <div class="col ps-3">
                          <h4 class="fs-1 text-warning d-flex align-items-center"> <span>$69.50</span><del class="ms-2 fs--1 text-700">$139.90</del></h4>
                          <p class="mb-0 fs--1 text-800">92,632 Learners Enrolled</p>
                        </div>
                        <div class="col-auto pe-3"><a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="far fa-heart" data-fa-transform="down-2"></span></a><a class="btn btn-sm btn-falcon-default hover-primary" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart"><span class="fas fa-cart-plus" data-fa-transform="down-2"></span></a></div>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="swiper-slide h-auto">
                  <div class="card h-100 overflow-hidden">
                    <div class="card-body p-0 d-flex flex-column justify-content-between">
                      <div>
                        <div class="hoverbox text-center"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="../../../assets/img/elearning/courses/course2.png" alt="" /></a>
                          <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-2"><img class="z-1" src="../../../assets/img/icons/play.svg" width="60" alt="" /></div>
                        </div>
                        <div class="p-3">
                          <h5 class="fs-0 mb-2"><a class="text-dark" href="course-details.html">Composition in Comics: Easy to Read Between Panels</a></h5>
                          <h5 class="fs-0"><a href="../trainer-profile.html">Bill Finger</a></h5>
                        </div>
                      </div>
                      <div class="row g-0 mb-3 align-items-end">
                        <div class="col ps-3">
                          <h4 class="fs-1 text-warning d-flex align-items-center"> <span>$39.99</span><del class="ms-2 fs--1 text-700">$139.90</del></h4>
                          <p class="mb-0 fs--1 text-800">92,603 Learners Enrolled</p>
                        </div>
                        <div class="col-auto pe-3"><a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="far fa-heart" data-fa-transform="down-2"></span></a><a class="btn btn-sm btn-falcon-default hover-primary" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart"><span class="fas fa-cart-plus" data-fa-transform="down-2"></span></a></div>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="swiper-slide h-auto">
                  <div class="card h-100 overflow-hidden">
                    <div class="card-body p-0 d-flex flex-column justify-content-between">
                      <div>
                        <div class="hoverbox text-center"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="../../../assets/img/elearning/courses/course3.png" alt="" /></a>
                          <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-2"><img class="z-1" src="../../../assets/img/icons/play.svg" width="60" alt="" /></div>
                        </div>
                        <div class="p-3">
                          
                          <h5 class="fs-0"><a href="../trainer-profile.html">Bill Finger</a></h5>
                        </div>
                      </div>
                      <div class="row g-0 mb-3 align-items-end">
                        <div class="col ps-3">
                          <h4 class="fs-1 text-warning d-flex align-items-center"> <span>$69.50</span><del class="ms-2 fs--1 text-700">$139.90</del></h4>
                          <p class="mb-0 fs--1 text-800">11,000 Learners Enrolled</p>
                        </div>
                        <div class="col-auto pe-3"><a class="btn btn-sm btn-falcon-default me-2" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove from wishlist"><span class="fas fa-heart text-danger" data-fa-transform="down-2"></span></a><a class="btn btn-sm btn-falcon-default hover-primary" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart"><span class="fas fa-cart-plus" data-fa-transform="down-2"></span></a></div>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="swiper-slide h-auto">
                  <div class="card h-100 overflow-hidden">
                    <div class="card-body p-0 d-flex flex-column justify-content-between">
                      <div>
                        <div class="hoverbox text-center"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="../../../assets/img/elearning/courses/course4.png" alt="" /></a>
                          <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-2"><img class="z-1" src="../../../assets/img/icons/play.svg" width="60" alt="" /></div>
                        </div>
                        <div class="p-3">
                          <h5 class="fs-0 mb-2"><a class="text-dark" href="course-details.html">Comic Page Layout: Analysing The Classics</a></h5>
                          <h5 class="fs-0"><a href="../trainer-profile.html">Bill Finger</a></h5>
                        </div>
                      </div>
                      <div class="row g-0 mb-3 align-items-end">
                        <div class="col ps-3">
                          <h4 class="fs-1 text-warning d-flex align-items-center"> <span>$49.50</span><del class="ms-2 fs--1 text-700">$139.90</del></h4>
                          <p class="mb-0 fs--1 text-800">32,106 Learners Enrolled</p>
                        </div>
                        <div class="col-auto pe-3"><a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="far fa-heart" data-fa-transform="down-2"></span></a><a class="btn btn-sm btn-primary" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove from Cart"><span class="fas fa-shopping-cart" data-fa-transform="down-2"></span></a></div>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="swiper-slide h-auto">
                  <div class="card h-100 overflow-hidden">
                    <div class="card-body p-0 d-flex flex-column justify-content-between">
                      <div>
                        <div class="hoverbox text-center"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="../../../assets/img/elearning/courses/course5.png" alt="" /></a>
                          <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-2"><img class="z-1" src="../../../assets/img/icons/play.svg" width="60" alt="" /></div>
                        </div>
                        <div class="p-3">
                          <h5 class="fs-0 mb-2"><a class="text-dark" href="course-details.html">Abstract Painting: Zero to Mastery in Traditional Medium</a></h5>
                          <h5 class="fs-0"><a href="../trainer-profile.html">J. H. Williams III</a></h5>
                        </div>
                      </div>
                      <div class="row g-0 mb-3 align-items-end">
                        <div class="col ps-3">
                          <h4 class="fs-1 text-warning d-flex align-items-center"> <span>$69.50</span><del class="ms-2 fs--1 text-700">$139.90</del></h4>
                          <p class="mb-0 fs--1 text-800">2,304 Learners Enrolled</p>
                        </div>
                        <div class="col-auto pe-3"><a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="far fa-heart" data-fa-transform="down-2"></span></a><a class="btn btn-sm btn-falcon-default hover-primary" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart"><span class="fas fa-cart-plus" data-fa-transform="down-2"></span></a></div>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="swiper-slide h-auto">
                  <div class="card h-100 overflow-hidden">
                    <div class="card-body p-0 d-flex flex-column justify-content-between">
                      <div>
                        <div class="hoverbox text-center"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="../../../assets/img/elearning/courses/course6.png" alt="" /></a>
                          <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-2"><img class="z-1" src="../../../assets/img/icons/play.svg" width="60" alt="" /></div>
                        </div>
                        <div class="p-3">
                          <h5 class="fs-0 mb-2"><a class="text-dark" href="course-details.html">Inking: Choosing Between Analog vs Digital</a></h5>
                          <h5 class="fs-0"><a href="../trainer-profile.html">Bill Finger</a></h5>
                        </div>
                      </div>
                      <div class="row g-0 mb-3 align-items-end">
                        <div class="col ps-3">
                          <h4 class="fs-1 text-warning d-flex align-items-center"> <span>$39.99</span><del class="ms-2 fs--1 text-700">$139.90</del></h4>
                          <p class="mb-0 fs--1 text-800">9,312 Learners Enrolled</p>
                        </div>
                        <div class="col-auto pe-3"><a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="far fa-heart" data-fa-transform="down-2"></span></a><a class="btn btn-sm btn-falcon-default hover-primary" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart"><span class="fas fa-cart-plus" data-fa-transform="down-2"></span></a></div>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="swiper-slide h-auto">
                  <div class="card h-100 overflow-hidden">
                    <div class="card-body p-0 d-flex flex-column justify-content-between">
                      <div>
                        <div class="hoverbox text-center"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="../../../assets/img/elearning/courses/course7.png" alt="" /></a>
                          <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-2"><img class="z-1" src="../../../assets/img/icons/play.svg" width="60" alt="" /></div>
                        </div>
                        <div class="p-3">
                          <h5 class="fs-0 mb-2"><a class="text-dark" href="course-details.html">Character Design Masterclass: Your First Supervillain</a></h5>
                          <h5 class="fs-0"><a href="../trainer-profile.html">Bill Finger</a></h5>
                        </div>
                      </div>
                      <div class="row g-0 mb-3 align-items-end">
                        <div class="col ps-3">
                          <h4 class="fs-1 text-warning d-flex align-items-center"> <span>$99.90</span><del class="ms-2 fs--1 text-700">$139.90</del></h4>
                          <p class="mb-0 fs--1 text-800">292,603 Learners Enrolled</p>
                        </div>
                        <div class="col-auto pe-3"><a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="far fa-heart" data-fa-transform="down-2"></span></a><a class="btn btn-sm btn-falcon-default hover-primary" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart"><span class="fas fa-cart-plus" data-fa-transform="down-2"></span></a></div>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="swiper-slide h-auto">
                  <div class="card h-100 overflow-hidden">
                    <div class="card-body p-0 d-flex flex-column justify-content-between">
                      <div>
                        <div class="hoverbox text-center"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="../../../assets/img/elearning/courses/course8.png" alt="" /></a>
                          <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-2"><img class="z-1" src="../../../assets/img/icons/play.svg" width="60" alt="" /></div>
                        </div>
                        <div class="p-3">
                          <h5 class="fs-0 mb-2"><a class="text-dark" href="course-details.html">Character Design Masterclass: Your First Superhero</a></h5>
                          <h5 class="fs-0"><a href="../trainer-profile.html">Bill Finger</a></h5>
                        </div>
                      </div>
                      <div class="row g-0 mb-3 align-items-end">
                        <div class="col ps-3">
                          <h4 class="fs-1 text-warning d-flex align-items-center"> <span>$69.99</span><del class="ms-2 fs--1 text-700">$139.90</del></h4>
                          <p class="mb-0 fs--1 text-800">90,304 Learners Enrolled</p>
                        </div>
                        <div class="col-auto pe-3"><a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="far fa-heart" data-fa-transform="down-2"></span></a><a class="btn btn-sm btn-falcon-default hover-primary" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart"><span class="fas fa-cart-plus" data-fa-transform="down-2"></span></a></div>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="swiper-slide h-auto">
                  <div class="card h-100 overflow-hidden">
                    <div class="card-body p-0 d-flex flex-column justify-content-between">
                      <div>
                        <div class="hoverbox text-center"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="../../../assets/img/elearning/courses/course9.png" alt="" /></a>
                          <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-2"><img class="z-1" src="../../../assets/img/icons/play.svg" width="60" alt="" /></div>
                        </div>
                        <div class="p-3">
                          <h5 class="fs-0 mb-2"><a class="text-dark" href="course-details.html">Character Design Masterclass: Your First Sidekick</a></h5>
                          <h5 class="fs-0"><a href="../trainer-profile.html">Bill Finger</a></h5>
                        </div>
                      </div>
                      <div class="row g-0 mb-3 align-items-end">
                        <div class="col ps-3">
                          <h4 class="fs-1 text-warning d-flex align-items-center"> <span>$69.99</span><del class="ms-2 fs--1 text-700">$139.90</del></h4>
                          <p class="mb-0 fs--1 text-800">66,304 Learners Enrolled</p>
                        </div>
                        <div class="col-auto pe-3"><a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="far fa-heart" data-fa-transform="down-2"></span></a><a class="btn btn-sm btn-falcon-default hover-primary" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart"><span class="fas fa-cart-plus" data-fa-transform="down-2"></span></a></div>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
              <div class="swiper-nav">
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end py-1"><a class="btn btn-link btn-sm py-2 px-0" href="course-grid.html">All courses<span class="fas fa-external-link-alt ms-1"></span></a></div>
        </div>
      </div>
    </div>
    <div class="card rounded-0 bottom-bar d-lg-none" data-bottom-bar='{"target":"course-purchase-btn","offsetTop":60,"breakPoint":"lg"}'>
      <div class="card-body py-2">
        <div class="d-flex gap-3 flex-between-center">
          <h2 class="mb-0 fw-medium d-flex align-items-center">$47.49<del class="d-none d-sm-block ms-2 fs--1 text-500">$69.99</del></h2><button class="btn btn-primary btn-lg fs-0 flex-1">Purchase this course</button>
        </div>
      </div>
    </div>
    <div>
      
      
    </div>
    
@endsection