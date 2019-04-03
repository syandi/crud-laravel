    @extends('layouts.master')

@section('content')
        <h1>Edit data barang</h1>
            @if(session('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <form action="/barang/{{$barang->id}}/update" method="POST">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                            placeholder="name" value="{{$barang->name}}">
                            </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tipe</label>
                            <input name="tipe" type="text" class="form-control" id="exampleInputPassword1" 
                            placeholder="tipe" value="{{$barang->tipe}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" 
                            rows="3">{{$barang->deskripsi}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </form>
                </div>
            </div>
    @endsection