<?php $__env->startSection('content'); ?>
<div class="panel">
	<div class="panel-body">
		<h3 class="title-hero">
		    YOUR TICKET LIST
		</h3>
		<div class="example-box-wrapper">
			<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
				<thead>
				<tr>
				    <th>No.</th>
				    <th>Position Name</th>
				    <th>JD File</th>
				    <th>Date</th>
				    <th>Line Manager Approval</th>
				    <th>HRBP Approval</th>
				    <th>Option</th>
				</tr>
				</thead>

				<tbody>
				<?php $no =1; ?>
				    <tr>
				    <td></td>
				    <td></td>
				    <td><a href="">JD File</a></td>
				    <td></td>
				    <td></td>
				    <td></td>
				    <td>
				        <a href="">
				            <span class="glyph-icon icon-pencil"></span>
				        </a>
				        &nbsp;&nbsp;
				        <a href="">
				            <span class="glyph-icon icon-remove"></span>
				        </a>
				        </td>
				    </tr>
				    
				</tbody>

			</table>
		</div>
	</div>
</div>

<script type="text/javascript" src="assets/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="assets/widgets/datatable/datatable-bootstrap.js"></script>
<script type="text/javascript" src="assets/widgets/datatable/datatable-responsive.js"></script>

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
    
    function remove(idx){
        
        var token2 = jQuery("#xyztoken").val();
        
            var co = confirm("Are You Sure?");
    }  

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>