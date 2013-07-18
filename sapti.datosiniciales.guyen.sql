INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
(1, 'Super Administrador', 'Super', 'guyencu@gmail.com', '1989-01-17', 'admin', '123123', '123123', 'M', 'AC');
INSERT INTO `sapti`.`administrador` (`id`, `usuario_id`, `estado`) VALUES (NULL, '1', 'AC');

INSERT INTO `grupo` (`id`, `codigo`, `descripcion`, `estado`) VALUES 
(NULL, 'SUPER-ADMIN' , 'grupo para el super administrador del sistema', 'AC'), 
(NULL, 'ESTUDIANTES' , 'estudiantes', 'AC'),
(NULL, 'DOCENTES'    , 'docentes', 'AC'),
(NULL, 'TUTORES'     , 'tutores', 'AC'),
(NULL, 'TRIBUNALES'  , 'tribunales', 'AC');

INSERT INTO `sapti`.`modulo` (`id`, `codigo`, `descripcion`, `estado`) VALUES (NULL, 'GESTION-GRUPOS', 'administrar los grupos', NULL), (NULL, 'GESTION-PERMISOS', 'administrar los permisos', NULL);
