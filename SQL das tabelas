CREATE TABLE usuarios (
    id INT AUTO_INCREMENT,
    nome VARCHAR(255),
    email VARCHAR(255),
    PRIMARY KEY (id_usuario)
);

CREATE TABLE senhas_usuarios (
    id INT AUTO_INCREMENT,
    id_usuario INT,
    senha VARCHAR(255),
    PRIMARY KEY (id),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

//junção das tabelas 
// Os dois tem que ter o mesmo ID
SELECT u.nome, u.email, s.sennha
FROM usuarios u
INNER JOIN senhas_usuarios s ON u.id = s.id_usuario
WHERE u.id = s.id_usuario;

