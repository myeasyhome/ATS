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

		    $('.recruiter').select2().val(recruiter).trigger('change');

        }); 
	});
</script>
@stop

@section('content')
<div id="page-title">
	<h2>Dashboard</h2>
</div>
<div class="panel">
	<div class="panel-body">
		{{-- <div class="title-hero">
			<div class="row">
				<div class="col-md-6" style="padding-top: 10px;">
					<h5><strong>NEW REQUEST LIST</strong></h5>	
				</div>
			</div>
		</div> --}}
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
        
			<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap dataTable collapsed dtr-inline" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th class="text-center col-md-2">Position Name</th>
					    <th class="text-center col-md-1">Grade</th>
					    <th class="text-center col-md-1">Status</th>
					    <th class="text-center col-md-1">Progress</th>
					    <th class="text-center col-md-1">SLA</th>
					</tr>
				</thead>

				<tbody>
				@foreach ($data as $data)
					<tr>
						<td>{{ $data->position_name }}</td>
						<td class="text-center">{{ $data->position_grade }}</td>
						<!-- KOLOM STATUS -->
						<td class="text-center">
							<!-- yg buat grade 7 -->
							@if ( $data->user->grade == 7 ) 
							<!-- approval hrbp -->
								@if ( $data->approval_hrbp == 2 || $data->approval_GH == 2 || $data->approval_chief == 2)
				    				<span class="bs-label btn-border border-red font-red">
				    					<strong>reject</strong>
				    				</span>
				    			@elseif ( $data->approval_hrbp == 0 || $data->approval_GH == 0 || $data->approval_chief == 0 )
				    				<span class="bs-label btn-border border-yellow font-yellow">
				    					<strong>waiting</strong>
				    				</span>
				    			@elseif ( $data->approval_hrbp == 1 && 
		    							$data->approval_GH == 1 && 
		    							$data->approval_chief == 1 && 
		    							$data->hiring_briefs->date_schedule == NULL )
				    				<span class="bs-label btn-border border-green font-green">
				    					<strong>open</strong>
				    				</span>
				    			@elseif ( $data->approval_hrbp == 1 && 
				    					$data->approval_GH == 1 && 
				    					$data->approval_chief == 1 && 
				    					$data->hiring_briefs->approval_hiring_by_hrbp == 0 )
				    				<span class="bs-label btn-border border-yellow font-yellow">
				    					<strong>waiting</strong>
				    				</span>
								@endif
							@endif
						</td>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>
				@endforeach
				</tbody>

			</table>
		</div>
	</div>
</div>

@endsection