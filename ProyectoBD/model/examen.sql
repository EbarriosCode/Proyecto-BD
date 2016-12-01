--  ENTIDAD CLIENTE -- 
create table cliente(
id number primary key,
nombre varchar(55),
direccion varchar(100),
telefono number,
nit varchar(15),
observaciones varchar(255)
);

-- ENTIDAD TIPO_PRODUCTO --
create table tipo_producto(
id number primary key,
nombre varchar(55)
);

-- ENTIDAD PRODUCTO --
create table producto(
id number primary key,
nombre varchar(55),
precio number,
costo number,
existencia number,
codigo varchar(100),
tipo_producto_fk number,
constraint id_producto_fk foreign key(tipo_producto_fk) references tipo_producto
);

-- ENTIDAD FORMA-PAGO --
create table forma_pago(
id number primary key,
nombre varchar(55)
);

-- ENTIDAD VENTA --
create table venta(
id int primary key,
fecha date,
cliente_fk number,
factura number,
observaciones varchar(255),
forma_pago_fk number,
constraint id_formaPago_fk foreign key(forma_pago_fk)references forma_pago,
constraint id_cliente_fk foreign key(cliente_fk)references cliente
);

-- ENTIDAD VENTA-DETALLE --
create table venta_detalle(
id number primary key,
venta varchar(100),
producto_fk number,
cantidad number,
precio number,
costo number,
total number,
constraint id_producto_fk_venta foreign key(producto_fk)references producto
);
