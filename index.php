<?php
    require 'connect.php';
    require 'aksi.php';
    if( isset($_POST["submit"])){
        //jika sudah ditekan dijalankan function tambah
        if(tambah($_POST) > 0) {
            echo "berhasil";
        } else {
            echo "gagal!";
        }
    }
    $karyawan = query("SELECT * FROM karyawan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Praktikum 9</title>
</head>
<body>
<div class="wraper" id="title-id">
		<div class="title">
			Karyawan Universitas Pertamina, by 105219030
		</div>
		<div class="sidebar-left">
			<div class="card">
				<form class="form" method="POST">
				<h3>Form Data Karyawan</h3>
					<input type="text"   name="name" placeholder="Nama Lengkap" class="input" required><br>
                    <input type="email" name="email" placeholder="Email" class="input" required><br>
                    <input type="text" name="address" placeholder="Alamat" class="input" required><br>
                    <select id="gender" name="gender" class="input">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
					<input type="text" name="position" placeholder="Jabatan" class="input" required><br>
                    <select id="status" name="status" class="input">
                        <option value="fulltime">Fulltime</option>
                        <option value="parttime">Parttime</option>
                    </select>
					<input type="submit" name="submit" value="Add" class="btn">
				</form>
			</div>
			
		</div>
		<div class="sidebar-rigth">
			<div style="padding:20px;">
				<span style="font-size:20px;">DATA KARYAWAN</span>
				<table class="table1">
					<tr>
						<th width="5%">No</th>
						<th width="20%">Nama</th>
						<th width="20%">Email</th>
						<th width="20%">Alamat</th>
						<th width="10%">Jenis Kelamin</th>
                        <th width="10%">Jabatan</th>
                        <th width="10%">Status</th>
                        <th width="10%">Aksi</th>
					</tr>
                    <?php $no=1;
                    foreach ($karyawan as $item) : ?>
                        <tr>
							<td><?= $no++;?></td>
							<td><?= $item['name']; ?></td>
							<td><?= $item['email']; ?></td>
							<td><?= $item['address']; ?></td>
                            <td><?= $item['gender']; ?></td>
                            <td><?=$item['position']; ?></td>
                            <td><?=$item['status']; ?></td>
							<td>
								<a href="hapus.php?id=<?= $item["id"]; ?>" onclick="return confirm('yakin?')" class="aksi red">Hapus</a>
							</td>
						</tr>
                    <?php endforeach ?>
				</table>
			</div>
		</div>
		<div style="clear:both;"></div>
	</div>
</body>
</html>