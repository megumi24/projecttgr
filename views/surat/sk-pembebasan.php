<!DOCTYPE html>
<html>
<head>
	<title> SK Pembebasan </title>
</head>
<body>
<center> 
<img src="garuda.jpg" height="100" width="100" />
<p> KEPUTUSAN KEPALA BADAN PUSAT STATISTIK </p>
<p> NOMOR <?= Html::encode($surat->nomor_surat) ?> TAHUN <?= Html::encode($model->thnsk) ?> </p>
<p> TENTANG </p>
<p> PEMBEBASAN PENGGANTIAN KERUGIAN NEGARA </p>
<p> KEPALA BADAN PUSAT STATISTIK </p>
</center>
<p> Menimbang	:
<ol type="a"> 
<li> bahwa berdasarkan hasil pemeriksaan Tim Penyelesaian Kerugian Negara, Sdr <?= Html::encode($model->nama) ?> NIP <?= Html::encode($model->nip) ?>, dinyatakan tidak terbukti bersalah/lalai/melanggar hukum yang mengakibatkan Kerugian Negara atau berdasarkan pertimbangan keadilan tidak layak dibebani penggantian Kerugian Negara dalam kasus <?= Html::encode($kasus->nama_peristiwa) ?> pada []; </li>
<li> bahwa berdasarkan pertimbangan sebagaimana dimaksud dalam huruf 1, maka perlu menetapkan Pembebasan Penggantian Kerugian Negara kepada Sdr <?= Html::encode($model->nama) ?> NIP <?= Html::encode($model->nip) ?> dengan Keputusan Kepala Badan Pusat Statistik;  </li>
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
<li> Surat	Sekretaris Utama atas nama Kepala Badan Pusat Statistik Nomor <?= Html::encode($model->nmrsuratsestama) ?> tanggal <?= Html::encode($model->tglsuratsestama) ?>, perihal <?= Html::encode($model->perihalsuratsestama) ?>; </li>
<li> Berita Acara Penelitian TPKN Nomor <?= Html::encode($model->nmrberitaacaratpkn) ?>; </li>
</ol> 
</p>

<center> <p> MEMUTUSKAN:</p> </center>
<p> Menetapkan	: KEPUTUSAN KEPALA BADAN PUSAT STATISTIK TENTANG PEMBEBASAN PENGGGANTIAN KERUGIAN NEGARA.</p>
<p> KESATU : Membebaskan Sdr <?= Html::encode($model->nama) ?>, NIP <?= Html::encode($model->nip) ?>, dari keharusan mengganti kerugian negara karena tidak terbukti bersalah/lalai/melanggar hukum yang mengakibatkan Kerugian Negara dalam kasus <?= Html::encode($kasus->nama_peristiwa) ?> Tahun <?= Html::encode($kasus->tahun) ?> pada [] </p>
<p> KEDUA : Keputusan ini berlaku sejak tanggal ditetapkan.</p>
<br>
<br>
<p>Ditetapkan di : <?= Html::encode($model->tempatditetapkan) ?></p>
<p>Pada tanggal : <?= Html::encode($model->tglditetapkan) ?></p>
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