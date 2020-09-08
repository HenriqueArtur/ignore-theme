<section class="presentation">
    

    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <figure class="right-align">
                    <img src="<?php echo get_option('profile_img_value');?>" alt="profile" class="circle profile-img">
                </figure>
            </div>
            <div class="col m6 description">
                <div class="props">
                    <div class="rect r-first">
                        <i class="fas fa-times"></i>
                        <i class="fas fa-ellipsis-h"></i>
                    </div>
                    <div class="rect r-second">
                        <i class="fas fa-times"></i>
                        <i class="fas fa-ellipsis-h"></i>
                    </div>
                </div>
                <h1>
                    <div class="title-box">
                        <span class="name">
                            <?php echo get_option('first_name_value');?>
                        </span>
                        <div class="box first"></div>
                    </div>
                    <div class="title-box">
                        <span class="name">
                            <?php echo get_option('second_name_value');?>
                        </span>
                        <div class="box second"></div>
                    </div>
                </h1>
                <h2><?php echo get_option('occupation_value');?></h2>
                <p class="slogan"><small><?php echo get_option('slogan_value');?></small></p>
                <div class="social-icons">
                <?php
                    $args = array( 'post_type' => 'social_medias' );
                    $query = new WP_Query( $args );

                    if( $query->have_posts() ) :
                        while( $query->have_posts() ) :
                            $query->the_post();
                    ?>
                            <?php $fa_ref     = get_post_meta($post->ID, 'fa_ref_key',      true); ?>
                            <?php $social_url = get_post_meta($post->ID, 'social_url_key',  true); ?>

                            <a href="<?php echo $social_url ?>" target="_blank" rel="noopener noreferrer" class="social-item">
                                <i class="icon fab fa-<?php echo $fa_ref  ?>"></i>
                            </a>
                    <?php
                        endwhile;
                    endif;

                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>