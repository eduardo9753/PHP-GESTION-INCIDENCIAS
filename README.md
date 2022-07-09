# SISTEMA DE REGISTRO DE INCIDENCIAS
Aplicativo Web para el control y registro de las incidencias registradas diariamente reportadas en las diferentes areas de la Empresa .
------------

HERRAMIENTAS :
- Base de Datos: MySQL.
- Estilos: CSS3 y Bootstrap 4.
- Lenguaje : Lenguaje PHP.

## Arquitectura MVC
1. MODELO: representación de los datos que maneja el sistema, su lógica de negocio, y sus mecanismos de persistencia.
2. VISTA: Información que se envía al cliente y los mecanismos interacción con éste.
3. CONTROLADOR: intermediario entre el Modelo y la Vista, gestionando el flujo de información entre ellos y las transformaciones para adaptar los datos a las necesidades de cada uno.

## Imagenes
Vita Coordinador:
- 1
![login01](https://user-images.githubusercontent.com/68178186/166980782-ed0bf2af-c266-4b62-aedc-8cba503392d3.PNG)
- 2
![cor02](https://user-images.githubusercontent.com/68178186/166980787-946e4168-c85e-4ecb-88e7-37e209f0a110.PNG)
- 3
![cor03](https://user-images.githubusercontent.com/68178186/166980794-5259a186-dc63-43de-ac23-82c20f776dad.PNG)
- 4
![cor04](https://user-images.githubusercontent.com/68178186/166980804-b524f01b-ffec-47d0-ab19-d2a592704703.PNG)
- 5
![cor05](https://user-images.githubusercontent.com/68178186/166980811-c89b46b7-f344-409d-9479-c2cb07c581d3.PNG)
- 6
![cor06](https://user-images.githubusercontent.com/68178186/166980821-b82f7a9b-fe4a-4263-ba49-b5106ea2eb3e.PNG)
- 7
![cor07](https://user-images.githubusercontent.com/68178186/166980829-3b2fb41f-9028-42ec-92ce-08ea3b97ffe9.PNG)
- 8
![cor08](https://user-images.githubusercontent.com/68178186/166980836-2bd68668-573e-4ed1-9e66-59f214c91b4a.PNG)

Vita Jefe:
- 9
![jefe09](https://user-images.githubusercontent.com/68178186/166980845-ca8e3b09-e3bd-4570-a7e9-a334f31e8095.PNG)
- 10
![jefe10](https://user-images.githubusercontent.com/68178186/166980856-1ddd493f-9201-40b1-919a-aea57291a637.PNG)


### SCRIPT DE LA BASE DE DATOS
````sql
CREATE DATABASE sys_paus DEFAULT CHARACTER SET UTF8;
SET default_storage_engine = INNODB;



USE sys_paus;


#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS USUARIO
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS usuario(
  id_usuario            int PRIMARY KEY AUTO_INCREMENT,
  nombre_usuario        VARCHAR(100) NOT NULL,
  contra_usuario        VARCHAR(100) NOT NULL,
  perfil                VARCHAR(100) NULL,
  area_usuario          VARCHAR(100) NULL,
  foto                  VARCHAR(100) NULL default 'image/foto.png',
  fecha_registro_sys    TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
  fecha_update_sys      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------







#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS SEMAFORIZACION
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS SEMAFORIZACION(
 id                        INT PRIMARY KEY AUTO_INCREMENT,
 num_requerimiento         VARCHAR(20) NULL ,
 mes_incidencia            VARCHAR(10)  NULL,
 fecha_incidencia          DATETIME  NULL,
 id_tipo_documento         INT NULL,
 numero_documento          VARCHAR(60),
 paciente                  VARCHAR(250) NULL,
 id_tipo_paciente          INT NULL,
 id_origen                 INT NULL,
 id_area                   INT NULL,
 id_especialidad           INT NULL,
 personal_involucrado      VARCHAR(250) NULL,
 id_servicio               INT NULL,
 id_habitacion             INT NULL,
 id_procedencia            INT NULL,
 numero_procedencia        VARCHAR(60) NULL,
 tomo                      VARCHAR(60) NULL,
 id_prioridad              INT NULL,
 #id_causa                  INT NULL,        #OMITIRIA ESTE ID 
 id_causa_especifica       INT NULL,        #GUARDARIA EL ID DE LA CAUSA ESPECIFICA YA QUE CONTIENE EL ID DE CAUSA
 documento                 VARCHAR(160) NULL, #FILE
 detalle                   TEXT NULL,
 accion_inmediata          TEXT NULL,
 id_estado_semaforizacion  INT NULL,
 fecha_cierre              DATETIME  NULL,  #ultimo paso
 id_conclusion             INT NULL,        #ultimo paso
 id_tipo_semaforizacion    INT NULL,        #ultimo paso
 id_usuario                INT NULL,        #ultimo paso
 detalle_final             TEXT NULL,       #ultima campo agregado
 fecha_registro_sys        TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys          TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------






#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS TIPO_DOCUMENTO
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS TIPO_DOCUMENTO(
 id_tipo_documento     INT PRIMARY KEY AUTO_INCREMENT,
 nombre_documento      VARCHAR(35) NULL,
 fecha_registro_sys    TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------







#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS TIPO_PACIENTE
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS TIPO_PACIENTE(
 id_tipo_paciente       INT PRIMARY KEY AUTO_INCREMENT,
 nombre_tipo_paciente   VARCHAR(35) NULL,
 fecha_registro_sys     TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------






#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS ORIGEN
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS ORIGEN(
 id_origen             INT PRIMARY KEY AUTO_INCREMENT,
 nombre_origen         VARCHAR(35) NULL,
 fecha_registro_sys    TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------







#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS AREA
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS AREAS(
 id_area               INT PRIMARY KEY AUTO_INCREMENT,
 nombre_area           VARCHAR(35) NULL,
 fecha_registro_sys    TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------






#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS ESPECIALIDAD
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS ESPECIALIDAD(
 id_especialidad       INT PRIMARY KEY AUTO_INCREMENT,
 nombre_especialidad   VARCHAR(35) NULL,
 fecha_registro_sys    TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=UTF8_SPANISH_CI;
#-------------------------------------------------------------------------------------------------





 

#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS SERVICIO
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS SERVICIO(
 id_servicio           INT PRIMARY KEY AUTO_INCREMENT,
 nombre_servicio       VARCHAR(200) NULL,
 fecha_registro_sys    TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------







#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS HABITACION
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS HABITACION(
 id_habitacion         INT PRIMARY KEY AUTO_INCREMENT,
 nombre_habitacion     VARCHAR(100) NULL,
 fecha_registro_sys    TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------


 





#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS HABITACION
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS PISO(
 id_piso               INT PRIMARY KEY AUTO_INCREMENT,
 nombre_piso           VARCHAR(100) NULL,
 fecha_registro_sys    TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------

#PISO 2
#PISO 3
#PISO 4
#PISO 5
#PISO 6


CREATE TABLE IF NOT EXISTS HABITACION_PISO(
 id                    INT PRIMARY KEY AUTO_INCREMENT,
 id_habitacion         INT NULL,
 id_piso               INT NULL,
 fecha_registro_sys    TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS PROCEDENCIA
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS PROCEDENCIA(
 id_procedencia        INT PRIMARY KEY AUTO_INCREMENT,
 nombre_procedencia    VARCHAR(55) NULL,
 fecha_registro_sys    TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------






#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS PRIORIDAD
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS PRIORIDAD(
 id_prioridad          INT PRIMARY KEY AUTO_INCREMENT,
 nombre_prioridad      VARCHAR(55) NULL,
 fecha_registro_sys    TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------







#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS CAUSA
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS CAUSA(
 id_causa              INT PRIMARY KEY AUTO_INCREMENT,
 nombre_causa          VARCHAR(150) NULL,
 fecha_registro_sys    TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------



#estado semaforizacion -> 2 : cerrado / 1 : abierto
#tipo semaforizacion   -> 2 : incidencia / 1 : reclamo


#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS CAUSA_ESPECIFICA
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS CAUSA_ESPECIFICA(
 id_causa_especifica       INT PRIMARY KEY AUTO_INCREMENT,
 id_causa                  INT NULL,            #FORANEA DE CAUSA 
 nombre_causa_especifica   VARCHAR(150) NULL,
 fecha_registro_sys        TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys          TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------






#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS ESTADO_SEMAFORIZACION
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS ESTADO_SEMAFORIZACION(
 id_estado_semaforizacion       INT PRIMARY KEY AUTO_INCREMENT,
 nombre_estado_semaforizacion   VARCHAR(150) NULL,
 fecha_registro_sys             TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys               TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------





#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS CONCLUCION
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS CONCLUCION(
 id_conclusion         INT PRIMARY KEY AUTO_INCREMENT,
 nombre_conclusion     VARCHAR(150) NULL,
 fecha_registro_sys    TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------

 


#-------------------------------------------------------------------------------------------------
#CREATE TABLE IF NOT EXISTS TIPO_SEMAFORIZACION  : incidencia / reclamo
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS TIPO_SEMAFORIZACION(
 id_tipo_semaforizacion    INT PRIMARY KEY AUTO_INCREMENT,
 tipo_semaforizacion       VARCHAR(150) NULL,
 fecha_registro_sys        TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 fecha_update_sys          TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
#-------------------------------------------------------------------------------------------------





#-------------------------------------------------------------------------------------------------
#FORENEAS
#-------------------------------------------------------------------------------------------------
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_tipo_documento) REFERENCES TIPO_DOCUMENTO(id_tipo_documento);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_tipo_paciente) REFERENCES TIPO_PACIENTE(id_tipo_paciente);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_origen) REFERENCES ORIGEN(id_origen);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_area) REFERENCES AREAS(id_area);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_especialidad) REFERENCES ESPECIALIDAD(id_especialidad);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_servicio) REFERENCES SERVICIO(id_servicio);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_habitacion) REFERENCES HABITACION(id_habitacion);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_procedencia) REFERENCES PROCEDENCIA(id_procedencia);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_prioridad) REFERENCES PRIORIDAD(id_prioridad);
#ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_causa) REFERENCES CAUSA(id_causa);  #OMITIMOS
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_causa_especifica) REFERENCES CAUSA_ESPECIFICA(id_causa_especifica);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_estado_semaforizacion) REFERENCES ESTADO_SEMAFORIZACION(id_estado_semaforizacion);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_conclusion) REFERENCES CONCLUCION(id_conclusion);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_usuario) REFERENCES usuario(id_usuario);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_tipo_semaforizacion) REFERENCES TIPO_SEMAFORIZACION(id_tipo_semaforizacion);
#-------------------------------------------------------------------------------------------------
#FORENEA HABITACION
ALTER TABLE HABITACION_PISO ADD FOREIGN KEY(id_piso) REFERENCES PISO(id_piso);
ALTER TABLE HABITACION_PISO ADD FOREIGN KEY(id_habitacion) REFERENCES HABITACION(id_habitacion);
#-------------------------------------------------------------------------------------------------
#FORANEA CAUSA ESPECIFICA - CAUSA - NUEVO
ALTER TABLE CAUSA_ESPECIFICA ADD FOREIGN KEY(id_causa) REFERENCES CAUSA(id_causa);
#-------------------------------------------------------------------------------------------------




#-------------------------------------------------------------------------------------------------
#INSERT DATA
#-------------------------------------------------------------------------------------------------
INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `contra_usuario`, `perfil`, `area_usuario`, `foto`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (1, 'katty', 'sifuentes123', 'COORDINADOR', 'PAUS', 'image/foto.png', '2022-05-28 07:24:21', '2022-05-30 16:21:15');
INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `contra_usuario`, `perfil`, `area_usuario`, `foto`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (2, 'jalva', 'alva369', 'JEFE', 'PAUS', 'image/foto.png', '2022-05-28 07:24:21', '2022-05-28 09:48:32');
INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `contra_usuario`, `perfil`, `area_usuario`, `foto`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (3, 'gina', 'sernaque369', 'COORDINADOR', 'PAUS', 'image/foto.png', '2022-05-30 16:54:11', '2022-05-30 16:54:30');
INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `contra_usuario`, `perfil`, `area_usuario`, `foto`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (4, 'gabriela', 'dias798', 'COORDINADOR', 'PAUS', 'image/foto.png', '2022-05-30 16:54:51', '2022-05-30 16:54:55');
INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `contra_usuario`, `perfil`, `area_usuario`, `foto`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (5, 'angelita', 'salazar598', 'COORDINADOR', 'PAUS', 'image/foto.png', '2022-05-30 16:55:36', '2022-05-30 16:55:39');
INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `contra_usuario`, `perfil`, `area_usuario`, `foto`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (6, 'diana', 'poma389', 'COORDINADOR', 'PAUS', 'image/foto.png', '2022-05-30 16:56:11', '2022-05-30 16:56:16');


INSERT INTO TIPO_DOCUMENTO(nombre_documento) VALUES('DNI');
INSERT INTO TIPO_DOCUMENTO(nombre_documento) VALUES('CARNET EXTRANJERIA');
INSERT INTO TIPO_DOCUMENTO(nombre_documento) VALUES('PASAPORTE');


INSERT INTO TIPO_PACIENTE(nombre_tipo_paciente) VALUES('PARTICULAR');
INSERT INTO TIPO_PACIENTE(nombre_tipo_paciente) VALUES('COMPAÃ‘IA');


INSERT INTO ORIGEN(nombre_origen) VALUES('ADMINISTRATIVO');
INSERT INTO ORIGEN(nombre_origen) VALUES('MEDICO');
INSERT INTO ORIGEN(nombre_origen) VALUES('ASISTENCIAL');
INSERT INTO ORIGEN(nombre_origen) VALUES('OTROS');


#ADMINISTRATIVO 
INSERT INTO AREAS(nombre_area) VALUES('ADMISION AMBULATORIA');
INSERT INTO AREAS(nombre_area) VALUES('ADMISION EMERGENCIA');
INSERT INTO AREAS(nombre_area) VALUES('ADMISION HOSPITALARIA');
INSERT INTO AREAS(nombre_area) VALUES('ARCHIVO');
INSERT INTO AREAS(nombre_area) VALUES('AUTORIZACIONES');
INSERT INTO AREAS(nombre_area) VALUES('CAJA CENTRAL');
INSERT INTO AREAS(nombre_area) VALUES('CALIDAD');
INSERT INTO AREAS(nombre_area) VALUES('CENTRAL TELEFONICA');
INSERT INTO AREAS(nombre_area) VALUES('COMERCIAL');
INSERT INTO AREAS(nombre_area) VALUES('COORDINADOR(A)');
INSERT INTO AREAS(nombre_area) VALUES('DIETAS');
INSERT INTO AREAS(nombre_area) VALUES('ECOGRAFIA');
INSERT INTO AREAS(nombre_area) VALUES('FACTURACION');
INSERT INTO AREAS(nombre_area) VALUES('FARMACIA');
INSERT INTO AREAS(nombre_area) VALUES('GERENCIA');
INSERT INTO AREAS(nombre_area) VALUES('HOTELERIA');
INSERT INTO AREAS(nombre_area) VALUES('INFORMES CENTRAL');
INSERT INTO AREAS(nombre_area) VALUES('JEFE');
INSERT INTO AREAS(nombre_area) VALUES('LABORATORIO');
INSERT INTO AREAS(nombre_area) VALUES('LAVANDERIA');
INSERT INTO AREAS(nombre_area) VALUES('MANTENIMIENTO');
INSERT INTO AREAS(nombre_area) VALUES('MEDICINA FIS. Y REHAB.');
INSERT INTO AREAS(nombre_area) VALUES('PATOLOGIA');
INSERT INTO AREAS(nombre_area) VALUES('PAUS');
INSERT INTO AREAS(nombre_area) VALUES('PRESUPUESTOS');
INSERT INTO AREAS(nombre_area) VALUES('PROCESOS');
INSERT INTO AREAS(nombre_area) VALUES('RAYOS X');
INSERT INTO AREAS(nombre_area) VALUES('SALUD OCUPACIONAL');
INSERT INTO AREAS(nombre_area) VALUES('SECRETARIA');
INSERT INTO AREAS(nombre_area) VALUES('SEGURIDAD');
INSERT INTO AREAS(nombre_area) VALUES('SERVICIO GENERALES');
INSERT INTO AREAS(nombre_area) VALUES('SISTEMAS');
INSERT INTO AREAS(nombre_area) VALUES('LIMPIEZA');
INSERT INTO AREAS(nombre_area) VALUES('TESORERIA');
INSERT INTO AREAS(nombre_area) VALUES('COBRANZA');
INSERT INTO AREAS(nombre_area) VALUES('TOMOMEDIC');
INSERT INTO AREAS(nombre_area) VALUES('POLITICA');
INSERT INTO AREAS(nombre_area) VALUES('PLAN FAMILIAR');
INSERT INTO AREAS(nombre_area) VALUES('TELECONSULTA');
 
#MEDICO 
INSERT INTO AREAS(nombre_area) VALUES('ASISTENTE');
INSERT INTO AREAS(nombre_area) VALUES('DIRECCION.MEDICA');
INSERT INTO AREAS(nombre_area) VALUES('ECOGRAFIA');
INSERT INTO AREAS(nombre_area) VALUES('EMERGENCISTA.ADULTO');
INSERT INTO AREAS(nombre_area) VALUES('EMERGENCISTA.PEDIATRICO');
INSERT INTO AREAS(nombre_area) VALUES('ESPECIALISTA');
INSERT INTO AREAS(nombre_area) VALUES('INTERCONSULTA');
INSERT INTO AREAS(nombre_area) VALUES('LABORATORIO');
INSERT INTO AREAS(nombre_area) VALUES('MEDICO.AUDITOR');
INSERT INTO AREAS(nombre_area) VALUES('MEDICO.DE.PISO');
INSERT INTO AREAS(nombre_area) VALUES('MEDICO.TRATANTE');
INSERT INTO AREAS(nombre_area) VALUES('PATOLOGIA');
INSERT INTO AREAS(nombre_area) VALUES('SECRETARIA.DM');
INSERT INTO AREAS(nombre_area) VALUES('TRAMITE.DOCUMENTARIO');
INSERT INTO AREAS(nombre_area) VALUES('UCI');
INSERT INTO AREAS(nombre_area) VALUES('UCI.NEO');
INSERT INTO AREAS(nombre_area) VALUES('ANESTESIOLOGIA');
INSERT INTO AREAS(nombre_area) VALUES('OTROS');

#ASISTENCIAL
INSERT INTO AREAS(nombre_area) VALUES('COORDINADOR(A)');
INSERT INTO AREAS(nombre_area) VALUES('DIETAS');
INSERT INTO AREAS(nombre_area) VALUES('ERGOMETRIA');
INSERT INTO AREAS(nombre_area) VALUES('FARMACIA');
INSERT INTO AREAS(nombre_area) VALUES('LABORATORIO');
INSERT INTO AREAS(nombre_area) VALUES('MEDICINA FIS. Y REHAB.');
INSERT INTO AREAS(nombre_area) VALUES('OBSTETRICIA');
INSERT INTO AREAS(nombre_area) VALUES('PISO 2');
INSERT INTO AREAS(nombre_area) VALUES('PISO 3');
INSERT INTO AREAS(nombre_area) VALUES('PISO 4');
INSERT INTO AREAS(nombre_area) VALUES('PISO 5');
INSERT INTO AREAS(nombre_area) VALUES('PISO 6');
INSERT INTO AREAS(nombre_area) VALUES('RAYOS X');
INSERT INTO AREAS(nombre_area) VALUES('SOP');
INSERT INTO AREAS(nombre_area) VALUES('TOPICO');
INSERT INTO AREAS(nombre_area) VALUES('ECOGRAFIA');
INSERT INTO AREAS(nombre_area) VALUES('TOMOMEDIC');


#OTROS
INSERT INTO AREAS(nombre_area) VALUES('ESTACIONAMIENTO');
INSERT INTO AREAS(nombre_area) VALUES('MAQUINA DISPENSADORA'); 
INSERT INTO AREAS(nombre_area) VALUES('OBRAS');
INSERT INTO AREAS(nombre_area) VALUES('OPTOMETRÃA');
INSERT INTO AREAS(nombre_area) VALUES('OTROS*');


INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('ALERGOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CARDIOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CIRUGIA CARDIACA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CIRUGIA GENERAL');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CIRUGIA PLASTICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CIRUGIA DE MAMA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CIRUGIA MAXILOFACIAL');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CIRUGIA VASCULAR');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('DERMATOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('ENDOCRINOLOGIA Y NUTRICION');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('GASTROENTEROLOGIA DIGESTIVO');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('GENETICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('GERIATRIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('GINECOLOGIA Y OBSTETRICIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('HEMATOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('ENFERMEDADES DE HIGADO HEPATOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('ENFERMEDADES INFECCIOSAS');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('MEDICINA INTERNA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('NEFROLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('NEUMOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('NEUROLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('NEUROCIRUGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('OFTALMOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('OTORRINOLARINGOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('MEDICINA ONCOLOGICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('PEDIATRIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('PROCTOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('PSIQUIATRIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('RADIOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('REHABILITACION Y MED DEPORTIVA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('REUMATOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('TRAUMATOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('UROLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('ODONTOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('ANESTESIOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CIRUGIA DE CABEZA Y CUELLO');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CIRUGIA DE TORAX Y CARDIOVASCULAR');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CIRUGIA ONCOLOGICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('MEDICINA DE EMERGENCIA Y DESASTRES');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('MEDICINA FAMILIAR Y COMUNITARIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('MEDICINA HIPERBARICA Y SUBACUATICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('MEDICINA NUCLEAR');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('TOXICOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('NEONATOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('ENFERMERIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('EPIDEMIOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('ONCOLOGIA MEDICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('RADIOLOGIA INTERVENCIONISTA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('PSICOLOGIA ONCOLOGICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('UROLOGIA PEDIATRICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('AUDIOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CARDIOLOGIA CLINICA HEMODINAMICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CARDIOLOGIA PEDIATRICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CIRUGIA CARDIOVASCULAR');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CIRUGIA DE MANO');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CIRUGIA DE TORAX');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CIRUGIA PEDIATRICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('CIRUGIA PLASTICA PEDIATRICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('EMERGENCIA PEDIATRICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('ENDOCRINOLOGIA PEDIATRICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('FISIOTERAPIA RESPIRATORIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('GASTROENTEROLOGIA-PEDIATRICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('GINECOLOGIA ONCOLOGICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('MEDICINA GENERAL');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('MEDICINA INTENSIVA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('MEDICO CIRUJANO');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('NEFROLOGIA PEDIATRICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('NEUMOLOGIA PEDIATRICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('NEUROCIRUGIA PEDIATRICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('NEUROLOGIA PEDIATRICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('NUTRICIONISTA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('ODONTOPEDIATRIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('ONCOLOGIA PEDIATRICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('PSICOLOGIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('PSICOLOGIA INFANTIL');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('RADIOTERAPIA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('TERAPIA DEL DOLOR');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('UROLOGIA ONCOLOGICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('MEDICINA INTENSIVA PEDIATRICA');
INSERT INTO ESPECIALIDAD(nombre_especialidad) VALUES('NO APLICA ESPECIALIDAD');



INSERT INTO SERVICIO(nombre_servicio) VALUES('AMBULATORIO');
INSERT INTO SERVICIO(nombre_servicio) VALUES('EMERGENCIA');
INSERT INTO SERVICIO(nombre_servicio) VALUES('TOMOMEDIC');
INSERT INTO SERVICIO(nombre_servicio) VALUES('HOSPITALARIO');


INSERT INTO HABITACION(nombre_habitacion) VALUES('201');
INSERT INTO HABITACION(nombre_habitacion) VALUES('202');
INSERT INTO HABITACION(nombre_habitacion) VALUES('203');
INSERT INTO HABITACION(nombre_habitacion) VALUES('204');
INSERT INTO HABITACION(nombre_habitacion) VALUES('205');
INSERT INTO HABITACION(nombre_habitacion) VALUES('206');
INSERT INTO HABITACION(nombre_habitacion) VALUES('207');
INSERT INTO HABITACION(nombre_habitacion) VALUES('208');
INSERT INTO HABITACION(nombre_habitacion) VALUES('209');
INSERT INTO HABITACION(nombre_habitacion) VALUES('210');
INSERT INTO HABITACION(nombre_habitacion) VALUES('211');
INSERT INTO HABITACION(nombre_habitacion) VALUES('212');
INSERT INTO HABITACION(nombre_habitacion) VALUES('213');
INSERT INTO HABITACION(nombre_habitacion) VALUES('214');
INSERT INTO HABITACION(nombre_habitacion) VALUES('215');
INSERT INTO HABITACION(nombre_habitacion) VALUES('216');
INSERT INTO HABITACION(nombre_habitacion) VALUES('217');
INSERT INTO HABITACION(nombre_habitacion) VALUES('218');
INSERT INTO HABITACION(nombre_habitacion) VALUES('219');
INSERT INTO HABITACION(nombre_habitacion) VALUES('220');
INSERT INTO HABITACION(nombre_habitacion) VALUES('221');
INSERT INTO HABITACION(nombre_habitacion) VALUES('222');
INSERT INTO HABITACION(nombre_habitacion) VALUES('223');
INSERT INTO HABITACION(nombre_habitacion) VALUES('301');
INSERT INTO HABITACION(nombre_habitacion) VALUES('302');
INSERT INTO HABITACION(nombre_habitacion) VALUES('303');
INSERT INTO HABITACION(nombre_habitacion) VALUES('304');
INSERT INTO HABITACION(nombre_habitacion) VALUES('305');
INSERT INTO HABITACION(nombre_habitacion) VALUES('306');
INSERT INTO HABITACION(nombre_habitacion) VALUES('307');
INSERT INTO HABITACION(nombre_habitacion) VALUES('308');
INSERT INTO HABITACION(nombre_habitacion) VALUES('309');
INSERT INTO HABITACION(nombre_habitacion) VALUES('310');
INSERT INTO HABITACION(nombre_habitacion) VALUES('311');
INSERT INTO HABITACION(nombre_habitacion) VALUES('312');
INSERT INTO HABITACION(nombre_habitacion) VALUES('313');
INSERT INTO HABITACION(nombre_habitacion) VALUES('314');
INSERT INTO HABITACION(nombre_habitacion) VALUES('315');
INSERT INTO HABITACION(nombre_habitacion) VALUES('316');
INSERT INTO HABITACION(nombre_habitacion) VALUES('317');
INSERT INTO HABITACION(nombre_habitacion) VALUES('401');
INSERT INTO HABITACION(nombre_habitacion) VALUES('402');
INSERT INTO HABITACION(nombre_habitacion) VALUES('403');
INSERT INTO HABITACION(nombre_habitacion) VALUES('404');
INSERT INTO HABITACION(nombre_habitacion) VALUES('405');
INSERT INTO HABITACION(nombre_habitacion) VALUES('406');
INSERT INTO HABITACION(nombre_habitacion) VALUES('407');
INSERT INTO HABITACION(nombre_habitacion) VALUES('409');
INSERT INTO HABITACION(nombre_habitacion) VALUES('412');
INSERT INTO HABITACION(nombre_habitacion) VALUES('413');
INSERT INTO HABITACION(nombre_habitacion) VALUES('501');
INSERT INTO HABITACION(nombre_habitacion) VALUES('502');
INSERT INTO HABITACION(nombre_habitacion) VALUES('503');
INSERT INTO HABITACION(nombre_habitacion) VALUES('504');
INSERT INTO HABITACION(nombre_habitacion) VALUES('506');
INSERT INTO HABITACION(nombre_habitacion) VALUES('507');
INSERT INTO HABITACION(nombre_habitacion) VALUES('508');
INSERT INTO HABITACION(nombre_habitacion) VALUES('509');
INSERT INTO HABITACION(nombre_habitacion) VALUES('510');
INSERT INTO HABITACION(nombre_habitacion) VALUES('511');
INSERT INTO HABITACION(nombre_habitacion) VALUES('512');
INSERT INTO HABITACION(nombre_habitacion) VALUES('513');
INSERT INTO HABITACION(nombre_habitacion) VALUES('514');
INSERT INTO HABITACION(nombre_habitacion) VALUES('515');
INSERT INTO HABITACION(nombre_habitacion) VALUES('516');
INSERT INTO HABITACION(nombre_habitacion) VALUES('517');
INSERT INTO HABITACION(nombre_habitacion) VALUES('518');
INSERT INTO HABITACION(nombre_habitacion) VALUES('519');
INSERT INTO HABITACION(nombre_habitacion) VALUES('601');
INSERT INTO HABITACION(nombre_habitacion) VALUES('602');
INSERT INTO HABITACION(nombre_habitacion) VALUES('603');
INSERT INTO HABITACION(nombre_habitacion) VALUES('604');
INSERT INTO HABITACION(nombre_habitacion) VALUES('605');
INSERT INTO HABITACION(nombre_habitacion) VALUES('606');
INSERT INTO HABITACION(nombre_habitacion) VALUES('607');
INSERT INTO HABITACION(nombre_habitacion) VALUES('608');
INSERT INTO HABITACION(nombre_habitacion) VALUES('609');
INSERT INTO HABITACION(nombre_habitacion) VALUES('610');
INSERT INTO HABITACION(nombre_habitacion) VALUES('611');
INSERT INTO HABITACION(nombre_habitacion) VALUES('612');
INSERT INTO HABITACION(nombre_habitacion) VALUES('613');
INSERT INTO HABITACION(nombre_habitacion) VALUES('614');
INSERT INTO HABITACION(nombre_habitacion) VALUES('615');
INSERT INTO HABITACION(nombre_habitacion) VALUES('616');
INSERT INTO HABITACION(nombre_habitacion) VALUES('617');
INSERT INTO HABITACION(nombre_habitacion) VALUES('618');
INSERT INTO HABITACION(nombre_habitacion) VALUES('619');
INSERT INTO HABITACION(nombre_habitacion) VALUES('620');
INSERT INTO HABITACION(nombre_habitacion) VALUES('621');
INSERT INTO HABITACION(nombre_habitacion) VALUES('622');
INSERT INTO HABITACION(nombre_habitacion) VALUES('623');
INSERT INTO HABITACION(nombre_habitacion) VALUES('624');
INSERT INTO HABITACION(nombre_habitacion) VALUES('625');
INSERT INTO HABITACION(nombre_habitacion) VALUES('626');
INSERT INTO HABITACION(nombre_habitacion) VALUES('627');
INSERT INTO HABITACION(nombre_habitacion) VALUES('628');
INSERT INTO HABITACION(nombre_habitacion) VALUES('629');
INSERT INTO HABITACION(nombre_habitacion) VALUES('630');
INSERT INTO HABITACION(nombre_habitacion) VALUES('631');
INSERT INTO HABITACION(nombre_habitacion) VALUES('632');
INSERT INTO HABITACION(nombre_habitacion) VALUES('633');
INSERT INTO HABITACION(nombre_habitacion) VALUES('634');
INSERT INTO HABITACION(nombre_habitacion) VALUES('635');
INSERT INTO HABITACION(nombre_habitacion) VALUES('636');
INSERT INTO HABITACION(nombre_habitacion) VALUES('637');
INSERT INTO HABITACION(nombre_habitacion) VALUES('638');
INSERT INTO HABITACION(nombre_habitacion) VALUES('639');
INSERT INTO HABITACION(nombre_habitacion) VALUES('640');
INSERT INTO HABITACION(nombre_habitacion) VALUES('NO APLICA');



INSERT INTO PISO(nombre_piso) VALUES('PISO 2');
INSERT INTO PISO(nombre_piso) VALUES('PISO 3'); 
INSERT INTO PISO(nombre_piso) VALUES('PISO 4'); 
INSERT INTO PISO(nombre_piso) VALUES('PISO 5');
INSERT INTO PISO(nombre_piso) VALUES('PISO 6');   


INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (1,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (2,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (3,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (4,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (5,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (6,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (7,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (8,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (9,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (10,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (11,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (12,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (13,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (14,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (15,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (16,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (17,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (18,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (19,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (20,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (21,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (22,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (23,1);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (24,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (25,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (26,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (27,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (28,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (29,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (30,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (31,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (32,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (33,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (34,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (35,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (36,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (37,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (38,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (39,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (40,2);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (41,3);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (42,3);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (43,3);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (44,3);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (45,3);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (46,3);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (47,3);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (48,3);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (49,3);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (50,3);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (51,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (52,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (53,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (54,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (55,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (56,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (57,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (58,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (59,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (60,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (61,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (62,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (63,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (64,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (65,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (66,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (67,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (68,4);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (69,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (70,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (71,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (72,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (73,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (74,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (75,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (76,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (77,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (78,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (79,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (80,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (81,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (82,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (83,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (84,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (85,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (86,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (87,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (88,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (89,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (90,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (91,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (92,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (93,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (94,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (95,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (96,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (97,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (98,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (99,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (100,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (101,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (102,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (103,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (104,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (105,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (106,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (107,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (108,5);
INSERT INTO habitacion_piso (id_habitacion,id_piso) VALUES (109,5);



INSERT INTO PROCEDENCIA(nombre_procedencia) VALUES('LIBRO DE RECLAMACIONES');
INSERT INTO PROCEDENCIA(nombre_procedencia) VALUES('PRESENCIAL');
INSERT INTO PROCEDENCIA(nombre_procedencia) VALUES('CORREO');
INSERT INTO PROCEDENCIA(nombre_procedencia) VALUES('CARTA NOTARIAL');
INSERT INTO PROCEDENCIA(nombre_procedencia) VALUES('CARTA SIMPLE');
INSERT INTO PROCEDENCIA(nombre_procedencia) VALUES('SUSALUD');
INSERT INTO PROCEDENCIA(nombre_procedencia) VALUES('SBS');
INSERT INTO PROCEDENCIA(nombre_procedencia) VALUES('BUZON DE SUGERENCIAS');
INSERT INTO PROCEDENCIA(nombre_procedencia) VALUES('ASEGURADORA ');
INSERT INTO PROCEDENCIA(nombre_procedencia) VALUES('TELEFONICO');


INSERT INTO PRIORIDAD(nombre_prioridad) VALUES('MEDIA');
INSERT INTO PRIORIDAD(nombre_prioridad) VALUES('ALTA');
INSERT INTO PRIORIDAD(nombre_prioridad) VALUES('ATENCION');


INSERT INTO ESTADO_SEMAFORIZACION(nombre_estado_semaforizacion) VALUES('PENDIENTE');
INSERT INTO ESTADO_SEMAFORIZACION(nombre_estado_semaforizacion) VALUES('CERRADO');


INSERT INTO CONCLUCION(nombre_conclusion) VALUES('FUNDADO');
INSERT INTO CONCLUCION(nombre_conclusion) VALUES('INFUNDADO'); 
INSERT INTO CONCLUCION(nombre_conclusion) VALUES('IMPORCEDENTE'); 
INSERT INTO CONCLUCION(nombre_conclusion) VALUES('ANULADO'); 
INSERT INTO CONCLUCION(nombre_conclusion) VALUES('EN SEGUIMIENTO'); 


#TIPO SEMAFORIZACION
INSERT INTO TIPO_SEMAFORIZACION(tipo_semaforizacion) VALUES('RECLAMO'); 
INSERT INTO TIPO_SEMAFORIZACION(tipo_semaforizacion) VALUES('INCIDENCIA');


INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (1, 'CALIDAD.EN.LA.ATENCION.DE.SALUD', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (2, 'CONFIDENCIALIDAD.CONSENTIMIENTO.INFORMADO', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (3, 'DEFICIENCIA.EN.EL.ORDEN.LIMPIEZA.Y.O.BIOSEGURIDAD', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (4, 'DEFICIENCIA.EN.LA.ALIMENTACION', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (5, 'DEMORA.O.INCUMPLIMIENTO.EN.LA.PRESTACION.DE.SERVICIO.DE.SALUD', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (6, 'DISCONFORMIDAD.CON.EL.TRATO.RECIBIDO', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (7, 'DISCONFORMIDAD.CON.LOS.COBROS.POR.LA.ATENCION', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (8, 'IDENTIFICACION.DE.PACIENTES', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (9, 'INCONVENIENTES.CON.TRAMITES.ADMINISTRATIVOS', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (10, 'NO.CONFORMIDAD.CON.LA.PRESTACION.EL.SUMINISTRO.DE.MEDICAMENTOS.E.INSUMOS', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (11, 'OTROS.', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (12, 'PROBLEMAS.CON.EL.SERVICIO.DE.CITAS', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (13, 'RELATIVOS.A.LA.INFRAESTRUCTURA.Y.EL.EQUIPAMIENTO', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (14, 'INCONVENIENTES.CON.EL.SISTEMA', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (15, 'RELACIONADO.A.LA.COBERTURA.DE.EXAMENES', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (16, 'RELACIONADO.A.LOS.ANEXOS.DEL.SERVICIO', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (17, 'CHECK.IN.Y.OTROS.SERVICIOS', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (18, 'COMUNICACION.E.INFORMACION', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (19, 'HIGIENE.Y.CONFORT', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (20, 'INCONVENIENTES.CON.CENTRAL.TELEFONICA', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (21, 'REFERENTE.A.OTRAS.FUNCIONES', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (22, 'REFERENTE.AL.SERVICIO.DE.NUTRICION', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (23, 'RELATIVO.A.DOCUMENTACION', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (24, 'RELATIVO.A.LAS.INSTALACIONES', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (25, 'SEGURIDAD.DEL.PACIENTE', '2022-05-30 18:39:48', '2022-05-30 18:39:48');
INSERT INTO `CAUSA` (`id_causa`, `nombre_causa`, `fecha_registro_sys`, `fecha_update_sys`) VALUES (26, 'SERVICIOS.EXTERNOS', '2022-05-30 18:39:49', '2022-05-30 18:39:49');



#INSERT INTO CAUSA(nombre_causa) VALUES('CALIDAD.EN.LA.ATENCION.DE.SALUD');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('ATENCION MEDICA RECIBIDA',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('TRATAMIENTO MEDICO RECIBIDO',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RELACIONADO AL DIAGNOSTICO',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RELACIONADO CON LA REFERENCIA O TRASLADO',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RELACIONADO CON EL EXAMEN O PROCEDIMIENTO AUXILIAR',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('REACCION ALERGICA',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RELACIONADO A PROCEDIMIENTOS/PROTOCOLOS',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('PRESENTACION E INFORMACION DEL PERSONAL QUE BRINDA LA ATENCION',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('PERDIDA DE PLACA/HC',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RELACIONADO A LA VIA',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('SENTIMIENTO DE ABANDONO EN LA ATENCIÃ“N',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RELACIONADO A LA ATENCION ASISTENCIAL',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RELACIONADO A LA SOLICITUD DE EXAMENES',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RELACIONADO AL LLENADO DE LA HC',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('ERROR DE TIPEO',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALTA DE ETICA',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DOLOR A LA ADMINISTRACION DEL MEDICAMENTO',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('USO DE CELULAR',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RELACIONADO A LA INTERVENCION QUIRURGICA',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('ESPECIALIDAD  INCORRECTA',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INDICACION DE TRATAMIENTO VIA TELEFONO',1);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('ACTITUD INADECUADA DEL PERSONAL',1);


#INSERT INTO CAUSA(nombre_causa) VALUES('CONFIDENCIALIDAD.CONSENTIMIENTO.INFORMADO');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALTA DE CONFIDENCIALIDAD DE INFORMACION SOBRE EL PACIENTE',2);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('PRESENCIA DE PERSONAL NO AUTORIZADO EN EVALUACION CLINICA',2);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('REGISTRO NO CONSENTIDO DE IMÃGENES PERSONALES',2);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALTA DE CONSENTIMIENTO INFORMADO',2);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALTA DE PROTECCION SOBRE DATOS DEL PACIENTE',2);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('REFERENTE AL CONSENTIMIENTO INFORMADO',2);


#INSERT INTO CAUSA(nombre_causa) VALUES('DEFICIENCIA.EN.EL.ORDEN.LIMPIEZA.Y.O.BIOSEGURIDAD');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INDUMENTARIA DEL PERSONAL ASISTENCIAL',3);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('AMBIENTES DE ESPERA O DE TRANSITO',3);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('AMBIENTES DE ATENCION ASISTENCIAL',3);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('SERVICIOS HIGIENICOS',3);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('EQUIPOS, INSTRUMENTAL BIOMEDICO E INSUMOS',3);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('OTROS',3);


#INSERT INTO CAUSA(nombre_causa) VALUES('DEFICIENCIA.EN.LA.ALIMENTACION');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('NO CUMPLEN PREFERENCIAS DE ALIMENTACION',4);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALTA DE CONTROL DE CALIDAD',4);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DISCONFORMIDAD CON LA DIETA (SABOR, CANTIDAD, TEMPERATURA, ETC)',4);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA O FALTA DE ENTREGA SOBRE ESQUEMA DE DIETA',4);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RETRASO O FALTA DE ENTREGA DE DIETA',4);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('ERROR EN LA DIETA BRINDADA',4);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RETRASO O FALTA DE ENTREGA DE MENAJE',4);


#INSERT INTO CAUSA(nombre_causa) VALUES('DEMORA.O.INCUMPLIMIENTO.EN.LA.PRESTACION.DE.SERVICIO.DE.SALUD');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA EN LA ATENCION DE TRIAJE',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA O NO INGRESO A CONSULTORIO POR HISTORIA CLINICA Y/O PLACAS',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('OTROS',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA O FALTA EN ADMINISTRAR TRATAMIENTO',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('COLOCACION DE INYECTABLES CON RECETA DE OTRA INSTITUCION DE SALUD',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA AL ALTA',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA O SUSPENSION DE LA INTERVENCION QUIRURGICA',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA O FALTA DE VISITA MEDICA',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA CO NO INGRESO A CONSULTORIO POR DEMORA O AUSENCIA DEL MÃ‰DICO',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA O FALTA DE ATENCION DEL MEDICO INTERCONSULTANTE',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA O NO INGRESO A CONSULTORIO POR FALLA DEL PERSONAL DE SECRETARIA',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA EN EL PROCESO DE AUDITORÃA',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA EN LA REFERENCIA O TRASLADO',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA O FALTA DE ATENCION DEL MEDICO DE PISO',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('ALTA DE ACCESO A LA ATENCION',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INCUMPLIMIENTO DEL TRAMITE EN FECHA DE ENTREGA',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('ESPERA PROLONGADA PARA INGRESAR A TOPICO',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA EN ENTREGA DEL LIBRO DE RECLAMACIONES',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA O FALTA DE ATENCION ASISTENCIAL',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA EN INTERNAMIENTO',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA O FALTA DE ATENCION EN TOMA DE EXAMEN O PROCEDIMIENTO',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA EN ENTREGA DE RESULTADOS',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALTA DE PERSONAL',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RESPECTO AL PROCESAMIENTO DE MUESTRAS',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA O FALTA DE ATENCION DEL MEDICO DE EMERGENCIA',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('REFERENTE AL AVANCE DE CONSUMO',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('REFERENTE AL HORARIO DE VISITA Y/O INFORME MEDICO',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INCUMPLIMIENTO DEL HORARIO DE MEDICAMENTOS',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INCUMPLIMIENTO DEL PROCESO DE ALTA',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INCUMPLIMIENTO DE ATENCION PREFERENCIAL',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA EN LA ATENCION',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('AUSENCIA DE MEDICO ESPECIALISTA',5);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA EN LA DEVOLUCION DE DINERO',5);


#INSERT INTO CAUSA(nombre_causa) VALUES('DISCONFORMIDAD.CON.EL.TRATO.RECIBIDO');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DISCRIMINACION AL PACIENTE',6);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('MALTRATO EN LA ATENCION',6);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INDIFERENCIA EN LA ATENCION',6);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('MALA  ATENCION  RECIBIDA',6);


#INSERT INTO CAUSA(nombre_causa) VALUES('DISCONFORMIDAD.CON.LOS.COBROS.POR.LA.ATENCION');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RELATIVOS AL COPAGO',7);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('ERROR EN EL COBRO',7);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('COSTO ELEVADO',7);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('CONCEPTO DE CONSULTA',7);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('COBROS POR ADELANTADO',7);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('COBROS POR KIT EPP',7);


#INSERT INTO CAUSA(nombre_causa) VALUES('IDENTIFICACION.DE.PACIENTES');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INGRESO DE DATOS ERRADOS',8);


#INSERT INTO CAUSA(nombre_causa) VALUES('INCONVENIENTES.CON.TRAMITES.ADMINISTRATIVOS');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('ERROR EN LA EMISION DE LA ORDEN DE ATENCION',9);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('PERDIDA DE ORDEN',9);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('ERROR EN EL PRESUPUESTO',9);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('OTROS',9);



#INSERT INTO CAUSA(nombre_causa) VALUES('NO.CONFORMIDAD.CON.LA.PRESTACION.EL.SUMINISTRO.DE.MEDICAMENTOS.E.INSUMOS');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RELACIONADO CON LA RECETA',10);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DEMORA EN LA ENTREGA DE MEDICAMENTOS E INSUMOS',10);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('NO CONFORMIDAD CON EL MEDICAMENTO INDICADO',10);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALTA DE MEDICAMENTO O INSUMOS EN LA FARMACIA',10);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('MEDICAMENTO CONTRAINDICADO',10);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('MEDICAMENTOS VENCIDOS',10);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('ENTREGA INCOMPLETA DE MEDICAMENTOS',10);


#INSERT INTO CAUSA(nombre_causa) VALUES('OTROS.');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('OTROS',11);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('TOCAMIENTOS INDEBIDOS',11);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('EXTRAVIO DE OBEJTO(S) PERSONALE(S)',11);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('SOBRE PROCESOS DE CLINICA',11);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RUIDO O BULLA',11);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('GESTION DE VISITAS',11);


#INSERT INTO CAUSA(nombre_causa) VALUES('PROBLEMAS.CON.EL.SERVICIO.DE.CITAS');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('CITA MAL GENERADA',12);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DIFICULTAD PARA ENCONTRAR CITA',12);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('CANCELACION O REPROGRAMACION DE CITA',12);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('OTROS',12);


#INSERT INTO CAUSA(nombre_causa) VALUES('RELATIVOS.A.LA.INFRAESTRUCTURA.Y.EL.EQUIPAMIENTO');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INFRAESTRUCTURA',13);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('EQUIPAMIENTO',13);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('OTROS',13);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INCONVENIENTES POR OBRAS',13);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALTA DE SERVICIOS BASICOS',13);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALTA DE SEGURIDAD DEL PACIENTE',13);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('ESTADO DE HABITACIONES',13);


#INSERT INTO CAUSA(nombre_causa) VALUES('INCONVENIENTES.CON.EL.SISTEMA');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('WIFI',14);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALLA O CAIDA',14);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('OTROS',14);


#INSERT INTO CAUSA(nombre_causa) VALUES('RELACIONADO.A.LA.COBERTURA.DE.EXAMENES');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALTA DE APROBACION',15);


#INSERT INTO CAUSA(nombre_causa) VALUES('RELACIONADO.A.LOS.ANEXOS.DEL.SERVICIO');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('NO RESPONDEN LA LLAMADA',16);


#INSERT INTO CAUSA(nombre_causa) VALUES('CHECK.IN.Y.OTROS.SERVICIOS');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('ENTREGA DE HABITACION',17);


#INSERT INTO CAUSA(nombre_causa) VALUES('COMUNICACION.E.INFORMACION');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INFORMACION INAPROPIADA O RIESGOSA',18);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALTA DE INFORMACION O INFORMACION INSUFICIENTE',18);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALTA DE CANCELACION DE CITA',18);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INFORMACION INCORRECTA',18);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALTA DE CLARIDAD EN LA INFORMACION',18);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('FALTA DE COMUNICACIÃ“N CON EL MEDICO TRATANTE',18);


#INSERT INTO CAUSA(nombre_causa) VALUES('HIGIENE.Y.CONFORT');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('REFERENTE AL CAMBIO DE ROPA DE CAMA Y/O TOALLAS',19);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('REFERENTE A LOS ARTICULOS DE ASEAO PERSONAL',19);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('REFRERETNE AL ESTADO DE PRENDAS',19);


#INSERT INTO CAUSA(nombre_causa) VALUES('INCONVENIENTES.CON.CENTRAL.TELEFONICA');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('NO DERIVAN LA LLAMADA',20);



#INSERT INTO CAUSA(nombre_causa) VALUES('REFERENTE.A.OTRAS.FUNCIONES');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DIETA NO ACTUALIZADA',21);


#INSERT INTO CAUSA(nombre_causa) VALUES('REFERENTE.AL.SERVICIO.DE.NUTRICION');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INCONVENIENTES CON LA VISITA DE LA NUTRICIONISTA',22);


#INSERT INTO CAUSA(nombre_causa) VALUES('RELATIVO.A.DOCUMENTACION');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INCUMPLIMIENTO DE ENVIO',23);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INCUMPLIMIENTO DE ENTREGA ',23);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('OTROS',23);


#INSERT INTO CAUSA(nombre_causa) VALUES('RELATIVO.A.LAS.INSTALACIONES');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('DAÃ‘OS OCASIONADO AL VEHICULO',24);


#INSERT INTO CAUSA(nombre_causa) VALUES('SEGURIDAD.DEL.PACIENTE');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('CAIDA O ACCIDENTE',25);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('INGRESO CON ACOMPAÃ‘ANTE POR AFORO',25);


#INSERT INTO CAUSA(nombre_causa) VALUES('SERVICIOS.EXTERNOS');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RELACIONADO AL VALET PARKING',26);
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica,id_causa) VALUES('RELACIONADO A LA AMBULANCIA',26);
#-------------------------------------------------------------------------------------------------


 



#-------------------------------------------------------------------------------------------------
#STORE PROCEDURE
#-------------------------------------------------------------------------------------------------
DELIMITER $
CREATE PROCEDURE SP_INCIDENCIA_INSERT(
 IN mes_incidencia            VARCHAR(10),
 IN fecha_incidencia          DATETIME,
 IN id_tipo_documento         INT,
 IN numero_documento          VARCHAR(60),
 IN paciente                  VARCHAR(250),
 IN id_tipo_paciente          INT,
 IN id_origen                 INT,
 IN id_area                   INT,
 IN id_especialidad           INT,
 IN personal_involucrado      VARCHAR(250),
 IN id_servicio               INT,
 IN id_habitacion             INT, #cambio
 IN id_procedencia            INT,
 IN numero_procedencia        VARCHAR(60),
 IN tomo                      VARCHAR(60),
 IN id_prioridad              INT,
 #IN id_causa                  INT, #OMITIMOS
 IN id_causa_especifica       INT,
 IN documento                 VARCHAR(160),
 IN detalle                   TEXT,
 IN accion_inmediata          TEXT,
 IN id_estado_semaforizacion  INT,
 IN fecha_cierre              DATETIME,
 IN id_conclusion             INT,
 IN id_tipo_semaforizacion    INT,
 IN id_usuario                INT
)
BEGIN
DECLARE maximo VARCHAR(100);
DECLARE numero INT;
DECLARE num_requerimiento VARCHAR(100);  

SET maximo = (SELECT MAX(id) FROM SEMAFORIZACION);
SET numero = (SELECT LTRIM(RIGHT(maximo,3)));

if numero>=1 AND numero<=9 then 
   SET numero = numero + 1;
   SET num_requerimiento = (SELECT CONCAT('S-0000000', CAST(numero AS CHAR)));
   
ELSEIF numero>=9 AND numero<=99 then
   SET numero = numero + 1;
   SET num_requerimiento = (SELECT CONCAT('S-000000', CAST(numero AS CHAR)));
   
ELSEIF numero>=99 AND numero<=999 then
   SET numero = numero + 1;
   SET num_requerimiento = (SELECT CONCAT('S-00000', CAST(numero AS CHAR)));
   
ELSEIF numero>=999 AND numero<=9999 then
   SET numero = numero + 1;
   SET num_requerimiento = (SELECT CONCAT('S-0000', CAST(numero AS CHAR)));

ELSEIF numero>=9999 AND numero<=99999 then
   SET numero = numero + 1;
   SET num_requerimiento = (SELECT CONCAT('S-000', CAST(numero AS CHAR)));
   
ELSEIF numero>=99999 AND numero<=999999 then
   SET numero = numero + 1;
   SET num_requerimiento = (SELECT CONCAT('S-00', CAST(numero AS CHAR)));
   
ELSEIF numero>=999999 AND numero<=9999999 then
   SET numero = numero + 1;
   SET num_requerimiento = (SELECT CONCAT('S-0', CAST(numero AS CHAR)));
   
ELSE 
   SET num_requerimiento = (SELECT 'S-00000001');
END if; 
   
   #OMITIMOS: id_causa
   INSERT INTO SEMAFORIZACION(num_requerimiento,mes_incidencia,fecha_incidencia,id_tipo_documento,numero_documento,paciente ,
                              id_tipo_paciente,id_origen,id_area,id_especialidad,personal_involucrado,id_servicio,
                              id_habitacion,id_procedencia,numero_procedencia,tomo,id_prioridad,id_causa_especifica,
                              documento,detalle,accion_inmediata,id_estado_semaforizacion,fecha_cierre,id_conclusion,id_tipo_semaforizacion,id_usuario)
   VALUES(num_requerimiento,mes_incidencia,fecha_incidencia,id_tipo_documento,numero_documento,paciente ,
                              id_tipo_paciente,id_origen,id_area,id_especialidad,personal_involucrado,id_servicio,
                              id_habitacion,id_procedencia,numero_procedencia,tomo,id_prioridad,id_causa_especifica,
                              documento,detalle,accion_inmediata,id_estado_semaforizacion,fecha_cierre,id_conclusion,id_tipo_semaforizacion,id_usuario);
   
END $
#-------------------------------------------------------------------------------------------------





#-------------------------------------------------------------------------------------------------
#SELECT DATA
#-------------------------------------------------------------------------------------------------
#INCIDENCIAS PENDIENTES
SELECT * FROM SEMAFORIZACION sema 
      INNER JOIN estado_semaforizacion estasema ON estasema.id_estado_semaforizacion = sema.id_estado_semaforizacion 
      INNER JOIN tipo_semaforizacion tiposema ON tiposema.id_tipo_semaforizacion = sema.id_tipo_semaforizacion 
      INNER JOIN tipo_documento tipodoc ON tipodoc.id_tipo_documento = sema.id_tipo_documento 
		INNER JOIN tipo_paciente tipopac ON tipopac.id_tipo_paciente = sema.id_tipo_paciente
		INNER JOIN origen org ON org.id_origen = sema.id_origen 
		INNER JOIN servicio ser ON ser.id_servicio = sema.id_servicio
		INNER JOIN procedencia pro ON pro.id_procedencia = sema.id_procedencia 
		INNER JOIN areas ar ON ar.id_area = sema.id_area
		INNER JOIN prioridad prio ON prio.id_prioridad = sema.id_prioridad
		WHERE sema.id_estado_semaforizacion IN ('1') AND sema.id_tipo_semaforizacion IN('2') 
      


#INCIDENCIA CERRADA
SELECT * FROM SEMAFORIZACION sema 
      INNER JOIN  estado_semaforizacion estasema ON estasema.id_estado_semaforizacion = sema.id_estado_semaforizacion 
      INNER JOIN tipo_semaforizacion tiposema ON tiposema.id_tipo_semaforizacion = sema.id_tipo_semaforizacion 
      WHERE sema.id_estado_semaforizacion IN ('2') AND sema.id_tipo_semaforizacion IN('2') 


#RECLAMOS CERRADO
SELECT * FROM SEMAFORIZACION sema 
      INNER JOIN  estado_semaforizacion estasema ON estasema.id_estado_semaforizacion = sema.id_estado_semaforizacion 
      INNER JOIN tipo_semaforizacion tiposema ON tiposema.id_tipo_semaforizacion = sema.id_tipo_semaforizacion 
      WHERE sema.id_estado_semaforizacion IN ('2') AND sema.id_tipo_semaforizacion IN('1') 

#-------------------------------------------------------------------------------------------------
#STORAGE PROCEDURE
#-------------------------------------------------------------------------------------------------






````
