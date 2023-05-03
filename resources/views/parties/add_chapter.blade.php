@extends('Courses.layoutt')

@section('title')
E-Learning add chapter
@endsection
     
@section('courses')

{{-- {{__($_GET['course'])}} --}}
<div class="card mb-3">
    
  <div class="card-header">
    <div class="row flex-between-end">
      <div class="col-auto align-self-center">
        <h5 class="mb-0" data-anchor="data-anchor">New Chapter</h5>
      </div>
    </div>
  </div>
  <div class="card-body bg-light">
    <div class="tab-content">
      <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-7a421d91-36e1-4a1c-94fa-15531761cb81" id="dom-7a421d91-36e1-4a1c-94fa-15531761cb81">
        <form action="{{route('parties.store')}}" method="Post" enctype="multipart/form-data">
          @csrf
          
          <div class="mb-3"><label class="form-label" for="basic-form-name">Title</label><input class="form-control" id="basic-form-name" type="text" placeholder="Title" name="title" /></div>
          <div class="mb-3"><label class="form-label" for="basic-form-textarea">Chapter description</label><textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="Description" name="description" ></textarea></div>

          <div class="mb-3"><label class="form-label">Upload your video (not necessary)</label><input class="form-control" type="file" name="video" value="asasasas" /></div>
          <div class="mb-3"><label class="form-label">Upload your document course (not necessary)</label><input class="form-control" type="file" name="document" value="asasasas" /></div>
          
          {{-- this is for course_id --}}
          <input type="hidden" name="course" value="{{$_GET['course']}}" />
          <div class="card mb-3">
              <div class="card-header">
                <div class="row flex-between-end">
                  <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor">Add devoir if u have one (not necessary)</h5>
                  </div>
                </div>
              </div>
              <div class="card-body bg-light">
                <div class="tab-content">
                  <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-7a421d91-36e1-4a1c-94fa-15531761cb81" id="dom-7a421d91-36e1-4a1c-94fa-15531761cb81">
                    <div class="mb-3"><label class="form-label" for="basic-form-name">Title of devoir</label><input class="form-control" id="basic-form-name" type="text" placeholder="Title" name="devoir_title" /></div>
                    <div class="mb-3"><label class="form-label" for="basic-form-textarea">Statements of devoir</label><textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="Description" name="enonce" ></textarea></div> 
                  </div>
                </div>
              </div>
          </div>
          
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
      
      
    </div>
    
  </div>
  
</div>



@endsection