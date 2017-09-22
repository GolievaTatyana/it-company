Template Name: post_type_name Template

<?php get_header(); ?>

<section id="portfolio">
  <div id="portfolio_main">
    <div class="container-fluid">
      <div class="row text-center">
        <h2>portfolio</h2>
      </div>
      <div class="row wrapper">
        <div class="row">

          <?php $my_query = new WP_Query( array( 'post_type' => 'post_type_name',
                                                 'orderby' => 'title',
                                                 'posts_per_page' => 12,
                                                 'paged' => 4,) ); ?>

          <?php $args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; ?>

          <?php if ( $my_query->have_posts() ) : ?>
            <?php while ( $my_query->have_posts() ) : $my_query->the_post();?>
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
            <?php if (function_exists('kama_pagenavi')) kama_pagenavi(); ?>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
