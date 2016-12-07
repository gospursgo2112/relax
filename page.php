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
?>
<!DOCTYPE html>
<html>
<head>
<!-- by iZO.tw 載入jquery & jeditable.js & jeditable.php -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://www.appelsiini.net/download/jquery.jeditable.js"></script>
<script type="text/javascript">
$(document).ready(function() {
     $('.jedit').editable('jeditable.php', { 
         type      : 'textarea',
         cancel    : '取消',
         submit    : '修改',
         indicator : '正在儲存中',
         tooltip   : '點擊修改'
     });
});
</script>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<title>iZO jeditable 教學</title>
</head>
<body>
 
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
while($row=mysqli_fetch_array($result)) { 
 echo "<tr><td>".$row["orderID"]."</td>
 <td class='jedit' id='bigAmount_".$row["orderID"]."'>".$row["bigAmount"]."</td>
 <td class='jedit' id='smallAmount_".$row["orderID"]."'>".$row["smallAmount"]."</td>
 <td class='jedit' id='smallAmount_".$row["orderID"]."'>".$row["checkInDate"]."</td>
 <td class='jedit' id='smallAmount_".$row["orderID"]."'>".$row["checkOutDate"]."</td>
 <td class='jedit' id='smallAmount_".$row["orderID"]."'>".$row["customerID"]."</td>
 <td class='jedit' id='smallAmount_".$row["orderID"]."'>".$row["customerNumber"]."</td>
 <td class='jedit' id='smallAmount_".$row["orderID"]."'>".$row["payDeposit"]."</td>
 <td class='jedit' id='smallAmount_".$row["orderID"]."'>".$row["payBalance"]."</td>
 <td class='jedit' id='smallAmount_".$row["orderID"]."'>".$row["totalPrice"]."</td></tr>";
}
?>
</tbody></table><button type='submit' class='btn btn-default'>Submit</button>

</table>
</body>
</html>