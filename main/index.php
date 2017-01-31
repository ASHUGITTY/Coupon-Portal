
<!DOCTYPE html>
<html>
<head>
	<title>Coupons</title>
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
</head>
<style type="text/css">
	body{
		margin: 0;
		background-color: #a9a9a9;

	}
	.heading{
		margin-left: 4%;
		font-size: 30px;
		color: black;
		font-family: 'Quicksand', sans-serif;
	}
	.main,.logo{
		list-style-type: none;

	}
	.main_li{
		float: left;
		margin-left: 10px;
		margin-top: 10px;
	}
	.logo_li{
		float: left;
		margin: 0;
	}
	.companyName{

		font-family: 'Quicksand', sans-serif;
	}
	.container{

		height: 220px;
		width: 350px;
		background-color: white;
		color: black;
		border-radius: 5px;
		box-shadow: 0 10px 10px 0 #888888;
	}
	.content
	{

		font-family: 'Quicksand', sans-serif;
		font-size: 20px;
		font-weight: 500;
		height: 60px;


	}
	.get-coupon{

		height: 45px;
		width: 200px;
		border: 1px solid skyblue;
		background-color: white;
		border-radius: 5px;
		font-family: 'Quicksand', sans-serif;
		color: skyblue;
		font-weight: bold;
		text-align: center;
		margin-left: 18%;

	}
	#couponInfo{
		
		height: 200px;
		width: 50%;
		background-color: skyblue;
		margin-top: 50%;
		margin-bottom: 5%;
		font-family: 'Quicksand', sans-serif;
		align-self: center;
		color:black;
		font-size: 30px;
		display: none;
		margin-left: 20%;
		border-radius: 5px;
		position: relative;
		box-shadow: 0 10px 10px 0 #888888;
	}
	
	.code{
		text-align: center;
		padding-top: 2%;
		font-size: 20px;
	}
	.navigateTostore{
		text-align: center;
		font-size: 20px;
	}
	.url{

		text-decoration: none;
	}
	.message{
		text-align: center;

	}
	.codeNo{

		font-weight: bold;
		color: #ff8518;
	}
</style>
<body>
<div id="couponContainer">
<h3 class="heading">Recharge Offers</h3>
<?php 
/*fetching json data*/
$str = file_get_contents('assignment.json');
/*decoding json data*/
$json = json_decode($str,true);
for($i=0;$i<count($json['grid_layout']);$i++){ 


	echo "<ul class='main'>";
	echo "<li class='main_li'>";
	echo "<div class='container'>";
	echo "<ul class='logo'>";
	echo "<li class='logo_li'>";
	echo "<img src=". $json['grid_layout'][$i]['storeImg']." height='30px'  width='30px' style='margin-top:35%;'>";
	echo "</li>";
	echo "<li class='logo_li'>";

	echo "<p class='companyName'>".$json['grid_layout'][$i]['store']."</p>";
	echo "</li>";
	echo "</ul>";
	echo "<ul class='logo'>";
	echo "<li class='logo_li'>";
	echo "<p class='content'>"."<b>".$json['grid_layout'][$i]['title']."</b>"."</p>";
	echo "</li>";
	echo "</ul>";
	echo "<ul class='logo'>";
	echo "<li class='logo_li'>";
	echo "<a href='#couponInfo'>"."<input type='button' class='get-coupon' onclick='get_coupon()' value='GET COUPON' id='$i'>"."</a>"."</input>";
	
	echo "</li>";
	echo "</ul>";


	echo "</div>";
	echo "</li>";
	echo "</ul>";
}


?>
</div>

<div id="couponInfo"><p class="message"><b>Congratulations!!</b></p> <p class="code">Coupon code copied was<span class="codeNo"></span></p> 
<p class="navigateTostore"><a  class="url" href="#" id="link" >Click Here</a>to go to the store</p>
</div>


</body>
<script type="text/javascript">

		$('.get-coupon').click(function get_coupon(){

				/*Displaying coupon code*/
				$("#couponInfo").css("display","block");
				var x = $(this).attr('id');	

			/*fetching json data*/
			$.getJSON('assignment.json',function(read_data){
				 
				 $(".codeNo").append(read_data.grid_layout[x].code);
				 var link = read_data.grid_layout[x].url;
				  $(".url").attr("href",link);
				 
				 
			});

		});
		
</script>
</html>


<?php




?>