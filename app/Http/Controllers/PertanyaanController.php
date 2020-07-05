<?php


namespace App\Http\Controllers;

use App\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pertanyaan = Pertanyaan::all();

        return view ('pertanyaan.index', ['pertanyaan' => $pertanyaan]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('pertanyaan.create', ['title' => 'Tambah Pertanyaan']);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //insert data pertanyaan
        
        /* DB::table('pertanyaans')->insert([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]); */

        // \App\Pertanyaan::create($request->all());
        
        // return redirect ('/pertanyaan')->with('sukses', 'Data Berhasil Ditambahkan');

        $messages = [
            'required' => 'Kolom Tidak Boleh Kosong'
        ];

        //rules validasi inputan user
        Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required'
        ], $messages)->validate();

        //jika lolos verifikasi insert ke database
        $pertanyaan = Pertanyaan::create($request->all());

        if ($pertanyaan) {
            return redirect('/pertanyaan')->with('succes', 'Jawaban Berhasil Ditambahkan');
        }
        return redirect('/pertanyaan')->width('error', 'Jawaban Gagal Ditambahkan');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pertanyaan = Pertanyaan::findOrFail($request->id);
        // dd($pertanyaan);
        $jawaban = Jawaban::where('pertanyaan_id', $request->id)->get();
        return view('pertanyaan.detail', [
            'pertanyaan'    =>$pertanyaan,
            'jawaban'       => $jawaban,
            'title' => "Lihat Pertanyaan"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pertanyaan = Pertanyaan::find($id);
        return view('pertanyaan.update', ['pertanyaan' => $pertanyaan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $messages = [
            'required' => 'Kolom Tidak boleh Kosong'            
        ];

        //rules validasi inputan user
        Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required'
        ], $messages)->validate();

        // jika lolos verifikasi insert ke database
        $pertanyaan = Pertanyaan::where('id', $request->id)->update([
            'judul'             => $request->judul,
            'isi_pertanyaan'    => $request->isi,
        ]);

        if($pertanyaan){
            return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil diupdate');
        }
        return redirect('/pertanyaan')->with('error', 'Pertanyaan gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->delete();
        
        if($hasil){
            return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil dihapus');
        }
        return redirect('/pertanyaan')->with('error', 'Pertanyaan gagal dihapus');
    
    }
}
