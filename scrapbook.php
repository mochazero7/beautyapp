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
		<style type="text/css">
		h1 {
			font-family: 'GothamBook';
		}
		</style>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/html2canvas.js"></script>
		<script type="text/javascript" src="js/jquery.plugin.html2canvas.js"></script>
		<style>
		#div1 {width:200px;height:200px;padding:5px;border:1px solid #aaaaaa;transform: rotate(-5deg)}
		#div2 {width:200px;height:200px;padding:5px;border:1px solid #aaaaaa;transform: rotate(5deg)}
		#div3 {width:200px;height:200px;padding:5px;border:1px solid #aaaaaa;transform: rotate(-5deg)}
		#div4 {width:200px;height:200px;padding:5px;border:1px solid #aaaaaa;transform: rotate(5deg)}
		#div5 {width:200px;height:200px;padding:5px;border:1px solid #aaaaaa;transform: rotate(5deg)}
		#div6 {width:200px;height:200px;padding:5px;border:1px solid #aaaaaa;transform: rotate(-5deg)}
		</style>
		<style type="text/css">
		.target {
		background : url(images/bg-scrap.png) no-repeat;
		height : 100%;
		width : 100%;
		}
		.target1 {
		background : url(images/bg-scrap1.png) no-repeat;
		height : 100%;
		width : 100%;
		}
		.target2 {
		background : url(images/bg-scrap2.png) no-repeat;
		height : 100%;
		width : 100%;
		}
		.target3 {
		background : url(images/bg-scrap3.png) no-repeat;
		height : 100%;
		width : 100%;
		}
		</style>
		<script>
		function allowDrop(ev) {
			ev.preventDefault();
		}

		function drag(ev) {
			ev.dataTransfer.setData("text/html", ev.target.id);
		}

		function drop(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text/html");
			ev.target.appendChild(document.getElementById(data));
		}
		</script>
		
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
								<h2><p class="text-center">SCRAPBOOK</p></h2>
							</div>
						</div>
					</div>
					<form method="POST" enctype="multipart/form-data" action="save.php" id="myForm">
						<input type="hidden" name="img_val" id="img_val" value="" />
						<input type="hidden" name="id_scrapbook" id="id_scrapbook" value="<?php echo 'Scrapbook';?>" />
					<div id="bgr" class="row" style="background : url(images/bg-scrap.png) no-repeat">
					<div id="target">
					<br>
					<div class="row">
						
						<div class="col-md-12">
							<div class="col-md-3 col-sm-3" align="center">
								<div style="width:150px;height:170px;padding:5px;border:1px solid #aaaaaa;transform: rotate(-5deg)" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
							</div>
							<div class="col-md-6 col-sm-6">
							</div>
							
							<div class="col-md-3 col-sm-3" align="center">
								<div style="width:150px;height:170px;padding:5px;border:1px solid #aaaaaa;transform: rotate(5deg)" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3 col-sm-3">
							</div>
							<div class="col-md-3 col-sm-3" align="center">
								<div style="width:150px;height:170px;padding:5px;border:1px solid #aaaaaa;transform: rotate(5deg)" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
							</div>
							<div class="col-md-3 col-sm-3" align="center">
								<div style="width:150px;height:170px;padding:5px;border:1px solid #aaaaaa;transform: rotate(-5deg)" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
							</div>
							<div class="col-md-3 col-sm-3">
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3 col-sm-3" align="right">
								<div style="width:150px;height:170px;padding:5px;border:1px solid #aaaaaa;transform: rotate(5deg)" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
							</div>
							<div class="col-md-3 col-sm-3">
							</div>
							<div class="col-md-3 col-sm-3">
							</div>
							<div class="col-md-3 col-sm-3" align="left">
								<div style="width:150px;height:170px;padding:5px;border:1px solid #aaaaaa;transform: rotate(-5deg)" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
							</div>
						</div>
						<div class="col-md-12">
							<br>
							<br>
							<br>
							<br>
							<br>
						</div>
					</div>
					</div>
					</div></form>
					<br>
					<br>
					<div class="row">
						<div class="col-md-9">
							<b>DRAG AND DROP ITEMS YOU WANT TO PUT IN</b>
							<br>
							Your Photos:
						</div>
						<div class="col-md-3">
							<b>CHOOSE THEMES</b>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 col-sm-9">
						<?php $tampil=mysql_query("SELECT * FROM t_gallery ORDER BY jum_likes DESC");
											$no=1;
											while ($r=mysql_fetch_array($tampil)){?>
										<div class="col-md-3 col-sm-3">
											<div class="grid-image">
												<img id="drag<?=$no?>" src="http://127.0.0.1/beautyapp/images/<?=$r['foto']?>"  draggable="true" ondragstart="drag(event)" class="img-responsive"/>
											</div>
										</div>
								<?php 
									$no++;
								} ?>
						</div>
						<div class="col-md-3 col-sm-3">
							<a href="#none" onclick="document.getElementById('target').className='target1'"><img src="images/theme1.jpg"></a>
							<a href="#none" onclick="document.getElementById('target').className='target2'"><img src="images/theme2.jpg"></a>
							<a href="#none" onclick="document.getElementById('target').className='target3'"><img src="images/theme3.jpg"></a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-md-offset-9">
							<input type="submit" value="SAVE SCRAPBOOK" onclick="capture();" />
						</div>
					</div>
				</div>
				<!-- end: WORKS CONTAINER -->
			</section>
		<!-- end: FOOTER -->
	</body>
</html>
<script type="text/javascript">
	function capture() {
		$('#target').html2canvas({
			onrendered: function (canvas) {
                //Set hidden field's value to image data (base-64 string)
				$('#img_val').val(canvas.toDataURL("image/png"));
                //Submit the form manually
				document.getElementById("myForm").submit();
			}
		});
	}
</script>