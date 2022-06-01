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
 habitacion                VARCHAR(50) NULL,
 id_procedencia            INT NULL,
 numero_procedencia        VARCHAR(60) NULL,
 tomo                      VARCHAR(60) NULL,
 id_prioridad              INT NULL,
 id_causa                  INT NULL,
 id_causa_especifica       INT NULL,
 documento                 VARCHAR(160) NULL, #FILE
 detalle                   TEXT NULL,
 accion_inmediata          TEXT NULL,
 id_estado_semaforizacion  INT NULL,
 fecha_cierre              DATETIME  NULL,
 id_conclusion             INT NULL,
 id_tipo_semaforizacion    INT NULL,
 id_usuario                INT NULL,
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
#ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_habitacion) REFERENCES HABITACION(id_habitacion);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_procedencia) REFERENCES PROCEDENCIA(id_procedencia);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_prioridad) REFERENCES PRIORIDAD(id_prioridad);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_causa) REFERENCES CAUSA(id_causa);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_causa_especifica) REFERENCES CAUSA_ESPECIFICA(id_causa_especifica);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_estado_semaforizacion) REFERENCES ESTADO_SEMAFORIZACION(id_estado_semaforizacion);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_conclusion) REFERENCES CONCLUCION(id_conclusion);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_usuario) REFERENCES usuario(id_usuario);
ALTER TABLE SEMAFORIZACION ADD FOREIGN KEY(id_tipo_semaforizacion) REFERENCES TIPO_SEMAFORIZACION(id_tipo_semaforizacion);
#-------------------------------------------------------------------------------------------------




#-------------------------------------------------------------------------------------------------
#INSERT DATA
#-------------------------------------------------------------------------------------------------
INSERT INTO TIPO_DOCUMENTO(nombre_documento) VALUES('DNI');
INSERT INTO TIPO_DOCUMENTO(nombre_documento) VALUES('CARNET EXTRANJERIA');
INSERT INTO TIPO_DOCUMENTO(nombre_documento) VALUES('PASAPORTE');


INSERT INTO TIPO_PACIENTE(nombre_tipo_paciente) VALUES('PARTICULAR');
INSERT INTO TIPO_PACIENTE(nombre_tipo_paciente) VALUES('COMPAÑÍA');


INSERT INTO ORIGEN(nombre_origen) VALUES('ASISTENCIAL');
INSERT INTO ORIGEN(nombre_origen) VALUES('ADMINISTRATIVO');
INSERT INTO ORIGEN(nombre_origen) VALUES('ASISTENCIAL');
INSERT INTO ORIGEN(nombre_origen) VALUES('OTROS');


INSERT INTO AREAS(nombre_area) VALUES('EMERGENCIA');
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


INSERT INTO SERVICIO(nombre_servicio) VALUES('AMBULATORIO');
INSERT INTO SERVICIO(nombre_servicio) VALUES('EMERGENCIA');
INSERT INTO SERVICIO(nombre_servicio) VALUES('TOMOMEDIC');
INSERT INTO SERVICIO(nombre_servicio) VALUES('HOSPITALARIO');

#insert habitacion

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


INSERT INTO PRIORIDAD(nombre_prioridad) VALUES('ALTA');
INSERT INTO PRIORIDAD(nombre_prioridad) VALUES('MEDIA');
INSERT INTO PRIORIDAD(nombre_prioridad) VALUES('ATENCION');


INSERT INTO CAUSA(nombre_causa) VALUES('CALIDAD.EN.LA.ATENCION.DE.SALUD');
INSERT INTO CAUSA(nombre_causa) VALUES('CONFIDENCIALIDAD.CONSENTIMIENTO.INFORMADO');
INSERT INTO CAUSA(nombre_causa) VALUES('DEFICIENCIA.EN.EL.ORDEN.LIMPIEZA.Y.O.BIOSEGURIDAD');
INSERT INTO CAUSA(nombre_causa) VALUES('DEFICIENCIA.EN.LA.ALIMENTACION');
INSERT INTO CAUSA(nombre_causa) VALUES('DEMORA.O.INCUMPLIMIENTO.EN.LA.PRESTACION.DE.SERVICIO.DE.SALUD');
INSERT INTO CAUSA(nombre_causa) VALUES('DISCONFORMIDAD.CON.EL.TRATO.RECIBIDO');
INSERT INTO CAUSA(nombre_causa) VALUES('DISCONFORMIDAD.CON.LOS.COBROS.POR.LA.ATENCION');
INSERT INTO CAUSA(nombre_causa) VALUES('IDENTIFICACION.DE.PACIENTES');
INSERT INTO CAUSA(nombre_causa) VALUES('INCONVENIENTES.CON.TRAMITES.ADMINISTRATIVOS');
INSERT INTO CAUSA(nombre_causa) VALUES('NO.CONFORMIDAD.CON.LA.PRESTACION.EL.SUMINISTRO.DE.MEDICAMENTOS.E.INSUMOS');
INSERT INTO CAUSA(nombre_causa) VALUES('OTROS.');
INSERT INTO CAUSA(nombre_causa) VALUES('PROBLEMAS.CON.EL.SERVICIO.DE.CITAS');
INSERT INTO CAUSA(nombre_causa) VALUES('RELATIVOS.A.LA.INFRAESTRUCTURA.Y.EL.EQUIPAMIENTO');
INSERT INTO CAUSA(nombre_causa) VALUES('INCONVENIENTES.CON.EL.SISTEMA');
INSERT INTO CAUSA(nombre_causa) VALUES('RELACIONADO.A.LA.COBERTURA.DE.EXAMENES');
INSERT INTO CAUSA(nombre_causa) VALUES('RELACIONADO.A.LOS.ANEXOS.DEL.SERVICIO');
INSERT INTO CAUSA(nombre_causa) VALUES('CHECK.IN.Y.OTROS.SERVICIOS');
INSERT INTO CAUSA(nombre_causa) VALUES('COMUNICACION.E.INFORMACION');
INSERT INTO CAUSA(nombre_causa) VALUES('HIGIENE.Y.CONFORT');
INSERT INTO CAUSA(nombre_causa) VALUES('INCONVENIENTES.CON.CENTRAL.TELEFONICA');
INSERT INTO CAUSA(nombre_causa) VALUES('REFERENTE.A.OTRAS.FUNCIONES');
INSERT INTO CAUSA(nombre_causa) VALUES('REFERENTE.AL.SERVICIO.DE.NUTRICION');
INSERT INTO CAUSA(nombre_causa) VALUES('RELATIVO.A.DOCUMENTACION');
INSERT INTO CAUSA(nombre_causa) VALUES('RELATIVO.A.LAS.INSTALACIONES');
INSERT INTO CAUSA(nombre_causa) VALUES('SEGURIDAD.DEL.PACIENTE');
INSERT INTO CAUSA(nombre_causa) VALUES('SERVICIOS.EXTERNOS');


INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA.O.INCUMPLIMIENTO.EN.LA.PRESTACION.DE.SERVICIO.DE.SALUD');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA EN LA ATENCION DE TRIAJE');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('OTROS');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA O FALTA EN ADMINISTRAR TRATAMIENTO');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('COLOCACION DE INYECTABLES CON RECETA DE OTRA INSTITUCION DE SALUD');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA AL ALTA');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA O SUSPENSION DE LA INTERVENCION QUIRURGICA');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA O FALTA DE VISITA MEDICA');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA CO NO INGRESO A CONSULTORIO POR DEMORA O AUSENCIA DEL MÉDICO');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA O FALTA DE ATENCION DEL MEDICO INTERCONSULTANTE');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA O NO INGRESO A CONSULTORIO POR FALLA DEL PERSONAL DE SECRETARIA');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA EN EL PROCESO DE AUDITORÍA');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA EN LA REFERENCIA O TRASLADO');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA O FALTA DE ATENCION DEL MEDICO DE PISO');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('FALTA DE ACCESO A LA ATENCION');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('INCUMPLIMIENTO DEL TRAMITE EN FECHA DE ENTREGA');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('ESPERA PROLONGADA PARA INGRESAR A TOPICO');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA EN ENTREGA DEL LIBRO DE RECLAMACIONES');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA O FALTA DE ATENCION ASISTENCIAL');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA EN INTERNAMIENTO');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA O FALTA DE ATENCION EN TOMA DE EXAMEN O PROCEDIMIENTO');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA EN ENTREGA DE RESULTADOS');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('FALTA DE PERSONAL');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('RESPECTO AL PROCESAMIENTO DE MUESTRAS');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA O FALTA DE ATENCION DEL MEDICO DE EMERGENCIA');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('REFERENTE AL AVANCE DE CONSUMO');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('REFERENTE AL HORARIO DE VISITA Y/O INFORME MEDICO ');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('INCUMPLIMIENTO DEL HORARIO DE MEDICAMENTOS');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('INCUMPLIMIENTO DEL PROCESO DE ALTA');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('INCUMPLIMIENTO DE ATENCION PREFERENCIAL');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA EN LA ATENCION');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('AUSENCIA DE MEDICO ESPECIALISTA ');
INSERT INTO CAUSA_ESPECIFICA(nombre_causa_especifica) VALUES('DEMORA EN LA DEVOLUCION DE DINERO');


INSERT INTO ESTADO_SEMAFORIZACION(nombre_estado_semaforizacion) VALUES('PENDIENTE');
INSERT INTO ESTADO_SEMAFORIZACION(nombre_estado_semaforizacion) VALUES('CERRADO');


INSERT INTO CONCLUCION(nombre_conclusion) VALUES('FUNDADO');
INSERT INTO CONCLUCION(nombre_conclusion) VALUES('INFUNDADO'); 
INSERT INTO CONCLUCION(nombre_conclusion) VALUES('IMPORCEDENTE'); 
INSERT INTO CONCLUCION(nombre_conclusion) VALUES('ANULADO'); 


INSERT INTO TIPO_SEMAFORIZACION(tipo_semaforizacion) VALUES('RECLAMO'); 
INSERT INTO TIPO_SEMAFORIZACION(tipo_semaforizacion) VALUES('INCIDENCIA');
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
 IN habitacion                VARCHAR(50),
 IN id_procedencia            INT,
 IN numero_procedencia        VARCHAR(60),
 IN tomo                      VARCHAR(60),
 IN id_prioridad              INT,
 IN id_causa                  INT,
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

   INSERT INTO SEMAFORIZACION(num_requerimiento,mes_incidencia,fecha_incidencia,id_tipo_documento,numero_documento,paciente ,
                              id_tipo_paciente,id_origen,id_area,id_especialidad,personal_involucrado,id_servicio,
                              habitacion,id_procedencia,numero_procedencia,tomo,id_prioridad,id_causa,id_causa_especifica,
                              documento,detalle,accion_inmediata,id_estado_semaforizacion,fecha_cierre,id_conclusion,id_tipo_semaforizacion,id_usuario)
   VALUES(num_requerimiento,mes_incidencia,fecha_incidencia,id_tipo_documento,numero_documento,paciente ,
                              id_tipo_paciente,id_origen,id_area,id_especialidad,personal_involucrado,id_servicio,
                              habitacion,id_procedencia,numero_procedencia,tomo,id_prioridad,id_causa,id_causa_especifica,
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
		INNER JOIN procedenciordenes_hospitalarioa pro ON pro.id_procedencia = sema.id_procedencia 
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




SELECT * FROM estado_semaforizacion;
#-------------------------------------------------------------------------------------------------
#STORAGE PROCEDURE
#-------------------------------------------------------------------------------------------------








````
