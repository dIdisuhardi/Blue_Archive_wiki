<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Characters;

class CharactersController extends Controller
{

    public function create() {
        return view('Characters.add');
        }
    public function store(Request $request) {
        $request->validate([
        'ID_Character' => 'required',
        'Name' => 'required',
        'damage_type' => 'required',
        'Name_School' => 'required',
        'ID_School' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya

        DB::insert('INSERT INTO Characters(ID_Character, Name, damage_type, Name_School, ID_School, hapus) VALUES (:ID_Character, :Name, :damage_type, :Name_School, :ID_School, 0)',
        [
        'ID_Character' => $request->ID_Character,
        'Name' => $request->Name,
        'damage_type' => $request->damage_type,
        'Name_School' => $request->Name_School,
        'ID_School' => $request->ID_School,
        ]
        );
        return redirect()->route('Characters.index')->with('success', 'Data Karakter berhasil disimpan');
        }
    public function index(Request $request) {
        if ($request->has('search')) {
            $datas = DB::select('SELECT * from Characters WHERE ID_Character like :search AND hapus <> 1 ' ,[
                'search' => $request->search,
            ]);
        }else{
            $datas = DB::select('SELECT * FROM Characters WHERE hapus <> 1');
        }
        
       
        return view('Characters.index')->with('datas',$datas);
        }
    public function edit($id) {
        $data = DB::table('Characters')->where('ID_Character', $id)->first();
        return view('Characters.edit')->with('data', $data);
        }
    public function update($id, Request $request) {
        $request->validate([
        'ID_Character' => 'required',
        'Name' => 'required',
        'damage_type' => 'required',
        'Name_School' => 'required',
        'ID_School' => 'required',
            ]);
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::update('UPDATE Characters SET Name = :Name, damage_type = :damage_type, 
           Name_School = :Name_School, ID_School = :ID_School where ID_Character = :ID_Character',
            [
                // 'id' => $id,
                'ID_Character' => $request->ID_Character,
                'Name' => $request->Name,
                'damage_type' => $request->damage_type,
                'Name_School' => $request->Name_School,
                'ID_School' => $request->ID_School,
            ]
            );
            return redirect()->route('Characters.index')->with('success', 'Data Karakter berhasil diubah');
            }
        public function delete($id) {
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::update('UPDATE Characters SET HAPUS = 1 WHERE ID_Character = :ID_Character', ['ID_Character' => $id]);
            return redirect()->route('Characters.indexDelete')->with('success', 'Data Karakter berhasil dihapus');
            }
        public function hardDelete($id) {
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                DB::delete('DELETE FROM Characters WHERE ID_Character = :ID_Character', ['ID_Character' => $id]);
                return redirect()->route('Characters.index')->with('success', 'Data Karakter berhasil dihapus');
                }
                public function indexDelete(Request $request) {
                    if ($request->has('search')) {
                        $datasi = DB::select('SELECT * from Characters WHERE ID_Character like :search AND HAPUS <> 0 ' ,[
                            'search' => $request->search,
                        ]);
                    }else{
                        $datasi = DB::select('SELECT * FROM Characters WHERE HAPUS <> 0');
                    }
                    
                    return view('Characters.indexDelete')->with('datasi',$datasi);
                    }
                    public function restore($id) {
                        DB::update('UPDATE Characters SET HAPUS = 0 WHERE ID_Character = :ID_Character', ['ID_Character' => $id]);
                        return redirect()->route('Characters.indexDelete')->with('success', 'Data Karakter berhasil dikembalikan');
                        }
                    
}
