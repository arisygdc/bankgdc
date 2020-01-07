<?php
session_start();
if (isset($_POST['submit'])) {
	require_once "koneksi.php";
	$telepon   = $_POST['telepon'];
	$kdacc       = $_POST['kdacc'];
	
	$user = mysqli_query($link_bank,"select * from rekening where nmr_telepon='$telepon' and kode_akses='$kdacc'");
	$chek = mysqli_num_rows($user);
	if($chek>0)
	{
	    $_SESSION['loggedAs'] = $telepon;
	}else
	{
	    echo "<script>alert(\"Pastikan anda mengisi dengan benar\");</script>";
	}
	unset($_POST['submit']);
} 

if (isset($_SESSION['loggedAs'])) {
	header("location:home.php");
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
			<form class="contact100-form validate-form" action="index.php" method="post">
				<span class="contact100-form-title">
					M-bankgdc 
				</span>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">No Telepon</span>
					<input class="input100" type="text" name="telepon" placeholder="Masukkan nomor telepon anda">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Kode Akses</span>
					<input class="input100" type="password" name="kdacc" placeholder="Masukkan kode akses anda">
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" name="submit">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
require_once 'linkjs.php';
?>

</body>
</html>
