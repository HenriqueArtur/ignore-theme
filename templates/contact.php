<section class="contact">
    <div class="container">
        <div class="row">
            <div class="title-box center-align">
                <h2 class="section-title">Contato</h2>
                <div class="box"></div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 infos valign-wrapper">
                <div class="content center-align">
                    <div class="email center-align">
                        <a href="mailto:contato@henriqueartur.com">contato@henriqueartur.com</a>
                    </div>
                    <div class="social-icons center-align">
                    <?php
                        $args = array( 
                            'post_type' => 'social_medias',
                            'order'   => 'ASC',
                        );
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
    </div>
</section>