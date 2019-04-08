@extends('layouts.master')

@section('content')
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
        {{session('sukses')}}
    </div>
    @endif
    <div class="row">
        <div class="col-6">
            <h1>Data Barang</h1>
        </div>
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
            Tambah Data
            </button>
        </div>
            <table 
                data-toggle="table"
                data-pagination="true"
                data-search="true"
                data-sort-stable="true">
                <thead>
                    <tr>
                        <th data-field="id" data-sortable="true">ID</th>
                        <th data-field="name">Name</th>
                        <th data-field="tipe">Tipe</th>
                        <th data-field="deskripsi">deskripsi</th>
                        <th >Aksi</th>
                    </tr>
                </thead>
                @foreach($data_barang as $barang)
                <tr>
                    <td>{{$barang->id}}</td>
                    <td>{{$barang->name}}</td>
                    <td>{{$barang->tipe}}</td>
                    <td>{{$barang->deskripsi}}</td>
                    <td>
                        <a href="/barang/{{$barang->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/barang/{{$barang->id}}/delete" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Yakin menghapus Data ini?')">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </table>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Data Barang</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/barang/create" method="POST">
                {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                placeholder="name">
                </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tipe</label>
                <input name="tipe" type="text" class="form-control" id="exampleInputPassword1" 
                placeholder="tipe">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
@endsection