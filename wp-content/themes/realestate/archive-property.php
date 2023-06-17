<?php
get_header();

if(isset($_GET['price_range']) && $_GET['price_range'] !== '') {
    $priceRange = $_GET['price_range'];
    $priceValues = explode(',', $priceRange);
    $minPrice = intval($priceValues[0]);
    $maxPrice = intval($priceValues[1]);
}else {
    $minPrice = 2000;
    $maxPrice = 1000000;
}

if(isset($_GET['property_geo']) && $_GET['property_geo'] !== '') {
    $areaRange = $_GET['property_geo'];
    $areaValues = explode(',', $areaRange);
    $minArea = intval($areaValues[0]);
    $maxArea = intval($areaValues[1]);
}else {
    $minArea = 40;
    $maxArea = 400;
}

if(isset($_GET['min_baths']) && $_GET['min_baths'] !== '') {
    $minBaths = $_GET['min_baths'];
    $bathsValues = explode(',', $minBaths);
    $minBaths = intval($bathsValues[0]);
    $maxBaths = intval($bathsValues[1]);
}else {
    $minBaths = 1;
    $maxBaths = 50;
}

if(isset($_GET['min_bed']) && $_GET['min_bed'] !== '') {
    $minBed = $_GET['min_bed'];
    $bedValues = explode(',', $minBed);
    $minBed = intval($bedValues[0]);
    $maxBed = intval($bedValues[1]);
}else {
    $minBed = 1;
    $maxBed = 50;
}

$selectedCategories = isset($_GET['categories']) ? $_GET['categories'] : array();

?>

<script>
    
$(document).ready(function() {
    let orderButton = $(".order_by_price");
    let dateButton = $(".order_by_date");
    let sortOrder = "DESC";

    orderButton.on("click", function() {
        let propertiesContainer = $("#ype");
        let properties = propertiesContainer.find(".col-sm-6.col-md-4.p0");

        sortOrder = (sortOrder === "DESC") ? "ASC" : "DESC";

        properties.removeClass("sorted");

        $("li").removeClass("active");

        $(this).closest("li").addClass("active");

        $(this).parent().parent().addClass("sorted");

        properties.sort(function(a, b) {
            let priceA = parseFloat($(a).find(".proerty-price").text().replace(/\D/g, ''));
            let priceB = parseFloat($(b).find(".proerty-price").text().replace(/\D/g, ''));

            if (sortOrder === "DESC") {
                $(".order_by_price i").removeClass("fa-arrow-down-short-wide");
                $(".order_by_price i").addClass("fa-arrow-down-wide-short");
                return priceB - priceA;
            } else {
                $(".order_by_price i").addClass("fa-arrow-down-short-wide");
                $(".order_by_price i").removeClass("fa-arrow-down-wide-short");
                return priceA - priceB;
            }
        });

        propertiesContainer.empty();


        properties.each(function() {
            propertiesContainer.append($(this));
        });
    });

    dateButton.on("click", function() {
        let propertiesContainer = $("#ype");
        let properties = propertiesContainer.find(".col-sm-6.col-md-4.p0");

        sortOrder = (sortOrder === "DESC") ? "ASC" : "DESC";

        properties.removeClass("sorted");

        $("li").removeClass("active");

        $(this).closest("li").addClass("active");

        $(this).parent().parent().addClass("sorted");

        properties.sort(function(a, b) {
            let dateA = parseFloat($(a).find(".date").text());
            let dateB = parseFloat($(b).find(".date").text());

            if (sortOrder === "DESC") {
                $(".order_by_date i").removeClass("fa-arrow-down-short-wide");
                $(".order_by_date i").addClass("fa-arrow-down-wide-short");
                return dateB - dateA;
            } else {
                $(".order_by_date i").addClass("fa-arrow-down-short-wide");
                $(".order_by_date i").removeClass("fa-arrow-down-wide-short");
                return dateA - dateB;
            }
        });

        propertiesContainer.empty();

        properties.each(function() {
            propertiesContainer.append($(this));
        });
    });
        });
        
</script>

<div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">List Layout With Sidebar</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="properties-area recent-property" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                     
                <div class="col-md-3 p0 padding-top-40">
                    <div class="blog-asside-right pr0">
                        <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Smart search</h3>
                            </div>
                            <div class="panel-body search-widget">
                                <form action="" class=" form-inline"> 
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" name="keyword" class="form-control" placeholder="Key word">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-6">

                                                <select id="lunchBegins" name="cities" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Your City">

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
                                            <div class="col-xs-6">

                                            <select id="basic" name="status" class="selectpicker show-tick form-control" title="-Status-">
                                                <?php 
                                                if(isset($_GET['status']) && $_GET['status'] !== '') {
                                                    $status = $_GET['status'];
                                                    ?>
                                                    <option <?php if($status == 'sell') {echo 'selected';} ?>>sell</option>
                                                    <option <?php if($status == 'rent') {echo 'selected';} ?>>rent</option>
                                                    <?php
                                                }  
                                                ?>
                                                    <option>sell</option>
                                                    <option>rent</option>  

                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="price-range">Price range ($):</label>
                                                <input type="text" class="span2" value="" data-slider-min="20000" 
                                                       data-slider-max="1000000" data-slider-step="100" 
                                                       data-slider-value="[<?php echo $minPrice ?>, <?php echo $maxPrice ?>]" id="price-range" name="price_range"><br />
                                                <b class="pull-left color">20000$</b> 
                                                <b class="pull-right color">1000000$</b>                                                
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="property-geo">Property geo (m2) :</label>
                                                <input type="text" class="span2" value="" data-slider-min="40" 
                                                       data-slider-max="400" data-slider-step="5" 
                                                       data-slider-value="[<?php echo $minArea ?>, <?php echo $maxArea ?>]" id="property-geo" name="property_geo"><br />
                                                <b class="pull-left color">40m</b> 
                                                <b class="pull-right color">400m</b>                                                
                                            </div>                                            
                                        </div>
                                    </fieldset>                                

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="price-range">Baths :</label>
                                                <input type="text" class="span2" value="" data-slider-min="1" 
                                                       data-slider-max="50" data-slider-step="1" 
                                                       data-slider-value="[<?php echo $minBaths ?>, <?php echo $maxBaths ?>]" id="min-baths" name="min_baths"><br />
                                                <b class="pull-left color">1</b> 
                                                <b class="pull-right color">50</b>                                                
                                            </div>

                                            <div class="col-xs-6">
                                                <label for="property-geo">Bed :</label>
                                                <input type="text" class="span2" value="" data-slider-min="1" 
                                                       data-slider-max="50" data-slider-step="1" 
                                                       data-slider-value="[<?php echo $minBed ?>, <?php echo $maxBed ?>]" id="min-bed" name="min_bed"><br />
                                                <b class="pull-left color">1</b> 
                                                <b class="pull-right color">50</b>

                                            </div>
                                        </div>
                                    </fieldset>
                                    <?php
                                    $taxonomy_name = 'features';
                                    $terms = get_terms($taxonomy_name);
                                    ?>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <?php
                                                    $half_count = ceil(count($terms) / 2); 
                                                    $counter = 0;
                                                    foreach ($terms as $term) {
                                                        $isChecked = in_array($term->slug, $selectedCategories) ? 'checked' : '';
                                                        if ($counter == $half_count) {
                                                            echo '</div></div><div class="col-xs-6"><div class="checkbox">';
                                                        }
                                                        ?>
                                                        <label>
                                                            <input type="checkbox" name="categories[]" value="<?php echo $term->slug; ?>"  <?php echo $isChecked; ?>>
                                                            <?php echo $term->name; ?>
                                                        </label>
                                                        <?php
                                                        $counter++;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>



                                    <fieldset >
                                        <div class="row">
                                            <div class="col-xs-12">  
                                                <input class="button btn largesearch-btn" value="Search" type="submit">
                                            </div>  
                                        </div>
                                    </fieldset>                                     
                                </form>
                                <fieldset >
                                        <div class="row">
                                            <div class="col-xs-12">  
                                                <a href="/properties/">Убрать фильтры</a>
                                            </div>  
                                        </div>
                                </fieldset> 
                            </div>
                        </div>

                        <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                            <div class="panel-heading">
                                <h3 class="panel-title">Recommended</h3>
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
                    </div>
                </div>

                <div class="col-md-9  pr0 padding-top-40 properties-page">
                    <div class="col-md-12 clear"> 
                    <div class="col-xs-10 page-subheader sorting pl0">
                            <ul class="sort-by-list">
                            <li class="">
                                <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date" data-order="DESC">
                                    Property Date <i class="fa-solid fa-arrow-down-short-wide"></i>					
                                </a>
                            </li>


                                <li class="">
                                <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price" data-order="DESC">
                                    Property Price <i class="fa-solid fa-arrow-down-short-wide"></i>					
                                </a>
                                </li>
                            </ul><!--/ .sort-by-list-->
                        </div>

                        <div class="col-xs-2 layout-switcher">
                            <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                            <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>                          
                        </div><!--/ .layout-switcher-->
                    </div>

                    <div class="col-md-12 clear"> 
                        <div id="ype" class="proerty-th">
                                <?php 
                                
                                $args = array(
                                    'post_type' => 'property', 
                                    'posts_per_page' => -1,
                                    'meta_query' => array(
                                        array(
                                            'key' => 'price',
                                            'value' => array($minPrice, $maxPrice),
                                            'type' => 'numeric',
                                            'compare' => 'BETWEEN',
                                        ),
                                        array(
                                            'key' => 'area',
                                            'value' => array($minArea, $maxArea),
                                            'type' => 'numeric',
                                            'compare' => 'BETWEEN',
                                        ),
                                        array(
                                            'key' => 'bath_room',
                                            'value' => array($minBaths, $maxBaths),
                                            'type' => 'numeric',
                                            'compare' => 'BETWEEN',
                                        ),
                                        array(
                                            'key' => 'bed_room',
                                            'value' => array($minBed, $maxBed),
                                            'type' => 'numeric',
                                            'compare' => 'BETWEEN',
                                        ),
                                    ), 
                                );
                                
                                if(isset($_GET['status']) && $_GET['status'] !== '') {
                                    $status = $_GET['status'];
                                        $args['meta_query'][] = array(
                                            array(
                                                'key' => 'status',
                                                'value' => $status,
                                                'type' => 'text',
                                                'compare' => '=',
                                            ),
                                        );
                                } 

                                if(isset($_GET['cities']) && $_GET['cities'] !== '') {
                                    $cities = $_GET['cities'];
                                        $args['tax_query'] = array(
                                            array(
                                                'taxonomy' => 'cities',
                                                'field' => 'slug',
                                                'terms' => $cities,
                                            ),
                                        );
                                } 

                                if ($selectedCategories != null || $selectedCategories == '') {
                                    $args['tax_query'] = array(
                                        array(
                                            'taxonomy' => $taxonomy_name,
                                            'field' => 'slug',
                                            'terms' => $selectedCategories,
                                        ),
                                    );
                                }

                                if (isset($_GET['keyword']) && $_GET['keyword'] !== '') {
                                    $keyword_term = $_GET['keyword'];
                                    $args['s'] = $keyword_term;
                                }

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
                                            <p>Опубликовано: <span class="date"><?php echo get_the_date()?></span></p>
                                        </div>
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
                                </div> 
                                        <?php

                                        endwhile;
                                        else :
                                            echo 'No posts found.';
                                        endif;

                                        wp_reset_postdata();
                                ?>
                        </div>
                    </div>
                    
                    <div class="col-md-12"> 
                        <div class="pull-right">
                            <div class="pagination">
                                <ul>
                                    <li><a href="#">Prev</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>                
                    </div>
                </div>  
                </div>              
            </div>
        </div>

<?php
get_footer();
?>