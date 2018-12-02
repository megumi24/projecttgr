<!-- ?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\InSktjmBmnTpkn; 

 -->
<!-- // $ts1 = strtotime($tgl_awal);
// $ts2 = strtotime($tgl_akhir);

// $year1 = date('Y', $ts1);
// $year2 = date('Y', $ts2);

// $month1 = date('m', $ts1);
// $month2 = date('m', $ts2);

// $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
 -->

<?php
use yii\helpers\Html;
?>

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
	&emsp;&emsp;Dengan ini menerangkan dan tidak akan menarik kembali, bahwa saya bertanggung jawab atas Kerugian Negara sebesar Rp. <?= Html::encode($model->nominal) ?> karena tidak menyelesaikan kewajiban ikatan dinas di Badan Pusat Statistik setelah Ikatan Dinas/Tugas Belajar di Politeknik Statistika STIS. </br>
Terhadap kerugian tersebut saya bersedia mengganti sepenuhnya dengan cara:
<p>
	
		Jumlah kerugian/kekurangan tersebut akan saya ganti dengan cara mengangsur melalui potong gaji setiap bulan/setor tunai 2) selama <?= Html::encode($model->lamacicil) ?> bulan (maksimal 24 bulan) dari bulan <?= Html::encode($model->blnawal) ?>  s.d bulan <?= Html::encode($model->blnakhir) ?>  setiap tanggal <?= Html::encode($model->tglcicil) ?>.
		Kemudian mengirimkan bukti setor untuk setor tunai atau photo copy SPM/SP2D dan dafrat gaji induk  untuk potong gaji ke sekretariat Tim Penyelesaian Kerugian Negara (TPKN) BPS melalui email: tpkn@bps.go.id
	
</p>
&emsp;&emsp;Saya selanjutnya memaklumi bahwa setelah memberikan keterangan ini tidak boleh mengadakan pembelaan diri dalam bentuk apapun dan menerima bahwa terhadap diri saya tidak dilakukan proses tuntutan ganti kerugian yang berlaku, kecuali bilamana saya ingkar janji tidak memenuhi pelaksanaan SKTJM ini.</br>
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
		Bahwa saya dapat meminta pembebasan dan atau pembayaran kembali atas dasar ketentuan tersebut dalam ... .
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
			Ketua STIS/Kepala PUSDIKLAT	<!-- <?php ?> -->
		</li>
		<li>
			Kepala Biro keuangan 		<!-- <?php ?> -->
		</li>
	</ol>
</p>
</p>