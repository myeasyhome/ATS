<?php $__env->startSection('title','Form Feedback Interview'); ?>

<?php $__env->startSection('js'); ?>


<script type="text/javascript">
    /* Jquery Validate */
    $(document).ready(function() {
        $('#form_feedback').validate();
    });

    /* tambah dinamis technical comptencies */
    var i = 1;
    $(document).on('click', '#add_technical', function(){
        i++;
        $('#table_technical_compentencies').append('<tr id="row'+i+'"><td><textarea class="form-control" name="technical[]"></textarea></td><td><select class="form-control tech-point" name="technical_point[]" id="techpoint'+i+'"><option value="">-</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td><td><button type="button" id="'+i+'" class="btn btn-danger btn_remove_technical">X</button></td></tr>');
    });
    /*btn remove technical*/
    $(document).on('click', '.btn_remove_technical', function(){  
       var button_id = $(this).attr("id");
       $('tr#row'+button_id+'').remove();  
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<ol class="breadcrumb">
    <li>
        <a href="<?php echo e(route('lm1_index.interview')); ?>">Interview Process</a>
    </li>
    <li>
        <a href="<?php echo e(route('lm1_feedback_list.interview',['id'=>App\Models\Interview::findOrFail($id)->CV->hiring_briefs->id, 'position'=>str_slug(App\Models\Interview::findOrFail($id)->CV->hiring_briefs->tickets->position_name,'-')])); ?>">Feedback List <?php echo e(App\Models\Interview::findOrFail($id)->CV->hiring_briefs->tickets->position_name); ?></a>
    </li>
    <li>
        <span><em>Form Interview Feedback</em></span>
    </li>
</ol>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-body">
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
                
                <h2 class="title-hero text-center" style="font-size: 30px"><code><strong>form interview feedback</code></strong>
                </h2><br>
                <div class="row">
                    <div class="col-md-12">
                    <table>
                        <tbody>
                            <tr>
                                <th>Applicant's Name <span style="padding-left: 10px;padding-right: 20px">:</span> <?php echo e(App\Models\Interview::findOrFail($id)->CV->name_candidate); ?></th>
                            </tr>
                            <tr>
                                <th>Interview Date <span style="padding-left: 10px;padding-right: 20px">:</span> <?php echo e(\Carbon\Carbon::parse(App\Models\Interview::findOrFail($id)->interview_date)->format('d-m-Y')); ?></th>
                            </tr>
                            <tr>
                                <th>Time <span style="padding-left: 10px;padding-right: 20px">:</span> <?php echo e(App\Models\Interview::findOrFail($id)->time_start); ?> - <?php echo e(App\Models\Interview::findOrFail($id)->time_end); ?></th>
                            </tr>
                        </tbody>
                    </table>    
                    </div>
                </div>
                <br>
                
                <form action="<?php echo e(route('save_feedback')); ?>" method="post" id="form_feedback">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="interview_id" value="<?php echo e($id); ?>">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th class="text-center col-md-4" style="padding-bottom: 15px;
                                                                        padding-top: 15px;
                                                                        padding-left: 15px;
                                                                        padding-right: 15px;">
                                Compentencies/Skill</th>
                                <th class="text-center">Comments <br><i>[ <i style="">S</i>: Sit., <i style="">B</i>: Behavior, <i style="">I</i>: Impact ]</i></th>
                                <th class="text-center col-md-1" style="padding-bottom: 15px;
                                                                        padding-top: 15px;
                                                                        padding-left: 15px;
                                                                        padding-right: 15px;">
                                Point</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php $point = 6; ?>
                            <tr>
                                <td>
                                    <h4>Professional Experience / Exposures</h4><br><i style="color: #1f2fe4">- Please share with us your current / latest role, how is your current org? What is you major accountability ? <br><br>- Please share wtih us your most significant achievement, and why?</i>
                                </td>
                                <td><textarea name="comment[]" class="form-control" style="width: 100%; height: 200px"></textarea></td>
                                <td class="text-center">
                                    <select class="form-control" name="point1" required>
                                    <option value="">-</option>
                                        <?php for($i = 1; $i < $point; $i++): ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Grow the Business</h4><br><i style="color: #1f2fe4">- Describe the most difficult decision that you had taken till date.What made it so difficult<br><br>- Describe how you establish a partnership with an internal or exteral customer to help you both achieve your strat. busines goals?<br><br>- What company plans have you developed? How did you reach them</i>
                                </td>
                                <td><textarea name="comment[]" class="form-control" style="width: 100%; height: 200px"></textarea></td>
                                <td class="text-center">
                                    <select class="form-control" name="point2" required>
                                    <option value="">-</option>
                                        <?php for($i = 1; $i < $point; $i++): ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Lead People</h4><br><i style="color: #1f2fe4">- What tactics do you use to motivate others to complete delegated taskes? Kindly describe the specific situations<br><br>- Give me an example of feedback and assistance you provided about failed performance ? What-How did you do?</i>
                                </td>
                                <td><textarea name="comment[]" class="form-control" style="width: 100%; height: 200px"></textarea></td>
                                <td class="text-center">
                                    <select class="form-control" name="point3" required>
                                    <option value="">-</option>
                                        <?php for($i = 1; $i < $point; $i++): ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Develop Yourself</h4><br><i style="color: #1f2fe4">- How do you use failure as a learning opportunity? Tell me one of yours<br><br>- Tell me about a time when you disagree with an idea your coworker or superior, how did you approacht the disagreement?</i>
                                </td>
                                <td><textarea name="comment[]" class="form-control" style="width: 100%; height: 200px"></textarea></td>
                                <td class="text-center">
                                    <select class="form-control" name="point4" required>
                                    <option value="">-</option>
                                        <?php for($i = 1; $i < $point; $i++): ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Motivational Fit</h4><br><i style="color: #1f2fe4">- Tell me when you have been most satisfied & least satisfied in your career</i>
                                </td>
                                <td><textarea name="comment[]" class="form-control" style="width: 100%; height: 200px"></textarea></td>
                                <td class="text-center">
                                    <select class="form-control" name="point5" required>
                                    <option value="">-</option>
                                        <?php for($i = 1; $i < $point; $i++): ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <br>
                    <div class="row">
                        <div class="col-md-7">
                            <table class="table table-striped table-bordered table-condensed" id="table_technical_compentencies">
                                <thead>
                                    <tr>
                                        <th class="text-center">Technical Competencies</th>
                                        <th class="text-center col-md-2">Point</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <textarea class="form-control" name="technical[]"></textarea>
                                        </td>
                                        <td>
                                            <select class="form-control tech-point" name="technical_point[]" id="techpoint1">
                                                <option value="">-</option>
                                                <?php for($i = 1; $i < $point; $i++): ?>
                                                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="button" id="add_technical" class="btn btn-primary">+</button>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Notes : </label>
                                <textarea class="form-control" name="notes" style="height: 140px"></textarea>
                            </div>
                        </div>                    
                    </div>

                    <div class="text-center">
                        <input class="btn btn-info" type="submit" value="Submit" id="submit">
                    </div>
                
                </form>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>