<?php $__env->startSection('title','Interview Process'); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable-bootstrap.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable-responsive.js')); ?>"></script>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-body">
            <div class="title-hero">
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>Interview process</strong></h4> 
                    </div>              
                </div>
            </div>
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center col-md-2">Position Name</th>
                            <th class="text-center col-md-1">Candidate List</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $cv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($cv->hiring_briefs->tickets->position_name); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('candidate_list.interview',$cv->hiring_brief_id)); ?>" type="button" class="btn btn-hover btn-xs bs-label label-info">
                                        <span>
                                            <?php
                                                $total_kandidat = $cv->where([
                                                                        ['hiring_brief_id',$cv->hiring_briefs->id],
                                                                        ['approval_candidate','1']
                                                                    ])->count();
                                            ?>
                                            <strong><?php echo e($total_kandidat); ?> <?php echo e($total_kandidat == 1 ? 'Candidate' : 'Candidates'); ?></strong>
                                        </span>
                                        <i class="glyph-icon icon-arrow-right"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>