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
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
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
                            <td>{{$item->jenis_kelamin}}</td>
                            <td>{{$item->tempat_lahir}}</td>
                            <td>{{$item->tanggal_lahir}}</td>
                            <td>{{$item->telepon}}</td>
                            <td>{{$item->alamat}}</td>
                            <td><img src="{{ asset('/storage/anggota/'.$item->foto) }}" class="rounded" style="width: 150px"></td>
                            <td>
                                <form action="/anggota/delete/{{$item->id}}" id="delete-form">
                                    <a href="/anggota/{{$item->id}}/edit" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i></a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="confirmDelete()"><i class="fa fa-trash"></i></a>
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

@section('script')
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
@endsection

@push('script')
<script>
    function confirmDelete() {
        event.preventDefault()
        swal({
                title: 'Apa Anda Yakin ?',
                text: 'Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
                swal(
                    document.getElementById('delete-form').submit()
                );
            }
        });
    }

</script>
@endpush