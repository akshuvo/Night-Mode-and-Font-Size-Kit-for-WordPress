<?php
/**
 *	Layout Function
 **/

add_filter( 'wp_nav_menu_items', 'nmfs_menu_append_function', 10, 2 );

function nmfs_menu_append_function ( $items, $args ) {
	global $nmfs_opt;
	
	$night_mode_cookie = esc_attr( $_COOKIE['night_mode'] );
	$text_size_cookie = esc_attr( $_COOKIE['text_size'] );

	if( isset( $night_mode_cookie ) ) {
		$checked = checked( $night_mode_cookie, '1', false );
	}else{
		$checked = '';
	}

	if( isset( $text_size_cookie ) ) {
		$text_size = $text_size_cookie;
	}else{
		$text_size = 'M';
	}


    if ( $args->theme_location == $nmfs_opt["get-menu"] ) {
		$items .= '<li id="nmfs-settings" class="nmfs-settings ">
		    <button id="settings-toggle" class="nmfs-settings__toggle search-toggle button--chromeless" title="'.esc_attr("Show/hide accessibility settings","nmfs").'" aria-controls="settings" aria-expanded="true">
				<svg id="icon-settings" enable-background="new 0 0 30 30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><path d="m26.6 12.9-2.9-.3c-.2-.7-.5-1.4-.8-2l1.8-2.3c.2-.2.1-.5 0-.7l-2.2-2.2c-.2-.2-.5-.2-.7 0l-2.3 1.8c-.6-.4-1.3-.6-2-.8l-.3-2.9c-.2-.3-.4-.5-.6-.5h-3.1c-.3 0-.5.2-.5.4l-.3 2.9c-.7.2-1.4.5-2 .8l-2.4-1.7c-.2-.2-.5-.1-.7 0l-2.2 2.2c-.2.2-.2.5 0 .7l1.8 2.3c-.4.6-.6 1.3-.8 2l-2.9.3c-.3.1-.5.3-.5.5v3.1c0 .3.2.5.4.5l2.9.3c.2.7.5 1.4.8 2l-1.8 2.3c-.2.2-.1.5 0 .7l2.2 2.2c.2.2.5.2.7 0l2.3-1.8c.6.4 1.3.6 2 .8l.3 2.9c0 .3.2.4.5.4h3.1c.3 0 .5-.2.5-.4l.3-2.9c.7-.2 1.4-.5 2-.8l2.3 1.8c.2.2.5.1.7 0l2.2-2.2c.2-.2.2-.5 0-.7l-1.8-2.3c.4-.6.6-1.3.8-2l2.9-.3c.3 0 .4-.2.4-.5v-3.1c.3-.2.1-.4-.1-.5zm-11.6 6.1c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"></path></svg>
				<span class="screen-reader-text">Settings</span>
		    </button>
		    <div id="settings" class="nmfs-settings__wrapper" aria-hidden="true" aria-labelledby="settings-toggle">
		        <div class="nmfs-settings__inner">
		            <div class="nmfs-settings__arrow"></div>
		            <div class="nmfs-settings__item nmfs-settings__item--night-mode">
		                <div class="nmfs-settings__item-inner flex items-center">
		                    <span class="nmfs-settings__label">Night Mode</span>
		                    <label class="nmfs-switch">
							  	<input class="input-night" type="checkbox" '.$checked.'>
							  	<span class="nmfs-slider round"></span>
							</label>
		                </div>
		            </div>
		            <div class="nmfs-settings__item text-size">
		                <div class="nmfs-settings__item-inner flex items-center">
		                    <span class="nmfs-settings__label">Text Size</span>
		                    <button data-size="'.$text_size.'" class="nmfs-settings__text-size" tabindex="-1" aria-label="Change Text Size">A</button>
		                </div>
		            </div>
		        </div>
		    </div>

		</li>';
    }

    return $items;
}