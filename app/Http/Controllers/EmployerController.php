<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Http\Requests\StoreEmployeRequest;
use App\Models\Employer;
use App\Http\Requests\UpdateEmployeRequest;

class EmployerController extends Controller
{
    public function index()
    {
        $employers = Employer::with('departement')->paginate(10);
        return view('employers.index', compact('employers'));
    }
    
    public function create()
    {
            $departements = Departement::all();
            return view('employers.create', compact('departements'));   
    }

    public function edit(Employer $employer)
    {
             
            $departements = Departement::all();
            return view('employers.edit', compact('employer','departements'));  
    }

    public function store(StoreEmployeRequest $request)
    {
         try {
            $query = Employer::create($request->all());
            if ($query) {
                return redirect()->route('employer.index')->with('success_message','Employer ajoute');
            }
         } catch (Exception $e) {
            dd($e);
         }
    }

    public function update(UpdateEmployeRequest $request,Employer $employer)
    {
        try {
            //code...
            $employer->nom = $request->nom;
            $employer->prenom = $request->prenom;
            $employer->email = $request->email;
            $employer->contact = $request->contact;
            $employer->departement_id = $request->departement_id;
            $employer->montant_journalier = $request->montant_journalier;

            $employer->update();

           return redirect()->route('employer.index')->with('success_message','Les informations de l\'employer ont ete mise a jour'); 

        } catch (Exception $e) {
            dd($e);
        }
    }

    public function delete(Employer $employer)
    {
            try {
                //code...
                $employer->delete();

                return redirect()->route('employer.index')->with('success_message','Employer retirer');
            } catch (Exception $e) {
                //throw $th;
                dd($e);
            }
    }
}
