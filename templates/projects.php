<section id="projects" class="projects section scrollspy">
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

            ?>
            <div class="col m6">
            <?php
            if( $query_projects->have_posts() ) {
                foreach ($query_projects->posts as $index => $project) {
                    ?>
                    <div class="project">
                        <div class="content">
                            <a href="<?php echo get_post_meta( $project->ID, 'link_project_key', true ) ?>" target="_blank" rel="noopener noreferrer">
                                <div class="title">
                                    <span>
                                        <i class="<?php echo get_post_meta( $project->ID, 'lib_key', true ) ?> fa-<?php echo get_post_meta( $project->ID, 'icon_key', true ) ?>"></i>
                                    </span>
                                    <span> <?php echo get_the_title($project); ?></span>
                                </div>
                                <div class="description"><?php echo get_post_meta( $project->ID, 'description_key', true ) ?></div>
                                <?php $tags = get_post_meta( $project->ID, 'tags_key', true ) ?>
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
                    if($index + 1 >= ceil($query_projects->found_posts / 2))
                    {
                        ?>
                        </div>
                        <div class="col m6">
                        <?php
                    }
                }
            }
            wp_reset_query();
            ?>
            </div>
        </div>
    </div>
</section>