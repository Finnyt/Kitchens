<?php 
require_once ('prebody.php');
?>	
	
    <div class="contentwrap">
			<article>
				<a href="reviews"><h1>- Reviews - </h1></a>
				
				
				<?php 
				if (isset($_REQUEST['id'])) {// user gets here by clicking on link with id
				//This pulls out the required data to populate the page of the url generated in later loop:
                $id_raw = trim(htmlentities($_REQUEST["id"]));
				$data = reviews_data_id($conn, $id_raw);
				?>
        		
        			
        			<h2><?php echo $data[0]['bookname']; ?></h2>
        			<img src="<?php echo $data[0]['filepath'];?>" style="display: block; float: left; margin: 0 auto; max-height: 8.88em; margin-right: 1em;">
        			<p><?php echo $data[0]['revbody']; ?></p>

				
<div
  class="fb-like" 
  data-share="true"
  style="height: 19px; overflow: hidden;"
</div>
				
					
						
				<?php }
				else {					
					
						if(isset($_GET["page"])){
						$page = intval($_GET["page"]);
						}	
						else {
						$page = 1;
						}	
							
						$perpage = 3;
						$calc = $perpage * $page;
						$start = $calc - $perpage;
						$result2 = mysqli_query($conn, "select * from reviews limit $start, $perpage");
						$rows = mysqli_num_rows($result2);				
						
				
				//This generates and displays urls for the result pages:
				if($rows){
					$i = 0;
					while($reviews = mysqli_fetch_assoc($result2)) {?>											
						<a href="?id=<?php echo $reviews['reviewtrack'];?>"><h2 style="font-size: 1.1em; margin-bottom: -0.6em;"><?php echo $reviews['bookname'];?></h2></a>
						<img src="<?php echo $reviews['filepath'];?>" style="float: right; display: block; max-height:5em; margin-left: 0.5em; margin-top: 1.2em;"> 
						<p><?php custom_echo($reviews['revbody'], 250);?></p>
					<?php }
				}	

				if(isset($page))
				{
					$result2 = mysqli_query($conn,"select count(*) as Total from reviews");//no. of records in a table
					$rows = mysqli_num_rows($result2); //no. of rows in the result
			
					if($rows)
					{
					$rs = mysqli_fetch_assoc($result2);
					$total = $rs["Total"]; //last row in the result?
					}
			
					$totalPages = ceil($total / $perpage);

			
				       if($page <=1 ){

					}
					else
					{
					$j = $page - 1;
					echo "<span><a href='?page=$j'>< Prev</a></span>";
					}

					if($page == $totalPages ){

					}
		
					else{
					$j = $page + 1;
					echo "<span><a href='?page=$j'>Next></a></span>";
					}
				}
			}?>
			
		
		
			
			</article>	
			
		
<?php 
		require_once ('lhs.php');
		require_once ('rhs.php');
		?>
		
    </div> 
	
<?php 
require_once ('innerfooter.php');
?>