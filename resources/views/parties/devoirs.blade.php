@extends('Courses.layoutt')

@section('title')
E-Learning see homworks
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
<div id="tableExample3" data-list='{"valueNames":["name","email","Devoir","Party","Date_remise","Note","path_travail","course"],"page":5,"pagination":true}'>
    <div class="row justify-content-end g-0">
      <div class="col-auto col-sm-5 mb-3">
        <form>
          <div class="input-group"><input class="form-control form-control-sm shadow-none search" type="search" placeholder="Search..." aria-label="search" />
            <div class="input-group-text bg-transparent"><span class="fa fa-search fs--1 text-600"></span></div>
          </div>
        </form>
      </div>
    </div>
    <div class="table-responsive scrollbar">
      <form action="{{ route('users.update_note_devoir') }}" method="POST">
        @csrf
          <table class="table table-bordered table-striped fs--1 mb-0">
            <thead class="bg-200 text-900">
              <tr>
                <th class="sort" data-sort="name">Name</th>
                <th class="sort" data-sort="course">course</th>
                <th class="sort" data-sort="Party">Party</th>
                <th class="sort" data-sort="Devoir">Devoir</th>
                <th class="sort" data-sort="email">Email</th>
                <th class="sort" data-sort="Note">Note</th>
                <th class="sort" data-sort="Date_remise">Date_remise</th>
                <th class="sort" data-sort="path_travail">The work</th>
              </tr>
            </thead>
            <tbody class="list">
              
                @foreach ($devoirs->former as $course) 
                    @foreach ($course->partie as $partie)
                        @foreach ($partie->devoirs as $devoir) 
                            @foreach ($devoir->users_devoir as $item)
                            
                            
                                <tr>
                                    <td class="name text-nowrap"> 
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                            <img class="rounded-circle" src="\images\users\{{$item->profile_image_path}}" alt="" />
                                            </div>
                                        </div>
                                        <div >{{$item->name}}</div>
                                    </td>
                                    <td class="course"> {{$course->title}}</td>
                                    <td class="Party"> {{$partie->title_partie}} </td>
                                    <td class="Devoir"> {{$devoir->devoir_title}} </td>
                                    <td class="email"> {{$item->email}} </td>
                                    <td class="Note"><div class="">
                                      <input class="form-control text-center" type="text"  name="notes[{{$item->pivot->id}}]" aria-label=".form-control-lg example" value=" {{ $item->pivot->note_devoir }} "style=" width: 80px;height:30px" /></div>
                                    </td>
                                    <td class="Date_remise">{{$item->pivot->date_remise}}</td>
                                    <td class="path_travail text-center"><a href="\documents\{{$item->pivot->path_travail}}"target="_blank" ><span id="boot-icon" class="bi bi-eye text-center" style="font-size: 27px; color:#2444bb"></span></a></td>
                                <span class="d-none"><input type="hidden" name="id[]" value="{{ $item->pivot->id }}"></span>
                                </tr> 
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
          </table>
        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary">Update</button></div>
      </form>
      
    </div>
    {{-- <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
      <ul class="pagination mb-0"></ul><button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button> --}}
    </div>
  </div>
@endsection