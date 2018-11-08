                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="position_name" class="col-md-5 control-label">Position Name<span style="color: red;"> *</span>
                          </label>
                            <div class="col-md-6">
                              <input type="text" name="position_name" value="" class="form-control" id="position_name" placeholder="Input Position Name" required title="Input Position Name">
                            </div>
                        </div>

                      <div class="form-group">
                        <label for="grade" class="col-md-5 control-label">Grade<span style="color: red;"> *</span>
                        </label>
                          <div class="col-md-6">
                              <select class="form-control" name="grade" id="grade" required>
                              @if( Auth::user()->grade == 7 )
                                @php $val=7; @endphp
                                @for ($i = 3; $i <= $val ; $i++)
                                  <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                              @elseif( Auth::user()->grade == 8 )
                                @php $val=8; @endphp
                                @for ($i = 3; $i <= $val ; $i++)
                                  <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                              @elseif ( Auth::user()->grade == 9 )
                                @php $val=9; @endphp
                                @for ($i = 3; $i <= $val ; $i++)
                                  <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                              @endif
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="location" class="col-md-5 control-label">Location<span style="color: red;"> *</span></label>
                          <div class="col-md-6">
                              <input type="text" name="location" class="form-control" id="location" placeholder="Input Location" required title="Input Location">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="reporting_to" class="col-md-5 control-label">Reporting To<span style="color: red;"> *</span></label>
                          <div class="col-md-6">
                              <input type="text" name="reporting_to" class="form-control" id="reporting_to" placeholder="Report to name, ex: Jhon Doe" required title="Input Reporting To">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="directorate" class="col-md-5 control-label">Directorate<span style="color: red;"> *</span></label>
                          <div class="col-md-6">
                              <select class="form-control select2-directorate" name="directorate" required title="Select Directorate" id="directorate" onchange="change_dir()">
                                <option></option>
                                @foreach( $directorate as $directorate)
                                  <option value="{{ $directorate->id }}">{{ $directorate->directorate_name }}</option>
                                @endforeach
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="group" class="col-md-5 control-label">Group<span style="color: red;"> *</span></label>
                          <div class="col-md-6">
                              <select class="form-control select2-group" name="group" required id="group" onchange="change_gr()" title="Select Group">
                              <option></option>
                  </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="division" class="col-md-5 control-label">Division<span style="color: red;"> *</span></label>
                          <div class="col-md-6">
                              <select class="form-control select2-division" name="division" required id="division" onchange="change_div()" title="Select Division">
                              <option></option>
                  </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="department" class="col-md-5 control-label">Department<span style="color: red;"> *</span></label>
                          <div class="col-md-6">
                              <select class="form-control select2-department" name="department" required id="department" title="Select Department">
                              <option></option>
                  </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="headcount_type" class="col-md-5 control-label">Headcount Type<span style="color: red;"> *</span></label>
                          <div class="col-md-6">
                            <select class="form-control" id="headcount_type" name="headcount_type" required title="Select Headcount Type">
                              <option value="" disabled selected>Select Headcount Type</option>
                        <option value="Budgeted">Budgeted</option>
                        <option value="Budgeted">Unbudgeted</option>
                      </select>
                          </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-11">
                          <fieldset class="the-fieldset">
                                  <legend class="the-legend">
                                    <label class="control-label">Status Of Employment</label>
                                  </legend>

                                  <label for="employee_status" class="col-md-5 control-label">Employee Status<span style="color: red;"> *</span></label>
                                  <div class="col-md-7" style="padding-bottom: 10px;">
                                    <select class="form-control" id="employee_status" name="employee_status" onchange="contract_form()" required title="Select Employee Status">
                                        <option value="" disabled selected>Select Employee Status</option>
                                        <option value="Permanent" id="Permanent">Permanent</option>
                                        <option value="Contract" id="Contract">Contract</option>
                                    </select>
                                  </div>

                              <div id="contract_form">
                                <label class="col-md-5 control-label">Contract Duration<span style="color: red;">*</span></label>
                                  <div class="col-md-7" style="padding-bottom: 10px;">
                                      <select class="form-control" id="contract_duration" name="contract_duration" required>
                                        <option value="6 Month">6 Month</option>
                                        <option value="12 Month">12 Month</option>
                                        <option value="24 Month">24 Month</option>
                                      </select>
                                  </div>  
                              </div>
                              </fieldset> 
                        </div>
                        </div>

                      </div>

                      <!-- BATAS -->
                      <div class="col-md-6">
                      

                        <div class="form-group">
                        <div class="col-md-12">
                          <fieldset class="the-fieldset">
                                  <legend class="the-legend">
                                    <label class="control-label">Sources</label>
                                  </legend>

                                  <label for="type_hiring" class="col-md-4 control-label">Type Of Hiring<span style="color: red;"> *</span></label>
                                  <div class="col-md-8">
                                      <div class="checkbox checkbox-success">
                                          <label>
                                              <input type="checkbox" id="type_hiring" value="IJO" name="type_hiring[]" class="custom-checkbox" required>
                                              Internal Job Offering
                                          </label>
                                      </div>
                                      <div class="checkbox checkbox-success">
                                          <label>
                                              <input type="checkbox" id="type_hiring" value="EJO" name="type_hiring[]" class="custom-checkbox">
                                              External Job Offering
                                          </label>
                                      </div>
                                  </div>
                              </fieldset> 
                        </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-12">
                            <fieldset class="the-fieldset">
                                <legend class="the-legend">
                                  <label class="control-label">Nature Of Hiring</label>
                                </legend>

                                <label for="Confidentiality" class="col-md-4 control-label">Advertisement<span style="color: red;">*</span></label>
                                <div class="col-md-8" style="padding-bottom: 20px;">
                                    <select class="form-control" id="Confidentiality" name="confidentiality" required title="Select Advertisement">
                                      <option value="" disabled selected>Select Advertisement</option>
                                      <option value="Publish">Publish</option>
                                      <option value="Non Publish">Non Publish</option>
                                    </select>
                                </div>
                            </fieldset> 
                          </div>
                        </div>

                        <div class="form-group">
                        <div class="col-md-12">
                          <fieldset class="the-fieldset">
                                  <legend class="the-legend">
                                    <label for="request_background" class="control-label">Reason For Hiring</label>
                                  </legend>

                                  <label for="request_background" class="col-md-4 control-label">Request Background<span style="color: red;"> *</span></label>
                              <div class="col-md-8" style="padding-bottom: 20px;">
                                <select class="form-control" id="request_background" name="request_background" onchange="request_form()" required title="Select Request Background">
                                  <option value="" disabled selected>Select Request Background</option>
                              <option value="Replacement">Replacement</option>
                              <option value="New Position">New Position</option>
                            </select>
                              </div>

                              <label for="reason" class="col-md-4 control-label">Hiring Justification<span style="color: red;"> *</span></label>
                              <div class="col-md-8" style="padding-bottom: 10px;">
                                  <textarea class="form-control" id="reason" rows="3" name="reason" required title="Input Hiring Justification"></textarea>
                              </div>
                              </fieldset> 
                        </div>
                        </div>

                      </div><!-- tutup batas -->

                    </div>