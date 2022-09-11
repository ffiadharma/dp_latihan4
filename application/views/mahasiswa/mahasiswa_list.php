<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Mahasiswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Data Mahasiswa</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List Daftar Mahasiswa</h4>
                        </div>
                        <div class="card-body">

                            <div class="button">
                                <a href="/universitas/mahasiswa/add" class="btn btn-primary">Tambah Mahasiswa</a>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>NIM</th>
                                            <th>No HP</th>
                                            <th>Email</th>
                                            <th>Jurusan</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($mahasiswa as $row) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><img src="<?= base_url(); ?>assets/foto/<?= $row->foto_profil; ?>" width="110" height="110" style="padding: 10%;"></td>
                                                <td><?= $row->nama; ?></td>
                                                <td><?= $row->nim; ?></td>
                                                <td><?= $row->no_hp; ?></td>
                                                <td><?= $row->email; ?></td>
                                                <td><?= $row->jurusan; ?></td>
                                                <td><?= $row->alamat; ?></td>
                                                <td>
                                                    <a href="/universitas/mahasiswa/edit/<?= $row->id_mhs; ?>" class="btn btn-warning">Edit</a>
                                                    <a href="/universitas/mahasiswa/hapus/<?= $row->id_mhs; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>