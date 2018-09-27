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
						    <td class="text-center"><a href="{{ route('lm1.sourcing',$candidate->id) }}" type="button" class="btn btn-round btn-info" title="Upload">
						    	<i class="glyph-icon icon-eye"></i></a>
						    </td>
						    {{-- <td class="text-center col-md-2">
						    	@if ( $candidate > 0 )
						    		<a href="{{ route('upload',$data->id) }}" class="bs-label label-success">
						    			<strong>You Have Been Uploaded {{ $candidate }} Candidate</strong>
						    		</a>
						    	@else
						    		<span class="bs-label label-yellow"><strong>You Haven't Uploaded The Candidate</strong></span>
						    	@endif
						    </td> --}}
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