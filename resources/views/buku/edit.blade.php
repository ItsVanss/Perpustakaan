@extends('layout.app')

@section('title', 'Edit Data Buku')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Buku</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Buku</h4>
            </div>
            <div class="card-body">
                <form action="/buku/{{$buku->id}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" name="kode" value="{{$buku->kode}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" name="judul" value="{{$buku->judul}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="penerbit_id">Penerbit</label>
                                <select class="custom-select" name="penerbit_id">
                                    @foreach ($penerbit as $penerbit)
                                    <option value="{{$penerbit->id}}">{{$penerbit->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <select class="custom-select" name="kategori_id">
                                    @foreach ($kategori as $kategori)
                                    <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="number" class="form-control" name="isbn" value="{{$buku->isbn}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <input type="text" class="form-control" name="pengarang" value="{{$buku->pengarang}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jumlah_halaman">Jumlah Halaman</label>
                                <input type="number" class="form-control" name="jumlah_halaman" value="{{$buku->jumlah_halaman}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" class="form-control" name="stok" value="{{$buku->stok}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun_terbit">Tahun Terbit</label>
                                <input type="date" class="form-control" name="tahun_terbit" value="{{$buku->tahun_terbit}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <img src="{{asset('/storage/buku/'.$buku->foto) }}" class="rounded mb-1 mt-1 " style="width: 150px" >
                                <input type="file" class="form-control-file" name="foto">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sinopsis">Sinopsis</label>
                                <textarea class="form-control" name="sinopsis">{{$buku->sinopsis}}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-md btn-success"><i class="fa fa-save"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection