<?php get_header(); ?>
<!-- Sobre -->
<section id="section-about">
    <div class="highlight-text" id="about">Sobre</div>
    <div class="description">
        <div class="picture">
            <div class="overlay"></div>
            <div class="underlay"></div>
            <img src="<?php echo get_template_directory_uri()?>/assets/img/profile.jpg" alt="mypic" />
        </div>

        <div class="main-text">
            <div class="presentation-title">
                <h1><span class="wave">👋</span>Olá,</h1>
                <h1 class="thin">meu nome é</h1>
                <h1>Arthur Ruan</h1>
            </div>

            <div class="presentation-description">
                <p>
                    Tenho 23 anos, sou <strong>dev front-end</strong> e busco
                    experiência profissional na área de programação. Tenho
                    mantido o meu foco e interesse em aprender e me aperfeiçoar
                    cada vez mais na área de programação Front-End.
                </p>
                <br />
                <p>
                    Aqui no meu portfólio você encontrará os meus meios de
                    contato, verá as tecnologias que estou aprendendo e
                    utilizando, e também avaliará alguns dos projetos pessoais e
                    freelas que fiz até agora!
                </p>
            </div>

            <div>
                <a
                    href="https://www.linkedin.com/in/oldarthur/"
                    target="_blank"
                >
                    linkedin •
                </a>
                <a href="https://github.com/arthur3429" target="_blank">
                    github •
                </a>
                <!-- <a href="https://www.instagram.com/oldarthur/" target="_blank">
                    instagram •
                </a> -->
                <a href="mailto:arthur3429@gmail.com"> email </a>
            </div>
        </div>
    </div>
</section>

<!-- Skills -->
<section id="section-skills">
    <div class="u738">
        <div class="highlight-text">Skills</div>
    </div>
    <div class="techs">
        <h2>Tecnologias <strong>&</strong> Habilidades <span>☕</span></h2>
        <div class="skills-container">
            <?php
                // Loop que puxa todas as habilidades adicionadas, as que estiverem marcadas com 'sim' na metabox de destaque são exibidas em cads e as outras só são exibidas quando o usuario clica em 'exibir tudo'
                $args = array(
                    'post_type'     =>      'skill',
                    'posts_per_page'=>      -1,
                    'order'			=>		'ASC',
                    'post_status'   =>      'publish',
                );
                
                $query = New WP_Query($args);
                
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();                       
                        get_template_part('inc/loops/skills');
                    }
                } 
                
                wp_reset_postdata();
            ?>

        </div>
        <div onclick="showAllTechs()" class="showAllTechs">Exibir Tudo</div>
        <h4>Posso e aprendo todos os dias<br />muito mais!</h4>
    </div>
</section>

<!-- Jobs -->
<section id="section-projects">
    <div class="u738">
        <div class="highlight-text">Jobs</div>
    </div>
    <div class="techs">
        <h2>Projetos <strong>&</strong> Trabalhos <span>💸</span></h2>
        <div
            class="jobs-container"
            data-flickity='{ "draggable": true, "cellAlign": "left", "freeScroll": false, "contain": false, "wrapAround": true, "autoPlay": 9000, "pauseAutoPlayOnHover": false }'
        >
            <?php 
                $args = array(
                    'post_type'     =>      'job',
                    'posts_per_page'=>      -1,
                    'post_status'   =>      'publish',
                );
                
                $query = New WP_Query($args);
                
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        get_template_part('inc/loops/jobs');
                    }
                } 
                
                wp_reset_postdata();

            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>