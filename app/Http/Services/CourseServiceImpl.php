<?php


namespace App\Http\Services;


use App\categorie;
use App\course;
use App\Http\Requests\CourseRequest;
use App\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CourseServiceImpl implements CourseService
{

    /**
     * @inheritDoc
     */
    public function index(Request $request)
    {
        // TODO: Implement index() method.
        $courses = course::paginate(10);
        return $courses;
    }

    /**
     * @inheritDoc
     */
    public function create()
    {
        // TODO: Implement create() method.
        $categories = categorie::pluck("name", "id");
        return view('courses.create', compact("categories"));
    }

    /**
     * @inheritDoc
     */
    public function store(CourseRequest $request)
    {
        // TODO: Implement store() method.
        $image = new image();
//        if ($request->hasFile('image')) {
        $pic = $request->file('image');
        $imagename = Storage::putFile('public/images', $pic);
        $image->file_name = $imagename;
//        }
        /** @var course $course */
        $course = new course($request->all());
        DB::transaction(function () use ($image, $course) {
            $course->saveOrFail();
            $course->image()->save($image);
        });
    }

    /**
     * @inheritDoc
     */
    public function show(course $course)
    {
        // TODO: Implement show() method.
        return $course;
    }

    /**
     * @inheritDoc
     */
    public function edit(course $course)
    {
        // TODO: Implement edit() method.
        return view("courses.edit", compact("course"));
    }

    /**
     * @inheritDoc
     */
    public function update(CourseRequest $request, course $course)
    {
        // TODO: Implement update() method.
        $image = isset($course->image) ? $course->image : new image();
        if ($request->hasFile('image')) {
            $pic = $request->file('image');
            $imagename = Storage::putFile('public/images', $pic);
            $image->file_name = $imagename;
        }
        $course->description = $request->description;
        $course->categorie_id = $request->categorie_id;
        $course->name = $request->name;
        $course->slug = $request->slug;
        DB::transaction(function () use ($image, $course) {
            $course->saveOrFail();
            $course->image()->save($image);
        });
    }

    /**
     * @inheritDoc
     */
    public function destroy(course $course)
    {
        // TODO: Implement destroy() method.
        $course->delete();
    }
}
