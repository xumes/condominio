# condominio
System created to the condo I am the administrator

*** This description will remain in Portuguese while the application is in development. ***


Marlon,
A pasta admin é a que contém  CRUD do exercício. Eu substituí a conexão com o banco de dados para não deixar usuário e senha expostos.
Para testar, segue o script de criação da tabela:

CREATE TABLE IF NOT EXISTS moradores ( id int(11) NOT NULL AUTO_INCREMENT, usuario varchar(20) COLLATE utf8_unicode_ci NOT NULL, nome varchar(80) COLLATE utf8_unicode_ci NOT NULL, email varchar(255) COLLATE utf8_unicode_ci NOT NULL, unidade varchar(5) COLLATE utf8_unicode_ci NOT NULL, senha varchar(60) COLLATE utf8_unicode_ci NOT NULL, slug varchar(100) COLLATE utf8_unicode_ci NOT NULL, dtInsert timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, dtUpdate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (id), UNIQUE KEY usuario (usuario), UNIQUE KEY slug (slug) ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;


PAra executar e ver como o site se comporta, acesse: http://condominio.xumes.com

Se tiver qualquer dúvida, fique a vontade para entrar em contato.
