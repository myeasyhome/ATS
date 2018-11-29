@extends('layouts.default')
@section('title','Feedback List')

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
                var url_cv = "{{ route('getCV',":id") }}";
                var url_cv = url_cv.replace(':id',data.id); /* replace id via javascript  */

                $('#download_cv').attr('href',url_cv);
            }
        })
    });
</script>
@stop

@section('content')
<ol class="breadcrumb">
    <li>
        <a href="{{ route('lm1_index.interview') }}">Interview Process</a>
    </li>
    <li>
        <span><em>Feedback List {{ $interview[0]->CV->hiring_briefs->tickets->position_name }}</em></span>
    </li>
</ol>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-body">
            <div class="title-hero">
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>Feedback List For <code>{{ $interview[0]->CV->hiring_briefs->tickets->position_name }}</code></strong></h4> 
                    </div>
                </div>
            </div>

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
                            <th class="text-center col-md-2">Candidate Name</th>
                            <th class="text-center col-md-1">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($interview as $interview)
                            <tr>
                                <td><a href="#candidate_detail" data-toggle="modal" class="candidate" data-url="{{ route('candidate_detail',$interview->CV->id) }}">
                                        {{ $interview->CV->name_candidate }}
                                    </a></td>
                                <td class="text-center">
                                    <!-- done interview -->
                                    @isset ($interview->interview_finish)
                                        @isset($interview->Interview_feedback)
                                            sudah kasih feedback
                                        @else
                                            <a href="{{ route('form_interviewFeedback',['id' => $interview->id, 'position' => str_slug($interview->CV->hiring_briefs->tickets->position_name,'-')]) }}" class="btn btn-hover btn-xs bs-label label-yellow">
                                                <span><strong>need interview feedback</strong></span>
                                                <i class="glyph-icon icon-arrow-right"></i>
                                            </a>
                                        @endisset
                                    @else
                                        <form action="{{ route('lm1_interview_finish',$interview->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                            <button class="bs-label label-success" type="submit">
                                                <strong>done interview</strong>
                                            </button>
                                        </form>
                                    @endisset
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Modal Candidate Detail -->
@component('Component.candidate_detail')
@endcomponent
@endsection