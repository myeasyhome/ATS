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

        $('.dataTables_filter input').attr("placeholder", "Search...");
    } );
</script>

<!-- Modal Delete -->
<script type="text/javascript">
	$(document).ready(function (e) {
        $(document).on("click", ".btn_modal_delete", function (e) {
            var url = $(this).attr('data-url'); 
            $('#form_modal_delete').attr('action',url);
        });
    });

    /* Modal Rejected HRBP */
    $(document).ready(function (e) {
        $(document).on("click", ".btn_modal_reject_hrbp", function (e) {
            var url = $(this).attr('data-url'); 
            $.ajax({
            	type : "GET",
            	url : url,
            	cache : true,
            	success:function(data){
            		$('#title').html('HR Business Partner Reason');
            		if ( data.reason_reject_hrbp == null ) {
            			$('#content_reason').html('<p>-</p>');
            		} else {
            			$('#content_reason').html('<p>'+data.reason_reject_hrbp+'</p>');	
            		}
            		
            	}
            })
        });
    });

    /* Modal Rejected GH */
    $(document).ready(function (e) {
        $(document).on("click", ".btn_modal_reject_groupHead", function (e) {
            var url = $(this).attr('data-url'); 
            $.ajax({
            	type : "GET",
            	url : url,
            	cache : true,
            	success:function(data){
            		$('#title').html('Group Head Reason');
            		if ( data.reason_reject_GH == null ) {
            			$('#content_reason').html('<p>-</p>');
            		} else {
            			$('#content_reason').html('<p>'+data.reason_reject_GH+'</p>');	
            		}
            		
            	}
            })
        });
    });

    /* Modal Rejected chief */
    $(document).ready(function (e) {
        $(document).on("click", ".btn_modal_reject_chief", function (e) {
            var url = $(this).attr('data-url'); 
            $.ajax({
            	type : "GET",
            	url : url,
            	cache : true,
            	success:function(data){
            		$('#title').html('Chief Reason');
            		if ( data.reason_reject_chief == null ) {
            			$('#content_reason').html('<p>-</p>');
            		} else {
            			$('#content_reason').html('<p>'+data.reason_reject_chief+'</p>');	
            		}
            		
            	}
            })
        });
    });

    /* Modal Rejected CHRO */
    $(document).ready(function (e) {
        $(document).on("click", ".btn_modal_reject_chro", function (e) {
            var url = $(this).attr('data-url'); 
            $.ajax({
                type : "GET",
                url : url,
                cache : true,
                success:function(data){
                    $('#title').html('CHRO Reason');
                    if ( data.reason_reject_chro == null ) {
                        $('#content_reason').html('<p>-</p>');
                    } else {
                        $('#content_reason').html('<p>'+data.reason_reject_chro+'</p>');   
                    }
                    
                }
            })
        });
    });

    /* Modal Progress */
    $(document).ready(function () {
        $(document).on("click", ".btn_progress", function () {
            var url = $(this).data('url');
            $.ajax({
            	type : "GET",
            	url : url,
            	cache : true,
            	success:function(data){
                    if ( data.grade == 7 ) {
                		if ( data.approval_GH == 0 && data.approval_chief == 0) {
                			var isi_cont ='<tr><th class="text-center">Line Manager</th><th class="text-center">Approval</th></tr>';
                			isi_cont += '<tr><td>'+data.gh+'</td><td class="text-center"><span class="bs-label label-yellow"><strong>Waiting</strong></span></td></tr>';
                			isi_cont += '<tr><td>'+data.chief+'</td><td class="text-center"><span class="bs-label label-yellow"><strong>Waiting</strong></span></td></tr>';

                			$('#content_progress').html(isi_cont);

                        } else if ( data.approval_GH == 1 && data.approval_chief == 0 ) {
                            var isi_cont ='<tr><th class="text-center">Line Manager</th><th class="text-center">Approval</th></tr>';
                            isi_cont += '<tr><td>'+data.gh+'</td><td class="text-center"><span class="bs-label label-success"><strong>Approved</strong></span></td></tr>';
                            isi_cont += '<tr><td>'+data.chief+'</td><td class="text-center"><span class="bs-label label-yellow"><strong>Waiting</strong></span></td></tr>';
                            
                            $('#content_progress').html(isi_cont);
                		} else if ( data.approval_GH == 1 && data.approval_chief == 1 ) {
                			var isi_cont ='<tr><th class="text-center">Line Manager</th><th class="text-center">Approval</th></tr>';
                			isi_cont += '<tr><td>'+data.gh+'</td><td class="text-center"><span class="bs-label label-success"><strong>Approved</strong></span></td></tr>';
                			isi_cont += '<tr><td>'+data.chief+'</td><td class="text-center"><span class="bs-label label-success"><strong>Approved</strong></span></td></tr>';
                			
                			$('#content_progress').html(isi_cont);
                		} else if ( data.approval_GH == 2 ) {
                			var isi_cont ='<tr><th class="text-center">Line Manager</th><th class="text-center">Approval</th></tr>';
                			isi_cont += '<tr><td>'+data.gh+'</td><td class="text-center"><span class="bs-label label-danger"><strong>Rejected</strong></span></td></tr>';
                			isi_cont += '<tr><td>'+data.chief+'</td><td class="text-center"><span class="bs-label label-warning"><strong>Stop</strong></span></td></tr>';
                			
                			$('#content_progress').html(isi_cont);
                		} else if ( data.approval_GH == 1 && data.approval_chief == 2 ) {
                			var isi_cont ='<tr><th class="text-center">Line Manager</th><th class="text-center">Approval</th></tr>';
                			isi_cont += '<tr><td>'+data.gh+'</td><td class="text-center"><span class="bs-label label-success"><strong>Approved</strong></span></td></tr>';
                			isi_cont += '<tr><td>'+data.chief+'</td><td class="text-center"><span class="bs-label label-danger"><strong>Rejected</strong></span></td></tr>';
                			
                			$('#content_progress').html(isi_cont);
                		}
                    } else if ( data.grade == 8 ) {
                        if ( data.approval_chief == 0 && data.approval_chro == 0) {
                            var isi_cont ='<tr><th class="text-center">Line Manager</th><th class="text-center">Approval</th></tr>';
                            isi_cont += '<tr><td>'+data.chief+'</td><td class="text-center"><span class="bs-label label-yellow"><strong>Waiting</strong></span></td></tr>';
                            isi_cont += '<tr><td>'+data.chro+'</td><td class="text-center"><span class="bs-label label-yellow"><strong>Waiting</strong></span></td></tr>';

                            $('#content_progress').html(isi_cont);

                        } else if ( data.approval_chief == 1 && data.approval_chro == 0 ) {
                            var isi_cont ='<tr><th class="text-center">Line Manager</th><th class="text-center">Approval</th></tr>';
                            isi_cont += '<tr><td>'+data.chief+'</td><td class="text-center"><span class="bs-label label-success"><strong>Approved</strong></span></td></tr>';
                            isi_cont += '<tr><td>'+data.chro+'</td><td class="text-center"><span class="bs-label label-yellow"><strong>Waiting</strong></span></td></tr>';
                            
                            $('#content_progress').html(isi_cont);
                        } else if ( data.approval_chief == 1 && data.approval_chro == 1 ) {
                            var isi_cont ='<tr><th class="text-center">Line Manager</th><th class="text-center">Approval</th></tr>';
                            isi_cont += '<tr><td>'+data.chief+'</td><td class="text-center"><span class="bs-label label-success"><strong>Approved</strong></span></td></tr>';
                            isi_cont += '<tr><td>'+data.chro+'</td><td class="text-center"><span class="bs-label label-success"><strong>Approved</strong></span></td></tr>';
                            
                            $('#content_progress').html(isi_cont);
                        } else if ( data.approval_chief == 2 ) {
                            var isi_cont ='<tr><th class="text-center">Line Manager</th><th class="text-center">Approval</th></tr>';
                            isi_cont += '<tr><td>'+data.chief+'</td><td class="text-center"><span class="bs-label label-danger"><strong>Rejected</strong></span></td></tr>';
                            isi_cont += '<tr><td>'+data.chro+'</td><td class="text-center"><span class="bs-label label-warning"><strong>Stop</strong></span></td></tr>';
                            
                            $('#content_progress').html(isi_cont);
                        } else if ( data.approval_chief == 1 && data.approval_chro == 2 ) {
                            var isi_cont ='<tr><th class="text-center">Line Manager</th><th class="text-center">Approval</th></tr>';
                            isi_cont += '<tr><td>'+data.chief+'</td><td class="text-center"><span class="bs-label label-success"><strong>Approved</strong></span></td></tr>';
                            isi_cont += '<tr><td>'+data.chro+'</td><td class="text-center"><span class="bs-label label-danger"><strong>Rejected</strong></span></td></tr>';
                            
                            $('#content_progress').html(isi_cont);
                        }
                	}

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
                	<button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('error') }}</strong>
                </div>
            @elseif(session('success'))
            	<div class="alert alert-success" role="alert">
            		<button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif

			<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap dataTable collapsed dtr-inline" cellspacing="0" width="100%">
				<thead>
				<tr>
				    <th class="text-center col-md-1">No.</th>
				    <th class="text-center">Position Name</th>
				    <th class="text-center col-md-1">Date Created</th>
				    <th class="text-center col-md-1">HRBP Approval</th>
				    <th class="text-center col-md-2">Line Manager Approval</th>
				    <th class="text-center">Option</th>
				</tr>
				</thead>

				<tbody>
				@php $no =1; @endphp
				    @forelse($ticket as $ticket)
				    <tr>
					    <td class="text-center">{{ $no++ }}</td>
					    <td><a href="{{ route('detail.ticket',$ticket->id) }}">{{ $ticket->position_name }}</a></td>
					    <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y') }}</td>
					    <td class="text-center">
                            <!-- HRBP APPROVAL -->
					    	@if($ticket->approval_hrbp == 0)
					    		<span class="bs-label label-yellow"><strong>Waiting</strong></span>
					    	@elseif($ticket->approval_hrbp == 1)
					    		<span class="bs-label label-success"><strong>Approved</strong></span>
					    	@elseif($ticket->approval_hrbp == 2)
					    		<span class="bs-label label-danger"><strong>Rejected</strong></span>
					    	@endif
					    </td>
                        <!-- LINE MANAGER APPROVAL -->
					    @if ( Auth::user()->grade == 7 )
					    	<td class="text-center col-md-2">
                                @if ( $ticket->approval_hrbp == 0 )
                                    <span class="bs-label label-yellow"><strong>Waiting</strong></span>
					    		@elseif ( $ticket->approval_hrbp == 1 )
					    			<span class="bs-label label-info"><strong><a href="#modal_progress" data-toggle="modal" type="button" data-url="{{ route('progress',$ticket->id) }}" class="btn-info btn_progress">Progress</a></strong></span>
					    		@elseif( $ticket->approval_hrbp == 2 )
					    			<span class="bs-label label-warning"><strong>Stop</strong></span>
					    		@endif
					    	</td>
                        @elseif ( Auth::user()->grade == 8 )
                            <td class="text-center col-md-2">
                                @if ( $ticket->approval_hrbp == 0 )
                                    <span class="bs-label label-yellow"><strong>Waiting</strong></span>
                                @elseif ( $ticket->approval_hrbp == 1 )
                                    <span class="bs-label label-info"><strong><a href="#modal_progress" data-toggle="modal" type="button" data-url="{{ route('progress',$ticket->id) }}" class="btn-info btn_progress">Progress</a></strong></span>
                                @elseif( $ticket->approval_hrbp == 2 )
                                    <span class="bs-label label-warning"><strong>Stop</strong></span>
                                @endif
                            </td>
					    @endif

                        <!-- OPTION -->
					    <td class="text-center">
					    	@if ($ticket->approval_hrbp == 0)
							    <a href="{{ route('edit.ticket',$ticket->id) }}" type="button" class="btn btn-round btn-info" title="Edit">
						            <span class="glyph-icon icon-pencil"></span>
						        </a>
						        <a href="#modal_delete" type="button" data-url="{{ route('delete.ticket',$ticket->id) }}" data-toggle="modal" class="btn btn-round btn-danger btn_modal_delete" title="Delete">
						            <span class="glyph-icon icon-trash"></span>
						        </a>
						    @elseif ($ticket->approval_hrbp == 2)
						    	<a href="{{ route('edit_rejected.ticket',$ticket->id) }}" type="button" class="btn btn-round btn-purple" title="Request Re-approval">
						            <span class="glyph-icon icon-external-link-square"></span>
						        </a>
						        <a href="#modal_delete" type="button" data-url="{{ route('delete.ticket',$ticket->id) }}" data-toggle="modal" class="btn btn-round btn-danger btn_modal_delete" title="Delete">
						            <span class="glyph-icon icon-trash"></span>
						        </a>
						        <a href="#modal_reject" type="button" data-toggle="modal" data-url="{{ route('reason.ticket',$ticket->id) }}" class="btn btn-round btn-info btn_modal_reject_hrbp" title="Rejected Reason">
						            <span class="glyph-icon icon-eye"></span>
						        </a>
						    @elseif ($ticket->approval_GH == 2)
						    	<a href="#modal_reject" type="button" data-toggle="modal" data-url="{{ route('reason.ticket',$ticket->id) }}" class="btn btn-round btn-info btn_modal_reject_groupHead" title="Rejected Reason">
						            <span class="glyph-icon icon-eye"></span>
						        </a>
						    @elseif ($ticket->approval_chief == 2)
						    	<a href="#modal_reject" type="button" data-toggle="modal" data-url="{{ route('reason.ticket',$ticket->id) }}" class="btn btn-round btn-info btn_modal_reject_chief" title="Rejected Reason">
						            <span class="glyph-icon icon-eye"></span>
						        </a>
                            @elseif ($ticket->approval_chro == 2)
                                <a href="#modal_reject" type="button" data-toggle="modal" data-url="{{ route('reason.ticket',$ticket->id) }}" class="btn btn-round btn-info btn_modal_reject_chro" title="Rejected Reason">
                                    <span class="glyph-icon icon-eye"></span>
                                </a>
						    @elseif ($ticket->approval_hrbp == 1 )
						    	<span class="bs-label label-success" id="ket" data-popover="true" data-content="Your request on progress" title="Information"><strong>On Progress</strong></span>
					        @endif
					    </td>
				    </tr>
				    @empty
				    	<td valign="top" colspan="6" class="dataTables_empty">No data available in table</td>
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
                <h4 class="modal-title" id="title"></h4>
            </div>

        	<div class="modal-body" id="content_reason">
            	
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- modal progress -->
<div class="modal fade" tabindex="1" id="modal_progress" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="title">Line Manager Progress</h4>
            </div>

        	<div class="modal-body">
            	<table class="table table-striped table-bordered" id="content_progress">
            		
            	</table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
