@extends('app2')

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ image_url($lawyer->avatar) }}" class="d-block w-100" alt="Product images">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form class="pl-lg-4">
                                <h3 class="mt-0">{{ $lawyer->name }} <a href="javascript: void(0);" class="text-muted"><i class="mdi mdi-square-edit-outline ml-2"></i></a> </h3>
                                <div class="mt-3">
                                    <h5><i class="fa fa-map-marker text-success"></i> {{ $lawyer->practice_city }}, {{ $lawyer->practice_state }}</h5>
                                    <p>{{ $lawyer->office_address }}</p>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mt-md-0 mt-2">
                                        <h6>Email:</h6>
                                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                            <p>{{ $lawyer->email }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6>Phone:</h6>
                                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                            <p>{{ $lawyer->phone }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6>Year of Call:</h6>
                                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                            <p>{{ $lawyer->year_of_call }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6>Facebook:</h6>
                                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                            <p>{{ $lawyer->facebook }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6>Twitter:</h6>
                                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                            <p>{{ $lawyer->twitter }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6>LinkedIn:</h6>
                                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                            <p>{{ $lawyer->linkedin }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-md-0 mt-2">
                                        <a href="{{ route('lawyer_update', $lawyer->unique_id) }}" class="btn btn-block btn-lg btn-outline-secondary"> Update</a>
                                    </div>
                                    <div class="col-md-6 mt-md-0 mt-2">
                                        <a onclick="return confirm('are you sure you want to delete this lawyer?')" href="{{ route('delete_lawyer', $lawyer->unique_id) }}" class="btn btn-block btn-lg btn-outline-danger"> Delete</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection