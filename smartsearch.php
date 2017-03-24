<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<meta name="Title" content="Title"/>
<meta name="keywords" content="keywords"/> 
<meta name="author" content="author"/> 
<link rel="stylesheet" type="text/css" href="default.css" media="screen"/>
<title>Cameras</title>
</head>

<body>
<div class="container">

	<div class="header">
		
		<div class="title">
			<h1>Cameras</h1>
		</div>

		<div class="navigation">
			<a href="index.php">Home</a>
			<a href="about.html">About</a>
		</div>

	</div>

	<div class="main">
        <table style="font-size: 17px;">
        <tr>
		    <td style="padding: 10px; font-weight: bold;"> </td>
			<td style="padding: 10px; font-weight: bold;"> Title </td>
            <td style="padding: 10px; font-weight: bold;"> Price </td>
			<td style="padding: 10px; font-weight: bold;"> Seller </td>
			<td style="padding: 10px; font-weight: bold;"> Rating </td>
        </tr>
        <?php
			include 'scrappers/Amazon.php';
			include 'scrappers/walmart.php';
			include 'scrappers/newegg.php';
			
			$brand = $_POST['brand'];
			$network = $_POST['network'];
			$model = $_POST['models'];
			$rating = $_POST['Rating'];
			$min_price = (int)$_POST['minPrice'];
			$max_price = (int)$_POST['maxPrice'];
			#echo $brand."-".$network."-".$min_price."-".$max_price;
			$fileHandle = fopen("databaseFile.txt", "r");
			$firstLine = false;
			while(!feof($fileHandle)){
				$record = fgets($fileHandle);
				$splitRecord = explode('@',$record);
				if($firstLine){
					if(trim($splitRecord[2]) != null && trim($splitRecord[2]) != "" && trim($splitRecord[2]) != "Not Available"){
						$prodPrice = explode('$',$splitRecord[2]);
						if(trim($prodPrice[1]) >= $min_price && trim($prodPrice[1]) <= $max_price){
							if(trim($splitRecord[1]) == 'Not Available'){
								echo("<tr> <td style='padding: '10px';vertical-align: middle'><img src='img/imageNA.jpg' width='150' height='150' /></td>");
							}else{
								echo("<tr> <td style='padding: '10px';vertical-align: middle'><img src='" . $splitRecord[1] . "' width='150' height='150' /></td>");
							}
							
							echo("<td style='padding: 10px;vertical-align: middle'>" . $splitRecord[5]. "</td>");
				echo("<td style='padding: 10px;vertical-align: middle'>" . $splitRecord[2] . "</td> ");
							echo("<td style='padding: 10px;vertical-align: middle'><a href='" .$splitRecord[6]."' target='_blank'>". $splitRecord[0] . "</a></td>");
							echo("<td style='padding: 10px;vertical-align: middle'>".$rating."</td></tr>");
						}
					}	
				}	
				$firstLine = true;
			}
			fclose($fileHandle);
        ?>
        </table>
    
    </div>
	
		<div class="clearer">&nbsp;</div>

	</div>

</div>

<div class="footer">

	<div class="left">&copy; 2015&nbsp<a href="index.php">Ismail Aamir | Latheesh | Adil</a>.
	<div class="clearer">&nbsp;</div>

</div>

</body>
</html>
