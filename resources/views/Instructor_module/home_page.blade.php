            <!-- Home -->
            <div class="col-xl-12 col-md-6 mb-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Download Course</h6>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <div class="text-center container py-5">
                            <div class="row">
                                @foreach($filedata as $data)
                                <div class="col-lg-4 col-md-12 mb-4">
                                    <div class="card">
                                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                                            data-mdb-ripple-color="light">
                                            <img src="{{ asset('storage/thumbs_uploads/'. $data->c_thumb_file_name) }}"
                                                class="w-100" />
                                            <a href="#!">
                                                <div class="mask">
                                                </div>
                                                <div class="hover-overlay">
                                                    <div class="mask"
                                                        style="background-color: rgba(251, 251, 251, 0.15);">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <a id="viewCourseDetails" class="text-reset" data-bs-toggle="modal"
                                                data-bs-target="#view-model" data-id="{{$data->id}}">
                                                <h5 class="card-title mb-3">{{$data->c_title}}</h5>
                                            </a>
                                            <p>{{$data->c_category}}</p>
                                            <a href="file-upload/download/{{$data->c_vid_file_name}}" download="{{$data->c_vid_file_name}}">
                                                <button type="button" class="btn btn-primary">Download<span
                                                        class="fa fa-download"></span></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Modal Edit-->
            <div class="modal fade" data-backdrop="true" id="view-model" tabindex="-1" aria-labelledby="viewM"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewM">Course Details</h5>
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

                                <div class="form-group row">
                                    <label for="cid" class="col-sm-2 col-form-label">Course ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="c_id" name="c_id" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="catName" class="col-sm-2 col-form-label">Course Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="c_title" name="c_title" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="couTitle" class="col-sm-2 col-form-label">Course Category</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="c_category" name="c_category"
                                            readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="desc" class="col-sm-2 col-form-label">Course Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="c_description" name="c_description" rows="3"
                                            readonly></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal Edit -->

                <link rel="stylesheet" href="{{asset('css\bootstrap.min.css')}}">
                <script src="{{asset('vendor\bootstrap\js\bootstrap5-1-3.bundle.min.js')}}"></script>
                <script src="js/view-details-modal.js"></script>