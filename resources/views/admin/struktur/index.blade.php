@extends('admin.layouts.app')
@section('konten')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Struktur Desa</h4>
                            <a href="{{ route('struktur.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Tambah Struktur Desa
                                </button></a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Foto Perangkat Desa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>

                                        <th>Foto Perangkat Desa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($struktur as $s)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $s->nama }}</td>
                                            <td>{{ $s->jabatan }}</td>

                                            <td>
                                                @if ($s->foto_pd)
                                                    <img src="{{ url('admin/image') }}/{{ $s->foto_pd }}" width="100">
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <a href="{{ route('struktur.show', $b->id) }}"
                                                    class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a> --}}
                                                <a href="{{ route('struktur.edit', $s->id) }}"
                                                    class="btn btn-sm btn-warning"><i class="far fa-edit"></a></i>
                                                {{-- Ini AWAL MODAL HAPUS --}}
                                                <!-- Button trigger modal -->
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#addRowModal{{ $s->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="addRowModal{{ $s->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus
                                                                    Berita
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <form action="{{ route('struktur.destroy', $s->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endsection
