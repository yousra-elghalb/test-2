<?php


namespace App\Http\Services;


use App\categorie;
use App\Http\Requests\CategorieRequest;
use Illuminate\Http\Request;

interface CategorieService
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
     * @param CategorieRequest $request
     */
    public function store(CategorieRequest $request);

    /**
     * Display the specified resource.
     *
     * @param \App\categorie $categorie
     */
    public function show(categorie $categorie);

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\categorie $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(categorie $categorie);

    /**
     * Update the specified resource in storage.
     *
     * @param CategorieRequest $request
     * @param \App\categorie $categorie
     */
    public function update(CategorieRequest $request, categorie $categorie);

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\categorie $categorie
     */
    public function destroy(categorie $categorie);
}
