@extends('Courses.layoutt')

@section('title')
E-Learning update course
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
    
  <div class="card-header">
    <div class="row flex-between-end">
      <div class="col-auto align-self-center">
        <h5 class="mb-0" data-anchor="data-anchor">Update course</h5>
      </div>
    </div>
  </div>
  <div class="card-body bg-light">
    <div class="tab-content">
      <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-7a421d91-36e1-4a1c-94fa-15531761cb81" id="dom-7a421d91-36e1-4a1c-94fa-15531761cb81">
        <form action="{{route('courses.update',['course'=>$course->id])}}" method="Post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="mb-3"><label class="form-label" for="basic-form-name">Title</label><input class="form-control" id="basic-form-name" type="text" placeholder="Title" name="title" value="{{$course->title}}" /></div>
          <div class="mb-3"><label class="form-label" for="basic-form-gender">Categories</label><select class="form-select" id="basic-form-gender" aria-label="Default select example" name="category">
              <option selected="selected" value="{{$course->category->id	}}">{{$course->category->Nom_categorie	}}</option>
              @foreach ($categories as $category)

                <option value="{{$category->id}}">{{$category->Nom_categorie	}}</option>

              @endforeach
              
            </select></div>
          
          <div class="mb-3"><label class="form-label">Upload Cover Image</label><input class="form-control" type="file" name="image" value="asasasas" /></div>
          <div class="mb-3"><label class="form-label" for="basic-form-textarea">Description</label><textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="Description" name="description" >{{$course->description}}</textarea></div>
          
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
      
      
    </div>
    
  </div>
  
  
    <div class="card-header">
      <h5 class="mb-0">Create Resources</h5>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive scrollbar">
        <table class="table table-borderless mb-0 fs--1 overflow-hidden">
          <tbody>
            @foreach ($parties as $part)

            <tr class="btn-reveal-trigger bg-light">
              <td class="align-middle white-space-nowrap">
                <div class="d-flex gap-3 align-items-center position-relative"><img class="rounded-1 border border-200" src="\iamges\{{$course->image}}" width="60" alt="" />
                  <div>
                    <h5 class="fs-0 text-primary"><a href="{{route('parties.show',['party'=>$part->id])}}">{{$part->title_partie}}</a><span data-bs-toggle="tooltip" data-bs-placement="top" title="Requirement fulfilled"><span class="text-primary fs-0 ms-2 fas fa-check-circle"></span></span></h5>
                    <p class="fs--1 text-900 mb-0">{{$part->description_partie}}</p>
                  </div>
                </div>
              </td>
              <td class="align-middle white-space-nowrap fs--1 text-700">
                <p class="mb-1">create at {{$part->date_pub_partie}}</p>
              </td>
              <td class="align-middle white-space-nowrap text-end">
                <div class="dropdown font-sans-serif position-static d-inline-block btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none float-end" type="button" id="dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                  <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-0"><a class="dropdown-item" href="{{route('parties.show',['party'=>$part->id])}}">View</a><a class="dropdown-item" href="#!">Edit</a>
                    
                    <form action="{{route('parties.destroy',['party'=>$part->id ])}}" method="post" id="deleteForm-{{$part->id}}" >
                      @csrf
                      @method('delete')
                    <div class="dropdown-divider"></div> <button type="button" onclick="confirmation()" class="dropdown-item text-danger">Delete</button> 
                    </form>
                    {{-- script of confirmation --}}
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
                  </div>
                </div>
              </td>
            </tr>
                
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer py-2 text-center"><a class="btn btn-link btn-sm px-0 fw-medium" href="{{route('parties.create',['course'=>$course->id])}}"> <span class="fas fa-plus me-1 fs--2"></span>Add New Chaptar</a></div>
  
</div>
</div>



@endsection