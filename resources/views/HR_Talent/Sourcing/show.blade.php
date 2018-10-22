@extends('layouts.default')
@section('title','List Candidate')

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
    	<span>List Candidate</span>
    </li>
</ol>

<h2>List 
	<code>{{ $candidate->isEmpty() == true ? '' : $candidate[0]->hiring_briefs->tickets->position_name }}</code> Candidates
</h2>
<br>
<div style="color: tomato;">
	<p></p>
</div>

<div class="row">

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
						    <th class="text-center col-md-2">status</th>
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
						    	@if($candidate->approval_candidate == 1)
						    		<span class="bs-label label-success"><strong>Approved</strong></span>
						    	@elseif($candidate->approval_candidate == 2)
						    		<label class="bs-label label-danger" id="ket" data-popover="true" title="Information" data-content="{{ $candidate->reason_reject }}"><strong>Rejected</strong></label>
						    	@else
						    		<span class="bs-label label-info"><strong>No Action</strong></span>
						    	@endif
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

</div>
@endsection