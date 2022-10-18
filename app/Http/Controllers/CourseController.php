<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;

class CourseController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::latest()->paginate(5);

        return view('fontend', compact('course'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fcreate');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name'       => 'required',
            'course_duration'   => 'required',
            'student_id'        => 'required',
        ]);

        $course = new Course;

        $course->course_name = $request->course_name;
        $course->course_duration = $request->course_duration;
        $course->course_type = $request->course_type;
        $course->student_id = $request->student_id;

        $course->save();

        return redirect()->route('course.index')->with('success', 'course Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('fshow', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('fedit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_name'       => 'required',
            'course_duration'   => 'required',
            'student_id'        => 'required',
        ]);

        $course = Course::find($request->hidden_id);

        $course->course_name = $request->course_name;

        $course->course_duration = $request->course_duration;

        $course->course_type = $request->course_type;

        $course->student_id = $request->student_id;

        $course->save();

        return redirect()->route('course.index')->with('success', 'Student Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('course.index')->with('success', 'Course Data deleted successfully');
    }
}

