<?php


namespace App\Http\Services;


use App\categorie;
use App\Http\Requests\CategorieRequest;
use App\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategorieServiceImpl implements CategorieService
{

    /**
     * @inheritDoc
     */
    public function index(Request $request)
    {
        // TODO: Implement index() method.
        $categories = categorie::paginate(10);
        return $categories;
    }

    /**
     * @inheritDoc
     */
    public function create()
    {
        // TODO: Implement create() method.
        return view('categories.create');
    }

    /**
     * @inheritDoc
     */
    public function store(CategorieRequest $request)
    {
        // TODO: Implement store() method.
        $image = new image();
//        if ($request->hasFile('image')) {
        $pic = $request->file('image');
        $imagename = Storage::putFile('public/images', $pic);
        $image->file_name = $imagename;
//        }
        /** @var categorie $categorie */
        $categorie = new categorie($request->all());
        DB::transaction(function () use ($image, $categorie) {
            $categorie->saveOrFail();
            $categorie->image()->save($image);
        });
    }

    /**
     * @inheritDoc
     */
    public function show(categorie $categorie)
    {
        // TODO: Implement show() method.
        return $categorie;
    }

    /**
     * @inheritDoc
     */
    public function edit(categorie $categorie)
    {
        // TODO: Implement edit() method.
        return view("categories.edit", compact("categorie"));
    }

    /**
     * @inheritDoc
     */
    public function update(CategorieRequest $request, categorie $categorie)
    {
        // TODO: Implement update() method.
        $image = isset($categorie->image) ? $categorie->image : new image();
        if ($request->hasFile('image')) {
            $pic = $request->file('image');
            $imagename = Storage::putFile('public/images', $pic);
            $image->file_name = $imagename;
        }

        $categorie->name = $request->name;
        $categorie->slug = $request->slug;
        DB::transaction(function () use ($image, $categorie) {
            $categorie->saveOrFail();
            $categorie->image()->save($image);
        });
    }

    /**
     * @inheritDoc
     */
    public function destroy(categorie $categorie)
    {
        // TODO: Implement destroy() method.
        $categorie->delete();
    }
}
