<?php
use yii\helpers\Html;
?>

<!DOCTYPE html>
<html>
<head>

<title></title>
</head>
<body>

<p>Yang bertanda tangan dibawah ini:</p>
<p>
	Nama	: <?= Html::encode($pegawai->nama) ?>
</p>
<p>
	NIP 	: <?= Html::encode($pegawai->nip) ?>
</p>
<p>
	Alamat	: <?= Html::encode($pegawai->alamat) ?>
</p>

<p>
	Dengan ini menerangkan dan tidak akan menarik kembali, bahwa saya bertanggung jawab atas Kerugian Negara sebesar Rp. <?= Html::encode($model->nominal) ?> karena tidak menyelesaikan kewajiban ikatan dinas di Badan Pusat Statistik setelah Ikatan Dinas/Tugas Belajar di <?= Html::encode($model->idtb) ?> </br>
Terhadap kerugian tersebut saya bersedia mengganti sepenuhnya dengan cara:
<ol>
	<li>
		Jumlah kerugian/kekurangan tersebut akan saya ganti dengan menyetorkan uang ke Kas Negara melalui Bendahara Pengeluaran Badan Pusat Statistik <?= Html::encode($model->bpssetor) ?>
	</li>
	<li>
		Jumlah kerugian tersebut akan saya ganti secara sekaligus atau mengangsur <?= Html::encode($model->blnangsur) ?> bulan (maksimal 24 ) dari bulan <?= Html::encode($model->blnstart) ?> tahun <?= Html::encode($model->thnstart) ?> s.d. bulan <?= Html::encode($model->blnstop) ?> tahun <?= Html::encode($model->thnstop) ?>
	</li>
</ol>
Saya selanjutnya memaklumi bahwa setelah memberikan keterangan ini tidak boleh mengadakan pembelaan diri dalam bentuk apapun dan menerima bahwa terhadap diri saya tidak dilakukan proses tuntutan ganti kerugian yang berlaku, kecuali bilamana saya ingkar janji tidak memenuhi pelaksanaan SKTJM ini.</br>
Keterangan diatas tidak menutup kemungkinan:

<ul>
	<li>
		Bahwa negara dapat membebaskan saya dari pertanggungjawaban, dan saya akan menerima kembali apa yang telah saya bayar, jika setelah pemberian keterangan ini terdapat hal-hal yang sekiranya diketahui lebih dahulu akan menyebabkan Negara membebaskan saya dari pertanggungjawaban.
	</li>
	<li>
		Bahwa Negara masih dapat menghapuskan kerugian dan saya akan menerima kembali apa yang telah saya bayar, apabila setelah keterangan ini diberikan ternyata bahwa kerugian termaksud terdapat dalam pengurusan saya atau kerugian itu akibat dari pengaruh alam, pencurian, rusak, hilang diluar kesalahan, kelalaian atau kealpaan saya.
	</li>

	<li>
		Bahwa dalam pertanggungjawaban bersama, kepada saya dapat diberikan pembayaran kembali apa yang telah saya bayar dari pada apa yang seharusnya dibebankan kepada saya.
	</li>
	<li>
		Bahwa saya dapat meminta pembebasan dan atau pembayaran kembali atas dasar ketentuan tersebut dalam (<?php ?>).
	</li>
</ul>

<p>
Mengetahui:																						Yang menerangkan, </br>
Ketua TPKN,
</p>

<p>
	NIP 								NIP
</p>
<p>
	Saksi-saksi :
	<ol>
		<li>
			Ketua STIS/Kepala PUSDIKLAT	<?php ?>
		</li>
		<li>
			Kepala Biro keuangan 		<?php ?>
		</li>
	</ol>
</p>
</p>

<?php ?>
</body>
</html> 