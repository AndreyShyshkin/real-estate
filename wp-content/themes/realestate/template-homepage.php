<?php
/**
 *  Template Name: Home Page;
 */
get_header();
?>

<div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">

                    <div class="item"><img src="<?php echo get_template_directory_uri()?>/assets/img/slide1/slider-image-1.jpg" alt="GTA V"></div>
                    <div class="item"><img src="<?php echo get_template_directory_uri()?>/assets/img/slide1/slider-image-2.jpg" alt="The Last of us"></div>
                    <div class="item"><img src="<?php echo get_template_directory_uri()?>/assets/img/slide1/slider-image-1.jpg" alt="GTA V"></div>

                </div>
            </div>
            <div class="slider-content">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                        <h2>property Searching Just Got So Easy</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi deserunt deleniti, ullam commodi sit ipsam laboriosam velit adipisci quibusdam aliquam teneturo!</p>
                        <div class="search-form wow pulse" data-wow-delay="0.8s">

                            <form action="properties/" class=" form-inline">
                                <button class="btn  toggle-btn" type="button"><i class="fa fa-bars"></i></button>

                                <div class="form-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="<?php _e('Key word', 'realestate')?>">
                                </div>
                                <div class="form-group">                                   
                                    <select id="lunchBegins" name="cities" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="<?php _e('Select your city', 'realestate')?>">

                                                <?php 
                                                $taxonomies = get_post_taxonomies();

                                                $taxonomy_name = 'cities';

                                                $terms = get_terms($taxonomy_name);

                                                if ($terms) {
                                                    foreach ($terms as $term) {
                                                        echo '<option';
                                                        if (isset($_GET['cities']) && $_GET['cities'] === $term->name) {
                                                        echo ' selected';
                                                        }
                                                        echo '>' . $term->name . '</option>';
                                                    }								}
                                                    else {
                                                        echo '<option>Нет cities.</option>';
                                                    }
									            ?>
                                    </select>
                                </div>
                                <div class="form-group">                                     
                                    <select id="basic" name="status" class="selectpicker show-tick form-control" title="-Status-">
                                                    <option>sell</option>
                                                    <option>rent</option>  
                                    </select>
                                </div>
                                <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button>

                                <div style="display: none;" class="search-toggle">

                                    <div class="search-row">   

                                        <div class="form-group mar-r-20">
                                            <label for="price-range">Price range ($):</label>
                                            <input type="text" class="span2" value="" data-slider-min="20000" 
                                                   data-slider-max="1000000" data-slider-step="100" 
                                                   data-slider-value="[20000,1000000]" id="price-range" name="price_range"><br />
                                            <b class="pull-left color">20000$</b> 
                                            <b class="pull-right color">1000000$</b>
                                        </div>
                                        <!-- End of  -->  

                                        <div class="form-group mar-l-20">
                                            <label for="property-geo">Property geo (m2) :</label>
                                            <input type="text" class="span2" value="" data-slider-min="40" 
                                                   data-slider-max="400" data-slider-step="5" 
                                                   data-slider-value="[40,400]" id="property-geo" name="property_geo"><br />
                                            <b class="pull-left color">40m</b> 
                                            <b class="pull-right color">400m</b>
                                        </div>
                                        <!-- End of  --> 
                                    </div>

                                    <div class="search-row">

                                        <div class="form-group mar-r-20">
                                            <label for="price-range">Baths :</label>
                                            <input type="text" class="span2" value="" data-slider-min="1" 
                                                   data-slider-max="50" data-slider-step="1" 
                                                   data-slider-value="[1,50]" id="min-baths" name="min_baths"><br />
                                            <b class="pull-left color">1</b> 
                                            <b class="pull-right color">50</b>
                                        </div>
                                        <!-- End of  --> 

                                        <div class="form-group mar-l-20">
                                            <label for="property-geo">Bed :</label>
                                            <input type="text" class="span2" value="" data-slider-min="1" 
                                                   data-slider-max="50" data-slider-step="1" 
                                                   data-slider-value="[1,50]" id="min-bed" name="min_bed"><br />
                                            <b class="pull-left color">1</b> 
                                            <b class="pull-right color">50</b>
                                        </div>
                                        <!-- End of  --> 

                                    </div>
                                    <br>
                                    <?php
                                    $taxonomy_name = 'features';
                                    $terms = get_terms($taxonomy_name);
                                    ?>                                    
                                    <div class="search-row">  
                                              
                                        <div class="form-group">
                                            <div class="checkbox">
                                            <?php
                                                $counter = 0;
                                                foreach ($terms as $term) {
                                                    if ($counter == 1 || $counter == 2) {
                                                        echo '</div></div><div class="form-group"><div class="checkbox">';
                                                    }else if ($counter == 3) {
                                                        echo '</div></div></div><div class="search-row"><div class="form-group"><div class="checkbox">';
                                                        $counter = 0;
                                                    }
                                                    ?>
                                                    <label>
                                                        <input type="checkbox" name="categories[]" value="<?php echo $term->slug; ?>" >
                                                        <?php echo $term->name; ?>
                                                    </label>
                                                    <?php
                                                    $counter++;
                                            }
                                                ?>
                                            </div>
                                        </div>
                                        <!-- End of  --> 
                                    </div>
                                    <button class="btn search-btn prop-btm-sheaerch" value="Search" type="submit"><i class="fa fa-search"></i></button>  
                                </div>                    

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- property area -->
        <div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>Top submitted property</h2>
                        <p>Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium. Nullam sed arcu ultricies . </p>
                    </div>
                </div>

                <div class="row">
                    <div class="proerty-th">
                        
                    <?php 
                    $args = array(
                        'post_type' => 'property', 
                        'posts_per_page' => -1, 
                    );
                
                    $query = new WP_Query($args);
                    
                    if ( $query->have_posts() ) : 
                                    while ( $query->have_posts() ) :
                                        $query->the_post();
                                        $area = get_post_meta(get_the_ID(),'area',true);
                                        $price = get_post_meta(get_the_ID(),'price',true);
                                        $bed_room = get_post_meta(get_the_ID(),'bed_room',true);
                                        $bath_room = get_post_meta(get_the_ID(),'bath_room',true);
                                        $garage = get_post_meta(get_the_ID(),'garage',true);

                                        $area = $area == '0' || '' ? 'Уточнить ' : $area;
                                        $price = $price == '0' || '' ? 'Уточнить ' : $price;
                                        $bed_room = $bed_room == '0' || '' ? 'Уточнить ' : $bed_room;
                                        $bath_room = $bath_room == '0' || '' ? 'Уточнить ' : $bath_room;
                                        $garage = $garage == '0' || '' ? 'Уточнить ' : $garage;

                                        ?>
                                            <div class="col-sm-6 col-md-4 p0">
                                                <div class="box-two proerty-item">
                                                    <div class="item-thumb">
                                                        <a href="<?php echo get_post_permalink()?>" ><img src="<?php echo get_the_post_thumbnail_url()?>"></a>
                                                    </div>
                                                    <div class="item-entry overflow">
                                            <h5><a href="<?php echo get_post_permalink()?>"> <?php echo get_the_title() ?> </a></h5>
                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b> Area :</b> <?php echo $area ?>m </span>
                                            <span class="proerty-price pull-right"> $ <?php echo $price ?></span>
                                            <p style="display: none;"><?php echo get_the_content()?></p>
                                            <div class="property-icon">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/bed.png"> (<?php echo $bed_room ?>)|
                                                <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/shawer.png"> (<?php echo $bath_room ?>)|
                                                <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/cars.png"> (<?php echo $garage ?>)  
                                            </div>
                                        </div>


                                    </div>
                                </div> 
                                        <?php
                                    

                                    endwhile;

                                    wp_reset_postdata(); 

                                    the_posts_navigation();
                                ?>

                    </div>
                </div>
            </div>
        </div>
        <?php 
                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>

        <!--Welcome area -->
        <div class="Welcome-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 Welcome-entry  col-sm-12">
                        <div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
                            <div class="welcome_text wow fadeInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                                        <!-- /.feature title -->
                                        <h2>GARO ESTATE </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <div  class="welcome_services wow fadeInRight" data-wow-delay="0.3s" data-wow-offset="100">
                                <div class="row">
                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="pe-7s-home pe-4x"></i>
                                            </div>
                                            <h3>Any property</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="pe-7s-users pe-4x"></i>
                                            </div>
                                            <h3>More Clients</h3>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 text-center">
                                        <i class="welcome-circle"></i>
                                    </div>

                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="pe-7s-notebook pe-4x"></i>
                                            </div>
                                            <h3>Easy to use</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="pe-7s-help2 pe-4x"></i>
                                            </div>
                                            <h3>Any help </h3>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--TESTIMONIALS -->
        <div class="testimonial-area recent-property" style="background-color: #FCFCFC; padding-bottom: 15px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>Our Customers Said  </h2> 
                    </div>
                </div>

                <div class="row">
                    <div class="row testimonial">
                        <div class="col-md-12">
                            <div id="testimonial-slider">
                                <div class="item">
                                    <div class="client-text">                                
                                        <p>Nulla quis dapibus nisl. Suspendisse llam sed arcu ultried arcu ultricies !</p>
                                        <h4><strong>Ohidul Islam, </strong><i>Web Designer</i></h4>
                                    </div>
                                    <div class="client-face wow fadeInRight" data-wow-delay=".9s"> 
                                        <img src="<?php echo get_template_directory_uri()?>/assets/img/client-face1.png" alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="client-text">                                
                                        <p>Nulla quis dapibus nisl. Suspendisse llam sed arcu ultried arcu ultricies !</p>
                                        <h4><strong>Ohidul Islam, </strong><i>Web Designer</i></h4>
                                    </div>
                                    <div class="client-face">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/img/client-face2.png" alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="client-text">                                
                                        <p>Nulla quis dapibus nisl. Suspendisse llam sed arcu ultried arcu ultricies !</p>
                                        <h4><strong>Ohidul Islam, </strong><i>Web Designer</i></h4>
                                    </div>
                                    <div class="client-face">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/img/client-face1.png" alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="client-text">                                
                                        <p>Nulla quis dapibus nisl. Suspendisse llam sed arcu ultried arcu ultricies !</p>
                                        <h4><strong>Ohidul Islam, </strong><i>Web Designer</i></h4>
                                    </div>
                                    <div class="client-face">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/img/client-face2.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Count area -->
        <div class="count-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>You can trust Us </h2> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12 percent-blocks m-main" data-waypoint-scroll="true">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-users"></span>
                                    </div>
                                    <div class="chart" data-percent="5000">
                                        <h2 class="percent" id="counter">0</h2>
                                        <h5>HAPPY CUSTOMER </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-home"></span>
                                    </div>
                                    <div class="chart" data-percent="12000">
                                        <h2 class="percent" id="counter1">0</h2>
                                        <h5>Properties in stock</h5>
                                    </div>
                                </div> 
                            </div> 
                            <div class="col-sm-3 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-flag"></span>
                                    </div>
                                    <div class="chart" data-percent="120">
                                        <h2 class="percent" id="counter2">0</h2>
                                        <h5>City registered </h5>
                                    </div>
                                </div> 
                            </div> 
                            <div class="col-sm-3 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-graph2"></span>
                                    </div>
                                    <div class="chart" data-percent="5000">
                                        <h2 class="percent"  id="counter3">5000</h2>
                                        <h5>DEALER BRANCHES</h5>
                                    </div>
                                </div> 

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- boy-sale area -->
        <div class="boy-sale-area">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                        <div class="asks-first">
                            <div class="asks-first-circle">
                                <span class="fa fa-search"></span>
                            </div>
                            <div class="asks-first-info">
                                <h2>ARE YOU LOOKING FOR A Property?</h2>
                                <p> varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa</p>                                        
                            </div>
                            <div class="asks-first-arrow">
                                <a href="properties.html"><span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-10 col-sm-offset-1 col-xs-12 col-md-offset-0">
                        <div  class="asks-first">
                            <div class="asks-first-circle">
                                <span class="fa fa-usd"></span>
                            </div>
                            <div class="asks-first-info">
                                <h2>DO YOU WANT TO SELL A Property?</h2>
                                <p> varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa</p>
                            </div>
                            <div class="asks-first-arrow">
                                <a href="properties.html"><span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <p  class="asks-call">QUESTIONS? CALL US  : <span class="strong"> + 3-123- 424-5700</span></p>
                    </div>
                </div>
            </div>
        </div>

<?php
get_footer()
?>