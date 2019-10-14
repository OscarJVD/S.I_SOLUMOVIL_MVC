create database Solumovil;
use Solumovil;

create table Estado (
id_estado_PK int not null auto_increment,
tipo_estado varchar(100),
primary key (id_estado_PK)
);

create table Tipo_Documento (
id_tipo_documento_PK int not null auto_increment,
descripcion_tipo_documento varchar(100),
primary key (id_tipo_documento_PK)
);

create table Rol_Usuario (
id_rol_usuario_PK int not null auto_increment,
tipo_rol_usuario varchar(100),
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
fecha_creacion_usuario datetime not null default now(),
primary key (id_usuario_PK),
foreign key (id_tipo_documento_FK) references Tipo_Documento (id_tipo_documento_PK),
foreign key (id_estado_FK) references Estado (id_estado_PK),
foreign key (Id_rol_usuario_FK) references rol_usuario (id_rol_usuario_PK)
);

create table Cliente (
id_cliente_PK int not null auto_increment,
id_tipo_documento_FK int null,
Numero_documento_Cliente varchar(100) null,
nombre_cliente varchar(100) not null,
apellido_cliente varchar(100) not null,
direccion_cliente varchar(100) null,
correo_cliente varchar(100) null,
telefono_cliente varchar(100) null,
id_estado_FK int null,
primary key (id_cliente_PK),
foreign key (id_estado_FK) references Estado (id_estado_PK)

);
create table Proveedor(
id_proveedor_PK int not null auto_increment,
nombre_proveedor varchar(100) not null,
apellido_proveedor varchar(100) not null,
id_estado_FK int not null,
telefono_proveedor varchar(100) not null,
direccion_proveedor varchar(100) null,
primary key (id_proveedor_PK),
foreign key (id_estado_FK) references Estado (id_estado_PK)
);

create table Categoria_Producto(
id_categoria_producto_PK int not null auto_increment,
nombre_categoria_producto varchar(100) not null,
descripcion_categoria_producto varchar(100) null,
id_estado_FK int not null,
primary key (id_categoria_producto_PK),
foreign key (id_estado_FK) references Estado (id_estado_PK)
);

create table Categoria_Servicio(
id_categoria_servicio_PK int not null auto_increment,
nombre_categoria_servicio varchar (200)not null,
descripcion_categoria_servicio varchar (200) null,
id_estado_FK int not null,
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
codigo_producto_PK varchar(100) null,
id_categoria_producto_FK int null,
id_marca_producto_FK int null,
referencia_producto varchar(100) not null,
stock_producto int not null,
id_estado_FK int null,
precio_producto double not null,
fecha_registro_producto datetime null,
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
id_estado_FK int null,
primary key (id_servicio_PK),
foreign key (id_categoria_servicio_FK) references Categoria_Servicio (id_categoria_servicio_PK)
);


create table Compra(
id_compra_PK int not null auto_increment,
id_usuario_FK int not null,
id_proveedor_FK int not null,
total_compra int(15) not null, -- campo calculado
fecha_venta datetime, 
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
primary key (id_venta_PK),
foreign key (id_usuario_FK) references Usuario (id_usuario_PK),
foreign key (id_cliente_FK) references Cliente (id_cliente_PK),
foreign key (id_estado_venta_FK) references Estado_Venta (id_estado_venta_PK)
);


create table Detalle_Venta(
id_venta_FK int not null,
id_producto_FK int not null,
id_servicio_FK int  not null,
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

insert into Estado values(null,"Activo"),
                          (null,"Inactivo");

insert into Estado_Venta values(null,"Pagado"),
                                (null,"Pendiente");

insert into Tipo_Documento values(null,"Cédula de Ciudadanía"),
                                  (null,"Cédula de Extranjeria"),
                                  (null,"Numero de Identificacion Tributaria");
                                                            
insert into Rol_Usuario values(null,"Administrador"),
                               (null,"Vendedor");

insert into Usuario values (null,1,'1006715848','Andres Felipe','Lobaton Vivas',"Satanicos2002",'$2y$10$XyvH1ydPZmamGNx.KzmYq.M2NsSQE58hIv4XOw7BIOTmLSXL6d61O',
                           'andrespipe021028@gmail.com','3219216905','cll 66 #125-05',1,1,"assets/img/user/avatar.png",now()),
                           (null,2,'1002435648','Oscar Javier','Vargas Diaz',"Sixtharlings94",'$2y$10$uaoUu5OtWul9lfbgJ3dz5Oq3ojwvw8OvKCswdQBMhfMo/YumUUYYK',
                           'oscarvar_94@gmail.com','3456783675','kra 94 #32a-54',1,2,"assets/img/user/avatar.png",now()),
                           (null,3,'6743231','Juan Camilo','Perez Alvarado',"AnonimousHacker",'asanca43_89',
                           'jcamilo_21@gmail.com','3234567892','cll 115 #54-05',1,2,"assets/img/user/avatar.png",now());
						select * from Usuario;
                       