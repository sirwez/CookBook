<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.84.0">
	<title>Cookbook</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Bootstrap core CSS -->
	<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
	a {
		color: #000000;
		text-decoration: none;
	}
	
	a:hover {
		color: #00A0C6;
		text-decoration: none;
		cursor: pointer;
	}
	
	.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
		-webkit-user-select: none;
		-moz-user-select: none;
		user-select: none;
	}
	
	@media (min-width: 768px) {
		.bd-placeholder-img-lg {
			font-size: 3.5rem;
		}
	}
	</style>
</head>

<body>
	<header>
		<main id="cards">
			<section class="py-5 text-center container">
				<div class="row py-lg-5">
					<div class="col-lg-6 col-md-8 mx-auto">
						<h1 class="fw-light"><img src="https://img.icons8.com/ios-filled/50/000000/cookbook.png"/>CookBook For Fun </h1>
						<p class="lead text-muted">Receitas para alegrar seu dia.</p> <a href="http://localhost/sic-control/index.php/register/" class="card" class="a" text-decoration: none> Quer registrar uma receita? Clique aqui.</a> </div>
				</div>
			</section>
			<div class="album py-2 bg-light">
				<div class="container">
					<div class="row row-cols-1 row-cols-sm-2 row-cols-md-22 g-2">
						<?php
				global $wpdb;
				$resultado = $wpdb->get_results('SELECT * FROM  wp_recipes');
        
				      ?>
							<?php 
						foreach($resultado as $valor):
				?>
								<div class="col">
									<div class="card h-100 shadow-sm "> <img src="https://i.imgur.com/<?php echo $valor->urlImage;?>" class="align-items-center img-thumbnail" height="500" alt="...">
										<div class="card-body">
											<h4 class="fw-bold mb-0 text-center"><?php echo $valor->nome; ?></h4>
											<br>
											<p class="card-text text-center">&nbsp &nbsp
												<?php echo $valor->description;?>
											</p>
											<div class="text-center"><a href="<?php echo $valor->url;?>" target="_blank" rel="noopener noreferrer">Confira a receita clicando aqui.</a> </div>
											<br>
											<p class="text-uppercase fw-lighter">Ingredientes:
												<?php echo $valor->ingredientes; ?>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="btn-group">
													<button type="button" class="btn btn-sm btn-outline-secondary"><a href="http://localhost/sic-control/index.php/update?id=<?php echo $valor->id;?>">Edit</a></button>
													<button type="button" class="btn btn-sm btn-outline-danger"><a href="?delete=<?php echo $valor->id;?>">delete</a></button>
												</div> <small class="text-muted">Dificuldade: <?php echo $valor->dificuldade; ?></small> </div>
										</div>
									</div>
								</div>
								<?php endforeach;?>
					</div>
				</div>
			</div>
		</main>
		<br>
		<br>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>