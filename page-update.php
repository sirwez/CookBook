

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.84.0">
	<title>Cookbook - Update</title>
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
		<section id="?update=<?php echo $idUp;?>" class="py-5 container">
			<div class="p-3 mb-2 bg-secondary text-white">
				<?php 
     $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

     $var = parse_url($url, PHP_URL_QUERY);
     $id = str_replace('id=', '', $var);
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