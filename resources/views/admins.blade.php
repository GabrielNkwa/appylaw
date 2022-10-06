@extends('app2')

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ dark-table ] start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Admins</h5>
                        <span class="d-block m-t-5">these are the available users in the system</span>
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
                                        <th>Email</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($admins)
                                        @foreach($admins as $admin)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#editModal-{{ $admin->unique_id }}" href="javascript:void(0)"><i class="fa fa-edit text-info mr-2"></i></a>
                                                    <a onclick="return confirm('are you sure you want to delete this admin?')" href="{{ route('admins_delete', $admin->unique_id) }}"><i class="fa fa-trash text-danger"></i></a>
                                                </td>
                                            </tr>
                                            <div id="editModal-{{ $admin->unique_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLiveLabel">Edit Admin</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="{{ route('admins_update') }}">
                                                                @csrf
                                                                <input type="hidden" name="unique_id" value="{{ $admin->unique_id }}">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input autocomplete="off" class="form-control" type="text" name="name" placeholder="enter name of the admin" value="{{ $admin->name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input autocomplete="off" class="form-control" type="text" name="email" placeholder="enter email of the admin" value="{{ $admin->email }}" disabled="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>New Password</label>
                                                                    <input autocomplete="new-password" class="form-control" type="password" name="password" placeholder="enter password of the admin">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Confirm New Password</label>
                                                                    <input autocomplete="new-password" class="form-control" type="password" name="confirm_password" placeholder="confirm password of the admin">
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
                        @if($admins)
                            {{ $admins->withQueryString()->links() }}
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
                        <h5 class="modal-title" id="exampleModalLiveLabel">Add Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('admins_add') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input autocomplete="off" class="form-control" type="text" name="name" placeholder="enter name of the admin">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input autocomplete="off" class="form-control" type="text" name="email" placeholder="enter email of the admin">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input autocomplete="off" class="form-control" type="password" name="password" placeholder="enter password of the admin">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input autocomplete="off" class="form-control" type="password" name="confirm_password" placeholder="confirm password of the admin">
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection