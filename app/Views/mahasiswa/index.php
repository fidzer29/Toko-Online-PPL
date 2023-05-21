<?= $this->extend('layouts/app-admin') ?>

<?= $this->section('content') ?>
<section>
    <div class="row">
        <div class="col">
            <center>
                <h1>Daftar Mahasiswa</h1>
            </center>
        </div>

    </div>

    <div class="row">
        <div class="col">
            <!-- validasi  -->
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($validation as $error) : ?>
                        <div><?= $error ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- pesan  -->
            <?php if (session()->getFlashdata('message_error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('message_error') ?>
                </div>
            <?php endif; ?>

            <?php
            if (isset($errors)) {
                echo '<div style="width: 300px"; border-radius: 5px; >';
                echo '<ul style="background-color: red; color: white; padding: 10px;">';
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo '</ul>';
                echo '</div>';
            }
            ?>

        </div>
    </div>
    <center>
        <div class="row mt-4">
            <div class="col">
                <!-- buat button add dengan modal  -->
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addModal">
                    <i class="fas fa-upload mr-1"></i>
                    + Import Data
                </button>

                <!-- buat button export data -->
                <a href="<?= base_url('export-excel') ?>" class="btn btn-outline-success btn-sm">
                    <i class="far fa-file-excel mr-1"></i>
                    Export Excel
                </a>

                <a href="<?= base_url('export-pdf') ?>" class="btn btn-outline-danger btn-sm">
                    <i class="far fa-file-pdf mr-1"></i>
                    Export PDF
                </a>

                <!-- modal add -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('mahasiswa') ?>" method="post" enctype="multipart/form-data">
                                    <div class="custom-file">
                                        <input type="file" name="excel_file" class="custom-file-input" id="excel-file">
                                        <label class="custom-file-label" for="excel-file" name="excel_file" placeholder="Masukkan File">Choose file</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Import</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </center>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="table-responsive">

                <table class="table table-striped dataTable" id="dataTable" style="width: 100%;">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nilai UTS</th>
                            <th scope="col">Nilai UAS</th>
                            <th scope="col">Nilai Final</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mahasiswa as $mhs) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $mhs['nim'] ?></td>
                                <td><?= $mhs['nama'] ?></td>
                                <td><?= $mhs['nilai_uts'] ?></td>
                                <td><?= $mhs['nilai_uas'] ?></td>
                                <td><?= $mhs['nilai_final'] ?></td>
                            </tr>
                        <?php endforeach;  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>

<script src="<?= base_url('assets/template/vendor/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/template/vendor/js/dataTables.bootstrap4.min.js') ?>"></script>
<script>
    // $(document).ready(function() {
    //     $('#dataTable').DataTable();
    // });

    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
<?= $this->endSection() ?>