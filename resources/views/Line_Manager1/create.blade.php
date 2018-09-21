@extends('layouts.default')
@section('title',ucwords(Request::segment(2).' ticket'))
@section('js')

<!-- show/hide form contract -->
<script type="text/javascript">
	if ($("#employee_status").val() == "Contract") {
		$("#edit_contract_form").show();
	} else {
		$("#edit_contract_form").hide();
	}

	$("#contract_form").hide();
	function contract_form(){
		if (document.getElementById("employee_status").value != "Contract") {
			$("#contract_form").hide();
			$("#edit_contract_form").hide();
		} else {
			$("#contract_form").show();
			$("#edit_contract_form").show();
		}
	};
</script>

<script src="{{ asset('assets/select2/select2.js') }}"></script>
<script>
	/* Dropdown select 2 */
	$(document).ready(function() {
		$( ".select2-directorate" ).select2( {
			placeholder: "Select Directorate",
			theme: "bootstrap",
		});

		$( ".select2-group" ).select2( {
			placeholder: "Select Group",
			theme: "bootstrap",
		});

		$( ".select2-division" ).select2( {
			placeholder: "Select Division",
			theme: "bootstrap",
		});

		$( ".select2-department" ).select2( {
			placeholder: "Select Deparment",
			theme: "bootstrap",
		});
	});
</script>

<!-- Add field in textarea -->
<script>
	/* Textarea on keyactivites */
	// $(document).ready(function() {
	// 	var i=1;
	// 	$('#add_field').click(function() {
	// 		i++;
	// 		$('#table_custom').append('<tr id="row'+i+'"><td><textarea class="form-control" cols="27" rows="3" name="scope_area[]"></textarea></td><td><textarea class="form-control" id="addLine" cols="77" rows="4" name="scope_activities[]"></textarea></td><td><button type="button" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	// 	});
	// });

	// $(document).on('click', '.btn_remove', function(){  
 //       var button_id = $(this).attr("id");
 //       $('#row'+button_id+'').remove();  
 //    }); 

    /* Field on Hard Competencies */
 //    $(document).ready(function() {
	// 	var i=1;
	// 	var btn = $('#add_hard_competencies');
	// 	btn.click(function() {
	// 		btn.remove();
	// 		i++;
	// 		$('#table_hard_competencies').append('<tr><td class="text-center">'+i+'</td><td><input class="form-control" type="text" name="hard[]" required></td><td><input class="form-control" type="number" name="value[]" min="1" max="5" required></td><td><button type="button" id="add_hard_competencies" class="btn btn-primary">+</button></td></tr>');
	// 	});
	// });
	var no = 1;
	$(document).on('click', '#add_hard_competencies', function(){
		$('#add_hard_competencies').remove();
		no++;  
    	$('#table_hard_competencies').append('<tr><td class="text-center">'+ no +'</td><td><input class="form-control" type="text" name="hard[]" required></td><td><input class="form-control" type="number" name="value[]" min="1" max="5" required></td><td><button type="button" id="add_hard_competencies" class="btn btn-primary">+</button></td></tr>');
    });

	var no_edit = $('#no').data('no');
    $(document).on('click', '#edit_hard_competencies', function(){
		$('#edit_hard_competencies').remove();
		no_edit++;  
    	$('#table_hard_competencies').append('<tr><td class="text-center">'+ no_edit +'</td><td><input class="form-control" type="text" name="hard[]" required></td><td><input class="form-control" type="number" name="value[]" min="1" max="5" required></td><td><button type="button" id="edit_hard_competencies" class="btn btn-primary">+</button></td></tr>');
    });

	/*btn remove*/
	$(document).on('click', '.btn_remove_hard', function(){  
       var button_id = $(this).attr("id");
       $('#row'+button_id+'').remove();  
    });
</script>

<!-- JQuery datepicker -->
<script type="text/javascript" src="{{ asset('assets/widgets/datepicker-ui/datepicker.js') }}"></script>
<script type="text/javascript">
	$(function() {
	    $("#fromDate").datepicker({
	        defaultDate: "+1w",
	        changeMonth: true,
	        numberOfMonths: 3,
	        dateFormat: 'dd/mm/yy',
	        onClose: function(selectedDate) {
	            $("#toDate").datepicker("option", "minDate", selectedDate);
	        }
	    });
	    $("#toDate").datepicker({
	        defaultDate: "+1w",
	        changeMonth: true,
	        numberOfMonths: 3,
	        dateFormat: 'dd/mm/yy',
	        onClose: function(selectedDate) {
	            $("#fromDate").datepicker("option", "maxDate", selectedDate);
	        }
	    });
	});
</script>

<!-- JQuery Validate -->
<script type="text/javascript">	
    	var form = $("#form_ticket");

		$('#wizard').steps({
		    headerTag: "h2",
		    bodyTag: "section",
		    transitionEffect: "slideLeft",
		    enableAllSteps: true,
		    onStepChanging: function (event, currentIndex, newIndex) {
		        // Allways allow previous action even if the current form is not valid!
		        if (currentIndex > newIndex)
		        {
		            return true;
		        }
		        // Needed in some cases if the user went back (clean up)
		        if (currentIndex < newIndex)
		        {
		            // To remove error styles
		            form.find(".body:eq(" + newIndex + ") label.error").remove();
		            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
		        }

		  //       $.ajaxSetup({
				//     headers:
				//     {
				//         'X-CSRF-Token': $('input[name="_token"]').val()
				//     }
				// });

		  //       $("#form_ticket").validate({
		  //       	rules: {
				//         position_name: {
				//             remote: {
				//                 url: '{{ url('checkPosition') }}',
				// 				type : 'post',
				//             }
				//         }
				//     },
				//     messages: {
				//         position_name: {
				//             remote: jQuery.validator.format("{0} is already registered.")
				//         }
				//     }
				// });

		        // form.validate().settings.ignore = ":disabled,:hidden";
		        return form.valid();
		    },
		    onFinishing: function (event, currentIndex) {
		    	form.validate().settings.ignore = ":disabled,:hidden";
		        return form.valid();
		    },
		    onFinished: function (event, currentIndex) {
		        form.submit();
		    }
		});

		$('#wizard-edit').steps({
		    headerTag: "h2",
		    bodyTag: "section",
		    transitionEffect: "slideLeft",
		    labels : {
		    	finish : "Update"
		    },
		    enableAllSteps: true,
		    onStepChanging: function (event, currentIndex, newIndex) {
		        // Allways allow previous action even if the current form is not valid!
		        if (currentIndex > newIndex)
		        {
		            return true;
		        }
		        // Needed in some cases if the user went back (clean up)
		        if (currentIndex < newIndex)
		        {
		            // To remove error styles
		            form.find(".body:eq(" + newIndex + ") label.error").remove();
		            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
		        }

		        form.validate().settings.ignore = ":disabled,:hidden";
		        return form.valid();
		    },
		    onFinishing: function (event, currentIndex) {
		    	form.validate().settings.ignore = ":disabled,:hidden";
		        return form.valid();
		    },
		    onFinished: function (event, currentIndex) {
		        form.submit();
		    }
		});
</script>

<script>
/*popover*/
	$(document).ready(function(){
	    $('[data-toggle="popover"]').popover(); 
	});
</script>

<!-- Ckeditor -->
<script type="text/javascript" src="{{ asset('assets/widgets/ckeditor/ckeditor.js') }}"></script>
<script>
   var config = {
			// Define the toolbar groups as it is a more accessible solution.
			toolbarGroups: [
				{"name":"basicstyles","groups":["basicstyles"]},
				// {"name":"links","groups":["links"]},
				{"name":"paragraph","groups":["list","blocks"]},
				// {"name":"document","groups":["mode"]},
				// {"name":"insert","groups":["insert"]},
				{"name":"styles","groups":["styles"]},
			],
			// Remove the redundant buttons from toolbar groups defined above.
			removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
		},
	config = CKEDITOR.tools.prototypedCopy(config);
	config.extraAllowedContent = 'span{color}';
	CKEDITOR.replace('editor_exp', config);
	CKEDITOR.replace('responsibility', config);
</script>

<!-- Dependency Dropdown -->
<script>
	var url = '{{ env('APP_URL') }}';

	function change_dir() {
		var dir_id = $('#directorate').val();
		$.ajax({
			type: "GET",
			url: url+"/group/"+dir_id,
			dataType: "json",
			success:function(data) {
				$('#group').empty();
				$('#division').empty();
				$('#department').empty();
				$.each(data, function(key, value) {
                    $('#group').append('<option value="'+value.id+'">'+value.group_name+'</option>');
                });
			}
		});
	}

	function change_gr() {
		var gr_id = $('#group').val();
		$.ajax({
			type: "GET",
			url: url+"/division/"+gr_id,
			dataType: "json",
			success:function(data) {
				$('#division').empty();
				$('#department').empty();
				$.each(data, function(key, value) {
                    $('#division').append('<option value="'+value.id+'">'+value.division_name+'</option>');
                });
			}
		});
	}

	function change_div() {
		var div_id = $('#division').val();
		$.ajax({
			type: "GET",
			url: url+"/department/"+div_id,
			dataType: "json",
			success:function(data) {
				$('#department').empty();
				$.each(data, function(key, value) {
                    $('#department').append('<option value="'+value.id+'">'+value.department_name+'</option>');
                });
			}
		});
	}

	/* Edit */
	var url = '{{ env('APP_URL') }}';

	function change_dir() {
		var dir_id = $('#directorate').val();
		$.ajax({
			type: "GET",
			url: url+"/group/"+dir_id,
			dataType: "json",
			success:function(data) {
				$('#group').empty();
				$('#division').empty();
				$('#department').empty();
				$.each(data, function(key, value) {
                    $('#group').append('<option value="'+value.id+'">'+value.group_name+'</option>');
                });
			}
		});
	}

	function change_gr() {
		var gr_id = $('#group').val();
		$.ajax({
			type: "GET",
			url: url+"/division/"+gr_id,
			dataType: "json",
			success:function(data) {
				$('#division').empty();
				$('#department').empty();
				$.each(data, function(key, value) {
                    $('#division').append('<option value="'+value.id+'">'+value.division_name+'</option>');
                });
			}
		});
	}

	function change_div() {
		var div_id = $('#division').val();
		$.ajax({
			type: "GET",
			url: url+"/department/"+div_id,
			dataType: "json",
			success:function(data) {
				$('#department').empty();
				$.each(data, function(key, value) {
                    $('#department').append('<option value="'+value.id+'">'+value.department_name+'</option>');
                });
			}
		});
	}
</script>

<script type="text/javascript" src="{{ asset('assets/widgets/uniform/uniform.js') }}"></script>
<script>
	/* Checkbox */
	$(function() {
	    $('input[type="checkbox"].custom-checkbox').uniform();
	    $('.checker span').append('<i class="glyph-icon icon-check"></i>');
	});
</script>
@stop

@section('content')
<!-- FORM CREATE -->
@if ( Request::segment(2) == 'create' )
	<ol class="breadcrumb bc-3" >
	    <li>
	        <a href="{{ route('ticket') }}"><i class="fa-home"></i>Ticket List</a>
	    </li>
	    <li class="active">
	        <a href="{{ route('create.ticket') }}">New Request</a>
	    </li>
	</ol>
		<h2>Create New Request</h2>
		<br />
	<div style="color: tomato;">
	<p></p>
	</div>

	<div class="row">
	    <div class="col-md-12">
		    <div class="panel panel-default">

		        <div class="panel-body">

		        	@if(session('error'))
		        		<div class="alert alert-danger" role="alert">
		                    <strong>{{ session('error') }}</strong>
		                </div>
		        	@endif

			        <form role="form" action="{{ route('store.ticket') }}" method="post" enctype="multipart/form-data" class="form-horizontal" id="form_ticket">
			        @csrf
			        	<div id="wizard">
		                    <h2>Employee Requisition Form</h2>
		                    <section>
		                    	@include('Line_Manager1.form_erf')
		                    </section>

		                    <h2>Job Description</h2>
		                    <section>
		                        @include('Line_Manager1.form_jd')
		                    </section>
		                </div>
		            </form>
		        </div>

		    </div>
	    </div>
	</div>
@elseif( Request::segment(2) == 'edit' )
<!-- FORM EDIT -->
		<h2>Edit Ticket</h2>
		<br />
	<div style="color: tomato;">
	<p></p>
	</div>

	<div class="row">
	    <div class="col-md-12">
		    <div class="panel panel-default">

		        <div class="panel-body">
			        <form role="form" action="{{ route('update.ticket',$id) }}" method="post" enctype="multipart/form-data" class="form-horizontal" id="form_ticket">
			        @csrf
			        @method('PATCH')
			        	<div id="wizard-edit">
		                    <h2>Employee Requisition Form</h2>
		                    <section>
		                    	@include('Line_Manager1.edit_form_erf')
		                    </section>

		                    <h2>Job Description</h2>
		                    <section>
		                        @include('Line_Manager1.edit_form_jd')
		                    </section>
		                </div>
		            </form>
		        </div>

		    </div>
	    </div>
	</div>
@elseif( Request::segment(2) == 're-approval' )
<!-- FORM EDIT RE-Approval -->
		<h2>Request Re-Approval Ticket</h2>
		<br />
	<div style="color: tomato;">
	<p></p>
	</div>

	<div class="row">
	    <div class="col-md-12">
		    <div class="panel panel-default">

		        <div class="panel-body">
			        <form role="form" action="{{ route('re_approval.ticket',$id) }}" method="post" enctype="multipart/form-data" class="form-horizontal" id="form_ticket">
			        @csrf
			        @method('PATCH')
			        	<div id="wizard-edit">
		                    <h2>Employee Requisition Form</h2>
		                    <section>
		                    	@include('Line_Manager1.edit_form_erf')
		                    </section>

		                    <h2>Job Description</h2>
		                    <section>
		                        @include('Line_Manager1.edit_form_jd')
		                    </section>
		                </div>
		            </form>
		        </div>

		    </div>
	    </div>
	</div>
@endif
@endsection