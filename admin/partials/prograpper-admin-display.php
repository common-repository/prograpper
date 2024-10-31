<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://prograpper.com
 * @since      1.0.0
 *
 * @package    Prograpper
 * @subpackage Prograpper/admin/partials
 */
?>
<?php
    function prograpper_admin_function()
    {
    ?>
        <?php
        global $prograpper_options;
        $category_values = $prograpper_options['exclude_categories'];
        $cat_values_array = explode(",", $category_values);

        //$page_values = $mobapper_options['exclude_pages'];
        //$page_values_array = explode(",", $page_values);
        ?>
    <style>
        #col-left {
            width: 40% !important;
        }

        .div-scroll {
            overflow-y: auto;
            max-height: 500px;
        }

        #create-app {

            padding-right: 30px;
        }

        .mailto-us {
            /*            float: right;*/

        }

        #col-right {
            padding-top: 44px;
            width: 30% !important;
        }

        .mail-to-us-div {
            margin-top: 20px;
            margin-left: 72px;
        }
    </style>
    <div class="wrap nosubsub">
        <h2><?php
            _e('Prograpper','prograpper');
            ?></h2>
        </br>
        </br>
        <div id="col-left">
            <div class="col-wrap">
                <?php
                if (isset($_POST['submit_page'])) {
                    echo '<br class="clear">';
                }
                if (isset($_POST['submit_category'])) {
                    //echo 'cat';
                    global $prograpper_options;
                    $page_values = $prograpper_options['exclude_pages'];
                    $values = "";
                    $cats = $_POST['post_category'];
                    //print_r($cats);
                    if(!empty($cats)) {
                        $str = implode(", ", $cats);
                    }
                    else{
                        $str="";
                    }
                    $prograpper_options = array('exclude_categories' => $str,
                        'exclude_pages' => $prograpper_options);
                    $category_values = $prograpper_options['exclude_categories'];
                    $cat_values_array = explode(",", $category_values);
                    update_option("prograpper_settings", $prograpper_options);
                    echo '<div class="alert alert-warning">
                                <strong>'._e('prograpper settings saved','prograpper').'</strong>
                              </div>';
                }
                ?>

                <h3><u><?php _e('Select categories to exclude','prograpper')?></u></h3>
                <form id="category-exclude" action="" method="post" name="categoryexcludeform">
                    <table class="wp-list-table widefat fixed tags">
                        <thead>

                        <tr>

                            <th scope="col" id="name" class="manage-column column-name sortable desc" style="width:50%">
                                <h4>&nbsp<?php _e('Category','prograpper') ?></h4>
                            </th>
                            <th scope="col" id="name" class="manage-column column-name sortable desc" style="width:50%">
                                <h4>&nbsp<?php _e('Exclude','prograpper') ?></h4>
                            </th>

                        </tr>
                        </thead>
                    </table>
                    <div class="div-scroll">

                        <table class="wp-list-table widefat fixed tags">

                            <tbody id="the-list" data-wp-lists="list:tag">
                            <?php
                            $args = array("hide_empty" => 0,
                                "type"      => "post",
                                "orderby"   => "name",
                                "order"     => "ASC" );
                            $categories = get_categories($args);
                            $c = 0;
                            foreach ($categories as $category) {
                                $c++;
//                                if ($category->term_id == 1 && $category->slug == 'uncategorized') {
//                                    $c--;
//                                    continue;
//                                }
                                if ($c % 2 == 0) {
                                    $num = "alternate";
                                } else {
                                    $num = "";
                                }

                                if (in_array($category->term_id, $cat_values_array)) {
                                    $checked = "checked";
                                } else {
                                    $checked = "";
                                }
                                echo'<tr id="tag-2" class="' . $num . '">
                                      <td class="name column-name">
                                      <strong>
                                       ' . $category->name . '
                                      </strong>
                                    </td>
                                    <td scope="row" class="check-column">
                                       <input value="' . $category->term_id . '" type="checkbox" name="post_category[]" id="in-category-' . $category->term_id . '" ' . $checked . '/>
                                    </td>
                                  </tr>';
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                    <table class="wp-list-table widefat fixed tags">
                        <thead></thead>
                        <tbody>
                        <tr class="alternate">
                            <td></td>
                            <td>
                                <input type="submit" name="submit_category" value="<?php _e('Save','prograpper') ?>" style="float: right" class="button button-primary" />
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <br class="clear">
                </form>

            </div>
        </div>
        <div class="col-right">
            <div class="col-wrap">
                <input type="button" class="button button-primary button-large" value="<?php
                _e('Create Your Own App','prograpper');
                ?>" onclick="var win = window.open('http://goo.gl/forms/pRWJqqGMmo', '_blank');win.focus();"/>
                <br>
                <br>or
                <a href="mailto:hello@prograpper.com?subject=hello">
                    hello@prograpper.com
                </a>
            </div>
        </div>
    </div>
<?php
}