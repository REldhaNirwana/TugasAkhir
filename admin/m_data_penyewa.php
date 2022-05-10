<!-- Begin Page Content -->
<div class="container-fluid">



<!-- DataTales Example -->
<div class="card">
    <div class="card-body">
    <div class="card-title">
      <a href="m_data_penyewa/add">
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
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Tahun</th>
                        <th>Paket</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $no = 0; ?>
                     @foreach($m_data_penyewa as $row)
                    <tr>
                        <th scope="row"><?php $no++;
                                            echo $no; ?></th>             
                            <td>{{$row->id_pesan}}</td>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->tanggal}}</td>
                            <td>{{$row->tahun}}</td>
                            <td>{{$row->paket}}</td>
                            <td>{{$row->status}}</td>

                        <td>
                            <a href="/m_data_penyewa/delete/{{$row->data_penyewa}}">
                                <button type="button" class="btn btn-outline-danger btn-sm">Hapus</button>
                            </a>
                            <a href="/m_jdata_penyewa/edit/{{$row->data_penyewa}}">
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
