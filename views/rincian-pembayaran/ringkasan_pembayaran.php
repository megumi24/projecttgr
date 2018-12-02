Pembayaran atas kasus <?= Html::encode() ?> telah berhasil didaftarkan dalam sistem. Berikut ringkasan pembayaran :
<br/>

<table>
	<tr>
		<td> Nomor ID Kasus </td>
		<td> : </td>
		<td> <?= Html::encode() ?></td>
	</tr>
	<tr>
		<td> Pembayaran Ke </td>
		<td> : </td>
		<td> <?php count($model) ?></td>
	</tr>
	<tr>
		<td> Nomor Dokumen </td>
		<td> : </td>
		<td> <?= Html::encode() ?></td>
	</tr>
	<tr>
		<td> Tanggal Pembayaran </td>
		<td> : </td>
		<td> <?= Html::encode() ?></td>
	</tr>
	<tr>
		<td> Pembayaran </td>
		<td> : </td>
		<td> Rp <?= Html::encode() ?></td>
	</tr>
	<tr>
		<td> Sisa Pembayaran </td>
		<td> : </td>
		<td> Rp <?= Html::encode() ?></td>
	</tr>
</table>