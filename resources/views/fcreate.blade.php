@extends('master')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif

<div class="card">
	<div class="card-header">Add Course</div>
	<div class="card-body">
		<form method="post" action="{{ route('course.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Course Name</label>
				<div class="col-sm-10">
					<input type="text" name="course_name" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Course Duration</label>
				<div class="col-sm-10">
					<input type="text" name="course_duration" class="form-control" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Course Type</label>
				<div class="col-sm-10">
					<select name="course_type" class="form-control">
						<option value="EEE">EEE</option>
						<option value="CSE">CSE</option>
                        <option value="English">English</option>

					</select>
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Student Id</label>
				<div class="col-sm-10">
                    <input type="text" name="student_id" class="form-control" />
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Add" />
			</div>	
		</form>
	</div>
</div>

@endsection('content')