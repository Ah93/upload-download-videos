<div class="col-xl-12 col-md-6 mb-4">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Add Course</h6>
        </div>
        <!-- Card Body -->

        <div class="card-body">

            <form action="{{ route('course.store') }}" method="POST" id="course-upload" enctype="multipart/form-data">

                @csrf
                <div class="alert alert-success" role="alert" id="successMsg" style="display: none">
                    Course uploaded successfully!
                </div>

                <div class="form-group row">
                    <label for="couTitle" class="col-sm-2 col-form-label">Course Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="c_title" name="c_title">
                        <span class="text-danger" id="tit-input-error"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="catName" class="col-sm-2 col-form-label">Course Category</label>
                    <div class="col-sm-10">
                        <select name="c_category" class="form-control">
                            <option value="Engineering">Engineering</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Programming">Programming</option>
                            <option value="Artificial Intelligence">Artificial Intelligence</option>
                            <option value="Business">Business</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="Writing">Writing</option>
                            <option value="Art">Art</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Research">Research</option>
                            <option value="Research">Social Network</option>
                            <option value="Research">Social Life</option>
                        </select>
                        <span class="text-danger" id="cat-input-error"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="uploadvidFile" class="col-sm-2 col-form-label">Upload Video</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="c_vidFile" name="c_vidFile">
                        <span class="text-danger" id="vid-input-error"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="uploadthumbFile" class="col-sm-2 col-form-label">Upload Thumbnail</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="c_thumbFile" name="c_thumbFile">
                        <span class="text-danger" id="thumb-input-error"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="uploaddocFile" class="col-sm-2 col-form-label">Upload Additional Document (if any)</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="c_docfile" name="c_docfile">
                        <span class="text-danger" id="adoc-input-error"></span>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="desc" class="col-sm-2 col-form-label">Course Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="c_description" name="c_description" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" id="btn-add" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<link rel="stylesheet" href="{{asset('css\bootstrap.min.css')}}">
<script src="{{asset('js\addCourse.js')}}"></script>