<?php

namespace App\Observers;

use App\image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageObserver
{
    /**
     * Handle the image "created" event.
     *
     * @param \App\image $image
     * @return void
     */
    public function created(image $image)
    {
        //
    }

    /**
     * Handle the image "updated" event.
     *
     * @param \App\image $image
     * @return void
     */
    public function updated(image $image)
    {
        //
        Storage::delete($image->getOriginal("file_name"));

    }

    /**
     * Handle the image "deleted" event.
     *
     * @param \App\image $image
     * @return void
     */
    public function deleted(image $image)
    {
        //
        Storage::delete($image->file_name);

    }

    /**
     * Handle the image "restored" event.
     *
     * @param \App\image $image
     * @return void
     */
    public function restored(image $image)
    {
        //
    }

    /**
     * Handle the image "force deleted" event.
     *
     * @param \App\image $image
     * @return void
     */
    public function forceDeleted(image $image)
    {
        //
    }
}
