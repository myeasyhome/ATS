@extends('layouts.default')
@section('title','Candidate List')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/FullCalendar/FullCalendar.css') }}">
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable-bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable-responsive.js') }}"></script>

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


<script src="{{ asset('assets/select2/select2.js') }}"></script>
<script>
    /* Dropdown select 2 */
    $(document).ready(function() {
        $( ".interview_user" ).select2( {
            placeholder: "Select Interview User",
            theme: "bootstrap",
        });
    });
</script>
<!-- bootstrap datepicker -->
<script>
    $(function() { 
        $('.date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose : true,
            todayHighlight : true,
            startDate: new Date()
        });
    });
</script>

<script src="{{ asset('assets/widgets/timepicker/timepicker.js') }}"></script>
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
                var url_cv = "{{ route('getCV',":id") }}";
                var url_cv = url_cv.replace(':id',data.id); /* replace id via javascript  */

                $('#download_cv').attr('href',url_cv);
            }
        })
    });

</script>

<script src="{{ asset('assets/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/FullCalendar/FullCalendar.min.js') }}"></script>
{{-- {!! $calendar->script() !!} --}}
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
            // events: 'https://fullcalendar.io/demo-events.json?overload-day',
            events : [
                @foreach($test as $cal)
                    {
                        title : '{{ $cal->interview_title }}',
                        interview_date : '{{ $cal->interview_date }}',
                        start : '{{ $cal->interview_date.' '.$cal->time_start }}',
                        end : '{{ $cal->interview_date.' '.$cal->time_end }}',
                        location : '{{ ucwords($cal->location) }}',
                        interview_user : '{{ $cal->interview_user }}',
                        candidate_name : '{{ $cal->CV->name_candidate }}'
                    },
                @endforeach
            ],
            eventClick: function (event, modal) {
                $('#modal_calendar').modal();
                $('#modal_title').html(event.title);
                // \Carbon\Carbon::parse($req->interview_date)->format('l, jS F Y')
                $('#modal_date').html(moment(event.interview_date).format('dddd, l'));
                $('#time_start').html(moment(event.start).format('hh:mm a'));
                $('#time_end').html(moment(event.end).format('hh:mm a'));
                $('#interview_user').html(event.interview_user);
                $('#candidate_name').html(event.candidate_name);
                $('#location').html(event.location);
            }
            // eventRender: function(event,el) {
            //     /* isi konten di dalam element */
            //     el.popover({
            //         title: event.title,
            //         html : true,
            //         content: 'Date : '+ new Date(event.interview_date).toDateString() + '<br>Time Start : ' + moment(event.start).format('hh:mm:ss a') + '<br>Time End : ' + moment(event.end).format('hh:mm:ss a') + '<br><br> Interviewer User : '+ event.interview_user +'<br>Candidate Name : '+ event.candidate_name +'<br><br> Location : ' +event.location,
            //         trigger: 'hover',
            //         placement: 'top',
            //         // container: 'body'
            //     });
            // }
        });

    });
</script>
@stop

@section('content')
<ol class="breadcrumb">
    <li>
        <a href="{{ route('index.interview') }}">Interview Process</a>
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
                    <strong>Candidate List For <code><em>{{ $cv[0]->hiring_briefs->tickets->position_name }}</em></code></strong>
                </h4> 

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

                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Candidate List</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cv as $cv)
                            <tr>
                                <td>
                                    <a href="#candidate_detail" data-toggle="modal" class="candidate" data-url="{{ route('candidate_detail',$cv->id) }}">
                                        {{ $cv->name_candidate }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    @isset ($cv->interview)
                                        <span class="bs-label btn-border border-green font-green"><strong>already scheduled</strong></span>
                                    @else
                                        <a href="#" class="btn btn-hover btn-xs bs-label label-info" 
                                        data-nama="{{ $cv->name_candidate }}"
                                        data-id="{{ $cv->id }}"
                                        data-title="{{ $cv->hiring_briefs->tickets->position_name }}"
                                        id="btn_arrange">
                                            <span><strong>arrange interview</strong>
                                            </span>
                                            <i class="glyph-icon icon-arrow-right"></i>
                                        </a>
                                    @endisset
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="col-md-6" id="invitation">
        <div class="panel">
            <div class="panel-body">

                <form class="form-horizontal" action="{{ route('invitation.interview') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <input type="hidden" name="cv_id" id="cv_id" value="">
                    <input type="hidden" name="interview_title" id="interview_title" value="">

                    <h2 class="title-hero"><strong><em id="invite_nama"></em></strong></h2>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Interviewer User <i style="color: red">*</i></label>
                        <div class="col-md-7">
                            {{-- <input type="text" class="form-control" id="interviewer_user" name="interviewer_user" placeholder="Input Interviewer User" title="Input Interviewer User" required> --}}
                            <select class="form-control interview_user" multiple="multiple" name="interview_user[]" style="width: 100%" placeholder="Select Interview User" required>
                                @foreach ($interview_user as $val)
                                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                                @endforeach
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

                <div id='calendar' data-url="{{ route('candidate_list.interview',$id) }}"></div>
                {{-- {!! $calendar->calendar() !!}
                {!! $calendar->script() !!} --}}
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
@component('Component.candidate_detail')
@endcomponent
@endsection