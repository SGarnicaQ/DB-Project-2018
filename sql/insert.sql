USE ProyectoDB;
--
-- Insert data
--

INSERT INTO PAIS VALUES
("COL","COLOMBIA"),
("ALE","ALEMANIA"),
("RUS","RUSIA"),
("FRA","FRANCIA"),
("ITA","ITALIA"),
("ING","INGLATERRA"),
("USA","ESTADOS UNIDOS"),
("JP","JAPON");
INSERT INTO CIUDAD VALUES
("COL","BOG","BOGOTA"),
("COL","MED","MEDELLIN"),
("COL","CAL","CALI"),
("COL","PER","PEREIRA"),
("ALE","BRL","BERLIN"),
("RUS","MOS","MOSCU"),
("FRA","PAR","PARIS"),
("ITA","ROM","ROMA"),
("ING","LON","LONDRES"),
("USA","NY","NEW YORK"),
("JP","TK","TOKYO");
INSERT INTO TIPO_INSTITUCION VALUES
(1,"Publica"),
(2,"Privada"),
(3,"Universidad Publica"),
(4,"Universidad Privada");

-- id, tipo, pais, ciudad, nombre
INSERT INTO INSTITUCION VALUES
(1,3,"COL","BOG","Universidad Nacional"),
(2,4,"COL","BOG","Universidad de los Andes"),
(3,2,"USA","NY","GOOGLE"),
(4,1,"FRA","PAR","France"),
(5,2,"JP","TK","SenseiBenkyo"),
(6,2,"USA","NY","Harvard");
INSERT INTO DEPARTAMENTO VALUES
(1,"Sistemas e Industrial"),
(2,"Electronica"),
(3,"Quimica"),
(4,"Electrica");


INSERT INTO TIPO_PROGRAMA VALUES
(1,"Diplomado"),
(2,"Extension"),
(3,"Actualizacion"),
(4,"Formacion");
INSERT INTO TIPO_DOCENTE VALUES
(1,"Maestria"),
(2,"Ocasional"),
(3,"Planta");
INSERT INTO ENFOQUE VALUES
(1,"Pedagogia"),
(2,"Inclusion social"),
(3,"Braile"),
(4,"Lenguaje de senas");

-- id, inst, enfoque, tipo, tema, costo, descripcion, acreditacion, fecha ini, fecha fin
INSERT INTO PROGRAMA VALUES
(1,1,1,2,"Programacion Base de Datos Oracle PL/SQL ",1200000,"Programacion en Base de Datos,  proporciona todo el conocimiento relacionado con PL/SQL. El participante obtendra la capacidad de interactuar con los objetos de Base de Datos ( tablas, vistas, indices, secuencias, sinonimos), asi mismo comprendera y utilizara los diferentes comandos DDL ( Lenguaje de Definicion de Datos)  y DML (Lenguaje de Manipulacion de Datos) entre otras habilidades que desarrollara a traves del curso.",true,"17-11-07","17-11-30"),
(2,4,3,4,"Braile I",300000,"Aprenderas la cosas basicas para leer y escribir en braile",false,"18-1-10","18-2-10"),
(3,4,3,4,"Braile II",200000,"Profundizacion en ensenanza de braile",true,"18-6-10","18-6-30"),
(4,2,4,4,"Senas I",1300000,"Interaccion basica en lenguaje de senas",true,"18-8-01","18-9-01"),
(5,2,4,4,"Senas II",450000,"Lenguaje de senas, mas rapido y eficiente",false,"18-9-01","18-10-01"),
(6,2,4,4,"Senas III",350000,"Lenguaje de senas, ultima fase",false,"18-11-01","18-12-01"),
(7,6,1,3,"Aalborg",100000,"Viaja a aalborg para ver un curso de profundizacion",true,"18-9-01","18-10-01"),
(8,3,1,1,"Big data",4000000,"Toma un Diplomado en el cual seras el mejor ingeniero en big data",true,"15-9-01","15-10-01"),
(9,5,2,1,"Curso I",600000,"Curso de inclusion social numero 1",false,"16-9-01","16-10-01"),
(10,5,2,4,"Curso II",600000,"Curso de inclusion social numero 2",false,"16-10-02","16-11-02");

-- ced, tipo, departamento
INSERT INTO DOCENTE (CEDULA,ID_TIPO_DOC,ID_DEP,NOMBRE_DOC,APELLIDO_DOC,CORREO_INST) VALUES
(101,3,1,"Juan Carlos","Torres Pardo","jctorresp@unal.edu.co"),
(102,3,1,"Wilson","Adarme Jaimes","wadarmej@unal.edu.co"),
(103,3,1,"Ingrid Patricia","Paez Parra","ippaezp@unal.edu.co"),
(104,3,2,"Pedro Antonio","Garcia Moreno","pagarciam@unal.edu.co"),
(105,1,2,"Juan Augusto","Manana Hernandez","jamananah@unal.edu.co"),
(106,3,2,"Sandra Liliana","Romero Castro","slromeroc@unal.edu.co"),
(107,3,2,"Angelica","Alvarez Arias","aalvareza@unal.edu.co"),
(108,1,3,"Kimberly","Tovar Acosta","ktovara@unal.edu.co"),
(109,2,3,"Edgar Roberto","Castellanos Mendoza","ercastellanosm@unal.edu.co"),
(110,2,3,"Diana","Carrillo Castillo","dcarrilloc@unal.edu.co"),
(111,1,1,"Andres Felipe","Castillo Sopo","acastillos@unal.edu.co"),
(112,1,1,"Sebastian","Garnica Quiroz","sgarnicaq@unal.edu.co"),
(113,1,1,"Nicolas Eduardo","Pardo Arias","npardoa@unal.edu.co");


-- prerequisito, id
INSERT INTO PROGRAMA_PROGRAMA VALUES
(2,3),
(4,5),
(5,6),
(9,10);

-- ced, id_programa
INSERT INTO PROGRAMA_DOCENTE VALUES
(101,1),(101,2),(101,3),(101,4),(101,5),(101,6),(101,7),(101,8),(101,9),(101,10),
(102,1),(102,2),
(103,1),(103,2),(103,3),
(104,8),
(105,1), (105,4),
(108,1),(108,2), (108,5),
(109,4),(109,5),(109,7),
(110,4),(110,5),(110,9),(110,10);
