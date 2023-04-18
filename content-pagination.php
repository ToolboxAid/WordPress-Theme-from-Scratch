<?php
// Used for Archive (category, tags, calendar (day, mon, yr)), search

$total = $wp_query->max_num_pages;
if( $total > 1 )  { ?>
    <nav class="navigation post-navigation" aria-label="Posts">
      <div class="nav-links align-center">
        <?php
        echo paginate_links( array(
          'prev_text' => '<span><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Previous page</span>',
          'next_text' => '<span>Next page <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></span>'
        ));
        ?>
      </div>
    </nav>
<?php } ?>

