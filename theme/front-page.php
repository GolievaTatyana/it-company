<?php
$templateUri = get_template_directory_uri();
$pagesForSections = get_pages(array('meta_key' => 'add_to',
                                    'hierarchical' => 0,
                                    'sort_column' => 'menu_order',
                                    'sort_order' => 'asc')
);
$banner         = [];
$what_we_do     = [];
$profile        = [];
$case_stadies   = [];
$portfolio_view = [];
$framevorcs     = [];
$git            = [];
$counter        = 0;
foreach ($pagesForSections as $page) {
    switch ($page->meta_value) {
        case 'banner':
        $banner[] = $page;
        break;
        case 'what_we_do':
        $what_we_do[] = $page;
        break;
        case 'profile':
        $profile[] = $page;
        break;
        case 'case_stadies':
        $case_stadies[] = $page;
        break;
        case 'portfolio_view':
        $portfolio_view[] = $page;
        break;
        case 'framevorcs':
        $framevorcs[] = $page;
        break;
        case 'git':
        $git[] = $page;
        break;
    }
}
?>


<?php get_header(); ?>

<?php $banner = $banner[0]; ?>
<?php if ($banner): ?>
  <a name="banner"></a>
  <section id="banner">
      <div class="container-fluid" id="home">
          <div class="row text-center">
              <h1><?php echo $banner->post_content; ?></h1>
              <p><?php echo $banner->post_excerpt; ?></p>
          </div>
          <div class="row text-center">
              <img src="<?php echo $templateUri; ?>/img/banner/devices-1.png" height="100" width="140" class="img-rsponsive devices"><br>
              <div class="jumping">
                  <a href="#what_we_do">
                      <img src="<?php echo $templateUri; ?>/img/banner/icon-down.png" height="30" width="30">
                  </a>
              </div>
          </div>
      </div>
  </section>
<?php endif; ?>


<?php if ($what_we_do): ?>
  <a name="what_we_do"></a>
  <section id="what_we_do">
    <div class="container-fluid">
      <div class="row text-center caption">
        <h2>what we do</h2>
      </div>
      <div class="row wrapper">
        <?php foreach ($what_we_do as $key_item => $item): ?>
          <div class="col-xs-12 col-sm-4">
            <div class="col-xs-12">
              <div class="circle <?php echo get_post_meta($item->ID, 'style_circle', true); ?> center-block"></div>
              <h3><?php echo $item->post_title; ?></h3>
              <span class="<?php echo get_post_meta($item->ID, 'style_line', true); ?> center-block"></span>
              <ul class="<?php echo get_post_meta($item->ID, 'style_list', true); ?>">
                <?php echo $item->post_content; ?>
              </ul>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
  </section>
<?php endif; ?>


<?php if ($profile): ?>
  <a name="profile"></a>
  <section id="profile">
    <?php foreach ($profile as $key_prof => $prof) : ?>
      <?php if ($key_prof==0): ?>
        <div id="profile_top">
            <div class="container-fluid">
                <div class="row text-center">
                    <h2><?php echo $prof->post_content; ?></h2>
                </div>
                <div class="row wrapper text-center">
                    <p><?php echo $prof->post_excerpt; ?></p>
                </div>
            </div>
        </div>
      <?php endif; ?>
    <?php endforeach ?>

    <div id="profile_content">
      <div class="container-fluid">
        <div class="row wrapper">
          <?php foreach ($profile as $key_prof => $prof) : ?>
            <?php if ($key_prof !=0): ?>
              <div class="col-md-4">
                  <div class="col-xs-12 <?php echo get_post_meta($prof->ID, 'style_color', true); ?>">
                    <h3><?php echo $prof->post_title; ?></h3>
                    <h4><?php echo $prof->post_excerpt; ?></h4>
                    <ul><?php echo $prof->post_content; ?></ul>
                  </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>


<?php if ($case_stadies): ?>
  <a name="typical_projects"></a>
  <section id="case_stadies">
    <div class="container-fluid">
      <div class="row text-center">
          <h2>typical projects</h2>
      </div>
      <div class="row row-table wrapper">
        <?php $count = 0; ?>
        <?php foreach ($case_stadies as $key_case => $case): ?>
          <?php if ($count == 3) break; ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-table-cell text-center">
              <div class="col-xs-12 case_stadies">
                <?php $ThumbnailUrl = get_the_post_thumbnail_url($case, full); ?>
                <?php $ThumbnailUrl = $ThumbnailUrl? $ThumbnailUrl: get_template_directory_uri().'/img/web1.png'; ?>
                <img src="<?php echo $ThumbnailUrl; ?>" height="150" width="160">
                <h4><?php echo $case->post_title; ?></h4>
                <span class="<?php echo get_post_meta($case->ID, 'style_line', true); ?> center-block"></span>
                <h5><?php echo $case->post_excerpt; ?></h5>
                <span class="<?php echo get_post_meta($case->ID, 'style_line', true); ?> center-block"></span>
                <p><?php echo $case->post_content; ?></p>
              </div>
            </div>
            <?php $count ++; ?>
        <?php endforeach; ?>

        <?php foreach ($case_stadies as $key_case => $case): ?>
          <?php if ($key_case == 3): ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-2 col-table-cell text-center">
              <div class="col-xs-12 case_stadies">
                <?php $ThumbnailUrl = get_the_post_thumbnail_url($case, full); ?>
                <?php $ThumbnailUrl = $ThumbnailUrl? $ThumbnailUrl: get_template_directory_uri().'/img/web1.png'; ?>
                <img src="<?php echo $ThumbnailUrl; ?>" height="150" width="160">
                <h4><?php echo $case->post_title; ?></h4>
                <span class="<?php echo get_post_meta($case->ID, 'style_line', true); ?> center-block"></span>
                <h5><?php echo $case->post_excerpt; ?></h5>
                <span class="<?php echo get_post_meta($case->ID, 'style_line', true); ?> center-block"></span>
                <p><?php echo $case->post_content; ?></p>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>

        <?php foreach ($case_stadies as $key_case => $case): ?>
          <?php if ($key_case == 4): ?>
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 col-table-cell text-center">
              <div class="col-xs-12 case_stadies">
                <?php $ThumbnailUrl = get_the_post_thumbnail_url($case, full); ?>
                <?php $ThumbnailUrl = $ThumbnailUrl? $ThumbnailUrl: get_template_directory_uri().'/img/web1.png'; ?>
                <img src="<?php echo $ThumbnailUrl; ?>" height="150" width="160">
                <h4><?php echo $case->post_title; ?></h4>
                <span class="<?php echo get_post_meta($case->ID, 'style_line', true); ?> center-block"></span>
                <h5><?php echo $case->post_excerpt; ?></h5>
                <span class="<?php echo get_post_meta($case->ID, 'style_line', true); ?> center-block"></span>
                <p><?php echo $case->post_content; ?></p>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>


<section id="portfolio">
  <div id="portfolio_main">
    <div class="container-fluid">
      <div class="row text-center">
        <h2>portfolio</h2>
      </div>
      <div class="row wrapper">
        <div class="row">
          <?php $args = array( 'post_type' => 'post_type_name' ); ?>
          <?php $my_query = new WP_Query( $args ); ?>
          <?php if ( $my_query->have_posts() ) : ?>
            <?php $count = 0; ?>
            <?php while ( $my_query->have_posts() ) : $my_query->the_post();?>
              <?php if ($count == 8) break; ?>
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
              <?php $count ++; ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <?php $portfolio_view = $portfolio_view[0]; ?>
  <?php if ($portfolio_view): ?>
    <div id="portfolio_view">
      <div class="container-fluid">
        <div class="row wrapper">
          <div class="col-sm-9">
            <p><?php echo $portfolio_view->post_title; ?></p>
          </div>
          <div class="col-sm-3">
            <?php echo $portfolio_view->post_content; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($framevorcs): ?>
    <div id="framevorcs">
        <div class="container-fluid">
            <div class="row framevorcs">
              <?php foreach ($framevorcs as $key_f => $fram): ?>
                <div class="col-xs-3 col-sm-2 col-md-1 icons">
                    <?php $thumbnailUrl = get_the_post_thumbnail_url($fram, full); ?>
                    <img src="<?php echo $thumbnailUrl; ?>" alt="" class="img-responsive">
                </div>
              <?php endforeach; ?>
  <?php endif; ?>
</section>


<?php if ($git): ?>
  <section id="git">
    <div class="container-fluid">
      <div class="row text-center git">
        <h2>get in toutch</h2>
      </div>
      <div class="row wrapper">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
          <div class="row">
            <?php $count = 0; ?>
            <?php foreach ($git as $key_g => $g_item): ?>
              <?php if ($count == 3) break; ?>
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <?php echo $g_item->post_excerpt; ?>
                  </div>
                </div>
              <?php $count ++; ?>
            <?php endforeach; ?>
          </div>

          <div class="row">
            <?php foreach ($git as $key_g => $g_item): ?>
              <?php if ($key_g == 3): ?>
                <div class="col-xs-12">
                  <?php echo $g_item->post_excerpt; ?>
                  <button type="submit" class="btn btn-default pull-right">send message</button>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>


<?php get_footer(); ?>
