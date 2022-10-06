@extends('app2')

@section('content')
        <div class="row">
            <!-- Zero config table start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>All Blog</h5>
                        <a href="#!" class="btn btn-info" data-toggle="modal" data-target="#testimonialModal"> <i class="feather icon-file"></i>&nbsp;&nbsp;New Blog</a>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>title</th>
                                        <th>url</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td><img src="{{ '/storage/' . $blog->image }}" style="width: 40px; height: 40px;"></td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->url }}</td>
                                            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal-{{ $blog->unique_id }}"> Edit</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $blog->unique_id }}"> Delete</button>
                                            </td>
                                        </tr>
            <!-- Zero config table end -->
            <div id="editModal-{{ $blog->unique_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form method="post" action="{{ route('blogs_update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="unique_id" value="{{ $blog->unique_id }}">
                            <div class="modal-header">
                                <h5 class="modal-title text-info" id="exampleModalCenterTitle">Update Blog</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="Text">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{ $blog->title }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="Text">Url</label>
                                            <input type="text" class="form-control" name="url" id="url" placeholder="Enter Url" value="{{ $blog->url }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="Text">Image</label>
                                            <input type="file" class="form-control" name="file" id="file" placeholder="Enter Testifier">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="" for="Text">Description</label>
                                            <textarea type="text" class="form-control" name="description" placeholder="Enter Description">{{ $blog->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="" for="Text">Body</label>
                                            <textarea type="text" class="form-control summernote" name="body" placeholder="Enter Body">{!! $blog->body !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn  btn-info">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="deleteModal-{{ $blog->unique_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-c-red" id="exampleModalCenterTitle">Delete Blog</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-0">Deleting this content will erase all data associated with it. Once deleted, you will not be able to recover the details.</p>
                        </div>
                        <div class="modal-footer">
                            <a href={{ route('blogs_delete',$blog->unique_id) }} class="btn  btn-danger">Yes Delete</a>
                        </div>
                    </div>
                </div>
            </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Zero config table end -->
            <!-- Zero config table end -->
            <div id="testimonialModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form method="post" action="{{ route('blogs_create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title text-info" id="exampleModalCenterTitle">Create Blog</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="Text">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="Text">Url</label>
                                            <input type="text" class="form-control" name="url" id="url" placeholder="Enter Url e.g how-to-trade">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="Text">Image</label>
                                            <input type="file" class="form-control" name="file" id="file" placeholder="Enter Testifier">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="" for="Text">Description</label>
                                            <textarea type="text" class="form-control" name="description" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="" for="Text">Body</label>
                                            <textarea type="text" class="form-control summernote" name="body" placeholder="Enter Body"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn  btn-info">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection