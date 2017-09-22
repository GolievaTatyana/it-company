<?php

// Allow to create menu

add_action('after_setup_theme', function(){
	register_nav_menus( array(
            'header-menu' => 'Main menu',
            'langs' => 'Languages menu',
	) );
});

// Allow to use thubnails in posts

add_theme_support( 'post-thumbnails', array('post','page') );
function my_custom_init() {
	add_post_type_support( 'page', 'excerpt' );
        add_post_type_support( 'post', 'excerpt' );
}
add_action('init', 'my_custom_init');

// Default size of thumbnails
if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');
        set_post_thumbnail_size( 240, 240 );
}

add_action('init', 'register_post_types');
function register_post_types(){
	register_post_type('post_type_name', array(
		'labels' => array(
			'name'               => 'Thumbnails',
			'singular_name'      => 'Thumbnail',
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new thumbnail',
			'edit_item'          => 'Edit Thumbnail',
			'new_item'           => 'New thumnail',
			'view_item'          => 'Wiew thumnail',
			'search_items'       => 'Search thumnails',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in trach',
			'menu_name'          => 'Gallery',
		),
		'description'  => '',
		'public' => true,
		'menu_position' => 5,
		'has_archive' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'page-attributes'),

		'exclude_from_search' => true,
		'menu_icon' => 'dashicons-format-gallery',
		'query_var' => true
	) );
}

function codernote_request($query_string ) {
  if ( isset( $query_string['page'] ) ) {
    if ( ''!=$query_string['page'] ) {
      if ( isset( $query_string['name'] ) ) {
        unset( $query_string['name'] ); }
      }
    }
    return $query_string;
}
add_filter('request', 'codernote_request');

add_action('pre_get_posts', 'codernote_pre_get_posts');
function codernote_pre_get_posts( $query ) {
  if ( $query->is_main_query() && !$query->is_feed() && !is_admin() ) {
    $query->set( 'paged', str_replace( '/', '', get_query_var( 'page' ) ) );
  }
}


add_filter('pre_get_posts', 'query_post_type');
function query_post_type($my_query) {
     if(is_category() || is_tag()) {
     $post_type = get_query_var('post_type');
     if($post_type)
     $post_type = $post_type;
else
     $post_type = array('post','post_type_name');
     $my_query->set('post_type',$post_type);
     return $my_query;
}}

function kama_pagenavi($before='', $after='', $echo=true) {

	/* ================ Настройки ================ */
	$text_num_page = ''; // текст для количества страниц. {current} заменится текущей, а {last} последней. Пример: 'Страница {current} из {last}' = Страница 4 из 60
	$num_pages = 10; // сколько ссылок показывать
	$stepLink = 10; // после навигации ссылки с определенным шагом (значение = число (какой шаг) или '', если не нужно показывать). Пример: 1,2,3...10,20,30
	$dotright_text = '…'; // промежуточный текст "до".
	$dotright_text2 = '…'; // промежуточный текст "после".
	$backtext = '«'; // текст "перейти на предыдущую страницу". Ставим '', если эта ссылка не нужна.
	$nexttext = '»'; // текст "перейти на следующую страницу". Ставим '', если эта ссылка не нужна.
	$first_page_text = ''; // текст "к первой странице" или ставим '', если вместо текста нужно показать номер страницы.
	$last_page_text = ''; // текст "к последней странице" или пишем '', если вместо текста нужно показать номер страницы.
	/* ================ Конец Настроек ================ */

	global $wp_query;
	$posts_per_page = (int) $wp_query->query_vars[posts_per_page];
	$paged = (int) $wp_query->query_vars[paged];
	$max_page = $wp_query->max_num_pages;

	if($max_page <= 1 ) return false; //проверка на надобность в навигации

	if(empty($paged) || $paged == 0) $paged = 1;

	$pages_to_show = intval($num_pages);
	$pages_to_show_minus_1 = $pages_to_show-1;

	$half_page_start = floor($pages_to_show_minus_1/2); //сколько ссылок до текущей страницы
	$half_page_end = ceil($pages_to_show_minus_1/2); //сколько ссылок после текущей страницы

	$start_page = $paged - $half_page_start; //первая страница
	$end_page = $paged + $half_page_end; //последняя страница (условно)

	if($start_page <= 0) $start_page = 1;
	if(($end_page - $start_page) != $pages_to_show_minus_1) $end_page = $start_page + $pages_to_show_minus_1;
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = (int) $max_page;
	}

	if($start_page <= 0) $start_page = 1;

	$out=''; //выводим навигацию
		$out.= $before."<div class='wp-pagenavi'>\n";
				if ($text_num_page){
					$text_num_page = preg_replace ('!{current}|{last}!','%s',$text_num_page);
					$out.= sprintf ("<span class='pages'>$text_num_page</span>",$paged,$max_page);
				}

				if ($start_page >= 2 && $pages_to_show < $max_page) {
					$out.= '<a href="'.rtrim(get_pagenum_link(), '/').'">'. ($first_page_text?$first_page_text:1) .'</a>';
					if($dotright_text && $start_page!=2) $out.= '<span class="extend">'.$dotright_text.'</span>';
				}

				if ($backtext && $paged!=1) $out.= '<a href="'.rtrim(get_pagenum_link(($paged-1)), '/').'">'.$backtext.'</a>';

				for($i = $start_page; $i <= $end_page; $i++) {
					if($i == $paged) {
						$out.= '<span class="current">'.$i.'</span>';
					} else {
						$out.= '<a href="'.rtrim(get_pagenum_link($i), '/').'">'.$i.'</a>';
					}
				}

				if ($nexttext && $paged!=$end_page) $out.= '<a href="'.get_pagenum_link(($paged+1)).'">'.$nexttext.'</a>';

				//ссылки с шагом
				if ($stepLink && $end_page < $max_page){
					for($i=$end_page+1; $i<=$max_page; $i++) {
						if($i % $stepLink == 0 && $i!==$num_pages) {
							if (++$dd == 1) $out.= '<span class="extend">'.$dotright_text2.'</span>';
							$out.= '<a href="'.get_pagenum_link($i).'">'.$i.'</a>';
						}
					}
				}

				if ($end_page < $max_page) {
					if($dotright_text && $end_page!=($max_page-1)) $out.= '<span class="extend">'.$dotright_text2.'</span>';
					$out.= '<a href="'.get_pagenum_link($max_page).'">'. ($last_page_text?$last_page_text:$max_page) .'</a>';
				}

		$out.= "</div>".$after."\n";
	if ($echo) echo $out;
	else return $out;
}

; ?>
