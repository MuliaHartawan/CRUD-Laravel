<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;
use App\Pertanyaan;
use Illuminate\Support\Facades\Validator;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pertanyaan_id)
    {
        //
        $jawaban = Jawaban::where('pertanyaan_id', $pertanyaan_id)->get();
        $pertanyaan = Pertanyaan::findOrFail($pertanyaan_id);

        return view('jawaban.show', [
            'jawaban' => $jawaban,
            'pertanyaan' => $pertanyaan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pertanyaan_id)
    {
        //

        $pertanyaan = Pertanyaan::where("id", $pertanyaan_id)->first();
        return view ('jawaban.show', [
            'pertanyaan' => $pertanyaan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $pertanyaan_id)
    {
        //
        $messages = [
            'required' => ': attribute harus diisi'
        ];

        //rules validasi inputan user
        Validator::make($request->all(), [
            'jawaban' => 'required'
        ], $messages)->validate();

        //jika lolos verifikasi insert ke database
        $jawaban = Jawaban::create([
            'isi' => $request->jawaban,
            'pertanyaan_id' => $pertanyaan_id
        ]);
        if ($jawaban) {
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
    }
}
