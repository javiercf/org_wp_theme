<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['name']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['name']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	$tel = trim($_POST['tel']);

	if(trim($_POST['mensaje']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['mensaje']));
		} else {
			$comments = trim($_POST['mensaje']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = 'Mensaje de  contacto de '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nTelefono: $tel \n\nMensaje: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

} ?>
<?php get_header() ?>

<div class="hero">
	<div class="hero-slide active">
		<img src="<?php echo get_template_directory_uri() ?>/img/edificios.jpg" alt="">
	</div>
	<div class="hero-slide">
		<img src="<?php echo get_template_directory_uri() ?>/img/plaza.jpg" alt="">
	</div>
	<div class="hero-slide">
		<img src="<?php echo get_template_directory_uri() ?>/img/terrazas-verdes.jpg" alt="">
	</div>
	<div class="container">
		<div class="hero-box">
			<h2>SOLUCIONES INNOVADORAS</h2>
			<h3>A problemáticas ambientales pensando en un futuro sostenible</h3>
			<a class="arrows-prev" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="arrows" width="40" height="40" viewBox="0 0 40 40"><path fill-rule="evenodd" clip-rule="evenodd" fill="#fff" d="M8.938 20.536l22.124-19.353-11.976 19.353 11.976 18.281-22.124-18.281z"/></svg></a>
		    <a class="arrows-next" href="#"><svg class="arrows" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"><path fill-rule="evenodd" clip-rule="evenodd" fill="#fff" d="M31.062 19.464l-22.124 19.353 11.976-19.354-11.976-18.28 22.124 18.281z"/></svg></a>
		</div>
    </div>
</div>

<section id="quienes-somos" class="white-section">
	<div class="container">
		<article>
			<header>
				<h1>QUIENES SOMOS</h1>
				<h2>ORGÁNICA S.A.S.</h2>
			</header>
			<p>
				<strong>ORGÁNICA</strong> somos una empresa de ingenieria que trabaja buscando <em>soluciones</em> a las problemáticas ambientales actuales a través de <em>alternativas innovadoras</em> diseñadas según las necesidades de nuestros clientes que previenen y minimizan los <em>efectos ambientales</em> negativos generados en el desarrollo de sus proyectos, obras y actividades. 
			</p>
		</article>
	</div>
</section>
<section id="lineas-de-trabajo" class="grey-section">
	<div class="outer-container">
	<a href="#" class="jcarousel-prev">
		<svg xmlns="http://www.w3.org/2000/svg" class="arrows" width="40" height="40" viewBox="0 0 40 40"><path fill-rule="evenodd" clip-rule="evenodd" fill="#666" d="M8.938 20.536l22.124-19.353-11.976 19.353 11.976 18.281-22.124-18.281z"/></svg>
	</a>
	<a href="#" class="jcarousel-next">
		<svg class="arrows" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"><path fill-rule="evenodd" clip-rule="evenodd" fill="#666" d="M31.062 19.464l-22.124 19.353 11.976-19.354-11.976-18.28 22.124 18.281z"/></svg>
	</a>
		<article class="container">
			<header>
				<h1>Lineas de Trabajo</h1>
				<h3>Nuestras líneas especializadas de trabajo</h3>
			</header>
			<div class="carousel work-carousel">
				<div class="carousel-wrap">
					 <?php
				        $args = array( 'post_type' => 'lineas_de_trabajo', 'posts_per_page' => 0, 'order' => 'ASC' );
				        $lineloop = new WP_Query( $args );
				        $count = 1;
				        $column_count = 0;
				        $count_posts = wp_count_posts('lineas_de_trabajo')->publish;
				        while ( $lineloop->have_posts() ) : $lineloop->the_post();
				        if ($count === 1){
				        	echo '<div class="container carousel-item">';
				        }
				        ?>
						
				        <div class="column-<?php echo get_post_meta( get_the_ID(), 'columna', true ); ?> item">
				        	<h1><?php the_title() ?></h1>
				            <div class="item-wrap">
				            	<div class="img-container">
					            	<?php if ( has_post_thumbnail() ) {
				                        the_post_thumbnail('full');
					                    } ?>
						            </div>
				                    <div class="content-container">
				                    	<div class="content">
					                    	<?php the_content() ?>
					                    </div>
				                    </div>
				            </div>
		                </div>
		                <?php
		                $column_count +=  get_post_meta( get_the_ID(), 'columna', true );
		                $count++;

		                if ($column_count % 3 === 0 && $count < $count_posts ){
		                	echo '</div><div class="container carousel-item">';
		                }

		                if ($count === $count_posts){
		                	echo '</div>';
		                }
		                ?>
		            <?php endwhile; ?>
				</div>
			</div>
		</article>
	</div>
</section>
<section id="noticias">
	<div class="container">
		<div class="column-full">
			<h1>ECO-NOTICIAS</h1>
			<div class="in-column-5">
				<img src="<?php echo get_template_directory_uri() ?>/img/eco-noticias.jpg" alt="">
			</div>
			<div class="in-column-7">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="content">
					<h4><?php the_title() ?></h4>
					<?php the_excerpt() ?>
				</div>
				<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<section id="nuestros-clientes" class="grey-section">
	<div class="outer-container">
	<a href="#" class="jcarousel-prev-1">
	<svg xmlns="http://www.w3.org/2000/svg" class="arrows" width="40" height="40" viewBox="0 0 40 40"><path fill-rule="evenodd" clip-rule="evenodd" fill="#666" d="M8.938 20.536l22.124-19.353-11.976 19.353 11.976 18.281-22.124-18.281z"/></svg>
</a>
<a href="#" class="jcarousel-next-1">
	<svg class="arrows" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"><path fill-rule="evenodd" clip-rule="evenodd" fill="#666" d="M31.062 19.464l-22.124 19.353 11.976-19.354-11.976-18.28 22.124 18.281z"/></svg>
</a>
		<div class="container">
			<header>
				<h1>Nuestros Clientes</h1>
				<h3>Este es el listado de nuestros clientes más recientes.</h3>
			</header>
			<div class="carousel client-carousel">
				<div class="carousel-wrap">
					 	<?php
				        $args = array( 'post_type' => 'clientes', 'posts_per_page' => 0, 'order' => 'ASC' );
				        $clientloop = new WP_Query( $args );
				        while ( $clientloop->have_posts() ) : $clientloop->the_post();
				        ?>
						
				        <div class="carousel-item">
				        	
				            <div class="client-logo">
				            	<?php if ( has_post_thumbnail() ) {
		                        the_post_thumbnail('full');
			                    } ?>
				            </div>
		                    <h1><?php the_title() ?></h1>
		                    	<?php the_content() ?>
		                </div>

		            <?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer() ?>