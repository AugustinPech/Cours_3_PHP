<?php
header('HTTP/1.0 404 Not Found');
$metatitle='404 Error - Not Found';
$metadescription= 'La page demandée n existe pas';
include '../ressources/views/layouts/head.php';
include '../ressources/views/layouts/header.php';
?>
<section class="page_404">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 ">
				<div class="col-sm-10 col-sm-offset-1  text-center">
					<div class="four_zero_four_bg">
						<h1 class="text-center ">404</h1>
					</div>
					<div class="contant_box_404">
						<h3 class="h2">
							Look like you're lost
						</h3>

						<p>the page you are looking for not avaible!</p>

						<a href="/index.php?page=CV" class="link_404">Go to Home</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
include '../ressources/views/layouts/footer.php';
?>