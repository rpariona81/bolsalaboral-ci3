-- ----------------------------
-- Table structure for `t_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `t_sessions`;
CREATE TABLE `t_sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_activity` int(11) DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_sessions_user_id_index` (`user_id`),
  KEY `t_sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ----------------------------
-- Table structure for `t_document_type`
-- ----------------------------
DROP TABLE IF EXISTS `t_document_type`;
CREATE TABLE `t_document_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_type_label` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_document_type
-- ----------------------------
INSERT INTO `t_document_type` VALUES ('1', 'D.N.I.');
INSERT INTO `t_document_type` VALUES ('2', 'CARNET DE EXTRANJERÍA');
INSERT INTO `t_document_type` VALUES ('3', 'PASAPORTE');


-- ----------------------------
-- Table structure for `t_roles`
-- ----------------------------
DROP TABLE IF EXISTS `t_roles`;
CREATE TABLE `t_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rolename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 9,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_roles
-- ----------------------------
INSERT INTO `t_roles` VALUES ('1', 'sysadmin', 'Root', '0', 'Super admin', '0', '2023-05-09 22:24:28', '2023-05-09 22:24:28');
INSERT INTO `t_roles` VALUES ('2', 'admin', 'Administrador', '1', 'Administrator', '1', '2023-05-09 22:24:28', '2023-05-09 22:24:28');
INSERT INTO `t_roles` VALUES ('3', 'docente', 'Docente', '1', 'Teacher', '9', '2023-05-09 22:24:28', '2023-05-09 22:24:28');
INSERT INTO `t_roles` VALUES ('4', 'estudiante', 'Estudiante/Egresado', '1', 'Student', '9', '2023-05-09 22:24:28', '2023-05-09 22:24:28');


-- ----------------------------
-- Table structure for `t_careers`
-- ----------------------------
DROP TABLE IF EXISTS `t_careers`;
CREATE TABLE `t_careers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `career_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `career_alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `career_related` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `career_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `t_careers_career_title_unique` (`career_title`),
  UNIQUE KEY `t_careers_career_code_unique` (`career_code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_careers
-- ----------------------------
INSERT INTO `t_careers` VALUES ('1', 'Arquitectura de Plataformas y Servicios de Tecnologías de la Información', 'J2262-3-003', 'ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TECNOLOGIAS DE LA INFORMACION', 'ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TECNOLOGIAS DE LA INFORMACION', null, null, null);
INSERT INTO `t_careers` VALUES ('2', 'Enfermería Técnica', 'Q3286-3-003', 'ENFERMERIA TECNICA', 'ENFERMERIA TECNICA', null, null, null);
INSERT INTO `t_careers` VALUES ('3', 'Farmacia Técnica', 'Q3286-3-004', 'FARMACIA TECNICA', 'FARMACIA TECNICA', null, null, null);
INSERT INTO `t_careers` VALUES ('4', 'Tecnología Pesquera y Acuícola', null, 'TECNOLOGIA PESQUERA Y ACUICOLA', 'DESARROLLO PESQUERO Y ACUICOLA', null, null, null);
INSERT INTO `t_careers` VALUES ('5', 'Desarrollo pesquero y acuícola', 'A0203-3-001', 'DESARROLLO PESQUERO Y ACUICOLA', 'DESARROLLO PESQUERO Y ACUICOLA', null, null, null);


-- ----------------------------
-- Table structure for `t_admin`
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paternal_surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `maternal_surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `document_type` tinyint(3) unsigned NOT NULL DEFAULT 9,
  `document_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'img/default-avatar.jpg',
  `status` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `role_id` int(10) unsigned DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logged_in_at` timestamp NULL DEFAULT NULL,
  `logged_out_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `t_admin_username_unique` (`username`),
  UNIQUE KEY `t_admin_email_unique` (`email`),
  UNIQUE KEY `t_admin_mobile_unique` (`mobile`),
  KEY `t_admin_role_id_foreign` (`role_id`),
  CONSTRAINT `t_admin_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `t_roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_admin
-- ----------------------------
INSERT INTO `t_admin` VALUES ('3', null, '', '', '9', null, null, null, null, 'img/default-avatar.jpg', '1', '1', 'root', 'root@example.com', null, '$2y$10$NX4Te45WKxAnc88c6vU.PuWTRTlvkbL1rSVGYSD4mNXo/8jYIe1G.', null, null, null, null, null, null, null, null);
INSERT INTO `t_admin` VALUES ('4', 'Jonas', 'Paredes', 'Sanchez', '9', null, '', null, null, 'img/default-avatar.jpg', '1', '2', 'admin', 'admin@example.com', null, '$2y$10$/XLwYavUIGchJ3XNTFsqhu1yUmOaJ6gHmr2HZI18yzjpRO1J4MKgK', null, null, null, null, null, null, '2023-05-24 00:00:27', null);


-- ----------------------------
-- Table structure for `t_users`
-- ----------------------------
DROP TABLE IF EXISTS `t_users`;
CREATE TABLE `t_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paternal_surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `maternal_surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `document_type` tinyint(3) unsigned NOT NULL DEFAULT 9,
  `document_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubigeo_peru` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'img/default-avatar.jpg',
  `status` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `role_id` int(10) unsigned DEFAULT NULL,
  `career_id` int(10) unsigned DEFAULT NULL,
  `graduated` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logged_in_at` timestamp NULL DEFAULT NULL,
  `logged_out_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `t_users_username_unique` (`username`),
  UNIQUE KEY `t_users_email_unique` (`email`),
  UNIQUE KEY `t_users_mobile_unique` (`mobile`),
  KEY `t_users_role_id_foreign` (`role_id`),
  KEY `t_users_career_id_foreign` (`career_id`),
  CONSTRAINT `t_users_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `t_careers` (`id`),
  CONSTRAINT `t_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `t_roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

------------------------
-- En caso se permita que se repita el teléfono celular, la línea 172 se comentará
-- ----------------------------
-- Records of t_users
-- ----------------------------
INSERT INTO `t_users` VALUES ('1', 'Teófilo', 'Paucar', 'López', '2', '00000007', null, null, null, '51 000000109', 'Masculino', '1980-05-26', 'img/default-avatar.jpg', '1', '3', null, 'Contratado', 'tpaucar', 'docente@example.com', null, '$2y$10$iUm6kkf.XCI2uR/IaJfEYeOLEPcjLjkvzB07zNULSw821GyGSVu/m', 'MTIzNDU2', null, null, null, null, '2023-05-09 22:24:28', '2023-05-21 01:44:29', null);
INSERT INTO `t_users` VALUES ('2', 'María Pía', 'Vargas', 'Sánchez', '1', '00070070', null, null, null, '51 000500522', 'Femenino', null, 'img/default-avatar.jpg', '1', '4', '1', 'Estudiante', '46152561', 'estudiante@example.com', null, '$2y$10$yVwpLPiNSKxVmUHnjmGfuu056ZRmODaa2VcFFIYe3VdmFvsL70RiS', 'REttcg==', null, null, null, null, '2023-05-09 22:24:28', '2023-05-21 01:51:26', null);
INSERT INTO `t_users` VALUES ('3', 'Maria', 'Vargas', 'Llosa', '1', '00456662', 'Jr Zepita 123', 'Sechura', null, '51 99644332', 'Femenino', '2018-05-10', 'img/default-avatar.jpg', '1', '4', '1', 'Estudiante', '10101007', 'egresado@example.com', null, '$2y$10$.Y7LG0Ix.MpbjFdue06wKurzWwxbc5NM1XYQh4m4zNpe3r9KMxM3m', 'c2VjcmV0', null, null, null, null, '2023-05-09 22:24:28', '2023-05-21 01:51:29', null);
INSERT INTO `t_users` VALUES ('4', 'John', 'Doe', 'Vargas', '2', '95311150', 'Jr Callao 987', 'Morropon', null, '51 99999444', 'Masculino', null, 'img/default-avatar.jpg', '1', '4', '1', 'Egresado', '10101086', 'titulados@example.com', null, '$2y$10$QnBcYp6tq59/SUiib.AaLOoWCWANVFwD9D7LTWiimav5r4S6EgYzW', 'c2VjcmV0', null, null, null, null, '2023-05-09 22:24:28', '2023-05-24 00:09:50', null);




-- ----------------------------
-- Table structure for `t_offersjob`
-- ----------------------------
DROP TABLE IF EXISTS `t_offersjob`;
CREATE TABLE `t_offersjob` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_offer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacancy_numbers` tinyint(4) DEFAULT NULL,
  `date_publish` date DEFAULT NULL,
  `salary` double(11,2) DEFAULT NULL,
  `date_vigency` date DEFAULT NULL,
  `career_id` int(10) unsigned DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `t_offersjob_title_unique` (`title`),
  KEY `t_offersjob_career_id_foreign` (`career_id`),
  CONSTRAINT `t_offersjob_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `t_careers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_offersjob
-- ----------------------------
INSERT INTO `t_offersjob` VALUES ('1', 'Jefe de Calidad - Movimiento de Tierra', 'Tiempo completo', 'La empresa SGS es una compañía multinacional de origen suizo, líder mundial en servicios de inspección...', '2', '2023-05-15', '500.00', '2023-05-24', '1', '1', null, '2023-05-21 01:44:33');
INSERT INTO `t_offersjob` VALUES ('2', 'Asistente de Operaciones - Base de Datos SQL', 'Prácticas pre-profesionales', 'Somos una consultora multinacional que ofrece soluciones de negocio, estrategia, desarrollo y mantenimiento de aplicaciones tecnológicas, y outsourcing.\r\n\r\nDesarrollamos nuestra actividad en los sectores de telecomunicaciones, entidades financieras, industria, utilities, energía, banca, seguros, administración pública, media y sanidad.\r\n\r\nFormamos parte de un gran grupo, NTT DATA, la sexta compañía de servicios IT del mundo, con 75.000 profesionales y presencia en Asia-Pacífico, Oriente Medio, Europa, Latinoamérica y Norteamérica.\r\n\r\nTrabajamos para las principales empresas mundiales en todos los sectores productivos, ofreciendo a las personas múltiples posibilidades de aprovechar el talento y las capacidades de cada uno.\r\n\r\n¡Desarrolla tu carrera profesional en everis y sé el héroe de tu propia historia!', '2', '2023-05-15', '500.00', '2023-05-19', '1', '1', null, '2023-05-21 01:44:35');
INSERT INTO `t_offersjob` VALUES ('3', 'PRACTICANTE DE COMPRAS', 'Tiempo parcial', 'Pesquera Diamante, empresa del sector industrial que satisface las necesidades alimenticias del mercado peruano y mundial, requiere una persona con experiencia para cubrir la posición de:\r\n\r\nPRACTICANTE DE COMPRAS\r\n\r\nRequisitos:\r\n\r\n· Carrera de Ingeniería Industrial o afines, recién egresados.\r\n\r\n· Con conocimiento básicos en planificación y gestión de compras.\r\n\r\n· Conocimientos de Office a nivel avanzado. Deseable que haya manejado algún ERP.\r\n\r\n· Ingles a nivel intermedio.\r\n\r\n· Conocimientos de POWER BI\r\n\r\n· Experiencia mínima de 6 meses en el área de compras (De preferencia).\r\n\r\nFunciones:\r\n\r\n· Apoyo en procesar los requerimientos y emitir órdenes de compra (en general).\r\n\r\n· Soporte en la homologación y mantenimiento de las Base de Datos de proveedores.\r\n\r\n· Elaboración de reportes e indicadores del área.\r\n\r\n· Soporte en los procesos de archivamiento de legajos de compras, entre otros.', '1', '2023-05-15', '300.00', '2023-05-18', '4', '1', null, '2023-05-20 01:03:27');
INSERT INTO `t_offersjob` VALUES ('4', 'Operador de Ensaque Temporal - Vegueta', 'Tiempo parcial', 'Requisitos:\r\n\r\n- Técnico en Mecánica, Electricidad o carreras afines.\r\n\r\n- 2 años de experiencia como Operador y/o ayudante de ensaque .\r\n\r\n- Manipulación y dosificación de insumos químicos.\r\n\r\n- Operaciones en planta industrial pesquera.\r\n\r\n- Disponibilidad para viajar a otras sedes\r\n\r\nFunciones:\r\n\r\n- Operar los enfriadores, purificadores, molinos, bombas dosificadoras de antioxidante, mezcladores, balanza, cosedoras, transportadores helicoidales y fajas transportadoras por medio de técnicas de operación y el panel de control durante el proceso de enfriado, molienda y ensaque para la obtención de la harina de acuerdo a los estándares de calidad.\r\n\r\n- Operar los equipos auxiliares como bombas de pulso, paneles de control y equipos de izaje entre otros, por medio de procedimientos y manuales de operación para el control y transporte de la anchoveta y sus derivados.\r\n\r\n- Monitorear los parámetros de operación de los enfriadores, molinos, bombas dosificadoras, mezcladores, balanzas, máquinas cosedoras, transportadores helicoidales y fajas transportadoras y del proceso de enfriado, molienda y ensaque tales como temperatura, humedad, granulometría y peso para la obtención de los sacos de harina de pescado de acuerdo con los estándares de calidad.\r\n\r\n- Identificar las etapas del proceso de enfriado, molienda y ensaque, los equipos y el principio de funcionamiento de los equipos por medio de manuales de procesos y descripción de equipos para el cumplimiento de las etapas del proceso operando óptimamente los equipos.\r\n\r\n- Realizar el desmontaje y montaje de las partes y componentes de los enfriadores, purificadores, bombas dosificadoras, molinos, balanzas y máquinas cosedoras por medio de herramientas para la ejecución de actividades de limpieza, pintura, inspección y cambio de componentes.\r\n\r\n- Lubricar las chumaceras, rodamientos, piñones, cadenas, engranajes y pistas de rodadura por medio de técnicas y equipos de lubricación para la prolongación de la vida útil de los componentes.\r\n\r\n- Monitorear los equipos y su funcionamiento a través del check list, pruebas de hermeticidad, pruebas de funcionamiento e inspecciones sensoriales en la planta de harina y aceite de pescado para la prevención de paradas imprevistas.\r\n\r\n- Realizar el monitoreo y control de pesos en el envasado así como también la correcta rotulación y codificación de los sacos.\r\n\r\n- Realizar reportes y/o informes durante las tareas diarias para el aseguramiento de la operación de los equipos.', '1', '2023-05-15', '400.00', '2023-05-17', '4', '1', null, '2023-05-20 01:03:26');
INSERT INTO `t_offersjob` VALUES ('5', 'TECNICO EN ENFERMERIA - PIURA', 'Tiempo completo', 'se solicita un enfermero para cubir puesto en campamento minero de preferencia VARON , con disponibilidad inmediata y pernoctar en campamento minero:\r\n\r\nFUNCIONES :\r\n\r\n- Tecnico de 2 años como experiencia.\r\n\r\n- apoyar con las funciones administrativas enconmedadas por jefatura\r\n\r\nBENEFICIOS\r\n\r\n- horario 7 am a 7 pm\r\n\r\n- sistema de trabajo 20 x 10\r\n\r\n- movilidad segun residencia 50% cubierto\r\n\r\n- 3 meses bajo RH\r\n\r\n- alimentacion y estadia cubierta al 100%\r\n\r\nABSTENERSE LOS QUE NO CUMPLEN LOS REQUISITOS', '1', '2023-05-15', '800.00', '2023-05-20', '2', '1', null, null);
INSERT INTO `t_offersjob` VALUES ('6', 'Técnico(a) de Enfermería - Idat Sede Piura', 'Tiempo completo', 'Idat, empresa de educación superior del grupo Intercorp, que valora y promueve la diversidad, inclusión y equidad de género, formamos parte del ranking GPTW 2023, se encuentra en la búsqueda de un(a) Técnico(a) de Enfermería para la sede de Piura.\r\n\r\nPropósito\r\n\r\nBrindar atención médica primaria a los usuarios que lo requieran dentro de la sede; así como, hacer derivaciones correspondientes según cada caso.\r\n\r\nFunciones\r\n\r\nProporcionar atención médica primaria para luego derivarlos según lo requiera el usuario.\r\nDiseñar, ejecutar y evaluar programas de salud con base al diagnóstico individual, familiar o comunitario\r\nRealizar acciones de planificación, organización, control y evaluación en la gestión de la atención de enfermería para asegurar su calidad.\r\nCoordinar con las diferentes áreas para la realización de actividades orientadas a promover una adecuada salud.\r\nRealizar otras funciones afines y/o complementarias que le asigne su jefe inmediato.\r\nRequisitos\r\n\r\nTécnico Titulado en Enfermería.\r\nMínimo 1 año de experiencia en posiciones afines.\r\nDisponibilidad para laborar de lunes a sabado de 7:00 am a 4:00 pm en nuestra sede de Piura.\r\nBeneficios\r\n\r\nIngreso a planilla desde el primer día con todos los beneficios de ley.\r\nCuponera de tiempo libre\r\nSer parte de una de las empresas del grupo Intercorp.\r\nDescuentos en las empresas que pertenecen al club Intercorp.\r\nAtractivos descuentos en las instituciones educativas del grupo.\r\nEn inLearning Institutos (Zegel IPE, Idat, Corriente Alterna, Centro de la Imagen e Innova Teaching School) estamos comprometidos con promover la igualdad de género, diversidad e inclusión en nuestros procesos de atracción y selección del talento, brindando igualdad de oportunidades laborales para los/las postulantes, asegurando ambientes saludables, equitativos y seguros.\r\n\r\nAdemás, queremos que sepas que este cargo admite postulaciones para personas con discapacidad de acuerdo al marco de la Ley de Inclusión Laboral en el Perú.', '1', '2023-05-15', '800.00', '2023-05-21', '2', '1', null, '2023-05-21 01:44:37');

-- ----------------------------
-- Table structure for `t_postulatejob`
-- ----------------------------
DROP TABLE IF EXISTS `t_postulatejob`;
CREATE TABLE `t_postulatejob` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `offer_id` bigint(20) unsigned DEFAULT NULL,
  `route_filecv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg_postulant` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_notification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_postulation` datetime DEFAULT NULL,
  `review` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `filecv` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_postulatejob_user_id_index` (`user_id`),
  KEY `t_postulatejob_offer_id_index` (`offer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_postulatejob
-- ----------------------------
INSERT INTO `t_postulatejob` VALUES ('1', '4', '1', '/var/www/bolsalaboral-ci3/uploads/filescv/1684520911175.pdf', '', 'Aceptado', 'titulado@example.com', '2023-05-19 13:28:31', '0', '0', '1684520911175.pdf', '2023-05-19 13:28:31', '2023-05-22 23:39:57');
INSERT INTO `t_postulatejob` VALUES ('2', '4', '2', '/var/www/bolsalaboral-ci3/uploads/filescv/1684525016630.pdf', '', 'Verificado', 'titulado@example.com', '2023-05-19 14:36:56', '0', '0', '1684525016630.pdf', '2023-05-19 14:36:56', '2023-05-21 01:45:16');
INSERT INTO `t_postulatejob` VALUES ('3', '4', '3', '/var/www/bolsalaboral-ci3/uploads/filescv/1684525546909.pdf', '', 'Aceptado', 'titulado@example.com', '2023-05-19 14:45:46', '0', '0', '1684525546909.pdf', '2023-05-19 14:45:46', '2023-05-23 00:26:55');
INSERT INTO `t_postulatejob` VALUES ('4', '4', '4', '/var/www/bolsalaboral-ci3/uploads/filescv/1684525611899.pdf', '', 'Sin respuesta', 'titulado@example.com', '2023-05-19 14:46:51', '0', '0', '1684525611899.pdf', '2023-05-19 14:46:51', '2023-05-21 01:43:04');
INSERT INTO `t_postulatejob` VALUES ('5', '4', '5', '/var/www/bolsalaboral-ci3/uploads/filescv/1684525626930.pdf', '', 'Sin respuesta', 'titulado@example.com', '2023-05-19 14:47:06', '0', '1', '1684525626930.pdf', '2023-05-19 14:47:06', '2023-05-21 01:23:30');
INSERT INTO `t_postulatejob` VALUES ('6', '4', '6', '/var/www/bolsalaboral-ci3/uploads/filescv/1684538258108.pdf', '', 'Aceptado', 'estudiante@example.com', '2023-05-19 18:17:38', '0', '0', '1684538258108.pdf', '2023-05-19 18:17:38', '2023-05-22 23:40:06');

