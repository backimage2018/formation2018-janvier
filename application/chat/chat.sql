use formation;
drop table if exists discussion;
create table if not exists discussion(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	message varchar(64) NOT null,
	emitter varchar(32) NOT null,
	createtime TIMESTAMP DEFAULT CURRENT_TIMESTAMP
	)engine=InnoDB;
insert  into discussion (message,emitter) values
	('Message de test', 'Jean')
;