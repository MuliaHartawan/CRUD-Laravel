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

        return view ('pertanyaan.create');
        
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
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->update($request->all());
        return view ('/pertanyaan')->swith('sukses', 'Data Telah Diubah');
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

        return redirect('/pertanyaan')->with('sukses', 'Data Berhasil Di Hapus');
    }
}
