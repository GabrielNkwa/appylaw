@extends('app2')

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ dark-table ] start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Users</h5>
                        <span class="d-block m-t-5">these are the available users in the system</span>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Amount Spent</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($users)
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>&#8358; {{ number_format(0, 2, '.', ',') }}</td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#mailModal" href="javascript:void(0)"><i class="fa fa-envelope text-warning mr-2"></i></a>
                                                </td>
                                            </tr>

        <div id="mailModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLiveLabel">Send Mail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('add_document') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Subject</label>
                                <input autocomplete="off" class="form-control" type="text" name="subject" placeholder="enter subject of the mail">
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" type="text" name="message" placeholder="enter body of the mail"></textarea>
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
                        @if($users)
                            {{ $users->withQueryString()->links() }}
                        @endif
                    </div>
                </div>
            </div>
            <!-- [ dark-table ] end -->
        </div>
        <!-- [ Main Content ] end -->
@endsection