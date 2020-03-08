<?php  include('store/inc.php'); ?>   
<?php  if ($deviceType !=  'computer'){include('index_mobile.html'); exit;}?>
<?php  include('store/header.html'); ?>   
<?php  include('store/slider.html'); ?> 
    <div class="promo-area">    
				<div class="col-md-4 col-sm-8">
                    <div class="single-promo">
                        <i class="fa fa-refresh"></i>
                        <p>You Order</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-8">
                    <div class="single-promo">
                        <i class="fa fa-truck"></i>
                        <p>We Deliver</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-8">
                    <div class="single-promo">
                        <i class="fa fa-smile-o"></i>
                        <p>You Use</p>
                    </div>
                </div>
           
    </div> <!-- End promo area -->
    
    <div class="maincontent-area" style="background-image: url(img/bgn5.jpeg);
border-bottom: #fff 4px solid;">
       
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title" >Latest Products</h2>
                        <div class="product-carousel">
						<?php
$dirPath = "img/products";
if ( !( $handle = opendir( $dirPath ) ) ) die( "Cannot open the directory." );
while ( $file = readdir( $handle ) ) {
if ( $file != "." && $file != ".." ){ $hloc_array = explode('.',$file); $p = $hloc_array[0]; echo '
                        <div class="single-product">
                                <div class="product-f-image">
                                  '; echo '
<img src="img/products/'.$file.'" style="height:220px;margin:0 4px 0 3px;border: #D63A00 5px solid;" alt="">
                                    <div class="product-hover">
                        <a data-toggle="modal"  class="add-to-cart-link" data-target="#m'.$p.'" href="#mHome" ><i class="fa fa-shopping-cart"></i> Order Now</a>
                                    </div>
                                </div>
                        </div>';}
}closedir( $handle ); 
?>
                           </div>
                    </div>
    </div> <!-- End main content area -->
    </div> <!-- End brands area -->   
      
<?php include('store/footer.html'); ?>  
  </body>
</html>