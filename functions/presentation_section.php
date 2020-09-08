<?php
/*
 * REGISTER
 */
add_action('admin_menu', 'register_theme_infos');
function register_theme_infos() {
    add_menu_page(
		'Presentation',
		'Presentation',
		'manage_options',
		'presentation',
		'presentation_menu_render',
		'dashicons-nametag',
		2
	);
}

/*
 * RENDER
 */
function presentation_menu_render() {
    ?>
	<div class="wrap">
		<h1>Presentation Section</h1>
		<form method="post" action="options.php">
			<?php
			settings_fields("presentation-grp");
			do_settings_sections("presentation");
			submit_button();
			?>
		</form>
	</div>
	<?php
}

/*
 * SECTIONS CALLBACKS
 */
function perfil_section_description(){
	echo '<p>Perfil Option Section</p>';
}

function social_media_section_description(){
	echo '<p>Social Media Option Section</p>';
}

/*
 * FIELDS CALLBACKS
 */
function display_first_name_element(){
	?>
	<input type="text" name="first_name_value" id="first_name_value" value="<?php echo get_option('first_name_value'); ?>" />
	<?php
}

function display_second_name_element(){
	?>
	<input type="text" name="second_name_value" id="second_name_value" value="<?php echo get_option('second_name_value'); ?>" />
	<?php
}

function display_occupation_element(){
	?>
	<input type="text" name="occupation_value" id="occupation_value" value="<?php echo get_option('occupation_value'); ?>" />
	<?php
}

function display_slogan_element(){
	?>
	<input type="text" name="slogan_value" id="slogan_value" value="<?php echo get_option('slogan_value'); ?>" />
	<?php
}

/*
 * SETTINGS
 */
function theme_settings(){
	/*
	 * Sections
	 */	
	add_settings_section(
		'first_section',
		'Perfil infos',
		'perfil_section_description',
		'presentation'
	);

	add_settings_section(
		'second_section',
		'Social Medias',
		'social_media_section_description',
		'presentation'
	);

	/*
	 * Fields
	 */	
	// first name
	add_settings_field(
		'first_name',
		'First name',
		'display_first_name_element',
		'presentation',
		'first_section'
	);
	register_setting(
		'presentation-grp',
		'first_name_value'
	);

	// second name
	add_settings_field(
		'second_name',
		'Second name',
		'display_second_name_element',
		'presentation',
		'first_section'
	);
	register_setting(
		'presentation-grp',
		'second_name_value'
	);

	// occupation
	add_settings_field(
		'occupation',
		'Occupation',
		'display_occupation_element',
		'presentation',
		'first_section'
	);
	register_setting(
		'presentation-grp',
		'occupation_value'
	);

	// slogan
	add_settings_field(
		'slogan',
		'Slogan',
		'display_slogan_element',
		'presentation',
		'first_section'
	);
	register_setting(
		'presentation-grp',
		'slogan_value'
	);
}
add_action('admin_init','theme_settings');
