<?php

namespace App\Http\Controllers\Api;

use App\Models\Plat;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Categorie::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'photo' => 'required|image',
        ]);
        $imageName = Str::random() . '.' . $request->photo->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('Categorie/image', $request->photo, $imageName);
        Categorie::create($request->post()+ ['photo'=>$imageName]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function categoriPlat($id)
    {
        $plat = Plat::findOrFail($id);
        $idCategorie = $plat->idCategorie;
        $platsMemeCategorie = Plat::where('idCategorie', $idCategorie)->get();
        return response()->json($platsMemeCategorie);
    }
}
