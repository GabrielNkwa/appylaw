@extends('app2')

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Profile</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile_post') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="username">name</label>
                                        <input autocomplete="off" name="name" type="text" class="form-control" id="name" value="{{ user()->name }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="password">password</label>
                                        <input autocomplete="new-password" name="password" type="password" class="form-control" id="password" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="confirm_password">confirm password</label>
                                        <input autocomplete="new-password" name="confirm_password" type="password" class="form-control" id="confirm_password" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
@endsection