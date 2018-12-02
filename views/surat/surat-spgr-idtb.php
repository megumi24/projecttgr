<!DOCTYPE html>
<html>
<head>
	<title>Surat Pemberitahuan Ganti Rugi (SPGR)</title>
</head>
<body>
	<H2>SURAT PEMBERITAHUAN GANTI RUGI (SPGR)</H2>
	<br>
	<p>
		<div class="right">
			<div class="right-3">Jakarta, <?= Html::encode($surat->tgl_upload) ?></div>
		</div>
	</p>
	<p>
		Nomor : <?= Html::encode($surat->nomor_surat) ?>
		<br>Lampiran : - set
		<br>Perihal : Surat Pemberitahuan Ganti Rugi
	</p>
	<p>
		Kepada Yang Terhormat : 
		<?= Html::encode($model->nama) ?>
		<br> 
		<br>di <?= Html::encode($satker->nama_satker) ?>
	</p>
	<p>
		Berdasarkan Surat Pengunduran Diri yang Saudara ajukan tanggal <?= Html::encode($model->tglpengundurandiri) ?> dan Memorandum dari Kepala Biro Kepegawaian tanggal <?= Html::encode($model->tglmemorandum) ?> diberitahukan hal-hal sebagai berikut:
	</p>

	<ol> 
		<li> Saudara mendapatkan pendidikan Ikatan Dinas ………….. di Politeknik Statistika STIS pada tahun <?= Html::encode($model->tahunmasuk) ?> dan lulus memperoleh ijazah tahun <?= Html::encode($model->tahunlulus) ?> </li>
		<li> Sesuai Keputusan Kepala Badan Pusat Statistik nomor 179 tahun 2005  tanggal 1 Agustus 2005  pasal 2 ayat (2), Saudara mempunyai kewajiban melaksanakan ikatan dinas di BPS selama 2 (dua) kali masa belajar di STIS secara berturut-turut yaitu selama 8 (delapan) tahun atau 96 (sembilan puluh enam) bulan. Saudara telah melaksanakan Ikatan Dinas di BPS selama <?= Html::encode($model->bulantuntas) ?> (dengan huruf) bulan. Lamanya Ikatan Dinas yang masih harus dilaksanakan adalah <?= Html::encode($model->bulanbelum) ?>  (dengan huruf) bulan sampai dengan tahun <?= Html::encode($model->tahunakhirikatan) ?></li>
		<li> Berdasarkan Surat Perjanjian yang Saudara tandatangani nomor <?= Html::encode($model->nmrsuratperjanjian) ?> tanggal <?= Html::encode($model->tglsuratperjanjian) ?> perihal <?= Html::encode($model->perihalsuratperjanjian) ?>,  Saudara harus membayar kembali dua kali lipat dari beasiswa dan semua tunjangan yang diterima selama mengikuti pendidikan di Politeknik Statistika STIS sehingga Saudara dikenakan Tuntutan Ganti Kerugian  sebesar <?= Html::encode($model->besartgr) ?>  (dengan huruf), perhitungan terlampir.</li>
		<li> Untuk mengembalikan kerugian negara yang penyelesaiannya secara damai dengan sukarela membayar sekaligus atau mengangsur paling lama 24 (dua puluh empat) bulan, maka Saudara harus membuat dan menandatangani Surat Keterangan Tanggung Jawab Mutlak (SKTJM) bermaterai Rp.6.000,- dan mengirimkannya kepada Kepala BPS.</li>
		<li> Apabila Saudara menyetor uang ke kas negara maka foto copy bukti setor atau Surat Setoran Bukan Pajak (SSBP) dikirim ke Bagian Administrasi Keuangan  melalui fax (021.3507041) sebagai bahan monitoring TGR.</li>
		<li> Apabila Saudara merasa perlu memberi tanggapan / sanggahan kepada Saudara diberi kesempatan dalam waktu 14 (empat belas) hari setelah menerima surat ini untuk memberi tanggapan secara tertulis dan dikirim kepada Kepala BPS   dengan tembusan kepada Ketua Tim Penyelesaian Kerugian Negara (TPKN) Badan Pusat Statistik. Untuk keterangan selanjutnya Saudara dapat menghubungi Sekretariat TPKN di Biro Keuangan BPS.</li>
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
			<li> Kepala Biro Kepegawaian </li>
			<li> Ketua STIS/PUSDIKLAT</li>
			<li> Kepala BPS Provinsi ... </li>
			<li> Inspektur Pengawasan Kerugian Negara BPK RI; dan </li>
			<li> Kepala BPS Kota/Kab .... </li>
			<li> Kepala BPS (domisili)</li>
		</ol>
	</p>
</body>
</html>