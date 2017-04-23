<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ph1609M Test</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="common/final.css"/>
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"/></script>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">
					Bài Test ph1609m
				</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">Trang chủ</a></li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quản lý danh mục <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="index.php?view=category">Thêm mới</a></li>
            				<li><a href="index.php?view=listcategory">Danh sách</a></li>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quản lý sản phẩm <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="index.php?view=product">Thêm mới</a></li>
            				<li><a href="index.php?view=listproduct">Danh sách</a></li>
						</ul>
					</li>
					<!-- <li><a href="#">Something else here</a></li>
					<li><a href="#">Separated link</a></li> -->
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<?php  
					if(isset($_GET["view"])){
						include("module/".$_GET["view"].".php");
					}else{
						include("module/home.php");
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>