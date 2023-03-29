<?php

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

    // Start of the parent menu item
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
  
      if ( $depth === 0 ) {
        // Add the parent menu item to the parent div
        $output .= '<div class="parent-menu-item">';
      } else {
        // Add the child menu item to the child div
        $output .= '<div class="child-menu-item">';
      }
  
      // Continue with the original start_el() function
      parent::start_el( $output, $item, $depth, $args, $id );
  
    }
  
    // End of the parent menu item
    function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
  
      // Close the div based on the depth
      if ( $depth === 0 ) {
        $output .= '</div>';
      } else {
        $output .= '</div>';
      }
  
      // Continue with the original end_el() function
      parent::end_el( $output, $item, $depth, $args, $id );
  
    }
  
  }
   

?>