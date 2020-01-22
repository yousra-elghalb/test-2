<?php

namespace App\Http\Controllers;

use App\categorie;
use App\Http\Requests\CategorieRequest;
use App\Http\Services\CategorieService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class CategorieController extends Controller
{
    /**
     * @var CategorieService
     */
    private $categorieService;

    /**
     * CategorieController constructor.
     * @param CategorieService $categorieService
     */
    public function __construct(CategorieService $categorieService)
    {
        $this->categorieService = $categorieService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categorieService->index(request()->instance());

        return view("categories.index", compact("categories"))
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
        return $this->categorieService->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategorieRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorieRequest $request)
    {
        //
        $this->categorieService->store($request);

        return redirect()->route("categories.index")
            ->with("success", trans("messages.category_created_successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\categorie $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(categorie $categorie)
    {
        //
        $categorie = $this->categorieService->show($categorie);
        return view("categories.show", compact("categorie"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\categorie $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(categorie $categorie)
    {
        //
        return $this->categorieService->edit($categorie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategorieRequest $request
     * @param \App\categorie $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(CategorieRequest $request, categorie $categorie)
    {
        //
        $this->categorieService->update($request, $categorie);
        return redirect()->route("categories.index")
            ->with("success", trans("messages.category_updated_successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\categorie $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorie $categorie)
    {
        //
        $this->categorieService->destroy($categorie);

        return redirect()->route("categories.index")
            ->with("success", trans("messages.category_deleted_successfully"));
    }
}
