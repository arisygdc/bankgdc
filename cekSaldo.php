<?php
session_start();
if (!isset($_SESSION['loggedAs'])) {
	header("location:index.php");
}

require_once "koneksi.php";
$telepon   = $_SESSION['loggedAs'];

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
				M-bankgdc<br>
				Informasi Saldo
			</span>
			<?php  
			if ($result = mysqli_query($link_bank, "select * from rekening where nmr_telepon='$telepon'")) {
				$row = mysqli_fetch_row($result);
				echo "Dari rekening " . $row[0] . " an " . $row[1] . "<br>Saldo : " . $row[4];
			}
			?>
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