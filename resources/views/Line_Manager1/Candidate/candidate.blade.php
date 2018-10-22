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

<script>
	/*modal approve*/
    $(document).on("click",".btn_modal_approve", function () {
        var url = $(this).attr('data-url');
        $('#form_modal_approve').attr('action',url);
    });

    /* modal reject */
    $(document).on("click",".btn_modal_reject", function () {
        var url = $(this).attr('data-url');
        $('#form_modal_reject').attr('action',url);
    });
</script>

<!-- Jquery Countdown -->
<script src="{{ asset('assets/jquery.countdown/jquery.countdown.js') }}" ></script>
<script>
	var waktu_SLA = $('#waktuSLA').attr('waktuSLA');
	console.log(waktu_SLA);
	$('#clock').countdown(waktu_SLA)
		.on('update.countdown', function(event) {
			var format = '%H:%M:%S';
			if(event.offset.totalDays > 0) {
				format = '%-d day%!d ' + format;
			}
			if(event.offset.weeks > 0) {
				format = '%-w week%!w ' + format;
			}
			$(this).html(event.strftime(format));
		})
		.on('finish.countdown', function(event) {
		 	$(this).html('Your time is out!');
	});
</script>
@stop

@section('content')
<ol class="breadcrumb bc-3" >
    <li>
        <a href="{{ route('candidate') }}">Candidate</a>
    </li>
    <li>
    	<span>Looking For Candidate</span>
    </li>
</ol>

<h2>Looking For 
	<code>{{ $candidate->isEmpty() == true ? '' : $candidate[0]->hiring_briefs->tickets->position_name }}</code> Candidates
</h2>
<br />
<div style="color: tomato;">
	<p></p>
</div>
<div class="row">
    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
	        <!-- waktu untuk SLA LM1 -->
	        @php
	        	$waktuSLA = $candidate->firstWhere('created_at','!=',NULL);
	        @endphp
	        <input type="hidden" id="waktuSLA" waktuSLA="{{ \Carbon\Carbon::parse($waktuSLA->created_at)->addDays(1) }}">

	        @if ( $candidate->isNotEmpty() == true && $candidate->where('approval_candidate',1)->count() != 3 )
				<div class="alert alert-danger" {{-- style="position: fixed;right: 0; bottom: 0" --}}>
				    <div class="bg-red alert-icon">
				        <i class="glyph-icon icon-warning"></i>
				    </div>
				    <div class="alert-content">
				        <h4 class="alert-title">Notice message</h4>
				        <p>Please choose 3 candidates that fit for this position as soon as possible, because it will affect on your SLA. Remaining time <code style="font-size: 20px"><span id="clock" {{--this is comment => countdown --}}></span></code></p>
				    </div>
				</div>
			@endif

			<!-- notif -->
	        @if(session('success'))
	        	<div class="alert alert-success" role="alert">
	        		<button type="button" class="close" data-dismiss="alert">×</button>
	                <strong>{{ session('success') }}</strong>
	            </div>
	        @elseif(session('error'))
	        	<div class="alert alert-danger" role="alert">
	        		<button type="button" class="close" data-dismiss="alert">×</button>
	                <strong>{{ session('error') }}</strong>
	            </div>
	        @endif

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
					    @if ( $candidate->where('approval_candidate',1)->count() == 3 )
					    	<tr>
					    		<td valign="top" colspan="7" class="dataTables_empty">udah 3 kandidat</td>
					    		<td id="hidden"></td>
						    	<td id="hidden"></td>
						    	<td id="hidden"></td>
						    	<td id="hidden"></td>
						    	<td id="hidden"></td>
						    	<td id="hidden"></td>
					    	</tr>
					    @else
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
						    <td class="text-center col-md-2">
						    	@if($candidate->approval_candidate == 1)
						    		<span class="bs-label label-info"><strong>Approved</strong></span>
						    	@elseif($candidate->approval_candidate == 2)
						    		<span class="bs-label label-danger"><strong>Rejected</strong></span>
						    	@else
						    		<a href="#modal_approve" data-url="{{ route('candidate.approve',$candidate->id) }}" type="button" data-toggle="modal" class="btn btn-round btn-success btn_modal_approve" title="Choose Candidate">
							            <span class="glyph-icon icon-hand-o-right"></span>
							        </a>
							        &nbsp;
							        <a href="#modal_reject" data-url="{{ route('candidate.reject',$candidate->id) }}" type="button" data-toggle="modal" class="btn btn-round btn-danger btn_modal_reject" title="Reject">
							        	<span class="glyph-icon icon-close"></span>
							        </a>
						    	@endif
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
					    @endif
					</tbody>
				</table>
	        </div>

	    </div>
    </div>
</div>

<!-- Modal Select Candidate -->
<div class="modal fade" tabindex="1" id="modal_approve" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Select Candidate</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_approve">
            @csrf
            @method('PATCH')
            	<div class="modal-body">
                	<p class="text-center"><strong>Are you sure you want to choose this candidate ?</strong></p>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-success">Yes, i choose it</button>
	                <button type="button" class="btn btn-danger" data-dismiss="modal">No, cancel</button>
	            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Reject Candidate -->
<div class="modal fade" tabindex="1" id="modal_reject" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Reject Candidate</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_reject">
            @csrf
            @method('PATCH')
            	<div class="modal-body">
                	{{-- <p class="text-center"><strong>Are you sure you want to reject this candidate ?</strong></p> --}}
                	<div class="form-group">
                        <label for="position_name" class="col-sm-2 control-label">Reason</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" cols="51" rows="12" name="reason" required></textarea>
                        </div>
                    </div>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-success">Yes, i reject it</button>
	                <button type="button" class="btn btn-danger" data-dismiss="modal">No, cancel</button>
	            </div>
            </form>
        </div>
    </div>
</div>
@endsection