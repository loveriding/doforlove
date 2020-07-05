<?php
	session_start();
	if(isset($_SESSION['username'])){
		$name = $_SESSION['username'];
		// get ID admin
		require('libs/db.php');
		$sqlAd = "SELECT * from user WHERE username = '$name'";
		$resultAd = mysqli_query($link, $sqlAd);
		if(mysqli_num_rows($resultAd) > 0){
			$rowAd = mysqli_fetch_assoc($resultAd);
		}	
?>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Bảng quản trị</a>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
				<?php include("menutrai.php"); ?>

				<ul class="nav navbar-nav navbar-right navbar-user">
				
				<li class="divider-vertical"></li>
				<li class="dropdown user-dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user"></i> <?php echo $_SESSION['username'];?>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo "editUser.php?id=". $rowAd["ID"]?>"> <i class="fa fa-user"></i> Profile</a>
						</li>
						<li>
							<form method="post" action="">
								<a> <button id="logout" name="log_out" > 
									<i class="fa fa-power-off"></i>Đăng xuất</button> 
								</a>
							</form>
						</li>

					</ul>
				</li>
			</ul>

			<style>
				#logout{
					background: black; 
					width: 100%; 
					border: none; 
					color: white; 
					text-align: left; 
					padding-left: 20px;
				}
			</style>
			<?php
				if(isset($_POST["search"])){
					header('Location:index.php');
				}
				if(isset($_POST["log_out"])){
					unset($_SESSION['username']);
					session_unset(); 
					session_destroy();
					header('Location:../index.php');
				}
			?>
		</div>
	</nav>
<?php
	} else {
		header('Location:../index.php');
	}
?>
