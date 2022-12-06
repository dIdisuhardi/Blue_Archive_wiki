<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profil;

class JoinController extends Controller
{
    public function index(){
        $joins = DB::table('profil')
        ->join('characters', 'profil.id_character', '=', 'characters.id_character')
        ->select('profil.*', 'characters.*')
        ->get();
        return view('join')->with('joins',$joins);
    }
}
