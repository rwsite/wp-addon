<?php
/**
 * @year: 2019-03-27
 */


## Добавляет миниатюры записи в таблицу записей в админке
class ShowThumbnail{

    public function __construct()
    {
        add_action('init', [$this , 'add_post_thumbs_in_post_list_table'], 20);
        add_action('admin_head', [$this, 'admin_style']);
    }

	/**
     * Admin style
	 * @return void
	 */
    public function admin_style(){ ?>
        <style type="text/css" rel="stylesheet">
            .thumbnail .dashicons.dashicons-format-image {
                width: 80px;
                height: 80px;
                font-size: 90px;
                text-align: center;
            }
            .thumbnail img{
                border-radius: 8px;
            }
            .manage-column.column-thumbnail {
                width: 110px;
                text-align: center;
            }
        </style>
        <?php
    }

	/**
     * Post thumbnail
     *
	 * @return void
	 */
    public function add_post_thumbs_in_post_list_table()
    {
        $supports = get_theme_support('post-thumbnails');
        $ptype_names = ['post','page','block'];

        // Определяем типы записей автоматически
        if ( ! isset($ptype_names)) {
            if ($supports === true) {
                $ptype_names = get_post_types(['public' => true], 'names');
                $ptype_names = array_diff($ptype_names, ['attachment']);
            } // для отдельных типов записей
            elseif (is_array($supports)) {
                $ptype_names = $supports[0];
            }
        }

        // добавляем фильтры для всех найденных типов записей
        foreach ($ptype_names as $ptype) {
            add_filter("manage_{$ptype}_posts_columns", [$this, 'add_thumb_column'] );
            add_action("manage_{$ptype}_posts_custom_column", [$this, 'add_thumb_value'], 10, 2);
        }
    }


    // добавим колонку
    public function add_thumb_column($columns)
    {
        $num = 1; // после какой по счету колонки вставлять новые
        $new_columns = ['thumbnail' => '<span class="dashicons dashicons-format-image"></span>'];
        return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
    }


    // заполним колонку
    public function add_thumb_value($colname, $post_id)
    {
        if ('thumbnail' === $colname) {
            $width = $height = 100;

            // миниатюра
            if ($thumbnail_id = get_post_meta($post_id, '_thumbnail_id', true)) {
                if(function_exists( 'kama_thumb_img')){
                    $thumb = kama_thumb_img( ['width' => $width, 'height' => $height, 'crop' => true], $thumbnail_id );
                } else {
                    $thumb = wp_get_attachment_image( $thumbnail_id, [$width, $height], true );
                }
            } // из галереи...
            else{
                $attachments = get_children([
                    'post_parent'    => $post_id,
                    'post_mime_type' => 'image',
                    'post_type'      => 'attachment',
                    'numberposts'    => 1,
                    'order'          => 'DESC',
                ]);

                $attach = array_shift($attachments);
                if(isset($attach)) {
                    if (function_exists( 'kama_thumb_img' )) {
                        $thumb = kama_thumb_img( ['width' => $width, 'height' => $height, 'crop' => true],
                            $attach->ID );
                    } else {
                        $thumb = wp_get_attachment_image( $attach->ID, [$width, $height], true );
                    }
                }
            }

            echo $thumb ?? '<span class="dashicons dashicons-format-image"></span>';
        }
    }


}



function show_thumbnail()
{
    return new ShowThumbnail();
}