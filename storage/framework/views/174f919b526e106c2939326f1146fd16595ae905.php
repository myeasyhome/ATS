<!-- Line Manager 1, bisa buat tiket -->
<?php if( Auth::user()->grade <= 7 && Auth::user()->group != 'Group HR Development'): ?>
    <?php if( Auth::user()->grade == 6 && Auth::user()->group == 'Group HR Business Partner' ): ?>
    <?php else: ?>
        <li class="header"><span>Overview</span></li>
        <li>
            <a href="<?php echo e(route('lm1.dashboard')); ?>" title="Dashboard">
                <i class="glyph-icon icon-linecons-tv"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="divider"></li>
        <li class="header"><span>New Request</span></li>

        <li>
            <a href="<?php echo e(route('ticket')); ?>" title="Create New Request">
                <i class="glyph-icon icon-linecons-doc"></i>
                <span>Ticket</span>
            </a>
        </li>
        <li class="divider"></li>

        <li>
            <a href="<?php echo e(route('candidate')); ?>" title="Candidate">
                <i class="glyph-icon icon-group"></i>
                <span>Candidate</span>
                <?php
                    /* ada kandidat yg belum di proses */
                    $candidate = App\Models\CV::whereIn('approval_candidate',['0'])->count();
                    $ambil_tgl = App\Models\CV::whereIn('approval_candidate',['0'])->pluck('created_at')->first();
                    $SLA_CVFeedback = \Carbon\Carbon::parse($ambil_tgl)->addDays(2);
                ?>
                <!-- jika udah lewat waktu sla feedback, badge 'new' hilang -->
                <?php if( \Carbon\Carbon::now() > $SLA_CVFeedback ): ?>

                <!-- kandidat belum di proses -->
                <?php elseif( $candidate > 0 ): ?>
                    <span class="bs-label label-success">new</span>
                <?php endif; ?>
            </a>
        </li>
        <li class="divider"></li>

        <li class="header"><span>Process</span></li>
        <li>
            <a href="<?php echo e(route('lm1_index.interview')); ?>" title="Interview Process">
                <i class="glyph-icon icon-slideshare"></i>
                <span>Interview Process</span>
            </a>    
        </li>
    <?php endif; ?>
<?php endif; ?>

<!-- HR Bussiness Partner -->
<?php if( Auth::user()->group == 'Group HR Business Partner' && Auth::user()->grade <= 7 ): ?>
    <li class="header"><span>Process</span></li>

    <li>
        <a href="<?php echo e(route('hrbp.list')); ?>" title="Approval List">
            <i class="glyph-icon icon-linecons-note"></i>
            <span>Approval List</span>
            <?php
                /*jumlah request yg belum di approve*/
                $jml = App\Models\Ticket::where([
                                            ['approval_hrbp','0'],
                                            ['user_hrbp',Auth::user()->id]
                                        ])->count();
            ?>
            <?php if( $jml > 0 ): ?>
                <span class="bs-badge badge-danger"><?php echo e($jml); ?></span>
            <?php else: ?>
            <?php endif; ?>
        </a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="<?php echo e(route('hrbp.approval.hiring')); ?>" title="Approval Hiring Brief">
            <i class="glyph-icon icon-check"></i>
            <span>Approval Hiring Brief</span>
            <?php
                /* jumlah hiring brief yg belum di approve */
                $jml_hiring = App\Models\hiring_brief::where('approval_hiring_by_hrbp','0')->count();
            ?>
            <?php if( $jml_hiring > 0 ): ?>
                <span class="bs-badge badge-danger"><?php echo e($jml_hiring == Null ? '' : $jml_hiring); ?></span>
            <?php else: ?>
            <?php endif; ?>
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

<?php endif; ?>

<!-- Group Head dgn grade 8 -->
<?php if( Auth::user()->grade == 8 ): ?>
    <li class="header"><span>New Request</span></li>

    <li>
        <a href="<?php echo e(route('ticket')); ?>" title="Create New Request">
            <i class="glyph-icon icon-linecons-doc"></i>
            <span>Ticket</span>
        </a>
    </li>
    <li class="divider"></li>

    <li>
        <a href="<?php echo e(route('candidate')); ?>" title="Candidate">
            <i class="glyph-icon icon-group"></i>
            <span>Candidate</span>
            <?php
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
            ?>

            <!-- jika udah lewat waktu sla feedback, badge 'new' hilang -->
            <?php if( \Carbon\Carbon::now() > $SLA_CVFeedback ): ?>

            <!-- kandidat belum di proses -->
            <?php elseif( $candidate > 0 ): ?>
                <span class="bs-label label-success">new</span>
            <?php endif; ?>
        </a>
    </li>
    <li class="divider"></li>

    <li class="header"><span>Process</span></li>
    <li>
        <a href="<?php echo e(route('gh.list')); ?>" title="Approval List">
            <i class="glyph-icon icon-linecons-note"></i>
            <span>Approval List</span>
            <?php
                /*jumlah request yg belum di approve*/
                $jml = App\Models\Ticket::where([
                                            ['approval_hrbp','1'],
                                            ['approval_GH','0'],
                                            ['user_GH',Auth::user()->id]
                                        ])->count();
            ?>
            <?php if( $jml > 0 ): ?>
                <span class="bs-badge badge-danger"><?php echo e($jml); ?></span>
            <?php else: ?>
            <?php endif; ?>
        </a>
    </li>
    <li class="divider"></li>
<?php endif; ?>

<!-- chief dgn grade 9 -->
<?php if( Auth::user()->grade == 9 ): ?>
    <li class="header"><span>New Request</span></li>
    <li>
        <a href="<?php echo e(route('ticket')); ?>" title="Create New Request">
            <i class="glyph-icon icon-linecons-doc"></i>
            <span>Ticket</span>
        </a>
    </li>
    <li class="divider"></li>

    <li>
        <a href="<?php echo e(route('candidate')); ?>" title="Candidate">
            <i class="glyph-icon icon-group"></i>
            <span>Candidate</span>
            <?php
                /* ada kandidat yg belum di proses */
                $candidate = App\Models\CV::whereIn('approval_candidate',['0'])->count();
                $ambil_tgl = App\Models\CV::whereIn('approval_candidate',['0'])->pluck('created_at')->first();
                $SLA_CVFeedback = \Carbon\Carbon::parse($ambil_tgl)->addDays(2);
            ?>
            <!-- jika udah lewat waktu sla feedback, badge 'new' hilang -->
            <?php if( \Carbon\Carbon::now() > $SLA_CVFeedback ): ?>

            <!-- kandidat belum di proses -->
            <?php elseif( $candidate > 0 ): ?>
                <span class="bs-label label-success">new</span>
            <?php endif; ?>
        </a>
    </li>
    <li class="divider"></li>

    <li class="header"><span>Process</span></li>
    <li>
        <a href="<?php echo e(route('chief.list')); ?>" title="Approval List">
            <i class="glyph-icon icon-linecons-note"></i>
            <span>Approval List</span>
            <?php
                /*jumlah request yg belum di approve*/
                $jml = App\Models\Ticket::where([
                                            ['approval_hrbp','1'],
                                            ['approval_chief','0'],
                                            ['user_chief',Auth::user()->id]
                                        ])->count();
            ?>
            <?php if( $jml > 0 ): ?>
                <span class="bs-badge badge-danger"><?php echo e($jml); ?></span>
            <?php else: ?>
            <?php endif; ?>
        </a>
    </li>
    <li class="divider"></li>
<?php endif; ?>

<!-- Hiring Talent -->
<?php if( Auth::user()->group == 'Group HR Development' && Auth::user()->grade <= 8 ): ?>
    <li class="header"><span>Overview</span></li>
    <li>
        <a href="<?php echo e(route('hrt.dashboard')); ?>" title="Dashboard" >
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
        <a href="<?php echo e(route('hiring_brief')); ?>" title="Hiring Brief">
            <i class="glyph-icon icon-adjust"></i>
            <span>Hiring Brief</span>
        </a>
    </li>
    <li class="divider"></li>
    <li class="no-menu">
        <a href="<?php echo e(route('sourcing')); ?>" title="CV & Sourcing">
            <i class="glyph-icon icon-leaf"></i>
            <span>Sourcing & Screening</span>
        </a>
    </li>
    <li class="divider"></li>
    <li class="no-menu">
        <a href="<?php echo e(route('index.interview')); ?>" title="Interview Process">
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
<?php endif; ?>