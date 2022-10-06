@extends('app2')

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-yellow">{{ get_event_sub($event->unique_id) }}</h4>
                                <h6 class="text-muted m-b-0">Total Subscription</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fa fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-yellow">&#8358; {{ number_format(get_event_earnings($event->unique_id), 2, '.', ',') }}</h4>
                                <h6 class="text-muted m-b-0">Total Subscription Earnings</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="feather icon-bar-chart-2 f-28"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ dark-table ] start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $event->title }} Event</h5>
                        <span class="d-block m-t-5">these are subscriptions of the events</span>
                        <div class="card-header-right">
                            <button data-toggle="modal" data-target="#addModal" class="btn btn-success">Manual Subscription</button>
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Subscription Date</th>
                                        <th>Status</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($event_subs)
                                        @foreach($event_subs as $event_sub)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $event_sub->user }}</td>
                                                <td>{{ \Carbon\Carbon::parse($event_sub->updated_at)->format('d-m-Y H:i') }}</td>
                                                <td class="text-{{ $event_sub->is_paid ? 'success' : 'danger' }}">{{ $event_sub->is_paid ? 'Paid' : 'Pending' }}</td>
                                                <td>
                                                    <a href="javascript:void(0)"><i class="fa fa-history text-info mr-2"></i></a>
                                                    <a onclick="return confirm('are you sure you want to delete this subscription?')" href="{{ route('event_sub_delete', $event_sub->unique_id) }}"><i class="fa fa-trash text-danger"></i></a>
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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLiveLabel">Manual Subscription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('event_sub_manual') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="hidden" name="event_id" value="{{ $event->unique_id }}">
                                <input autocomplete="off" class="form-control" type="text" name="email" placeholder="enter email of user">
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection