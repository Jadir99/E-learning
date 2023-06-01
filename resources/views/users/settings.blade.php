
@extends('Courses.layoutt')


@section('title')
Profile settings
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


<div class="row">
  <div class="col-12">
    <div class="card mb-3 btn-reveal-trigger">
      <div class="card-header position-relative min-vh-25 mb-8">
        <div class="cover-image">

        <form action="{{route('users.update',['user'=>Auth::user()->id])}}" method="Post" enctype="multipart/form-data">
            @csrf
            @method('put')
          <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/images/users/{{Auth::user()->cover_image_path}});"></div>
          <!--/.bg-holder-->
          <input class="d-none" id="upload-cover-image" type="file"name='cover_image' />
          <label class="cover-image-file-input" for="upload-cover-image" ><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
        </div>
        <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
          <div class="h-100 w-100 rounded-circle overflow-hidden position-relative"> 
            <img src="/images/users/{{Auth::user()->profile_image_path}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />
            <input type="file" name="profile_image" id="profile-image" class="d-none">
            <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-1 text-white dark__text-white text-center fs--1"><span class="fas fa-camera"></span><span class="d-block">Update</span></span></label></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row g-0">
  <div class="col-lg-8 pe-lg-2">
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="mb-0">Profile Settings</h5>
      </div>
      <div class="card-body bg-light">
        
          <div class="col-lg-6"> <label class="form-label" for="first-name">User-Name</label><input class="form-control" id="first-name" type="text" value="{{Auth::user()->name}}"  name='name'/></div>
          {{-- <div class="col-lg-6"> <label class="form-label" for="last-name">Last Name</label><input class="form-control" id="last-name" type="text" value="{{Auth::user()->name}}" name='Name' /></div> --}}
          <div class="col-lg-6"> <label class="form-label" for="email1">Email</label><input class="form-control" id="email1" type="text" value="{{Auth::user()->email}}" name='email' /></div>
          <div class="col-lg-6"> <label class="form-label" for="email2">Phone</label><input class="form-control" id="email2" type="text" value="{{Auth::user()->tele}}" name='tele' /></div>
          <div class="col-lg-12"><label class="form-label" for="email3">Job</label><input class="form-control" id="email3" type="text"  value="{{Auth::user()->job}}" name='job'   /></div>
          <div class="col-lg-12"><label class="form-label" for="email3">Contry</label><input class="form-control" id="email3" type="text"  name='city'  value="{{Auth::user()->city}}" /></div>
          <div class="col-lg-12"><label class="form-label" for="email3">City</label><input class="form-control" id="email3" type="text"  name='contry' value="{{Auth::user()->contry}}" /></div>
          <div class="col-lg-12"> <label class="form-label" for="intro">Intro</label><textarea class="form-control" id="intro"  cols="30" rows="13" name='description'>{{Auth::user()->Description_about_u}}</textarea></div>
          <div class="col-12 d-flex justify-content-end"><button class="btn btn-primary" type="submit">Update </button></div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-lg-4 ps-lg-2">
    <div class="sticky-sidebar">
      <div class="card mb-3 overflow-hidden">
        <div class="card-header">
          <h5 class="mb-0">Account Settings</h5>
        </div>
        <span class="text-center">In progress</span>
      </div>
    </div>
  </div>
</div>

@endsection