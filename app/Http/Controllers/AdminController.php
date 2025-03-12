<?php

namespace App\Http\Controllers;

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

    public function store(){
        
    }
}
