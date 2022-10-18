@extends('master')

@section('content')

<div class="card">
	<div class="card-header">Edit Course</div>
	<div class="card-body">
		<form method="post" action="{{ route('course.update', $course->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Course Name</label>
				<div class="col-sm-10">
					<input type="text" name="course_name" class="form-control" value="{{ $course->course_name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Course Duration</label>
				<div class="col-sm-10">
					<input type="text" name="course_duration" class="course_duration" value="{{ $course->course_duration }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Course Type </label>
				<div class="col-sm-10">
					<select name="course_type" class="form-control">
						<option value="EEE">EEE</option>
						<option value="CSE">CSE</option>
                        <option value="English">English</option>
					</select>
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Student id</label>
				<div class="col-sm-10">
					<input type="text" name="student_id" class="student_id" value="{{ $course->student_id }}" />
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $student->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>	
		</form>
	</div>
</div>
<script>
document.getElementsByName('course_type')[0].value = "{{ $course->course_type }}";
</script>

@endsection('content')