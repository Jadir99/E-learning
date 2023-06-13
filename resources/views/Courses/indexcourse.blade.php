{{-- <span class="d-none">{{$demands=App\Http\Controllers\UserController::haslogin()}}</span> --}}
@if (Auth::user()->id)
  
  @extends('Courses.layoutt')
  @section('title')
courses
  @endsection
      
  @section('courses')


{{-- <script>
    function myprenom() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("mynput");
        filter = input.value.toUpperCase();
        table = document.getElementById("all_courses");
        tr = document.getElementsById("article");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsById("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    </script> --}}

    {{-- <input type="search"  placeholder="Cherche par model..."></input> --}}
    @if (session('status'))
      <script>
        Swal.fire(
        'Good job!',
        '{{session('status')}}!',
        'success'
      )
      </script>
    @endif
      {{-- ml,lm --}}
  <div class="row g-3">
      <div class="col-xxl-2 col-xl-3">
        <aside class="scrollbar-overlay font-sans-serif p-4 p-xl-3 ps-xl-0 offcanvas offcanvas-start offcanvas-filter-sidebar" tabindex="-1" id="filterOffcanvas" aria-labelledby="filterOffcanvasLabel">
          
          <div class="d-flex flex-between-center">
            <div class="d-flex gap-2 flex-xl-grow-1 align-items-center justify-content-xl-between">
              <h5 class="mb-0 text-700 d-flex align-items-center" id="filterOffcanvasLabel"><span class="fas fa-filter fs--1 me-1"></span><span>Filter</span></h5> <a href="{{ route('courses.index') }}" ><button class="btn btn-sm btn-outline-secondary">Reset</button></a> 
              
            </div><button class="btn-close text-reset d-xl-none shadow-none" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <ul class="list-unstyled">
            <li class="border-bottom"><a class="nav-link collapse-indicator-plus fs--2 fw-medium text-600 py-3" data-bs-toggle="collapse" href="#category-collapse" aria-controls="category-collapse" aria-expanded="true">Category</a>
              <div class="collapse show" id="category-collapse">
                <ul class="list-unstyled">
                  @foreach ($categories as $categorie)
                  
                  
                      <li>
                          <div class="form-check d-flex ps-0"><label class="form-check-label fs--1 flex-1 text-truncate " for="filter-category-on-sale"><span  class="fas fa-tags fs--2 me-3 "></span>{{$categorie->Nom_categorie}} </label><a href="{{route('courses.by_category',['category_id'=>$categorie->id])}}"class="nav-link"><span class=""><i class="bi bi-eye bi-2x " style="font-size:20px;"></i></a></div>
                      </li>
                  @endforeach
                  
                </ul>
              </div>
            </li>
          </ul>
        </aside>
      </div>
      <div class="col-xxl-10 col-xl-9" id="all_courses">
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
                <form class="position-relative"><input class="form-control form-control-sm search-input lh-1 rounded-2 ps-4" type="search" onkeyup="myprenom()" id="mynput"placeholder="Search..." aria-label="Search" />
                  <div class="position-absolute top-50 start-0 translate-middle-y ms-2"><span class="fas fa-search text-400 fs--1"></span></div>
                </form>
              </div>
              <div class="col position-sm-relative position-absolute top-0 end-0 me-3 me-sm-0 p-0">
                
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-3 g-3" id="allcourses">
          @foreach ($courses as $course)

          {{-- this is for testing if the learner has already been enrolled in this course --}}
          <span class="d-none">{{$is_existe=0}}</span>

            @foreach ($existes as $existe)
            
              {{-- {{$existe->id}} --}}
                @if ($existe->id == $course->id)
                    <span class="d-none">{{$is_existe=1}}</span>
                @endif
              
            @endforeach
          <article class="col-md-6 col-xxl-4" id="article">
            <div class="card h-101 overflow-hidden">
              <div class="card-body p-0 d-flex flex-column justify-content-between">
                <div>
                  <div class="hoverbox text-center"><a class="text-decoration-none" href="\iamges\{{$course->image}}" data-gallery="attachment-bg"><img class="w-100 h-100 object-fit-cover" src="\iamges\{{$course->image}}" alt="" /></a>
                  </div>
                  <div class=" ps-3">
                    <h5 class="fs-0 mt-2"><a class="text-dark" href="{{route('courses.show',['course'=>$course->id])}}"><span id="td">{{$course->title}}</span></a></h5>
                    <h5 class="fs-0 "><a href="{{route('users.profile',['profile_id'=>$course->user->id])}}"> {{$course->user->name	}}</a></h5><br>
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
                          <span class="d-none"> {{$nbr=0}} {{$nbr=$review->learner->avg('pivot.review') /20}}</span>
                          @if ($nbr!=0)
                          @for ($i = 0; $i < $nbr; $i++)
                            <span class="fa fa-star text-warning"></span>
                            @endfor
                            @for ($i = 0; $i < 5-$nbr; $i++)
                              <span class="far fa-star text-warning"></span>
                            @endfor
                            <span class="text-info ms-2">({{$review->learner->count('pivot.review')}})</span></p>
                          @endif
                          
                        @endif
                      @endforeach
                      
                    </span></h6>
                  </div>
                  <div class="col-auto pe-3">
                    <a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="far fa-heart" data-fa-transform="down-2"></span></a>
                    
                    
                      <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none float-end" type="button" id="dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-0">
                          <a class="dropdown-item" href="{{route('courses.show',['course'=>$course->id])}}">View</a>
                          @if (Auth::user()->id==$course->user->id || Auth::user()->role=='admin')
                          <a class="dropdown-item" href="{{route('courses.edit',['course'=>$course->id])}}">Edit</a>
                          <form action="{{route('courses.destroy',['course'=>$course->id ])}}" method="post" id="deleteForm-{{$course->id}}">
                            @csrf
                            @method('delete')
                          <div class="dropdown-divider"></div> <button type="button" class="dropdown-item text-danger" onclick="confirmation({{$course->id}})">Delete</button> 
                          </form>
                          @endif
                            <script>
                              function confirmation(e) {
                                  Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it! '
                              }).then((result) => {
                                if (result.isConfirmed) {
                                  document.getElementById('deleteForm-'+e).submit();
                                }
                              })
                              }

                            </script>
                        </div>
                        
                        @foreach ($inprogress as $isSend)
                          @if ($isSend->user_id==Auth::user()->id && $isSend->course_id==$course->id)
                              <a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="fas fa-check" data-fa-transform="down-2"></span></a>
                              <span class="d-none">{{$is_existe=1}}</span>
                          @endif
                        @endforeach
                        @if ($is_existe==0)
                        <a class="btn btn-sm btn-falcon-default me-2 hover-danger" href="{{route('courses.demand',['course_id'=>$course->id])}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><span class="fas fa-plus" data-fa-transform="down-2"></span></a>
                    @endif
                        
                  </div>
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
    
    <script>
      const allCourses = document.getElementById('allcourses');
      const filterCheckbox = document.getElementById('filter-category-on-sale');

      filterCheckbox.addEventListener('change', function() {
        if (this.checked) {
          allCourses.style.display = 'none';
        } else {
          allCourses.style.display = 'block';
        }
      });

      
  
          function myFunction() {
        // Get the checkbox
      
        
        var checkBox = document.getElementsByName("produits[]");
        var text = document.getElementsByName("quantiti_commande[]");
      //   alert(text.length);
        // If the checkbox is checked, display the output text
        for (i=0;i<checkBox.length;i++){
        if (checkBox[i].checked == true){
          text[i].style.display = "block";
        } else {
          text[i].style.display = "none";
        }
        }
      }


          function Cat(id){
        child=document.getElementById("table-body").children;
        let size = child.length;
        for(var i=0;i<size;i++) {
          if(child.item(i).getAttribute("id")!=id){
            child.item(i).style.display = "none";
          }
          if(child.item(i).getAttribute("id")==id){
              child.item(i).style.display = "";
          }
        }
      }



    </script>
  @endsection  

    
@endif