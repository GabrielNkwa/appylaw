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
                                        <img src="{{ image_url($document->thumbnail) }}" class="d-block w-100" alt="Product images">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form class="pl-lg-4">
                                <h3 class="mt-0">{{ $document->name }} <a href="javascript: void(0);" class="text-muted"><i class="mdi mdi-square-edit-outline ml-2"></i></a> </h3>
                                <div class="mt-3">
                                    <h5><span class="badge badge-success">{{ $document->access_type }}</span></h5>
                                </div>
                                <div class="mt-4">
                                    <p>{{ $document->description }}</p>
                                </div>
                                <div class="mt-3 mb-3">
                                    <h5><span class="badge badge-success">{{ $document_ratings }} <i class="feather icon-star-on"></i></span> {{ $document_reviews }} reviews</h5>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>ID:</h6>
                                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                            <p>#{{ $document->unique_id }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-md-0 mt-2">
                                        <h6>Category:</h6>
                                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                            <p>{{ $categories->where("unique_id", $document->category_id)->first()->name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6>Previous Price:</h6>
                                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                            <p>&#8358; {{ number_format($document->previous_price, 2, '.', ',') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-md-0 mt-2">
                                        <h6>Current Price:</h6>
                                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                            <p>&#8358; {{ number_format($document->current_price, 2, '.', ',') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <h6>Tags:</h6>
                                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                            @php $tags = explode(",", $document->tags) @endphp
                                            @for($i = 0; $i < count($tags); $i++)
                                            <div class="media">
                                                <i class="fas fa-tag text-info mr-2"></i>
                                                <div class="media-body">
                                                    <p>{{ $tags[$i] }}</p>
                                                </div>
                                            </div>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-md-0 mt-2">
                                        <a href="{{ route('document_sales', $document->unique_id) }}" class="btn btn-block btn-lg btn-outline-primary">Sales</a>
                                    </div>
                                    <div class="col-md-4 mt-md-0 mt-2">
                                        <a href="{{ route('document_update', $document->unique_id) }}" class="btn btn-block btn-lg btn-outline-secondary"> Update</a>
                                    </div>
                                    <div class="col-md-4 mt-md-0 mt-2">
                                        <a onclick="return confirm('are you sure you want to delete this document?')" href="{{ route('delete_document', $document->unique_id) }}" class="btn btn-block btn-lg btn-outline-danger"> Delete</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection