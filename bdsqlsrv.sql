CREATE TABLE [dbo].[t_sessions] (
[id] nvarchar(255) NOT NULL ,
[user_id] bigint NULL ,
[ip_address] nvarchar(45) NULL ,
[user_agent] nvarchar(MAX) NULL ,
[payload] nvarchar(MAX) NULL ,
[last_activity] int NULL ,
[data] nvarchar(MAX) NULL ,
[timestamp] datetime NULL,
PRIMARY KEY (id)
)

CREATE TABLE [dbo].[t_document_type] (
  [id] int IDENTITY(1,1) PRIMARY KEY,
  [document_type_label] varchar(100) NOT NULL  
) 


-- ----------------------------
-- Records of t_document_type
-- ----------------------------
SET IDENTITY_INSERT [dbo].[t_document_type] ON 
GO
INSERT INTO [dbo].[t_document_type](id, document_type_label) VALUES ('1', 'D.N.I.');
INSERT INTO [dbo].[t_document_type](id, document_type_label) VALUES ('2', 'CARNET DE EXTRANJERÍA');
INSERT INTO [dbo].[t_document_type](id, document_type_label) VALUES ('3', 'PASAPORTE');
GO

SET IDENTITY_INSERT [dbo].[t_document_type] OFF 
go

-- ----------------------------
-- Table structure for t_roles
-- ----------------------------
CREATE TABLE [dbo].[t_roles] (
[id] int IDENTITY(1,1) PRIMARY KEY,
[rolename] nvarchar(255) NOT NULL ,
[slug] nvarchar(255) NULL ,
[visible] int NULL ,
[description] nvarchar(255) NULL ,
[level] int NOT NULL DEFAULT ('9') ,
[created_at] datetime NULL ,
[updated_at] datetime NULL 
)

-- ----------------------------
-- Records of t_roles
-- ----------------------------
SET IDENTITY_INSERT [dbo].[t_roles] ON 
GO

INSERT INTO t_roles(id, rolename, slug, visible, description, level, created_at, updated_at) VALUES ('1', 'sysadmin', 'Root', '0', 'Super admin', '0', '2023-05-09 22:24:28', '2023-05-09 22:24:28');
INSERT INTO t_roles(id, rolename, slug, visible, description, level, created_at, updated_at) VALUES ('2', 'admin', 'Administrador', '1', 'Administrator', '1', '2023-05-09 22:24:28', '2023-05-09 22:24:28');
INSERT INTO t_roles(id, rolename, slug, visible, description, level, created_at, updated_at) VALUES ('3', 'docente', 'Docente', '1', 'Teacher', '9', '2023-05-09 22:24:28', '2023-05-09 22:24:28');
INSERT INTO t_roles(id, rolename, slug, visible, description, level, created_at, updated_at) VALUES ('4', 'estudiante', 'Estudiante/Egresado', '1', 'Student', '9', '2023-05-09 22:24:28', '2023-05-09 22:24:28');

SET IDENTITY_INSERT [dbo].[t_roles] OFF 
GO



CREATE TABLE [dbo].[t_careers] (
[id] int IDENTITY(1,1) PRIMARY KEY,
[career_title] nvarchar(255) NOT NULL ,
[career_code] nvarchar(255) DEFAULT NULL ,
[career_alias] nvarchar(255) DEFAULT NULL ,
[career_related] nvarchar(255) DEFAULT NULL ,
[career_notes] nvarchar(255) DEFAULT NULL ,
[created_at] datetime NULL ,
[updated_at] datetime NULL 
)

-- ----------------------------
-- Records of t_careers
-- ----------------------------
SET IDENTITY_INSERT [dbo].[t_careers] ON 
GO

INSERT INTO t_careers(id,career_title,career_code,career_alias,career_related,career_notes,created_at,updated_at) VALUES ('1', 'Arquitectura de Plataformas y Servicios de Tecnologías de la Información', 'J2262-3-003', 'ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TECNOLOGIAS DE LA INFORMACION', 'ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TECNOLOGIAS DE LA INFORMACION', null, null, null);
INSERT INTO t_careers(id,career_title,career_code,career_alias,career_related,career_notes,created_at,updated_at) VALUES ('2', 'Enfermería Técnica', 'Q3286-3-003', 'ENFERMERIA TECNICA', 'ENFERMERIA TECNICA', null, null, null);
INSERT INTO t_careers(id,career_title,career_code,career_alias,career_related,career_notes,created_at,updated_at) VALUES ('3', 'Farmacia Técnica', 'Q3286-3-004', 'FARMACIA TECNICA', 'FARMACIA TECNICA', null, null, null);
INSERT INTO t_careers(id,career_title,career_code,career_alias,career_related,career_notes,created_at,updated_at) VALUES ('4', 'Tecnología Pesquera y Acuícola', null, 'TECNOLOGIA PESQUERA Y ACUICOLA', 'DESARROLLO PESQUERO Y ACUICOLA', null, null, null);
INSERT INTO t_careers(id,career_title,career_code,career_alias,career_related,career_notes,created_at,updated_at) VALUES ('5', 'Desarrollo pesquero y acuícola', 'A0203-3-001', 'DESARROLLO PESQUERO Y ACUICOLA', 'DESARROLLO PESQUERO Y ACUICOLA', null, null, null);

SET IDENTITY_INSERT [dbo].[t_careers] OFF 
GO



-- ----------------------------
-- Table structure for `t_admin`
-- ----------------------------
CREATE TABLE t_admin (
  [id] BIGint IDENTITY(1,1) PRIMARY KEY,
  name varchar(255) DEFAULT NULL,
  paternal_surname varchar(255) DEFAULT '',
  maternal_surname varchar(255) DEFAULT '',
  document_type tinyint NOT NULL DEFAULT 9,
  document_number varchar(20) DEFAULT NULL,
  mobile varchar(20) DEFAULT NULL,
  gender varchar(10) DEFAULT NULL,
  birthdate date DEFAULT NULL,
  avatar varchar(255) DEFAULT 'img/default-avatar.jpg',
  status tinyint NOT NULL DEFAULT 1,
  role_id int DEFAULT NULL,
  username varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  email_verified_at DATETIME NULL DEFAULT NULL,
  password varchar(255) NOT NULL,
  remember_token varchar(100) DEFAULT NULL,
  ip_address varchar(45) DEFAULT NULL,
  logged_in_at DATETIME NULL DEFAULT NULL,
  logged_out_at DATETIME NULL DEFAULT NULL,
  api_token varchar(255) DEFAULT NULL,
  created_at DATETIME NULL DEFAULT NULL,
  updated_at DATETIME NULL DEFAULT NULL,
  deleted_at DATETIME NULL DEFAULT NULL
)

-- ----------------------------
-- Records of t_admin
-- ----------------------------
SET IDENTITY_INSERT [dbo].[t_admin] ON 
GO

INSERT INTO t_admin(id,name,paternal_surname,maternal_surname,document_type,document_number,mobile,gender,birthdate,avatar,status,role_id,username,email,email_verified_at,password,remember_token,ip_address,logged_in_at,logged_out_at,api_token,created_at,updated_at,deleted_at) VALUES ('3', null, '', '', '9', null, null, null, null, 'img/default-avatar.jpg', '1', '1', 'root', 'root@example.com', null, '$2y$10$NX4Te45WKxAnc88c6vU.PuWTRTlvkbL1rSVGYSD4mNXo/8jYIe1G.', null, null, null, null, null, null, null, null);
INSERT INTO t_admin(id,name,paternal_surname,maternal_surname,document_type,document_number,mobile,gender,birthdate,avatar,status,role_id,username,email,email_verified_at,password,remember_token,ip_address,logged_in_at,logged_out_at,api_token,created_at,updated_at,deleted_at) VALUES ('4', 'Jonas', 'Paredes', 'Sanchez', '9', null, '', null, null, 'img/default-avatar.jpg', '1', '2', 'admin', 'admin@example.com', null, '$2y$10$/XLwYavUIGchJ3XNTFsqhu1yUmOaJ6gHmr2HZI18yzjpRO1J4MKgK', null, null, null, null, null, null, '2023-05-24 00:00:27', null);

SET IDENTITY_INSERT [dbo].[t_admin] OFF 
GO


