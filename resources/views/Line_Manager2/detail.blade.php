@extends('layouts.default')
@section('title','Detail Ticket')
@section('js')

<!-- JQuery Validate -->
<script type="text/javascript">	
    	var form = $("#form_ticket");

		$('#wizard').steps({
		    headerTag: "h2",
		    bodyTag: "section",
		    transitionEffect: "slideLeft",
		    enableAllSteps: true,
		    enableFinishButton : false,
    		enablePagination: false,
		});
</script>
@stop

@section('content')
<ol class="breadcrumb bc-3" >
    <li>
        <a href="{{ route('lm2.approval') }}">Approval Ticket</a>
    </li>
    <li class="active">
    	<a>Detail Ticket</a>
    </li>
</ol>

<h2>Detail Ticket</h2>
<br>
<div style="color: tomato;">
<p></p>
</div>

<div class="row">
    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
		        <form role="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal" id="form_ticket">
		        	<div id="wizard">
	                    <h2>Employee Requisition Form</h2>
	                    <section>
	                    	<div class="row">
	                    		<div class="col-md-6">
	                    			<fieldset class="the-fieldset">
		                    			<div class="form-group">
			                    			<label class="col-md-4">Position Name</label>
			                    			<label class="col.6 col-md-1">:</label>
			                    			<label class="col-md-7">{{ ucwords($detail->position_name) }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Grade</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ $detail->position_grade }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Location</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ ucwords($detail->location) }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Reporting TO</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ ucwords($detail->ticket_erf_details->reporting_to) }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Directorate</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ ucwords($detail->ticket_erf_details->directorate) }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Group</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Division</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Department</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Employee Status</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ $detail->ticket_erf_details->employee_status }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Contract Periode</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ \Carbon\Carbon::parse($detail->ticket_erf_details->contract_from)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($detail->ticket_erf_details->contract_to)->format('d/m/Y') }}</label>
		                    			</div>
	                    			</fieldset>
	                    		</div>

	                    		<div class="col-md-6">
	                    			<fieldset class="the-fieldset">
		                    			<div class="form-group">
			                    			<label class="col-md-4">Type Of Hiring</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">
				                    			@if ( $detail->ticket_erf_details->type_hiring == "IJO" )
				                    				Internal Job Offering
				                    			@elseif( $detail->ticket_erf_details->type_hiring == "EJO")
				                    				External Job Offering
				                    			@endif
			                    			</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Advertisement</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ $detail->ticket_erf_details->advertisement }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Bussiness Impact</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ $detail->ticket_erf_details->bussiness_impact }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Request Background</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ $detail->ticket_erf_details->request_background }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Reason</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ ucfirst($detail->reason) }}</label>
		                    			</div>
	                    			</fieldset>
	                    		</div>
	                    	</div>
	                    </section>

	                    <h2>Job Description</h2>
	                    <section>

	                    	<div class="row">
	                    		<div class="col-md-6">
	                    			<fieldset class="the-fieldset">
		                    			<div class="form-group">
			                    			<label class="col-md-4">Supervisor Title</label>
			                    			<label class="col.6 col-md-1">:</label>
			                    			<label class="col-md-7">{{ ucwords($detail->ticket_jd_details->supervisor) }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Incumbent Name</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ $detail->ticket_jd_details->incumbent_name }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Supervisor Name</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ ucwords($detail->ticket_jd_details->supervisor_name) }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Role Purpose</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ ucwords($detail->ticket_jd_details->role_purpose) }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Direct Sub Ordinate</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ $detail->ticket_jd_details->direct_sub }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Indirect Sub Ordinate</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ ucwords($detail->ticket_jd_details->indirect_sub) }}</label>
		                    			</div>
	                    			</fieldset>
	                    		</div>

	                    		<div class="col-md-6">
	                    			<fieldset class="the-fieldset">
		                    			<div class="form-group">
			                    			<label class="col-md-4">Internal (Within Function)</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ $detail->ticket_jd_details->internal_within }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Cross Function (Outside Of Function)</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ $detail->ticket_jd_details->internal_outside }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">External</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ $detail->ticket_jd_details->external }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Qualification & Experience</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ $detail->ticket_jd_details->qualification }}</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Skill</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7">{{ $detail->ticket_jd_details->skill }}</label>
		                    			</div>
	                    			</fieldset>
	                    		</div>
	                    	</div>
<br><br>
	                    	<div class="row">
	                    		<div class="form-group">
				                	<div class="col-md-12">

		                            	<table class="table table-striped table-bordered responsive" id="table_custom">
				                			<thead>
				                				<tr>
				                					<th class="col-sm-1 text-center">No.</th>
				                					<th class="col-sm-3 text-center">Area Of Responsibilities</th>
				                					<th class="text-center">Key Activities</th>
				                				</tr>
				                			</thead>
				                			<tbody>
				                				@php $no=1; @endphp
				                				@foreach($scope_area as $array => $value)
					                				<tr>
					                					<td class="text-center">{{ $no++ }}</td>
				                						<td>
				                							{{-- <textarea class="form-control" cols="27" rows="3" name="scope_area[]"> --}}
				                								{{ ucwords($value) }}
				                							{{-- </textarea> --}}
					                					</td>
					                					<td>
					                						{{-- <textarea class="form-control" id="addLine" cols="77" rows="4" name="scope_activities[]"> --}}	{{ ucfirst($scope_activities[$array]) }}
					                						{{-- </textarea> --}}
					                					</td>	
					                				</tr>
					                			@endforeach
				                			</tbody>
				                		</table>
			                        	
				                	</div>
			                    </div>
	                    	</div>

	                    	<div class="row">
	                    		<div class="form-group">
			                		<div class="col-sm-12">
			                			<table class="table table-striped table-bordered">
				                			<thead>
				                				<tr>
				                					<th class="col-sm-1 text-center">No</th>
				                					<th class="col-sm-9 text-center">Soft Competencies</th>
				                					<th class="col-sm-2 text-center">Proficiency Level</th>
				                				</tr>
				                			</thead>
				                			<tbody>
				                				<tr>
				                					<td class="text-center">1</td>
			                						<td>Learning Agility</td>
			                						<td class="text-center">{{ $soft[0] }}</td>
				                				</tr>
				                				<tr>
				                					<td class="text-center">2</td>
			                						<td>Making Difference</td>
				                					<td class="text-center">{{ $soft[1] }}</td>
				                				</tr>
				                				<tr>
				                					<td class="text-center">3</td>
				                					<td>People Management</td>
				                					<td class="text-center">{{ $soft[2] }}</td>
				                				</tr>
				                				<tr>
				                					<td class="text-center">4</td>
				                					<td>Accelerate Business And Customer</td>
				                					<td class="text-center">{{ $soft[3] }}</td>
				                				</tr>
				                				<tr>
				                					<td class="text-center">5</td>
				                					<td>Translating Strategy into Action</td>
				                					<td class="text-center">{{ $soft[4] }}</td>
				                				</tr>
				                				<tr>
				                					<td class="text-center">6</td>
				                					<td>Decisiveness</td>
				                					<td class="text-center">{{ $soft[5] }}</td>
				                				</tr>
				                				<tr>
				                					<td class="text-center">7</td>
				                					<td>Cultivate  Networks & Partnerships</td>
				                					<td class="text-center">{{ $soft[6] }}</td>
				                				</tr>
				                			</tbody>
				                		</table>
				                		<span><i style="color: red;">Proficiency Level: 1. Significant Development Needed; 2. Development Needed; 3. Partially Meet Expectation; 4. Meet Expectation; 5. Exceed Expectation</i></span>
			                		</div>
				                </div>
				                <br><br>
	                    	</div>

	                    	<div class="row">
	                    		<div class="form-group">
			                		<div class="col-sm-12">
			                			<table class="table table-striped table-bordered">
				                			<thead>
				                				<tr>
				                					<th class="col-sm-1 text-center">No</th>
				                					<th class="col-sm-9 text-center">Hard Competencies</th>
				                					<th class="col-sm-2 text-center">Proficiency Level</th>
				                				</tr>
				                			</thead>
				                			<tbody>
				                				<tr>
				                					<td class="text-center">1</td>
			                						<td>Career & Talent Management</td>
			                						<td class="text-center">{{ $hard[0] }}</td>
				                				</tr>
				                				<tr>
				                					<td class="text-center">2</td>
			                						<td>Competency Development & Assessment</td>
				                					<td class="text-center">{{ $hard[1] }}</td>
				                				</tr>
				                				<tr>
				                					<td class="text-center">3</td>
				                					<td>Compensation & Benefit Management</td>
				                					<td class="text-center">{{ $hard[2] }}</td>
				                				</tr>
				                				<tr>
				                					<td class="text-center">4</td>
				                					<td>Organization Design</td>
				                					<td class="text-center">{{ $hard[3] }}</td>
				                				</tr>
				                				<tr>
				                					<td class="text-center">5</td>
				                					<td>Performance Management</td>
				                					<td class="text-center">{{ $hard[4] }}</td>
				                				</tr>
				                				<tr>
				                					<td class="text-center">6</td>
				                					<td>Project Management</td>
				                					<td class="text-center">{{ $hard[5] }}</td>
				                				</tr>
				                				<tr>
				                					<td class="text-center">7</td>
				                					<td>Business Process Design & Improvement</td>
				                					<td class="text-center">{{ $hard[6] }}</td>
				                				</tr>
				                				<tr>
				                					<td class="text-center">8</td>
				                					<td>Telco & Digital Business</td>
				                					<td class="text-center">{{ $hard[7] }}</td>
				                				</tr>
				                			</tbody>
				                		</table>
				                		<span><i style="color: red;">*Proficiency Level: 1. Introductory; 2. Basic; 3. Intermediate; 4. Advanced; 5. Expert</i></span>
			                		</div>
				                </div>
	                    	</div>

	                    </section>
	                </div>

	            <div class="form-group text-center">
	            	<a href="{{ route('lm2.approval') }}" type="button" class="btn btn-info">Back</a>	
	            </div>

	            </form>
	        </div>

	    </div>
    </div>
</div>
@endsection