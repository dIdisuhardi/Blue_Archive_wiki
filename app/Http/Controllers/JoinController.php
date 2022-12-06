<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profil;

class JoinController extends Controller
{
        
    
    public function index( Request $request){
        if ($request->has('search')){
            $join = $request->get ('joins');
            $joins = DB::table('profil')
            ->join('characters', 'profil.id_character', '=', 'characters.id_character')
            ->select('profil.*', 'characters.*')
            ->where ('profil.age', 'like', '%'. $request->search. '%')
            ->orWhere ('characters.name', 'like', '%'. $request->search. '%')
            ->get();
            // return view('join')->with('joins',$joins);
        }else{
            $joins = DB::table('profil')
            ->join('characters', 'profil.id_character', '=', 'characters.id_character')
            ->select('profil.*', 'characters.*')
            ->get();
            // return view('join')->with('joins',$joins);
    }
    return view('join')->with('joins',$joins); 
}
}