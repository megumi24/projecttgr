<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\PembayaranTGR */

// $this->title = $model->nomor_surat;
?>

<!DOCTYPE html>
<html>
<head>
	<title> BAP TPKN </title>
</head>
<body>

<style type="text/css">
div.right {
    text-align: right;
}
div.right-1 {
    margin: 0px 120px 0px 100px;
}
div.right-2 {
    margin: 0px 50px 0px 100px;
}
div.right-3 {
    margin: 0px 180px 0px 100px;
}
.site-login {
    margin: auto;
}
.center {
    text-align: center;
}
</style>
<br>
<div class="center">
<p> BERITA ACARA PENELITIAN</p>
<p> KEHILANGAN BARANG MILIK NEGARA</p>
<p> Di Badan Pusat Statistik .... </p>
<p> Nomor : /BAP/TPKN/Tahun</p>	
</div>
<br>
&emsp;&emsp; Berdasarkan hasil rapat pada hari ... tanggal <?php echo $tanggal ?> kami Tim Penyelesaikan Kerugian Negara (TPKN) Badan Pusat Statistik yang dibentuk berdasarkan Surat Keputusan Kepala Badan Pusat Statistik Nomor .. tanggal .. telah melakukan penelitian terhadap kasus kerugian negara yaitu hilangnya Barang Milik Negara berupa .. yang berlokasi .. dengan hasil sebagai berikut: </p>	
</div>
	<ol type="I">
	<li> Data Kendaraan Yang Hilang </li>
	<ol type="a">
	<li> Jenis 	: <?php echo $jenis ?> </li>
	<li> Merek/Type: <?php echo $merk ?></li>
	<li> Tahun Pembuatan: </li>
	<li> No Polisi : <?php echo $nopol ?></li>
	<li> Warna : <?php echo $warna ?></li>
	</ol> 
	<li> Pegawai yang bertanggung jawab </li>
	<ol type="a">
	<li> Nama : </li>
	<li> NIP : </li>
	<li> Jabatan : </li>
	<li> Alamat Rumah : </li>
	</ol>
	<li> Hasil Penelitian dan Pemeriksaan berdasarkan </li>
	<ol type="a">
	<li> Surat Tanda Bukti Lapor dari Kepolisian daerah .. Nomor <?php echo $supol ?> tanggal .. </li>
	<li> Berita Acara Pemeriksaan (Korban) dari Kepolisian daerah .. hari .. tanggal <?php echo $bapol ?>, sekitar pukul .. </li>
	<li> Berita Acara Pemeriksaan dari BPS .. Nomor <?php echo $bapbps ?> tanggal .. </li> 
	<li> Daftar pertanyaan diisi berdasarkan wawancara dengan Saudara .. tanggal .. yang diketahui oleh Kepala Badan Pusat Statistik Provinsi .. </li>
	</ol>
	<li> Latar Belakang </li>
	<p> Barang Milik Negara .. adalah milik BPS .. yang telah dipakai Saudara .. hingga tanggal .. </p> 
	<ol type="a"> 
	<li> Pada hari .. tanggal .. pukul .. Saudara .. sedang melakukan ..</li>
	<li> dan seterusnya </li>
	</ol> 
	<li> Pertimbangan </li>
	<ol type="a">
	<li> Barang Milik Negara telah diamankan dengan cara <?php echo $kelalaian ?> </li>
	<li> Barang Milik Negara berupa .. tersebut hilang tidak ada unsur kesengajaan. </li> 
	</ol> 
	<li> Kesimpulan </li>
	<p> Saudara .. <?php echo $keputusan ?> Tuntutan Ganti Kerugian (TGR) karena telah lalai/tidak lalai **) mengamankan .. yang digunakan, sehingga dikenakan/tidak dikenakan **) Tuntutan Ganti Rugi (TGR) sebesar Rp <?php echo $nilai ?> (dengan huruf) sesuai nilai .. </p>
	</ol>
<p> Keterangan:</p>
<p> *) Untuk Kendaraan Roda dua(2) </p>
<p> **) Coret yang tidak perlu </p>
Muatan dan materai Berita Acara Penelitian Barang Milik Negara dapat ditambahkan sesuai kebutuhand an kondisi lapangan. 
</body>
</html>