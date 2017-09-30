<?php 
// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {
	// Define the style_formats array
	$style_formats = array(
	// Each array child is a format with it's own settings
	array(
	'title' => 'My Link Custom Class',
	'selector' => 'a',
	'classes' => 'my-custom-link-class'
	)
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;
}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 



function new_modify_user_table( $column ) {
    unset($column['name']);
    unset($column['role']);
    unset($column['email']);
    unset($column['posts']);

    $column['fullname'] = 'Full Name';
    $column['email'] = 'Email';
    $column['posts'] = 'Posts';
    return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table' );

function new_modify_user_table_row( $val, $column_name, $user_id ) {
    switch ($column_name) {
        case 'fullname' :
        	return get_field('profile_fullname',  'user_'.$user_id);
            break;
        default:
    }
    return $val;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );


?>


