<?php

Namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\School;

class SchoolController extends Controller
{

    public function create() {
        return view('School.add');
        }
    public function store(Request $request) {
        $request->validate([
        'ID_School' => 'required',
        'Name_School' => 'required',
        'School_type' => 'required',

        ]);
        // Menggunakan Query Builder Laravel dan Name_Schoold Bindings untuk valuesnya

        DB::insert('INSERT INTO School(ID_School, Name_School, School_type, hapus) VALUES (:ID_School, :Name_School, :School_type, 0)',
        [
        'ID_School' => $request->ID_School,
        'Name_School' => $request->Name_School,
        'School_type' => $request->School_type,
        ]
        );
        return redirect()->route('School.index')->with('success', 'Data Sekolah berhasil disimpan');
        }
    public function index(Request $request) {
        if ($request->has('search')) {
            $datas = DB::select('SELECT * from School WHERE ID_School like :search AND hapus <> 1 ' ,[
                'search' => $request->search,
            ]);
        }else{
            $datas = DB::select('SELECT * FROM School WHERE hapus <> 1');
        }
        return view('School.index')->with('datas',$datas);
        }
    public function edit($id) {
        $data = DB::table('School')->where('ID_School', $id)->first();
        return view('School.edit')->with('data', $data);
        }
    public function update($id, Request $request) {
        $request->validate([
        'ID_School' => 'required',
        'Name_School' => 'required',
        'School_type' => 'required',
            ]);
            // Menggunakan Query Builder Laravel dan Name_Schoold Bindings untuk valuesnya
            DB::update('UPDATE School SET Name_School = :Name_School, School_type = :School_type WHERE ID_School = :ID_School',
            [
                // 'id' => $id,
                'ID_School' => $request->ID_School,
                'Name_School' => $request->Name_School,
                'School_type' => $request->School_type,
            ]
            );
            return redirect()->route('School.index')->with('success', 'Data Sekolah berhasil diubah');
            }
        public function delete($id) {
            // Menggunakan Query Builder Laravel dan Name_Schoold Bindings untuk valuesnya
            DB::update('UPDATE School SET HAPUS = 1 WHERE ID_School = :ID_School', ['ID_School' => $id]);
            return redirect()->route('School.indexDelete')->with('success', 'Data Sekolah berhasil dihapus');
            }
        public function hardDelete($id) {
                // Menggunakan Query Builder Laravel dan Name_Schoold Bindings untuk valuesnya
                DB::delete('DELETE FROM School WHERE ID_School = :ID_School', ['ID_School' => $id]);
                return redirect()->route('School.index')->with('success', 'Data Sekolah berhasil dihapus');
                }
                public function indexDelete(Request $request) {
                    if ($request->has('search')) {
                        $datasi = DB::select('SELECT * from School WHERE ID_School like :search AND HAPUS <> 0 ' ,[
                            'search' => $request->search,
                        ]);
                    }else{
                        $datasi = DB::select('SELECT * FROM School WHERE HAPUS <> 0');
                    }
                    
                    return view('School.indexDelete')->with('datasi',$datasi);
                    }
                    public function restore($id) {
                        DB::update('UPDATE School SET HAPUS = 0 WHERE ID_School = :ID_School', ['ID_School' => $id]);
                        return redirect()->route('School.indexDelete')->with('success', 'Data Sekolah berhasil dikembalikan');
                        }
                    
}
