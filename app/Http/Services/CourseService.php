<?php


namespace App\Http\Services;


use App\course;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;

interface CourseService
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     */
    public function index(Request $request);

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create();

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseRequest $request
     */
    public function store(CourseRequest $request);

    /**
     * Display the specified resource.
     *
     * @param \App\course $course
     */
    public function show(course $course);

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(course $course);

    /**
     * Update the specified resource in storage.
     *
     * @param CourseRequest $request
     * @param \App\course $course
     */
    public function update(CourseRequest $request, course $course);

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\course $course
     */
    public function destroy(course $course);
}
