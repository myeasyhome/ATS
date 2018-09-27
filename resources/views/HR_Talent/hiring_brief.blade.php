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
	$('body').popover({
		placement:'top',
		html : true,
		delay: {show: 50, hide: 400},
		selector: '[data-popover]',
    	trigger: 'click hover',
	    content: function(ele) {
	        console.log(ele,this);
	        return $(this).next("#ket").html();
		}
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
        <!-- Notification Alart -->
        @if(session('success'))
        	<div class="alert alert-success" role="alert">
        		<button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
			<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap dataTable collapsed dtr-inline" cellspacing="0" width="100%">
				<thead>
				<tr>
				    <th class="text-center">No.</th>
				    <th class="text-center">Position Name</th>
				    <th class="text-center">Brief Schedule</th>
				    <th class="text-center">Time Schedule</th>
				    <th class="text-center">Place Schedule</th>
				    <th class="text-center">Status</th>
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
							    <td class="text-center">
								    @if( $data->hiring_briefs->date_schedule != Null )
									    {{ \Carbon\Carbon::parse($data->hiring_briefs->date_schedule)->format('d/m/Y') }}
									@else
										-
								    @endif
							    <td class="text-center">
							    	@if( $data->hiring_briefs->time_schedule != Null )
									    {{ \Carbon\Carbon::parse($data->hiring_briefs->time_schedule)->format('h:i:s A') }}
									@else
										-
								    @endif
							    </td>
							    <td class="text-center">
							    	@if( $data->hiring_briefs->place_schedule != Null )
									    {{ $data->hiring_briefs->place_schedule }}
									@else
										-
								    @endif
							    </td>

								<!-- =============================== SLA SYSTEM ==============================
									@author Denny Aris Setiawan (dennyariss@gmail.com)
								-->
							    <td class="text-center">
								    @php
								    /* TANGGAL SEKARANG SEBAGAI ACUAN PERHITUNGAN SLA */ 
								    	$now = '2018-10-01';
								    @endphp
							    <!-- jika date schedule buat hiring brief belum di set -->
							    @if ( $data->hiring_briefs->date_schedule == NULL )
							        <a href="{{ route('create.brief',$data->id) }}" type="button" class="btn btn-primary" title="Create Schedule">
							            <span class="glyph-icon icon-clock-o"> Schedule</span>
							        </a>

							    <!-- logika date yang sudah di schedule -->
								@else
									<!-- Sebelum ke Date Schedule -->
								    @if( $now < $data->hiring_briefs->date_schedule )
								    	@php
								    		/* perhitungan untuk jarak date schedule dengan tanggal sekarang */
											$date = \Carbon\Carbon::parse($data->hiring_briefs->date_schedule);

											$diff = $date->diffInDays($now);
								    	@endphp
								    	<!-- schedule udh di set dan menunggu sampai waktu schedule -->
								    	@if ( $data->hiring_briefs->approval_hiring_by_hrbp == NULL )
							    			<span class="bs-label label-yellow" id="ket" data-popover="true" data-content="{{ $diff }} days more to input the result of brief" title="Information">
										    	<strong>Wait until brief schedule</strong>
										    </span>
										<!-- jika hasil hiring brief sudah di input & menunggu approval HRBP -->
										@elseif ( $data->hiring_briefs->approval_hiring_by_hrbp == 0 )
											<span class="bs-label label-yellow" id="ket" data-popover="true" data-content="You have entered the result of the briefing, so please wait for approval from HRBP" title="Information">
												<strong>Waiting Approval From HRBP</strong>
											</span>

										<!-- sudah di approve HRBP -->
										@elseif ( $data->hiring_briefs->approval_hiring_by_hrbp == 1 )
											@php
												/* total menghitung SLA sejak HRBP approve hasil brief dan TIDAK LEWAT DARI SLA */
												$approval = \Carbon\Carbon::parse($data->hiring_briefs->approval_date_hrbp);
												$schedule = \Carbon\Carbon::parse($data->hiring_briefs->date_schedule)->addDays(2);

												$total = $schedule->diffInDays($approval);
											@endphp
											<!-- SLA HIJAU -->
											@if ( $approval <= $schedule )
												@if ( $total == 2 )
													<span class="bs-label label-success"><strong>SLA 1 Days</strong></span>
												@elseif ( $total == 1 )
													<span class="bs-label label-success"><strong>SLA 2 Days</strong></span>
												@elseif ( $total == 0 )
													<span class="bs-label label-success"><strong>SLA 3 Days</strong></span>
												@endif
											@endif
										<!-- sudah di reject HRBP -->
										@elseif ( $data->hiring_briefs->approval_hiring_by_hrbp == 2 )
											<a href="#modal_reject" data-url="{{ route('reject.reason.brief',$data->hiring_briefs->id) }}" type="button" class="btn btn-danger btn_modal_reject" data-url="" data-toggle="modal" title="Rejected Reason">Rejected</a>
								    	@endif




									<!-- lewat dari date schedule -->
									@elseif( $now >= $data->hiring_briefs->date_schedule )
										@php
											/* waktu dari brief schedule di tambah 3 Hari SLA */
											$SLA = \Carbon\Carbon::parse($data->hiring_briefs->date_schedule)->addDays(2);

											$diff = $SLA->diffInDays($now);
										@endphp
										<!-- proses mau input hasil brief untuk mengetahui SLA -->
										@if( $data->hiring_briefs->approval_hiring_by_hrbp == NULL )
											<!-- jika $now sama dengan tanggal brief -->
											@if( $now > $data->hiring_briefs->date_schedule )
												@if( $now <= $SLA )
													<a href="{{ route('input.brief',$data->id) }}" type="button" class="btn btn-success" title="Input Result of Brief">
										    			<span>{{ $now == \Carbon\Carbon::parse($SLA)->toDateString() ? 'Final Day' : $diff.' Days Remaining' }}</span>
										    		</a>
										    	@elseif ( $now > $SLA )
										    		<a href="{{ route('input.brief',$data->id) }}" type="button" class="btn btn-danger" title="Input Result of Brief">
										    			<span> + {{ $diff }} Days</span>
									    			</a>
												@endif
									    	@elseif ( $now == $data->hiring_briefs->date_schedule )
									    		<a href="{{ route('input.brief',$data->id) }}" type="button" class="btn btn-success" title="Input Result of Brief">
									    			<span>{{ $diff }} Days Remaining</span>
									    		</a>
										    @endif
										<!-- sudah input hasil brief dan menunggu apporval HRBP -->
										@elseif ( $data->hiring_briefs->approval_hiring_by_hrbp == 0 )
											<span class="bs-label label-yellow" id="ket" data-popover="true" data-content="You have entered the result of the briefing, so please wait for approval from HRBP" title="Information">
												<strong>Waiting Approval From HRBP</strong>
											</span>
										<!-- sudah di approve HRBP -->
										@elseif( $data->hiring_briefs->approval_hiring_by_hrbp == 1 )
											@php
												/* total menghitung SLA sejak HRBP approve hasil brief dan TIDAK LEWAT DARI SLA */
												$approval = \Carbon\Carbon::parse($data->hiring_briefs->approval_date_hrbp);
												$schedule = \Carbon\Carbon::parse($data->hiring_briefs->date_schedule)->addDays(2);

												$total = $schedule->diffInDays($approval);
											@endphp
											<!-- SLA HIJAU -->
											@if ( $approval <= $schedule )
												@if ( $total == 2 )
													<span class="bs-label label-success"><strong>SLA 1 Days</strong></span>
												@elseif ( $total == 1 )
													<span class="bs-label label-success"><strong>SLA 2 Days</strong></span>
												@elseif ( $total == 0 )
													<span class="bs-label label-success"><strong>SLA 3 Days</strong></span>
												@endif
											<!-- SLA MERAH -->
											@elseif ( $approval > $schedule )
												<span class="bs-label label-danger"><strong>SLA + {{ $total }}</strong></span>
											@endif

										<!-- Di reject oleh HRBP -->
										@elseif( $data->hiring_briefs->approval_hiring_by_hrbp == 2 )
											<a href="#modal_reject" data-url="{{ route('reject.reason.brief',$data->hiring_briefs->id) }}" type="button" class="btn btn-danger btn_modal_reject" data-url="" data-toggle="modal" title="Rejected Reason">Rejected</a>
										@endif
								    @endif
								@endif
								</td>
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