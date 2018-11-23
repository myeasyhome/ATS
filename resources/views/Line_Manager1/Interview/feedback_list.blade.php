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
@stop

@section('content')
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
                                <td>{{ $interview->CV->name_candidate }}</td>
                                <td class="text-center">
                                    <!-- done interview -->
                                    @isset ($interview->interview_finish)
                                        <a href=""></a>
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
@endsection