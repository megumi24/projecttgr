<!DOCTYPE html>
<html>
<head>
	<!-- <title>Surat Keterangan Tanda Lunas</title> -->
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
	<H2></H2>
	<div class="center">
		<h3><u>Surat Keterangan Tanda Lunas</u>
		<p>NOMOR: <?php echo $nomor ?></p></h3>
	</div>
	
	<br><br>
	<p>
		<div class="right">
			<div class="right">Jakarta, <?php echo Yii::$app->formatter->asDate($tanggal, 'd-M-Y'); ?></div>
		</div>
	</p>
	<br>
	<p>Dengan ini menerangkan bahwa utang Kerugian Negara Ikatan Dinas Sekolah Tinggi Ilmu Statistik atas nama <?php echo $nama ?> karena ... sebesar Rp <?php echo $jumlah ?> (...) yang ditetapkan berdasarkan Surat Pemberitahuan Ganti Kerugian Nomor ... tanggal .... dan/atau Surat Keterangan Tanggung Jawab Mutlak (SKTJM) yang ditandatangani tanggal ... yang telah dibayar secara mengangsur dan lunas tanggal ... . Bukti setor pelunasan dan monitoring terlampir.</p>

	<p>
	<div class="right">Sekretaris TPKN
	<p>Kepala Biro Keuangan</p><br><br>
	<div class="right">Herum Fajarwati</div>
	</div></p>

</body>
</html>