@extends('layout.app')

@section('title', 'Penerbit')

@section('content')
        <section class="section">
                <div class="section-header">
                    <h1>Penerbit`</h1>
                </div>

                <div class="section-body">
                    <div class="card">
                    <div class="card-header">
                        <h4>Data Kategori</h4>
                        <div class="card-header-form">
                            <button class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data</button>
                        </div>
                    </div>
                    
                    <div class="card-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">First</th>
                          <th scope="col">Last</th>
                          <th scope="col">Handle</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                    </div>
                    
                </div>
                </section>
@endsection