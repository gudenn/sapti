INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
(1, 'Super Administrador', 'Super', 'guyencu@gmail.com', '1989-01-17', 'admin', '123123', '123123', 'M', 'AC');
INSERT INTO `sapti`.`administrador` (`id`, `usuario_id`, `estado`) VALUES (NULL, '1', 'AC');