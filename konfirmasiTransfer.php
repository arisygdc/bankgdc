<?php 
session_start();
require_once "koneksi.php";
require_once "koneksiWeb.php";

$rekening   = $_POST['rekening'];
$tujuan   = $_POST['tujuan'];
$jumlah   = $_POST['jumlah'];

if (isset($_POST['konfirmasi'])) {
	$cek_tujuan = mysqli_query($link_web, "select id, nama from users where no_telpon='$tujuan'");
	$hasil_cek = mysqli_num_rows($cek_tujuan);
	if ($hasil_cek < 1) {
		echo "<script>
		alert(\"Virtual account tujuan tidak ditemukan\");
		window.location.href=\"home.php\";
		</script>";
	}
	$data_tujuan = mysqli_fetch_row($cek_tujuan);
}

if (isset($_POST['transfer'])) {
	$nama_tujuan = $_POST['nama_tujuan'];
	$id_tujuan   = $_POST['id_tujuan'];

	$query = "insert into `transfer`(`rekening`, `rekening_tujuan`, `jumlah_transfer`) values('$rekening', '$tujuan', '$jumlah')";
	if ($transfer = mysqli_query($link_bank, $query)) {
		$update_web = mysqli_query($link_web, "CALL apiBankgdc_isiSaldo(" . $id_tujuan . ", " . $jumlah . ")");
		echo "<script>
		alert(\"Transfer Berhasil\");
		window.location.href=\"home.php\";
		</script>";
	} else {
		echo "<script>
		alert(\"Transfer Gagal\");
		window.location.href=\"home.php\";
		</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>bakdgdc</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
require_once 'linkcss.php';
?>
</head>
<body>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<span class="contact100-form-title">
				M-bankgdc
				<br>
				Konfirmasi Transfer
			</span>
			Virtual Account : <?php echo $tujuan ?> <br>
			Pembayaran : Arisan <br>
			Atas Nama : <?php echo $data_tujuan[1]; ?> <br> 
			Jumlah Transfer : <?php echo $jumlah ?>
			<form action="" method="post">
				<input type="hidden" name="rekening" value="<?php echo $rekening ?>">
				<input type="hidden" name="tujuan" value="<?php echo $tujuan ?>">
				<input type="hidden" name="jumlah" value="<?php echo $jumlah ?>">
				<input type="hidden" name="id_tujuan" value="<?php echo $data_tujuan[0] ?>">
				<input type="hidden" name="nama_tujuan" value="<?php echo $data_tujuan[1] ?>">
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" name="transfer">
							<span>
								transfer
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
			<div class="container-contact100-form-btn">
				<div class="wrap-contact100-form-btn">
					<div class="contact100-form-bgbtn"></div>
					<a href="home.php">
						<button class="contact100-form-btn">
							<span>
								<i class="fa fa-long-arrow-left m-l-7" aria-hidden="true"></i>&nbsp;&nbsp;
								batal
							</span>
						</button>
					</a>
				</div>
			</div>
		</div>
	</div>

<?php
require_once 'linkjs.php';
?>

</body>
</html>