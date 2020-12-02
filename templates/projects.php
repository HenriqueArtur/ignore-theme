<section id="projects" class="projects">
    <div class="container">
        <div class="row">
            <div class="title-box center-align">
                <h2 class="section-title">Projetos</h2>
                <div class="box"></div>
            </div>
        </div>
        <div class="row">
            <?php
            $query_projects = new WP_Query( array(
                'post_type' => 'projects',
                'order'   => 'ASC',
            ));

            if( $query_projects->have_posts() ) {
                while( $query_projects->have_posts() ) {
                    $query_projects->the_post();
                    ?>
                    <div class="project col m6">
                        <div class="content">
                            <a href="<?php echo get_post_meta( get_the_ID(), 'link_project_key', true ) ?>" target="_blank" rel="noopener noreferrer">
                                <div class="title">
                                    <span>
                                        <i class="fab fa-<?php echo get_post_meta( get_the_ID(), 'icon_key', true ) ?>"></i>
                                    </span>
                                    <span> <?php echo the_title(); ?></span>
                                </div>
                                <div class="description"><?php echo get_post_meta( get_the_ID(), 'description_key', true ) ?></div>
                                <?php $tags = get_post_meta( get_the_ID(), 'tags_key', true ) ?>
                                <div class="tags">
                                    <?php
                                    if(count($tags) >= 1) {
                                        foreach ($tags as $tag) {
                                            ?>
                                            <span class="tag"><?php echo $tag; ?></span>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            }
            wp_reset_query();
            ?>
        </div>
    </div>
</section>