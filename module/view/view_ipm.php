<?php
//memasukkan koneksi database
require_once("../../config/koneksi2.php");
//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if($_POST['id']){
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $koneksi->query("SELECT * FROM siswa WHERE id='$id'");
    //jika ada datanya
    if($view->num_rows){
        //fetch data ke dalam veriabel $row_view
        $row_view = $view->fetch_assoc();
        //menampilkan data dengan table
        echo '
        <p>Berikut ini adalah detail dari data siswa <b>'.$row_view['nama'].'</b></p>
        <table class="table table-bordered">
            <tr>
                <th>NAMA LENGKAP</th>
                <td>'.$row_view['nama'].'</td>
            </tr>
            <tr>
                <th>KELAS</th>
                <td>'.$row_view['kelas'].'</td>
            </tr>
            <tr>
                <th>JURUSAN</th>
                <td>'.$row_view['jurusan'].'</td>
            </tr>
        </table>
        ';
    }
}
?>