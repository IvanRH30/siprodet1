<?= $this->extend('Master/MasterPage'); ?>
<?= $this->section('Title') ?>Iniciar sesión<?= $this->endSection() ?>
<?= $this->section('MainContent'); ?>
	<!-- Main Content -->
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><h2><span class="gobmxfont icon-user"></span></h2></span>
				<h4 class="company_title">PROFEDET</h4>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						<h2>Iniciar Sesión</h2>
					</div>
					<div class="row">
						<form id="formLogin" method="POST"style="width:100%" class="form-group">
							<div class="row">
								<input type="text" name="username" id="username" class="form__input" placeholder="Correo">
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="password" id="password" class="form__input" placeholder="Contraseña">
							</div>
							<div class="row d-flex justify-content-center">
                                <button type="submit" value="Submit" class="btn" style="width: max-content;">Enviar</button>
							</div>
						</form>
					</div>
					<div class="row">
						<p>No tienes una cuenta? <a href="<?= base_url() ?>RegistrarUsuario">Registrarme</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="<?= base_url()?>/assets/js/functions_login.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>
