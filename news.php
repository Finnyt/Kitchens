<?php 
require_once ('prebody.php');
?>	
    <div class="contentwrap">
			<article>
				<a href="/news"><h1>- News - </h1></a>
				<?php 
				if (isset($_REQUEST['id'])) {// user gets here by clicking on link with id
			        $id_raw = trim(htmlentities($_REQUEST["id"]));
					$data = news_data_id($conn, $id_raw);
					?>    		
        			
        			<h2><?php echo $data[0]['title']; ?></h2>
        			<img src="<?php echo $data[0]['filepath'];?>" style="float: left; min-height: 5em; max-height: 5em; margin: 0.5em 0.5em 0.5em 0; -webkit-shape-outside: circle(50%); shape-outside: circle(50%);">
        			<p><div style="display: inline; font-weight: bold; font-size: 80%; text-align: center; color: #cec4c4;"><?php echo $data[0]['date'];?></div><?php echo $data[0]['body']; ?></p>

					
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
						$result2 = mysqli_query($conn, "select * from news ORDER by newstrack DESC limit $start, $perpage");
						$rows = mysqli_num_rows($result2);				
						
				
				//This generates and displays urls for the result pages:
				if($rows){
					$i = 0;
					while($news = mysqli_fetch_assoc($result2)) {?>											
						<a href="?id=<?php echo $news['newstrack'];?>"><h2 style="font-size: 1.1em; margin-bottom: -0.6em;"><?php echo $news['title'];?></h2></a>
						<img src="<?php echo $news['filepath'];?>" style="float: left; min-height: 5em; max-height: 5em; margin: 0.5em 0.5em 0.5em 0; -webkit-shape-outside: circle(50%); shape-outside: circle(50%);">
						<p><div style="display: inline; font-weight: bold; font-size: 80%; text-align: center; color: #cec4c4;"><?php echo $news['date'];?></div><?php custom_echo($news['body'], 250);?></p>
					<?php }
				}	

				if(isset($page))
				{
					$result2 = mysqli_query($conn,"select count(*) as Total from news");//no. of records in a table
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