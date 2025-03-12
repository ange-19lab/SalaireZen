<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function create(){
        return view('admin/create');
    }

    public function edit(User $user){
        return view('admin/edit', compact('user'));
    }

    //Enregistrer un Admin en Base de donnee  et envoyer un mail

    public function store(StoreAdminRequest $request){
        try {
            //logique de la creation du compte


        } catch (Exception $e) {
           // dd($e);
            throw new Exception('Une erreur est survenue lors de la creation de cet administrateur');
        }
    }

    public function update(UpdateAdminRequest $request, User $user)
    {
        try {
            //Logique de la mise a jour de compte
        } catch (Exception $e) {
            //dd($e);
            throw new Exception('Une erreeur est survenue lors de la mise a jour des informations de l\'utilisateur');
        }
    }

    public function delete(User $user)
    {
        try {
            //code...
        } catch (Exception $e) {
            //throw $th;
        }
    }
}
