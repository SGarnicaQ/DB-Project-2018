USE ProyectoDB;
/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     4/06/2018 7:25:28 p.m.                       */
/*==============================================================*/


drop table if exists CIUDAD;

drop table if exists DEPARTAMENTO;

drop table if exists DOCENTE;

drop table if exists ENFOQUE;

drop table if exists INSTITUCION;

drop table if exists PAIS;

drop table if exists PROGRAMA;

drop table if exists PROGRAMA_DOCENTE;

drop table if exists PROGRAMA_PROGRAMA;

drop table if exists TIPO_DOCENTE;

drop table if exists TIPO_INSTITUCION;

drop table if exists TIPO_PROGRAMA;

/*==============================================================*/
/* Table: CIUDAD                                                */
/*==============================================================*/
create table CIUDAD
(
   COD_PAIS             varchar(4) not null,
   COD_CIUDAD           varchar(4) not null,
   NOMBRE_CIUDAD        varchar(50) not null,
   primary key (COD_PAIS, COD_CIUDAD)
);

/*==============================================================*/
/* Table: DEPARTAMENTO                                          */
/*==============================================================*/
create table DEPARTAMENTO
(
   ID_DEP               smallint not null,
   NOMBRE_DEP           varchar(100) not null,
   primary key (ID_DEP)
);

/*==============================================================*/
/* Table: DOCENTE                                               */
/*==============================================================*/
create table DOCENTE
(
   CEDULA               int not null,
   ID_TIPO_DOC          smallint not null,
   ID_DEP               smallint not null,
   NOMBRE_DOC           varchar(50) not null,
   APELLIDO_DOC         varchar(50) not null,
   CORREO_INST          varchar(50) not null,
   CELULAR              int not null,
   TEL                  int,
   IMAGEN_PERFIL        longblob,
   NOMBRE_USUARIO       varchar(50),
   CONTRASENA           varchar(200),
   primary key (CEDULA)
);

/*==============================================================*/
/* Table: ENFOQUE                                               */
/*==============================================================*/
create table ENFOQUE
(
   ID_ENFOQUE           smallint not null,
   NOMBRE_ENFOQUE       varchar(70) not null,
   primary key (ID_ENFOQUE)
);

/*==============================================================*/
/* Table: INSTITUCION                                           */
/*==============================================================*/
create table INSTITUCION
(
   ID_INSTIT            smallint not null,
   ID_TIPO_INSTIT       smallint not null,
   COD_PAIS             varchar(4) not null,
   COD_CIUDAD           varchar(4) not null,
   NOMBRE_INSTIT        varchar(100) not null,
   primary key (ID_INSTIT)
);

/*==============================================================*/
/* Table: PAIS                                                  */
/*==============================================================*/
create table PAIS
(
   COD_PAIS             varchar(4) not null,
   NOMBRE_PAIS          varchar(50) not null,
   primary key (COD_PAIS)
);

/*==============================================================*/
/* Table: PROGRAMA                                              */
/*==============================================================*/
create table PROGRAMA
(
   ID_PROG              smallint not null,
   ID_INSTIT            smallint not null,
   ID_ENFOQUE           smallint,
   ID_TIPO_PROG         smallint not null,
   TEMA                 varchar(70) not null,
   COSTO                varchar(70) not null,
   DESCRIPCION          text not null,
   ACREDITACION         bool not null,
   FECHA_INICIO         date not null,
   FECHA_FINALIZACION   date not null,
   primary key (ID_PROG)
);

/*==============================================================*/
/* Table: PROGRAMA_DOCENTE                                      */
/*==============================================================*/
create table PROGRAMA_DOCENTE
(
   CEDULA               int not null,
   ID_PROG              smallint not null,
   primary key (CEDULA, ID_PROG)
);

/*==============================================================*/
/* Table: PROGRAMA_PROGRAMA                                     */
/*==============================================================*/
create table PROGRAMA_PROGRAMA
(
   PRO_ID_PROG          smallint not null,
   ID_PROG              smallint not null,
   primary key (PRO_ID_PROG, ID_PROG)
);

/*==============================================================*/
/* Table: TIPO_DOCENTE                                          */
/*==============================================================*/
create table TIPO_DOCENTE
(
   ID_TIPO_DOC          smallint not null,
   NOMBRE_TIPO_DOC      varchar(20) not null,
   primary key (ID_TIPO_DOC)
);

/*==============================================================*/
/* Table: TIPO_INSTITUCION                                      */
/*==============================================================*/
create table TIPO_INSTITUCION
(
   ID_TIPO_INSTIT       smallint not null,
   NOMBRE_TIPO_INSTIT   varchar(50) not null,
   primary key (ID_TIPO_INSTIT)
);

/*==============================================================*/
/* Table: TIPO_PROGRAMA                                         */
/*==============================================================*/
create table TIPO_PROGRAMA
(
   ID_TIPO_PROG         smallint not null,
   NOMBRE_TIPO_PROG     varchar(70) not null,
   primary key (ID_TIPO_PROG)
);

alter table CIUDAD add constraint FK_PAIS_CIUDAD foreign key (COD_PAIS)
      references PAIS (COD_PAIS) on delete restrict on update restrict;

alter table DOCENTE add constraint FK_DEPARTAMENTO_DOCENTE foreign key (ID_DEP)
      references DEPARTAMENTO (ID_DEP) on delete restrict on update restrict;

alter table DOCENTE add constraint FK_TIPO_DOCENTE_DOCENTE foreign key (ID_TIPO_DOC)
      references TIPO_DOCENTE (ID_TIPO_DOC) on delete restrict on update restrict;

alter table INSTITUCION add constraint FK_CIUDAD_INSTITUCION foreign key (COD_PAIS, COD_CIUDAD)
      references CIUDAD (COD_PAIS, COD_CIUDAD) on delete restrict on update restrict;

alter table INSTITUCION add constraint FK_TIPO_INSTITUCION_INSTITUCION foreign key (ID_TIPO_INSTIT)
      references TIPO_INSTITUCION (ID_TIPO_INSTIT) on delete restrict on update restrict;

alter table PROGRAMA add constraint FK_ENFOQUE_PROGRAMA foreign key (ID_ENFOQUE)
      references ENFOQUE (ID_ENFOQUE) on delete restrict on update restrict;

alter table PROGRAMA add constraint FK_INSTITUCION_PROGRAMA foreign key (ID_INSTIT)
      references INSTITUCION (ID_INSTIT) on delete restrict on update restrict;

alter table PROGRAMA add constraint FK_TIPO_PROGRAMA_PROGRAMA foreign key (ID_TIPO_PROG)
      references TIPO_PROGRAMA (ID_TIPO_PROG) on delete restrict on update restrict;

alter table PROGRAMA_DOCENTE add constraint FK_DOCENTE_PROGRAMA_DOC foreign key (CEDULA)
      references DOCENTE (CEDULA) on delete restrict on update restrict;

alter table PROGRAMA_DOCENTE add constraint FK_PROGRAMA_DOCENTE2 foreign key (ID_PROG)
      references PROGRAMA (ID_PROG) on delete restrict on update restrict;

alter table PROGRAMA_PROGRAMA add constraint FK_PROGRAMA_PROGRAMA foreign key (PRO_ID_PROG)
      references PROGRAMA (ID_PROG) on delete restrict on update restrict;

alter table PROGRAMA_PROGRAMA add constraint FK_PROGRAMA_PROGRAMA2 foreign key (ID_PROG)
      references PROGRAMA (ID_PROG) on delete restrict on update restrict;

