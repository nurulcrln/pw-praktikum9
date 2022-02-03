<?php
    $conn = mysqli_connect("localhost", "root", "", "praktikum_9");
    function query($query){
        global $conn;
        $data = mysqli_query($conn, $query);
        $karyawans = [];
        while( $karyawan = mysqli_fetch_assoc($data) ) {
            $karyawans[] = $karyawan;
        }
        return $karyawans;
    }
    function tambah($data){
        global $conn;

        $name  = $data['name'];
		$email  = $data['email'];
		$address = $data['address'];
        $gender = $data['gender'];
        $position = $data['position'];
        $status = $data['status'];

        $query = "INSERT INTO karyawan
                VALUES
                ('','$name','$email','$address','$gender','$position','$status')
            ";
        //menggunakan query untuk menambah data yaitu memerlukan parameter penghubung database dan query sql
        mysqli_query($conn, $query);
        //mengembalikan jumlah pada database,
        //contoh: jika id = 3 terdapat pada database maka akan mereturn nilai 1, jika tidak ada maka return 0
        return mysqli_affected_rows($conn);
    }

    //fungsi untuk menghapus data
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM karyawan WHERE id = $id");
        //mengembalikan jumlah pada database,
        //contoh: jika id = 3 terdapat pada database maka akan mereturn nilai 1, jika tidak ada maka return 0
        return mysqli_affected_rows($conn);
    }
?>