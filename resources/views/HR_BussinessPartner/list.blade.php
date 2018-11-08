@extends('layouts.default')
@section('title','Approval List')
@section('js')
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable-bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable-responsive.js') }}"></script>
<script>
    /* Datatables responsive */
    $(function() {
        $('#datatable-responsive').DataTable( {
            "responsive": true
        });

        $('.dataTables_filter input').attr("placeholder", "Search...");
    });
</script>

<script type="text/javascript">
	/* Modal Reject */
	$(document).ready(function (e) {
        $(document).on("click", ".btn_modal_reject", function (e) {
            var url = $(this).attr('data-url'); 
            $('#form_modal_reject').attr('action',url);
        });
    });

    /* Modal Approved */
	$(document).ready(function (e) {
        $(document).on("click", ".btn_modal_approved", function (e) {
            var url = $(this).attr('data-url'); 
            $('#form_modal_approved').attr('action',url);
        });
    });
</script>
@stop


<!-- ALERT akan muncul jika HRT sudah input hasil briefing, status waiting => 0 -->
@section('alert_for_HRBP')
	{{-- @if($hiring->contains('approval_hiring_by_hrbp','0') == true)
		@component('notice_message.notice', [ 
						'msg'=> 'There is an approval that must be completed as soon as possible because it will affect duration of the SLA', 
						'link' => route('hrbp.approval.hiring')
					])
		@endcomponent
	@endif --}}
@endsection
@section('content')
<div class="panel">
	<div class="panel-body">

		<div class="title-hero">
			<h4><strong>Approval List</strong></h4>
		</div>
		<div class="example-box-wrapper">
			<!-- Notification Alert -->
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
					    <th class="text-center col-md-1">No.</th>
					    <th>Position Name</th>
					    <th class="text-center">Created Date</th>
					    <th class="text-center">Created By</th>
					    <th class="text-center">Status</th>
					</tr>
				</thead>

				<tbody>
				    @php $no=1; @endphp
				    @forelse($ticket as $ticket)
				    <tr>
					    <td class="text-center">{{ $no++ }}</td>
					    <td><a href="{{ route('hrbp.detail',$ticket->id) }}">{{ $ticket->position_name }}</a></td>
					    <td class="text-center">{{ \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y') }}</td>
					    <td class="text-center">{{ $ticket->user->name }}</td>
					    <td class="text-center">
					    	@if($ticket->approval_hrbp > 0)
					    		@if ( $ticket->freeze == 99 )
					    			<!-- jika FREEZE oleh HRTA -->
					    			<span class="bs-label label-danger"><strong>freeze</strong></span>
					    		@elseif ( $ticket->approval_hrbp == 1 )
					    			<span class="bs-label label-success"><strong>Approved</strong></span>
					    		@elseif ( $ticket->approval_hrbp == 2 )
					    			<span class="bs-label label-danger"><strong>Rejected</strong></span>
					    		@endif
					    	@else
					    		<a href="{{ route('hrbp.detail',$ticket->id) }}" type="button" class="bs-label label-yellow"><span><strong>need approval</strong></span></a>
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

<!-- Modal approval -->
{{-- <div class="modal fade" tabindex="1" id="modal_approval" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Approval Status</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_approved">
            @csrf
            @method('PATCH')
            	<div class="modal-body">
                	<p class="text-center"><strong>Are you sure to Approve this position ?</strong></p>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-success">Yes, i approve it</button>
	                <button type="button" class="btn btn-danger" data-dismiss="modal">No, cancel</button>
	            </div>
            </form>
        </div>
    </div>
</div> --}}

<!-- Modal reject -->
{{-- <div class="modal fade" tabindex="1" id="modal_reject" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Approval Status</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_reject">
            @csrf
            @method('PATCH')
            	<div class="modal-body">
                	<div class="form-group">
                        <label for="position_name" class="col-sm-2 control-label">Reason</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" cols="51" rows="12" name="reason_for_rejection" required></textarea>
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
</div> --}}

@endsection
