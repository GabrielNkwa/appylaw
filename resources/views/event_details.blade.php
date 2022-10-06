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
                                        <img src="{{ image_url($event->avatar) }}" class="d-block w-100" alt="Product images">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form class="pl-lg-4">
                                <h3 class="mt-0">{{ $event->title }} <a href="javascript: void(0);" class="text-muted"><i class="mdi mdi-square-edit-outline ml-2"></i></a> </h3>
                                <div class="mt-3">
                                    <h5><span class="badge badge-success">{{ $event->access_type }}</span></h5>
                                </div>
                                <div class="mt-4">
                                    <p>{{ $event->body }}</p>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mt-md-0 mt-2">
                                        <h6>Start Date:</h6>
                                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                            <p>{{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y H:i') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6>End Date:</h6>
                                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                            <p>{{ \Carbon\Carbon::parse($event->end_date)->format('d-m-Y H:i') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6>Price:</h6>
                                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                            <p>&#8358; {{ number_format($event->price, 2, '.', ',') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-md-0 mt-2">
                                        <a href="{{ route('event_sub', $event->unique_id) }}" class="btn btn-block btn-lg btn-outline-primary">Sub</a>
                                    </div>
                                    <div class="col-md-4 mt-md-0 mt-2">
                                        <a href="{{ route('event_update', $event->unique_id) }}" class="btn btn-block btn-lg btn-outline-secondary"> Update</a>
                                    </div>
                                    <div class="col-md-4 mt-md-0 mt-2">
                                        <a onclick="return confirm('are you sure you want to delete this event?')" href="{{ route('delete_event', $event->unique_id) }}" class="btn btn-block btn-lg btn-outline-danger"> Delete</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection