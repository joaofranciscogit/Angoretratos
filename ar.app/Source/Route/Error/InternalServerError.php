<?php

	require_once './Source/Config/Class.php';

	define('DATA',
	[
		'ACCESS'	=> 'PUBLIC',
		'MASTER'	=> false,
		'SESSION'	=> null,
		'MODULE'	=> null,
		'TITLE'		=> 'Angoretratos | Página Não Encontrada',
		'META'		=> null
	]);

	$useAuth->dataAuth(DATA);

	require_once HTML.'Page/Page.php';
	require_once HTML.'Header/Header.php';

?>
    <h1>Aconteceu um Problema</h1>
<?php

	require_once HTML.'Footer/Footer.php';
	require_once HTML.'Page/PageEnd.php';

?>