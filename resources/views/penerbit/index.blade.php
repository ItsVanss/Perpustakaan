@extends('layout.app')

@section('title', 'Penerbit')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Penerbit</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Penerbit</h4>
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
                        @foreach($penerbit as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>

                            <td>
                                <div>
                                    <form action="/penerbit/delete/{{$item->id}}" id="delete-form">
                                        <a href="/penerbit/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete()">
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
@include('penerbit.form')

@section('script')
<script src="{{asset('assets/modules/iziToast.min.js')}}"></script>

@include('penerbit.form')

@if(session('sukses'))
<script>
    iziToast.success({
        title: '{{session('sukses')}}',
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
      title: 'Are you sure?',
      text: 'Once deleted, you will not be able to recover this imaginary file!',
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
