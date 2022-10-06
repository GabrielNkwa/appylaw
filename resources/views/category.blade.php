@extends('app2')

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ dark-table ] start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Categories</h5>
                        <span class="d-block m-t-5">these are the categories of the templates</span>
                        <div class="card-header-right">
                            <button data-toggle="modal" data-target="#addModal" class="btn btn-success">Add new category</button>
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($categories)
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->description }}</td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#editModal-{{ $category->unique_id }}" href="javascript:void(0)"><i class="fa fa-edit text-info mr-2"></i></a>
                                                    <a onclick="return confirm('are you sure you want to delete this category?')" href="{{ route('delete_category', $category->unique_id) }}"><i class="fa fa-trash text-danger"></i></a>
                                                </td>
                                            </tr>
                                            <div id="editModal-{{ $category->unique_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLiveLabel">Edit Category</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="{{ route('edit_category') }}">
                                                                @csrf
                                                                <input type="hidden" name="unique_id" value="{{ $category->unique_id }}">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input autocomplete="off" class="form-control" type="text" name="name" placeholder="enter name of the category" value="{{ $category->name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea class="form-control" type="text" name="description" placeholder="enter description of the category">{{ $category->description }}</textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-info">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @if($categories)
                            {{ $categories->withQueryString()->links() }}
                        @endif
                    </div>
                </div>
            </div>
            <!-- [ dark-table ] end -->
        </div>
        <!-- [ Main Content ] end -->

        <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLiveLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('add_category') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input autocomplete="off" class="form-control" type="text" name="name" placeholder="enter name of the category">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" type="text" name="description" placeholder="enter description of the category"></textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection