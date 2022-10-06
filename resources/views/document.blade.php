@extends('app2')

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ dark-table ] start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Documents</h5>
                        <span class="d-block m-t-5">these are the available documents</span>
                        <div class="card-header-right">
                            <button data-toggle="modal" data-target="#addModal" class="btn btn-success">Add new document</button>
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Acces Type</th>
                                        <th>MDC</th>
                                        <th>Format</th>
                                        <th>Previous Price</th>
                                        <th>Current Price</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($documents)
                                        @foreach($documents as $document)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $categories->where("unique_id", $document->category_id)->first()->name }}</td>
                                                <td>{{ $document->name }}</td>
                                                <td>{{ $document->access_type }}</td>
                                                <td>{{ $document->maximum_download_count }}</td>
                                                <td>{{ $document->format }}</td>
                                                <td>&#8358; {{ number_format($document->previous_price, 2, '.', ',') }}</td>
                                                <td>&#8358; {{ number_format($document->current_price, 2, '.', ',') }}</td>
                                                <td>
                                                    <a href="{{ route('document_details', $document->unique_id) }}"><i class="fa fa-book text-info mr-2"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @if($documents)
                            {{ $documents->withQueryString()->links() }}
                        @endif
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
                        <h5 class="modal-title" id="exampleModalLiveLabel">Add Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('add_document') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" type="text" name="category_id" placeholder="enter name of the category">
                                            <option value="">choose category</option>
                                            @if($categories)
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->unique_id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input autocomplete="off" class="form-control" type="text" name="name" placeholder="enter name of the document">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                                        <label>Maximum Download Count</label>
                                        <input autocomplete="off" class="form-control" type="text" name="maximum_download_count" placeholder="enter maximum download count">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Format</label>
                                        <select class="form-control" type="text" name="format" placeholder="enter format of the document">
                                            <option value="">choose format</option>
                                            <option value="docx">docx</option>
                                            <option value="pdf">pdf</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Previous Price</label>
                                        <input autocomplete="off" class="form-control" type="number" step="any" name="previous_price" placeholder="enter previous price of the document">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Current Price</label>
                                        <input autocomplete="off" class="form-control" type="number" step="any" name="current_price" placeholder="enter current price of the document">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" type="text" name="description" placeholder="enter description of the document"></textarea>
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
                                <textarea class="form-control" type="text" name="tags" placeholder="enter tags separate with comma"></textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection