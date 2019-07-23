/*Database user login table*/
 create table user(id int(11) unsigned auto_increment primary key, not null, 
	 user_name varchar(90) not null, 
	 password varchar(90) not null);
/* database table for task*/
create table task(id int(11) auto_increment primary key, not null,
	 project text not null,
	 task_date date not null);
)