<?php
add_action( 'init', 'register_social_medias_post_type' );
function register_social_medias_post_type() {
    register_post_type( 'social_medias',
        array(
        'labels'               => array(
            'name'             => __( 'Social Medias' ),
            'singular_name'    => __( 'Social media' ),
            'new_item'         => __( 'New Social Media' )
        ),
        'supports'             => array(
            'title',
        ),
        'public'               => true,
        'has_archive'          => false,
        'menu_icon'            => 'dashicons-share',
        'rewrite'              => array('slug' => 'social_medias'),
        'register_meta_box_cb' => 'add_social_medias_metaboxes',
    ));
    flush_rewrite_rules();
}

function add_social_medias_metaboxes() {
	add_meta_box(
		'infos',
		'Infos',
		'infos_html',
		'social_medias',
		'normal',
		'default'
    );
}

function infos_html($post) {
    ?>
    <?php $fa_ref     = get_post_meta($post->ID, 'fa_ref_key',      true); ?>
    <?php $social_url = get_post_meta($post->ID, 'social_url_key',  true); ?>
    <table>
        <thead>
            <tr>
                <th style="width: 20px;">Icon</th>
                <th>Font Awesome REF</th>
                <th>URL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 20px;">
                    <a href="<?php echo $social_url ?>" target="_blank" rel="noopener noreferrer">
                        <i class="<?php echo 'fa-3x fab fa-' . $fa_ref ?>"></i>
                    </a>
                </td>
                <td>
                    <input type="text" name="fa_ref_input" value="<?php if($fa_ref != ''){echo $fa_ref;} ?>">
                </td>
                <td>
                    <input type="url" name="social_url_input" value="<?php if($social_url != ''){echo $social_url;} ?>">
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

function social_media_save_postdata($post_id) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if( !current_user_can( 'edit_post' ) ) return;

    $social_media_data = array(
        'label',
        'fa_ref',
        'social_url',
	);

	foreach ( $social_media_data as $social_media_value){
		if (array_key_exists($social_media_value.'_input', $_POST)) {
			update_post_meta(
				$post_id,
				$social_media_value.'_key',
				$_POST[$social_media_value.'_input']
			);
		}
	}
}
add_action('save_post', 'social_media_save_postdata');

add_filter('manage_social_medias_posts_columns', 'social_medias_table_head');
function social_medias_table_head( $columns ) {
    $columns = array (
        'icon'       => 'icon',
        'title'      => 'Title',
        'fa_ref'     => 'Font Awesome REF',
        'social_url' => 'URL',
    );   
    return $columns;
}

add_action( 'manage_social_medias_posts_custom_column', 'smashing_social_medias_column', 10, 2);
function smashing_social_medias_column( $column, $post_id ) {
    if ( 'icon' === $column ) {
        $icon = get_post_meta( $post_id, 'fa_ref_key', true );
        echo '<i class="fa-3x fab fa-' . $icon . '"></i>';
    }
    if ( 'fa_ref' === $column ) {
        echo get_post_meta( $post_id, 'fa_ref_key', true );
    }
    if ( 'social_url' === $column ) {
        echo get_post_meta( $post_id, 'social_url_key', true );
    }
}