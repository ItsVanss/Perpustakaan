@extends('layout.app')

@section('title', 'Category')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Kategori</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Kategori</h4>
                <div class="card-header-form">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalCenter"><i
                            class="fas fa-plus"></i> Tambah Data</button>

                </div>
            </div>

            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Name</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>

                            <td>
                                <div>
                                    <form action="/kategori/delete/{{$item->id}}">
                                        <a href="/kategori/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
@endsection

@section('script')
<script src="{{asset('assets/modules/iziToast.min.js')}}"></script>

@include('category.form')

@if(session('sukses'))
<script>
    iziToast.success({
        title: '{{session('sukses')}}',
        position: 'topRight'
    });
</script>
@endif

@endsection
