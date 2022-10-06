@extends('app2')

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Update Layer</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('edit_lawyer') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="unique_id" value="{{ $lawyer->unique_id }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input autocomplete="off" class="form-control" type="text" name="name" placeholder="enter name of the lawyer" value="{{ $lawyer->name }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input autocomplete="off" class="form-control" type="text" name="email" placeholder="enter email of the lawyer" value="{{ $lawyer->email }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone*</label>
                                        <input autocomplete="off" class="form-control" type="number" name="phone" placeholder="enter phone of the lawyer" value="{{ $lawyer->phone }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Year Of Call*</label>
                                        <input autocomplete="off" class="form-control" type="number" name="year_of_call" placeholder="enter year of call" value="{{ $lawyer->year_of_call }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Practice State*</label>
                                        <select class="form-control" type="text" name="practice_state" id="practice_state" placeholder="enter practice state" value="{{ $lawyer->practice_state }}"></select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Practice City*</label>
                                        <input autocomplete="off" class="form-control" type="text" name="practice_city" placeholder="enter practice city" value="{{ $lawyer->practice_city }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Office Address*</label>
                                        <input autocomplete="off" class="form-control" type="text" name="office_address" placeholder="enter office address" value="{{ $lawyer->office_address }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Practice Areas</label>
                                        <input autocomplete="off" class="form-control" type="text" name="practice_areas" placeholder="enter practice areas separate by comma" value="{{ $lawyer->practice_areas }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Schools Attended</label>
                                        <input autocomplete="off" class="form-control" type="text" name="schools_attended" placeholder="enter schools attended separate by comma" value="{{ $lawyer->schools_attended }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input autocomplete="off" class="form-control" type="text" name="facebook" placeholder="enter facebook url" value="{{ $lawyer->facebook }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input autocomplete="off" class="form-control" type="text" name="twitter" placeholder="enter twitter url" value="{{ $lawyer->twitter }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>LinkedIn</label>
                                        <input autocomplete="off" class="form-control" type="text" name="linkedin" placeholder="enter linkedin url" value="{{ $lawyer->linkedin }}">
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
        <!-- [ Main Content ] end -->
@endsection

@section('scripts')
    <script type="text/javascript">
        var practice_state = "{{ $lawyer->practice_state }}"
        $(document).ready(()=>{
            $.getJSON("/plugins/json/state.json")
                .done((response)=>{
                    $('#practice_state').html('<option>choose state</option>')
                    $.each(response, (i, state)=>{
                        $('#practice_state').append('<option '+ (state.name == practice_state ? 'selected="selected"' : null ) +' value="'+ state.name +'">'+ state.name +'</option>')
                    })
                })
                .fail((response)=>{
                    console.log(response)
                })
        })
    </script>
@endsection