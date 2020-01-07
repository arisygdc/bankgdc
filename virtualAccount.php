<?php
session_start();
if (!isset($_SESSION['loggedAs'])) {
	header("location:home.php");
}

require_once "koneksi.php";
$telepon   = $_SESSION['loggedAs'];
if ($result = mysqli_query($link_bank, "select rekening from rekening where nmr_telepon='$telepon'")) {
	$row = mysqli_fetch_row($result);
	$rekening = $row[0];
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
				Virtual Account
			</span>
			<form class="contact100-form validate-form" action="konfirmasiTransfer.php" method="post">
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Virtual Account</span>
					<input class="input100" type="text" name="tujuan" placeholder="Rekening Tujuan">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Jumlah Transfer</span>
					<input class="input100" type="text" name="jumlah" placeholder="Nominal Transfer">
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" name="konfirmasi">
							<span>
								konfirmasi
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
				<input type="hidden" name="rekening" value="<?php echo $rekening ?>">
			</form>
			<div class="container-contact100-form-btn">
				<div class="wrap-contact100-form-btn">
					<div class="contact100-form-bgbtn"></div>
					<a href="home.php">
						<button class="contact100-form-btn">
							<span>
								<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>&nbsp;&nbsp;
								Kembali
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