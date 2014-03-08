<?php
/*
  Template Name: Blogliste sorteret alfabetisk
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
                    <div class="clearfix bloglist">
                    	<?php // fetch blogs from autoblogs-table.
                    	global $wpdb;

                    	$table = $wpdb->prefix . 'autoblog';
                    	$rows = $wpdb->get_col( $wpdb->prepare( "SELECT feed_meta FROM {$table}", null ), 0 );
                        $other = $a = $b = $c = $d = $e = $f = $g = $h = $i = $j = $k = $l = $m = $n = $o = $p = $q = $r = $s = $t = $u = $v = $w = $x = $y = $z = array();

                    	foreach ($rows as $blog) {
                    		$blog = unserialize($blog);
                            $name = trim( $blog['bloginfo']['name'], ' \t\n\r\0\x0B"*\'-' ); // trim chars from names to fix sorting
                            $link = $blog['bloginfo']['link'];

                            switch ( substr(ucfirst($name), 0, 1) ) {
                                case 'A':
                                    $a[$name] = $link;
                                    break;
                                case 'B':
                                    $b[$name] = $link;
                                    break;
                                case 'C':
                                    $c[$name] = $link;
                                    break;
                                case 'D':
                                    $d[$name] = $link;
                                    break;
                                case 'E':
                                    $e[$name] = $link;
                                    break;
                                case 'F':
                                    $f[$name] = $link;
                                    break;
                                case 'G':
                                    $g[$name] = $link;
                                    break;
                                case 'H':
                                    $h[$name] = $link;
                                    break;
                                case 'I':
                                    $i[$name] = $link;
                                    break;
                                case 'J':
                                    $j[$name] = $link;
                                    break;
                                case 'K':
                                    $k[$name] = $link;
                                    break;
                                case 'L':
                                    $l[$name] = $link;
                                    break;
                                case 'M':
                                    $m[$name] = $link;
                                    break;
                                case 'N':
                                    $n[$name] = $link;
                                    break;
                                case 'O':
                                    $o[$name] = $link;
                                    break;
                                case 'P':
                                    $p[$name] = $link;
                                    break;
                                case 'Q':
                                    $q[$name] = $link;
                                    break;
                                case 'R':
                                    $r[$name] = $link;
                                    break;
                                case 'S':
                                    $s[$name] = $link;
                                    break;
                                case 'T':
                                    $t[$name] = $link;
                                    break;
                                case 'U':
                                    $u[$name] = $link;
                                    break;
                                case 'V':
                                    $v[$name] = $link;
                                    break;
                                case 'W':
                                    $w[$name] = $link;
                                    break;
                                case 'X':
                                    $x[$name] = $link;
                                    break;
                                case 'Y':
                                    $y[$name] = $link;
                                    break;
                                case 'Z':
                                    $z[$name] = $link;
                                    break;
                                default:
                                    $other[$name] = $link;
                                    break;
                            }
                    	}

                        ?>

                        <h3>#</h3>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($other as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($a) ) print "<h3>A</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($a as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($b) ) print "<h3>B</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($b as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($c) ) print "<h3>C</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($c as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($d) ) print "<h3>D</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($d as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($e) ) print "<h3>E</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($e as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($f) ) print "<h3>F</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($f as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($g) ) print "<h3>G</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($g as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($h) ) print "<h3>H</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($h as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($i) ) print "<h3>I</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($i as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($j) ) print "<h3>J</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($j as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($k) ) print "<h3>K</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($k as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($l) ) print "<h3>L</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($l as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($m) ) print "<h3>M</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($m as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($n) ) print "<h3>N</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($n as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($o) ) print "<h3>O</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($o as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($p) ) print "<h3>P</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($p as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($q) ) print "<h3>Q</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($q as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($r) ) print "<h3>R</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($r as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>
                        
                        <?php if ( !empty($s) ) print "<h3>S</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($s as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($t) ) print "<h3>T</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($t as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($u) ) print "<h3>U</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($u as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($v) ) print "<h3>V</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($v as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($w) ) print "<h3>W</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($w as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($x) ) print "<h3>X</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($x as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($y) ) print "<h3>Y</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($y as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                        <?php if ( !empty($z) ) print "<h3>Z</h3>" ?>
                        <ul class="list-bloglinks unstyled">
                            <?php foreach ($z as $name => $link) printf('<li><a class="bloglist-link" href="%s">%s</a></li>', $link, $name); ?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

<?php get_sidebar('secondary'); ?>
<?php get_footer(); ?>