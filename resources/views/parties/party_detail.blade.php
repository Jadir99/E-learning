
@extends('Courses.layoutt')

@section('title')
the party
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
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);"></div>
    <!--/.bg-holder-->
    <div class="card-body position-relative">
      <div class="row">
        <div class="col-lg-8">
          <h3>{{$party->title_partie}}</h3>
          <p class="mb-0">This is all what u need about this party of the course.</p>
        </div>
      </div>
    </div>
  </div>

  @foreach ($party->content as $content)
      
  <div class="card mb-3">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
          <h5 class="mb-0" data-anchor="data-anchor">{{$content->type_content}}</h5>
        </div>
      </div>
    </div>
    <div class="card-body bg-light">
      <div class="tab-content">
        <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-bd3775b3-b9d3-43fa-a5c1-67dba4690784" id="dom-bd3775b3-b9d3-43fa-a5c1-67dba4690784">
          <div class="fs--1" style="max-width: 50rem;">

            @if ($content->type_content=='document')
                <a class="notification" href="\documents\{{$content->path_content}} "target="_blank">
                    The former published a new {{$content->type_content}} <span class="text-danger ">&ensp;<strong>click here</strong> &ensp; </span>  to go to the Document. 
                    
                </a>
            @else  
                <div class="hoverbox text-left"><a class="text-decoration-none notification" href="\videos\{{$content->path_content}}" data-gallery="attachment-bg"><span class="w-100 h-100 object-fit-cover">The former published a new {{$content->type_content}} Click here to watch the video </span></a></div>
            

            @endif
            <span class="text-secondary"> <br>{{$content->created_at}}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  
  @foreach ($party->devoir as $devoir)
      
  <div class="card mb-3">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
          <h5 class="mb-0" data-anchor="data-anchor">Devoir: {{$devoir->devoir_title}}</h5>
        </div>
      </div>
    </div>
    <div class="card-body bg-light">
      <div class="tab-content">
        <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-bd3775b3-b9d3-43fa-a5c1-67dba4690784" id="dom-bd3775b3-b9d3-43fa-a5c1-67dba4690784">
          <div class="fs--1" style="max-width: 60rem;">

            <div class='notification'>
                 
                
                 {{-- @if ($devoir->users_devoir)
                     <h4>U have been put your assignement!! </h4>
                 @else --}}
                 {{$devoir->enonce}} &ensp; 
                  <form action="{{route('parties.remise_devoir')}}" method="POST" enctype="multipart/form-data">
              
                      @csrf
                      {{-- @method('put') --}}
                    <input type="file" name="devoir" id="">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="devoir_id"  value="{{$devoir->id}}">
                    <input type="hidden" name="partie_id" value="{{$party->id}}">
                    <input type="submit" value="File submissions">
                  </form>
                 {{-- @endif --}}
                 
            </div>
            <span class="text-secondary"> <br>{{$devoir->created_at}}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@endsection