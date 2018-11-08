@extends('layouts.default')
@section('title','CV & Sourcing')

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

<div class="row">
    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
	        <!-- title -->
	        <div class="title-hero">
				<div class="row">
					<div class="col-md-6" style="padding-top: 10px;">
						<h4><strong>CV & Sourcing</strong></h4>	
					</div>
				</div>
			</div>

	        	<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
					<thead>
						<tr>
						    <th class="col-md-1">No.</th>
						    <th class="text-center">Position Name</th>
						    <th class="text-center col-md-2">Upload CV</th>
						    <th class="text-center">Status</th>
						</tr>
					</thead>

					<tbody>
					    @php 
						    $no=1;
					    @endphp
					    @forelse($data as $data)
					    <tr>
						    <td class="text-center">{{ $no++ }}</td>
						    <td>{{ $data->tickets->position_name }}</td>
						    <td class="text-center">
						    	@php
						    		/* Kandidate yg di pilih LM1 sudah 3 */
						    		$candidate_approve = $candidate->where('hiring_brief_id',$data->id);
						    	@endphp
						    	@if ( $candidate_approve->where('approval_candidate','1')->count() == 3 )
						    		<a href="#" type="button" class="btn btn-round btn-info" title="" disabled>
								    	<i class="glyph-icon icon-upload"></i>
								    </a>
						    	@else
						    		<a href="{{ route('upload',$data->id) }}" type="button" class="btn btn-round btn-info" title="Upload">
								    	<i class="glyph-icon icon-upload"></i>
								    </a>
						    	@endif
						    </td>
						    <td class="text-center col-md-4">
						    	<!-- jika CV belum ada yg di upload -->
						    	@if ( $data->CV == Null )
						    		<span class="bs-label label-yellow"><strong>There are no candidate</strong></span>
						    	@else
						    		<!-- total candidate yg sudah di upload berdasarkan posisinya -->
							    	@if ( $data->CV->hiring_brief_id == $data->id  )
							    		@if ( $candidate_approve->where('approval_candidate','1')->count() == 3 )
							    			<!-- jika HRTA next process, cari tgl dan bandingkan utk hitung SLA -->
							    			@if ( $candidate->where('date_nextProcess_hrta','!=',Null)->count() > 0 )
							    				@php
							    					$tglNextProcess = $data->CV->where('hiring_brief_id',$data->id)->first();

							    					/* created_at dijadikan SLA 5 hari */
							    					$tglBuat = $data->CV->created_at;
							    					$SLA = \Carbon\Carbon::parse($tglBuat)->addDays(4);

							    					/* PERHITUNGAN SLA SYSTEM */
							    					$a = \Carbon\Carbon::parse($tglNextProcess->date_nextProcess_hrta)->toDateString();
							    					$diff = $SLA->diffInDays($a);

							    					/*total kandidat approve,reject*/
							    					$total = $candidate->where('hiring_brief_id',$data->id);
							    				@endphp
							    				<!-- belum di next process oleh HRTA -->
							    				@if ( $tglNextProcess->date_nextProcess_hrta == Null )
							    					<form action="{{ route('nextProcess.sourcing',$data->CV->id) }}" method="POST">
											    		@csrf
											    		@method('PATCH')
											    		<a href="{{ route('showCandidate',$data->id) }}" type="button" class="btn btn-info">
											    		{{ $total->where('approval_candidate',1)->count() }} Approved, 
											    		{{ $total->where('approval_candidate',2)->count() }} Rejected, 
											    		{{ $total->where('approval_candidate',0)->count() }} No Action
											    		</a>
											    		<br>
											    		<button class="btn btn-success" type="submit">
											    			<strong>Finish</strong>
											    		</button>
											    	</form>
											    @elseif ( $SLA < $tglNextProcess->date_nextProcess_hrta )
											    	<!-- di loop karna hasil dari diff = 0,1,2,3 dst. Jika 0 itu 1 hari, Ini lewat dari waktu SLA-->
											    	@for ($i = $diff; $i <=$diff; $i++)
							    						<span class="bs-label label-danger"><strong>SLA + {{ $i+1 }} Days</strong></span>
							    					@endfor
							    				@else
							    					<!-- tidak lewat waktu SLA -->
							    					@if( $diff == 4 )
							    						<span class="bs-label label-success"><strong>SLA 1 Days</strong></span>
							    					@elseif ( $diff == 3 )
							    						<span class="bs-label label-success"><strong>SLA 2 Days</strong></span>
							    					@elseif ( $diff == 2 )
							    						<span class="bs-label label-success"><strong>SLA 3 Days</strong></span>
							    					@elseif ( $diff == 1 )
							    						<span class="bs-label label-success"><strong>SLA 4 Days</strong></span>
							    					@elseif ( $diff == 0 )
							    						<span class="bs-label label-success"><strong>SLA 5 Days</strong></span>
							    					@endif
							    				@endif
							    			@else
							    				<form action="{{ route('nextProcess.sourcing',$data->CV->id) }}" method="POST">
										    		@csrf
										    		@method('PATCH')
										    		<button class="btn btn-success" type="submit">
										    			<strong>Finish</strong>
										    		</button>
										    	</form>
							    			@endif
							    		@else
							    			<span class="bs-label label-success">
								    			<strong>Uploaded {{ $data->CV->where('hiring_brief_id',$data->id)->count() }} Candidate</strong>
								    		</span>
							    		@endif
							    	@else
							    		<span class="bs-label label-yellow"><strong>There are no candidate</strong></span>
							    	@endif
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