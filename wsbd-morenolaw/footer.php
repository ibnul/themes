<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wsbd-morenolaw
 */
?>
<?php if (isset($_GET['lang'])) { if($_GET['lang'] == 'es') { ?>
   <style type="text/css">
   .subscribe-text { padding-top: 50px; }
   .widget_wysija_cont.php_wysija {
        width: 420px;
    }
   </style>

<?php }
}
?>
	</div><!-- #content -->
	<section id="top-footer1">
		<div class="container">
			<div class="row1">
				<?php if (isset($_GET['lang'])) { if($_GET['lang'] == 'es') { ?>
					<p class="footer-contact">Póngase en contacto con nosotros aquí</p>
				<?php } }else { ?>
					<p class="footer-contact">Please contact us here</p>
				<?php } ?>				
				<a href="mailto:info@morenoimmigration.com" class="email-id">info@morenoimmigration.com</a>
				<ul class="social-list">
 	<li><a target="_blank" href="https://www.facebook.com/Moreno-Law-247372175707774/"><img src="http://morenoimmigration.com/wp-content/uploads/2017/05/facebook-blue.png" alt="Facebook" /></a></li>
 	<li><a target="_blank" href="https://twitter.com/MorenoLaw1"><img src="http://morenoimmigration.com/wp-content/uploads/2017/05/twitter-blue.png" alt="Twitter" /></a></li>
 	<li><a target="_blank" href="https://www.linkedin.com/company/morenolaw/"><img src="http://morenoimmigration.com/wp-content/uploads/2017/05/linkedin-blue.png" alt="LinkedIn" /></a></li>
</ul>
			</div>
		</div>
	</section>
	<section id="top-footer2">
		<div class="container">
			<div class="footer-row">
				<?php if (isset($_GET['lang'])) { if($_GET['lang'] == 'es') { ?>
				<p class="subscribe-text">Suscríbete a nuestro boletín y te mantendremos informado sobre nuestras noticias.</p>
				<?php 
				$widgetNL = new WYSIJA_NL_Widget(true);
				echo $widgetNL->widget(array('form' => 3, 'form_type' => 'php'));
				} }else { ?>
				<p class="subscribe-text">Sign up for our Newsletter and we’ll keep you updated about our news.</p>
				<?php 				
				$widgetNL = new WYSIJA_NL_Widget(true);
				echo $widgetNL->widget(array('form' => 2, 'form_type' => 'php'));
				}
				?>
			</div>
		</div>
	</section>
	<section id="footer">
	  <div class="container">
		<div class="footer-row">
			<div class="footer-logo">
				<ul>
					<li><a href="#"><img src="<?php bloginfo('template_url') ?>/images/footer-logo-1.png" alt="" /></a></li>
					<li><a href="#"><img src="<?php bloginfo('template_url') ?>/images/footer-logo-2.png" alt="" /></a></li>
					<li><a href="#"><img src="<?php bloginfo('template_url') ?>/images/footer-logo-3.png" alt="" /></a></li>
				</ul>
			</div>	
			<div class="col-xs-6 col-sm-4 col-md-4">				
				<?php if ( is_active_sidebar( 'foot1' ) ) : ?>					
				  <?php dynamic_sidebar( 'foot1' ); ?>									
				<?php endif; ?>
			</div>            	
			<div class="col-xs-6 col-sm-4 col-md-4">				
				<?php if ( is_active_sidebar( 'foot2' ) ) : ?>					
				  <?php dynamic_sidebar( 'foot2' ); ?>									
				<?php endif; ?>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4">
				<div class="footer-address">						
				  <?php if ( is_active_sidebar( 'foot3' ) ) : ?>							
					<?php dynamic_sidebar( 'foot3' ); ?>											
				  <?php endif; ?>               	
				</div>
			</div>
			<div class="clearfix"></div>		
			
			<div class="copyright">
			  <?php if (isset($_GET['lang'])) { if($_GET['lang'] == 'es') { ?>
			  	<p>© Todos los Derechos Reservados 2017. Moreno Law. Diseño y Desarrollo de Sitios Web por <a href="http://aknamedia.com/" target="_blank">Akna Media, LLC</a> | <a href="http://morenoimmigration.com/terminos-condiciones/?lang=es">Términos y condiciones</a></p>
			  <?php } }else { ?>
				<p>© All Rights Reserved 2017. Moreno Law. Website Design and Development by <a href="http://aknamedia.com/" target="_blank">Akna Media, LLC</a> | <a href="http://morenoimmigration.com/terms-conditions/">Terms & Conditions</a></p>
			  <?php } ?>
			</div>
        </div>
	  </div>
	<a href="#" class="topbutton"></a>
<div style="display:none;"><p>This site is developed by IBNUL HASAN</p></div>
	</section>	
	
   <script type="text/javascript">
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
var lang = getParameterByName('lang'); 
if ( lang == 'es' )
  document.getElementById('no-spam').innerHTML = 'Nos comprometemos a no enviarle spam.';
else
  document.getElementById('no-spam').innerHTML = 'We promise to never spam you.';
   </script>

<?php wp_footer(); ?>

</body>
</html>