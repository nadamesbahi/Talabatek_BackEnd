<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Plat::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|integer',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
            'idCategorie' => 'required',
        ]);
        $plat = new Plat();
        $plat->nom = $request->nom;
        $plat->prix = $request->prix;
        $plat->description = $request->description;

        if ($request->hasFile('image'))
            $plat->photo = $request->file('photo')->store('images', 'public');

        $plat->idCategorie = $request->idCategorie;
        $plat->save();
        return 'succc';
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
        $platInfo = Plat::where('id', '=', $id);
        if (!$platInfo) {
            return back()->with("fail", "no plat trouver");
        } else {
        $plat = Plat::find($id);
        $plat->nom = $request->nom;
        $plat->prix = $request->prix;
        $plat->description = $request->description;
        if ($request->hasFile('image')) {
            if ($plat->photo) {
                $path = public_path('storage/' . $plat->image);
                if (file_exists($path)) {
                    //supprimer la photo
                    File::unlink($path);
                }
            }
            $plat->photo = $request->photo->store('images', 'public');
        }
        $plat->idCategorie = $request->idCategorie;
        $plat->save();
        return 'Modification avec sucess!!';
        }
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
        $plat = Plat::find($id);
        $plat->delete();
        return redirect('/plats')->with(['success' => 'Deleted with success']);
    }
}
