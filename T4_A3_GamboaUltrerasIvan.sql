CREATE DATABASE escuela_web;
use escuela_web;
CREATE TABLE `Alumnos` (
  `num_control` varchar(10) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `primer_ap` varchar(60) NOT NULL,
  `segundo_ap` varchar(60) NOT NULL,
  `edad` tinyint(4) NOT NULL,
  `semestre` tinyint(4) NOT NULL,
  `carrera` varchar(40) NOT NULL,
  PRIMARY KEY (`num_control`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
Insert into alumnos values('15070190','Alumno1','ap_1_alum_1','ap_2_alum_1',23,5,'ISC');
Insert into alumnos values('16070197','Alumno2','ap_1_alum_2','ap_2_alum_2',19,1,'ISC');
Insert into alumnos values('17070129','Alumno3','ap_1_alum_3','ap_2_alum_3',21,3,'ISC');
Insert into alumnos values('19070154','Alumno4','ap_1_alum_4','ap_2_alum_4',20,3,'IM');
Insert into alumnos values('18070177','Alumno5','ap_1_alum_5','ap_2_alum_5',18,5,'IM');
Insert into alumnos values('19070140','Alumno6','ap_1_alum_6','ap_2_alum_6',19,8,'IIA');
Insert into alumnos values('15070166','Alumno7','ap_1_alum_7','ap_2_alum_7',21,4,'IIA');
Insert into alumnos values('18070113','Alumno8','ap_1_alum_8','ap_2_alum_8',23,3,'LA');
Insert into alumnos values('15070111','Alumno9','ap_1_alum_9','ap_2_alum_9',22,9,'LA');
Insert into alumnos values('19070145','Alumno10','ap_1_alum_10','ap_2_alum_10',21,3,'CP');
Insert into alumnos values('18070139','Alumno11','ap_1_alum_11','ap_2_alum_11',22,1,'CP');
Insert into alumnos values('15070132','Alumno12','ap_1_alum_12','ap_2_alum_12',18,4,'IM');
Insert into alumnos values('16070187','Alumno13','ap_1_alum_13','ap_2_alum_13',18,6,'IM');
Insert into alumnos values('19070176','Alumno14','ap_1_alum_14','ap_2_alum_14',19,1,'CP');
Insert into alumnos values('18070119','Alumno15','ap_1_alum_15','ap_2_alum_15',23,3,'CP');

CREATE DATABASE usuarios_web;
use usuarios_web;
CREATE TABLE `Usuarios` (
  `usuario` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;