<div id="page-sidebar" class="bg-gradient-8 font-inverse">
        <div class="scroll-sidebar">
            <ul id="sidebar-menu">
            <!-- Line Manager 1 -->
            <?php if( Auth::user()->role_id == 1 ): ?>
                <li class="header"><span>Process</span></li>

                <li>
                    <a href="<?php echo e(route('ticket')); ?>" title="You Ticket List">
                        <i class="glyph-icon icon-linecons-doc"></i>
                        <span>Ticket</span>
                    </a>
                </li>
                <li class="divider"></li>
                
                <li>
                    <a href="<?php echo e(route('create.ticket')); ?>" title="Create New Ticket">
                        <i class="glyph-icon icon-plus"></i>
                        <span>Create Ticket</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="" title="Create New Ticket">
                        <i class="glyph-icon icon-coffee"></i>
                        <span>Interview Schedule</span>
                    </a>
                </li>
                <li class="divider"></li>
            <?php endif; ?>

            <?php if( Auth::user()->role_id == 4 ): ?>
                <li class="header"><span>Overview</span></li>
                <li>
                    <a href="" title="Admin Dashboard">
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

                <li class="header"><span>Process</span></li>

                <li class="divider"></li>
                <li class="no-menu">
                    <a href="" title="Frontend template">
                        <i class="glyph-icon icon-adjust"></i>
                        <span>Hiring Brief</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li class="no-menu">
                    <a href="" title="Frontend template">
                        <i class="glyph-icon icon-leaf"></i>
                        <span>CV & Sourcing</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li class="no-menu">
                    <a href="" title="Frontend template">
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

                <li class="header"><span>Configure</span></li>
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
                <li class="divider"></li>
            <?php endif; ?>

            <!-- HR Bussiness Partner -->
            <?php if( Auth::user()->role_id ==3 ): ?>
                <li class="header"><span>Process</span></li>
                
                <li>
                    <a href="<?php echo e(route('ticket.approval')); ?>" title="Ticket Approval">
                        <i class="glyph-icon icon-key"></i>
                        <span>Approval Ticket</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="" title="Ticket Approval">
                        <i class="glyph-icon icon-key"></i>
                        <span>Approval List</span>
                    </a>
                </li>
                <li class="divider"></li>
            <?php endif; ?>

            </ul>
        <!-- #sidebar-menu -->    
        </div>
    </div>