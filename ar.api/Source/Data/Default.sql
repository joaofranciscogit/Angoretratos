create table account(
	account_id 		int(50) primary key auto_increment 	not null,
	account_code 	varchar(100) 						not null,
	account_name	varchar(250) 						not null,
	account_email	varchar(50) 						not null,
	account_passwd	varchar(250) 						not null,
	account_master	boolean			default false,
	account_access	boolean			default false,
	account_date	timestamp
);