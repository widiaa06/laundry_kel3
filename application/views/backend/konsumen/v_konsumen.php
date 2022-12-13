<div class="container-fluid">

    <?php
    if (!empty($this->session->flashdata('info'))) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong><?= $this->session->flashdata('info') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }
    ?>

    <div class="row">
        <div class="col-md-12">
            <a href="<?= base_url('konsumen/tambah') ?>" class="btn btn-primary">Tambah konsumen</a><br><br>
        </div>
    </div>

    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama konsumen</th>
                            <th>Alamat</th>
                            <th>No.Telp</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $row) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->kode_konsumen; ?></td>
                                <td><?= $row->nama_konsumen; ?></td>
                                <td><?= $row->alamat_konsumen; ?></td>
                                <td><?= $row->no_telp; ?></td>
                                <td>
                                    <a href="<?= base_url('konsumen/edit/') ?><?= $row->kode_konsumen; ?>" class="badge badge-success btn-sm">Edit</a>
                                    <a href="<?= base_url('konsumen/delete/') ?><?= $row->kode_konsumen; ?>" class="badge badge-danger" onclick="return confirm('Yakin Ingin Hapus Data?')">Hapus</a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>