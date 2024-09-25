@extends('admin.layouts.app')
@section('konten')
    <br>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <h1 align="center">Edit Pengumuman Desa</h1>
    <hr>

    <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="title" class="col-4 col-form-label">Judul Pengumuman</label>
            <div class="col-8">
                <input id="title" name="title" type="text" class="form-control" value="{{ $pengumuman->title }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-4 col-form-label">Deskripsi</label>
            <div class="col-8">
                <textarea id="deskripsi" name="deskripsi" cols="40" rows="5" class="form-control">{{ $pengumuman->deskripsi }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="tanggal" class="col-4 col-form-label">Tanggal Pengumuman</label>
            <div class="col-8">
                <input id="tanggal" name="tanggal" type="date" class="form-control" value="{{ $pengumuman->tanggal }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="gambar" class="col-4 col-form-label">Foto Pengumuman</label>
            <div class="col-8">
                <input id="gambar" name="gambar" type="file" class="form-control" accept=".png, .jpg, .jpeg, .svg" value="{{ $pengumuman->gambar }}">
                <br>
                @if (!empty($pengumuman->gambar))
                    <img src="{{ url('admin/image') }}/{{ $pengumuman->gambar }}" alt="" width="250px">
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
