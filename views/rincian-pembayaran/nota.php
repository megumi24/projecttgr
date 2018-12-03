<?php
use app\models\RincianPembayaran;
use app\models\Kasus;
?>

<div>

<h3 style="width: 100%; text-align: center;">KARTU DEBITUR</h3>

<br/>
<br/>
<table id="info">
	<tr>
		<td style="width: 200px;">Nomor SKTJM</td>
		<td>:
			<?= $kasus->nomor_sktjm;?>
		</td>
	</tr>
	<tr>
		<td>Nama Debitur</td>
		<td>:
			<?= $kasus->id_debitur ?>
		</td>
	</tr>
	<tr>
		<td>Jumlah Tertagih</td>
		<td>:
			<?= $kasus->nilai ?>
		</td>
	</tr>
</table>
<br/>
<br/>

<?php
		
?>
<table id="rincian" border =1 style="width: 100%; border-collapse: collapse;">
	<tr style="background: rgba(255, 99, 71, 0.5);">
		<th>No</th>
		<th>Nomor Dokumen</th>
		<th>Pembayaran</th>
	</tr>
	<?php
	$j = count($model);

	$total = $kasus->nilai;
	$bayar = RincianPembayaran::find()->where(['id_kasus' => $kasus->id_kasus])->asArray()->all();
	$array_bayar = array_column($bayar, 'pembayaran');
    $dibayar = array_sum($array_bayar);
	
	if(!is_array($bayar)){
	?>
	<tr>
		<td colspan="3">Belum ada pembayaran</td>
	</tr>
	<?php
	}else{
		$i = 1;	
		foreach($bayar as $byr){
	?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $byr['ntpn']; ?></td>
		<td><?= $byr['pembayaran']; ?></td>
	</tr>
	<?php
			$i++;
		}};
	?>
	<tr style="background: rgba(255, 99, 71, 0.5);">
		<td colspan="2">Total Dibayarkan</td>
		<td><?php print_r($dibayar);?></td>
	</tr>
	<tr style="background: yellow;">
		<td colspan="2">Sisa Pembayaran</td>
		<td><?php print_r($total-$dibayar);?></td>
	</tr>
</table>

</div>

