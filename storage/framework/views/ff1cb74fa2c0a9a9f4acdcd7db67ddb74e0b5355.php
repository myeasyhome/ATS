<?php $__env->startSection('title','Feedback List'); ?>

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

<script>
    /*modal candidate detail*/
    $(document).on("click",".candidate", function () {
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'GET',
            url : url,
            cache : true,
            success:function(data) {
                $("#header").html(data.name_candidate);
                $('#name_candidate').val(data.name_candidate);
                if ( data.education == 'S1' ) {
                    $('#education').val("Bachelor's degree graduate");
                } else if ( data.education == 'S2' ) {
                    $('#education').val("Master's degree graduate");
                } else if ( data.education == 'S3' ) {
                    $('#education').val("Doctoral degree graduate");
                } else if ( data.education == 'D3' ) {
                    $('#education').val("Diploma's degree graduate");
                }
                if ( data.gender == 'F' ){
                    $('#gender').val('Female');
                } else if ( data.gender == 'M' ){
                    $('#gender').val('Male');
                }
                $('#birth_place').val(data.place_birth);
                $('#birth_date').val(data.date_birth);
                $('#current_position').val(data.current_position);
                $('#current_company').val(data.current_company);
                $('#current_industry').val(data.current_industry);
                $('#work_exp').val(data.work_exp);
                $('#salary_range').val(data.salary_range);
                $('#skill').val(data.skill);

                $('#source').val(data.source);
                $('#other').hide();
                if ( data.source == 'Other' ) {
                    $('#other').show();
                    $('#other').val(data.other);
                } 

                $('#tags').val(data.tags);
                var url_cv = "<?php echo e(route('getCV',":id")); ?>";
                var url_cv = url_cv.replace(':id',data.id); /* replace id via javascript  */

                $('#download_cv').attr('href',url_cv);
            }
        })
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<ol class="breadcrumb">
    <li>
        <a href="<?php echo e(route('lm1_index.interview')); ?>">Interview Process</a>
    </li>
    <li>
        <span><em>Feedback List <?php echo e($interview[0]->CV->hiring_briefs->tickets->position_name); ?></em></span>
    </li>
</ol>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-body">
            <div class="title-hero">
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>Feedback List For <code><?php echo e($interview[0]->CV->hiring_briefs->tickets->position_name); ?></code></strong></h4> 
                    </div>
                </div>
            </div>

            <!-- notif -->
            <?php if(session('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong><?php echo e(session('error')); ?></strong>
                </div>
            <?php elseif(session('success')): ?>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong><?php echo e(session('success')); ?></strong>
                </div>
            <?php endif; ?>

                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center col-md-2">Candidate Name</th>
                            <th class="text-center col-md-1">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $interview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="#candidate_detail" data-toggle="modal" class="candidate" data-url="<?php echo e(route('candidate_detail',$interview->CV->id)); ?>">
                                        <?php echo e($interview->CV->name_candidate); ?>

                                    </a></td>
                                <td class="text-center">
                                    <!-- done interview -->
                                    <?php if(isset($interview->interview_finish)): ?>
                                        <?php if(isset($interview->Interview_feedback)): ?>
                                            sudah kasih feedback
                                        <?php else: ?>
                                            <a href="<?php echo e(route('form_interviewFeedback',['id' => $interview->id, 'position' => str_slug($interview->CV->hiring_briefs->tickets->position_name,'-')])); ?>" class="btn btn-hover btn-xs bs-label label-yellow">
                                                <span><strong>need interview feedback</strong></span>
                                                <i class="glyph-icon icon-arrow-right"></i>
                                            </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('lm1_interview_finish',$interview->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                            <button class="bs-label label-success" type="submit">
                                                <strong>done interview</strong>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Modal Candidate Detail -->
<?php $__env->startComponent('Component.candidate_detail'); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>