<?php
// Used for single, special-post-template
// $posts_nav = get_posts_nav_link();
// if(!empty($posts_nav)) {
?>
<nav class="navigation post-navigation" aria-label="Posts">
  <div class="nav-links">
    <div class="nav-previous"><?php previous_post_link( '%link', __( '<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Previous post<br/> %title', 'qbytesworld_WordPress' ) ); ?></div>
    <div class="nav-next"><?php next_post_link( '%link', __( 'Next post <i class="fa fa-arrow-circle-right" aria-hidden="true"></i><br/> %title', 'qbytesworld_WordPress' ) ); ?></div>
  </div>
</nav>

<?php //} ?>
