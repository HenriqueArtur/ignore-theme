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
	echo '<p>Perfil Options Section</p>';
}

function contact_section_description(){
	echo '<p>Contact Options Section</p>';
}

function site_assets_section_description(){
	echo '<p>Site Assets Options Section</p>';
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

function display_profile_img_element() {
	?>
	<div>
		<img class="upload_preview" src="<?php echo get_option('profile_img_value') ?>" />
	</div>
    <input type="url" class="upload_field" name="profile_img_value" id="profile_img_value" readonly value="<?php echo get_option('profile_img_value'); ?>" />
    <input type="button" class="button upload_button" value="Upload" />
	<input type="button" class="button upload_clear" value="Remove" />
	<?php
}

function display_email_element() {
	?>
    <input type="email" name="email_value" id="email_value" value="<?php echo get_option('email_value'); ?>" />
	<?php
}

function display_site_name_element(){
	?>
	<input type="text" name="site_name_value" id="site_name_value" value="<?php echo get_option('site_name_value'); ?>" />
	<?php
}

function display_site_description_element(){
	?>
	<textarea name="site_description_value" id="site_description_value" rows="4" cols="50"><?php echo get_option('site_description_value'); ?></textarea>
	<?php
}

function display_logo_img_element() {
	?>
	<div>
		<img class="upload_logo_preview" src="<?php echo get_option('logo_img_value') ?>" />
	</div>
    <input type="url" class="upload_logo_field" name="logo_img_value" id="logo_img_value" readonly value="<?php echo get_option('logo_img_value'); ?>" />
    <input type="button" class="button upload_logo_button" value="Upload" />
	<input type="button" class="button upload_logo_clear" value="Remove" />
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
		'Contact',
		'contact_section_description',
		'presentation'
	);

	add_settings_section(
		'third_section',
		'Site Assets',
		'site_assets_section_description',
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

	// profile img
	add_settings_field(
		'profile_img',
		'Profile image',
		'display_profile_img_element',
		'presentation',
		'first_section'
	);
	register_setting(
		'presentation-grp',
		'profile_img_value'
	);

	// email
	add_settings_field(
		'email',
		'Email',
		'display_email_element',
		'presentation',
		'second_section'
	);
	register_setting(
		'presentation-grp',
		'email_value'
	);

	// Site Name
	add_settings_field(
		'site_name',
		'Site name',
		'display_site_name_element',
		'presentation',
		'third_section'
	);
	register_setting(
		'presentation-grp',
		'site_name_value'
	);

	// Site Description
	add_settings_field(
		'site_description',
		'Site description',
		'display_site_description_element',
		'presentation',
		'third_section'
	);
	register_setting(
		'presentation-grp',
		'site_description_value'
	);

	// Logoimg
	add_settings_field(
		'logo_img',
		'Logo image',
		'display_logo_img_element',
		'presentation',
		'third_section'
	);
	register_setting(
		'presentation-grp',
		'logo_img_value'
	);
}
add_action('admin_init','theme_settings');
