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
		<br><?= Html::encode($model->nama) ?>
		<br>di - 
		<br><?= Html::encode($satker->nama_satker) ?>
	</p>
	<p>
		Berdasarkan hasil rapat Tim Penyelesaian Kerugian Negara (TPKN) pada tanggal <?= Html::encode($model->tglrapat) ?> dan Berita Acara Penelitian TPKN Nomor <?= Html::encode($model->nmrberitaacara) ?>/BAP/TPKN/<?= Html::encode($model->thnberitaacara) ?>, disampaikan hal-hal sebagai berikut:
	</p>

	<ol type="a"> 
		<li> Sdr. <?= Html::encode($model->nama) ?> telah melakukan kelalaian yang menyebabkan kerugian negara berupa hilangnya <?= Html::encode($model->jmlunit) ?> unit barang inventaris kantor berupa <?= Html::encode($model->barang) ?> pada hari <?= Html::encode($model->harihilang) ?> tanggal <?= Html::encode($model->tglhilang) ?> di <?= Html::encode($model->tempathilang) ?>, sehingga Saudara/berdua *) dikenakan Tuntutan Ganti Kerugian (TGR) sebesar <?= Html::encode($model->nilai) ?> (dengan huruf) berdasarkan harga <?= Html::encode($model->dasarharga) ?> </li>
		<li> Untuk mengembalikan kerugian negara yang penyelesaiannya secara damai dengan sukarela membayar sekaligus atau mengangsur paling lama 24 (dua puluh empat) bulan, maka Saudara harus membuat dan menandatangani Surat Keterangan Tanggung Jawab Mutlak (SKTJM) bermaterai Rp.6.000,- dan mengirimkannya kepada Kepala Badan Pusat Statistik.</li>
		<li> Apabila Saudara menyetor uang ke kas negara maka foto copy bukti setor atau Surat Setoran Bukan Pajak (SSBP) dikirim ke Bagian Administrasi Keuangan sebagai bahan monitoring TGR.</li>
		<li> Kepada Saudara diberi kesempatan dalam waktu 14 (empat belas) hari setelah menerima surat ini untuk memberi tanggapan secara tertulis dan dikirim kepada Kepala Badan Pusat Statistik dengan tembusan kepada Ketua TPKN. Untuk keterangan selanjutnya Saudara dapat menghubungi Sekretariat TPKN di Biro Keuangan Badan Pusat Statistik.</li>
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
			<li> Kepala Biro Umum;</li>
			<li> Kepala BPS Provinsi ... </li>
			<li> Inspektur Pengawasan Kerugian Negara BPK RI; dan </li>
			<li> Kepala BPS Kota/Kab</li>
		</ol>
		Keterangan : *) Coret yang tidak perlu.
	</p>
</body>
</html>