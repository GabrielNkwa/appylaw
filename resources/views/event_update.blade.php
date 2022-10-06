@extends('app2')

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Update Event</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('edit_event') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="unique_id" value="{{ $event->unique_id }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input autocomplete="off" class="form-control" type="text" name="title" placeholder="enter title of the event" value="{{ $event->title }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label value="">Access type</label>
                                        <select class="form-control" type="text" name="access_type" placeholder="" value="{{ $event->access_type }}">
                                            <option>choose type</option>
                                            <option @if($event->access_type == 'Free') selected="selected" @endif value="Free">Free</option>
                                            <option @if($event->access_type == 'Paid') selected="selected" @endif value="Paid">Paid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Subscription Price</label>
                                        <input autocomplete="off" class="form-control" type="text" name="price" placeholder="enter price of the event" value="{{ $event->price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input autocomplete="off" class="form-control" type="date" name="start_date" placeholder="enter start_date date" value="{{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input autocomplete="off" class="form-control" type="date" name="end_date" placeholder="enter end_date" value="{{ \Carbon\Carbon::parse($event->end_date)->format('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input class="form-control" type="file" name="avatar">
                            </div>
                            <div class="form-group">
                                <label>Body</label>
                                <textarea class="form-control" type="text" name="body" placeholder="enter body of the event">{{ $event->body }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
@endsection