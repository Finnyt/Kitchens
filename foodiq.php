<?php 
require_once ('prebody.php');
?>	
    <div class="contentwrap">
			<article>
				<a href="foodiq"><h1>- Food IQ - </h1></a>
				
				
				<?php 
				if (isset($_REQUEST['id'])) {// user gets here by clicking on link with id
				$id_raw = trim(htmlentities($_REQUEST["id"]));
				$data = foodiq_data_id($conn, $id_raw);
				?>
        			<h2><?php echo $data[0]['iqitem'];?></h2>
        			<img src="<?php echo $data[0]['filepath'];?>" style="display: block; margin: 0 auto; max-width: 100%;">
        			<p><?php echo $data[0]['iqbody'];?></p>

				
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
						$result2 = mysqli_query($conn, "select * from foodiq limit $start, $perpage");
						$rows = mysqli_num_rows($result2);				
						
				
				//This generates and displays urls for the result pages:
				if($rows){
					$i = 0;
					while($foodiq = mysqli_fetch_assoc($result2)) {?>											
						<a href="?id=<?php echo $foodiq['iqno'];?>"><h2>	<?php echo $foodiq['iqitem'];?></h2>
					    <img src="<?php echo $foodiq['filepath'];?>" style="float: left; max-height: 3.5em; margin-right: 0.5em;
					    position: relative; bottom: -0.25em;"></a>
						<p><?php custom_echo($foodiq['iqbody'], 250);?></p>
					<?php }
				}	

				if(isset($page))
				{
					$result2 = mysqli_query($conn,"select count(*) as Total from foodiq");//no. of records in a table
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