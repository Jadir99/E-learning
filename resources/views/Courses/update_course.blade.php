@extends('Courses.layoutt')

@section('title')
E-Learning update course
@endsection
    
@section('courses')


<div class="card  mt-30">
    <div class="card-header">
      <h5 class="mb-0">Course Information</h5>
    </div>
    <div class="card-body bg-light">
      <form class="row gx-2">
        <div class="col-12 mb-3"><label class="form-label" for="course-name">Course Title<span class="text-danger">*</span></label><input class="form-control" id="course-name" type="text" placeholder="Course Title" required="required"
             value="{{$course->title}}"/></div>
        <div class="col-sm-6 mb-3"><label class="form-label" for="course-category">Category<span class="text-danger">*</span></label><select class="form-select" id="course-category" name="course-category">
            <option>Select a category</option>
            <option>Academia</option>
            <option>Arts & Crafts</option>
            <option>Design</option>
            <option>Development</option>
            <option>Finance</option>
            <option>Marketing</option>
            <option>Music</option>
            <option>Lifestyle</option>
            <option>Photography</option>
            <option>Miscellaneous</option>
          </select></div>
          <div class="col-12"><label class="form-label" for="course-description">Course Description<span class="text-danger">*</span></label>
          <div class="create-course-description-textarea"><textarea class="tinymce d-none" data-tinymce="data-tinymce" name="course-description" id="course-description" required="required"></textarea></div>
        </div>

        
        
            <div class="card-header">
              <h5 class="mb-0">Upload Cover Photo <span data-bs-toggle="tooltip" data-bs-placement="top" title="Add cover photo"><span class="fas fa-info-circle text-primary fs-0 ms-2"></span></span></h5>
            </div>
            <div class="card-body bg-light">
              <form class="dropzone dropzone-single p-0" data-dropzone="data-dropzone" data-options='{"maxFiles":1,"acceptedFiles":"image/*"}'>
                <div class="fallback"><input type="file" name="file" /></div>
                <div class="dz-preview dz-preview-single">
                  <div class="dz-preview-cover dz-complete"><img class="dz-preview-img" src="../../../assets/img/generic/image-file-2.png" alt="" data-dz-thumbnail="" /><a class="dz-remove text-danger" href="#!" data-dz-remove="data-dz-remove"><span class="fas fa-times"></span></a>
                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                    <div class="dz-errormessage m-1"><span data-dz-errormessage="data-dz-errormessage"></span></div>
                  </div>
                  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                </div>
                <div class="dz-message fs--1" data-dz-message="data-dz-message"><img class="me-2" src="../../../assets/img/icons/cloud-upload.svg" width="20" alt="" /><span class="d-none d-lg-inline">Drag your image here<br/>or, </span><span class="btn btn-link p-0 fs--1">Browse</span></div>
              </form>
            </div>
          

      </form>
    </div>
  </div>
</div
@endsection