<footer>			

		
		
			<ul class="foot-nav">
				<li>
					<a href="home">HOME</a>
				</li>	
				<li>
					<a href="about">ABOUT</a>
				</li>			
				<li>
					<a href="contact">CONTACT</a>
				</li>	
			</ul>
	
		

		<p class ="footnote1"><b>&#169;</b> 2016 Hindavi, The Kitchens of Indian History</p>	<br><br> 
<!-- 		<p class ="footnote2">Content on this site is licensed under a <b>Creative Commons Attribution 4.0 License</b>.</p>
 -->





</footer>		


<script type="text/javascript" src="js/prefixfree.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
 
<script type="text/javascript"> 

</script> 
 
 
 
 <script type="text/javascript">
$(function () {
  document.getElementById('menu-wrapper').style.visibility = 'hidden';
  var fixed = false;
  var topTrigger = $('#menu-wrapper').offset().top;
  
  $("#menu-opener").click(function(){
  $("#menu-opener, #menu-opener-inner, #menu").toggleClass("active");
  
         if($(window).scrollTop() > 80){ 
            if(!$("#menu-opener, #menu-opener-inner, #menu").hasClass("active")){
            	    document.getElementById('menu-wrapper').style.visibility = 'visible';
      						document.getElementById('logoflag').style.visibility = 'visible'; 
            }else{            
            		document.getElementById('menu-wrapper').style.visibility = 'visible';
	  						document.getElementById('logoflag').style.visibility = 'hidden';
            }
       }
  
  
  
  
   });  
  
  
  $(window).scroll(function () {  
   if ($(this).scrollTop() > 80){ 
    
      if ($("#menu").is(".active")){
	  document.getElementById('menu-wrapper').style.visibility = 'visible';
	  document.getElementById('logoflag').style.visibility = 'hidden';  }
	  else{
      document.getElementById('menu-wrapper').style.visibility = 'visible';
      document.getElementById('logoflag').style.visibility = 'visible'; 
	  }
	  
     /*document.getElementById('hdr').style.visibility = 'hidden';}*/   
    } 
   else{
     document.getElementById('menu-wrapper').style.visibility = 'hidden';
    document.getElementById('logoflag').style.visibility = 'hidden'; 
     /*document.getElementById('hdr').style.visibility = 'visible';}*/      
  }});
  

  
  
  
  $(document).scroll(function() {
    if( $(this).scrollTop() >= topTrigger ) {
      if( !fixed ) {
        fixed = true;
        $('#menu-wrapper').css({'position':'fixed', 'top':'0','z-index':'9999'});
		$('#menu').css({'position':'fixed', 'top':'0','z-index':'9999'});
		$('#menu-opener').css({'position':'fixed', 'top':'0','z-index':'99999'});
		$('#menu-opener-inner').css({'position':'fixed', 'top':'0','z-index':'9999'});


      }
    } else {
      if( fixed ) {
        fixed = false;
        $('#menu-wrapper').css({'position':'absolute', 'top':''});
		$('#menu').css({'position':'absolute', 'top':'', 'z-index':'9999'});
		$('#menu-opener').css({'position':'absolute', 'top':'', 'z-index':'99999'});
		$('#menu-opener-inner').css({'position':'absolute', 'top':'', 'z-index':'9999'});
	
		
      }
    }
  });
});               
</script>


		
		</body>
  </html>