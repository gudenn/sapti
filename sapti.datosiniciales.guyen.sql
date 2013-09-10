INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
(1, 'Super Administrador', 'Super', 'guyencu@gmail.com', '1989-01-17', 'admin', '123123', '123123', 'M', 'AC');
INSERT INTO `administrador` (`id`, `usuario_id`, `estado`) VALUES (NULL, '1', 'AC');
-- -----------------------------Docente--------------------------------
INSERT INTO `usuario` ( `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
( 'Ing. Jose Richard', ' Ayoroa Cardozo', 'jose@gmail.com', '1989-01-17', 'jose', 'jose', '78875', 'M', 'AC');

INSERT INTO `usuario` ( `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
( 'Msc. Vladimir', 'Costas Jáuregui', 'costas@gmail.com', '1989-01-17', 'costas', 'costas', '78889', 'M', 'AC');

INSERT INTO `usuario` ( `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
( 'Ing.  Samuel Roberto', 'Achá Perez', 'samuel@gmail.com', '1989-01-17', 'samuel', 'samuel', '767734', 'M', 'AC');

INSERT INTO `usuario` ( `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
( 'Msc. Ing. Americo', 'Fiorilo Lozada', 'americo@gmail.com', '1989-01-17', 'americo', 'americo', '788898', 'M', 'AC');

INSERT INTO `usuario` ( `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
( 'Lic.  Raul', 'Catari Rios', 'raul@gmail.com', '1989-01-17', 'raul', 'raul', '877657', 'M', 'AC');

-- iniciamos en 2 porque el primer usuario es el Super admin
INSERT INTO `docente` (`usuario_id`, `estado`) VALUES (2, 'AC');
INSERT INTO `docente` (`usuario_id`, `estado`) VALUES (3, 'AC');
INSERT INTO `docente` (`usuario_id`, `estado`) VALUES (4, 'AC');
INSERT INTO `docente` (`usuario_id`, `estado`) VALUES (5, 'AC');
INSERT INTO `docente` (`usuario_id`, `estado`) VALUES (6, 'AC');


-- -----------------------------Estudiante-------------------------------
INSERT INTO `usuario` ( `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
( 'APAZA MONTES', ' ALEJANDRO ARIEL', 'ariel@gmail.com', '1989-01-17', 'alejandro', 'alejandro', '78875', 'M', 'AC');



INSERT INTO `usuario` ( `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
( 'DENIS ROGER', 'ARRATIA RODRIGUEZ', 'rodriguez@gmail.com', '1989-01-17', 'rodriguez', 'rodriguez', '78889', 'M', 'AC');

INSERT INTO `usuario` ( `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
( 'ALEJANDRO LEON', 'BEDOYA VEGA', 'leon@gmail.com', '1989-01-17', 'alejandroo', 'alejandro', '788898', 'M', 'AC');

INSERT INTO `usuario` ( `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
( 'VANESSA', 'BELLIDO AYAVIRI', 'vaneza@gmail.com', '1989-01-17', 'vanesa', 'vanesa', '767734', 'M', 'AC');

INSERT INTO `usuario` ( `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
( 'GABRIEL', 'CAMACHO ROCABADO', 'gabriel@gmail.com', '1989-01-17', 'gabriel', 'gabriel', '877657', 'M', 'AC');

INSERT INTO `estudiante` (`usuario_id`, `codigo_sis`, `estado`) VALUES (7, '201001201', 'AC');
INSERT INTO `estudiante` (`usuario_id`, `codigo_sis`, `estado`) VALUES (8, '200804528', 'AC');
INSERT INTO `estudiante` (`usuario_id`, `codigo_sis`, `estado`) VALUES (9, '200801241', 'AC');
INSERT INTO `estudiante` (`usuario_id`, `codigo_sis`, `estado`) VALUES (10, '200401111', 'AC');
INSERT INTO `estudiante` (`usuario_id`, `codigo_sis`, `estado`) VALUES (11, '201109755', 'AC');
INSERT INTO `estudiante` (`usuario_id`, `codigo_sis`, `estado`) VALUES (12, '200607565', 'AC');






INSERT INTO `usuario` ( `nombre`, `apellidos`, `email`, `fecha_cumple`, `login`, `clave`, `ci`, `sexo`, `estado`) VALUES
( 'Tutor', 'Tutor', 'tutor@gmail.com', '1989-01-17', 'tutor', 'tutor', 'tutor', 'M', 'AC');
INSERT INTO `tutor` (`usuario_id`, `estado`) VALUES ('4', 'AC');



INSERT INTO `proyecto` (`nombre`, `estado`) VALUES ('SISTEMA EXPERTO PARA EL DIAGNÓSTICO DE LA GASTRITIS AGUDA, CRÓNICA', 'AC');
INSERT INTO `proyecto` (`nombre`, `estado`) VALUES ('SISTEMA DE INFORMACIÓN PARA UN PANEL DE INFORMACIONES EN LA TERMINAL DE BUSES', 'AC');
INSERT INTO `proyecto` (`nombre`, `estado`) VALUES ('SISTEMA DE ADMINISTRACION Y CONTROL DE VENTA DE DVDS GRABADOS PARA UNA TIENDA COMERCIAL', 'AC');
INSERT INTO `proyecto` (`nombre`, `estado`) VALUES ('SISTEMA DE GESTION DE INVENTARIO QUE PERMITA EL CONTROL DE EXISTENCIAS PARA EMPRESA DE PLASTICO', 'AC');

INSERT INTO `proyecto_estudiante` (`id`, `proyecto_id`, `estudiante_id`, `estado`) VALUES (NULL, '1', '1', 'AC');
INSERT INTO `proyecto_estudiante` (`id`, `proyecto_id`, `estudiante_id`, `estado`) VALUES (NULL, '2', '2', 'AC');
INSERT INTO `proyecto_estudiante` (`id`, `proyecto_id`, `estudiante_id`, `estado`) VALUES (NULL, '3', '3', 'AC');
INSERT INTO `proyecto_estudiante` (`id`, `proyecto_id`, `estudiante_id`, `estado`) VALUES (NULL, '4', '4', 'AC');

INSERT INTO `proyecto_docente` (`id`, `proyecto_id`, `dicta_id`, `estado`) VALUES (NULL, '1', '4', 'AC');
INSERT INTO `proyecto_docente` (`id`, `proyecto_id`, `dicta_id`, `estado`) VALUES (NULL, '2', '4', 'AC');
INSERT INTO `proyecto_docente` (`id`, `proyecto_id`, `dicta_id`, `estado`) VALUES (NULL, '3', '4', 'AC');
INSERT INTO `proyecto_docente` (`id`, `proyecto_id`, `dicta_id`, `estado`) VALUES (NULL, '4', '4', 'AC');


INSERT INTO `materia` (`id`, `nombre`, `estado`) VALUES (NULL, 'Proyecto Final', 'AC');
INSERT INTO `materia` (`id`, `nombre`, `estado`) VALUES (NULL, 'Perfil', 'AC');
INSERT INTO `semestre` (`id`, `codigo`, `estado`) VALUES (NULL, 'I-2013', 'AC'), (NULL, 'II-2013', 'AC');
-- agrego docentes a las materias
INSERT INTO `dicta` (`id`, `docente_id`, `materia_id`, `semestre_id`, `estado`) VALUES (NULL, '1', '1', '1', 'AC');
INSERT INTO `dicta` (`id`, `docente_id`, `materia_id`, `semestre_id`, `estado`) VALUES (NULL, '2', '1', '1', 'AC');
INSERT INTO `dicta` (`id`, `docente_id`, `materia_id`, `semestre_id`, `estado`) VALUES (NULL, '4', '2', '1', 'AC');
INSERT INTO `dicta` (`id`, `docente_id`, `materia_id`, `semestre_id`, `estado`) VALUES (NULL, '5', '1', '1', 'AC');


INSERT INTO `inscrito` (`id`, `evaluacion_id`, `dicta_id`, `estudiante_id`, `semestre_id`, `estado`) VALUES (NULL, NULL, '4', '1', '1', 'AC');
INSERT INTO `inscrito` (`id`, `evaluacion_id`, `dicta_id`, `estudiante_id`, `semestre_id`, `estado`) VALUES (NULL, NULL, '4', '2', '2', 'AC');
INSERT INTO `inscrito` (`id`, `evaluacion_id`, `dicta_id`, `estudiante_id`, `semestre_id`, `estado`) VALUES (NULL, NULL, '4', '3', '3', 'AC');
INSERT INTO `inscrito` (`id`, `evaluacion_id`, `dicta_id`, `estudiante_id`, `semestre_id`, `estado`) VALUES (NULL, NULL, '4', '4', '4', 'AC');
INSERT INTO `proyecto_docente` (`id`, `proyecto_id`, `dicta_id`, `estado`) VALUES (NULL, '1', '1', 'AC');
INSERT INTO `proyecto_tutor` (`id`, `proyecto_id`, `tutor_id`, `estado`) VALUES (NULL, '1', '1', 'AC');


INSERT INTO `grupo` (`id`, `codigo`, `descripcion`, `estado`) VALUES
(NULL, 'SUPER-ADMIN' , 'grupo para el super administrador del sistema', 'AC'),
(NULL, 'ESTUDIANTES' , 'estudiantes', 'AC'),
(NULL, 'DOCENTES'    , 'docentes', 'AC'),
(NULL, 'TUTORES'     , 'tutores', 'AC'),
(NULL, 'TRIBUNALES'  , 'tribunales', 'AC');


INSERT INTO `sapti`.`area` (`id`, `nombre`, `descripcion`, `estado`) VALUES (NULL, 'Ingeniería de Software', NULL, 'AC');
INSERT INTO `sapti`.`area` (`id`, `nombre`, `descripcion`, `estado`) VALUES (NULL, 'Sistemas Expertos', NULL, 'AC');
INSERT INTO `sapti`.`lugar` (`id`, `nombre`, `estado`) VALUES (1, 'Auditorio de memi', 'AC');
INSERT INTO `sapti`.`tipo_defensa` (`id`, `nombre`, `descripcion`, `estado`) VALUES (NULL, 'PUBLICA', '', 'AC');

INSERT INTO `sapti`.`turno` (`id`, `nombre`, `descripcion`, `estado`) VALUES (1, 'MAÑANA', NULL, 'AC');
INSERT INTO `sapti`.`turno` (`id`, `nombre`, `descripcion`, `estado`) VALUES (2, 'TARDE', NULL, 'AC');

INSERT INTO `sapti`.`dia` (`id`, `nombre`, `descripcion`, `estado`) VALUES (NULL, 'LUNES', NULL, 'AC'), (NULL, 'MARTES', NULL, 'AC');
INSERT INTO `sapti`.`dia` (`id`, `nombre`, `descripcion`, `estado`) VALUES (NULL, 'MIERCOLES', NULL, 'AC'), (NULL, 'JUEVES', NULL, 'AC');
INSERT INTO `sapti`.`dia` (`id`, `nombre`, `descripcion`, `estado`) VALUES (NULL, 'VIERNES', NULL, 'AC');