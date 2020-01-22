<?php

namespace App\Observers;

use App\categorie;
use Illuminate\Support\Facades\Storage;

class CategorieObserver
{
    /**
     * Handle the categorie "created" event.
     *
     * @param \App\categorie $categorie
     * @return void
     */
    public function created(categorie $categorie)
    {
        //
    }

    /**
     * Handle the categorie "updated" event.
     *
     * @param \App\categorie $categorie
     * @return void
     */
    public function updated(categorie $categorie)
    {
        //
    }

    /**
     * Handle the categorie "deleted" event.
     *
     * @param \App\categorie $categorie
     * @return void
     */
    public function deleted(categorie $categorie)
    {
        //
        if (isset($categorie->image)) {
            $categorie->image->delete();
        }
    }

    /**
     * Handle the categorie "restored" event.
     *
     * @param \App\categorie $categorie
     * @return void
     */
    public function restored(categorie $categorie)
    {
        //
    }

    /**
     * Handle the categorie "force deleted" event.
     *
     * @param \App\categorie $categorie
     * @return void
     */
    public function forceDeleted(categorie $categorie)
    {
        //
    }
}
