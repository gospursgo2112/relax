<html>
	<head>
		<title>放輕鬆民宿管理系統</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "Shortcut Icon" type = "image/x-icon" href = "boss_picture/icon.ico" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="boss_frame_css.css">
		<script src="boss_frame_js.js"></script>
		
		<script src="http://www.appelsiini.net/download/jquery.jeditable.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			 $('.jedit').editable('jeditable.php', { 
				 type      : 'textarea',
				 cancel    : '<button type="button" class="btn btn-default btn-xs">取消</button>',
				 submit    : '<button type="button" class="btn btn-default btn-xs">儲存</button>',
				 indicator : '正在儲存中',
				 tooltip   : '點擊修改',
			 });
		});
		</script>
		<style type = "text/css">
			th	{color:#FFFFFF}
			.someclass input {
				 margin: inherit;
					padding: inherit;
					font: inherit;
					color: blue;
					background: black;
					border: inherit
			}

		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row content">
				<div class="col-md-2 sidenav"></div>
				<div class="col-md-8 center">
					<div class="jumbotron jumbotronCSS">
						<h2>Re<br>Lax</h2>
						<h6>Homestay in Hualien</h6>
					</div>
					<nav class="navbar navbar-default">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="">放輕鬆民宿</a>
							</div>
							<div class="collapse navbar-collapse" id="myNavbar">
								<ul class="nav navbar-nav">
									<li><a href="boss_homepage.html">首頁</a></li>
									<li><a href="boss_customer.html">顧客資訊</a></li>
									<li class="active"><a href="#">訂單資訊</a></li>
									<li><a href="boss_comment.html">評論管理</a></li>
								</ul>
								<ul class="nav navbar-nav navbar-right">
									<li><a href="boss_login.html">登出</a></li>
								</ul>
							</div>
						</div>
					</nav>
					<div class="row-md-8 center">
<!-- ======================================================================================================================================================= -->
					<div class="btn-group">
						<a href="boss_order.php" class="btn btn-default" role="button">檢視模式</a>
						<a href="boss_order_edit.php" class="btn btn-default" role="button">編輯模式</a>
					</div>
					<br><br>
					<table class='table table-hover' style='border:4px #ce5656 solid; font-size: 10px;' rules='all'><thead bgcolor='#ce5656'>
								<tr>
									<th>訂單編號</th>
									<th>大間數量</th>
									<th>小間數量</th>
									<th>入住時間</th>
									<th>退房時間</th>
									<th>顧客編號</th>
									<th>入住人數</th>
									<th>已付訂金</th>
									<th>已付尾款</th>
									<th>訂單金額</th>
								</tr>
							</thead>
								<tbody>
<?php
// 連接mysql
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "relax";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn,"utf8");

$sql = "SELECT * FROM roomorder";
$result = mysqli_query($conn, $sql);

while($row=mysqli_fetch_array($result)) { 
 echo "<tr><td>".$row["orderID"]."</td>
 <td class='jedit' id='bigAmount_".$row["orderID"]."'>".$row["bigAmount"]."</td>
 <td class='jedit' id='smallAmount_".$row["orderID"]."'>".$row["smallAmount"]."</td>
 <td class='jedit' id='checkInDate_".$row["orderID"]."'>".$row["checkInDate"]."</td>
 <td class='jedit' id='checkOutDate_".$row["orderID"]."'>".$row["checkOutDate"]."</td>
 <td class='jedit' id='customerID_".$row["orderID"]."'>".$row["customerID"]."</td>
 <td class='jedit' id='customerNumber_".$row["orderID"]."'>".$row["customerNumber"]."</td>
 <td class='jedit' id='payDeposit_".$row["orderID"]."'>".$row["payDeposit"]."</td>
 <td class='jedit' id='payBalance_".$row["orderID"]."'>".$row["payBalance"]."</td>
 <td class='jedit' id='totalPrice_".$row["orderID"]."'>".$row["totalPrice"]."</td></tr>";
}
?>

</tbody></table><button type='submit' class='btn btn-default'>Submit</button>

<!-- ======================================================================================================================================================= -->				<div>
				</div>
				<div class="col-md-2 sidenav"></div>
			</div>
		</div>
	</body>
</html>
<!-- ======================================================================================================================================================= -->