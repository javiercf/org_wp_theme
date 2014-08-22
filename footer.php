<footer id="contacto" class="sticky-footer trans">
	<header>
		<div class="container-full">
			<div class="span2"><h5>Encuentranos</h5></div>
			<div class="span1"><h5>Contactanos</h5></div>
		</div>
	</header>
	<div class="grey-section">
		<div class="container-full">
			<div class="span2">
				<div class="row">
					<div class="half">
						<div id="map-canvas"></div>
					</div>
				<div class="half">
					<div class="contact-info">
						<p><strong>Direccion  / </strong> <span>Carrera. 9 No. 113 - 52 
                     Oficina 1901</span></p>
					<p><strong>Telefonos  / </strong>  <span>(+57) 4 86 33 99 <br>	
                   (+57) 300 203 36 20 <br>
                   (+57) 313 8 59 90 03</span></p>
					<p><strong>Email  / </strong> <span>comercial@organica.com.co <br>
              operativo@organica.com.co <br>
              contacto@organica.com.co</span></p>
					<div class="no-sho">
						<p><strong>www.organicasas.com</strong></p>
						<p><strong>Bogotá, Colombia</strong></p>
					</div>
					</div>
				</div>
				</div>
			</div>
			<div class="span1">
			<header class="small-header">
				<h5>Contactanos</h5>
			</header>
				<div class="row">
					<form id="contactForm" method="POST" action=".">
					<div class="form_result">
						<?php if(isset($emailSent) && $emailSent == true) { ?>
							<div class="thanks">
								<p>Gracias! su mensaje ha sido enviado</p>
							</div>
						<?php } ?>
					</div>
					<input type="text" name="name" id="name" placeholder="Nombre">
					<input type="text" name="email" id="email" placeholder="Email">
					<input type="text" name="tel" id="tel" placeholder="Telefono">
					<textarea name="mensaje" id="mensaje" placeholder="Comentarios"></textarea>
					<button type="submit">Enviar &gt;</button>
					<input type="hidden" name="submitted" id="submitted" value="true" />
				</form>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container">
			<p>All works &copy; ORGANICA S.A.S. 2014 Please do not reproduce without the expressed written consent of ORGANICA S.A.S. 2014</p>
		</div>
	</div>
</footer>
<?php wp_footer() ?>
</body>
</html>