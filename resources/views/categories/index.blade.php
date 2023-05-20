@extends('Courses.layoutt')

@section('title')
E-Learning categories
@endsection
    
@section('courses')
<div class="card col-6 justify_content-center p-3 m-auto mt-7">
    
<div id="tableExample3" data-list='{"valueNames":["Category","email","Devoir","Party","Date_remise","Note","path_travail","course"],"page":5,"pagination":true}' class=" col-auto justify-content-center g-0 ">
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
      <table class="table table-bordered table-striped fs--1 mb-0 ">
        <thead class="bg-200 text-900">
          <tr>
            <th class="sort text-center" data-sort="Category">Category</th>
            <th class="sort text-center" data-sort="Acitons">Acitons</th>
          </tr>
        </thead>
        <tbody class="list">
            @foreach ($categories as $category)
            <tr>
                <td class="course text-center"> {{$category->Nom_categorie}}</td>
                <td class="Party text-center ">
                    <div class="row ">
                        
                        <div class="col "> 
                            <form action="" method="post" >
                                @method('delete')
                                <button class="btn btn-secondary mx-2 " style="background-color:#edf2f9" type="submit" ><i class="bi bi-trash " style="font-size:20px;color:#5e6e82"></i></button>
                            </form>
                        </div>
                        <div class="col">
                            <button class="btn btn-secondary mx-2" type="button" data-bs-toggle="modal" data-bs-target="#error-modal"  style="background-color:#edf2f9"><i class="bi bi-pencil-square" style="font-size:20px;color:#5e6e82"></i></button>
                            <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                                    <div class="modal-content position-relative">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-1">
                                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    {{-- modal  --}}
                                    <div class="modal-body p-0">
                                        <div class="rounded-top-3 py-3 ps-4 pe-6 bg-light">
                                        <h4 class="mb-1" id="modalExampleDemoLabel">update the categorie </h4>
                                        </div>
                                        <div class="p-4 pb-0">
                                        <form action="{{route('categories.update',['category'=>$category->id])}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="mb-3">
                                                <label class="col-form-label" for="category-name">Name category:</label>
                                                <input class="form-control" value="{{$category->Nom_categorie}}" id="category-name" type="text" name="category" required  />
                                            </div>
                                            <button class="btn btn-primary" type="submit">Update </button>
                                        </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                        
                                    </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </td>
            </tr> 
            @endforeach
        </tbody>
      </table>
    </div>
    <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
      <ul class="pagination mb-0"></ul><button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
    </div>
  </div>

</div>
@endsection