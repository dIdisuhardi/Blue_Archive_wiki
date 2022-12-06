<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profil;

class ProfilController extends Controller
{

    public function create() {
        return view('Profil.add');
        }
    public function store(Request $request) {
        $request->validate([
        'ID_Profil' => 'required',
        'Name' => 'required',
        'AGE' => 'required',
        'Height' => 'required',
        'Hobby' => 'required',
        'Birthday' => 'required',
        'ID_Character' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya

        DB::insert('INSERT INTO Profil(ID_Profil, Name, AGE, Height, Hobby, Birthday, ID_Character, hapus) VALUES (:ID_Profil, :Name, :AGE, :Height, :Hobby, :Birthday, :ID_Character, 0)',
        [
        'ID_Profil' => $request->ID_Profil,
        'Name' => $request->Name,
        'AGE' => $request->AGE,
        'Height' => $request->Height,
        'Hobby' => $request->Hobby,
        'Birthday' => $request->Birthday,
        'ID_Character' => $request->ID_Character,
        ]
        );
        return redirect()->route('Profil.index')->with('success', 'Data Profil berhasil disimpan');
        }
    public function index(Request $request) {
        if ($request->has('search')) {
            $datas = DB::select('SELECT * from Profil WHERE ID_Profil like :search AND hapus <> 1 ' ,[
                'search' => $request->search,
            ]);
        }else{
            $datas = DB::select('SELECT * FROM Profil WHERE hapus <> 1');
        }
        
       
        return view('Profil.index')->with('datas',$datas);
       

        }
    public function edit($id) {
        $data = DB::table('Profil')->where('ID_Profil', $id)->first();
        return view('Profil.edit')->with('data', $data);
        }
    public function update($id, Request $request) {
        $request->validate([
        'ID_Profil' => 'required',
        'Name' => 'required',
        'AGE' => 'required',
        'Height' => 'required',
        'Hobby' => 'required',
        'Birthday' => 'required',
        'ID_Character' => 'required',
            ]);
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::update('UPDATE Profil SET Name = :Name, AGE = :AGE, Height = :Height, Hobby = :Hobby, Birthday = :Birthday, ID_Character = :ID_Character where ID_Profil = :ID_Profil',
            [
                // 'id' => $id,
                'ID_Profil' => $request->ID_Profil,
                'Name' => $request->Name,
                'AGE' => $request->AGE,
                'Height' => $request->Height,
                'Hobby' => $request->Hobby,
                'Birthday' => $request->Birthday,
                'ID_Character' => $request->ID_Character,
            ]
            );
            return redirect()->route('Profil.index')->with('success', 'Data Profil berhasil diubah');
            }
        public function delete($id) {
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::update('UPDATE Profil SET HAPUS = 1 WHERE ID_Profil = :ID_Profil', ['ID_Profil' => $id]);
            return redirect()->route('Profil.indexDelete')->with('success', 'Data Profil berhasil dihapus');
            }
        public function hardDelete($id) {
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                DB::delete('DELETE FROM Profil WHERE ID_Profil = :ID_Profil', ['ID_Profil' => $id]);
                return redirect()->route('Profil.index')->with('success', 'Data Profil berhasil dihapus');
                }
                public function indexDelete(Request $request) {
                    if ($request->has('search')) {
                        $datasi = DB::select('SELECT * from Profil WHERE ID_Profil like :search AND HAPUS <> 0 ' ,[
                            'search' => $request->search,
                        ]);
                    }else{
                        $datasi = DB::select('SELECT * FROM Profil WHERE HAPUS <> 0');
                    }
                    
                    return view('Profil.indexDelete')->with('datasi',$datasi);
                    }
                    public function restore($id) {
                        DB::update('UPDATE Profil SET HAPUS = 0 WHERE ID_Profil = :ID_Profil', ['ID_Profil' => $id]);
                        return redirect()->route('Profil.indexDelete')->with('success', 'Data Profil berhasil dikembalikan');
                        }
                    
}
