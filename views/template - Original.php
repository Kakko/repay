<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Repay - Reembolsos</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/add_cat.css">
	</head>
	<body>
	<div class="menu">
		<div class="pic_user">
			<img src="<?php echo BASE_URL; ?>assets/images/salazar.jpeg" id="user_pic">
			<img src="<?php echo BASE_URL; ?>assets/images/icons/edit_mini.svg" id="edit_user">
			<div id="user_name">
				<span>Welcome, <br/><p>Qualira Master</p></span>
			</div>
		</div>
		<div class="menu_itens">
			<ul>
				<!-- <li>Filtros</li> -->
				<li>Keywords</li>
				<li style="cursor: pointer"><span id="cat" >Categorias</span><a href="<?php echo BASE_URL; ?>add/categories"><img src="<?php echo BASE_URL; ?>assets/images/icons/add_icon.svg"></a></li>
					<ul class="show_cats close">
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
						<div>Categoria Cadastrada</div>
					</ul>
				<li>Adicionar Usuários</li>
			</ul>
		</div>
	</div>
	<div class="view_area">
		<?php
		$this->loadViewInTemplate($viewName, $viewData);
		?>
	</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/js/menu.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/js/add_cat.js"></script>
</html>