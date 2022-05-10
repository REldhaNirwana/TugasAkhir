<!-- Begin Page Content -->
<div class="container-fluid">



<!-- DataTales Example -->
<div class="card">
    <div class="card-body">
    <div class="card-title">
      <a href="m_transaksi/add">
        <button type="button" class="btn btn-primary">Tambah Data</button>
      </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pesan</th>
                        <th>Tanggal</th>
                        <th>Paket</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $no = 0; ?>
                     @foreach($m_transaksi as $row)
                    <tr>
                        <th scope="row"><?php $no++;
                                            echo $no; ?></th>             
                            <td>{{$row->id_pesan}}</td>
                            <td>{{$row->tanggal}}</td>
                            <td>{{$row->paket}}</td>
                            <td>{{$row->status}}</td>

                        <td>
                            <a href="/m_transaksi/delete/{{$row->transaksi}}">
                                <button type="button" class="btn btn-outline-danger btn-sm">Hapus</button>
                            </a>
                            <a href="/m_transaksi/edit/{{$row->transaksi}}">
                                <button type="button" class="btn btn-outline-primary btn-sm">Edit</button>
                            </a>
                         </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
