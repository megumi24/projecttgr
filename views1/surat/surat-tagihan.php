<?php 
	use yii\helpers\Html;
?>

<!DOCTYPE html>
<html>
<head>
	<!-- <title>SURAT TAGIHAN 3</title> -->
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
	<H2>SURAT TAGIHAN 3</H2>
	<br>
	<p>
		<div class="right">
			<div class="right-3">Jakarta, ....</div>
		</div>
	</p>
	<p>
		Nomor :
		<?php 
		echo $nomor
		?>
		<br>Lampiran : ... (dengan huruf)
		<br>Perihal : Surat Tagihan 3
	</p>
	<p>
		Kepada Yang Terhormat :
		<br>Sdr. <?php 
			echo $nama 
			?>
		<br>NIP <?php  
			echo $nip
			?>
		<br>di - 
		<br>..... 
	</p>
	<p>
		Menyambung Surat Tagihan Kerugian Negara Nomor ... tanggal ..., diberitahukan hal-hal sebagai berikut :
	</p>
	<p>
		1. Saudara dikenakan Tuntutan Ganti Kerugian sebesar ... (dengan huruf) dikarenakan .... </p>
	<p>
		2. Berdasarkan catatan kami sampai tanggal ...., Saudara (belum/telah) membayar kerugian negara sebesar ... (dengam huruf), sehingga Saudara masih kurang membayar sebesar ... (dengan huruf). </p>
	<p>
		3. Jika Saudara sudah membayar/mengangsur kembali kerugian negara tersebut, kami harap bukti setornya dikirim ke Bagian Administrasi Keuangan, BPS atau di-fax (1-3507041) sebagai bahan laporan kepada Menteri Keuangan. </p>
		<p>
		4. Apabila Saudara tidak menanggapi surat ini, maka kasus Saudara akan kami limpahkan ke Direktorat Piutang Negara, Diektorat Jenderal Kekayaan Negara, Kementerian Keuangan dan TGR Saudara akan dikenakan tambahan biaya administrasi sebesar 10%.</p>

		Demikian agar maklum.
	</p>
	
	
	<p>
		<div class="right">KEPALA BAGIAN ADMINISTRASI KEUANGAN
		<div class="right-1">selaku</div>
		<div class="right-2">SEKRETARIAT TPKN BPS</div>
	</p>
	<p>
		<hr>
		<div class="right-3"><br><br>NIP. ...</div>
	</p>
	</div>
	
	<p>
		Tembusan Kepada Yang Terhormat:
		<br>1. Sekretaris Utama Badan Pusat Statistik;
		<br>2. Inspektur Utama Badan Pusat Statistik;
		<br>3. Eselon 2 yang bersangkutan; dan
		<br>4. Inspektur Pengawasan Keruguan Negara BPK RI.
	</p>
</body>
</html>