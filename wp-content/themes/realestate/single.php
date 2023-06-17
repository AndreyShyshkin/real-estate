<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package RealEstate
 */

get_header();
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/css/slider.css">
<?php
		while ( have_posts() ) :
			the_post();
			$images1 = get_field('image1', get_the_ID(), true);
			$images2 = get_field('image2', get_the_ID(), true);
			$images3 = get_field('image3', get_the_ID(), true);
			$size = "full";

			$area = get_post_meta(get_the_ID(),'area',true);
			$price = get_post_meta(get_the_ID(),'price',true);
			$bed_room = get_post_meta(get_the_ID(),'bed_room',true);
			$bath_room = get_post_meta(get_the_ID(),'bath_room',true);
			$garage = get_post_meta(get_the_ID(),'garage',true);
			$status = get_post_meta(get_the_ID(),'status',true);
			$waterfront = get_post_meta(get_the_ID(),'waterfront',true);
			$built_in = get_post_meta(get_the_ID(),'built_in',true);
			$parking = get_post_meta(get_the_ID(),'parking',true);
			$view = get_post_meta(get_the_ID(),'view',true);

			$area = $area == '0' || '' || null ? 'Уточнить ' : $area;
			$price = $price == '0' || '' ? 'Уточнить ' : $price;
			$bed_room = $bed_room == '0' || '' ? 'Уточнить ' : $bed_room;
			$bath_room = $bath_room == '0' || '' ? 'Уточнить ' : $bath_room;
			$garage = $garage == '0' || '' ? 'Уточнить ' : $garage;	
			$status = $status == '0' || '' ? 'Уточнить ' : $status;
			$waterfront = $waterfront == '0' || '' ? 'Уточнить ' : $waterfront;
			$built_in = $built_in == '0' || '' ? 'Уточнить ' : $built_in;
			$parking = $parking == '0' || '' ? 'Уточнить ' : $parking;
			$view = $view == '0' || '' ? 'Уточнить ' : $view;			
			?>
	<div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title"><?php echo get_the_title() ?> </h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   

                <div class="clearfix padding-top-40" >

                    <div class="col-md-8 single-property-content prp-style-1 ">
                        <div class="row">
						<div class="light-slide-item">            
                                <div class="clearfix">
                                    <div class="favorite-and-print">
                                        <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                        <a class="printer-icon " href="javascript:window.print()">
                                            <i class="fa fa-print"></i> 
                                        </a>
                                    </div> 
									<div class="slider-img">
										<button id="prev"><img src="<?php echo get_template_directory_uri()?>/assets/img/arrow-left.svg" alt="arrow-left"></button>
										<button id="next"><img src="<?php echo get_template_directory_uri()?>/assets/img/arrow-right.svg" alt="arrow-right"></button>
										<div id="slider_prev"><?php  
                                                $image_class = 'image-slider';

                                                if( $images1 ) {
                                                    echo wp_get_attachment_image( $images1, $size, false, array( 'class' => $image_class ));
                                                }
                                            ?></div>
									</div>
                                    <ul id="image-gallery" class="gallery list-unstyled cS-hidden" style="display: flex;">
                                    <?php  
                                                if( $images1 ) {
                                                ?><li data-thumb="<?php the_field('image1'); ?>" class="isActive"> <?php
                                                    echo wp_get_attachment_image( $images1, $size );
                                                ?></li><?php
                                                }
                                            ?>
                                        <?php  
                                                if( $images2 ) {
                                                    ?><li data-thumb="<?php the_field('image2'); ?>"> <?php
                                                    echo wp_get_attachment_image( $images2, $size );
                                                    ?></li><?php
                                                }
                                            ?>
                                        <?php  
                                                if( $images3 ) {
                                                    ?><li data-thumb="<?php the_field('image3'); ?>"> <?php
                                                    echo wp_get_attachment_image( $images3, $size );
                                                    ?></li><?php
                                                }
                                            ?>                                       
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single-property-wrapper">
                            <div class="single-property-header">                                          
                                <h1 class="property-title pull-left">Villa in Coral Gables</h1>
                                <span class="property-price pull-right">$<?php echo $price?></span>
                            </div>

                            <div class="property-meta entry-meta clearfix ">   

                                <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                                    <span class="property-info-icon icon-tag">                                        
                                        <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/sale-orange.png">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Status</span>
                                        <span class="property-info-value"><?php echo $status?></span>
                                    </span>
                                </div>

                                <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                                    <span class="property-info icon-area">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/room-orange.png">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Area</span>
                                        <span class="property-info-value"><?php echo $area?><b class="property-info-unit"> M</b></span>
                                    </span>
                                </div>

                                <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                                    <span class="property-info-icon icon-bed">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/bed-orange.png">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Bedrooms</span>
                                        <span class="property-info-value"><?php echo $bed_room?></span>
                                    </span>
                                </div>

                                <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                                    <span class="property-info-icon icon-bed">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/cars-orange.png">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Car garages</span>
                                        <span class="property-info-value"><?php echo $garage?></span>
                                    </span>
                                </div>

                                <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                                    <span class="property-info-icon icon-bath">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/shawer-orange.png">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Bathrooms</span>
                                        <span class="property-info-value"><?php echo $bath_room?></span>
                                    </span>
                                </div>


                            </div>
                            <!-- .property-meta -->

                            <div class="section">
                                <h4 class="s-property-title">Description</h4>
                                <div class="s-property-content">
                                    <p><?php echo get_the_content()?>                                </p>
                                </div>
                            </div>
                            <!-- End description area  -->

                            <div class="section additional-details">

                                <h4 class="s-property-title">Additional Details</h4>

                                <ul class="additional-details-list clearfix">
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Waterfront</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $waterfront?></span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Built In</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $built_in?></span>
                                    </li>
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Parking</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $parking?></span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">View</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $view?></span>
                                    </li>

                                </ul>
                            </div>  
                            <!-- End additional-details area  -->

                            <div class="section property-features">      
							<?php $features = get_theme_support('post-thumbnails'); ?>
                                <h4 class="s-property-title">Features</h4>   
								<?php
								$taxonomies = get_post_taxonomies(get_the_ID());

								$taxonomy_name = 'features';

								$terms = get_the_terms(get_the_ID(), $taxonomy_name);

								if ($terms) {
							
?>                         
                                <ul>
									<?php
									 foreach ($terms as $term) {
										echo '<li><a href="properties.html">' . $term->name . '</a></li>';
									}								}
									else {
										echo '<p>Нет features.</p>';
									}
									?>
                                </ul>

                            </div>
                            <!-- End features area  -->

                            <!-- End video area  -->
                            
                            

                            <div class="section property-share"> 
                                <h4 class="s-property-title">Share width your friends </h4> 
                                <div class="roperty-social">
                                    <ul> 
                                        <li><a title="Share this on dribbble " href="#"><img src="<?php echo get_template_directory_uri()?>/assets/img/social_big/dribbble_grey.png"></a></li>                                         
                                        <li><a title="Share this on facebok " href="#"><img src="<?php echo get_template_directory_uri()?>/assets/img/social_big/facebook_grey.png"></a></li> 
                                        <li><a title="Share this on delicious " href="#"><img src="<?php echo get_template_directory_uri()?>/assets/img/social_big/delicious_grey.png"></a></li> 
                                        <li><a title="Share this on tumblr " href="#"><img src="<?php echo get_template_directory_uri()?>/assets/img/social_big/tumblr_grey.png"></a></li> 
                                        <li><a title="Share this on digg " href="#"><img src="<?php echo get_template_directory_uri()?>/assets/img/social_big/digg_grey.png"></a></li> 
                                        <li><a title="Share this on twitter " href="#"><img src="<?php echo get_template_directory_uri()?>/assets/img/social_big/twitter_grey.png"></a></li> 
                                        <li><a title="Share this on linkedin " href="#"><img src="<?php echo get_template_directory_uri()?>/assets/img/social_big/linkedin_grey.png"></a></li>                                        
                                    </ul>
                                </div>
                            </div>
                            <!-- End video area  -->
                            
                        </div>
                    </div>


                    <div class="col-md-4 p0">
                        <aside class="sidebar sidebar-property blog-asside-right">
                            <div class="dealer-widget">
                                <div class="dealer-content">
                                    <div class="inner-wrapper">

                                        <div class="clear">
                                            <div class="col-xs-4 col-sm-4 dealer-face">
                                                <a href="">
                                                    <img src="<?php echo get_template_directory_uri()?>/assets/img/client-face1.png" class="img-circle">
                                                </a>
                                            </div>
                                            <div class="col-xs-8 col-sm-8 ">
                                                <h3 class="dealer-name">
                                                    <a href="#"><?php the_author(); ?></a> <br>  
                                                    <span>Real Estate Agent</span>        
                                                </h3>
                                                <div class="dealer-social-media">
                                                    <a class="twitter" target="_blank" href="">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                    <a class="facebook" target="_blank" href="">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                    <a class="gplus" target="_blank" href="">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                    <a class="linkedin" target="_blank" href="">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a> 
                                                    <a class="instagram" target="_blank" href="">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>       
                                                </div>

                                            </div>
                                        </div>

                                        <div class="clear">
                                            <ul class="dealer-contacts">                                       
                                                <li><i class="pe-7s-map-marker strong"> </i> 9089 your adress her</li>
                                                <li><i class="pe-7s-mail strong"> </i> email@yourcompany.com</li>
                                                <li><i class="pe-7s-call strong"> </i> +1 908 967 5906</li>
                                            </ul>
                                            <p>Duis mollis  blandit tempus porttitor curabiturDuis mollis  blandit tempus porttitor curabitur , est non…</p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default sidebar-menu similar-property-wdg wow fadeInRight animated">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Similar Properties</h3>
                                </div>
                                <div class="panel-body recent-property-widget">
                                        <ul>
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                                <a href="single.html"><img src="<?php echo get_template_directory_uri()?>/assets/img/demo/small-property-2.jpg"></a>
                                                <span class="property-seeker">
                                                    <b class="b-1">A</b>
                                                    <b class="b-2">S</b>
                                                </span>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                                <h6> <a href="single.html">Super nice villa </a></h6>
                                                <span class="property-price">3000000$</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-3 col-sm-3  col-xs-3 blg-thumb p0">
                                                <a href="single.html"><img src="<?php echo get_template_directory_uri()?>/assets/img/demo/small-property-1.jpg"></a>
                                                <span class="property-seeker">
                                                    <b class="b-1">A</b>
                                                    <b class="b-2">S</b>
                                                </span>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                                <h6> <a href="single.html">Super nice villa </a></h6>
                                                <span class="property-price">3000000$</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                                <a href="single.html"><img src="<?php echo get_template_directory_uri()?>/assets/img/demo/small-property-3.jpg"></a>
                                                <span class="property-seeker">
                                                    <b class="b-1">A</b>
                                                    <b class="b-2">S</b>
                                                </span>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                                <h6> <a href="single.html">Super nice villa </a></h6>
                                                <span class="property-price">3000000$</span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                                <a href="single.html"><img src="<?php echo get_template_directory_uri()?>/assets/img/demo/small-property-2.jpg"></a>
                                                <span class="property-seeker">
                                                    <b class="b-1">A</b>
                                                    <b class="b-2">S</b>
                                                </span>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                                <h6> <a href="single.html">Super nice villa </a></h6>
                                                <span class="property-price">3000000$</span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>                          

                            <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Ads her  </h3>
                                </div>
                                <div class="panel-body recent-property-widget">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/img/ads.jpg">
                                </div>
                            </div>

                        </aside>
                    </div>
                </div>

            </div>
        </div>


		<script src="<?php echo get_template_directory_uri()?>/assets/js/slider.js"></script>

<?php
endwhile; // End of the loop.
get_footer();
