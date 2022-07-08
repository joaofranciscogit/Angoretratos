insert into account(
	account_code,
	account_name,
	account_email,
	account_passwd,
	account_master,
	account_access
)
values
	('0000', 'Conta Ilimitada',	'contailimitada@email.pgo', 'master', true, true),
    ('0001', 'Conta Limitada',	'contalimitada@email.pgo', 	'normal', false, false);