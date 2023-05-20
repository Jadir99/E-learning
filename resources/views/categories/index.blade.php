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
                <td class="Party text-center"> <i class="bi bi-trash " style="font-size:20px;color:red"></i><i class="bi bi-pencil-square" style="font-size:20px;color:blue"></i></td>
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