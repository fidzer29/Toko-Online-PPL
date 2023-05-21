<?= $this->extend('layouts/app-admin') ?>

<?= $this->section('content') ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="<?= base_url('read-excel') ?>" method="post" enctype="multipart/form-data">
                    <div class="custom-file">
                        <input type="file" name="excel_file" class="custom-file-input" id="excel-file">
                        <label class="custom-file-label" for="excel-file" name="excel_file" placeholder="Masukkan File">Upload File Excel...</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-1">
                        <i class="fas fa-file-excel mr-2"></i> Import
                    </button>
                </form>
            </div>
        </div>

        <?php
        if (isset($data_excel)) {
        ?>
            <div class="row mt-2">
                <div class="col">
                    <div class="card shadow-md">
                        <div class="card-body">
                            <?php
                            echo '<pre>';
                            print_r($data_excel);
                            echo '</pre>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
<?= $this->endSection() ?>