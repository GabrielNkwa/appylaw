@extends('app2')

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Send Bulk Mail</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('mailer_post') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" type="text" name="category" placeholder="enter name of the category">
                                            <option value="">choose category</option>
                                            <option value="1">All Users</option>
                                            <option value="2">Subscribers</option>
                                            <option value="3">Non Subscribers</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>message</label>
                                <textarea class="form-control" type="text" name="message" placeholder="type message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
@endsection