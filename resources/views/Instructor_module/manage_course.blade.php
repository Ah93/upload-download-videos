            <!-- Manage Document -->
            <div class="col-xl-12 col-md-6 mb-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Manage Course</h6>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <div class="alert alert-success" role="alert" id="successMsg" style="display: none">
                            Course Updated successfully!
                        </div>
                        <div class="alert alert-danger" role="alert" id="successDMsg" style="display: none">
                            Course Delete successfully!
                        </div>
                        <div class="col-12 col-sm-12">
                            <table id="manageCourseTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="col-sm-2">ID</th>
                                        <th class="col-sm-2">Course Title</th>
                                        <th class="col-sm-2">Course Category</th>
                                        <th class="col-sm-2">Course Video File Name</th>
                                        <th class="col-sm-2">Course Thumbnail File Name</th>
                                        <th class="col-sm-2">Course Document File Name</th>
                                        <th class="col-sm-2">Course Description</th>
                                        <th class="col-sm-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Modal Delete Start-->
                <div class="modal fade" data-backdrop="true" id="delete-model" tabindex="-1" role="dialog" aria-
                    labelledby="deleteM" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteM">Warning!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this?
                                <input type="hidden" id="idd" name="idd">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="btn-delete" data-dismiss="modal">Yes,
                                    Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Delete End-->

                <!-- Start Modal Edit-->
                <div class="modal fade" data-backdrop="true" id="edit-model" tabindex="-1" aria-labelledby="editM"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editM">Edit File</h5>
                                <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" id="updateEditForm" enctype="multipart/form-data">

                                    @csrf
                                    <div class="alert alert-success" role="alert" id="successMsg" style="display: none">
                                        Course uploaded successfully!
                                    </div>
                                    <input type="hidden" id="id" name="id">
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
                                        <label for="uploadthumbFile" class="col-sm-2 col-form-label">Upload
                                            Thumbnail</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" id="c_thumbFile" name="c_thumbFile">
                                            <span class="text-danger" id="thumb-input-error"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="uploaddocFile" class="col-sm-2 col-form-label">Upload Additional
                                            Document (if any)</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="c_docfile" name="c_docfile">
                                            <span class="text-danger" id="adoc-input-error"></span>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="desc" class="col-sm-2 col-form-label">Course Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="c_description" name="c_description"
                                                rows="3"></textarea>
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
                    <!-- End Modal Edit -->


                    <link rel="stylesheet" href="{{asset('css\bootstrap.min.css')}}">
                    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
                        type="text/css">
                    <script src="{{asset('vendor\datatables\jquery.dataTables.min.js')}}"></script>
                    <script src="{{asset('vendor\bootstrap\js\bootstrap5-1-3.bundle.min.js')}}"></script>
                    <script src="js/manageCourse.js"></script>