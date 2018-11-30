@extends('layouts.default')
@section('title','Interview Process')

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
@stop

@section('content')
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
                        @foreach ($cv as $cv)
                            <tr>
                                <td>{{ $cv->hiring_briefs->tickets->position_name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('candidate_list.interview',$cv->hiring_brief_id) }}" type="button" class="btn btn-hover btn-xs bs-label label-info">
                                        <span>
                                            @php
                                                $total_kandidat = $cv->where([
                                                                        ['hiring_brief_id',$cv->hiring_briefs->id],
                                                                        ['approval_candidate','1']
                                                                    ])->count();
                                            @endphp
                                            <strong>{{ $total_kandidat }} {{ $total_kandidat == 1 ? 'Candidate' : 'Candidates' }}</strong>
                                        </span>
                                        <i class="glyph-icon icon-arrow-right"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection