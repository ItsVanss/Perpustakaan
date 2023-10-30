@extends('layout.app')

@section('title', 'Anggota')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Anggota</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Anggota</h4>
                <div class="card-header-form">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-anggota"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <!-- <th scope="col">Jenis Kelamin</th> -->
                            <!-- <th scope="col">Tempat Lahir</th> -->
                            <!-- <th scope="col">Tanggal Lahir</th> -->
                            <th scope="col">Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anggota as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <!-- <td>{{$item->jenis_kelamin}}</td> -->
                            <!-- <td>{{$item->tempat_lahir}}</td> -->
                            <!-- <td>{{$item->tanggal_lahir}}</td> -->
                            <td>{{$item->telepon}}</td>
                            <td>{{$item->alamat}}</td>
                            <td><img src="{{ asset('/storage/anggota/'.$item->foto) }}" class="rounded mt-1 mb-1" style="width: 150px"></td>
                            <td>
                                <form action="/anggota/delete/{{$item->id}}" id="delete-form">
                                    <a href="/anggota/edit/{{$item->id}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger" data-id="{{$item->id}}" onclick="confirmDelete(this)"><i class="fa fa-trash"></i> Hapus</a>
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
@include('anggota.form')
@endsection

@push('script')
<script src="{{asset('assets/modules/iziToast.min.js')}}"></script>

@if(session('sukses'))
<script>
  iziToast.success({
    title: 'Sukses',
    message: '{{session('sukses')}}',
    position: 'topRight'
  });
</script>
@endif

<script>
    var data_anggota = $(this).attr('data-id')
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
              form.action = '/anggota/delete/' + id // Ubah aksi form sesuai dengan ID yang sesuai
              form.submit();
            }
        });
    }
</script>
@endpush