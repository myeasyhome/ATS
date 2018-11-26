@extends('layouts.default')
@section('title','Form Feedback Interview')

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

<!-- Datepicker bootstrap -->
<script>
    $(function() { 
        $('.date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose : true,
            todayHighlight : true,
        });
    });
</script>

<!-- untuk cek extension file upload -->
<script>
$("#format").hide();
$("#size").hide();
var fileExtensions = [".doc", ".pdf", ".docx"];
function validateExtension(input) {
    if (input.type == "file") {
        var fileName = input.value;
         if (fileName.length > 0) {
            var validExtension = false;
            for (var i = 0; i < fileExtensions.length; i++) {
                var sCurExtension = fileExtensions[i];
                if (fileName.substr(fileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    validExtension = true;
                    $('#cv').removeClass('parsley-error');
                    $("#format").hide();
                    $("#size").hide();
                    break;
                }
            }
             
            if (!validExtension) {
                $('#cv').addClass('parsley-error');
                $("#format").show();
                input.value = "";
                return false;
            } else if ( input.files[0].size > 2480000 ) {
                $('#cv').addClass('parsley-error');
                $("#size").show();
                input.value = "";
                return false;
            }
        }
    }
    return true;
}
</script>

@stop

@section('content')
<ol class="breadcrumb">
    <li>
        <a href="{{ route('lm1_index.interview') }}">Interview Process</a>
    </li>
    <li>
        <a href="{{ route('lm1_feedback_list.interview',['id'=>App\Models\Interview::findOrFail($id)->CV->hiring_briefs->id, 'position'=>str_slug(App\Models\Interview::findOrFail($id)->CV->hiring_briefs->tickets->position_name,'-')]) }}">Feedback List</a>
    </li>
    <li>
        <span><em>Form Interview Feedback</em></span>
    </li>
</ol>

<div class="row">

    <!-- panel box 1 -->
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-body">
                @if(session('error'))
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

                <h2 class="title-hero" style="font-size: 18px"><strong>form feedback interview for {{ App\Models\Interview::findOrFail($id)->CV->name_candidate }}</strong>
                </h2><br>

                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                    <tr>
                        <th class="text-center">Compentencies/Skill</th>
                        <th class="text-center">Comments</th>
                    </tr>
                </table>

                {{-- <form class="form-horizontal" action="#" enctype="multipart/form-data" method="POST" data-parsley-validate="">
                @csrf

                    <div class="form-group">
                        <label class="col-md-3 control-label">Name Candidate</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name_candidate" name="name_candidate" placeholder="Input Name Candidate" title="Input Name Candidate" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Education Background</label>
                        <div class="col-md-6">
                            <select class="form-control" name="education" id="education" required title="Select Education">
                                <option value="" disabled selected>Select Education</option>
                                <option value="D3">Diploma's degree graduate</option>
                                <option value="S1">Bachelor's degree graduate</option>
                                <option value="S2">Master's degree graduate</option>
                                <option value="S3">Doctoral degree graduate</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Gender</label>
                        <div class="col-md-2">
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-6 control-label">Birth Place</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="place" name="place" placeholder="Input Place Birth" title="Input Place Birth" required>
                                </div>
                            </div>  
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Birth Date</label>
                                <div class="col-md-6">
                                    <div class="input-group date">
                                        <span class="add-on input-group-addon" id="birth_date">
                                            <i class="glyph-icon icon-calendar"></i>
                                        </span> 
                                        <input type="text" class="form-control" id="birth_date" name="birth_date" placeholder="Input Birth Date" title="Input Birth Date" required>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Input Email" title="Input Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Current Position</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="current_position" name="current_position" placeholder="Input Current Position" title="Input Current Position" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Current Company</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="current_company" name="current_company" placeholder="Input Current Company" title="Input Current Company" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Current Industry</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="current_industry" name="current_industry" placeholder="Input Current Industry" title="Input Current Industry" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-6 control-label">Work Experience</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="work_exp" name="work_exp" placeholder="ex: 1.5" title="Input Work Experience" required>
                                </div>
                                <label class="control-label">Years</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Salary Range</label>
                        <div class="col-md-4">
                            <select class="form-control" name="salary_range" id="salary_range" required>
                                <option value="" disabled selected>Select Salary Range</option>
                                <option value="Fresh Graduate">Fresh Graduate</option>
                                <option value="5.000.000 IDR - 10.000.000 IDR">5.000.000 IDR - 10.000.000 IDR</option>
                                <option value="10.000.000 IDR - 15.000.000 IDR">10.000.000 IDR - 15.000.000 IDR</option>
                                <option value="15.000.000 IDR - 25.000.000 IDR">15.000.000 IDR - 25.000.000 IDR</option>
                                <option value="25.000.000 IDR - 30.000.000 IDR">25.000.000 IDR - 30.000.000 IDR</option>
                                <option value="30.000.000 IDR - 35.000.000 IDR">30.000.000 IDR - 35.000.000 IDR</option>
                                <option value="35.000.000 IDR - 40.000.000 IDR">35.000.000 IDR - 40.000.000 IDR</option>
                                <option value="40.000.000 IDR - 50.000.000 IDR">40.000.000 IDR - 50.000.000 IDR</option>
                                <option value="> 50.000.000 IDR">> 50.000.000 IDR</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Skill</label>
                        <div class="col-md-6">
                            <textarea class="form-control" id="skill" rows="6" name="skill" required title="Input Skill"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tags</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="tags" data-role="tagsinput" name="tags">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-6 control-label">Source</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="source" id="source" onchange="change_source()" required>
                                        <option value="" disabled selected>Select Source</option>
                                        <option value="linkedIn">linkedIn</option>
                                        <option value="Job Portal">Job Portal</option>
                                        <option value="Internal Job Offering">Internal Job Offering</option>
                                        <option value="Employee Get Employee">Employee Get Employee</option>
                                        <option value="User Referral">User Referral</option>
                                        <option value="Career Fair">Career Fair</option>
                                        <option value="Community Event">Community Event</option>
                                        <option value="Campus Hiring">Campus Hiring</option>
                                        <option value="Social Media">Social Media</option>
                                        <option value="Personal Network">Personal Network</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>  
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="other" id="other">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">CV Candidate <i style="color: #7C7C7C; font-size: 11px"><em> (Max 2MB) </em></i></label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="cv" name="cv" title="File CV (PDF,DOC). Max Size 2MB" onchange="validateExtension(this)" required>
                            <!-- error -->
                            <ul class="parsley-errors-list" id="format">
                                <li class="parsley-required">Document Format Must PDF or Doc !!</li>
                            </ul>
                            <ul class="parsley-errors-list" id="size">
                                <li class="parsley-required">Max File Size Must 2MB !!</li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-info mrg10T" type="submit" id="upload">Upload</button>
                    </div>
                </form> --}}
            </div>

        </div>
    </div>

</div>
@endsection