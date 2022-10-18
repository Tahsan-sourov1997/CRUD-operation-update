@extends('master')
@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Course List</b></div>
			<div class="col col-md-6">
				<a href="{{ route('course.create') }}" class="btn btn-success btn-sm float-end">Add Course</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<tr>
				<th> Course Name</th>
				<th>Course Duration</th>
				<th>Course Type</th>
                <th>Student Id</th>
				<th>Action</th>
			</tr>
			@if(count($course) > 0)

				@foreach($course as $row)

					<tr>
						<td>{{ $row->course_name }}</td>
						<td>{{ $row->course_duration }}</td>
						<td>{{ $row->course_type }}</td>
                        <td>{{ $row->student_id }}</td>
						<td>
							<form method="post" action="{{ route('course.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('students.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
								<a href="{{ route('course.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
								<input type="submit" class="btn btn-danger btn-sm" value="Delete" />
							</form>
							
						</td>
					</tr>

				@endforeach

			@else
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			@endif
		</table>
		{!! $course->links() !!}
	</div>
</div>

@endsection