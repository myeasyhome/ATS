				<div class="form-group">
                	<div class="col-md-12">
                		<fieldset class="the-fieldset">
                        	<legend class="the-legend">
                        		<label class="control-label">Minimum Requirements</label>
                        	</legend>

                        	<div class="row" style="padding-bottom: 10px;">
                        		<div class="col-md-6">
                        			<label class="col-sm-6">Qualification and Experience</label>
				                    <div class="col-md-12" >
				                         <textarea class="form-control" rows="5" cols="49" id="editor_exp" name="qualification">{{ $edit->ticket_jd_details->qualification }}</textarea>
				                    </div>
                        		</div>

                        		<div class="col-md-6">
                        			<label for="skill" class="col-md-6">Skills</label>
				                    <div class="col-md-12" >
				                         <textarea class="form-control" rows="5" cols="49" id="editor_skill" name="skill">{{ $edit->ticket_jd_details->skill }}</textarea>
				                    </div>
                        		</div>
                        	</div> 
		                    
                    	</fieldset>	
                	</div>
                </div>

                <div class="form-group">
                	<div class="col-md-12">
                		<fieldset class="the-fieldset">
                        	<legend class="the-legend">
                        		<label class="control-label">Related Function To The Role </label>
                        	</legend>

                        	<div class="row">
                        		<div class="col-md-4">
                        			<label for="" class="col-md-12">Internal (Within Function)</label>
				                    <div class="col-md-12" style="padding-bottom: 20px;">
				                         <textarea class="form-control" rows="5" cols="49" id="editor_jd1" name="within">{{ $edit->ticket_jd_details->internal_within }}</textarea>
				                    </div>
                        		</div>

                        		<div class="col-md-4">
                        			<label for="" class="col-md-12">Cross Function (Outside of Function)</label>
				                    <div class="col-md-12" style="padding-bottom: 20px;">
				                         <textarea class="form-control" rows="5" cols="49" id="editor_jd2" name="outside">{{ $edit->ticket_jd_details->internal_outside }}</textarea>
				                    </div>
                        		</div>

                        		<div class="col-md-4">
                        			<label for="" class="col-md-12">External</label>
				                    <div class="col-md-12" style="padding-bottom: 10px;">
				                         <textarea class="form-control" rows="5" cols="49" id="editor_jd3" name="external">{{ $edit->ticket_jd_details->external }}</textarea>
				                    </div>
                        		</div>
                        	</div>
		                    
                    	</fieldset>	
                	</div>
                </div>