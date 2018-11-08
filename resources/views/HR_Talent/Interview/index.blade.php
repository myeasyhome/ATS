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
                            <th class="col-md-1">No.</th>
                            <th class="text-center">Position Name</th>
                            <th class="text-center">Candidate List</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php 
                            $no=1;
                        @endphp
                        @forelse ($cv as $cv)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $cv->hiring_briefs->tickets->position_name }}</td>
                                <td class="text-center">
                                    <a href="" type="button" class="bs-label label-info"><span><strong>{{ $cv->where('approval_candidate','1')->count() }} Candidate</strong></span></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td valign="top" colspan="3" class="dataTables_empty">No data available in table</td>
                                <td id="hidden"></td>
                                <td id="hidden"></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection