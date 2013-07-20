INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
(1, 'Super Administrador', 'Super', 'guyencu@gmail.com', '1989-01-17', 'admin', '123123', '123123', 'M', 'AC');
INSERT INTO `administrador` (`id`, `usuario_id`, `estado`) VALUES (NULL, '1', 'AC');

INSERT INTO `usuario` ( `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
( 'Docente', 'Docente', 'docente@gmail.com', '1989-01-17', 'docente', 'docente', 'docente', 'M', 'AC');
INSERT INTO `docente` (`usuario_id`, `estado`) VALUES ('2', 'AC');

INSERT INTO `usuario` ( `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
( 'Estudiante', 'Estudiante', 'estudiante@gmail.com', '1989-01-17', 'estudiante', 'estudiante', 'estudiante', 'M', 'AC');
INSERT INTO `docente` (`usuario_id`, `estado`) VALUES ('3', 'AC');

INSERT INTO `usuario` ( `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
( 'Tutor', 'Tutor', 'tutor@gmail.com', '1989-01-17', 'tutor', 'tutor', 'tutor', 'M', 'AC');
INSERT INTO `tutor` (`usuario_id`, `estado`) VALUES ('4', 'AC');



INSERT INTO `proyecto` (`nombre`, `estado`) VALUES ('Proyecto', 'AC');
INSERT INTO `proyecto_estudiante` (`id`, `proyecto_id`, `estudiante_id`, `estado`) VALUES (NULL, '1', '1', 'AC');


INSERT INTO `materia` (`id`, `nombre`, `estado`) VALUES (NULL, 'Proyecto Final', 'AC');
INSERT INTO `semestre` (`id`, `codigo`, `estado`) VALUES (NULL, 'I-2013', 'AC'), (NULL, 'II-2013', 'AC');
INSERT INTO `dicta` (`id`, `docente_id`, `materia_id`, `semestre_id`, `estado`) VALUES (NULL, '1', '1', '1', 'AC');
INSERT INTO `inscrito` (`id`, `evaluacion_id`, `dicta_id`, `estudiante_id`, `semestre_id`, `estado`) VALUES (NULL, NULL, '1', '1', '1', 'AC');
INSERT INTO `proyecto_docente` (`id`, `proyecto_id`, `dicta_id`, `estado`) VALUES (NULL, '1', '1', 'AC');
INSERT INTO `proyecto_tutor` (`id`, `proyecto_id`, `tutor_id`, `estado`) VALUES (NULL, '1', '1', 'AC');



INSERT INTO `grupo` (`id`, `codigo`, `descripcion`, `estado`) VALUES 
(NULL, 'SUPER-ADMIN' , 'grupo para el super administrador del sistema', 'AC'), 
(NULL, 'ESTUDIANTES' , 'estudiantes', 'AC'),
(NULL, 'DOCENTES'    , 'docentes', 'AC'),
(NULL, 'TUTORES'     , 'tutores', 'AC'),
(NULL, 'TRIBUNALES'  , 'tribunales', 'AC');

INSERT INTO `modulo` (`id`, `codigo`, `descripcion`, `estado`) VALUES (NULL, 'GESTION-GRUPOS', 'administrar los grupos', NULL), (NULL, 'GESTION-PERMISOS', 'administrar los permisos', NULL);

