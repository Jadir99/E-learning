@extends('Courses.layoutt')

@section('title')
E-Learning courses
@endsection
@section('courses')
        <div class="content">
          
          <div class="row g-3">
            <div class="col-lg-4 col-xl-3">
              <div class="sticky-sidebar top-navbar-height">
                <div class="card">
                  <div class="card-body">
                    <div class="row g-3 align-items-center">
                      <div class="col-md-6 col-lg-12 text-center"><img class="img-fluid rounded-3" src="../../assets/img/elearning/avatar/trainer.png" alt="" /></div>
                      <div class="col-md-6 col-lg-12">
                        <div class="row row-cols-1 g-0">
                          <div class="col text-center">
                            <h4>{{Auth::user()->name}}</h4>
                            <h5 class="mb-1 text-800 fs-0">Artist | Comic Writer</h5>
                            <p class="mb-0 fs--1">National Comics Publications, NY, USA</p>
                          </div>
                          <div class="col mt-4 mt-md-5 mt-lg-4 order-md-1 order-lg-0"><button class="btn btn-falcon-default btn-md mb-2 w-100" type="button"><span class="fas fa-comment me-1"> </span>Message</button><button class="btn btn-primary btn-md w-100" type="button"><span class="fas fa-heart me-1"> </span>Follow</button></div>
                          <div class="col mt-4 mt-md-5 mt-lg-4">
                            <div class="row text-center">
                              <div class="col-6 border-end-sm border-300"><img class="mb-2" src="../../assets/img/icons/user-plus.svg" width="30" alt="" />
                                <h4 class="text-700" data-countup='{"endValue":79563}'>0</h4>
                                <h6 class="fw-normal mb-0">Following</h6>
                              </div>
                              <div class="col-6"><img class="mb-2" src="../../assets/img/icons/users.svg" width="30" alt="" />
                                <h4 class="text-700" data-countup='{"endValue":120302}'>0</h4>
                                <h6 class="fw-normal mb-0">Followers</h6>
                              </div>
                            </div>
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
                  <h6 class="mb-0">Introduction</h6>
                </div>
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-xxl-9 text-1000">
                      <p>Milton Finger (born February 8, 1914), better known as Bill Finger, was an American comic strip, comic book, film, and television writer who co-created the DC Comics superhero character Batman (along with Bob Kane).</p>
                      <p>A young, promising writer and part-time shoe dealer Finger, joined Kane's fledgling studio in 1938. Despite his significant (and often iconic) contributions as an imaginative writer, visionary mythos/world builder, and illustration creator, Finger was frequently reduced to ghostwriter status on a number of comics, including Batman and Green Lantern (Original Version).</p>
                      <p>In 1994, Finger was welcomed into the Jack Kirby Hall of Fame, and in 1999, he was inducted into the Will Eisner Award Hall of Fame. In 1985, the company recognised Finger as one of the awardees in their 50th anniversary edition of Fifty Who Made DC Great. In 2014, Finger was posthumously awarded The Inkpot Award.</p>
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
                  <h6 class="mb-0">Other Courses by Bill Finger</h6>
                  <div><select class="form-select form-select-sm">
                      <option value="" selected="selected">Sort by</option>
                      <option value="oldest">Oldest</option>
                      <option value="newest">Newest</option>
                      <option value="name">Name</option>
                    </select></div>
                </div>
                <div class="card-body">
                  <div class="row g-3">
                    <article class="col-md-6 col-xxl-4">
                      <div class="card h-100 overflow-hidden">
                        <div class="card-body p-0 d-flex flex-column justify-content-between">
                          <div>
                            <div class="hoverbox text-center"><a class="text-decoration-none" href="../../assets/video/beach.mp4" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="../../assets/img/elearning/courses/course9.png" alt="" /></a>
                              <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-2"><img class="z-1" src="../../assets/img/icons/play.svg" width="60" alt="" /></div>
                            </div>
                            <div class="p-3">
                              <h5 class="fs-0 mb-2"><a class="text-dark" href="course/course-details.html">Character Design Masterclass: Your First Sidekick</a></h5>
                              <h5 class="fs-0"><a href="trainer-profile.html">Bill Finger</a></h5>
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
                </div>
                <div class="card-footer py-2 bg-light d-flex justify-content-end"><button class="btn btn-falcon-default btn-sm me-2" type="button" disabled="disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Prev"><span class="fas fa-chevron-left"></span></button><a class="btn btn-sm btn-falcon-default text-primary me-2" href="#!">1</a><a class="btn btn-sm btn-falcon-default me-2" href="#!">2</a><a class="btn btn-sm btn-falcon-default me-2" href="#!">3</a><button class="btn btn-falcon-default btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Next"><span class="fas fa-chevron-right"></span></button></div>
              </div>







              
              {{-- youre courses  --}}
              <div class="card">
                <div class="card-header bg-light d-flex flex-between-center py-2">
                  <h6 class="mb-0">Other Courses by Bill Finger</h6>
                  <div><select class="form-select form-select-sm">
                      <option value="" selected="selected">Sort by</option>
                      <option value="oldest">Oldest</option>
                      <option value="newest">Newest</option>
                      <option value="name">Name</option>
                    </select></div>
                </div>
                <div class="card-body">
                  <div class="row g-3">
                    <article class="col-md-6 col-xxl-4">
                      <div class="card h-100 overflow-hidden">
                        <div class="card-body p-0 d-flex flex-column justify-content-between">
                          <div>
                            <div class="hoverbox text-center"><a class="text-decoration-none" href="../../assets/video/beach.mp4" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="../../assets/img/elearning/courses/course9.png" alt="" /></a>
                              <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-2"><img class="z-1" src="../../assets/img/icons/play.svg" width="60" alt="" /></div>
                            </div>
                            <div class="p-3">
                              <h5 class="fs-0 mb-2"><a class="text-dark" href="course/course-details.html">Character Design Masterclass: Your First Sidekick</a></h5>
                              <h5 class="fs-0"><a href="trainer-profile.html">Bill Finger</a></h5>
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
                </div>
                <div class="card-footer py-2 bg-light d-flex justify-content-end"><button class="btn btn-falcon-default btn-sm me-2" type="button" disabled="disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Prev"><span class="fas fa-chevron-left"></span></button><a class="btn btn-sm btn-falcon-default text-primary me-2" href="#!">1</a><a class="btn btn-sm btn-falcon-default me-2" href="#!">2</a><a class="btn btn-sm btn-falcon-default me-2" href="#!">3</a><button class="btn btn-falcon-default btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Next"><span class="fas fa-chevron-right"></span></button></div>
              </div>
            </div>
          </div>
        </div>
      </div>

    
@endsection