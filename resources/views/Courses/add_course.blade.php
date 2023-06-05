@extends('Courses.layoutt')

@section('title')
E-Learning add course
@endsection
    
@section('courses')
  
  <div class="card mb-3">
    
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
          <h5 class="mb-0" data-anchor="data-anchor">Create course</h5>
        </div>
      </div>
    </div>
    <div class="card-body bg-light">
      <div class="tab-content">
        <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-7a421d91-36e1-4a1c-94fa-15531761cb81" id="dom-7a421d91-36e1-4a1c-94fa-15531761cb81">
          <form action="{{route('courses.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
            {{-- @method('put') --}}
            <div class="mb-3"><label class="form-label" for="basic-form-name">Title</label><input class="form-control" id="basic-form-name" type="text" placeholder="Title" name="title" /></div>
            <div class="mb-3"><label class="form-label" for="basic-form-gender">Categories</label><select class="form-select" id="basic-form-gender" aria-label="Default select example" name="category">
                <option selected="selected">Select the category</option>
                @foreach ($categories as $category)

                  <option value="{{$category->id}}">{{$category->Nom_categorie	}}</option>

                @endforeach
                
              </select></div>
            
            <div class="mb-3"><label class="form-label">Upload an Image</label><input class="form-control" type="file" name="image" /></div>
            <div class="mb-3"><label class="form-label" for="basic-form-textarea">Description</label><textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="Description" name="description"></textarea></div>
            
            <button class="btn btn-primary" type="submit">Submit</button>
          </form>
          
        </div>
        
      </div>
    </div>
  </div>
</div>

@endsection