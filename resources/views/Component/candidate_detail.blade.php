<div class="modal fade" id="candidate_detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Candidate Detail</h4>
            </div>

        	<div class="modal-body">

        		<div class="content-box">
        			<div class="content-box-header content-box-header-alt bg-white">
		                <span class="icon-separator">
		                    <i class="glyph-icon icon-user"></i>
		                </span>
		                <span class="header-wrapper">
		                    <h4 style="font-family:ooredoo" id="header"></h4>
		                </span>
		            </div>
        		</div>

        		<div class="content-box">
        			<div class="example-box-wrapper">
	                    <ul id="myTab" class="nav clearfix nav-tabs">
	                        <li class="active"><a href="#detail_info" data-toggle="tab">Detail Info</a></li>
	                        <li class=""><a href="#interview" data-toggle="tab">Interview</a></li>
	                    </ul>

	                    <div class="tab-content">
	                        <div class="tab-pane fade active in" id="detail_info">
	                            <form class="form-horizontal">
					        		<div class="form-group">
					        			<label class="col-md-3 control-label">Name Candidate</label>
					                    <div class="col-md-6">
					                        <input type="text" class="form-control" id="name_candidate" disabled="true">
					                    </div>
					        		</div>
					        		<div class="form-group">
					        			<label class="col-md-3 control-label">Education Background</label>
					                    <div class="col-md-6">
					                        <input type="text" class="form-control" id="education" disabled="true">
					                    </div>
					        		</div>
					        		<div class="form-group">
					        			<label class="col-md-3 control-label">Gender</label>
					                    <div class="col-md-3">
					                    	<input type="text" class="form-control" id="gender" disabled="true">
					                    </div>
					        		</div>
					        		<div class="form-group">
					        			<label class="col-md-3 control-label">Birth Place</label>
					                    <div class="col-md-4">
					                    	<input type="text" class="form-control" id="birth_place" disabled="true">
					                    </div>
					        		</div>
					        		<div class="form-group">
					        			<label class="col-md-3 control-label">Birth Date</label>
					                    <div class="col-md-3">
					                    	<input type="text" class="form-control" id="birth_date" disabled="true">
					                    </div>
					        		</div>
					        		<div class="form-group">
					        			<label class="col-md-3 control-label">Current Position</label>
					                    <div class="col-md-6">
					                        <input type="text" class="form-control" id="current_position" disabled="true">
					                    </div>
					        		</div>
					        		<div class="form-group">
					        			<label class="col-md-3 control-label">Current Company</label>
					                    <div class="col-md-6">
					                        <input type="text" class="form-control" id="current_company" disabled="true">
					                    </div>
					        		</div>
					        		<div class="form-group">
					        			<label class="col-md-3 control-label">Current Industry</label>
					                    <div class="col-md-6">
					                        <input type="text" class="form-control" id="current_industry" disabled="true">
					                    </div>
					        		</div>
					        		<div class="row">
					        			<div class="col-md-6">
						        			<div class="form-group">
							        			<label class="col-md-6 control-label">Work Experience</label>
							                    <div class="col-md-3">
							                        <input type="text" class="form-control" id="work_exp" disabled="true">
							                    </div>
							                    <label class="control-label">Years</label>
							        		</div>
							        	</div>
							        	<div class="col-md-6">
							        		
							        	</div>
					        		</div>
					        		@if( Auth::user()->grade > 5 && Auth::user()->group = 'Group HR Development' )
						        		<div class="form-group">
						        			<label class="col-md-3 control-label">Salary Range</label>
						                    <div class="col-md-6">
						                        <input type="text" class="form-control" id="salary_range" disabled="true">
						                    </div>
						        		</div>
					        		@endif
					        		<div class="form-group">
					        			<label class="col-md-3 control-label">Skill</label>
					                    <div class="col-md-6">
					                        <textarea class="form-control" id="skill" rows="6" name="skill" disabled="true"></textarea>
					                    </div>
					        		</div>
					        		<div class="form-group">
					        			<label class="col-md-3 control-label">Source</label>
					                    <div class="col-md-5">
								            <input type="text" class="form-control" id="source" disabled="true">
					                    </div>
					        		</div>
					        		<div class="form-group">
					        			<label class="col-md-3 control-label"></label>
					                    <div class="col-md-5">
								            <input type="text" class="form-control" id="other" disabled="true">
					                    </div>
					        		</div>
					        		
					        		<div class="form-group">
					                    <div class="col-md-12 text-center">
						                    <a id="download_cv" href="" target="_blank" type="button" class="btn btn-info">
						                    	<span class="glyph-icon icon-download" title="Download CV"> Download CV</span>
											</a>
					                    </div>
					                </div>
					        	</form>
	                        </div>

	                        <div class="tab-pane fade" id="interview">
	                            <div class="row">
									<div class="col-md-3">
									    <ul class="list-group">
									        <li class="mrg10B active">
									            <a href="#faq-tab-1" data-toggle="tab" class="list-group-item bg-white">
									                How to get paid
									                <i class="glyph-icon icon-angle-right mrg0A"></i>
									            </a>
									        </li>
									        <li class="mrg10B">
									            <a href="#faq-tab-2" data-toggle="tab" class="list-group-item bg-white">
									                ThemeForest related
									                <i class="glyph-icon font-green icon-angle-right mrg0A"></i>
									            </a>
									        </li>
									        <li class="mrg10B">
									            <a href="#faq-tab-3" data-toggle="tab" class="list-group-item bg-white">
									                Common questions
									                <i class="glyph-icon icon-angle-right mrg0A"></i>
									            </a>
									        </li>
									        <li class="mrg10B">
									            <a href="#faq-tab-4" data-toggle="tab" class="list-group-item bg-white">
									                Terms of service
									                <i class="glyph-icon icon-angle-right mrg0A"></i>
									            </a>
									        </li>
									    </ul>
									</div>
									<div class="col-md-9">
									    <div class="tab-content">
									        <div class="tab-pane fade pad0A active in" id="faq-tab-1">
									            <div class="panel-group" id="accordion5">
									                <div class="panel">
									                    <div class="panel-heading">
									                        <h4 class="panel-title">
									                            <a data-toggle="collapse" data-parent="#accordion5" href="#collapseOne" aria-expanded="true" class="">
									                                Collapsible Group Item #1
									                            </a>
									                        </h4>
									                    </div>
									                    <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true" style="">
									                        <div class="panel-body pad0B">
									                            <p class="mrg15B">The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth.</p>

									                            <p class="mrg15B">For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>

									                            <p class="mrg15B">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is.</p>
									                        </div>
									                    </div>
									                </div>
									                <div class="panel">
									                    <div class="panel-heading">
									                        <h4 class="panel-title">
									                            <a data-toggle="collapse" data-parent="#accordion5" href="#collapseTwo" class="collapsed" aria-expanded="false">
									                                Collapsible Group Item #2
									                            </a>
									                        </h4>
									                    </div>
									                    <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
									                        <div class="panel-body pad0B">
									                            <p class="mrg15B">For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>
									                            <p class="mrg15B">The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators.</p>

									                        </div>
									                    </div>
									                </div>
									                <div class="panel">
									                    <div class="panel-heading">
									                        <h4 class="panel-title">
									                            <a data-toggle="collapse" data-parent="#accordion5" href="#collapseThree" class="collapsed" aria-expanded="false">
									                                Collapsible Group Item #3
									                            </a>
									                        </h4>
									                    </div>
									                    <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
									                        <div class="panel-body pad0B">
									                            <p class="mrg15B">The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators.</p>

									                            <p class="mrg15B">To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental.</p>
									                        </div>
									                    </div>
									                </div>
									            </div>
									        </div>
									        <div class="tab-pane fade pad0A" id="faq-tab-2">
									            <div class="panel-group" id="accordion1">
									                <div class="panel">
									                    <div class="panel-heading">
									                        <h4 class="panel-title">
									                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
									                                Collapsible Group Item #1
									                            </a>
									                        </h4>
									                    </div>
									                    <div id="collapseOne1" class="panel-collapse collapse in">
									                        <div class="panel-body pad0B">
									                            <p class="mrg15B">The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators.</p>

									                            <p class="mrg15B">To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental.</p>
									                        </div>
									                    </div>
									                </div>
									                <div class="panel">
									                    <div class="panel-heading">
									                        <h4 class="panel-title">
									                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">
									                                Collapsible Group Item #2
									                            </a>
									                        </h4>
									                    </div>
									                    <div id="collapseTwo1" class="panel-collapse collapse">
									                        <div class="panel-body pad0B">
									                            <p class="mrg15B">To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>

									                            <p class="mrg15B">Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages.</p>
									                        </div>
									                    </div>
									                </div>
									                <div class="panel">
									                    <div class="panel-heading">
									                        <h4 class="panel-title">
									                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1">
									                                Collapsible Group Item #3
									                            </a>
									                        </h4>
									                    </div>
									                    <div id="collapseThree1" class="panel-collapse collapse">
									                        <div class="panel-body pad0B">
									                            <p class="mrg15B">The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth.</p>

									                            <p class="mrg15B">For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>

									                            <p class="mrg15B">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is.</p>
									                        </div>
									                    </div>
									                </div>
									            </div>
									        </div>
									        <div class="tab-pane fade pad0A" id="faq-tab-3">
									            <div class="panel-group" id="accordion2">
									                <div class="panel">
									                    <div class="panel-heading">
									                        <h4 class="panel-title">
									                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2">
									                                Collapsible Group Item #1
									                            </a>
									                        </h4>
									                    </div>
									                    <div id="collapseOne2" class="panel-collapse collapse in">
									                        <div class="panel-body pad0B">
									                            <p class="mrg15B">The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators.</p>

									                            <p class="mrg15B">To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental.</p>
									                        </div>
									                    </div>
									                </div>
									                <div class="panel">
									                    <div class="panel-heading">
									                        <h4 class="panel-title">
									                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2">
									                                Collapsible Group Item #2
									                            </a>
									                        </h4>
									                    </div>
									                    <div id="collapseTwo2" class="panel-collapse collapse">
									                        <div class="panel-body pad0B">
									                            <p class="mrg15B">To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>

									                            <p class="mrg15B">Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.</p>


									                        </div>
									                    </div>
									                </div>
									                <div class="panel">
									                    <div class="panel-heading">
									                        <h4 class="panel-title">
									                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapseThree2">
									                                Collapsible Group Item #3
									                            </a>
									                        </h4>
									                    </div>
									                    <div id="collapseThree2" class="panel-collapse collapse">
									                        <div class="panel-body pad0B">
									                            <p class="mrg15B">It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>

									                            <p class="mrg15B">Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.</p>


									                        </div>
									                    </div>
									                </div>
									            </div>
									        </div>
									        <div class="tab-pane fade pad0A" id="faq-tab-4">
									            <div class="panel-group" id="accordion3">
									                <div class="panel">
									                    <div class="panel-heading">
									                        <h4 class="panel-title">
									                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne4">
									                                Collapsible Group Item #1
									                            </a>
									                        </h4>
									                    </div>
									                    <div id="collapseOne4" class="panel-collapse collapse in">
									                        <div class="panel-body pad0B">
									                            <p class="mrg15B">It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>

									                            <p class="mrg15B">Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.</p>
									                        </div>
									                    </div>
									                </div>
									                <div class="panel">
									                    <div class="panel-heading">
									                        <h4 class="panel-title">
									                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo4">
									                                Collapsible Group Item #2
									                            </a>
									                        </h4>
									                    </div>
									                    <div id="collapseTwo4" class="panel-collapse collapse">
									                        <div class="panel-body pad0B">
									                            <p class="mrg15B">It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>

									                            <p class="mrg15B">Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.</p>
									                        </div>
									                    </div>
									                </div>
									                <div class="panel">
									                    <div class="panel-heading">
									                        <h4 class="panel-title">
									                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree4">
									                                Collapsible Group Item #3
									                            </a>
									                        </h4>
									                    </div>
									                    <div id="collapseThree4" class="panel-collapse collapse">
									                        <div class="panel-body pad0B">
									                            <p class="mrg15B">It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>

									                            <p class="mrg15B">Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental.</p>
									                        </div>
									                    </div>
									                </div>
									            </div>
									        </div>
									    </div>
									</div>
									</div>
	                        </div>
	                    </div>
	                </div>
        		</div>

        		{{-- <form class="form-horizontal">

	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Name Candidate</label>
	                    <div class="col-md-6">
	                        <input type="text" class="form-control" id="name_candidate" disabled="true">
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Education Background</label>
	                    <div class="col-md-6">
	                        <input type="text" class="form-control" id="education" disabled="true">
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Gender</label>
	                    <div class="col-md-2">
	                    	<input type="text" class="form-control" id="gender" disabled="true">
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Birth Place</label>
	                    <div class="col-md-4">
	                    	<input type="text" class="form-control" id="birth_place" disabled="true">
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Birth Date</label>
	                    <div class="col-md-3">
	                    	<input type="text" class="form-control" id="birth_date" disabled="true">
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Current Position</label>
	                    <div class="col-md-6">
	                        <input type="text" class="form-control" id="current_position" disabled="true">
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Current Company</label>
	                    <div class="col-md-6">
	                        <input type="text" class="form-control" id="current_company" disabled="true">
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Current Industry</label>
	                    <div class="col-md-6">
	                        <input type="text" class="form-control" id="current_industry" disabled="true">
	                    </div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-6">
		        			<div class="form-group">
			        			<label class="col-md-6 control-label">Work Experience</label>
			                    <div class="col-md-3">
			                        <input type="text" class="form-control" id="work_exp" disabled="true">
			                    </div>
			                    <label class="control-label">Years</label>
			        		</div>
			        	</div>
			        	<div class="col-md-6">
			        		
			        	</div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Salary Range</label>
	                    <div class="col-md-6">
	                        <input type="text" class="form-control" id="salary_range" disabled="true">
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Skill</label>
	                    <div class="col-md-6">
	                        <textarea class="form-control" id="skill" rows="6" name="skill" disabled="true"></textarea>
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Soruce</label>
	                    <div class="col-md-5">
				            <input type="text" class="form-control" id="source" disabled="true">
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label"></label>
	                    <div class="col-md-5">
				            <input type="text" class="form-control" id="other" disabled="true">
	                    </div>
	        		</div>
	        		
	        		<div class="form-group">
	                    <div class="col-md-12 text-center">
		                    <a id="download_cv" href="" target="_blank" type="button" class="btn btn-info">
		                    	<span class="glyph-icon icon-download" title="Download CV"> Download CV</span>
							</a>
	                    </div>
	                </div>
	        	</form> --}}
        	
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>