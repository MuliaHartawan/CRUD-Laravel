@extends('layout.master')

@section('title', 'View Jawaban')

@section('content')

     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper ">
        <a href="/pertanyaan" class="btn btn-warning mx-4"><i class="fas fa-arrow-left"></i></a>
            
    <!-- Content Header (Page header) -->
        <div class="card-body">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jawaban</li>
        </ol>
            <div class="mt-4 col-sm-11 mx-auto">
                <div class="col align-self-end">
                    <a href="{{ 'pertanyaan/'.$pertanyaan->id.'/update' }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                </div>
                    <h1>{{$pertanyaan->judul}}</h1>
                    <hr>
                    <p>Isi Pertanyaan</p>
                    <h2>{{$pertanyaan->isi}}</h2>            

                    <h4 class="mt-5">Jawaban</h4>
                    @foreach($jawaban as $value)
                        <div class="card">
                            <div class="card-body">
                               {{ $value->isi }}
                            </div>
                        </div> 
                    @endforeach
                    <div class="mt-5">
                        <hr>
                        <form action="/jawaban/{$jawaban->id}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Jawaban</label>
                                <textarea class="form-control" id="isi" name="isi" rows="3" placeholder="Masukkan Jawaban Anda!"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post</button>
                            <a href="{{ '/pertanyaan' }}" class="btn btn-warning">Cancel</a>
                        </form>
                    </div>
            </div>
        </div>
    </div>
  <!-- /.content-wrapper -->
@endsection
