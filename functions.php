<?php
    function custom_theme_support(){
        add_theme_support('html5',array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'automatic-feed-links' );
        register_hamburger_menus( array(
            'footer_nav'=>esc_html__('footer navigation','rtbread'),
            'category_nav'=>esc_html__('category navigation','rtbread'),
        ));
    }
    add_action('after_setup_theme','custom_theme_support');


    function hamburger_script() {
        wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.6.1/css/all.css', array(), 'v5.6.1' );
        wp_enqueue_style( 'hamburger', get_template_directory_uri() . '/css/hamburger.css', array(), '1.0.0' );
        wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.0.0' );
        wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', array(), '3.6.0', true );
        wp_enqueue_script( 'script', get_template_directory_uri() . '/js/style.js', array(), '1.0.0', true );
    }
    add_action( 'wp_enqueue_scripts', 'hamburger_script' );


    function hamburger_title( $title ) {
        if ( is_front_page() && is_home() ) { //表示されたページがフロントページかつメインページなら
            $title = get_bloginfo( 'name', 'display' ); //タイトルはブログのサイト名にしてください
        } elseif ( is_singular() ) { //表示されたページが個別投稿ページなら
            $title = single_post_title( '', false ); //タイトルは投稿記事のタイトルにしてください
        }
            return $title;
        }
    add_filter( 'pre_get_document_title', 'hamburger_title' );

    function hamburger_widgets_init() {
        register_sidebar (
            array(
                'name'          => 'All Menu',
                'id'            => 'menu_widget',
                'description'   => 'メニューの一覧です',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="c-category-title">',
                'after_title'   => "</h2>\n",
            )
        );
        class WP_Widget_Categories_Taxonomy extends WP_Widget_Categories {
            private $taxonomy = 'category';

            public function widget( $args, $instance ) {
                if ( !empty( $instance['taxonomy'] ) ) {
                    $this->taxonomy = $instance['taxonomy'];
                }

                add_filter( 'widget_categories_dropdown_args', array( $this, 'add_taxonomy_dropdown_args' ), 10 );
                add_filter( 'widget_categories_args', array( $this, 'add_taxonomy_dropdown_args' ), 10 );
                parent::widget( $args, $instance );
            }

            public function update( $new_instance, $old_instance ) {
                $instance = parent::update( $new_instance, $old_instance );
                $taxonomies = $this->get_taxonomies();
                $instance['taxonomy'] = 'category';
                if ( in_array( $new_instance['taxonomy'], $taxonomies ) ) {
                    $instance['taxonomy'] = $new_instance['taxonomy'];
                }
                return $instance;
            }

            public function form( $instance ) {
                parent::form( $instance );
                $taxonomy = 'category';
                if ( !empty( $instance['taxonomy'] ) ) {
                    $taxonomy = $instance['taxonomy'];
                }
                $taxonomies = $this->get_taxonomies();
                ?>
                <p>
                    <label for="<?php echo $this->get_field_id( 'taxonomy' ); ?>"><?php _e( 'Taxonomy:' ); ?></label><br />
                    <select id="<?php echo $this->get_field_id( 'taxonomy' ); ?>" name="<?php echo $this->get_field_name( 'taxonomy' ); ?>">
                        <?php foreach ( $taxonomies as $value ) : ?>
                        <option value="<?php echo esc_attr( $value ); ?>"<?php selected( $taxonomy, $value ); ?>><?php echo esc_attr( $value ); ?></option>
                        <?php endforeach; ?>
                    </select>
                </p>
                <?php
            }

            public function add_taxonomy_dropdown_args( $cat_args ) {
                $cat_args['taxonomy'] = $this->taxonomy;
                return $cat_args;
            }

            private function get_taxonomies() {
                $taxonomies = get_taxonomies( array(
                    'public' => true,
                ) );
                return $taxonomies;
            }
        }
        unregister_widget( 'WP_Widget_Categories' );
        register_widget( 'WP_Widget_Categories_Taxonomy' );
    }
    add_action( 'widgets_init', 'hamburger_widgets_init' );



    // メニューの追加
    function register_hamburger_menus(){
        register_nav_menus( array(
            'footer-menu' => 'FooterMenu',
            'header-menu' => 'HeaderMenu'
        ));
    }
    add_action( 'after_setup_theme', 'register_hamburger_menus');


        function create_post_type() {
            register_post_type( 'item', [ // 投稿タイプ名
                'labels' => [
                    'name'          => '商品',
                    'singular_name' => 'item',
                ],
                'public'        => true,
                'has_archive'   => true,
                'menu_position' => 5,
                'menu_icon'     => 'dashicons-store',
                'hierarchical'  => true,
                'supports'      => [
                    'title',
                    'editor',
                    'thumbnail',
                    'page-attributes'
                ]
                ]);

                register_taxonomy('item_category', 'item',[
                    'labels' => [
                        'name' => '商品カテゴリー',
                        'edit_item' => '商品カテゴリーを編集'
                ],
                'public' => true,
                'hierarchical' => true,
                'show in rest' => true,
                ]);
            }
        add_action( 'init', 'create_post_type' );

