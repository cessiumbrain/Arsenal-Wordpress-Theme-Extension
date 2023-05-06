<!DOCTYPE html>
<html lang="en">
    <head>
		<title><?php wp_title(''); ?></title>

		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="format-detection" content="telephone=no" />

		<link href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico" rel="shortcut icon" />
	
 
    <?php
	$block_content = do_blocks( '
		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
		<!-- wp:post-content /-->
		</div>
		<!-- /wp:group -->'
 	);
 	?>
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
    <?php get_header();?>
    <?php wp_body_open(); ?>
    <!-- Render blocks at the top of the page-->
    <div class="wp-site-blocks">
    <?php echo $block_content; ?>
    </div>
    <div class="inventory-wrapper">

        
        <div class="category-wrapper">
            <div class="title-wrapper">
                <h1>Bowling Balls</h1> 
            </div>

       
        <!-- Post Loop For Balls-->
            <?php
                $the_query = new WP_Query([
                    'category_name'=> 'pro-shop',
                    'meta_key'=> 'item_type',
                    'meta_value'=> 'ball'

                ]);
                if ( $the_query->have_posts() ) : 
                    while ( $the_query->have_posts() ) : $the_query->the_post();

                            echo '<div class="item-wrapper">';
                            echo '<h1 class="brand-name">' . get_field('brand_name') . '</h1>';
                            echo '<h2>' . get_field('model_name') . '</h2>';
                            echo '<img src="' . get_field('image') . '"/>';
                            echo '<p>' . get_field('description') . '</p>';
                            echo '<p>' . get_field('price') . '</p>';
                            echo '</div>';
                    endwhile;
                else:
                    echo "no posts";
                    wp_reset_postdata(); 
            endif; 
            ?>
        </div>
        <div class="category-wrapper">
            <div class="title-wrapper">
                <h1>Novelty Balls</h1> 
            </div>
    <?php
    
    $the_query = new WP_Query([
        'category_name'=> 'pro-shop',
        'meta_key'=> 'item_type',
        'meta_value'=> 'novelty ball'

    ]);

    while ($the_query-> have_posts()) :
        $the_query->the_post();
        echo '<div class="item-wrapper">';
        echo '<h1 class="brand-name">' . get_field('brand_name') . '</h1>';
        echo '<h2>' . get_field('model_name') . '</h2>';
        echo '<img src="' . get_field('image') . '"/>';
        echo '<p>' . get_field('description') . '</p>';
        echo '<p>' . get_field('price') . '</p>';
        echo '</div>';

    endwhile;
    ?>
    </div>
    </div>
    <?php 
    get_footer();
    wp_footer(); ?>
</body>
</html>