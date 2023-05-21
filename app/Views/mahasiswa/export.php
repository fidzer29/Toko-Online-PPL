<!DOCTYPE html>
<html>

<head>
    <title>Print PDF</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }

        .logo {
            width: 100px;
            height: 100px;
            background-image: url('path/to/logo.png');
            background-size: cover;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid black;
        }

        .header {
            display: flex;
            align-items: center;
            text-align: center;
        }

        @page {
            size: A4;
            margin: 0;
        }

        body {
            margin: 1.5cm 1.5cm 2cm 1.5cm;
        }
    </style>
</head>

<body>
    <section>
        <div class="header">
            <img src="assets/polban.png" width="70px" style="margin-right: 10px; margin-bottom: 20px;">
            <h1 style="margin: auto;">Daftar Mahasiswa</h1>
        </div>
        <table style="width: 100%">
            <thead style="background-color: lightgreen;">
                <tr>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nilai Uts</th>
                    <th scope="col">Nilai Uas</th>
                    <th scope="col">Nilai Final</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $key => $value) { ?>
                    <tr>
                        <td style="text-align: center;"><?= $value['nim'] ?></td>
                        <td><?= $value['nama'] ?></td>
                        <td style="text-align: center;"><?= $value['nilai_uts'] ?></td>
                        <td style="text-align: center;"><?= $value['nilai_uas'] ?></td>
                        <td style="text-align: center;"><?= $value['nilai_final'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>

</html>