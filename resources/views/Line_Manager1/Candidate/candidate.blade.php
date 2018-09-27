@extends('layouts.default')
@section('title','Looking For Candidates')

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
@stop

@section('content')

<h2>Looking For <code><em>{{ $candidate[0]->hiring_briefs->tickets->position_name }}</em></code> Candidates</h2>
<br />
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
						    <th class="text-center">Education</th>
						    <th class="text-center col-md-2">CV</th>
						    <th class="text-center">Status</th>
						</tr>
					</thead>

					<tbody>
					    @php 
						    $no=1;
					    @endphp
					    @forelse($candidate as $candidate)
					    <tr>
						    <td class="text-center">{{ $no++ }}</td>
						    <td>{{ $candidate->name_candidate }}</td>
						    <td class="text-center">{{ $candidate->gender }}</td>
						    <td class="text-center">{{ $candidate->place_birth }}, {{ \Carbon\Carbon::parse($candidate->date_birth)->format('d-m-Y') }}</td>
						    <td class="text-center">
						    	@if ( $candidate->education == 'S1' )
						    		Bachelor's degree graduate
						    	@elseif( $candidate->education == 'S2' )
						    		Master's degree graduate
						    	@elseif( $candidate->education == 'S3' )
						    		Doctoral degree graduate
						    	@endif
						    <td class="text-center col-md-2">
						    	<a href="{{ route('getCV',$candidate->id) }}" target="_blank">{{ $candidate->CV_candidate }}
						    	</a>
						    </td>
						    <td class="text-center">
						    	<a href="#modal_candidate" type="button" data-url="#" data-toggle="modal" class="btn btn-round btn-success btn_modal_candidate" title="Select Candidate">
						            <span class="glyph-icon icon-check"></span>
						        </a>
						    </td>
					    </tr>
					    @empty
					    	<td valign="top" colspan="7" class="dataTables_empty">No data available in table</td>
					    	<td id="hidden"></td>
					    	<td id="hidden"></td>
					    	<td id="hidden"></td>
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

<!-- Modal Select Candidate -->
<div class="modal fade" tabindex="1" id="modal_candidate" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Select Candidate</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_delete">
            @csrf
            	<div class="modal-body">
                	<p class="text-center"><strong>Are you sure you want to choose this candidate ?</strong></p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <button type="submit" class="btn btn-success">Yes</button>
	            </div>
            </form>
        </div>
    </div>
</div>
@endsection