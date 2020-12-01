<?php
add_action( 'init', 'register_projects_post_type' );
function register_projects_post_type() {
    register_post_type( 'projects',
        array(
        'labels'               => array(
            'name'             => __( 'Project' ),
            'singular_name'    => __( 'Projects' ),
            'new_item'         => __( 'New Project' )
        ),
        'supports'             => array(
            'title',
        ),
        'public'               => true,
        'has_archive'          => false,
        'menu_icon'            => 'dashicons-clipboard',
        'rewrite'              => array('slug' => 'projects'),
        'register_meta_box_cb' => 'add_projects_metaboxes',
    ));
    flush_rewrite_rules();
}

function add_projects_metaboxes() {
    add_meta_box(
		'icon',
		'Icon',
		'icon_html',
		'projects',
		'normal',
		'default'
    );
    
    add_meta_box(
		'link',
		'Link',
		'link_html',
		'projects',
		'normal',
		'default'
    );

    add_meta_box(
		'description',
		'Description',
		'description_html',
		'projects',
		'normal',
		'default'
    );

    add_meta_box(
		'tags',
		'Tags',
		'tags_html',
		'projects',
		'normal',
		'default'
    );
}

function icon_html($post) {
    ?>
    <?php $icon = get_post_meta($post->ID, 'icon_key',      true); ?>
    <table>
        <thead>
            <tr>
                <th style="width: 20px;">Icon</th>
                <th>Font Awesome REF</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 20px;">
                    <i class="<?php echo 'fa-3x fab fa-' . $icon ?>"></i>
                </td>
                <td>
                    <input type="text" name="icon_input" value="<?php if($icon != ''){echo $icon;} ?>">
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

function link_html($post) {
    $link_project = get_post_meta($post->ID, 'link_project_key',  true);
    ?>
    <input type="url" name="link_project_input" value="<?php if($link_project != ''){echo $link_project;} ?>">
    <?php
}

function description_html($post) {
    ?>
    <div>
        <?php $description = get_post_meta($post->ID, 'description_key', true); ?>
        <textarea name="description_input" id="description_input" rows="4" cols="60" style="width:99%;"><?php if($description != ''){ echo $description; } ?></textarea>
    </div>
    <?php
}

function tags_html($post) {
    $tags = (get_post_meta($post->ID, 'tags_key', true)) ? get_post_meta($post->ID, 'tags_key', true) : [];
	?>
    <div class="input_tags_wrap">
        <?php
        if(count($tags) >= 1) {
            foreach($tags as $tag){
                ?>
                <div class="tr-tags">
                    <input type="text" name="tags_input[]" class="role-class" value="<?php echo $tag ?>">
                </div>
                <?php
            }
        } else {
            ?>
            <div class="tr-tags">
                <input type="text" name="tags_input[]" class="role-class" value="<?php echo $tag ?>">
            </div>
            <?php
        }
        ?>
    </div>
    <div>
        <button type="button" class="add_tag button button-primary">Add</button>
        <button type="button" class="remove_tag button button-secundary">Remove</button>
    </div>
	<?php
}