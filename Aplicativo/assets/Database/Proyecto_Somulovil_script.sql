create database Solumovil;
use Solumovil;

create table Estado (
id_estado_PK int not null auto_increment,
tipo_estado varchar(100) not null,
primary key (id_estado_PK)
);

create table Tipo_Documento (
id_tipo_documento_PK int not null auto_increment,
descripcion_tipo_documento varchar(100) not null,
abreviacion varchar(100)null,
primary key (id_tipo_documento_PK)
);

create table Rol_Usuario (
id_rol_usuario_PK int not null auto_increment,
tipo_rol_usuario varchar(100) not null,
primary key (id_rol_usuario_PK)
);

create table Usuario (
id_usuario_PK int not null auto_increment,
id_tipo_documento_FK int null,
numero_documento_usuario varchar(100) null,
nombres_usuario varchar(100) not null,
apellidos_usuario varchar(100)  not null,
nickname_usuario varchar(100) not null,
clave_usuario varchar(100) not null,
correo_usuario varchar(100) not null,
telefono_usuario varchar(100)null,
direccion_usuario varchar(100) null,
id_estado_FK int null,
id_rol_usuario_FK int not null,
foto_usuario varchar(100) null,
fecha_creacion_usuario date not null default now(),
inactivacion_usuario boolean not null default 1,
primary key (id_usuario_PK),
foreign key (id_tipo_documento_FK) references Tipo_Documento (id_tipo_documento_PK),
foreign key (id_estado_FK) references Estado (id_estado_PK),
foreign key (Id_rol_usuario_FK) references rol_usuario (id_rol_usuario_PK)
);
-- tablas de estadisticas
 create table Registro_Login(
 id_registro_login int not nulL auto_increment,
 id_usuario_FK int not null,
 fecha date not null default now(),
 hora  time not null default now(),
 primary key(id_registro_login),
 foreign key (id_usuario_FK) references Usuario(id_usuario_PK)
 );
-- end
create table Cliente (
id_cliente_PK int not null auto_increment,
id_tipo_documento_FK int null,
Numero_documento_Cliente varchar(100) null,
nombre_cliente varchar(100) not null,
apellido_cliente varchar(100) not null,
direccion_cliente varchar(100) null,
correo_cliente varchar(100) null,
telefono_cliente varchar(100) null,
id_estado_FK int null default 1,
inactivacion_cliente boolean not null default 0,
primary key (id_cliente_PK),
foreign key (id_estado_FK) references Estado (id_estado_PK)

);
create table Proveedor(
id_proveedor_PK int not null auto_increment,
nombre_proveedor varchar(100) not null,
apellido_proveedor varchar(100) not null,
id_estado_FK int not null default 1,
telefono_proveedor varchar(100) not null,
direccion_proveedor varchar(100) null,
inactivacion_proveedor boolean not null default 0,
primary key (id_proveedor_PK),
foreign key (id_estado_FK) references Estado (id_estado_PK)
);

create table Categoria_Producto(
id_categoria_producto_PK int not null auto_increment,
nombre_categoria_producto varchar(100) not null,
descripcion_categoria_producto varchar(100) null,
id_estado_FK int not null default 1,
inactivacion_categoria boolean not null default 0,
primary key (id_categoria_producto_PK),
foreign key (id_estado_FK) references Estado (id_estado_PK)
);

create table Categoria_Servicio(
id_categoria_servicio_PK int not null auto_increment,
nombre_categoria_servicio varchar (200)not null,
descripcion_categoria_servicio varchar (200) null,
id_estado_FK int not null default 1,
inactivacion_categoria boolean not null default 0,
primary key (id_categoria_servicio_PK),
foreign key (id_estado_FK) references Estado(id_estado_PK)
);

create table Marca_Producto(
id_marca_producto_PK INT NOT NULL AUTO_INCREMENT,
descripcion_marca_producto varchar(100),
Primary key(id_marca_producto_PK)
);

create table Producto(
id_producto_PK int not null auto_increment,
codigo_producto_PK varchar(100) null unique,
id_categoria_producto_FK int null,
id_marca_producto_FK int null,
referencia_producto varchar(100) not null,
stock_producto int not null,
id_estado_FK int null default 1,
precio_producto double not null,
fecha_registro_producto date null default now(),
inactivacion_producto boolean not null default 0,
primary key (id_producto_PK),
foreign key (id_marca_producto_FK) references Marca_Producto (id_marca_producto_PK),
foreign key (id_categoria_producto_FK) references Categoria_Producto (id_categoria_producto_PK),
foreign key (id_estado_FK) references Estado (id_estado_PK)
);
   
create table Servicio (
id_servicio_PK int not null auto_increment,
id_categoria_servicio_FK int not null,
descripcion_servicio varchar (300) not null,
precio_servicio int not null,
id_estado_FK int null default 1, 
inactivacion_servicio boolean not null default 0,
primary key (id_servicio_PK),
foreign key (id_categoria_servicio_FK) references Categoria_Servicio (id_categoria_servicio_PK)
);


create table Compra(
id_compra_PK int not null auto_increment,
id_usuario_FK int not null,
id_proveedor_FK int not null,
total_compra int(15) not null, -- campo calculado
fecha_compra datetime, 
inactivacion_compra boolean not null,
primary key (id_compra_PK),
foreign key (id_usuario_FK) references usuario(id_usuario_PK),
foreign key (id_proveedor_FK) references proveedor (id_proveedor_PK)
);

create table Estado_Venta (
id_estado_venta_PK int not null auto_increment,
tipo_estado_Venta varchar(100) not null,-- pagado/pendiente
primary key (id_estado_venta_PK)
);

create table Venta(
id_venta_PK int not null auto_increment,
id_usuario_FK int not null,
id_cliente_FK int not null,
subtotal_venta double not null,
descuento_venta double null,
total_venta int not null, -- campo calculado
fecha_venta datetime not null, 
id_estado_venta_FK int,
inactivacion_venta boolean not null,
primary key (id_venta_PK),
foreign key (id_usuario_FK) references Usuario (id_usuario_PK),
foreign key (id_cliente_FK) references Cliente (id_cliente_PK),
foreign key (id_estado_venta_FK) references Estado_Venta (id_estado_venta_PK)
);


create table Detalle_Venta(
id_venta_FK int not null,
id_producto_FK int  null,
id_servicio_FK int  null,
cantidad_detalle_venta int not nulL,
precio_detalle_venta int not null,
descripcion_detalle_venta  varchar (300) null,
foreign key (id_venta_FK) references Venta (id_venta_PK),
foreign key (id_producto_FK) references Producto (id_producto_PK),
foreign key (Id_servicio_FK) references Servicio (id_servicio_PK)
);

create table Detalle_Compra( 
id_compra_FK int not null auto_increment,
id_producto_FK int not null,
cantidad_detalle_compra int not null,
precio_detalle_compra int not null,
descripcion_detalle_compra  varchar (300) null,
foreign key (id_compra_FK) references Compra (id_compra_PK),
foreign key (Id_Producto_FK) references Producto (Id_Producto_PK)
);
-- tabla de las notificaciones
create table Tipo_Notificacion(
id_tipo_notificacion_PK int not null auto_increment,
tipo_notificacion varchar(100),
primary key(id_tipo_notificacion_PK)
);
create table Notificacion(
id_notificacion_PK int not null,
id_rol_usuario_FK int not null,
id_usuario_FK int not null,
id_tipo_notificacion_FK int not null,
tipo varchar(100) not null,
fecha datetime not null,
primary key(id_notificacion_PK),
foreign key (id_usuario_FK) references Usuario (id_usuario_PK),
foreign key (id_tipo_notificacion_FK) references Tipo_Notificacion (id_tipo_notificacion_PK)
);
create table Notificacion_Personalizada(
id_notificacion_FK int not null ,
mi_usuario int,
id_usuario_FK int not null,
leido boolean not null,
visualizado boolean null,
foreign key (id_usuario_FK) references Usuario (id_usuario_PK),
foreign key (id_notificacion_FK) references Notificacion (id_notificacion_PK)
);

-- creacion de vistas
-- consulta de todos los ptoductos
create view Consulta_Productos as 
select p.id_producto_PK,p.codigo_producto_PK,cp.nombre_categoria_producto,mp.descripcion_marca_producto,p.precio_producto,
p.referencia_producto,p.stock_producto,e.tipo_estado,p.fecha_registro_producto
 from producto as p inner join Categoria_Producto as cp on cp.id_categoria_producto_PK = p.id_categoria_producto_FK
					inner join Marca_Producto as mp on mp.id_marca_producto_PK = p.id_marca_producto_FK
                    inner join Estado as e on e.id_estado_PK = p.id_estado_FK where inactivacion_producto = 0;
-- consulta de historial de login al sitema
create view Historial_Registro_Login as
select rl.id_registro_login,u.nombres_usuario,u.apellidos_usuario,rl.fecha,rl.hora 
from Registro_Login as rl inner join Usuario as u on u.id_usuario_PK = rl.id_usuario_FK order by rl.id_registro_login desc;

-- consulta de servicios
create view Consulta_Servicios as
select s.id_servicio_PK,c.nombre_categoria_servicio,s.descripcion_servicio,s.precio_servicio,e.tipo_estado from
 Servicio as s inner join Categoria_Servicio as c on s.id_categoria_servicio_FK =  c.id_categoria_Servicio_PK
               inner join Estado as e on e.id_estado_PK = s.id_estado_FK where inactivacion_servicio = 0;
-- consulta de notificaciones 
create view Notificaciones as
SELECT n.id_notificacion_PK,n.id_usuario_FK,u.nickname_usuario,n.tipo,np.leido,n.fecha 
FROM Notificacion as n  inner join Notificacion_Personalizada as np on n.id_notificacion_PK = np.id_notificacion_FK
					   inner join Usuario as u on u.id_usuario_PK = n.id_usuario_FK
                       where leido = 0 group by id_notificacion_PK  order by id_notificacion_PK desc limit 10; 
       -- date_format(fecha_venta,"%Y-%c-%d")                
-- datos de la venta
create view Consulta_Ventas as
select v.id_venta_PK, u.nombres_usuario, c.nombre_cliente ,v.total_venta, date_format(v.fecha_venta,"%Y-%m-%d") as fecha_venta ,v.id_estado_venta_FK,v.inactivacion_venta
          from venta as v inner join Usuario as u  on u.id_usuario_PK = v.id_usuario_FK 
						  inner join cliente as c on  c.id_cliente_PK = v.id_cliente_FK
                          where inactivacion_venta = 0;
create view Consulta_Compras as
select c.id_compra_PK, u.nombres_usuario, p.nombre_proveedor ,c.total_compra, date_format(c.fecha_compra,"%Y-%m-%d") as fecha_compra ,c.inactivacion_compra
          from compra as c inner join Usuario as u  on u.id_usuario_PK = c.id_usuario_FK 
						  inner join proveedor as p on  p.id_proveedor_PK = c.id_proveedor_FK
                          where inactivacion_compra = 0;
-- reportes por fechas

-- select avg(total_venta) from venta where fecha_venta <= curdate() and fecha_venta >= date_sub(curdate(),interval 1 week) group by fecha_venta;

-- insercion de datos
insert into Tipo_Notificacion values(null,"producto"),
                                    (null,"servicio"),
                                    (null,"venta"),
                                    (null,"compra"),
                                    (null,"usuario"),
                                    (null,"cliente"),
                                    (null,"proveedor"),
                                    (null,"categoria"),
                                    (null,"reporte"),
                                    (null,"estadistica");
insert into Estado values(null,"Activo"),
                          (null,"Inactivo");

insert into Estado_Venta values(null,"Pagado"),
                                (null,"Pendiente");

insert into Tipo_Documento values(null,"Cédula de Ciudadanía","CC"),
                                  (null,"Cédula de Extranjeria","CE"),
                                  (null,"Numero de Identificacion Tributaria","NIT");
                                                            
insert into Rol_Usuario values(null,"Administrador"),
                               (null,"Vendedor");

insert into Usuario values (null,1,'1006715848','Andres Felipe','Lobaton Vivas',"Satanicos2002",'$2y$10$XyvH1ydPZmamGNx.KzmYq.M2NsSQE58hIv4XOw7BIOTmLSXL6d61O',
                           'andrespipe021028@gmail.com','3219216905','cll 66 #125-05',1,1,"assets/img/user1/facebook.jpg","2018-06-23",0),
                           (null,2,'1002435648','Oscar Javier','Vargas Diaz',"Sixtharlings94",'$2y$10$uaoUu5OtWul9lfbgJ3dz5Oq3ojwvw8OvKCswdQBMhfMo/YumUUYYK',
                           'oscarvar_94@gmail.com','3456783675','kra 94 #32a-54',1,2,"assets/img/user/avatar.png","2019-04-23",0),
                           (null,3,'6743231','Juan Camilo','Perez Alvarado',"AnonimousHacker",'$2y$10$yHIlKb9nGDNIq0NghNRkFel7D/jNIhDN/VlMo7ongTUgp86xFoVfm',
                           'jcamilo_21@gmail.com','3234567892','cll 115 #54-05',1,2,"assets/img/user/avatar.png","2019-10-19",0);

insert into Categoria_Producto values(null,"Celulares","",1,0),
									 (null,"Parlantes","",1,0),
                                     (null,"Auriculares","",1,0),
                                     (null,"Tablets","",2,0),
                                     (null,"Computadores","",1,0);
insert into Marca_Producto values(null,"Huawei"),
                                 (null,"Iphone"),
                                 (null,"Motorola"),
                                 (null,"Avvio"),
                                 (null,"Xiaomi");
                                 
insert into Producto values(null,"P01",2,2,"Y-23",0,1,6000,"2018-01-22",0),
						   (null,"P02",2,2,"Y-34",23,1,10000,"2018-02-22",0),
                           (null,"P03",5,2,"Y-6",2,1,30000,"2018-03-20",0),
                           (null,"P04",5,3,"Y-5",0,1,200000,"2018-04-22",0),
                           (null,"P05",1,3,"Y-563",0,1,40000,"2018-05-22",0),
                           (null,"P06",1,3,"Y-90",0,1,68000,"2018-06-22",0),
                           (null,"P07",4,1,"Y-89",0,1,33400,"2018-07-22",0),
                           (null,"P08",4,5,"Y-34",0,1,304300,"2018-08-22",0),
                           (null,"P09",1,5,"Y-24",0,1,3003220,"2018-09-22",0),
                           (null,"P10",3,5,"Y-243",12,1,300230,"2018-10-22",0),
                           (null,"P11",3,3,"Y-34",56,1,6000,"2018-11-22",0),
                           (null,"P12",3,1,"Y-23",23,1,3000,"2018-12-22",0),
                           (null,"P13",4,3,"Y-26",12,1,4000,"2019-01-22",0),
                           (null,"P14",4,4,"Y-34",23,1,2000,"2019-01-22",0),
                           (null,"P15",5,4,"Y-76",54,1,4000,"2019-01-22",0);
                           
insert into cliente values(null,2,"100674565","Juan","Lopez",null,"juanlopez_90@gmail.com","45457984",1,0),
                          (null,1,"100456723","Pedro","Perez",null,"p0edro_perez_23@gmail.com","31275485",1,0),
                          (null,1,"528956742","Camilo","Ortiz",null,"asada_89@gmail.com","312675675",1,0),
                          (null,1,"672312905","Andres","Alvarado",null,"lacasa_roja21@gmail.com","413767545",1,0),
                          (null,2,"986534762","Salomon","Salamanca",null,"juancholomon@gmail.com","315897878",1,0),
                          (null,3,"123124663","Andrea","Perdomo",null,"andrea_per@gmail.com","311232454",1,0),
                          (null,1,"323232323","Camila","Diaz",null,"camila_d@gmail.com","32189345345",2,0),
                          (null,2,"860945609","Jose","Vivaz",null,"joce_vi@gmail.com","3167893434",1,0),
                          (null,1,"845874655","Jolman","Romero",null,"jolaman123@gmail.com","314678673",2,0),
                          (null,1,"100786454","Rocio","Rodriguez",null,"rocio_cacha@gmail.com","3125789789",1,0),
                          (null,1,"100398811","Jeison","Medina",null,"jeison_medina6002@gmail.com","3234242343",2,0);
						
insert into proveedor values (null,"Alfredo","Olaya",1,"32167321","cll34 #12-76",0),
                             (null,"Ramon","Murillo",1,"321132313","cll56 #16-76",0),
                             (null,"Felipe","Cardozo",1,"356778543","cll45 #09-7",0),
                             (null,"Javier","Herrera",1,"3345345345",null,0),
                             (null,"Dimedez","Pantoja",1,"3534436565",null,0),
                             (null,"James","Galan",1,"34535455",null,0),
                             (null,"Falcao","Calderon",2,"67868677878",null,0),
                             (null,"Santiago","Amado",2,"35756756756",null,0),
                             (null,"Pablo","Lopez",2,"3675656767",null,0),
                             (null,"Marcela","Amaya",2,"378978979789",null,0),
                             (null,"Juliana","Montero",2,"34234234234",null,0);
							
insert into Categoria_Servicio values (null,"Cambio de pantalla","Equipos moviles y tablets",1,0),
                                      (null,"Cambio de pin","",1,0),
                                      (null,"Cambio targeta madre","Equipos moviles y computadores",1,0),
                                      (null,"Formateo","Equipos moviles y computadores",1,0),
                                      (null,"Cambio de logica","",2,0);
                                     
insert into Servicio values(null,1,"huawei p20",251400,1,0),
                           (null,2,"samsung",25100,2,0),
                           (null,2,"smartphone 3",295000,1,0), 
						   (null,1,"cambio de logica de un huawei p30 ",20090,1,0), 
						   (null,5,"cambio de sistema operativo de un huawei y360",200550,2,0);      
                      
insert into Venta values (null,1,1,30000,3200,26800,"2018-05-12 12:34:32",1,0),
                         (null,1,2,50000,0,50000,"2018-06-02 12:34:32",2,0),
                         (null,1,3,20000,0,20000,"2018-07-12 12:34:32",1,0),
                         (null,1,4,10000,0,10000,"2018-08-12 12:34:32",1,0),
                         (null,1,5,20000,5000,15000,"2018-09-09 12:34:32",1,0),
                         (null,1,6,9000,3000,6000,"2018-10-10 12:34:32",1,0),
                         (null,1,5,60000,0,60000,"2018-12-12 12:34:32",1,0),
                         (null,1,3,450000,50000,400000,"2019-02-23 12:34:32",2,0),
                         (null,2,4,230000,20000,210000,"2019-03-12 12:34:32",2,0),
                         (null,2,5,130000,0,130000,"2019-03-12 10:23:32",2,0),
                         (null,2,1,35000,0,35000,"2019-10-20 12:34:32",1,0),
                         (null,2,1,35000,0,35000,"2019-10-25 12:34:32",1,0);
                         
insert into Detalle_Venta values (1,2,null,5,30000,null),
                                 (1,3,null,2,15000,null),
                                 (1,4,null,1,3000,null),
                                 (2,null,2,5,50000,null),
                                 (2,null,1,5,40000,null),
                                 (2,4,null,2,20000,null),
                                 (3,2,null,2,10000,null),
                                 (3,null,4,2,100000,null),
                                 (4,null,5,1,300000,null),
                                 (5,null,4,2,500000,null),
                                 (6,null,4,1,30000,null);
insert into Compra values (null,1,2,100000,"2018-01-12 12:34:32",0),
						  (null,1,2,200000,"2018-02-13 12:34:32",0),
                          (null,1,2,100000,"2018-03-14 12:34:32",0),
                          (null,1,1,300000,"2018-04-02 12:34:32",0),
                          (null,1,2,200000,"2018-05-22 12:34:32",0),
                          (null,2,4,400000,"2018-06-82 12:34:32",0),
                          (null,2,4,500000,"2018-07-12 12:34:32",0),
                          (null,2,4,800000,"2019-01-19 12:34:32",0),
                          (null,2,1,150000,"2019-02-13 12:34:32",0),
                          (null,3,2,120000,"2019-03-12 12:34:32",0),
                          (null,3,3,90000,"2019-04-14 12:34:32",0),
                          (null,3,3,20000,"2019-05-29 12:34:32",0),
                          (null,3,5,100000,"2019-05-12 12:34:32",0);
                          
insert into Detalle_Compra values (1,2,40,30000,null),
                                  (2,3,3,20000,null),
                                  (1,3,50,18000,null),
                                  (1,3,10,40000,null),
                                  (2,2,20,16000,null),
                                  (2,8,30,55000,null),
                                  (3,8,40,15000,null),
                                  (3,4,50,3000,null),
                                  (3,6,5,50000,null),
                                  (4,4,8,7000,null),
                                  (5,4,9,30000,null),
                                  (6,3,2,207000,null),
                                  (7,2,9,306000,null),
                                  (8,3,8,500000,null),
                                  (9,3,8,30000,null),
                                  (10,6,10,30000,null),
                                  (10,6,10,30000,null),
                                  (10,7,5,90000,null);
-- cabio de datos a la base de datos en detalle de venta en id_producto_FK Y id_servicio_PK de not null a null;
