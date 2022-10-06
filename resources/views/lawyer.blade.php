@extends('app2')

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ dark-table ] start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Lawyer's Profle</h5>
                        <span class="d-block m-t-5">these are the list of lawyers available</span>
                        <div class="card-header-right">
                            <button data-toggle="modal" data-target="#addModal" class="btn btn-success">Add new lawyer</button>
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Year Of Call</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($lawyers)
                                        @foreach($lawyers as $lawyer)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $lawyer->name }}</td>
                                                <td>{{ $lawyer->email }}</td>
                                                <td>{{ $lawyer->phone }}</td>
                                                <td>{{ $lawyer->practice_city }}</td>
                                                <td>{{ $lawyer->practice_state }}</td>
                                                <td>{{ $lawyer->year_of_call }}</td>
                                                <td>
                                                    <a href="{{ route('lawyer_details', $lawyer->unique_id) }}"><i class="fa fa-book text-info mr-2"></i></a>
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
                        <h5 class="modal-title" id="exampleModalLiveLabel">Add Lawyer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('add_lawyer') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input autocomplete="off" class="form-control" type="text" name="name" placeholder="enter name of the lawyer">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input autocomplete="off" class="form-control" type="text" name="email" placeholder="enter email of the lawyer">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone*</label>
                                        <input autocomplete="off" class="form-control" type="number" name="phone" placeholder="enter phone of the lawyer">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Year Of Call*</label>
                                        <input autocomplete="off" class="form-control" type="number" name="year_of_call" placeholder="enter year of call">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Practice State*</label>
                                        <select class="form-control" type="text" name="practice_state" id="practice_state" placeholder="enter practice state"></select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Practice City*</label>
                                        <input autocomplete="off" class="form-control" type="text" name="practice_city" placeholder="enter practice city">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Office Address*</label>
                                        <input autocomplete="off" class="form-control" type="text" name="office_address" placeholder="enter office address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Practice Areas</label>
                                        <input autocomplete="off" class="form-control" type="text" name="practice_areas" placeholder="enter practice areas separate by comma">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Schools Attended</label>
                                        <input autocomplete="off" class="form-control" type="text" name="schools_attended" placeholder="enter schools attended separate by comma">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input autocomplete="off" class="form-control" type="text" name="facebook" placeholder="enter facebook url">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input autocomplete="off" class="form-control" type="text" name="twitter" placeholder="enter twitter url">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>LinkedIn</label>
                                        <input autocomplete="off" class="form-control" type="text" name="linkedin" placeholder="enter linked in url">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Image*</label>
                                <input class="form-control" type="file" name="avatar">
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(()=>{
            $.getJSON("/plugins/json/state.json")
                .done((response)=>{
                    $('#practice_state').html('<option>choose state</option>')
                    $.each(response, (i, state)=>{
                        $('#practice_state').append('<option value="'+ state.name +'">'+ state.name +'</option>')
                    })
                })
                .fail((response)=>{
                    console.log(response)
                })
        })
    </script>
@endsection