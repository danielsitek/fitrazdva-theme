</div></div></div></section>
<footer class="page-footer">
    <div class="page-footer-main color-white">
        <div class="page-width-content">
            <div class="row">
                <div class="column small-12 medium-6 large-7 small-text-small">
                    <header class="footer-header">
                        <strong class="h4 text-shadow">Rychlé odkazy</strong>
                    </header>

                    <div class="row">
                        <div class="column small-12 medium-6">

                            <div id="foter_links" class="nav-footer-links">
                                <ul>
                                    <li>
                                        <a href="/" class="active">Úvod</a>
                                    </li>
                                    <li>
                                        <a href="/sluzby">Služby</a>
                                    </li>
                                    <li>
                                        <a href="/cenik">Ceník</a>
                                    </li>
                                    <li>
                                        <a href="/kontakt/praha">Pobočka Praha</a>
                                    </li>
                                    <li>
                                        <a href="/kontakt/ostrava">Pobočka Ostrava</a>
                                    </li>
                                    <li>
                                        <a href="/kontakt/brno">Pobočka Brno</a>
                                    </li>
                                    <li>
                                        <a href="/obchodni-podminky">Obchodní podmínky</a>
                                    </li>
                                    <li>
                                        <a href="/obchodni-podminky#udaje-o-provozovateli">Údaje o provozovateli</a>
                                    </li>
                                    <li>
                                        <a href="/sluzby/hubnuti-a-celulitida">Hubnutí a celulitida</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="column small-12 medium-6">

                            <div id="foter_links" class="nav-footer-links">
                                <ul>
                                    <li>
                                        <a href="/sluzby/plasmove-toky">Vrásky, jizvy, akné a&nbsp;strie</a>
                                    </li>
                                    <li>
                                        <a href="/sluzby/facelifting-masky">Facelifting a&nbsp;masky</a>
                                    </li>
                                    <li>
                                        <a href="/sluzby/zvetseni-zpevneni-poprsi">Zvětšení a&nbsp;zpevnění poprsí</a>
                                    </li>
                                    <li>
                                        <a href="/sluzby/lymfodrenaz-s-infrasaunou">Lymfodrenáže s&nbsp;infrasaunou</a>
                                    </li>
                                    <li>
                                        <a href="/sluzby/masaze">Masáže</a>
                                    </li>
                                    <li>
                                        <a href="/sluzby/dentalni-sperk-swarovski">Dentální šperk SWAROVSKI</a>
                                    </li>
                                    <li>
                                        <a href="/sluzby/vyhodne-balicky">Balíčky</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <?php do_action( 'foundationpress_before_footer' ); ?>
					<?php dynamic_sidebar( 'footer-widgets-left' ); ?>
					<?php do_action( 'foundationpress_after_footer' ); ?>
				</div>
				<div class="column small-12 medium-6 large-5 small-text-small">

					<div class="map-pobocky">
						<a href="/kontakt/praha" class="map-pobocky-pin pin-praha" title="Naše pobočka v Praze">&nbsp;</a>
						<a href="/kontakt/ostrava" class="map-pobocky-pin pin-ostrava" title="Naše pobočka v Ostravě">&nbsp;</a>
						<a href="/kontakt/brno" class="map-pobocky-pin pin-brno" title="Naše pobočka v Brně">&nbsp;</a>
					</div>

					<header class="footer-header">
						<strong class="h4 text-shadow">Kontaktní informace</strong>
					</header>

					<address itemscope="" itemtype="http://schema.org/LocalBusiness">
						<p>
							<span>tel.:</span> <span itemprop="telephone">+420 739 567 112</span><br>
							<span>email:</span> <span><a href="mailto:bud@fitrazdva.cz" itemprop="email">bud@fitrazdva.cz</a></span><a href="mailto:bud@fitrazdva.cz" itemprop="email">
							<br class="clear">
							</a><a href="http://www.fitrazdva.cz" itemprop="url">www.fitrazdva.cz</a>
						</p>
						<p>
							<strong>Studio Fit Raz Dva Praha</strong><br>
							<span>ulice Chlumova 223/25, 130 00 Praha 3 Žižkov</span>
						</p>
						<p>
							<strong>Studio Fit Raz Dva Ostrava</strong><br>
							<span>ulice Špálova 145/20, 702 00 Ostrava</span>
						</p>
						<p>
							<strong>Studio Fit Raz Dva Brno</strong><br>
							<span>ulice Kovářská 720/12, Brno - jih, 602 00</span>
						</p>
					</address>

					<?php do_action( 'foundationpress_before_footer' ); ?>
					<?php dynamic_sidebar( 'footer-widgets-right' ); ?>
					<?php do_action( 'foundationpress_after_footer' ); ?>

				</div>
			</div>
		</div>
	</div>
	<div class="page-footer-signature">
		<div class="page-width-content">
			<div class="row">
				<div class="column small-12">
					<div class="small-float-center medium-float-left text-center medium-text-left small-text-small">
						<span>&copy; <time datetime="<?php echo date( 'Y' );?>" itemprop="copyrightYear"><?php echo date( 'Y' );?></time>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.fitrazdva.cz" >www.fitrazdva.cz</a></span>
					</div>
					<div class="small-float-center medium-float-right text-center medium-text-right small-text-small">
						<span class="align-right" itemprop="creator" itemscope itemtype="http://schema.org/Person">
							Design &amp; Code by
							<span itemprop="contactPoint">
							<span itemprop="name">Daniel Sitek</span>
							|
							<a href="http://danielsitek.cz" title="Tvořím moderní Webové stránky | UI design | Grafika | Vizitky | Logo Design" itemprop="url">danielsitek.cz</a>
							</span>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php
if ( WP_DEVELOP ) {
?>
<script src="http://localhost:13702/livereload.js?snipver=1"></script>
<?php
};
?>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
  WebFont.load({
    google: {
      families: ['Ubuntu:400,700,400italic,700italic&subset=latin,latin-ext']
    }
  });
</script>

<?php

do_action( 'foundationpress_layout_end' );

dynamic_sidebar( 'scripts_body_end' );

wp_footer();

do_action( 'foundationpress_before_closing_body' );

?>
</body>
</html>
