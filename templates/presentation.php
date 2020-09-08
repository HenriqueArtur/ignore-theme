<section class="presentation">
    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <figure class="profile-img">
                    <img src="https://picsum.photos/500/500?random=1" alt="" class="responsive-img circle">
                </figure>
            </div>
            <div class="col m6 description">
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
                    <a href="http://" target="_blank" rel="noopener noreferrer" class="social-item">
                        <i class="icon fab fa-github-alt"></i>
                    </a>
                    <a href="http://" target="_blank" rel="noopener noreferrer" class="social-item">
                        <i class="icon fab fa-linkedin"></i>
                    </a>
                    <a href="http://" target="_blank" rel="noopener noreferrer" class="social-item">
                        <i class="icon fab fa-telegram-plane"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>