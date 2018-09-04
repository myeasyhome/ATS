@extends('layouts.default')
@section('title','Need Approval List')

@section('js')

<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable-bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/widgets/datatable/datatable-responsive.js') }}"></script>

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

</script>

<script type="text/javascript">
    /* Modal Reject */
    $(document).ready(function (e) {
        $(document).on("click", ".btn_modal_reject", function (e) {
            var url = $(this).attr('data-url'); 
            $('#form_modal_reject').attr('action',url);
        });
    });

    /* Modal Approved */
    $(document).ready(function (e) {
        $(document).on("click", ".btn_modal_approved", function (e) {
            var url = $(this).attr('data-url'); 
            $('#form_modal_approved').attr('action',url);
        });
    });

</script>

@stop

@section('content')
<div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
            Need Approval List
        </h3>
        <div class="example-box-wrapper">
            <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap dataTable collapsed dtr-inline" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Position Name</th>
                        {{-- <th>JD File</th> --}}
                        <th>Date</th>
                        <th>Option</th>
                    </tr>
                </thead>

                <tbody>
                    @php $no=1; @endphp
                    @forelse($ticket as $ticket)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $ticket->position_name }}</td>
                        {{-- <td><a href="" style="color: #0066cc; text-decoration: underline;">Download JD File</a></td> --}}
                        <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y') }}</td>
                        <td>
                            <a href="#modal_approval" type="button" data-url="{{ route('approved.ticket',$ticket->id) }}" data-toggle="modal" class="btn btn-round btn-success btn_modal_approved" title="Approved">
                                <span class="glyph-icon icon-check"></span>
                            </a>
                            &nbsp;
                            <a href="#modal_reject" type="button" data-url="{{ route('reject.ticket',$ticket->id) }}" data-toggle="modal" class="btn btn-round btn-danger btn_modal_reject" title="Reject">
                                <span class="glyph-icon icon-remove"></span>
                            </a>
                            &nbsp;
                            <a href="{{ route('detail.ticket',$ticket->id) }}" type="button" data-toggle="modal" class="btn btn-round btn-info" title="Detail">
                                <span class="glyph-icon icon-eye"></span>
                            </a>
                        </td>
                    </tr>
                    @empty
                        <td valign="top" colspan="4" class="dataTables_empty">No data available in table</td>
                        <td id="hidden"></td>
                        <td id="hidden"></td>
                        <td id="hidden"></td>
                        {{-- <td id="hidden"></td> --}}
                    @endforelse
                    
                </tbody>

            </table>
        </div>
    </div>
</div>

<!-- Modal approval -->
<div class="modal fade" tabindex="1" id="modal_approval" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Approval Status</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_approved">
            @csrf
            @method('PATCH')
                <div class="modal-body">
                    <p class="text-center"><strong>Are you sure to Approve this position ?</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Approved</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal reject -->
<div class="modal fade" tabindex="1" id="modal_reject" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Approval Status</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_reject">
            @csrf
            @method('PATCH')
                <div class="modal-body">
                    {{-- <p class="text-center"><strong>Are you sure to Reject this position ?</strong></p> --}}
                    <div class="form-group">
                        <label for="position_name" class="col-sm-2 control-label">Reason</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" cols="51" rows="12" name="reason_for_rejection" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" tabindex="1" id="modal_detail" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="modal_title"></h4>
            </div>
            {{-- <form role="form" method="post" class="form-horizontal" id="form_modal_reject"> --}}
                <div class="modal-body body_content">
                    <div id="modal_content">
                        <h3>ERF</h3>
                        <section id="detail_modal_erf">
                            <p>pke</p>
                        </section>

                        <h3>JD</h3>
                        <section id="detail_modal_jd">
                            <p>JD</p>
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    {{-- <button type="submit" class="btn btn-danger">Reject</button> --}}
                </div>
            {{-- </form> --}}
        </div>
    </div>
</div>

@endsection
