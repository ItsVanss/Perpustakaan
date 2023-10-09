

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/penerbit/store" method="POST">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Kode</label>
            <input type="text" name="kode" class="form-control">
         </div>

         <div class="form-group">
            <label for="exampleInputPassword1">Nama</label>
            <input type="text" name="nama" class="form-control">
         </div>
    
        <button type="submit" class="btn btn-primary">Save</button>

        </form>
      </div>
    </div>
  </div>
</div>