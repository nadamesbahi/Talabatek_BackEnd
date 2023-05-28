<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Restaurant::all();
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
        return Restaurant::find($id);
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

        $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'adresse' => 'required',
            'telephone' => 'required',
            'mot_de_passe' => 'required|max:8',
            // 'photo' => 'required|image'
        ]);
        $restaut = Restaurant::find($id);

        $restaut->fill($request->post())->update();

        if ($request->hasFile('photo')) {

            if ($restaut->photo) {
                $path = public_path('storage/' . $restaut->photo);
                if (file_exists($path)) {

                    unlink($path);
                }
            }
            $restaut->photo = $request->photo->store('images', 'public');
        }
        $restaut->save();
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

    }
    public function changerEtatSupress($id){
        $restaut=Restaurant::find($id);
        if ($restaut) {
            $restaut->etat = 'en attente';
            $restaut->save();
            return 'with succeee';
        }
    }
}
