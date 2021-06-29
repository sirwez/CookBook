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
						<p class="lead text-muted">Receitas para alegrar seu dia.</p> <a href="#register" class="card" class="a" text-decoration: none> Quer registrar uma receita? Clique aqui.</a> </div>
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
													<button type="button" class="btn btn-sm btn-outline-secondary"><a href="?update=<?php echo $valor->id;?>">Edit</a></button>
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
		<section id="register" class="py-5 container ">
			<div class="p-3 mb-2 bg-dark text-white">
				<div class="row py-lg-5 ">
					<div class="col-lg-6 col-md-8 mx-auto">
						<h1 class="fw-light text-center"> Compartilhe sua receita com a gente ;)</h1>
						<br>
						<form method="POST">
							<div class="input-field col s12">
								<label for="nome" class="text-left">Nome da Receita</label>
								<input type="text" class="form-control" id="nome" name="nome" placeholder="Tofu com Abacaxi"> </div>
							<br>
							<div class="form-group">
								<label for="description">Descreva sua Receita</label>
								<input maxlength="255" type="text" class="form-control" id="description" name="description" placeholder="Receita muito gostosa e 100% original, tofuuuuuuu">
								<p class="fs-6 fw-light">No Máximo 255 caracteres viu :P</p>
							</div>
							<br>
							<div class="form-group">
								<label for="ingredientes">Ingredientes</label>
								<input type="text" class="form-control" id="ingredientes" name="ingredientes" placeholder="Tofu, Abacaxi, e o elemento X"> </div>
							<br>
							<div class="form-group">
								<label for="description">De 0 a 10, qual a Dificuldade?</label>
								<input class="form-control mb-2" type="number" id="dificuldade" name="dificuldade" min="0" max="10" placeholder="10">
								<br>
								<div class="form-group">
									<label for="url">Link para o passo a passo da Receita</label>
									<input type="text" class="form-control" id="url" name="url" placeholder="www.youtube.com/watch?v=C9PL0ZB65jY"> </div>
								<br>
								<div class="form-group">
									<label class="sr-only" for="inlineFormInputGroup">Foto da sua Receita</label>
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">i.imgur.com/</div>
										</div>
										<input type="text" class="form-control" id="urlImage" name="urlImage" placeholder="SAdas.jpeg"> </div>
								</div>
								<br>
								<div class="container">
									<div class="row">
										<div class="col text-center">
											<button type="submit" name="button" value="cadastrar" class="btn  btn-success"> Cadastrar </button>
										</div>
									</div>
								</div>
						</form>
						</div>
					</div>
				</div>
			</div>
			</div>
			</div>
		</section>
		<section id="?update=<?php echo $idUp;?>" class="py-5 container">
			<div class="p-3 mb-2 bg-secondary text-white">
				<?php 
     $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
     $var = parse_url($url, PHP_URL_QUERY);
     $id = str_replace('update=', '', $var);

     global $wpdb;

     $SQL = 'SELECT * FROM  wp_recipes WHERE id ='. $id;
    $result = $wpdb->get_results($SQL);
	$id = null;
	foreach ($result as $value) {
		$id = $value->id;
	}
?>
					<div class="row py-lg-5">
						<div class="col-lg-6 col-md-8 mx-auto">
							<h1 class="fw-light text-center">Vamos lá, altere sua receita :D</h1>
							<br>
							<form method="POST">
								<div class="input-field col s12">
									<label for="nome" class="text-left">Mudou de idéia do nome? Mude aqui.</label>
									<input type="text" class="form-control" id="nome" name="nome" placeholder="Tofu com Abacaxi"> </div>
								<br>
								<div class="form-group">
									<label for="description">Oops. Vamos descrever novamente?</label>
									<input maxlength="255" type="text" class="form-control" id="description" name="description" placeholder="Receita muito gostosa e 100% original, tofuuuuuuu"> </div>
								<br>
								<div class="form-group">
									<label for="ingredientes">Errou os ingredientes? Mude aqui.</label>
									<input type="text" class="form-control" id="ingredientes" name="ingredientes" placeholder="Tofu, Abacaxi, e o elemento X"> </div>
								<br>
								<div class="form-group">
									<label for="description">Reavaliar Receita</label>
									<input class="form-control mb-2" type="number" id="dificuldade" name="dificuldade" min="0" max="10" placeholder="10">
									<br>
									<div class="form-group">
										<label for="url">url errada ou saiu do ar? troque aqui.</label>
										<input type="text" class="form-control" id="url" name="url" placeholder="www.youtube.com/watch?v=C9PL0ZB65jY"> </div>
									<br>
									<div class="form-group">
										<label class="sr-only" for="inlineFormInputGroup">Nova foto da Receita</label>
										<div class="input-group mb-2">
											<div class="input-group-prepend">
												<div class="input-group-text">i.imgur.com/</div>
											</div>
											<input type="text" class="form-control" id="urlImage" name="urlImage" placeholder="SAdas.jpeg"> </div>
									</div>
									<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id?>"></input>
									<br>
									<div class="container">
										<div class="row">
											<div class="col text-center">
												<button type="submit" name="update" value="update" class="btn  btn-success"> Alterar </button>
											</div>
										</div>
									</div>
							</form>
							</div>
						</div>
					</div>
		</section>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
