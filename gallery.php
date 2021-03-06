<?php include "config/connection.php";?>
<!DOCTYPE html>
<html lang="en">
	<!-- start: HEAD -->
	<head>
		<title>Oriflame Beauty App</title>
		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/favicon.ico" />

		<!-- end: MAIN CSS -->
	</head>
	<!-- end: HEAD -->
	<body>
	
		<!-- start: HEADER -->
		<header>
			<div style="padding-top:40px;padding-bottom:50px;">
				<p align="center"><img src="images/oriflame.png" class="img-responsive"/></p>
			</div>
		</header>
		<!-- end: HEADER -->
		<!-- start: MAIN CONTAINER -->
		<div class="main-container">
			<section class="wrapper wrapper-grey padding50">
				<!-- start: WORKS CONTAINER -->
				<div class="container" style="background-color:#FFFFFF">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-2 col-sm-2">
								<h2><a href="index.php" style="text-decoration: none">< Home</a></h2>
							</div>
							<div class="col-md-8 col-sm-8">
								<h2><p class="text-center">GALLERY</p></h2>
							</div>
						</div>
					</div>
					
					
					<div class="row">
						<div class="col-md-12">
							<div class="grid-container animate-group" data-animation-interval="100">
								<?php $tampil=mysql_query("SELECT * FROM t_gallery ORDER BY jum_likes DESC");
											$no=1;
											while ($r=mysql_fetch_array($tampil)){?>
										<div class="col-md-4 col-sm-6">
											<div class="grid-item animate">
												<a href="#">
													<div class="grid-image">
														<img src="images/<?=$r['foto']?>" class="img-responsive"/>
													</div>
												</a><br>
												<i class="fa fa-heart"></i><?=$r['jum_likes']?> Likes<br>
												<?=$r['nama']?><br>										
											</div>
										</div>
								<?php 
									$no++;
								} ?>
							</div>
						</div>
					</div>
				</div>
				<!-- end: WORKS CONTAINER -->
			</section>
		<!-- end: FOOTER -->
	</body>
</html>
