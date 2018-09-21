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


<script>
/* keterangan label di option */
	$('#ket').popover({
		placement:'top',
	});
</script>

<script type="text/javascript">
	/* Modal Rejected */
    $(document).ready(function () {
        $(document).on("click", ".btn_modal_reject", function () {
            var url = $(this).attr('data-url');
            $.ajax({
            	type : "GET",
            	url : url,
            	cache : true,
            	success:function(data){
            		$('#content_reason').html('<p>'+data.reason_reject+'</p>')
            	}
            })
        });
    });
</script>

@stop

@section('content')
<div class="panel">
	<div class="panel-body">
		<div class="title-hero">
			<div class="row">
				<div class="col-md-6" style="padding-top: 10px;">
					<h4><strong>NEW REQUEST LIST</strong></h4>	
				</div>

				<div class="col-md-6" align="right">
					<a href="#" type="button" class="btn btn-danger">
						<span class="glyph-icon icon-exclamation-circle"> Freeze</span>
					</a>
				</div>
			</div>
		</div>
		<div class="example-box-wrapper">
        <!-- notif -->
        @if(session('success'))
        	<div class="alert alert-success" role="alert">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
			<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap dataTable collapsed dtr-inline" cellspacing="0" width="100%">
				<thead>
				<tr>
				    <th>No.</th>
				    <th>Position Name</th>
				    <th>Brief Schedule</th>
				    <th>Time Schedule</th>
				    <th>Place Schedule</th>
				    <th>Option</th>
				</tr>
				</thead>

				<tbody>
				@php $no =1; @endphp
				    @forelse($data as $data)
				    	<!-- cek jika table hiring brief kosong -->
				    	@if ( empty($data->hiring_briefs->ticket_id) )
				    		<td valign="top" colspan="7" class="dataTables_empty">No data available in table</td>
					    	<td id="hidden"></td>
					    	<td id="hidden"></td>
					    	<td id="hidden"></td>
					    	<td id="hidden"></td>
					    	<td id="hidden"></td>
					    	<td id="hidden"></td>
				    	@else
						    <tr>
							    <td class="text-center">{{ $no++ }}</td>
							    <td>{{ $data->position_name }}</td>
							    <td>
								    @if( $data->hiring_briefs->date_schedule != Null )
									    {{ \Carbon\Carbon::parse($data->hiring_briefs->date_schedule)->format('d/m/Y') }}
									@else
										Date not scheduled yet
								    @endif
							    <td>
							    	@if( $data->hiring_briefs->time_schedule != Null )
									    {{ \Carbon\Carbon::parse($data->hiring_briefs->time_schedule)->format('h:i:s A') }}
									@else
										Time not scheduled yet
								    @endif
							    </td>
							    <td>
							    	@if( $data->hiring_briefs->place_schedule != Null )
									    {{ $data->hiring_briefs->place_schedule }}
									@else
										Place not scheduled yet
								    @endif
							    </td>

							    <!-- jika date schedule belum di set -->
							    @if ( $data->hiring_briefs->date_schedule == null )
							    	<td>
								        <a href="{{ route('create.brief',$data->id) }}" type="button" class="btn btn-primary" title="Create Schedule">
								            <span class="glyph-icon icon-clock-o"> Schedule</span>
								        </a>
								    </td>
								@else
									<!-- menuju ke date schedule -->
								    @if( \Carbon\Carbon::now()->toDateString() < $data->hiring_briefs->date_schedule )
								    	@php
								    		$now = \Carbon\Carbon::now();
											$date = \Carbon\Carbon::parse($data->hiring_briefs->date_schedule);

											$diff = $date->diffInDays($now);
								    	@endphp
									    <td>
									    	<span class="bs-label label-yellow" id="ket" data-toggle="popover" data-trigger="hover" data-content="{{ $diff }} days more to input the result of brief" title="Information"><strong>Waiting for the hiring brief date</strong></span>
									    </td>
									@elseif( \Carbon\Carbon::now()->toDateString() >= $data->hiring_briefs->date_schedule )
										@php
											/* waktu input hasil brief */
											$now = \Carbon\Carbon::now();
											$SLA = \Carbon\Carbon::parse($data->hiring_briefs->date_schedule)->addDays(2);

											$diff = $SLA->diffInDays($now);
										@endphp
										@if ( \Carbon\Carbon::now()->toDateString() <= \Carbon\Carbon::parse($SLA)->toDateString() )

											@if ( $data->hiring_briefs->date_result_hiring != Null && $data->hiring_briefs->approval_hiring_by_hrbp == 0 )
												<!-- ini muncul ketika sudah input hasil hiring brief -->
												<td>
													<span class="bs-label label-yellow" id="ket" data-toggle="popover" data-trigger="hover" data-content="You have entered the result of the briefing, so please wait for approval from HRBP" title="Information"><strong>Waiting Approval From HRBP</strong></span>
												</td>
											@elseif ( $data->hiring_briefs->date_result_hiring != Null && $data->hiring_briefs->approval_hiring_by_hrbp == 1 )
												<!-- proses di apporve oleh hrbp -->
												@php
													/* total menghitung SLA sejak HRBP approve hasil brief */
													$approval = \Carbon\Carbon::parse($data->hiring_briefs->date_result_hiring);
													$schedule = \Carbon\Carbon::parse($data->hiring_briefs->date_schedule)->addDays(2);

													$total = $schedule->diffInDays($approval);
												@endphp
												<!-- total SLA sejak di approve HRBP -->
												<td>
													<span class="bs-label label-success"><strong>Waktu SLA {{ $total }} hari</strong></span>
												</td>
											@elseif ( $data->hiring_briefs->date_result_hiring != Null && $data->hiring_briefs->approval_hiring_by_hrbp == 2 )
												<!-- proses di tolak hrbp -->
												<td>
													<a href="#modal_reject" data-url="{{ route('reject.reason.brief',$data->hiring_briefs->id) }}" type="button" class="btn btn-danger btn_modal_reject" data-url="" data-toggle="modal" title="Rejected Reason">Rejected</a>
												</td>
											@else
												<!-- Waktu SLA yang sesuai berjalan -->
												<td>
										    		<a href="{{ route('input.brief',$data->id) }}" type="button" class="btn btn-success" title="Input Result of Brief">
										    			<span > {{ $now == \Carbon\Carbon::parse($SLA)->toDateString() ? 'Final Day' : $diff.' Days Remaining' }}</span>
										    		</a>
										    	</td>	
											@endif
									    @else
									    	@if ( $data->hiring_briefs->date_result_hiring != Null && $data->hiring_briefs->approval_hiring_by_hrbp == 0 )
												<td>
													<span class="bs-label label-yellow"><strong>Waiting Approval From HRBP</strong></span>
												</td>
											@else
												@if ( $data->hiring_briefs->approval_hiring_by_hrbp == 1 )
													@php
														/* total menghitung SLA sejak HRBP approve hasil brief */
														$approval = \Carbon\Carbon::parse($data->hiring_briefs->date_result_hiring);
														$schedule = \Carbon\Carbon::parse($data->hiring_briefs->date_schedule)->addDays(2);

														$total = $schedule->diffInDays($approval);
													@endphp
													@if ( $approval <= \Carbon\Carbon::parse($schedule)->toDateString() )
														<td>
															<span class="bs-label label-success"><strong>Waktu SLA {{ $total }} hari</strong></span>
														</td>
													@else 
														<td>
															<span class="bs-label label-danger"><strong>Waktu SLA + {{ $total }} hari</strong></span>
														</td>
													@endif
												@else
													<!-- jika lewat dari waktu SLA-->
											    	<td>
											    		<a href="{{ route('input.brief',$data->id) }}" type="button" class="btn btn-danger" title="Input Result of Brief">
											    			<span > + {{ $diff }} Days</span>
											    		</a>
											    	</td>
												@endif
									    	@endif
										@endif
									@else
										<td>
									        <a href="{{ route('create.brief',$data->id) }}" type="button" class="btn btn-primary" title="Create Schedule">
									            <span class="glyph-icon icon-clock-o"> Schedule</span>
									        </a>
									    </td>
								    @endif
								@endif
						    </tr>
					    @endif
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

<!-- modal Rejected Reason -->
<div class="modal fade" tabindex="1" id="modal_reject" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Rejected Reason</h4>
            </div>

        	<div class="modal-body" id="content_reason">
            	
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection