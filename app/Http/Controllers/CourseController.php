<?php

namespace App\Http\Controllers;

use App\course;
use App\Http\Requests\CourseRequest;
use App\Http\Services\CourseService;
use Collective\Html\FormFacade;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * @var CourseService
     */
    private $courseService;

    /**
     * CourseController constructor.
     * @param CourseService $courseService
     */
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->courseService->index(request()->instance());

        return view("courses.index", compact("courses"))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return $this->courseService->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        //
        $this->courseService->store($request);
        return redirect()->route("course.index")
            ->with("success", trans("messages.course_created_successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\course $course
     * @return \Illuminate\Http\Response
     */
    public function show(course $course)
    {
        //
        $course = $this->courseService->show($course);
        return view("courses.show", compact("course"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(course $course)
    {
        //
        return $this->courseService->edit($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CourseRequest $request
     * @param \App\course $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, course $course)
    {
        //
        $this->courseService->update($request, $course);
        return redirect()->route("course.index")
            ->with("success", trans("messages.course_updated_successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(course $course)
    {
        //
        $this->courseService->destroy($course);

        return redirect()->route("course.index")
            ->with("success", trans("messages.course_deleted_successfully"));
    }
}
