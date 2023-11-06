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
                <table class="table table-hover" id="category-table">
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
                                    <form action="/kategori/delete/{{$item->id}}" id="delete-form">
                                        <a href="/kategori/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" data-id="{{$item->id}}" onclick="confirmDelete(this)">
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
@include('category.form')


@push('script')
    <script>
        var data_kategori = $(this).attr('data-id')
    function confirmDelete(button) {
    
        event.preventDefault()
        const id = button.getAttribute('data-id');
        swal({
                title: 'Apa Anda Yakin ?',
                text: 'Anda akan menghapus Data Ketika Anda tekan OK, dan data tidak dapat dikembalikan !',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
              const form = document.getElementById('delete-form');
              // Setelah pengguna mengkonfirmasi penghapusan, Anda bisa mengirim form ke server
              form.action = '/kategori/delete/' + id // Ubah aksi form sesuai dengan ID yang sesuai
              form.submit();
            }
        });
    }
    
        $(document).ready(function() {
            $('#category-table').DataTable()
        });

        @if(session('sukses'))
        iziToast.success({
            title: 'sukses',
            message: '{{session('sukses')}}',
            position: 'topRight'
        });
        @endif
    </script>
@endpush

@endsection

