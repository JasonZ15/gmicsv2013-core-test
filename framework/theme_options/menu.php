<?php ob_start();
/** create_admin_menu()
  * Objective:
  *		Hook to create thme option page at back end.
**/
function create_admin_menu() {
	
	$role = get_role('administrator');
	if(!$role->has_cap('manage_theme')) $role->add_cap('manage_theme');

    if( function_exists('add_object_page') ) 
		 add_object_page (IAMD_THEME_NAME.' - '.__('settings',IAMD_TEXT_DOMAIN),IAMD_THEME_NAME,'manage_theme','parent','mytheme_options_page');
		 
	if(function_exists('add_submenu_page'))
	 	add_submenu_page ('parent',IAMD_THEME_NAME.' - '.__("options",IAMD_TEXT_DOMAIN),__('Options',IAMD_TEXT_DOMAIN),'manage_theme','parent','mytheme_options_page');		

}
### --- ****  create_admin_menu() *** --- ###
add_action('admin_menu', 'create_admin_menu');
get_template_part('framework/theme_options/settings');
#ob_flush();?>