<?php 
require_once 'PHPWord.php';//memasukkan library PHPWord
//membuat koneksi database
$mysql = new mysql ('localhost', 'root', '', 'sirine');
if($mysql -> connect_errno) {
	die('kesalahan saat membuat koneksi ke database. <br>'. $mysql->error);
}

//mengambil data siswa dengan perintah SELECT
$sql = 'SELECT * FROM siswa WHERE nama = 'Agus'';
$query = $mysql->query($sql);
if(!query){//JIKA PERINTAH SALAH
	die('Perintah salah. <br>, $mysql->error')
}
$data = $query->fetch_assoc(); //mengambil data
$query -> close(); //membersihkan memori
$mysql -> close();

$PHPWord = new PHPWord(); //membuat objek PHPWord
$template = $PHPWord -> loadTemplate('Template.docx'); //membuka template
//proses meletakkan data dari database ke file template
foreach ($data as $nama_kolom => $value) {
	$template->setValue($nama_kolom, $value);

}

//menyimpan hasil 
$file_hasil = "data-siswa.docx";
$template->save($file_hasil);

header("location: '.$file_hasil"); //download file