<?php if($a = 1){ ?>
	Kasus <?= Html::encode()?> telah didaftarkan dalam sistem. Kasus terdaftar atas nama <?= Html::encode()?> dengan ID Debitur <?= Html::encode()?>. Berikut rincian kasus yang telah dilaporkan :
<?php }else{ ?>
	Perubahan status untuk kasus <?= Html::encode()?> telah dilakukan. Berikut rincian dari kasus terdaftar :
<?php } ?>
<br/>

<table>
	<tr>
		<td> Nomor ID Kasus </td>
		<td> : </td>
		<td> <?= Html::encode() ?></td>
	</tr>
	<tr>
		<td> Nomor SKTJM </td>
		<td style=""> : <?php 
			if(!$model->nomor_sktjm)
				{
					echo '-';
				}else{
					echo Html::encode();
				}
			 ?>
		</td>
	</tr>
	<tr>
		<td> Nama Peristiwa </td>
		<td> : </td>
		<td> <?= Html::encode() ?></td>
	</tr>
	<tr>
		<td> Jenis Kerugian </td>
		<td> : </td>
		<td> <?= Html::encode() ?></td>
	</tr>
	<tr>
		<td> Tanggal Kasus Dibuat</td>
		<td> : </td>
		<td> <?= Html::encode() ?></td>
	</tr>
	<tr>
		<td> Tanggal Peristiwa </td>
		<td> : </td>
		<td> <?= Html::encode() ?></td>
	</tr>
	<tr>
		<td> Lokasi Satker Pendaftar </td>
		<td> : </td>
		<td> <?= Html::encode() ?></td>
	</tr>
	<tr>
		<td> Nilai Tanggungan </td>
		<td> : </td>
		<td> <?= Html::encode() ?></td>
	</tr>
	<tr>
		<td> Tata Cara Pembayaran </td>
		<td> : </td>
		<td style=""> <?php 
			if(!$model->tata_cara)
				{
					echo '-';
				}else{
					echo Html::encode();
				}
			 ?>
		</td>
	</tr>
	<tr>
		<td> Status Kasus </td>
		<td> : </td>
		<td style=""> <?= Html::encode() ?></td>
	</tr>
</table>
