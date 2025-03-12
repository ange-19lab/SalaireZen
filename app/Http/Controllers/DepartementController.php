<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveDepartementRequest;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    //
    public function index()
    {
        $departements = Departement::paginate(10);
        return view('departements.index', compact('departements'));
    }
    
    public function create()
    {
            return view('departements.create');   
    }

    public function edit(Departement $departement)
    {
            return view('departements.edit', compact('departement'));   
    }

    //interaction avec la base de donnee

    public function store(Departement $departement,saveDepartementRequest $request){
        //Enregistrer un nouveau departement

        try {

            $departement->name = $request->name;
   
            $departement->save();

            return redirect()->route('departement.index')->with('success_message', 'Departement enregistre');

        } catch (Exception $e){
             dd($e);
        }
    }

    public function update(Departement $departement,saveDepartementRequest $request){
        //modifier un  departement

        try {

            $departement->name = $request->name;
   
            $departement->update();

            return redirect()->route('departement.index')->with('success_message', 'Departement mis a jour');

        } catch (Exception $e){
             dd($e);
        }
    }

    public function delete(Departement $departement){
        //modifier un  departement

        try {
   
            $departement->delete();

            return redirect()->route('departement.index')->with('success_message', 'Departement supprimer');

        } catch (Exception $e){
             dd($e);
        }
    }
}

