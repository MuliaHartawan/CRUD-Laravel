@extends('layout.master')

@section('title')

@section('content')


    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah jawaban</h6>
            </div>
            
            <div class="card-body">
                <form method="post" action="{{ url('/jawaban/'.$pertanyaan->id) }}">
                @csrf
                    <div class="form-group">
                        <label for="judulPertanyaa">Pertanyaan</label>
                        <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan" name="pertanyaan" readonly value="{{ $pertanyaan->isi }}" >
                        @error('pertanyaan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="jawaban">Isi jawaban</label>
                        <input type="text" class="form-control @error('jawaban') is-invalid @enderror" id="jawaban" name="jawaban" value="{{old('jawaban')}}"placeholder="Tuliskan jawaban anda">
                        @error('jawaban')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ '/pertanyaan' }}" class="btn btn-warning">Kembali</a>
                </form>
                
            </div>
        </div>

@endsection
