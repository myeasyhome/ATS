@extends('layouts.default')
@section('title','Dashboard')

@section('js')
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable-bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable-responsive.js') }}"></script>
<script type="text/javascript">
    /* Datatables responsive */
    $(function() {
    	// $('#datatable-responsive thead tr').clone(true).appendTo( '#datatable-responsive thead' );
	    // $('#datatable-responsive thead tr:eq(1) th').each( function (i) {
	    //     var title = $(this).text();
	    //     $(this).html( '<input id="filter" type="text" placeholder="Search '+title+'" width="10%" />' );
	 
	    //     $( '#filter', this ).on( 'keyup change', function () {
	    //         if ( table.column(i).search() !== this.value ) {
	    //             table
	    //                 .column(i)
	    //                 .search( this.value )
	    //                 .draw();
	    //         }
	    //     } );
	    // } );

        $('#datatable-responsive').DataTable( {
            "responsive" : true,
        } );

        $('.dataTables_filter input').attr("placeholder", "Search...");

    } );
</script>

<script type="text/javascript">
	
    $(document).ready(function () {
    	/* Modal Rejected */
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

         /* modal freeze */
        $(document).on('click','#btn_freeze', function() {
        	var url = $(this).attr('data-url');
        	console.log(url);
        	$('#form_modal_freeze').attr('action',url);
        });

		/* modal unfreeze */
        $(document).on('click','#btn_unfreeze', function() {
        	var url = $(this).attr('data-url');
        	$('#form_modal_unfreeze').attr('action',url);
        });       

    });   
</script>

<!-- kolom recruiter -->
<script src="{{ asset('assets/select2/select2.js') }}"></script>
<script>
	/* dropdown recruiter */
	$(document).ready(function() {
	    $('.recruiter').select2({
	    	placeholder : 'Select Recruiter',
	    	theme: 'bootstrap',
	    });

	    $('.btn_recruiter').click( function() {
	    	/* Data recruiter di table ticket */
	    	var recruiter = $(this).data('recruiter');
    		var id = $(this).data('id');

		    $('.recruiter').select2().val(recruiter).trigger('change');
		    // })
	    	// .on('hide.bs.modal', function(){
	    	// 	$('#recruiter'+id).select2({ placeholder: 'Select Recruiter' }).val([]).trigger('change');
	    	// });

	   		/* jalankan action form di modal */
        	// var url = $(this).attr('data-url');
        	// $('#form_modal_recruiter').attr('action',url);
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
			</div>
		</div>
		<div class="example-box-wrapper">
        <!-- Notification Alart -->
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
        {{-- <div class="row form-group" id="filter">
        	<input type="" name="">
        	<input type="" name="">
        	<input type="" name="">
        </div> --}}
			<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap dataTable collapsed dtr-inline" cellspacing="0" width="100%">
				<thead>
				<tr>
				    <th class="text-center col-md-1">No.</th>
				    <th class="text-center col-md-2">Position Name</th>
				    <th class="text-center col-md-1">Status</th>
				    <th class="text-center col-md-1">Progress</th>
				    <th class="text-center col-md-1">Directorate</th>
				    <th class="text-center col-md-1">Grade</th>
				    <th class="text-center col-md-1">Created By</th>
				    <th class="text-center col-md-2">Recruiter</th>
				    <th class="text-center col-md-1">SLA</th>
				    <th class="text-center col-md-2">Action</th>
				</tr>
				</thead>

				<tbody>
				@php $no =1; @endphp
				    @forelse($data as $data)
					    <tr>
					    <!-- jika di freeze -->
					    @if ( $data->freeze == 99 )
					    	<td class="text-center col-md-1">{{ $no++ }}</td>
					    	<td><a href="{{ route('dashboard.detailTicket',$data->id) }}"><em style="color: red;">{{ $data->position_name }}</em></a></td>
					    	<td class="text-center"><span class="bs-label label-danger"><strong>freeze</strong></span></td>
					    	<td class="text-center">-</td>
					    	<td class="text-center">-</td>
					    	<td class="text-center">-</td>
					    	<td class="text-center">-</td>
					    	<td class="text-center">-</td>
					    	<td class="text-center">-</td>
					    	<td class="text-center">
					    		<!-- KOLOM ACTION -->
					    		<a href="#modal_unfreeze" data-toggle="modal" data-url="{{ route('unfreeze',$data->id) }}" id="btn_unfreeze" type="btn" class="btn btn-round btn-success" title="Unfreeze"><span class="glyph-icon icon-iconic-sun"></span></a>
					    	</td>
					    @else
					    	<td class="text-center col-sm-1">{{ $no++ }}</td>
					    		<td>
					    		{{-- KOLOM NAMA POSISI --}}
					    			<a href="{{ route('dashboard.detailTicket',$data->id) }}">{{ $data->position_name }}</a>
					    		</td>
					    		<td class="text-center"> 
					    		<!-- KOLOM STATUS -->
					    			@if ( $data->user->grade == 7 )
					    			{{-- Jika yang buat Grade 7 / Div. Head --}}
					    				@if ( $data->approval_hrbp == 2 || $data->approval_GH == 2 || $data->approval_chief == 2)
						    				<span class="bs-label label-danger"><strong>Reject</strong></span>
						    			@elseif ( $data->approval_hrbp == 0 || $data->approval_GH == 0 || $data->approval_chief == 0 )
						    				<span class="bs-label label-yellow"><strong>Waiting</strong></span>
						    			@elseif ( $data->approval_hrbp == 1 && $data->approval_GH == 1 && $data->approval_chief == 1 )
						    				<span class="bs-label label-success"><strong>open</strong></span>
						    			@endif
					    			@elseif ( $data->user->grade == 8 )
					    			{{-- Jika yang buat Grade 8 / Group Head --}}
					    				@if ( $data->approval_hrbp == 2 )
						    				<span class="bs-label label-danger"><strong>Reject</strong></span>
					    				@elseif ( $data->approval_hrbp == 0 || $data->approval_chief == 0 || $data->approval_chro == 0 )
						    				<span class="bs-label label-yellow"><strong>Waiting</strong></span>
						    			@elseif ( $data->approval_hrbp == 1 && $data->approval_chief == 1 && $data->approval_chro == 1 )
						    				<span class="bs-label label-success"><strong>open</strong></span>
						    			@endif
					    			@endif
					    		</td>
					    		<td class="text-center">
					    		<!-- KOLOM PROGRESS -->
					    			@if ( $data->user->grade == 7 )
					    			{{-- Jika yang buat Grade 7 / Div. Head --}}
						    			@if ( $data->approval_hrbp == 0 )
						    				<span class="bs-label label-info"><strong>Approval HRBP</strong></span>
						    			@elseif ( $data->approval_hrbp == 2 )
						    				<span class="bs-label label-info"><strong>Approval HRBP</strong></span>
						    			@elseif ( $data->approval_GH == 0 )
						    				<span class="bs-label label-info"><strong>Approval GH</strong></span>
						    			@elseif ( $data->approval_GH == 2 )
						    				<span class="bs-label label-info"><strong>Approval GH</strong></span>
						    			@elseif ( $data->approval_chief == 0 )
						    				<span class="bs-label label-info"><strong>Approval Chief</strong></span>
						    			@elseif ( $data->approval_chief == 2 )
						    				<span class="bs-label label-info"><strong>Approval Chief</strong></span>
						    			@elseif ( $data->approval_hrbp == 1 && $data->approval_GH == 1 && $data->approval_chief == 1 )
						    				<a href="{{ route('hiring_brief') }}" type="button" class="bs-label label-info"><span><strong>Hiring Brief</strong></span></a>
						    			@endif
					    			@elseif ( $data->user->grade == 8 )
					    			{{-- Jika yang buat Grade 8 / Group Head --}}
					    				@if ( $data->approval_hrbp == 0 )
						    				<span class="bs-label label-info"><strong>Approval HRBP</strong></span>
						    			@elseif ( $data->approval_hrbp == 2 )
						    				<span class="bs-label label-info"><strong>Approval HRBP</strong></span>
						    			@elseif ( $data->approval_chief == 0 )
						    				<span class="bs-label label-info"><strong>Approval CxO</strong></span>
						    			@elseif ( $data->approval_chief == 2 )
						    				<span class="bs-label label-info"><strong>Approval CxO</strong></span>
						    			@elseif ( $data->approval_chro == 0 )
						    				<span class="bs-label label-info"><strong>Approval CHRO</strong></span>
						    			@elseif ( $data->approval_chro == 2 )
						    				<span class="bs-label label-info"><strong>Approval CHRO</strong></span>
						    			@elseif ( $data->approval_hrbp == 1 && $data->approval_chief == 1 && $data->approval_chro == 1 )
						    				<a href="{{ route('hiring_brief') }}" type="button" class="bs-label label-info"><span><strong>Hiring Brief</strong></span></a>
						    			@endif
					    			@endif
					    		</td>
					    		<td class="text-center">{{ $data->ticket_erf_details->directorates->directorate_name }}</td>
					    		<td class="text-center">
					    			<!-- KOLOM GRADE -->
					    			{{ $data->position_grade }}
					    		</td>
					    		<td class="text-center">
					    			<!-- KOLOM CREATED_BY -->
					    			{{ $data->user->name }}
					    		</td>
					    		<td class="text-center">
					    			<!-- KOLOM RECRUITER -->
					    			@if ( $data->user->grade == 7 )
					    				@if ( $data->approval_hrbp == 1 && $data->approval_GH == 1 && $data->approval_chief == 1 )
						    				{{-- <select id="recruiter" class="form-control recruiter" multiple="multiple" name="recruiter[]" style="width: 100%" ticket-id="{{ $data->id }}">
							    				<option>Mona Biniling</option>
							    				<option>Genny</option>
							    				<option>dwa</option>
							    				<option>dwaaw</option>
							    				<option>dw'a.daw</option>
							    				<option>adawkmdwa</option>
							    				<option>dawl;adaw</option>
							    			</select> --}}
							    			<a href="#modal_recruiter{{ $data->id }}" data-toggle="modal" type="button" class="bs-label label-primary btn_recruiter"
						    				data-recruiter="{{ $data->recruiter ==  '' ? 'NULL' : $data->recruiter }}"
						    				data-id="{{ $data->id }}">
						    					<span><strong>Select Recruiter</strong></span>
						    				</a>
					    				@else
					    				-
					    				@endif
					    			@elseif ( $data->user->grade == 8 )
					    				@if ( $data->approval_hrbp == 1 && $data->approval_chief == 1 && $data->approval_chro == 1 )
						    				<select class="form-control recruiter" multiple="multiple" name="recruiter[]" style="width: 100%">
							    				<option>Mona Biniling</option>
							    				<option>Genny</option>
							    			</select>
					    				@else
					    				-
					    				@endif
					    			@endif
					    		</td>
					    		<td class="text-center">
					    			@isset ( $data->hiring_briefs )
					    				@php
					    					$buat = $data->hiring_briefs->created_at;
					    					$now = Carbon\Carbon::now();
					    					$total = $now->diffInDays($buat)
					    				@endphp
					    			    <span class="bs-label label-success"><strong>{{ $total }} Days</strong></span>
					    			@else
					    				-
					    			@endisset
					    		</td>
					    		<td class="text-center">
					    			<!-- KOLOM ACTION -->
					    			@if ( $data->user->grade == 7 )
					    				@if ( $data->approval_hrbp == 1 && $data->approval_GH == 1 && $data->approval_chief == 1 )
					    					<a href="#" type="btn" class="btn btn-round btn-warning" title="Cancel"><span class="glyph-icon icon-ban"></span></a>
							    			&nbsp;
							    			<a href="#modal_freeze" id="btn_freeze" data-toggle="modal" type="btn" class="btn btn-round btn-danger" title="Freeze" data-url="{{ route('freeze',$data->id) }}"><span class="glyph-icon icon-iconic-sun-inv"></span></a>
					    				@else
					    				-
					    				@endif
					    			@elseif ( $data->user->grade == 8 )
					    				@if ( $data->approval_hrbp == 1 && $data->approval_chief == 1 && $data->approval_chro == 1 )
						    				<a href="#" type="btn" class="btn btn-round btn-warning" title="Cancel"><span class="glyph-icon icon-ban"></span></a>
							    			&nbsp;
							    			<a href="#modal_freeze" id="btn_freeze" data-toggle="modal" type="btn" class="btn btn-round btn-danger" title="Freeze" data-url="{{ route('freeze',$data->id) }}"><span class="glyph-icon icon-iconic-sun-inv"></span></a>
						    			@else
						    			-
						    			@endif
					    			@endif
					    		</td>
					    @endif
						</tr>
				    @empty
				    	<td valign="top" colspan="10" class="dataTables_empty">No data available in table</td>
				    	<td id="hidden"></td>
				    	<td id="hidden"></td>
				    	<td id="hidden"></td>
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

<!-- Modal freeze -->
<div class="modal fade" tabindex="1" id="modal_freeze" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Freeze Ticket</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_freeze" autocomplete="off">
            @csrf
            @method('PATCH')
            	<div class="modal-body">
                	<div class="form-group">
                        <label for="position_name" class="col-sm-2 control-label">Reason <span style="color: red"> *</span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" cols="51" rows="12" name="reason_freeze" required></textarea>
                        </div>
                    </div>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-success">Yes, freeze it</button>
	                <button type="button" class="btn btn-danger" data-dismiss="modal">No, cancel</button>
	            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal unfreeze -->
<div class="modal fade" tabindex="1" id="modal_unfreeze" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Unfreeze Ticket</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_unfreeze">
            @csrf
            @method('PATCH')
            	<div class="modal-body">
                    <p class="text-center"><strong>Are you sure want to Unfreeze Ticket ?</strong></p>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-success">Yes, unfreeze it</button>
	                <button type="button" class="btn btn-danger" data-dismiss="modal">No, cancel</button>
	            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Reecruiter -->
@foreach ($modal as $modal)
<div class="modal fade" tabindex="1" id="modal_recruiter{{ $modal->id }}" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Choose Recruiter</h4>
            </div>
            <form action="{{ route('updateRecruiter',$modal->id) }}" role="form" method="post" class="form-horizontal" id="form_modal_recruiter">
            @csrf
            @method('PATCH')
            	<div class="modal-body" style="padding-left: 20%; padding-right: 20%; ">
            		<div class="form-group">
            			<div class="col-md-12">
            				<select id="recruiter" class="form-control recruiter" multiple="multiple" name="recruiter[]" style="width: 100%" placeholder="Select Recruiter" >
			    				<option value="MONA BINILING">MONA BINILING</option>
			    				<option value="GENNY">GENNY</option>
			    				<option value="DENNY">DENNY</option>
			    			</select>	
            			</div>
            		</div>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-success">Yes, select it</button>
	                <button type="button" class="btn btn-danger" data-dismiss="modal">No, cancel</button>
	            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection