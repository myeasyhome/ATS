@extends('layouts.default')
@section('title','Result Of Hiring Brief')

@section('js')
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

@section('content')
{{-- <ol class="breadcrumb bc-3" >
    <li>
        <a href="{{ route('hrbp.approval') }}">Approval Ticket</a>
    </li>
    <li class="active">
    	<a>Detail Ticket</a>
    </li>
</ol> --}}

<h2>Result of Hiring Brief</h2>
<br>
<div style="color: tomato;">
<p></p>
</div>

<div class="row">
    <div class="col-md-12">
	    <div class="panel panel-default">
	        <div class="panel-body">

		        <div class="form-group">
		        	<h4><label class="col-md-8" style="padding-bottom: 10px;">Job Function</label></h4>
        			<div class="col-md-12" style="padding-left: 30px;">
        				{!! $hiring->job_function !!}	
        			</div>
		        </div>
		        <div class="form-group">
		        	<h4><label class="col-md-8" style="padding-bottom: 10px;">General Information</label></h4>
        			<div class="col-md-12" style="padding-left: 30px;">
        				{!! $hiring->general_information !!}	
        			</div>
		        </div>
		        <div class="form-group">
		        	<h4><label class="col-md-8" style="padding-bottom: 10px;">Characteristic</label></h4>
        			<div class="col-md-12" style="padding-left: 30px;">
        				{!! $hiring->characteristic !!}	
        			</div>
		        </div>

	        </div>

	        <div class="form-group text-center">
            	<a href="{{ route('hrbp.approval.hiring') }}" type="button" class="btn btn-round btn-info" title="back">
            		<span class="glyph-icon icon-arrow-left"></span>
            	</a>
            	&nbsp;
            	<a href="#modal_approval" type="button" data-url="{{ route('hrbp.approved.result',$hiring->id) }}" data-toggle="modal" class="btn btn-round btn-success btn_modal_approved" title="Approved">
                	<span class="glyph-icon icon-check"></span>
                </a>
                &nbsp;
                <a href="#modal_reject" type="button" data-url="{{ route('hrbp.reject.result',$hiring->id) }}" data-toggle="modal" class="btn btn-round btn-danger btn_modal_reject" title="Reject">
                    <span class="glyph-icon icon-remove"></span>
                </a>
            </div>

	    </div>
    </div>
</div>

<!-- Modal approval -->
<div class="modal fade" tabindex="1" id="modal_approval" role="dialog">
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
                	<p class="text-center"><strong>Are you sure to Approve The Result of Brief ?</strong></p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	                <button type="submit" class="btn btn-success">Approved</button>
	            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal reject -->
<div class="modal fade" tabindex="1" id="modal_reject" role="dialog">
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
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	                <button type="submit" class="btn btn-danger">Reject</button>
	            </div>
            </form>
        </div>
    </div>
</div>
@endsection