@extends('layout.master')

@section('title', 'Pertanyaan')

@section('content')


    <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Pertanyaan</h6>
            </div>

            
            <!-- Button trigger modal -->
            <div class="row">
                <div class="col-1 mx-4 my-2">
                  <a href="{{'/pertanyaan/create'}}" class="btn btn-success"><i class="fas fa-plus"></i>Tambah</a>
                </div>
            </div>
            @if(session('sukses'))
                <div class="mx-4 my-2">
                  <div class="alert alert-success" role="alert">
                    {{ session('sukses') }}
                  </div>
                </div>
            @endif

              @foreach ($pertanyaan as $value) 
              <div class="card-body">
                <h5 class="card-header">{{$value->judul}}</h5>
                      <div class="card-body">
                        <h5 class="card-title">{{$value->isi}}</h5>
                        <a href="" class="card-text">Respon</a>
                        <a href="{{'/jawaban/' . $value->id }}" class="btn btn-primary">info</a>
                      </div>
              </div>
              @endforeach
            </div>

@endsection
