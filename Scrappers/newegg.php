<?php
	error_reporting(0);
	
	
	$brand = $_POST['brand'];
	
	 $rating = $_POST['Rating'];

	if($rating == "1 star & up")
	 $rating = "&N=4111%204112%204113%204114%204115";
	else if($rating == "2 star & up")
	 $rating = "&N=4112%204113%204114%204115";
	else if($rating == "3 star & up")
	 $rating = "&N=4113%204114%204115";
	else if($rating == "4 star & up")
	 $rating = "&N=4114%204115";
	$min_price = (int)$_POST['minPrice'];
    $max_price = (int)$_POST['maxPrice'];
	//echo $brand."-".$model;
	//$File_Manager = fopen("databaseFile.txt", 'w+');
	$amazonurl = curl_init("http://www.newegg.com/Product/ProductList.aspx?Submit=ENE&IsNodeId=1&Description=Canon&bop=And&Pagesize=90&Page=1");
	curl_setopt($amazonurl, CURLOPT_RETURNTRANSFER, 1); 

	$amazon=curl_exec($amazonurl);

	//echo $temp;
 	//echo $amazon;
	$amazon = preg_replace('/\s+/', '', $amazon);

	$amazon = preg_replace('<!--(.*?)-->', '', $amazon);

	//fwrite($File_Manager,$amazon);

	//echo $amazon;

/*
	if(preg_match_all('/imgalt=["]ProductDetails["]src=["](.*?)["]onload=["](.*?)["]class=["](.*?)["]height=["](.*?)["]width=["](.*?)["]>/i',$amazon,$imagearray)){
		//echo 'Images in Product:';
		//echo sizeof($imagearray[1]);
		//echo $imagearray[1][23];
		$url = (string)$imagearray[1][23];
		//echo " <img src=\"$url\"/>";
	}
*/
	//	echo sizeof($productarray[1]);

	//<liclass=["]newp["]><divclass=["]["]><ahref=["](.*?)["]><delclass=["]grey["]>(.*?)<\/del><spanclass=["]bldlrgred["]>(.*?)<\/span><\/a><\/div><\/li>

	$i=0;

//	if(preg_match_all('/<ulclass=["]rsltGridListgrey["]>(.*?)<\/ul>/i',$amazon,$productarray))
	if(preg_match_all('/divclass=["]itemCell["]id=["](.*?)["]>(.*?)<\/div/i',$amazon,$productarray))
	{
		foreach ($productarray[2] as $singleentry)
		{
			//echo $singleentry;
			fwrite($File_Manager,"\nnewegg@");
			if(preg_match_all('/imgalt=["](.*?)["]src=["](.*?)["]/',$singleentry,$imagearray))			
			{
				if($imagearray[2][0] != "" && $imagearray[2][0] != null){
				fwrite($File_Manager,$imagearray[2][0].'@');
			}else{
				fwrite($File_Manager,"Not Available@");
			}
			
			}			
			if(preg_match_all('/spanclass=["]price-current-label["]\>(.*?)\<strong\>(.*?)\</i',$amazon,$listingprice))
			{
				if($listingprice[2][$i] != "" && $listingprice[2][$i] != null){
					fwrite($File_Manager,'$'.$listingprice[2][$i].'@');
					/*echo "price is :";
					echo "<b>";
					echo $listingprice[2][0];
					echo "<\b>";*/
				}else{
					fwrite($File_Manager,"Not Available@");		
				}
				#echo "\r\n";
			}else if(preg_match_all('/h3class=["]tile-heading["]><div>(.*?)</i',$singleentry,$listingprice)){

				if($listingprice[1][0] != "" && $listingprice[1][0] != null){
                                        fwrite($File_Manager,$listingprice[1][0].'@');
                                        //echo "price is :";
                                        //echo "<b>";
                                        //echo $listingprice[1][$i];
                                        //echo "<\b>";
                                }else{
                                        fwrite($File_Manager,"Not Available@");
                                }
			}

			if(preg_match_all('/<i>/i',$singleentry,$alternate_new_price))
			{
				#echo 'Alternate New Price:';
				#echo $alternate_new_price[1][0];
				if($alternate_new_price[1][0] != "" && $alternate_new_price[1][0] != null){
					fwrite($File_Manager,$alternate_new_price[1][0].'@');		
				}else{
					fwrite($File_Manager,"Not Available@");
				}
				#echo "\r\n";
			}else{
					fwrite($File_Manager,"Not Available@");
			}

			if(preg_match_all('/used["]><spanclass=["]pricebld["]>(.*?)<\/span>used<spanclass=["]grey["]>/i',$singleentry,$alternate_old_price))
			{
				#echo 'ALternate Old Price:';
				#echo $alternate_old_price[1][0];
				if($alternate_old_price[1][0] != "" && $alternate_old_price[1][0] != null){
					fwrite($File_Manager,$alternate_old_price[1][0].'@');
				}else{
					fwrite($File_Manager,"Not Available@");
				}
				#echo "\r\n";
			}else{
				fwrite($File_Manager,"Not Available@");
			}
			if(preg_match_all('/ahref=["]http:\/\/www.newegg.com\/Product\/Product.aspx\?Item(.*?)["]title=["]ViewDetails["]\>\<span(.*?)\>(.*?)\</i',$amazon,$productdescription))
			#echo $productdescription;
			{
			
					#echo 'Product Description';
					#echo htmlspecialchars_decode($productdescription[2][0]);
					#echo "\r\n";
					if($productdescription[3][$i] != "" && $productdescription[3][$i] != null){
						fwrite($File_Manager,$productdescription[3][$i].'@');
					}else{
						fwrite($File_Manager,"Not Available@");
					}
			}
				
			

			if(preg_match_all('/ahref=["]http:\/\/www.newegg.com\/Product\/Product.aspx\?Item(.*?)["]title=["]ViewDetails["]/i',$amazon,$url_product))
				{
					if($url_product[1][$i] !="" && $url_product[1][$i] != null){
						fwrite($File_Manager,'http://www.newegg.com/Product/Product.aspx?Item'.$url_product[1][$i].'@');
						//echo 'URL of the product:';
                                        	//echo $url_product[2][$i];
					}else{
						fwrite($File_Manager,"Not Available@");
					}
					#echo "\r\n";
				}else{
					fwrite($File_Manager,"Not Available@");
				}
			if(preg_match_all('/new["]><spanclass=["]pricebld["]>(.*?)<\/span>new<spanclass=["]grey["]>(.*?)<\/span><\/a><\/li><liclass=["]medgreymkp2["]><ahref="(.*?)condition=used["]>/i',$singleentry,$alternate_sellers_url_used))
				{
					#echo 'URL of the used product from alternate sellers :';
					#echo $alternate_sellers_url_used[3][0];
					if($alternate_sellers_url_used[3][0] != "" && $alternate_sellers_url_used[3][0] != null){	
						fwrite($File_Manager,$alternate_sellers_url_used[3][0].'@');
					}else{
						fwrite($File_Manager,"Not Available@");
					}
					#echo "\r\n";
				}else{
					fwrite($File_Manager,"Not Available@");
				}
				
			if(preg_match_all('/class=["]asinReviewsSummary["]><aalt=["](.*?)["]href=["]/i',$singleentry,$product_rating))
				{
						#echo 'Product rating :';
	//			print_r ($product_rating);
						#echo $product_rating[1][0];
						if($product_rating[1][0] != "" && $product_rating[1][0] != null){
							fwrite($File_Manager,$product_rating[1][0]);
						}else{
							fwrite($File_Manager,"Not Available@");
						}
						#echo "\r\n";
				}else{
					fwrite($File_Manager,"Not Available@");
				}


			//echo $singleentry;

			#echo "\r\n";
			#fwrite($File_Manager,"\n");
			$i++;
			
		}
		#fwrite($File_Manager,"LastLine out of for loop");
	}

	return ;
?>

