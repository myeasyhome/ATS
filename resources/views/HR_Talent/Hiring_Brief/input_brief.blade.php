@extends('layouts.default')
@section('title','Result Hiring Brief')

@section('js')
<!-- Ckeditor -->
<script type="text/javascript" src="{{ asset('assets/widgets/ckeditor/ckeditor.js') }}"></script>
<script>
   var config = {
			// Define the toolbar groups as it is a more accessible solution.
			toolbarGroups: [
				{"name":"basicstyles","groups":["basicstyles"]},
				{"name":"paragraph","groups":["list","blocks"]},
				{"name":"styles","groups":["styles"]}
			],
			// Remove the redundant buttons from toolbar groups defined above.
			removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
		},
	config = CKEDITOR.tools.prototypedCopy(config);
  	CKEDITOR.replace('job_function', config);
	CKEDITOR.replace('general_information', config);
	CKEDITOR.replace('characteristics', config);
</script>
@stop

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('hiring_brief') }}">Hiring Brief</a>
    </li>
    <li>
    	<span><em>Result Of Brief</em></span>
    </li>
</ol>

<h2>Input Result Hiring Brief</h2>
<br />

<div class="row">
    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
		        <div class="example-box-wrapper">

		        	<form role="form" action="{{ route('store.input.brief',$data->hiring_briefs->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
			        @csrf
			        @method('PATCH')

			        	<div class="row" style="padding-top: 40px;">
			        		<div class="col-md-12">
			        			<div class="form-group">
			        				<label class="col-md-2 control-label" style="padding-left: 20px;">Job Function</label>
			        				<div class="col-md-8">
			        					<textarea class="form-control" rows="10" name="job_function" id="job_function">{{ $data->hiring_briefs->job_function }}</textarea>
			        				</div>
			        			</div>
			        		</div>

			        		<div class="col-md-12">
			        			<div class="form-group">
			        				<label class="col-md-2 control-label" style="padding-left: 20px;">General Information</label>
			        				<div class="col-md-8">
			        					<textarea class="form-control" rows="10" name="general_information" id="general_information">{{ $data->hiring_briefs->general_information }}</textarea>
			        				</div>
			        			</div>
			        		</div>

			        		<div class="col-md-12">
			        			<div class="form-group">
			        				<label class="col-md-2 control-label" style="padding-left: 20px;">Characteristics</label>
			        				<div class="col-md-8">
			        					<textarea class="form-control" rows="10" name="characteristics" id="characteristics">{{ $data->hiring_briefs->characteristic }}</textarea>
			        				</div>
			        			</div>
			        		</div>

			        		<div class="col-md-12">
			        			<div class="form-group text-center">
			        				<button type="submit" class="btn btn-info">Input</button>	
			        			</div>
			        		</div>
			        	</div>

		            </form>	
		        </div>
	        </div>

	    </div>
    </div>
</div>
@endsection