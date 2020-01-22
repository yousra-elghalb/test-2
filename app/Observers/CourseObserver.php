<?php

namespace App\Observers;

use App\course;

class CourseObserver
{
    /**
     * Handle the course "created" event.
     *
     * @param \App\course $course
     * @return void
     */
    public function created(course $course)
    {
        //
    }

    /**
     * Handle the course "updated" event.
     *
     * @param \App\course $course
     * @return void
     */
    public function updated(course $course)
    {
        //
    }

    /**
     * Handle the course "deleted" event.
     *
     * @param \App\course $course
     * @return void
     */
    public function deleted(course $course)
    {
        //
        if (isset($course->image)) {
            $course->image->delete();
        }
    }

    /**
     * Handle the course "restored" event.
     *
     * @param \App\course $course
     * @return void
     */
    public function restored(course $course)
    {
        //
    }

    /**
     * Handle the course "force deleted" event.
     *
     * @param \App\course $course
     * @return void
     */
    public function forceDeleted(course $course)
    {
        //
    }
}
