<?php
function modernpost (){
    $labels=array(
        'name'=>'مقالات',
        'singular_name'=>'مقاله',
        'all_items'=>'همه ی مقالات',
        'edit_item'=>'ویرایش مقاله',
        'add_new'=>'مقاله جدید',
        'new_item'=>'مقاله جدید'
) ;
    register_post_type('modernpost',array(
        'public'=>true,
        'supports'=>array('title','editor','excerpt','thumbnail','comments'),
        'has_archive'=> true,

        'menu_icon'=>'dashicons-text-page',
        'labels'=> $labels


    ));
}
add_action('init','modernpost');