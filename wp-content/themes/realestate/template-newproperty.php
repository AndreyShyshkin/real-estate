<?php
/**
 *  Template Name: New property;
 */
get_header();
?>
<script src="<?php echo get_template_directory_uri()?>/assets/js/newpost.js"></script>

<form id="new_post" method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?> " enctype="multipart/form-data">
  <input type="hidden" name="action" value="create_post">
  <label for="post_title">Название:</label>
  <input type="text" name="post_title" id="post_title" required>
  <label for="post_content">Описание:</label><br>
  <textarea name="post_content" id="post_content"></textarea><br>
  <label for="custom_field_status">Поле Status:</label>
  <select name="custom_field_status" id="custom_field_status" class="selectpicker show-tick form-control" title="-Status-" required>
        <option>sell</option>
        <option>rent</option>  
  </select>

  <label for="cities">Выберете город:</label>
  <select name="cities" id="cities" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Your City">
    <?php
        $taxonomies = get_post_taxonomies();

        $taxonomy_name = 'cities';

        $terms = get_terms($taxonomy_name);

        if ($terms) {
            foreach ($terms as $term) {
                echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
            }								}
            else {
                echo '<option>Нет cities.</option>';
            }
        ?> 
  </select>  

  <label for="custom_field_price">Цена от 20000$ до 1000000$:</label>
  <input type="text" name="custom_field_price" id="custom_field_price" required>
  <label for="custom_field_area">Площадь от 40M до 400M:</label>
  <input type="text" name="custom_field_area" id="custom_field_area" required>
  <label for="custom_field_bed_room">Сколько спальных комнат от 1 до 50:</label>
  <input type="text" name="custom_field_bed_room" id="custom_field_bed_room" required>
  <label for="custom_field_bath_room">Сколько ванных комнат от 1 до 50:</label>
  <input type="text" name="custom_field_bath_room" id="custom_field_bath_room" required>
  <label for="custom_field_garage">сколько гаражей:</label>
  <input type="text" name="custom_field_garage" id="custom_field_garage">
  <label for="custom_field_waterfront">Выход к набережной:</label>
  <input type="text" name="custom_field_waterfront" id="custom_field_waterfront">
  <label for="custom_field_built_in">Когда построен:</label>
  <input type="text" name="custom_field_built_in" id="custom_field_built_in">
  <label for="custom_field_parking">Место для парковки:</label>
  <input type="text" name="custom_field_parking" id="custom_field_parking">
  <label for="custom_field_view">Вид:</label>
  <input type="text" name="custom_field_view" id="custom_field_view">
  <label for="post_image">Изображение поста:</label>
  <input type="file" name="post_image" id="post_image">
  <label for="image1">Добавьте до 3 фотографий:</label>
  <input type="file" name="image1" id="image1">
  <input type="file" name="image2" id="image2">
  <input type="file" name="image3" id="image3">

                                    <?php
                                    $taxonomy_name = 'features';
                                    $terms = get_terms($taxonomy_name);
                                    ?>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                        <label for="categories">Добавьте фишки:</label>
                                            <p>Добавить свою: </p><input type="text" name="categories[]">
                                                <div class="checkbox">
                                                    <?php
                                                    $half_count = ceil(count($terms) / 2);
                                                    $counter = 0;
                                                    foreach ($terms as $term) {
                                                        if ($counter == $half_count) {
                                                            echo '</div><div class="checkbox">';
                                                        }
                                                        ?>
                                                        <label>
                                                            <input type="checkbox" name="categories[]" value="<?php echo $term->slug; ?>">
                                                            <?php echo $term->name; ?>
                                                        </label>
                                                        <?php
                                                        $counter++;
                                                    }
                                                    ?>
                                                </div>
                                        </div>
                                    </fieldset>        

  <input type="submit" value="Создать пост" id="submit_post">
</form>



<?php 
get_footer();
?>