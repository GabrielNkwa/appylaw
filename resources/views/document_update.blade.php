@extends('app2')

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Update Document</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('edit_document') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="unique_id" value="{{ $document->unique_id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" type="text" name="category_id" placeholder="enter name of the document" value="{{ $document->category_id }}">
                                            <option value="">choose category</option>
                                            @if($categories)
                                                @foreach($categories as $category)
                                                    <option @if($category->unique_id == $document->category_id) selected="selected" @endif value="{{ $category->unique_id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input autocomplete="off" class="form-control" type="text" name="name" placeholder="enter name of the document" value="{{ $document->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Access type</label>
                                        <select class="form-control" type="text" name="access_type" placeholder="enter name of the document" value="{{ $document->access_type }}">
                                            <option value="">choose type</option>
                                            <option @if($document->access_type == 'Free') selected="selected" @endif value="Free">Free</option>
                                            <option @if($document->access_type == 'Paid') selected="selected" @endif value="Paid">Paid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Maximum Download Count</label>
                                        <input autocomplete="off" class="form-control" type="text" name="maximum_download_count" placeholder="enter maximum download count" value="{{ $document->maximum_download_count }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Format</label>
                                        <select class="form-control" type="text" name="format" placeholder="enter name of the document" value="{{ $document->format }}">
                                            <option value="">choose format</option>
                                            <option @if($document->format == 'docx') selected="selected" @endif value="docx">docx</option>
                                            <option @if($document->format == 'pdf') selected="selected" @endif value="pdf">pdf</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Current Price</label>
                                        <input autocomplete="off" class="form-control" type="number" step="any" name="current_price" placeholder="enter current price of the document" value="{{ $document->current_price }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Previous Price</label>
                                        <input autocomplete="off" class="form-control" type="number" step="any" name="previous_price" placeholder="enter previous price of the document" value="{{ $document->previous_price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" type="text" name="description" placeholder="enter description of the document">{{ $document->description }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Thumbnail</label>
                                        <input class="form-control" type="file" name="thumbnail">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Content</label>
                                        <input class="form-control" type="file" name="content">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <textarea class="form-control" type="text" name="tags" placeholder="enter tags separate with comma">{{ $document->tags }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
@endsection