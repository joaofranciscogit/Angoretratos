<?php

	require_once './Source/Config/Class.php';

	define('DATA',
	[

		'ACCESS'	=> 'PUBLIC',
		'MODULE'	=> null,
		'AUTH'		=> false,
		'TITLE'		=> 'Angoretratos | Página Inicial',
		'META'		=> 
		[
			'INDEX'         => true,
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

<?php

	require_once HTML.'Footer/Footer.php';
	require_once HTML.'Page/PageEnd.php';

?>