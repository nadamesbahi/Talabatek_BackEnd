<?php

namespace App\Http\Controllers\Api;

use App\Models\Plat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
        return Plat::where(['etat'=>'accepter'])->get();
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
            'prix' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'idCategorie' => 'required|integer'
        ]);

        $plat=Plat::create($request->post());
        return response()->json($plat);
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
        return Plat::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plat $plat)
    {
        //
        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'idCategorie' => 'required|integer'
        ]);

        $plat->fill($request->post())->update();

        $plat->etat='en attente';
        $plat->save();
        return 'Modification avec sucess!!';
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
        return 'Supression avec sucess!!';
    }

    public function platCategorie($id)
    {
        $plat = DB::table('plats')
            ->join('categories', 'plats.idCategorie', '=', 'categories.id')
            ->where('categories.id', $id)
            ->select('plats.id','plats.nom','plats.prix','plats.description','plats.photo')
            ->get();

        return $plat;

    }

}
