@extends('Courses.layoutt')


@section('title')
E-Learning detail
@endsection


<span class="d-none">{{$if_is_learner=0}}</span>
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
        <div class="bg-holder rounded-3" style="background-image:url('');" ></div>
        <!--/.bg-holder-->
        <div class="row">
          <div class="col-xl-8 position-relative">
            <div class="row g-3 align-items-center">
              <div class="col-lg-5">
                <div class="position-relative">
                    {{-- l'image de video  --}}
                  <div class="bg-holder rounded-1 overlay" style="background-image:url('{{ asset("iamges/". $course->image) }}');"></div>
                  <!--/.bg-holder-->
                  <a class="text-decoration-none position-relative d-block py-7 text-center" href="\iamges\{{$course->image}}" data-gallery="attachment-bg"></a>
                </div>
              </div>
              <div class="col-lg-7">
                <h3 class="fw-semi-bold text-400 text-white">A {{$course->title}} course by <a class="text-info" href="{{route('users.profile',['profile_id'=>$course->user->id])}}">{{$course->user->name}}</a>
                
                </h3>
               <h5><p class="mb-0 fw-medium text-400 text-white"> {{$course->description}} ...<a class="text-info" href="#!"> See more</a></p></h5> 
              </div>
            </div>
            <hr class="text-secondary text-opacity-50" />
            <ul class="list-unstyled d-flex flex-wrap gap-3 fs--1 fw-semi-bold text-300 mt-3 mb-0">
                    @foreach ($reviews as $review)
                    <span class="d-none"> {{$nbr=0}} </span>
                      <li><span class="fas fa-graduation-cap text-white me-1"> </span> {{$review->learner->count('pivot.review')}} Learners </li>
                      <p class="text-white fw-semi-bold fs--1"><span class="me-1"><span class="fas fa-user-graduate text-white me-1"> </span>rate :  {{$nbr=$review->learner->avg('pivot.review') }} % </span>
                
                      <span class="d-none">{{$review->course_id}}</span>
                      
                      {{-- show the stars --}}
                        @if ($nbr!=0)
                        @for ($i = 0; $i < $nbr/20; $i++)
                          <span class="fa fa-star text-warning"></span>
                        @endfor
                        @for ($i = 0; $i < 5-$nbr/20 ; $i++)
                          <span class="far fa-star text-warning"></span>
                        @endfor
                        @endif

                        <span class="text-info ms-2">( {{$review->learner->count('pivot.review')}} reviews)</span></p>
                        
                      
                    @endforeach

            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row g-lg-3">
      <div class="col-lg-8 order-1 order-lg-0">
        <div class="card mb-3 bg-transparent border shadow-none">
        </div>
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h5 class="mb-0">course Plan</h5>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive scrollbar">
              <table class="table table-borderless mb-0 fs--1 overflow-hidden">
                <tbody>
                  @foreach ($reviews as $existe)
                    @foreach ($existe->learner as $review)
                    <span class="d-none">{{$review->pivot->review}}</span>
                    
                    
                        @if ($review->id==Auth::user()->id) 
                            <span class="d-none">{{$if_is_learner=1}}</span>
                        @endif
                    @endforeach
                  @endforeach
                  {{-- testing if th user is an admin or the mol coyrs --}}
                  @if (Auth::user()->id==$course->user_id || Auth::user()->role=='admin' )
                  <span class="d-none">{{$if_is_learner=1}}</span>
                    
                  @endif
                  @foreach ($parties as $part)
      
                  <tr class="btn-reveal-trigger bg-light">
                    <td class="align-middle white-space-nowrap">
                      <div class="d-flex gap-3 align-items-center position-relative"><img class="rounded-1 border border-200" src="\iamges\{{$course->image}}" width="60" alt="" />
                        <div>
                          <h5 class="fs-0 text-primary"><a
                          @if ($if_is_learner==1)
                            href="{{route('parties.show',['party'=>$part->id])}}">
                          @else
                              href="#"> 
                          @endif {{$part->title_partie}}</a><span data-bs-toggle="tooltip" data-bs-placement="top" title="Requirement fulfilled"><span class="text-primary fs-0 ms-2 fas fa-check-circle"></span></span></h5>
                          <p class="fs--1 text-900 mb-0">{{$part->description_partie}}</p>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle white-space-nowrap fs--1 text-700">
                      <p class="mb-1">create at {{$part->date_pub_partie}}</p>
                    </td>
                    @if ($course->user_id==Auth::user()->id || Auth::user()->role=='admin')

                    <td class="align-middle white-space-nowrap text-end">
                      <div class="dropdown font-sans-serif position-static d-inline-block btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none float-end" type="button" id="dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-0"><a class="dropdown-item" href="{{route('parties.show',['party'=>$part->id])}}">View</a><a class="dropdown-item" href="#!">Edit</a>
                          <form action="{{route('parties.destroy',['party'=>$part->id ])}}" method="post" id="deleteForm-{{$part->id}}" >
                            @csrf
                            @method('delete')
                          <div class="dropdown-divider"></div> <button type="button" onclick="confirmation()" class="dropdown-item text-danger">Delete</button> 
                          </form>
                        </div>
                      </div>
                    </td>
                        
                    @endif
                    {{-- script to confirm the delete --}}
                    <script>
                      function confirmation() {
                          Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                        if (result.isConfirmed) {
                          document.getElementById('deleteForm-{{$part->id}}').submit();
                        }
                      })
                      }
                    
                    </script>
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

          @foreach ($reviews as $comment)
          {{-- test if there any learner  --}}
            @if ($comment->learner)
              @foreach ($comment->learner as $review)
                  
                @if ($review->pivot->comment!='')
                    <div class="row g-3 align-items-center text-center text-md-start py-3 border-bottom border-200">

                      <div class="col-md-auto"><a href="#!">
                          <div class="avatar avatar-3xl">
                            <img class="rounded-circle" src="\images\users\{{$review->profile_image_path}}" alt="" />
                          </div>
                        </a></div>
                      <div class="col px-x1 py-2">
                        <div class="row">
                          <div class="col-12">
                            <h6 class="fs-0"><a class="me-2" href="{{route('users.profile',['profile_id'=>$review->id])}}">{{$review->name}}</a>
                              <span class="d-none"> {{$nbr=0}} {{$nbr=$review->pivot->review/20}}</span>
                              
                              @if ($nbr!=0)
                                @for ($i = 0; $i < $nbr; $i++)
                                  <span class="fa fa-star text-warning"></span>
                                @endfor
                                @for ($i = 0; $i < 5-$nbr; $i++)
                                  <span class="far fa-star text-warning"></span>
                                @endfor
                              @endif
                            </h6>
                          </div>
                          <div class="col-md-10">
                            <p class="fs--1 text-800"> {{$review->pivot->comment}}.</p>
                          </div>
                          <div class="col-12">
                            <div class="fs--2 text-600 d-flex flex-column flex-md-row align-items-center gap-2">
                              <h6 class="fs--2 text-600 mb-0">At {{$review->pivot->date_review}} </h6>
                              
                              </p>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-auto d-flex justify-content-center gap-2"><button class="btn btn-falcon-default icon-item focus-bg-primary"><span class="fs--2 fas fa-thumbs-up"></span></button><button class="btn btn-falcon-default icon-item focus-bg-secondary"><span class="fs--2 fas fa-thumbs-up" data-fa-transform="rotate-180"></span></button></div>
                    </div>
                @endif
              @endforeach
            @else
              <h4 class="text-center">Empty, there is no comments</h4>
            @endif
          @endforeach
          </div>
          @if ($if_is_learner==1 && Auth::user()->id!=$course->user_id && Auth::user()->role!='admin')
            <div class=" ">
              <div class="container text-center mt-4">
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
              <div class="mb-2 mt-4">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" placeholder="add youre comment"></textarea>
              </div>
              <button type='submit'class="btn btn-primary me-1 mb-1">Add comment <i class="bi bi-caret-right-fill"></i></button>
            </form>
          @elseif (Auth::user()->id==$course->user_id || Auth::user()->role=='admin')
          You cannot add a new comment 
          @else
          <div class="card-footer text-center py-1 bg-light">
            <p class="mb-0 fs--1 "><a class="text-danger opacity-70" href="{{route('courses.demand',['course_id'=>$course->id])}}"> <h3 class="">Ask for the course !</h3></span></a></p>
          </div>
          @endif
              
                      
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
    @if ($if_is_learner==0)
    {{-- <script> alert('you don t ask for the course !!!, so u can not access to the content')</script> --}}
    @endif
    
@endsection