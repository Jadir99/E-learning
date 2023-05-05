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
            <div class="d-flex flex-between-center">
              <h5 class="mb-0 text-truncate">This Course Will Teach You</h5><button class="btn btn-falcon-primary btn-sm" type="button"><span class="d-none d-sm-inline-block align-middle me-1">Preview</span><span class="fas fa-caret-right align-middle"></span></button>
            </div>
          </div>
          <div class="card-body position-relative">
            <div class="bg-holder bg-card d-none d-md-block" style="background-image:url(../../../assets/img/icons/spot-illustrations/corner-6.png);"></div>
            <!--/.bg-holder-->
            <ul class="list-unstyled position-relative row g-2 fs--1 mb-0 p-0">
              <li class="col-md-6 d-flex gap-2"><span class="fas fa-circle mt-1" data-fa-transform="shrink-8"></span><span>{{$course->description}}</span></li>
            </ul>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h5 class="mb-0">Lesson Plans</h5>
          </div>
          <div class="card-body p-0">
            <div class="d-flex align-items-center px-x1 py-2 border-bottom border-200">
              <div class="hoverbox me-3 my-1"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg">
                  <div class="bg-attachment bg-attachment-square">
                    <div class="bg-holder" style="background-image:url(../../../assets/img/elearning/lessons/intro.png);"></div>
                    <!--/.bg-holder-->
                  </div>
                </a>
                <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-1 rounded">
                  <div class="position-relative fs-2 text-white" data-bs-theme="light"><span class="fas fa-play-circle"></span></div>
                </div>
              </div>
              <div class="flex-1">
                <h5 class="fs-0"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-title">Intro</a></h5>
                <p class="fs--1 mb-0">Introduction and Course Objectives</p>
              </div><button class="btn btn-falcon-default btn-sm" type="button"><span class="d-none d-sm-inline-block me-1">Take a Peek</span><span class="fas fa-chevron-down fs--2"></span></button>
            </div>
            <div class="d-flex align-items-center px-x1 py-2 border-bottom border-200">
              <div class="hoverbox me-3 my-1"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg">
                  <div class="bg-attachment bg-attachment-square">
                    <div class="bg-holder" style="background-image:url(../../../assets/img/elearning/lessons/chapter1.png);"></div>
                    <!--/.bg-holder-->
                  </div>
                </a>
                <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-1 rounded">
                  <div class="position-relative fs-2 text-white" data-bs-theme="light"><span class="fas fa-play-circle"></span></div>
                </div>
              </div>
              <div class="flex-1">
                <h5 class="fs-0"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-title">Chapter 1</a></h5>
                <p class="fs--1 mb-0">Tools, nothing more, nothing less</p>
              </div><span class="fas fa-lock fs--1 text-secondary"></span>
            </div>
            <div class="d-flex align-items-center px-x1 py-2 border-bottom border-200">
              <div class="hoverbox me-3 my-1"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg">
                  <div class="bg-attachment bg-attachment-square">
                    <div class="bg-holder" style="background-image:url(../../../assets/img/elearning/lessons/chapter2.png);"></div>
                    <!--/.bg-holder-->
                  </div>
                </a>
                <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-1 rounded">
                  <div class="position-relative fs-2 text-white" data-bs-theme="light"><span class="fas fa-play-circle"></span></div>
                </div>
              </div>
              <div class="flex-1">
                <h5 class="fs-0"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-title">Chapter 2</a></h5>
                <p class="fs--1 mb-0">Choosing the Right Tool</p>
              </div><span class="fas fa-lock fs--1 text-secondary"></span>
            </div>
            <div class="d-flex align-items-center px-x1 py-2 border-bottom border-200">
              <div class="hoverbox me-3 my-1"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg">
                  <div class="bg-attachment bg-attachment-square">
                    <div class="bg-holder" style="background-image:url(../../../assets/img/elearning/lessons/chapter3.png);"></div>
                    <!--/.bg-holder-->
                  </div>
                </a>
                <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-1 rounded">
                  <div class="position-relative fs-2 text-white" data-bs-theme="light"><span class="fas fa-play-circle"></span></div>
                </div>
              </div>
              <div class="flex-1">
                <h5 class="fs-0"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-title">Chapter 3</a></h5>
                <p class="fs--1 mb-0">Getting Comfortable</p>
              </div><span class="fas fa-lock fs--1 text-secondary"></span>
            </div>
            <div class="d-flex align-items-center px-x1 py-2">
              <div class="hoverbox me-3 my-1"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg">
                  <div class="bg-attachment bg-attachment-square">
                    <div class="bg-holder" style="background-image:url(../../../assets/img/elearning/lessons/chapter4.png);"></div>
                    <!--/.bg-holder-->
                  </div>
                </a>
                <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-1 rounded">
                  <div class="position-relative fs-2 text-white" data-bs-theme="light"><span class="fas fa-play-circle"></span></div>
                </div>
              </div>
              <div class="flex-1">
                <h5 class="fs-0"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-title">Chapter 4</a></h5>
                <p class="fs--1 mb-0">Exploring Beyond Comfort</p>
              </div><span class="fas fa-lock fs--1 text-secondary"></span>
            </div>
          </div>
          <div class="card-footer text-end py-1 bg-light"><a class="btn btn-link btn-sm py-2 px-0" href="#!">Full Lesson Plan<span class="fas fa-chevron-down ms-1 fs--2"></span></a></div>
        </div>
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h5 class="mb-0">Requirements</h5>
          </div>
          <div class="card-body position-relative">
            <div class="bg-holder bg-card d-none d-md-block" style="background-image:url(../../../assets/img/icons/spot-illustrations/corner-7.png);"></div>
            <!--/.bg-holder-->
            <ul class="list-unstyled position-relative fs--1 p-0 m-0">
              <li class="mb-2">
                <div class="d-flex"><span class="fas fa-circle me-2 mt-1" data-fa-transform="shrink-8"></span><span>This course requires profieciency in English language as the Lessons are prepared in English.</span></div>
              </li>
              <li class="mb-2">
                <div class="d-flex"><span class="fas fa-circle me-2 mt-1" data-fa-transform="shrink-8"></span><span>Learners with following skills might be more benefited, but little extra work is all that’ll take to catch up to experts’ level</span></div>
                <ol class="bullet-inside mt-2">
                  <li class="mb-2">Comfortable with Computer</li>
                  <li class="mb-2">Access to Internet and Computer</li>
                  <li class="mb-2">Background in Fine Arts or Any Creative Field</li>
                  <li class="mb-2">Digital Drawing Experience</li>
                </ol>
              </li>
            </ul>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-header d-flex flex-between-center">
            <h5 class="mb-0">Trainer</h5><button class="btn btn-falcon-primary btn-sm" type="button"><span class="fas fa-user-plus"></span><span class="d-none d-sm-inline-block align-middle ms-1">Follow</span></button>
          </div>
          <div class="card-body bg-light">
            <div class="row g-4 text-center text-md-start">
              <div class="col-md-auto"><a href="../trainer-profile.html">
                  <div class="avatar avatar-4xl">
                    <img class="rounded-circle" src="../../../assets/img/team/5-thumb.png" alt="" />
                  </div>
                </a></div>
              <div class="col">
                <h5 class="mb-2"> <a href="../trainer-profile.html">Bill Finger</a></h5>
                <h6 class="fs--1 text-800 fw-normal mb-3">Artist | Professional Comic Writer</h6>
                <p class="fs--1 text-700">Finger, an aspiring writer and part-time shoe salesperson, joined Kane's fledgling studio in 1938. Finger was inducted into the Jack Kirby Hall of Fame in 1994 and the <strong>Will Eisner Award Hall of Fame</strong>in 1999 after death. Finger was named one of the awardees in the company's 50th anniversary edition <strong>Fifty Who Made DC </strong>Great in 1985. In his honor, Comic-Con International created the <strong>Bill Finger Award for Excellence </strong>in Comic Book Writing in 2005. In 2014, Finger got a posthumous <strong>Inkpot Award. </strong></p>
                <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-md-start"><span class="badge rounded-pill badge-subtle-light border border-300 text-secondary py-2 px-3"><span class="fas fa-star me-1" data-fa-transform="shrink-4"></span><span>4.95</span></span><span class="badge rounded-pill badge-subtle-light border border-300 text-secondary py-2 px-3"><span class="fas fa-graduation-cap me-1" data-fa-transform="shrink-4"></span><span>35,400</span></span><span class="badge rounded-pill badge-subtle-light border border-300 text-secondary py-2 px-3"><span class="fas fa-file-alt me-1" data-fa-transform="shrink-4"></span><span>15</span></span><span class="badge rounded-pill badge-subtle-light border border-300 text-secondary py-2 px-3"><span class="fas fa-map-pin me-1" data-fa-transform="shrink-4"></span><span>5,700</span></span></div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end py-1"><a class="btn btn-link btn-sm fw-medium py-2 px-0" href="course-list.html">View all his courses<span class="fas fa-external-link-alt ms-1"></span></a></div>
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
            <div class="row g-3 align-items-center text-center text-md-start py-3 border-bottom border-200">
              <div class="col-md-auto"><a href="#!">
                  <div class="avatar avatar-3xl">
                    <img class="rounded-circle" src="../../../assets/img/team/11.jpg" alt="" />
                  </div>
                </a></div>
              <div class="col px-x1 py-2">
                <div class="row">
                  <div class="col-12">
                    <h6 class="fs-0"><a class="me-2" href="#!">Jim Lee</a><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star-half-alt text-warning star-icon"></span></h6>
                  </div>
                  <div class="col-md-10">
                    <p class="fs--1 text-800">Excellent Course for any beginner like me :p The trainer was very generous and helped whenever DMed.</p>
                  </div>
                  <div class="col-12">
                    <div class="fs--2 text-600 d-flex flex-column flex-md-row align-items-center gap-2">
                      <h6 class="fs--2 text-600 mb-0">3 days ago</h6>
                      <p class="mb-0 ms-1">230 people found this helpful</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-auto d-flex justify-content-center gap-2"><button class="btn btn-falcon-default icon-item focus-bg-primary"><span class="fs--2 fas fa-thumbs-up"></span></button><button class="btn btn-falcon-default icon-item focus-bg-secondary"><span class="fs--2 fas fa-thumbs-up" data-fa-transform="rotate-180"></span></button></div>
            </div>
            <div class="row g-3 align-items-center text-center text-md-start py-3 border-bottom border-200">
              <div class="col-md-auto"><a href="#!">
                  <div class="avatar avatar-3xl">
                    <img class="rounded-circle" src="../../../assets/img/team/2-thumb.png" alt="" />
                  </div>
                </a></div>
              <div class="col px-x1 py-2">
                <div class="row">
                  <div class="col-12">
                    <h6 class="fs-0"><a class="me-2" href="#!">Greg Capullo</a><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span></h6>
                  </div>
                  <div class="col-md-10">
                    <p class="fs--1 text-800">Very Sophisticated Content. Helped me a great amount. Going to follow this guy and his other contents.</p>
                  </div>
                  <div class="col-12">
                    <div class="fs--2 text-600 d-flex flex-column flex-md-row align-items-center gap-2">
                      <h6 class="fs--2 text-600 mb-0">5 days ago</h6>
                      <p class="mb-0 ms-1">670 people found this helpful</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-auto d-flex justify-content-center gap-2"><button class="btn btn-falcon-default icon-item focus-bg-primary"><span class="fs--2 fas fa-thumbs-up"></span></button><button class="btn btn-falcon-default icon-item focus-bg-secondary"><span class="fs--2 fas fa-thumbs-up" data-fa-transform="rotate-180"></span></button></div>
            </div>
            <div class="row g-3 align-items-center text-center text-md-start py-3 border-bottom border-200">
              <div class="col-md-auto"><a href="#!">
                  <div class="avatar avatar-3xl">
                    <img class="rounded-circle" src="../../../assets/img/team/7.jpg" alt="" />
                  </div>
                </a></div>
              <div class="col px-x1 py-2">
                <div class="row">
                  <div class="col-12">
                    <h6 class="fs-0"><a class="me-2" href="#!">Frank Miller</a><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span></h6>
                  </div>
                  <div class="col-md-10">
                    <p class="fs--1 text-800">BEST COURSE EVER in this topic. Going to use the knowledge I’ve gathered here. Great content and clear, contextual lessons.</p>
                  </div>
                  <div class="col-12">
                    <div class="fs--2 text-600 d-flex flex-column flex-md-row align-items-center gap-2">
                      <h6 class="fs--2 text-600 mb-0">5 days ago</h6>
                      <p class="mb-0 ms-1">17 people found this helpful</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-auto d-flex justify-content-center gap-2"><button class="btn btn-falcon-default icon-item focus-bg-primary"><span class="fs--2 fas fa-thumbs-up"></span></button><button class="btn btn-falcon-default icon-item focus-bg-secondary"><span class="fs--2 fas fa-thumbs-up" data-fa-transform="rotate-180"></span></button></div>
            </div>
            <div class="row g-3 align-items-center text-center text-md-start py-3 border-bottom border-200">
              <div class="col-md-auto"><a href="#!">
                  <div class="avatar avatar-3xl">
                    <img class="rounded-circle" src="../../../assets/img/team/4-thumb.png" alt="" />
                  </div>
                </a></div>
              <div class="col px-x1 py-2">
                <div class="row">
                  <div class="col-12">
                    <h6 class="fs-0"><a class="me-2" href="#!">Scott Snyder</a><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span></h6>
                  </div>
                  <div class="col-md-10">
                    <p class="fs--1 text-800">I was confused about what tool is good for me and this finally course helped me a lot. I’m definitely going to refer it to my peers.</p>
                  </div>
                  <div class="col-12">
                    <div class="fs--2 text-600 d-flex flex-column flex-md-row align-items-center gap-2">
                      <h6 class="fs--2 text-600 mb-0">7 days ago</h6>
                      <p class="mb-0 ms-1">68 people found this helpful</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-auto d-flex justify-content-center gap-2"><button class="btn btn-falcon-default icon-item focus-bg-primary"><span class="fs--2 fas fa-thumbs-up"></span></button><button class="btn btn-falcon-default icon-item focus-bg-secondary"><span class="fs--2 fas fa-thumbs-up" data-fa-transform="rotate-180"></span></button></div>
            </div>
            <div class="row g-3 align-items-center text-center text-md-start py-3">
              <div class="col-md-auto"><a href="#!">
                  <div class="avatar avatar-3xl">
                    <img class="rounded-circle" src="../../../assets/img/team/10.jpg" alt="" />
                  </div>
                </a></div>
              <div class="col px-x1 py-2">
                <div class="row">
                  <div class="col-12">
                    <h6 class="fs-0"><a class="me-2" href="#!">Bob Kane</a><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star-half-alt text-warning star-icon"></span><span class="fa fa-star text-300"></span></h6>
                  </div>
                  <div class="col-md-10">
                    <p class="fs--1 text-800">This course changed my life. I changed my profession and now I’m living a happy life where I’m in charge. Thanks to both Bill and Falcon.</p>
                  </div>
                  <div class="col-12">
                    <div class="fs--2 text-600 d-flex flex-column flex-md-row align-items-center gap-2">
                      <h6 class="fs--2 text-600 mb-0">8 days ago</h6>
                      <p class="mb-0 ms-1">0 people found this helpful</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-auto d-flex justify-content-center gap-2"><button class="btn btn-falcon-default icon-item focus-bg-primary"><span class="fs--2 fas fa-thumbs-up"></span></button><button class="btn btn-falcon-default icon-item focus-bg-secondary"><span class="fs--2 fas fa-thumbs-up" data-fa-transform="rotate-180"></span></button></div>
            </div>
          </div>
          <div class="card-footer bg-light text-end py-1"><a class="btn btn-link btn-sm py-2 px-0" href="#!">See All Reviewes<span class="fas fa-external-link-alt ms-1"></span></a></div>
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
      @foreach ($course_users as $user)
      
      @if ($user->pivot->access=='confirmer')
              {{ __('yessss')}}
              {{$user->pivot->review}}
              {{$user->pivot->date_review}}
              
              {{-- {{dd($user)}} --}}
          @else
              {{ __('noooooooooooooooooooooooooooooo')}}
          @endif
      @endforeach
      {{-- {{var_dump($course_users)}} --}}
      <h1>kjbikkkkkkkkkkkkkkkkkk</h1>
      
    </div>
    
@endsection