@extends('layouts.default')
@section('title','Hiring Brief')

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
		<h3 class="title-hero">
		    <strong>POSITION LIST</strong>
		</h3>
		<div class="example-box-wrapper">
			<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap dataTable collapsed dtr-inline" cellspacing="0" width="100%">
				<thead>
				<tr>
				    <th>No.</th>
				    <th>Position Name</th>
				    {{-- <th>JD File</th> --}}
				    <th>Date</th>
				    <th>Line Manager Approval</th>
				    <th>HRBP Approval</th>
				    <th>Option</th>
				</tr>
				</thead>

				<tbody>
				@php $no =1; @endphp
				    @forelse($data as $data)
				    <tr>
					    <td>{{ $no++ }}</td>
					    <td>{{ $data->position_name }}</td>
					    {{-- <td></td> --}}
					    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }}</td>
					    <td>
					    	@if($data->approval_lm2 == 0)
					    		<span class="bs-label label-yellow"><strong>Waiting Approval</strong></span>
					    	@elseif($data->approval_lm2 == 1)
					    		<span class="bs-label label-success"><strong>Approved</strong></span>
					    	@elseif($data->approval_lm2 == 2)
					    		<span class="bs-label label-danger"><strong>Rejected</strong></span>
					    	@endif
					    </td>
					    <td>
					    	@if($data->approval_hrbp == 0)
					    		<span class="bs-label label-yellow"><strong>Waiting Approval</strong></span>
					    	@elseif($data->approval_hrbp == 1)
					    		<span class="bs-label label-success"><strong>Approved</strong></span>
					    	@elseif($data->approval_hrbp == 2)
					    		<span class="bs-label label-danger"><strong>Rejected</strong></span>
					    	@endif
					    </td>
					    <td>
					        <a href="{{ route('create.brief',$data->id) }}" type="button" class="btn btn-primary" title="Create Schedule">
					            <span class="glyph-icon icon-clock-o"> Schedule</span>
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
@endsection