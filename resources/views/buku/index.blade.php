@extends('layout.app')

@section('title', 'Buku')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Buku</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Buku</h4>
                <div class="card-header-form">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-buku"><i
                            class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="buku-table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Judul</th>
                            {{-- <th scope="col">Kategori</th>  --}}
                            <th scope="col">Penerbit</th>
                            {{-- <th scope="col">ISBN</th> 
                            <th scope="col">Pengarang</th>
                            <th scope="col">Jumlah Halaman</th> --}}
                            <th scope="col">Stok</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Sinopsis</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buku as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>

                            <td style="text-align: center; display:flex; flex-direction: column; align-items: center;">
                                {!! DNS1D::getBarcodeHTML('$'."$item->kode", 'C39+', 1, 25)!!}
                                 <div style="margin-top: 5px;">{{$item->kode}}</div>
                            </td>
                            
                            <td>{{$item->judul}}</td>
                            {{-- <td>{{$item->kategori->nama}}</td> --}}
                            <td>{{$item->penerbit->nama}}</td>
                            {{-- <td>{{$item->ISBN}}
                            <td>{{$item->pengarang}}</td>
                            <td>{{$item->jumlah_halaman}}</td> --}}
                            <td>{{$item->stok}}</td>
                            <td>{{$item->tahun_terbit}}</td>
                            <td>{{$item->sinopsis}}</td>
                            <td><img src="{{ asset('/storage/buku/'.$item->foto) }}" class="rounded mt-1 mb-1"
                                    style="width: 150px"></td>
                            <td>
                                <form action="/buku/delete/{{$item->id}}" id="delete-form">
                                    <a href="/buku/edit/{{$item->id}}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-edit"></i> Edit</a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger" data-id="{{$item->id}}"
                                        onclick="confirmDelete(this)"><i class="fa fa-trash"></i> Hapus</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@include('buku.form')


@push('script')
<script>
    var data_buku = $(this).attr('data-id')

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
                    form.action = '/buku/delete/' + id // Ubah aksi form sesuai dengan ID yang sesuai
                    form.submit();
                }
            });
    }

    $(document).ready(function () {
        $('#buku-table').DataTable()
    });

    @if(session('sukses'))
    iziToast.success({
        title: '{{session('sukses')}}',
        position: 'topRight'
    });
    @endif
</script>

@endpush
@endsection