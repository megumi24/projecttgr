<!DOCTYPE html>
<html>
<head>
	<title> SK Pembebanan </title>
</head>
<body>
<center> 
<img src="garuda.jpg" height="100" width="100" />
<p> KEPUTUSAN KEPALA BADAN PUSAT STATISTIK </p>
<p> NOMOR <?= Html::encode($surat->nomor_surat) ?> TAHUN <?= Html::encode($model->thnsk) ?> </p>
<p> TENTANG </p>
<p> PEMBEBANAN PENGGANTIAN KERUGIAN NEGARA </p>
<p> KEPALA BADAN PUSAT STATISTIK </p>
</center>
<p> Menimbang	:
<ol type="a"> 
<li> bahwa berdasarkan Laporan <?= Html::encode($kasus->nama_peristiwa) ?> BPS <?= Html::encode($satker->nama_satker) ?> tanggal <?= Html::encode($kasus->tgl_dibuat) ?> Nomor <?= Html::encode($model->nmrkasus) ?> telah ditemukan <?= Html::encode($model->penemuan) ?>, yang menimbulkan Kerugian Negara sebesar <?= Html::encode($model->nominalkerugian) ?>. Kerugian Negara tersebut dibebankan kepada [ini isinya apa?] atas nama saudara <?= Html::encode($model->nama) ?> NIP <?= Html::encode($model->nip) ?>; </li>
<li> bahwa berdasarkan surat pernyataan tanggal <?= Html::encode($model->tglsuratpernyataan) ?>, saudara <?= Html::encode($model->nama) ?>, NIP <?= Html::encode($model->nip) ?> menyatakan kesanggupan untuk menyelesaikan [ini isinya apa?];  </li>
<li> bahwa berdasarkan pertimbangan sebagaimana tersebut pada huruf a dan huruf b, serta untuk menjamin kepentingan Negara kepada yang bersangkutan, perlu menetapkan Pembebanan Penggantian Kerugian Negara dengan Keputusan Kepala Badan Pusat Statistik; </li>
</p>
</ol>
<p> Mengingat	: 
<ol type="1">
<li> Undang-Undang Nomor 16 Tahun 1997 tentang Statistik (Lembaran Negara Republik Indonesia Tahun 1997 Nomor 39, Tambahan Lembaran Negara Nomor 3683); </li> 
<li> Undang-Undang Nomor 20 Tahun 1997 tentang Penerimaan Negara Bukan Pajak (Lembaran Negara Republik Indonesia Tahun 1997 Nomor 43, Tambahan Lembaran Negara Republik Indonesia Nomor 3687); </li>
<li> Undang-Undang Nomor 17 Tahun 2003 tentang Keuangan Negara (Lembaran Negara Republik Indonesia Tahun 2003 Nomor 47, Tambahan Lembaran Negara Republik Indonesia Nomor 4286); </li>
<li> Undang-Undang Nomor 1 Tahun 2004 tentang Perbendaharaan Negara (Lembaran Negara Republik Indonesia Tahun 2004 Nomor 5, Tambahan Lembaran Negara Republik Indonesia Nomor 4355);</li>
<li> Undang-Undang Nomor 15 Tahun 2004 tentang Pemeriksaan Pengelolaan dan Tanggung Jawab Keuangan Negara (Lembaran Negara Republik Indonesia Tahun 2004 Nomor 66, Tambahan Lembaran Negara Republik Indonesia Nomor 4400); </li>
<li> Peraturan Pemerintah Nomor 51 Tahun 1999 tentang Penyelenggaraan Statistik (Lembaran Negara Republik Indonesia Tahun 1999 Nomor 96, Tambahan Lembaran Negara Republik Indonesia Nomor 3854); </li>
<li> Peraturan Pemerintah Nomor 6 Tahun 2006 tentang Pengelolaan Barang Milik Negara/Daerah (Lembaran Negara Republik Indonesia Tahun 2006 Nomor 20, Tambahan Lembaran Negara Republik Indonesia Nomor 4609);</li>
<li> Peraturan Presiden Republik Indonesia Nomor 86 Tahun 2007 tentang Badan Pusat Statistik;</li>
<li> Keputusan Kepala Badan Pusat Statistik Nomor 79 Tahun 2000 tentang Petunjuk Pelaksanaan Penyelesaian Kerugian Negara melalui Tuntutan Perbendaharaan dan Tuntutan Ganti Kerugian di lingkungan Badan Pusat Statistik;</li>
<li> Peraturan Kepala Badan Pusat Statistik Nomor 7 Tahun 2008 tentang Organisasi Tata Kerja Badan Pusat Statistik; </li>
</ol>
</p>
<p>
Memperhatikan :
<ol type="1">
<li> Surat	Pemberitahuan	Tuntutan	Ganti	Kerugian	Nomor <?= Html::encode($tgr->nomor_surat) ?> tanggal <?= Html::encode($tgr->tgl_upload) ?>; </li>
</ol> 
</p>

<center> <p> MEMUTUSKAN:</p> </center>
<p> Menetapkan	: KEPUTUSAN KEPALA BADAN PUSAT STATISTIK TENTANG PEMBEBANAN PENGGGANTIAN KERUGIAN NEGARA.</p>
<p> KESATU : Memberikan Penggantian Kerugian Negara tehadap saudara <?= Html::encode($model->nama) ?>, NIP <?= Html::encode($model->nip) ?>, sebesar <?= Html::encode($model->nominalkerugian) ?></p>
<p> KEDUA : Kepada saudara <?= Html::encode($model->nama) ?>, diwajibkan untuk: </p>
<ol type="a">
<li> Membayar Kerugian Negara sebesar [dengan huruf] ke Kantor Kas Negara secara langsung atau melalui Bendahara Badan Pusat Statistik; dan </li>
<li> Mengirim bukti pembayaran Kerugian Negara kepada Biro Keuangan Badan Pusat Statistik up. Bagian Administrasi Keuangan. </li>
</ol>
<p> KETIGA 	: Keputusan ini berlaku pada tanggal ditetapkan. </p>
<br>
<br>
<p>Ditetapkan di : []</p>
<p>Pada tanggal : </p>
<p>a.n. KEPALA BADAN PUSAT STATISTIK,</p>
<p>SEKRETARIS UTAMA</p>
<br>
<br>
<p> Nama </p>
<p> NIP </p>
<p></p>
<p> Salinan Keputusan ini disampaikan Kepada Yth. : </p>
<ol type="1">
	<li> Ketua Badan Pemeriksa Keuangan di Jakarta;</li>
	<li> Direktur Jenderal Perbendaharaan di Jakarta; dan </li>
	<li> Direjtur Jenderal Kekayaan Negara di Jakarta.</li>
	
</ol>
</body>
</html>