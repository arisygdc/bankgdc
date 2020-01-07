<?php
session_start();
if (!isset($_SESSION['loggedAs'])) {
	header("location:index.php");
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
			</span>
			1. <a href="cekSaldo.php">Cek Saldo</a><br>
			2. <a href="">Transfer</a><br>
			3. <a href="virtualAccount.php">Virtual Account</a><br>
			4. <a href="logout.php">logout</a>
		</div>
	</div>

<?php
require_once 'linkjs.php';
?>

</body>
</html>