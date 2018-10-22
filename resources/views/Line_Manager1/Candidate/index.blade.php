@extends('layouts.default')
@section('title','Candidate')

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

<h2>Candidate</h2>
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
						    <th class="text-center">Position Name</th>
						    <th class="text-center col-md-3">Sourcing Candidate</th>
						</tr>
					</thead>

					<tbody id="data_candidate">
					    @php $no=1; @endphp
					    @forelse($candidate as $candidate)
					    <tr>
						    <td class="text-center">{{ $no++ }}</td>
						    <td>{{ $candidate->tickets->position_name }}</td>
						    <td class="text-center">
						    <!-- jika CV belum ada yg di upload -->
						    	@if ( $candidate->CV == Null )
						    		<span class="bs-label label-yellow" id="ket" data-popover="true" data-content="HR Talent Acquistion hasn't uploaded the candidate" title="Information"><strong>There are no candidate</strong></span>
						    	@else
						    		<!-- total candidate yg sudah di upload berdasarkan posisinya -->
							    	@if ( $candidate->CV->hiring_brief_id == $candidate->id  )
							    		<!-- kondisi sudah di pilih 3 kandidat dan berdasarkan hiring_brief_id -->
							    		@if ( $candidate->CV->where([['approval_candidate','1'],['hiring_brief_id',$candidate->id]])->count()==3 )
							    			@php
							    				/* ambil field tgl yg ada di antara row ( ini tgl ketika LM1 udah milih 3 kandidat ) */
							    				$tglApprove = $candidate->CV->where([['hiring_brief_id',$candidate->id],['approval_date_candidate','!=',Null]])->first();

							    				/* ini tgl awal HRTA upload kandidat */
							    				$tglBuat = \Carbon\Carbon::parse($candidate->CV->created_at)->addDays(1);
							    			@endphp
							    			@if( $tglApprove->approval_date_candidate > $tglBuat )
							    				<span class="bs-label label-danger"><strong>You exceed the SLA schedule</strong></span>
							    			@else
							    				<span class="bs-label label-success"><strong>You have chosen according to the SLA schedule</strong></span>
							    			@endif
							    		@else
							    			<a href="{{ route('lm1.sourcing',$candidate->id) }}" type="button" class="bs-label label-info"><strong>{{ $candidate->CV->where('hiring_brief_id',$candidate->id)->count() }} Candidate</strong>
							    			</a>	
							    		@endif
							    	@else
							    		<span class="bs-label label-yellow"><strong>There are no candidate</strong></span>
							    	@endif
						    	@endif
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