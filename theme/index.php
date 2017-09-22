<?php get_header(); ?>

<section id="portfolio">
  <div id="portfolio_main">
    <div class="container-fluid height">
      <div class="row text-center">
        <h2>portfolio</h2>
      </div>
      <div class="row wrapper">
        <div class="row">
          <?php $args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; ?>
          <?php $args = array( 'post_type' => 'post_type_name',
                               'orderby' => 'title',
                               'posts_per_page' => 4,
                               'paged' => $paged); ?>
          <?php $wp_query = new WP_Query($args); ?>
          <?php if ( $wp_query->have_posts() ) : ?>
            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
              <div class="col-xs-12 col-sm-6 col-md-3">
                <?php $thumbnailUrl = get_the_post_thumbnail_url($my_thumb, full); ?>
                <div class="hovereffect">
                  <div class="folio-image">
                    <img src="<?php echo $thumbnailUrl; ?>" alt="" class="img-responsive">
                  </div>
                  <div class="overlay">
                    <h6><?php the_title(); ?></h6>
                    <p><?php the_content(); ?></p>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="page_nav">
        <?php
        $GLOBALS['wp_query']->max_num_pages = $wp_query->max_num_pages;
        the_posts_pagination(array(
          'type'=>'inline',
          'screen_reader_text' => 'Смотреть другие страницы',
          'end_size'     => 1,
          'mid_size'     => 1,
          'prev_next'    => True,
          'prev_text'    => '«',
          'next_text'    => '»',
          'add_args'     => False
        ));
        ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
