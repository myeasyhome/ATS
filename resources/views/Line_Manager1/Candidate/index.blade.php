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

<!-- Tampilan di kolom SLA -->
<script>
	var countdowns = [
	@foreach ($time as $time)
		{
		    id: {{ $time->id }},
		    date: new Date("{{ date('M j, Y H:i:s', strtotime( 
		    	\Carbon\Carbon::parse( App\Models\CV::where('hiring_brief_id',$time->id)->pluck('created_at')->first() )->addDays(2) 
		    	)) }}").getTime()
	  	},
	@endforeach
	];

	// Update the count down every 1 second
	var timer = setInterval(function() {
	// Get todays date and time
	var now = Date.now();

	var index = countdowns.length - 1;

	// we have to loop backwards since we will be removing
	// countdowns when they are finished
	while(index >= 0) {
	    var countdown = countdowns[index];

	    // Find the distance between now and the count down date
	    var distance = countdown.date - now;

	    // Time calculations for days, hours, minutes and seconds
	    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

	    var timerElement = document.getElementById("clock" + countdown.id);

		// If the count down is over, write some text 
		if (distance < 0) {
		    timerElement.innerHTML = "Time Is Over";
		    // this timer is done, remove it
		    countdowns.splice(index, 1);
		} else {
			timerElement.innerHTML = days + " Days , " + hours + "h " + minutes + "m " + seconds + "s "; 
		}

		index -= 1;
	}

		// if all countdowns have finished, stop timer
		if (countdowns.length < 1) {
			clearInterval(timer);
		}
	}, 1000);
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
						    {{-- <th class="text-center col-md-2">SLA</th> --}}
						    <th class="text-center col-md-2">Sourcing Candidate</th>
						    <th class="text-center col-md-3">Status</th>
						</tr>
					</thead>

					<tbody id="data_candidate">
					    @php $no=1; @endphp
					    @forelse($candidate as $candidate)
					    <tr>
						    <td class="text-center">{{ $no++ }}</td>
						    <td>{{ $candidate->tickets->position_name }} 
						    	@php
				                    /* ada kandidat yg belum di proses */
				                    $new = App\Models\CV::where('hiring_brief_id',$candidate->id)->whereIn('approval_candidate',['0'])->count();
				                    $ambil_tgl = App\Models\CV::where('hiring_brief_id',$candidate->id)->whereIn('approval_candidate',['0'])->pluck('created_at')->first();
                    				$SLA_CVFeedback = \Carbon\Carbon::parse($ambil_tgl)->addDays(2);
				                @endphp
				                <!-- jika udah lewat waktu sla feedback, badge 'new' hilang -->
    				            @if ( \Carbon\Carbon::now() > $SLA_CVFeedback )

				                @elseif ( $new > 0 )
				                    <span class="bs-label label-success" id="ket" data-popover="true" data-content="There are new candidates who need your feedback." title="Information">new</span>
				                @endif
						    </td>
						    <!-- SLA CV Feedback -->
						    {{-- <td class="text-center">
						        <span class="bs-label label-danger text-center" id="clock{{ $candidate->id }}" style="font-size: 13px;"></span>
						    </td> --}}
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
							    				$tglApprove = $candidate->CV->where([
							    						['hiring_brief_id',$candidate->id],
							    						['approval_date_candidate','!=',Null]
							    					])->first();

							    				/* ini tgl awal HRTA upload kandidat */
							    				$tglBuat = \Carbon\Carbon::parse($candidate->CV->created_at)->addDays(1);
							    			@endphp
							    			@if( $tglApprove->approval_date_candidate > $tglBuat )
							    				<span class="bs-label label-danger"><strong>You exceed the SLA schedule</strong></span>
							    			@else
							    				<span class="bs-label label-success"><strong>You have chosen according to the SLA schedule</strong></span>
							    			@endif
							    		@else
							    			<!-- jika sudah freeze == 99 /SLA selesai -->
							    			@if ( $candidate->tickets->freeze == 99 )
							    				-
							    			@else
								    			<a href="{{ route('lm1.sourcing',$candidate->id) }}" type="button" class="bs-label label-info">
								    				<span class="glyph-icon icon-linecons-search"><strong> sourcing</strong></span>
								    			</a>	
							    			@endif
							    		@endif
							    	@else
							    		<span class="bs-label label-yellow"><strong>There are no candidate</strong></span>
							    	@endif
						    	@endif
						    </td>
						    <td class="text-center">
						    	<!-- KOLOM STATUS -->
						    	@php
						    		$proceed = App\Models\CV::where([
						    					['approval_candidate','1'],
						    					['hiring_brief_id',$candidate->id]
						    				])->count();
						    		$drop = App\Models\CV::where([
						    					['approval_candidate','2'],
						    					['hiring_brief_id',$candidate->id]
						    				])->count();
						    		$needFeedback = App\Models\CV::where([
						    					['approval_candidate','0'],
						    					['hiring_brief_id',$candidate->id]
						    				])->count();
						    	@endphp
						    	<label><em><strong>
						    		{{ $proceed }} Proceed, 
						    		{{ $drop }} Drop,
						    		{{ $needFeedback }} Need Feedback
						    	</strong></em></label>
						    </td>
					    </tr>
					    @empty
					    	<td valign="top" colspan="5" class="dataTables_empty">No data available in table</td>
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
@endsection