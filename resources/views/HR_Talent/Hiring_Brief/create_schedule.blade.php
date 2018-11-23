@extends('layouts.default')
@section('title','Create Schedule')

@section('js')
<!-- Datepicker bootstrap -->
<script>
    $(function() { 
        $('.date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose : true,
            todayHighlight : true,
            startDate: new Date()
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

<!-- select 2 -->
<script src="{{ asset('assets/select2/select2.js') }}"></script>
<script>
	$(document).ready( function() {
		$('.int-user').select2({
			placeholder: "Select Interviewer User",
			theme: "bootstrap",
		});

		$('.int-hrbp').select2({
			placeholder: "Select Interviewer HR Business Partner",
			theme: "bootstrap",
		});
	});
</script>
@stop

@section('content')
<ol class="breadcrumb">
    <li>
        <a href="{{ route('hiring_brief') }}">Hiring Brief</a>
    </li>
    <li>
    	<span>Create Schedule</span>
    </li>
</ol>

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
		        	<form role="form" action="{{ route('schedule.brief',$data->hiring_briefs->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
			        @csrf
			        @method('PATCH')
			        	<div class="row">
			        		<div class="col-md-8">
			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Job Title </label>
			        				<div class="col-md-8">
			        					<h4 class="control-label pull-left"><em>{{ $data->position_name }}</em></h4>
			        				</div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Grade </label>
			        				<div class="col-md-2">
			        					<h4 class="control-label pull-left"><em>{{ $data->position_grade }}</em></h4>
			        				</div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Department </label>
			        				<div class="col-md-8">
			        					<h4 class="control-label pull-left"><em>{{ $data->ticket_erf_details->departments->department_name}}</em></h4>
			        				</div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Schedule</label>
		                            <div class="col-md-3">
		                            	<div class="input-group date">
			                            	<span class="add-on input-group-addon" id="date">
		                                        <i class="glyph-icon icon-calendar"></i>
		                                    </span>	
										    <input type="text" name="date" id="date" class="form-control" required>
										</div>
		                            </div>

		                            <div class="col-md-3">
		                                <div class="input-group">
		                                	<span class="add-on input-group-addon">
		                                        <i class="glyph-icon icon-clock-o"></i>
		                                    </span>
		                                    <input class="timepicker form-control" type="text" name="time" required>
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
			        				<div class="col-md-6">
			        					<select class="form-control int-user" name="interview_user" required title="Select Interviewer User" style="width: 100%">
			                                <option></option>
			                                @foreach( $user as $user)
			                                  <option value="{{ $user->id }}">{{ $user->name }}</option>
			                                @endforeach
			                            </select>
			        				</div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Interviewer HR Business Partner</label>
			        				<div class="col-md-6">
			        					<select class="form-control int-hrbp" name="interview_hrbp" required title="Select Interviewer HR Business Partner" style="width: 100%">
			                                <option></option>
			                                @foreach( $HRBP as $HRBP)
			                                  <option value="{{ $HRBP->id }}">{{ $HRBP->name }}</option>
			                                @endforeach
			                            </select>
			        				</div>
			        			</div>
			        		</div>
			        	</div>
			        	<br>

		        		<div class="col-md-12">
		        			<div class="form-group text-center">
		        				<button type="submit" class="btn btn-info">Create</button>	
		        			</div>
		        		</div>

		            </form>	
		        </div>
	        </div>

	    </div>
    </div>
</div>
@endsection