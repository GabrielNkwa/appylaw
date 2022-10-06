@extends('app2')

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ dark-table ] start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Sales History</h5>
                        <span class="d-block m-t-5">these are the list of document sales</span>
                        <div class="card-header-right">
                            <button data-toggle="modal" data-target="#addModal" class="btn btn-success">Add new event</button>
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Access Type</th>
                                        <th>Price</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Subscribers</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($events)
                                        @foreach($events as $event)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $event->title }}</td>
                                                <td>{{ $event->access_type }}</td>
                                                <td>&#8358; {{ number_format($event->price, 2, '.', ',') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y H:i') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($event->end_date)->format('d-m-Y H:i') }}</td>
                                                <td>{{ get_event_sub($event->unique_id)}}</td>
                                                <td>
                                                    <a href="{{ route('event_details', $event->unique_id) }}"><i class="fa fa-book text-info mr-2"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ dark-table ] end -->
        </div>
        <!-- [ Main Content ] end -->

        <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLiveLabel">Add Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('add_event') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input autocomplete="off" class="form-control" type="text" name="title" placeholder="enter title of the event">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Access type</label>
                                        <select class="form-control" type="text" name="access_type" placeholder="enter name of the document">
                                            <option value="">choose type</option>
                                            <option value="Free">Free</option>
                                            <option value="Paid">Paid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Subscription Price</label>
                                        <input autocomplete="off" class="form-control" type="number" step="any" name="price" placeholder="enter event subscription price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input autocomplete="off" class="form-control" type="date" name="start_date" placeholder="enter title of the event">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input autocomplete="off" class="form-control" type="date" name="end_date" placeholder="enter title of the event">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input class="form-control" type="file" name="avatar">
                            </div>
                            <div class="form-group">
                                <label>Body</label>
                                <textarea class="form-control" type="text" name="body" placeholder="enter body of the event"></textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection