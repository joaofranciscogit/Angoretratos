<?php

	require_once './Source/Config/Class.php';

	define('DATA',
	[

		'ACCESS'	=> 'PUBLIC',
		'MODULE'	=> null,
		'AUTH'		=> false,
		'META'		=> 
		[
            'INDEX'         => false,
			'TITLE'			=> 'Angoretratos | Login',
			'DESCRIPTION'	=> null,
			'KEYWORDS'		=> null,
			'IMAGE'			=> null,
			'AUTHOR'		=> PROJECT['AUTHOR']
		]
	]);

	$useAuth->dataAuth(DATA);

	require_once HTML.'Page/Page.php';
	require_once HTML.'Header/Header.php';

?>

<section class="container pt-5 mt-2 mb-2">

	<div class="row g-4 g-lg-0 align-items-center">

		<div class="col-md-6 align-items-center text-center">
			
			<img class="d-none d-lg-block" src="<?php echo ASSET; ?>element/Login-rafiki.svg" class="h-400px" alt="">

		</div>

		<div class="col-md-6">
						
			<div class="col-sm-10 col-xl-8 m-auto">
					
				<h6 class="card-title mb-2">Fazer Autenticação</h6>
				<p class="lead mb-4">Apenas Utilizador Autorizado.</p>

				<form>

					<div class="mb-4">
						<label for="exampleInputEmail1" class="form-label">Email de Utilizador *</label>
						<div class="input-group input-group-lg">
							<span class="input-group-text bg-primary rounded-start border-0 px-3"><i class="text-white bi bi-file-person-fill"></i></span>
							<input type="email" class="form-control border bg-light rounded-end ps-1" placeholder="E-mail" id="loginEmail">
						</div>
					</div>

					<div class="mb-4">
						<label for="inputPassword5" class="form-label">Senha de Acesso *</label>
						<div class="input-group input-group-lg">
							<span class="input-group-text bg-primary rounded-start border-0 px-3"><i class="text-white bx bx-lock"></i></span>
							<input type="password" class="form-control border bg-light rounded-end ps-1" placeholder="Senha" id="loginPassword">
						</div>
					</div>
						
					<div class="mb-4 d-flex justify-content-between mb-4">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Lembrar-me</label>
						</div>
						<div class="text-primary-hover">
							<a href="#" class="text-black">
								<u>Perdi a Senha</u>
							</a>
						</div>
					</div>
						
					<div class="align-items-center mt-0">
						<div class="d-grid">
							<button id="sessionLogin" class="btn btn-primary mb-0" type="button">Entrar</button>
						</div>
					</div>
					
				</form>

				<?php #require_once './element/javascript/session/SessionLoginElement.php'; ?>

				<div class="mt-4 text-center">
					<span>Voltar? <a href="<?php echo BASE; ?>" class="mx-3"> Pagina Inicial</a></span>
				</div>
			</div>

		</div>
				
	</div>

</section>

<?php

	require_once HTML.'Footer/Footer.php';
	require_once HTML.'Page/PageEnd.php';

?>