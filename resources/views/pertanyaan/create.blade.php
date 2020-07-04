@extends('layout.master')

@section('title', 'Pertanyaan')

@section('content')


    <!-- DataTales Example -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Pertanyaan</li>
        </ol>

        <div class="col-sm-11 mx-auto">
            <div class="card shadow mb-4">    
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Pertanyaan</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{'/pertanyaan'}}">
                    @csrf
                        <div class="form-group">
                            <label for="judulPertanyaa">Judul Pertanyaan</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{old('judul')}}" placeholder="Masukkan Judul Pertanyaan">
                            @error('judul')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="isiPertanyaan">Isi Pertanyaan</label>
                            <input type="text" class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" value="{{old('isi')}}" placeholder="Masukkan Isi Pertanyaan"> 
                            @error('isi')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ '/pertanyaan' }}" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>

@endsection
