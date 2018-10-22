@extends('layouts.default')
@section('title',ucwords(Request::segment(2).' ticket'))
@section('js')

<!-- show/hide form contract -->
<script type="text/javascript">
	if ($("#employee_status").val() == "Contract") {
		$("#edit_contract_form").show();
	} else {
		$("#edit_contract_form").hide();
	};

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

	/* request background di pilih new position */
	function request_form() {
		if ( $('#request_background').val() == 'New Position' ) {
			$('#incumbent').prop('disabled',true);
		} else {
			$('#incumbent').prop('disabled',false);
		}
	};

	/*buat di edit ticket*/
	$(document).ready(function() {
		if ( $('#request_background').val() == 'New Position' ) {
			$('#incumbent').prop('disabled',true);
		} else {
			$('#incumbent').prop('disabled',false);
		}
	})

</script>

<script src="{{ asset('assets/select2/select2.js') }}"></script>
<script>
	/* Dropdown select 2 */
	$(document).ready(function() {
		/* form ERF */
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

		/* form LOA */
		$( ".select2-hrbp" ).select2( {
			placeholder: "Select HR Business Partner",
			theme: "bootstrap",
		});

		if ( {{ Auth::user()->grade }} == 7 ) {
			$( ".select2-GH" ).select2( {
				placeholder: "Select Line Manager 1",
				theme: "bootstrap",
			});

			$( ".select2-chief" ).select2( {
				placeholder: "Select Line Manager 2",
				theme: "bootstrap",
			});
		} else if ( {{ Auth::user()->grade }} == 8 ) {
			$( ".select2-chief" ).select2( {
				placeholder: "Select Line Manager",
				theme: "bootstrap",
			});

			$( ".select2-chro" ).select2( {
				placeholder: "Select Chief Of Human Resource",
				theme: "bootstrap",
			});
		}

	});
</script>

<!-- Add row dynamic -->
<script>
	var i = 1;
	$(document).on('click', '#add_hard_competencies', function(){
		i++;
    	$('#table_hard_competencies').append('<tr id="row'+i+'"><td><input class="form-control" type="text" name="hard[]" required></td><td><input class="form-control" type="number" name="value[]" min="1" max="5" required></td><td><button type="button" id="'+i+'" class="btn btn-danger btn_remove_hard">X</button></td></tr>');
    });

    /*btn remove*/
	$(document).on('click', '.btn_remove_hard', function(){  
       var button_id = $(this).attr("id");
       $('tr#row'+button_id+'').remove();  
    });

	var no_edit = $('tr:last').attr('id');
    $(document).on('click', '#edit_hard_competencies', function(){
		no_edit++;
    	$('#table_hard_competencies').append('<tr class="row'+no_edit+'" id="'+no_edit+'"><td><input class="form-control" type="text" name="hard[]" required></td><td><input class="form-control" type="number" name="value[]" min="1" max="5" required></td><td><button type="button" id="'+no_edit+'" class="btn btn-danger edit_remove">x</button></td></tr>');
    });

    $(document).on('click', '.edit_remove', function(){  
       var button_id = $(this).attr("id");
       $('tr.row'+button_id+'').remove();
    });
</script>

<!-- JQuery Step -->
<script type="text/javascript">	
    	var form = $("#form_ticket");

		$('#wizard').steps({
		    headerTag: "h2",
		    bodyTag: "section",
		    transitionEffect: "slideLeft",
		    enableAllSteps: true,
		    // saveState: true,
		  //   onStepChanging: function (event, currentIndex, newIndex) {
		  //       // Allways allow previous action even if the current form is not valid!
		  //       if (currentIndex > newIndex)
		  //       {
		  //           return true;
		  //       }
		  //       // Needed in some cases if the user went back (clean up)
		  //       if (currentIndex < newIndex)
		  //       {
		  //           // To remove error styles
		  //           form.find(".body:eq(" + newIndex + ") label.error").remove();
		  //           form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
		  //       }

		  // //       $.ajaxSetup({
				// //     headers:
				// //     {
				// //         'X-CSRF-Token': $('input[name="_token"]').val()
				// //     }
				// // });

		  // //       $("#form_ticket").validate({
		  // //       	rules: {
				// //         position_name: {
				// //             remote: {
				// //                 url: '{{ url('checkPosition') }}',
				// // 				type : 'post',
				// //             }
				// //         }
				// //     },
				// //     messages: {
				// //         position_name: {
				// //             remote: jQuery.validator.format("{0} is already registered."),
				// //         }
				// //     }
				// // });

		  //       form.validate().settings.ignore = ":disabled,:hidden";
		  //       return form.valid();
		  //   },
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

<!-- Ckeditor -->
<script type="text/javascript" src="{{ asset('assets/widgets/ckeditor/ckeditor.js') }}"></script>
<script>
   var config = {
			// Define the toolbar groups as it is a more accessible solution.
			toolbarGroups: [
				{"name":"basicstyles","groups":["basicstyles"]},
				{"name":"paragraph","groups":["list","blocks"]},
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
	        <a href="{{ route('ticket') }}"><i class="fa-home"></i>Ticket</a>
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

		                    <h2>Verified By</h2>
		                    <section>
		                        @include('Line_Manager1.form_LOA')
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

		                    <h2>Verified By</h2>
		                    <section>
		                        @include('Line_Manager1.edit_form_LOA')
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

		                    <h2>Verified By</h2>
		                    <section>
		                        @include('Line_Manager1.edit_form_LOA')
		                    </section>
		                </div>
		            </form>
		        </div>

		    </div>
	    </div>
	</div>
@endif
@endsection