<!DOCTYPE html>
<html>
<head>
	<title>Surat Pemberitahuan Pembayaran Tuntutan Kerugian Negara</title>
</head>
<body>
	<H3>SURAT PEMBERITAHUAN TUNTUTAN GANTI RUGI (SPTGR)</H3>
	<br>
	<p>
		<div class="right">
			<div class="right-3">Jakarta, </div>
		</div>
	</p>
	<p>
		Nomor : <?php echo $_POST["nomor"] ?>
		<br>Lampiran : - set
		<br>Perihal : Surat Pemberitahuan Pembayaran
	</p>
	<p>
		Kepada Yang Terhormat : 
		<br> Kepala Satker .......
		<br>di - 
		<br> BPS <?php echo $_POST["bps"] ?>
	</p>
	<p>
		Berdasarkan Surat Keterangan Tanggung Jawab Mutlak (SKTJM) bermaterai Rp.6.000,- yang telah ditandatangani oleh Saudara <?php echo $_POST["nama"] ?> pada tangggal <?php echo $_POST["tanggal"] ?> disampaikan hal-hal sebagai berikut :
	</p>

	<ol type="a"> 
		<li> Saudara <?php echo $_POST["nama"] ?> akan melakukan pembayaran Tuntutan Kerugian Negara (TGR) secara tunai atau mengangsur sebanyak <?php echo $_POST["jmlangsuran"] ?> kali melalui Bendahara Pengeluaran BPS <?php echo $_POST["bps"] ?> </li>
		<li> Pelaksanaan pembayaran, agar dilaporkan ke Badan Pusat Statistik melalui Bagian Administrasi Keuangan Biro Keuangan dengan mengirimkan bukti setor atau Surat Setoran Bukan Pajak (SSBP). </li>
		<li> c.	Apabila terjadi keterlambatan dan kendala pembayaran, agar dilakukan penagihan dengan tembusan ke Tim Penyelesaian Kerugian Negara (TPKN).</li>
	</ol>
	
	<p> Demikian untuk dilaksanakan. </p>

	<p>
		<div class="right"> a.n. KEPALA BADAN PUSAT STATISTIK SEKRETARIS UTAMA 
		</div>
	</p>
	<p>
		<div class="right">
			<div class="right-3"><br><br>NIP. ...</div>
		</div>
	</p>
	
	<p>
		Tembusan Kepada Yang Terhormat:
		<ol> 
			<li> Kepala Badan Pusat Statistik; </li>
			<li> Inspektur Utama BPS;</li>
			<li> Eselon II terkait;</li>
			<li> Inspektur Pengawasan Kerugian Negara BPK RI;</li>
	</p>
</body>
</html>