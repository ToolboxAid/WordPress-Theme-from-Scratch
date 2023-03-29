<?php

class Parent_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        // Do nothing for sub-menus
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        // Do nothing for sub-menus
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        // Only display top-level parent menu items
        if ( $depth === 0 && $item->menu_item_parent == 0 ) {
            $output .= '<li>';
            $output .= '<a href="' . $item->url . '">' . $item->title . '</a>';
        }
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        // Only display top-level parent menu items
        if ( $depth === 0 && $item->menu_item_parent == 0 ) {
            $output .= '</li>';
        }
    }
}


?>