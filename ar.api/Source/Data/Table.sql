insert into account(
	account_code,
	account_name,
	account_email,
	account_pass,
	account_master,
	account_access
)
values
	('0000', 'Conta Ilimitada',	'master@master.email', 'master', true, true),
    ('0001', 'Conta Limitada',	'normal@normal.email', 	'normal', false, false);