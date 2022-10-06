@extends('app2')

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-yellow">&#8358; {{ number_format(daily_earning_document($document->unique_id), 2, '.', ',') }}</h4>
                                <h6 class="text-muted m-b-0">Daily Sales</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="feather icon-bar-chart-2 f-28"></i>
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
                                <h4 class="text-c-yellow">&#8358; {{ number_format(weekly_earning_document($document->unique_id), 2, '.', ',') }}</h4>
                                <h6 class="text-muted m-b-0">Weekly Sales</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="feather icon-bar-chart-2 f-28"></i>
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
                                <h4 class="text-c-yellow">&#8358; {{ number_format(monthly_earning_document($document->unique_id), 2, '.', ',') }}</h4>
                                <h6 class="text-muted m-b-0">Monthly Sales</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="feather icon-bar-chart-2 f-28"></i>
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
                                <h4 class="text-c-yellow">&#8358; {{ number_format(yearly_earning_document($document->unique_id), 2, '.', ',') }}</h4>
                                <h6 class="text-muted m-b-0">Yearly Sales</h6>
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
                        <h5>Sales History</h5>
                        <span class="d-block m-t-5">these are the list of document sales</span>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Category</th>
                                        <th>Document</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($invoice_items)
                                        @foreach($invoice_items as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $item->user }}</td>
                                                <td>{{ $item->category }}</td>
                                                <td>{{ $item->document }}</td>
                                                <td>&#8358; {{ number_format($item->item_price, 2, '.', ',') }}</td>
                                                <td class="text-{{ $item->is_paid ? 'success' : 'danger' }}">{{ $item->is_paid ? 'Paid' : 'Pending' }}</td>
                                                <td>
                                                    <a href="javascript:void(0)"><i class="fa fa-history text-info mr-2"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @if($invoice_items)
                            {{ $invoice_items->withQueryString()->links() }}
                        @endif
                    </div>
                </div>
            </div>
            <!-- [ dark-table ] end -->
        </div>
        <!-- [ Main Content ] end -->
@endsection