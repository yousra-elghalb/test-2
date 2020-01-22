<?php

use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 1; $i <= 15; $i++) {
            $Categorie = new \App\categorie(["name" => "cat " . $i, "slug" => "s " . $i]);
            $Categorie->save();
        }
    }
}
