<?php $__env->startSection('title','Candidate List'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/FullCalendar/FullCalendar.css')); ?>">
<?php $__env->stopSection(); ?>

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


<script src="<?php echo e(asset('assets/select2/select2.js')); ?>"></script>
<script>
    /* Dropdown select 2 */
    $(document).ready(function() {
        $( ".interview_user" ).select2({
            placeholder: "Select Interview User",
            theme: "bootstrap",
        });
        $('.select2-search__field').css('width', '100%');
    });
</script>
<!-- bootstrap datepicker -->
<script>
    $(function() { 
        $('.date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose : true,
            todayHighlight : true,
            startDate: new Date(),
            orientation: 'auto bottom'
        });
    });
</script>

<script src="<?php echo e(asset('assets/widgets/timepicker/timepicker.js')); ?>"></script>
<script type="text/javascript">
    /* Timepicker */
    $(function() {
        $('.timepicker').timepicker({
            autoClose : true
        });
    });
</script>

<script>
    /* invitation */
    $('#invitation').hide();

    /* btn arrange, merubah nama invite ke kandidat siapa dan form actionnya*/
    $(document).on('click','#btn_arrange', function() {
        $('#invitation').show();
        var nama = "invitation for "+$(this).data('nama');
        /* ganti nama di html */
        document.getElementById("invite_nama").innerHTML = nama;

        /* ganti value id di input type hidden */
        $('#cv_id').val($(this).data('id'));
        $('#interview_title').val('Interview Session For '+$(this).data('title'));
    });

    /*modal candidate detail*/
    $(document).on("click",".candidate", function () {
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'GET',
            url : url,
            cache : true,
            success:function(data) {
                console.log(data);
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

                var url_cv = "<?php echo e(route('getCV',":id")); ?>";
                var url_cv = url_cv.replace(':id',data.id); /* replace id via javascript  */

                $('#download_cv').attr('href',url_cv);

                // if ( data.interview == null ) {
                //     $('#interview').html('This Candidate Has Not Been Interviewed');
                // } else {
                    
                // }
            }
        })
    });

</script>

<script src="<?php echo e(asset('assets/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/FullCalendar/FullCalendar.min.js')); ?>"></script>
<script>
    /* calendar */
    $(function() {
    var url = $('#calendar').data('url');
        $('#calendar').fullCalendar({
            header: {
                left: 'today',
                center: 'prev title next',
                // right: 'month,agendaWeek,agendaDay,listWeek'
                right: 'month,listWeek'
            },
            buttonText: {
                today: 'Today',
                month: 'Month',
                list: 'List'
            },
            editable: false,
            weekends: false, // will hide Saturdays and Sundays
            eventLimit: true, // allow "more" link when too many events
            events : [
                <?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    {
                        title : '<?php echo e($ev->interview_title); ?>',
                        interview_date : '<?php echo e($ev->interview_date); ?>',
                        start : '<?php echo e($ev->interview_date.' '.$ev->time_start); ?>',
                        end : '<?php echo e($ev->interview_date.' '.$ev->time_end); ?>',
                        location : '<?php echo e(ucwords($ev->location)); ?>',
                        interview_user : '<?php echo e($ev->interview_user); ?>',
                        candidate_name : '<?php echo e($ev->CV->name_candidate); ?>'
                    },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            eventClick: function (event, modal) {
                $('#modal_calendar').modal();
                $('#modal_title').html(event.title);
                $('#modal_date').html(moment(event.interview_date).format('dddd, l'));
                $('#time_start').html(moment(event.start).format('hh:mm a'));
                $('#time_end').html(moment(event.end).format('hh:mm a'));
                $('#interview_user').html(event.interview_user);
                $('#candidate_name').html(event.candidate_name);
                $('#location').html(event.location);
            }
        });

    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<ol class="breadcrumb">
    <li>
        <a href="<?php echo e(route('index.interview')); ?>">Interview Process</a>
    </li>
    <li>
        <span><em>Candidate List</em></span>
    </li>
</ol>

<div class="row">
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-body">
                <h4 class="title-hero">
                    <strong>Candidate List For <code><em><?php echo e($cv[0]->hiring_briefs->tickets->position_name); ?></em></code></strong>
                </h4> 

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
                            <th class="text-center">Candidate List</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $cv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="#candidate_detail" data-toggle="modal" class="candidate" data-url="<?php echo e(route('candidate_detail',$cv->id)); ?>">
                                        <?php echo e($cv->name_candidate); ?>

                                    </a>
                                </td>
                                <td class="text-center">
                                    <?php if(isset($cv->interview)): ?>
                                        <span class="bs-label btn-border border-green font-green"><strong>already scheduled</strong></span>
                                    <?php else: ?>
                                        <a href="#" class="btn btn-hover btn-xs bs-label label-info" 
                                        data-nama="<?php echo e($cv->name_candidate); ?>"
                                        data-id="<?php echo e($cv->id); ?>"
                                        data-title="<?php echo e($cv->hiring_briefs->tickets->position_name); ?>"
                                        id="btn_arrange">
                                            <span><strong>arrange interview</strong>
                                            </span>
                                            <i class="glyph-icon icon-arrow-right"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="col-md-6" id="invitation">
        <div class="panel">
            <div class="panel-body">

                <form class="form-horizontal" action="<?php echo e(route('invitation.interview')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                    <input type="hidden" name="cv_id" id="cv_id" value="">
                    <input type="hidden" name="interview_title" id="interview_title" value="">

                    <h2 class="title-hero"><strong><em id="invite_nama"></em></strong></h2>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Interview User <i style="color: red">*</i></label>
                        <div class="col-md-7">
                            <select class="form-control interview_user" multiple="multiple" name="interview_user[]" style="width: 100%" required>
                                <?php $__currentLoopData = $interview_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($val->id); ?>"><?php echo e($val->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Date <i style="color: red">*</i></label>
                        <div class="col-md-7">
                            <div class="input-group date">
                                <span class="add-on input-group-addon">
                                    <i class="glyph-icon icon-calendar"></i>
                                </span> 
                                <input type="text" name="interview_date" id="interview_date" class="form-control" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Time Start <i style="color: red">*</i></label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="add-on input-group-addon">
                                    <i class="glyph-icon icon-clock-o"></i>
                                </span>
                                <input class="timepicker form-control" type="text" name="time_start" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Time End <i style="color: red">*</i></label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="add-on input-group-addon">
                                    <i class="glyph-icon icon-clock-o"></i>
                                </span>
                                <input class="timepicker form-control" type="text" name="time_end" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Location <i style="color: red">*</i></label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="location" placeholder="Input Interview Location" required>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button class="btn btn-info mrg10T" type="submit" id="submit_interview">Arrange Interview</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4 class="title-hero">
                    <strong>Calendar</strong>
                </h4>

                <div id='calendar' data-url="<?php echo e(route('candidate_list.interview',$id)); ?>"></div>
                
            </div>
        </div>
    </div>
</div>

<!-- Modal Event popup fullcalendar -->
<div class="modal fade" tabindex="1" id="modal_calendar" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="modal_title"></h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-4 control-label">Date</label>
                        <div class="col-md-7">
                            <p class="control-label pull-left" id="modal_date"></p>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Time Start</label>
                        <div class="col-md-7">
                            <p class="control-label pull-left" id="time_start"></p>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Time End</label>
                        <div class="col-md-7">
                            <p class="control-label pull-left" id="time_end"></p>
                        </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label class="col-md-4 control-label">Interviewer User</label>
                        <div class="col-md-7">
                            <p class="control-label pull-left" id="interview_user"></p>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Candidate Name</label>
                        <div class="col-md-7">
                            <p class="control-label pull-left" id="candidate_name"></p>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Location</label>
                        <div class="col-md-7">
                            <p class="control-label pull-left" id="location"></p>
                        </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Candidate Detail -->
<?php $__env->startComponent('Component.candidate_detail'); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>