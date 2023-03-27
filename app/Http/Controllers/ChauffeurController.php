<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Chauffeur;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    public function  activateaccount(Request $request){
         
        $id = Auth::id();
        $addChauffeur=new Chauffeur ;
        $addChauffeur->UserId = $id;
        $addChauffeur->disponibility = "1";
        $addChauffeur->save();
        return view('profile.show');
 
    }

    public function  changeDisponibility(Request $request){
         
        // $chauffeur=Chauffeur::select()->where('UserId', Auth::id());
        $chauffeur=Chauffeur::find(1);
        $chauffeur->disponibility=$request->input('disponibility');
        $chauffeur->save();
        return view('profile.show');
 
    }

    public function  chauffeurDisponibility(Request $request){

        $id = Auth::id();
        $disponibility= Chauffeur::select()->where('UserId',$id)->get();
        return view('profile.show')->with('disponibility',$disponibility);
 
    }

}
