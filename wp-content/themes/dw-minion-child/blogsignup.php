<?php
/*
  Template Name: Tilmeld Blog-formular
 */
?>
<?php get_header(); ?>

        <div id="primary" class="content-area">
            <div class="primary-inner">
                <div id="content" class="site-content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', 'page' ); ?>

                    <?php if ( comments_open() ) comments_template(); ?>

                <?php endwhile; ?>
                    <div class="clearfix blogsignup">

                        <p>Når du tilmelder dig, bliver du en del af Danmarks største blognetværk. Du kan altid framelde din blog igen senere.</p>

                    	<form action="" method="post">
                            <fieldset>
                                <input name="fullname" type="text" placeholder="Dit navn">
                                <input name="email" type="text" placeholder="E-mail">

                                <textarea name="descPersonal" rows="3" placeholder="Beskrivelse af dig selv"></textarea>

                                <input name="blogname" type="text" placeholder="Blognavn">
                                <input name="bloglink" type="text" placeholder="Link til bloggen">
                                
                                <select name="category">
                                    <option>Vælg kategori</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>

                                <textarea name="descBlog" rows="3" placeholder="Beskrivelse af din blog"></textarea>
                            </fieldset>

                            <fieldset>
                                <label class="checkbox">
                                    <input name="agreement" type="checkbox" value="agreement"> Jeg accepterer Jegelskermode.dk's betingelser
                                </label>
                            </fieldset>

                            <fieldset>
                                <button type="submit" class="btn btn-large btn-submit pull-right">Tilmeld Blog</button>
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>

<?php get_sidebar('secondary'); ?>
<?php get_footer(); ?>