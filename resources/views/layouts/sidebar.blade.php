<!-- Line Manager 1, bisa buat tiket -->
@if ( Auth::user()->grade <= 7 && Auth::user()->group != 'Group HR Development')
    @if ( Auth::user()->grade == 6 && Auth::user()->group == 'Group HR Business Partner' )
    @else
        <li class="header"><span>Overview</span></li>
        <li>
            <a href="{{ route('lm1.dashboard') }}" title="Dashboard">
                <i class="glyph-icon icon-linecons-tv"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="divider"></li>
        <li class="header"><span>New Request</span></li>

        <li>
            <a href="{{ route('ticket') }}" title="Create New Request">
                <i class="glyph-icon icon-linecons-doc"></i>
                <span>Ticket</span>
            </a>
        </li>
        <li class="divider"></li>

        <li>
            <a href="{{ route('candidate') }}" title="Candidate">
                <i class="glyph-icon icon-group"></i>
                <span>Candidate</span>
                @php
                    /* ada kandidat yg belum di proses */
                    $candidate = App\Models\CV::whereIn('approval_candidate',['0'])->count();
                    $ambil_tgl = App\Models\CV::whereIn('approval_candidate',['0'])->pluck('created_at')->first();
                    $SLA_CVFeedback = \Carbon\Carbon::parse($ambil_tgl)->addDays(2);
                @endphp
                <!-- jika udah lewat waktu sla feedback, badge 'new' hilang -->
                @if ( \Carbon\Carbon::now() > $SLA_CVFeedback )

                <!-- kandidat belum di proses -->
                @elseif ( $candidate > 0 )
                    <span class="bs-label label-success">new</span>
                @endif
            </a>
        </li>
        <li class="divider"></li>

        <li class="header"><span>Process</span></li>
        <li>
            <a href="{{ route('lm1_index.interview') }}" title="Interview Process">
                <i class="glyph-icon icon-slideshare"></i>
                <span>Interview Process</span>
            </a>    
        </li>
    @endif
@endif

<!-- HR Bussiness Partner -->
@if ( Auth::user()->group == 'Group HR Business Partner' && Auth::user()->grade <= 7 )
    <li class="header"><span>Process</span></li>

    <li>
        <a href="{{ route('hrbp.list') }}" title="Approval List">
            <i class="glyph-icon icon-linecons-note"></i>
            <span>Approval List</span>
            @php
                /*jumlah request yg belum di approve*/
                $jml = App\Models\Ticket::where([
                                            ['approval_hrbp','0'],
                                            ['user_hrbp',Auth::user()->id]
                                        ])->count();
            @endphp
            @if ( $jml > 0 )
                <span class="bs-badge badge-danger">{{ $jml }}</span>
            @else
            @endif
        </a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="{{ route('hrbp.approval.hiring') }}" title="Approval Hiring Brief">
            <i class="glyph-icon icon-check"></i>
            <span>Approval Hiring Brief</span>
            @php
                /* jumlah hiring brief yg belum di approve */
                $jml_hiring = App\Models\hiring_brief::where('approval_hiring_by_hrbp','0')->count();
            @endphp
            @if ( $jml_hiring > 0 )
                <span class="bs-badge badge-danger">{{ $jml_hiring == Null ? '' : $jml_hiring }}</span>
            @else
            @endif
        </a>
    </li>
    <li class="divider"></li>

    <li>
        <a href="#" title="Interview Process">
            <i class="glyph-icon icon-slideshare"></i>
            <span>Interview Process</span>
        </a>    
    </li>
<!-- Line manager 2/ Division Head dgn grade 7 -->
{{-- @elseif ( Auth::user()->grade == 7 && Auth::user()->group != 'Group HR Development' )
    <li class="header"><span>Process</span></li>
    <li class="divider"></li>
    <li>
        <a href="{{ route('dh.list') }}" title="Approval List">
            <i class="glyph-icon icon-linecons-note"></i>
            <span>Approval List</span>
            @php
                /*jumlah request yg belum di approve*/
                $jml = App\Models\Ticket::where([
                                            ['approval_hrbp','1'],
                                            ['approval_DH','0'],
                                            ['user_DH',Auth::user()->id]
                                        ])->count();
            @endphp
            @if ( $jml > 0 )
                <span class="bs-badge badge-danger">{{ $jml }}</span>
            @else
            @endif
        </a>
    </li>
    <li class="divider"></li> --}}
@endif

<!-- Group Head dgn grade 8 -->
@if ( Auth::user()->grade == 8 )
    <li class="header"><span>New Request</span></li>

    <li>
        <a href="{{ route('ticket') }}" title="Create New Request">
            <i class="glyph-icon icon-linecons-doc"></i>
            <span>Ticket</span>
        </a>
    </li>
    <li class="divider"></li>

    <li>
        <a href="{{ route('candidate') }}" title="Candidate">
            <i class="glyph-icon icon-group"></i>
            <span>Candidate</span>
            @php
                /* ada kandidat yg belum di proses */
                $candidate = App\Models\CV::whereIn('approval_candidate',['0'])->count();
                $ambil_tgl = App\Models\CV::whereIn('approval_candidate',['0'])->pluck('created_at')->first();
                // $a = App\Models\CV::all();
                // foreach ($a as $a) {
                //     dd($a->hiring_brief_id);
                // };

                $SLA_CVFeedback = \Carbon\Carbon::parse($ambil_tgl)->addDays(2);

                /* cek yg tiket dibuat oleh siapa, utk menghindari munculnya badge di halaman LM! yg lain */
                // $ticket_id = App\Models\Ticket::
            @endphp

            <!-- jika udah lewat waktu sla feedback, badge 'new' hilang -->
            @if ( \Carbon\Carbon::now() > $SLA_CVFeedback )

            <!-- kandidat belum di proses -->
            @elseif ( $candidate > 0 )
                <span class="bs-label label-success">new</span>
            @endif
        </a>
    </li>
    <li class="divider"></li>

    <li class="header"><span>Process</span></li>
    <li>
        <a href="{{ route('gh.list') }}" title="Approval List">
            <i class="glyph-icon icon-linecons-note"></i>
            <span>Approval List</span>
            @php
                /*jumlah request yg belum di approve*/
                $jml = App\Models\Ticket::where([
                                            ['approval_hrbp','1'],
                                            ['approval_GH','0'],
                                            ['user_GH',Auth::user()->id]
                                        ])->count();
            @endphp
            @if ( $jml > 0 )
                <span class="bs-badge badge-danger">{{ $jml }}</span>
            @else
            @endif
        </a>
    </li>
    <li class="divider"></li>
@endif

<!-- chief dgn grade 9 -->
@if ( Auth::user()->grade == 9 )
    <li class="header"><span>New Request</span></li>
    <li>
        <a href="{{ route('ticket') }}" title="Create New Request">
            <i class="glyph-icon icon-linecons-doc"></i>
            <span>Ticket</span>
        </a>
    </li>
    <li class="divider"></li>

    <li>
        <a href="{{ route('candidate') }}" title="Candidate">
            <i class="glyph-icon icon-group"></i>
            <span>Candidate</span>
            @php
                /* ada kandidat yg belum di proses */
                $candidate = App\Models\CV::whereIn('approval_candidate',['0'])->count();
                $ambil_tgl = App\Models\CV::whereIn('approval_candidate',['0'])->pluck('created_at')->first();
                $SLA_CVFeedback = \Carbon\Carbon::parse($ambil_tgl)->addDays(2);
            @endphp
            <!-- jika udah lewat waktu sla feedback, badge 'new' hilang -->
            @if ( \Carbon\Carbon::now() > $SLA_CVFeedback )

            <!-- kandidat belum di proses -->
            @elseif ( $candidate > 0 )
                <span class="bs-label label-success">new</span>
            @endif
        </a>
    </li>
    <li class="divider"></li>

    <li class="header"><span>Process</span></li>
    <li>
        <a href="{{ route('chief.list') }}" title="Approval List">
            <i class="glyph-icon icon-linecons-note"></i>
            <span>Approval List</span>
            @php
                /*jumlah request yg belum di approve*/
                $jml = App\Models\Ticket::where([
                                            ['approval_hrbp','1'],
                                            ['approval_chief','0'],
                                            ['user_chief',Auth::user()->id]
                                        ])->count();
            @endphp
            @if ( $jml > 0 )
                <span class="bs-badge badge-danger">{{ $jml }}</span>
            @else
            @endif
        </a>
    </li>
    <li class="divider"></li>
@endif

<!-- Hiring Talent -->
@if ( Auth::user()->group == 'Group HR Development' && Auth::user()->grade <= 8 )
    <li class="header"><span>Overview</span></li>
    <li>
        <a href="{{ route('hrt.dashboard') }}" title="Dashboard">
            <i class="glyph-icon icon-linecons-tv"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="" title="Applicant">
            <i class="glyph-icon icon-linecons-tv"></i>
            <span>Applicant</span>
        </a>
    </li>
    <li class="divider"></li>

    <li class="header"><span>Process</span></li>

    <li class="no-menu">
        <a href="{{ route('hiring_brief') }}" title="Hiring Brief">
            <i class="glyph-icon icon-adjust"></i>
            <span>Hiring Brief</span>
        </a>
    </li>
    <li class="divider"></li>
    <li class="no-menu">
        <a href="{{ route('sourcing') }}" title="CV & Sourcing">
            <i class="glyph-icon icon-leaf"></i>
            <span>CV & Sourcing</span>
        </a>
    </li>
    <li class="divider"></li>
    <li class="no-menu">
        <a href="{{ route('index.interview') }}" title="Interview Process">
            <i class="glyph-icon icon-slideshare"></i>
            <span>Interview Process</span>
        </a>
    </li>
    <li class="divider"></li>
    <li class="no-menu">
        <a href="" title="Frontend template">
            <i class="glyph-icon icon-tags"></i>
            <span>Final Process</span>
        </a>
    </li>
    <li class="divider"></li>

    {{-- <li class="header"><span>Configure</span></li>
    <li>
        <a href="" title="Admin Dashboard">
            <i class="glyph-icon icon-gears"></i>
            <span>SLA Setting</span>
        </a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="" title="Admin Dashboard">
            <i class="glyph-icon icon-gears"></i>
            <span>User Management</span>
        </a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="" title="Admin Dashboard">
            <i class="glyph-icon icon-gears"></i>
            <span>References</span>
        </a>
    </li>
    <li class="divider"></li> --}}
@endif