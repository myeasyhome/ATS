@extends('layouts.default')
@section('title','Ticket List')

@section('js')

<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable-bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable-responsive.js') }}"></script>

<script type="text/javascript">
    /* Datatables responsive */
    $(document).ready(function() {
        $('#datatable-responsive').DataTable( {
            "responsive": true
        } );
    } );

    $(document).ready(function() {
        $('.dataTables_filter input').attr("placeholder", "Search...");
    }); 

</script>

<!-- Modal Delete -->
<script type="text/javascript">
	$(document).ready(function (e) {
        $(document).on("click", ".btn_modal_delete", function (e) {
            var url = $(this).attr('data-url'); 
            $('#form_modal_delete').attr('action',url);
        });
    });

	/* Modal Rejected */
    $(document).ready(function (e) {
        $(document).on("click", ".btn_modal_reject_lm2", function (e) {
            var url = $(this).attr('data-url'); 
            $.ajax({
            	type : "GET",
            	url : url,
            	cache : true,
            	success:function(data){
            		$('#content_reason').html('<p>'+data.reason_reject_lm2+'</p>')
            	}
            })
        });
    });

    $(document).ready(function (e) {
        $(document).on("click", ".btn_modal_reject_hrbp", function (e) {
            var url = $(this).attr('data-url'); 
            $.ajax({
            	type : "GET",
            	url : url,
            	cache : true,
            	success:function(data){
            		$('#content_reason').html('<p>'+data.reason_reject_hrbp+'</p>')
            	}
            })
        });
    });
</script>

@stop

@section('content')
<div class="panel">
	<div class="panel-body">
		<h3 class="title-hero">
		    HIRING DASHBOARD
		</h3>
		<div style="padding-bottom: 20px">
			<a href="{{ route('create.ticket') }}" type="button" class="btn btn-success">
				<span class="glyph-icon icon-plus"> New Request</span>
			</a>
		</div>
		<div class="example-box-wrapper">

			<!-- notif -->
			@if (session('error'))
                <div class="alert alert-danger" role="alert">
                    <strong>{{ session('error') }}</strong>
                </div>
            @elseif(session('success'))
            	<div class="alert alert-success" role="alert">
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif

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
				    @forelse($ticket as $ticket)
				    <tr>
					    <td>{{ $no++ }}</td>
					    <td>{{ $ticket->position_name }}</td>
					    {{-- <td></td> --}}
					    <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y') }}</td>
					    <td>
					    	@if($ticket->approval_lm2 == 0)
					    		<span class="bs-label label-yellow"><strong>Waiting Approval</strong></span>
					    	@elseif($ticket->approval_lm2 == 1)
					    		<span class="bs-label label-success"><strong>Approved</strong></span>
					    	@elseif($ticket->approval_lm2 == 2)
					    		<span class="bs-label label-danger"><strong>Rejected</strong></span>
					    	@endif
					    </td>
					    <td>
					    	@if($ticket->approval_hrbp == 0)
					    		<span class="bs-label label-yellow"><strong>Waiting Approval</strong></span>
					    	@elseif($ticket->approval_hrbp == 1)
					    		<span class="bs-label label-success"><strong>Approved</strong></span>
					    	@elseif($ticket->approval_hrbp == 2)
					    		<span class="bs-label label-danger"><strong>Rejected</strong></span>
					    	@endif
					    </td>
					    <td>
					    	@if ($ticket->approval_lm2 == 0)
							    <a href="{{ route('edit.ticket',$ticket->id) }}" type="button" class="btn btn-round btn-info" title="Edit">
						            <span class="glyph-icon icon-pencil"></span>
						        </a>
						    @elseif ($ticket->approval_lm2 == 2)
						    	<a href="{{ route('edit_rejected.ticket',$ticket->id) }}" type="button" class="btn btn-round btn-purple" title="Request Re-approval">
						            <span class="glyph-icon icon-external-link-square"></span>
						        </a>
					        @endif
					        &nbsp;
					        <a href="#modal_delete" type="button" data-url="{{ route('delete.ticket',$ticket->id) }}" data-toggle="modal" class="btn btn-round btn-danger btn_modal_delete" title="Delete">
					            <span class="glyph-icon icon-trash"></span>
					        </a>
					        &nbsp;
					        @if ($ticket->approval_lm2 == 2)
						        <a href="#modal_reject" type="button" data-toggle="modal" data-url="{{ route('reason.ticket',$ticket->id) }}" class="btn btn-round btn-info btn_modal_reject_lm2" title="Rejected Reason">
						            <span class="glyph-icon icon-eye"></span>
						        </a>
						    @elseif ($ticket->approval_hrbp == 2)
						    	<a href="#modal_reject" type="button" data-toggle="modal" data-url="{{ route('reason.ticket',$ticket->id) }}" class="btn btn-round btn-info btn_modal_reject_hrbp" title="Rejected Reason">
						            <span class="glyph-icon icon-eye"></span>
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
				    
				</tbody>

			</table>
		</div>
	</div>
</div>

<!-- modal delete -->
<div class="modal fade" tabindex="1" id="modal_delete" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete Ticket</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_delete">
            @csrf
            @method('DELETE')
            	<div class="modal-body">
                	<p class="text-center"><strong>Are you sure you want to delete this position ?</strong></p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <button type="submit" class="btn btn-danger">Delete</button>
	            </div>
            </form>
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
