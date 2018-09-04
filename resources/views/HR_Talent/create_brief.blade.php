@extends('layouts.default')
@section('title','Create Hiring Brief')

@section('js')
<!-- Datepicker bootstrap -->
<script src="{{ asset('assets/widgets/datepicker/datepicker.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js">
</script>
<script>
    $(function() { 
        $('.bootstrap-datepicker').bsdatepicker({
            format: 'dd-mm-yyyy',
            autoClose: true,
        });
    });
</script>

<!-- Timepicker -->
<script src="{{ asset('assets/widgets/timepicker/timepicker.js') }}"></script>
<script type="text/javascript">
    /* Timepicker */
    $(function() {
        $('.timepicker').timepicker();
    });
</script>
@stop

@section('content')

<h2>Create Schedule</h2>
<br />
<div style="color: tomato;">
	<p></p>
</div>

<div class="row">
    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
		        <div class="example-box-wrapper">
		        	<form role="form" action="{{ route('store.brief') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
			        @csrf
			        	<div class="row">
			        		<div class="col-md-8">
			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Job Title</label>
			        				<div class="col-md-8">
			        					<input type="text" name="" value="{{ ucwords($data->position_name) }}" class="form-control" disabled="true">
			        				</div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Department</label>
			        				<div class="col-md-8">
			        					<input type="text" name="" value="{{ $data->departments->department_name }}" class="form-control" disabled="true">
			        				</div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Date</label>
			        				<div class="col-md-3">
		                                <div class="input-prepend input-group">
		                                    <span class="add-on input-group-addon">
		                                        <i class="glyph-icon icon-calendar"></i>
		                                    </span>
		                                    <input type="text" name="date" id="datepicker" class="bootstrap-datepicker form-control" value="" required>
		                                </div>
		                            </div>

		                            <div class="col-md-3">
		                                <div class="{{-- bootstrap-timepicker dropdown --}} input-group">
		                                	<span class="add-on input-group-addon">
		                                        <i class="glyph-icon icon-clock-o"></i>
		                                    </span>
		                                    <input class="timepicker form-control" type="text" name="time">
		                                </div>
		                            </div>
		                            <div class="col-md-3">
		                                <div class="input-group">
		                                	<span class="add-on input-group-addon">
		                                        <i class="glyph-icon icon-institution"></i>
		                                    </span>
		                                    <input class="form-control" type="text" name="place">
		                                </div>
		                            </div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Interviewer User</label>
			        				<div class="col-md-8">
			        					<input type="text" name="interview_user" class="form-control">
			        				</div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Interviewer HRBP</label>
			        				<div class="col-md-8">
			        					<input type="text" name="interview_hrbp" class="form-control">
			        				</div>
			        			</div>
			        		</div>

			        		<div class="col-md-2">
			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Grade</label>
			        				<div class="col-md-4">
			        					<input type="text" value="{{ $data->position_grade }}" class="form-control text-center" disabled>
			        				</div>
			        			</div>
			        		</div>
			        	</div>
			        	<br><br>
			        	<div class="row">
			        		<div class="col-md-12">
			        			<div class="form-group">
			        				<label class="col-md-2 control-label" style="padding-left: 20px;">Job Function</label>
			        				<div class="col-md-8">
			        					<textarea class="form-control" rows="10"></textarea>
			        				</div>
			        			</div>
			        		</div>

			        		<div class="col-md-12">
			        			<div class="form-group">
			        				<label class="col-md-2 control-label" style="padding-left: 20px;">General Information</label>
			        				<div class="col-md-8">
			        					<textarea class="form-control" rows="10"></textarea>
			        				</div>
			        			</div>
			        		</div>

			        		<div class="col-md-12">
			        			<div class="form-group">
			        				<label class="col-md-2 control-label" style="padding-left: 20px;">Characteristics</label>
			        				<div class="col-md-8">
			        					<textarea class="form-control" rows="10"></textarea>
			        				</div>
			        			</div>
			        		</div>

			        		<div class="col-md-12">
			        			<div class="form-group text-center">
			        				<button type="submit" class="btn btn-primary">Create</button>	
			        			</div>
			        		</div>
			        	</div>

			        	{{-- <div id="wizard">
		                    <h2>Form ERF</h2>
		                    <section>
		                    	@include('Line_Manager1.form_erf')
		                    </section>

		                    <h2>Form JD</h2>
		                    <section>
		                        @include('Line_Manager1.form_jd')
		                    </section>
		                </div> --}}
		            </form>	
		        </div>
	        </div>

	    </div>
    </div>
</div>
@endsection