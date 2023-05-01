        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                </div><?php

                $equipment = get_post_meta( get_the_ID(), 'equipment_group', true );
                if ( $equipment ) {
                    echo '<p><strong>Equipment: </strong>' . esc_html( $equipment ) . '</p>';
                }

                $body = get_post_meta( get_the_ID(), 'body_group', true );
                if ( $body ) {
                    echo '<p><strong>Body: </strong>' . esc_html( $body ) . '</p>';
                }

                $muscle = get_post_meta( get_the_ID(), 'muscle_group', true );
                if ( $muscle ) {
                    echo '<p><strong>Muscle: </strong>' . esc_html( $muscle ) . '</p>';
                }
                
                ?>
            </article><!-- #post-## -->

        <?php endwhile; // End of the loop. ?>
