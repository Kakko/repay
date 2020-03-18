<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Repay - Reembolsos</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/menu.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/add_cat.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/modals.css">
	</head>
	<body>
	<div class="menu">
		<div class="menu_itens">
			<ul>
				<li onclick="cad_categories()"><img src="<?php echo BASE_URL; ?>assets/images/icons/categories.svg"></li>
				<li onclick="cad_keywords()"><img src="<?php echo BASE_URL; ?>assets/images/icons/keyword.svg"></li>
				<li onclick="add_users()"><img src="<?php echo BASE_URL; ?>assets/images/icons/add_user.svg"></li>
				<li><a href="#"><img src="<?php echo BASE_URL; ?>assets/images/icons/alerts.svg"></a></li>
			</ul>
		</div>
		<div class="user_info">
		<img src="<?php echo BASE_URL; ?>assets/images/icons/edit_mini.svg" onclick="view_edit_users(<?php echo $_SESSION['lgUser']; ?>)"><span><?php echo $userName; ?></span>
		</div>
		<div class="logout_icon">
			<a href="<?php echo BASE_URL; ?>login/logout"><img src="<?php echo BASE_URL; ?>assets/images/icons/logout.svg"></a>
		</div>
	</div>
	<div class="view_area">
		<?php
		$this->loadViewInTemplate($viewName, $viewData);
		?>
	</div>

	<!-- MODAL -->

	<!-- Modal Add Categories -->
	<div class="modal fade" id="add_category">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<div class="title">
						ADICIONAR CATEGORIAS
					</div>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
					<div class="add_field">
						<div class="form_cat_add">
							<form method="POST">
								<label>Nome:</label>
								<input type="text" id="cat_name" name="cat_name" placeholder="Digite o nome da categoria" required> <img src="<?php echo BASE_URL; ?>assets/images/icons/add_button.svg" id="add_button" onclick="submit_cat()">
							</form>
						</div>
						<div class="cat_show">

						</div>
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<!-- <button type="button" class="btn btn-success" onclick="cadCompanyWinner()" data-dismiss="modal">Salvar</button> -->
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL ADD KEYWORDS -->
	<div class="modal fade" id="add_keyword">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<div class="title">
						CRIAR KEYWORDS
					</div>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
					<div class="add_field">
						<div class="form_cat_add">
							<form method="POST">
								<label>Nova Keyword:</label>
								<input type="text" name="key_name" id="key_name"> 
								<label style="margin-left: 5%"> Vincular à categoria</label>
								<select name="cat_select" class="cat_select" id="list_cats">
									<option value="">Selecione...</option>
									
								</select>
								<img src="<?php echo BASE_URL; ?>assets/images/icons/add_button.svg" id="add_button" onclick="add_keyword()">
							</form>
						</div>
						<div class="key_show">
							
						</div>
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<!-- <button type="button" class="btn btn-success" onclick="cadCompanyWinner()" data-dismiss="modal">Salvar</button> -->
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL ADD USERS -->
	<div class="modal fade" id="add_users">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<div class="title">
						ADICIONAR USUÁRIOS
					</div>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<form method="POST">
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm">
									<label>Nome:</label>
									<input type="text" name="add_user_name" id="add_user_name">
								</div>
								<div class="col-sm">
									<label>E-Mail:</label>
									<input type="mail" name="add_user_email" id="add_user_email">
								</div>
								<div class="col-sm">
									<label>Password:</label>
									<input type="password" name="add_user_password" id="add_user_password">
								</div>
								<div class="col-sm">
									<label>Tipo:</label>
									<select name="add_user_type" class="add_user_select" id="add_user_type">
										<option value="int">Interno</option>
										<option value="admin">Administrador</option>
									</select>
								</div>
							</div>
							<br/><hr/>
							<div class="row">
								<div class="col-sm" id="user_list">
								
								</div>
							</div>
						</div>
					</div>
					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-success" onclick="add_new_user()" data-dismiss="modal">Salvar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- MODAL EDIT USER -->
	<div class="modal fade" id="edit_user">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<div class="title">
						EDITAR USUÁRIO
					</div>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<form method="POST">
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm">
									<label>Nome:</label>
									<input type="text" name="user_name" id="user_name" value="">
								</div>
								<div class="col-sm">
									<label>E-Mail:</label>
									<input type="mail" name="user_email" id="user_email">
								</div>
								<div class="col-sm">
									<label>Password:</label>
									<input type="password" name="user_password" id="user_password">
								</div>
							</div>
						</div>
					</div>
					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-success" onclick="send_edited_user(<?php echo $_SESSION['lgUser']; ?>)" data-dismiss="modal">Salvar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</body>
	<script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/js/refund_list.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/js/categories.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/js/keywords.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/js/users.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/js/alerts.js"></script>
</html>
