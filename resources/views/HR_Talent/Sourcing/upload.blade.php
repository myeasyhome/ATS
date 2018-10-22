@extends('layouts.default')
@section('title','Upload CV Candidate')

@section('js')
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable-bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable-responsive.js') }}"></script>

<script type="text/javascript">
    /* Datatables responsive */
    $(function() {
        $('#datatable-responsive').DataTable( {
            "responsive": true
        } );
    } );

    $(function() {
        $('.dataTables_filter input').attr("placeholder", "Search...");
    });
</script>

<!-- Datepicker bootstrap -->
<script src="{{ asset('assets/widgets/datepicker/bootstrap-datepicker.js') }}"></script>">
</script>
<script>
    $(function() { 
        $('.date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose : true,
            todayHighlight : true,
        });
    });
</script>

<!-- untuk cek extension file upload -->
<script>
$("#format").hide();
$("#size").hide();
var fileExtensions = [".doc", ".pdf", ".docx"];
function validateExtension(input) {
    if (input.type == "file") {
        var fileName = input.value;
         if (fileName.length > 0) {
            var validExtension = false;
            for (var i = 0; i < fileExtensions.length; i++) {
                var sCurExtension = fileExtensions[i];
                if (fileName.substr(fileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    validExtension = true;
                    $('#cv').removeClass('parsley-error');
                    $("#format").hide();
                    $("#size").hide();
                    break;
                }
            }
             
            if (!validExtension) {
                $('#cv').addClass('parsley-error');
                $("#format").show();
                input.value = "";
                return false;
            } else if ( input.files[0].size > 2480000 ) {
            	$('#cv').addClass('parsley-error');
                $("#size").show();
                input.value = "";
                return false;
            }
        }
    }
    return true;
}
</script>
@stop

@section('content')
<ol class="breadcrumb">
    <li>
        <a href="{{ route('sourcing') }}">CV & Sourcing</a>
    </li>
    <li>
    	<span>Upload CV Candidate</span>
    </li>
</ol>

<h2>Upload CV Candidate</h2>
<br>
<div style="color: tomato;">
	<p></p>
</div>

<div class="row">

	<!-- panel box 1 -->
    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
	        @if(session('error'))
        		<div class="alert alert-danger" role="alert">
        			<button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('error') }}</strong>
                </div>
            @elseif(session('success'))
        		<div class="alert alert-success" role="alert">
        			<button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('success') }}</strong>
                </div>
        	@endif

	        	<form class="form-horizontal" action="{{ route('doUpload') }}" enctype="multipart/form-data" method="POST">
	        	@csrf
	        	<!-- hiring id -->
	        	<input type="hidden" name="hiring_brief_id" value="{{ $id }}">

	        		<div class="form-group">
	        			<label class="col-sm-3 control-label">Name Candidate</label>
	                    <div class="col-sm-6">
	                        <input type="text" class="form-control" id="name_candidate" name="name_candidate" placeholder="Input Name Candidate" title="Input Name Candidate" required>
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-sm-3 control-label">Education</label>
	                    <div class="col-sm-6">
	                        <select class="form-control" name="education" id="education" required title="Select Education">
	                        	<option value="" disabled selected>Select Education</option>
	                        	<option value="D3">Diploma's degree graduate</option>
	                        	<option value="S1">Bachelor's degree graduate</option>
	                        	<option value="S2">Master's degree graduate</option>
	                        	<option value="S3">Doctoral degree graduate</option>
	                        </select>
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-sm-3 control-label">Gender</label>
	                    <div class="col-sm-2">
	                        <select class="form-control" id="gender" name="gender" required>
	                        	<option value="M">Male</option>
	                        	<option value="F">Female</option>
	                        </select>
	                    </div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-5">
	        				<div class="form-group">
			        			<label class="col-sm-7 control-label">Birth Place</label>
			                    <div class="col-sm-5">
			                        <input type="text" class="form-control" id="place" name="place" placeholder="Input Place Birth" title="Input Place Birth" required>
			                    </div>
			        		</div>	
	        			</div>
	        			<div class="col-md-6">
	        				<div class="form-group">
			        			<label class="col-sm-3 control-label">Birth Date</label>
			                    <div class="col-sm-5">
			                    	<div class="input-group date">
		                            	<span class="add-on input-group-addon" id="birth_date">
	                                        <i class="glyph-icon icon-calendar"></i>
	                                    </span>	
									    <input type="text" class="form-control" id="birth_date" name="birth_date" placeholder="Input Birth Date" title="Input Birth Date" required>
									</div>
			                    </div>
			        		</div>	
	        			</div>
	        		</div>
	        		<div class="form-group">
	                    <label class="col-sm-3 control-label">CV Candidate <i style="color: #7C7C7C; font-size: 11px"><em> (Max 2MB) </em></i></label>
	                    <div class="col-sm-6">
	                        <input type="file" class="form-control" id="cv" name="cv" title="File CV (PDF,DOC). Max Size 2MB" onchange="validateExtension(this)" required>
	                        <!-- error -->
	                       	<ul class="parsley-errors-list" id="format">
		                    	<li class="parsley-required">Document Format Must PDF or Doc !!</li>
		                    </ul>
		                    <ul class="parsley-errors-list" id="size">
		                    	<li class="parsley-required">Max File Size Must 2MB !!</li>
		                    </ul>
	                    </div>
	                </div>
	                <div class="text-center">
	                    <button class="btn btn-info mrg10T" type="submit" id="upload">Upload</button>
	                </div>
	        	</form>
	        </div>

	    </div>
    </div>

    <!-- panel box 2, data akan muncul jika di database ada -->
    @if ( $candidate->isNotEmpty() )
    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
	        	<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
					<thead>
						<tr>
						    <th class="col-md-1">No.</th>
						    <th class="text-center">Candidate Name</th>
						    <th class="text-center col-md-1">Gender</th>
						    <th class="text-center">Place Date of Birth</th>
						    <th class="text-center col-md-3">CV</th>
						    <th class="text-center col-md-1">Option</th>
						</tr>
					</thead>

					<tbody id="data_candidate">
					    @php $no=1; @endphp
					    @forelse($candidate as $candidate)
					    <tr class="data{{ $candidate->id }}">
						    <td class="text-center">{{ $no++ }}</td>
						    <td>{{ $candidate->name_candidate }}</td>
						    <td class="text-center">{{ $candidate->gender }}</td>
						    <td class="text-center">{{ $candidate->place_birth }}, {{ \Carbon\Carbon::parse($candidate->date_birth)->format('d-m-Y') }}</td>
						    <td class="text-center"><a href="{{ route('getDocument',$candidate->id) }}" target="_blank">{{ $candidate->CV_candidate }}</a></td>
						    <td class="text-center">
						    	<form action="{{ route('delete.sourcing',$candidate->id) }}" method="POST">
						    		@csrf
						    		@method('Delete')
						    		<button class="btn btn-round btn-danger" type="submit">
						    			<span class="glyph-icon icon-trash" title="Delete Candidate"></span>
						    		</button>
						    	</form>
						    </td>
					    </tr>
					    @empty
					    	<td valign="top" colspan="4" class="dataTables_empty">No data available in table</td>
					    	<td id="hidden"></td>
					    	<td id="hidden"></td>
					    	<td id="hidden"></td>
					    @endforelse
					</tbody>
				</table>
	        </div>

	    </div>
    </div>
    @endif

</div>
@endsection