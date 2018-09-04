@extends('layouts.default')
@section('title','Approval List')
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
<div class="panel">
	<div class="panel-body">
		<h3 class="title-hero">Approval List</h3>
		<div style="padding-bottom: 20px">
			<a href="{{ route('hrbp.approval') }}" type="button" class="btn btn-success">
				<span class="glyph-icon icon-list-ul"> Approval List</span>
			</a>
		</div>
		<div class="example-box-wrapper">
		<!-- notif -->
        @if(session('success'))
        	<div class="alert alert-success" role="alert">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
			<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th>No.</th>
					    <th>Position Name</th>
					    {{-- <th>JD File</th> --}}
					    <th>Date</th>
					    <th>Status</th>
					</tr>
				</thead>

				<tbody>
				    @php $no=1; @endphp
				    @forelse($ticket as $ticket)
				    <tr>
					    <td class="text-center">{{ $no++ }}</td>
					    <td><a href="{{ route('hrbp.detail',$ticket->id) }}">{{ $ticket->position_name }}</a></td>
					    {{-- <td><a href="" style="color: #0066cc; text-decoration: underline;">Download JD File</a></td> --}}
					    <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y') }}</td>
					    <td>
					    	@if($ticket->approval_hrbp == 0)
					    		<span class="bs-label label-yellow"><strong>Waiting Approval</strong></span>
					    	@elseif($ticket->approval_hrbp == 1)
					    		<span class="bs-label label-success"><strong>Approved</strong></span>
					    	@elseif($ticket->approval_hrbp == 2)
					    		<span class="bs-label label-danger"><strong>Rejected</strong></span>
					    	@endif
					    </td>
				    </tr>
				    @empty
				    	<td valign="top" colspan="5" class="dataTables_empty">No data available in table</td>
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

@endsection
