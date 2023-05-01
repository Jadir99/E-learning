@extends('Courses.layoutt')

@section('title')
E-Learning courses
@endsection
    
@section('courses')
    
<div class="row g-3">
    <div class="col-xxl-2 col-xl-3">
      <aside class="scrollbar-overlay font-sans-serif p-4 p-xl-3 ps-xl-0 offcanvas offcanvas-start offcanvas-filter-sidebar" tabindex="-1" id="filterOffcanvas" aria-labelledby="filterOffcanvasLabel">
        <div class="d-flex flex-between-center">
          <div class="d-flex gap-2 flex-xl-grow-1 align-items-center justify-content-xl-between">
            <h5 class="mb-0 text-700 d-flex align-items-center" id="filterOffcanvasLabel"><span class="fas fa-filter fs--1 me-1"></span><span>Filter</span></h5><button class="btn btn-sm btn-outline-secondary">Reset</button>
            <p class="mb-0 fs--1 text-800"><a href="{{route('courses.create')}}"><button class="btn btn-sm btn-outline-secondary">add course </button></a></p>
          </div><button class="btn-close text-reset d-xl-none shadow-none" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <ul class="list-unstyled">
          <li class="border-bottom"><a class="nav-link collapse-indicator-plus fs--2 fw-medium text-600 py-3" data-bs-toggle="collapse" href="#category-collapse" aria-controls="category-collapse" aria-expanded="true">Category</a>
            <div class="collapse show" id="category-collapse">
              <ul class="list-unstyled">
                @foreach ($categories as $categorie)
                    <li>
                        <div class="form-check d-flex ps-0"><label class="form-check-label fs--1 flex-1 text-truncate" for="filter-category-on-sale"><span class="fas fa-tags fs--2 me-3"></span>{{$categorie->Nom_categorie}}</label><input class="form-check-input" type="checkbox" checked="checked" name="on-sale" id="filter-category-on-sale" /></div>
                    </li>
                @endforeach
                
              </ul>
            </div>
          </li>
        </ul>
      </aside>
    </div>
    <div class="col-xxl-10 col-xl-9">
      <div class="card mb-3">
        <div class="card-header position-relative">
          <h5 class="mb-0 mt-1">All Courses</h5>
          <div class="bg-holder d-none d-md-block bg-card" style="background-image:url(../../../assets/img/illustrations/corner-6.png);"></div>
          <!--/.bg-holder-->
        </div>
        <div class="card-body pt-0 pt-md-3">
          <div class="row g-3 align-items-center">
            <div class="col-auto d-xl-none"><button class="btn btn-sm p-0 btn-link position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas" aria-controls="filterOffcanvas"><span class="fas fa-filter fs-0 text-700"></span></button></div>
            <div class="col">
              <form class="position-relative"><input class="form-control form-control-sm search-input lh-1 rounded-2 ps-4" type="search" placeholder="Search..." aria-label="Search" />
                <div class="position-absolute top-50 start-0 translate-middle-y ms-2"><span class="fas fa-search text-400 fs--1"></span></div>
              </form>
            </div>
            <div class="col position-sm-relative position-absolute top-0 end-0 me-3 me-sm-0 p-0">
              <div class="row g-0 g-md-3 justify-content-end">
                <div class="col-auto">
                  <form class="row gx-2">
                    <div class="col-auto d-none d-lg-block"><small class="fw-semi-bold">Sort by:</small></div>
                    <div class="col-auto"> <select class="form-select form-select-sm" aria-label="Bulk actions">
                        <option value="rating">Rating</option>
                        <option value="review">Review</option>
                        <option value="price">{{$courses->count()}}</option>
                      </select></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-3 g-3">
        @foreach ($courses as $course)
            
        <article class="col-md-6 col-xxl-4">
          <div class="card h-100 overflow-hidden">
            <div class="card-body p-0 d-flex flex-column justify-content-between">
              <div>
                <div class="hoverbox text-center"><a class="text-decoration-none" href="../../../assets/video/beach.mp4" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="\iamges\{{$course->image}}" alt="" /></a>
                  <div class="hoverbox-content flex-center pe-none bg-holder overlay overlay-2"><img class="z-1" src="../../../assets/img/icons/play.svg" width="60" alt="" /></div>
                </div>
                <div class="p-3">
                  <h5 class="fs-0 mb-2"><a class="text-dark" href="course-details.html"></a></h5>
                  <h5 class="fs-0"><a href="{{route('courses.show',['course'=>$course->id])}}"> {{$course->title}}</a></h5>
                </div>
              </div>
              <div class="row g-0 mb-3 align-items-end">
                <div class="col ps-3">
                  <h4 class="fs-1 text-warning d-flex align-items-center"> <span>{{$course->category->Nom_categorie	}}</span><del class="ms-2 fs--1 text-700">$139.90</del></h4>
                  <h4 class="fs-1 text-warning d-flex align-items-center"> <span>{{$course->user->name	}}</span><del class="ms-2 fs--1 text-700">$139.90</del></h4>
                  <p class="mb-0 fs--1 text-800"><a href="{{route('courses.show',['course'=>$course->id])}}"><button class="btn btn-sm btn-outline-secondary">more details</button></a></p>
                  <p class="mb-0 fs--1 text-800"><a href="{{route('courses.edit',['course'=>$course->id])}}"><button class="btn btn-sm btn-outline-secondary">Update course details</button></a></p> 
                  <p class="mb-0 fs--1 text-800"><a href="{{route('courses.create')}}"><button class="btn btn-sm btn-outline-secondary">Update course details</button></a></p>
                </div>
                <div class="col-auto pe-3"><a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="far fa-heart" data-fa-transform="down-2"></span></a><a class="btn btn-sm btn-falcon-default hover-primary" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart"><span class="fas fa-cart-plus" data-fa-transform="down-2"></span></a></div>
              </div>
            </div>
          </div>
        </article>
        @endforeach

      <div class="card">
        <div class="card-body">
          <div class="row g-3 flex-center justify-content-md-between">
            <div class="col-auto">
              <form class="row gx-2">
                <div class="col-auto"><small>Show:</small></div>
                <div class="col-auto"> <select class="form-select form-select-sm" aria-label="Show courses">
                    <option selected="selected" value="9">9</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                  </select></div>
              </form>
            </div>
            <div class="col-auto"> <button class="btn btn-falcon-default btn-sm me-2" type="button" disabled="disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Prev"><span class="fas fa-chevron-left"></span></button><a class="btn btn-sm btn-falcon-default text-primary me-2" href="#!">1</a><a class="btn btn-sm btn-falcon-default me-2" href="#!">2</a><a class="btn btn-sm btn-falcon-default me-2" href="#!">3</a><a class="btn btn-sm btn-falcon-default me-2" href="#!"> <span class="fas fa-ellipsis-h"></span></a><a class="btn btn-sm btn-falcon-default me-2" href="#!">303</a><button class="btn btn-falcon-default btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Next"><span class="fas fa-chevron-right">  </span></button></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection