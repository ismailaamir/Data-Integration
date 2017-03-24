<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>

<meta name="Title" content="Title"/>

<meta name="keywords" content="keywords"/> 

<meta name="author" content="author"/> 

<link rel="stylesheet" type="text/css" href="default.css" media="screen"/>

<title>Buy cameras</title>
<script type="text/javascript">
	function validateFeilds(){
		//var min_price = document.forms["searchForm"]["minPrice"].value;
		//var max_price = document.forms["searchForm"]["maxPrice"].text;
		var min_price = document.getElementById('minPrice').value;
		var max_price = document.getElementById('maxPrice').value;
		var brand_type = document.forms["input"]["brand"].value;
		var model = document.forms["input"]["models"].value;
		if(min_price >= 0 &&  max_price > 0 && min_price < max_price && brand_type != "" && network_type != "" && model != "" && min_price != "" && max_price != ""){
			return true;
		}else{
			alert("Validation Failed,  check the feilds you have entered");
			return false;
		}
		//alert("Hi");
		
		//for(var i=0; i < elements.length ; i++){
			//elements[i].selectedIndex= 0;
			//elements.selectedIndex= 0;
		//}
	}
	
	window.onload = function() {
	document.forms["input"]["brand"].selectedIndex = 0;
	document.getElementById('minPrice').value = "";
	document.getElementById('maxPrice').value = "";
	}
	

	
	
    function fillSelect(nValue,nList){
        nList.options.length = 1;
        var curr = models[nValue];
        for (each in curr)
            {
             var nOption = document.createElement('option');
             nOption.appendChild(document.createTextNode(curr[each]));
             nOption.setAttribute("value",curr[each]);           
             nList.appendChild(nOption);
            }
    }
	
</script>

</head>



<body>


<div class="container">



	<div class="header">

		

		<div class="title">

			<h1>Cameras and Accessories</h1>

		</div>



		<div class="navigation">

			<a href="index.php">Home</a>

			<a href="about.html">About</a>

		</div>



	</div>



	<div class="main">

		<div class="content"> 

        <div class="main_left"></div>

            <form name="input" id="input" action="smartsearch.php" method="post" style="float:left; margin-top: 120px; font-size: 17px;">

                <span style="float: left; font-size: 20px; font-weight: bold; padding-bottom: 30px;">Enter the Brand name and price range</span>

                <p class="brand_name"> 

                    <span class="name" style="padding-right: 2px; font-family: Lucida Sans Unicode; font-size: 16px;">Brand name:  </span>

                    <select name="brand" id="brand" onchange="fillSelect(this.value,this.form['models'])" autofocus>
						<option value="">Select Brand</option>
						<option value="Canon">Canon</option>
						<option value="Samsung">Samsung</option>
						<option value="Nikon">Nikon</option>
						<option value="Sony">Sony</option>
					</select>
					

                </p>
			
			  <p class="Rating"> 

                    <span class="name" style="padding-right: 2px; font-family: Lucida Sans Unicode; font-size: 16px;">Rating:  </span>

                    <select name="Rating" id="Rating">
						<option value="">Select Rating</option>
						<option value="1 star & up">1 star & up</option>
						<option value="2 star & up">2 star & up</option>
						<option value="3 star & up">3 star & up</option>
						<option value="4 star & up">4 star & up</option>
					</select>
					

                </p>
				
				 <p class="colour"> 

                    <span class="name" style="padding-right: 2px; font-family: Lucida Sans Unicode; font-size: 16px;">Rating:  </span>

                    <select name="colour" id="colour">
						<option value="">Select colour</option>
						<option value="black">black</option>
						<option value="white">white</option>
					</select>
					

                </p>
			
                <p>

                    <span class="m_price" style="font-family: Lucida Sans Unicode; font-size: 16px;">Min Price $:</span> 
					<input type="text" id="minPrice" name="minPrice" size="20"  style="font-size: 17px;" value=" "/>

                </p>

                <p>

                    <span class="ma_price" style="font-family: Lucida Sans Unicode; font-size: 16px;">Max Price $:</span>
					<input type="text" id="maxPrice" name="maxPrice" size="20" style="font-size: 17px;" value=" "/>

                </p>

                <button name="search" type="submit" id="getData" value="Search" onclick="return validateFeilds();">Search</button>  

            </form>

        </div>

            

        </div>

	

		<div class="clearer">&nbsp;</div>



	</div>



</div>



<div class="footer">



	<div class="left">&copy; 2015 <a href="index.php">Ismail Aamir | Latheesh | Adil</a></div>

	<div class="clearer">&nbsp;</div>



</div>



</body>


</html>

