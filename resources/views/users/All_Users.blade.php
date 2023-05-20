@extends('Courses.layoutt')

@section('title')
E-Learning users
@endsection
    
@section('courses')
@if (session('status'))
  <div class="alert alert-info border-2 d-flex align-items-center" role="alert">
    <div class="bg-info me-3 icon-item"><span class="fas fa-info-circle text-white fs-3"></span></div>
    <p class="mb-0 flex-1">{{ session('status') }}</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="card">
    <div class="card-header bg-light">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0" id="followers">All users <span class="d-none d-sm-inline-block">( {{$users->count()}} )</span></h5>
        </div>
        <div class="col">
          <form>
            <div class="row g-0">
              <div class="col-6"><input class="form-control form-control-sm" type="text" placeholder="Search..." /></div>
          </form>
        </div>
      </div>
    </div>
    <div class="card-body bg-light px-1 py-0">
      <div class="row g-0 text-center fs--1">
        @foreach ($users as $user)

            
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
            <div class="bg-white dark__bg-1100 p-3 h-100"><a href="{{route('users.profile',['profile_id'=>$user->id])}}"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="\images\users\{{$user->profile_image_path}}" alt="" width="100" /></a>
              <h6 class="mb-1"><a href="{{route('users.profile',['profile_id'=>$user->id])}}"  data-sort="name"> {{$user->name}} </a></h6>
              <p class="fs--2 mb-1 ">
               {{$user->role}}
              </p>
              <p class="fs--2 mb-1">
                @if ($user->role !='admin')
                
                <div class="col-auto pe-3">
                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none float-center" type="button" id="dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                      <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-0">
                       
                        <a class="dropdown-item" href="{{route('users.add_admin',['user'=>$user->id])}}">Add as an admin</a>
                        <form action="{{route('users.destroy',['user'=>$user->id ])}}" method="post" >
                          @csrf
                          @method('delete')
                        <div class="dropdown-divider"></div> <button type="submit" class="dropdown-item text-danger">Delete</button> 
                        </form>
                      </div>
                </div>  
                @endif
                </p>
            </div>
          </div>    
            
        @endforeach
      </div>
    </div>
  </div>
  </div>
@endsection