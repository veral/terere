/*==============================================================*/
/* Table: paises                                                */
/*==============================================================*/
create table paises (
   id                   serial not null,
   pais                 varchar(100)         not null,
   slug                 varchar(100)         not null,
   constraint pk_paises primary key (id)
);
/*==============================================================*/
/* Table: departamentos                                         */
/*==============================================================*/
create table departamentos (
   id                   serial not null,
   paises_id            int2                 not null,
   departamento         varchar(100)         not null,
   slug                 varchar(100)         not null,
   constraint pk_departamentos primary key (id),
   constraint fk_departamentos_paises foreign key (paises_id)
      references paises (id)
);
/*==============================================================*/
/* Table: ciudades                                              */
/*==============================================================*/
create table ciudades (
   id                   serial not null,
   departamentos_id     int2                 not null,
   ciudad               varchar(100)         not null,
   slug                 varchar(100)         not null,
   constraint pk_ciudades primary key (id),
   constraint fk_ciudades_departamentos foreign key (departamentos_id)
      references departamentos (id)
);
/*==============================================================*/
/* Table: locales                                               */
/*==============================================================*/
create table locales (
   id                   serial not null,
   ciudad_id            int2                 not null,
   nombre               varchar(150)         not null,
   direccion            varchar(250)         not null,
   establecimiento      int4                 not null,
   constraint pk_locales primary key (id),
   constraint fk_ciudades_locales foreign key (ciudad_id)
      references ciudades (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Table: cajas                                                 */
/*==============================================================*/
create table cajas (
   id                   serial not null,
   local_id             int4                 not null,
   punto_expedicion     int4                 not null,
   estado               int4                 not null
      constraint ckc_estado_cajas check (estado in (0,1)),
   constraint pk_cajas primary key (id),
   constraint fk_locales_cajas foreign key (local_id)
      references locales (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Table: personas                                              */
/*==============================================================*/
create table personas (
   id                   serial not null,
   tipo_persona         int2                 not null,
   nombres              varchar(100)         null,
   apellidos            varchar(100)         null,
   denominacion         varchar(100)         null,
   tipo_documento       int2                 not null default 1
      constraint ckc_tipo_documento_personas check (tipo_documento between 1 and 3 and tipo_documento in (1,2,3)),
   documento            varchar(20)          not null,
   sexo                 varchar(1)           null,
   fecha_nacimiento     timestamp            null,
   nacionalidad         int2                 null,
   ciudad               int2                 null,
   direccion            varchar(128)         null,
   telefono             varchar(20)          null,
   fecha_alta           timestamp            null,
   estado               int2                 null,
   tarjeta_de_credito   varchar(150)         null,
   constraint pk_personas primary key (id),
   constraint fk_personas_ciudades foreign key (ciudad)
      references ciudades (id)
);
/*==============================================================*/
/* Table: usuarios                                              */
/*==============================================================*/
create table usuarios (
   id                   serial not null,
   personas_id          int4                 not null,
   tipo_usuario         int2                 not null
      constraint ckc_tipo_usuario_usuarios check (tipo_usuario between 1 and 3 and tipo_usuario in (1,2,3)),
   mail                 varchar(125)         not null,
   username             varchar(250)         not null,
   password             varchar(150)         not null,
   salt                 varchar(150)         not null,
   facebook             varchar(150)         null,
   twitter              varchar(150)         null,
   permite_email        int2                 not null,
   fecha_alta           timestamp            not null,
   ip_registro          varchar(25)          not null,
   token                varchar(150)         not null,
   estado               int2                 not null,
   ultima_conexion      timestamp            null,
   constraint pk_usuarios primary key (id),
   constraint fk_personas_usuarios foreign key (personas_id)
      references personas (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Table: cajas_aperturas                                       */
/*==============================================================*/
create table cajas_aperturas (
   id                   serial not null,
   caja_id              int4                 not null,
   fecha                timestamp            not null,
   cajero_id            int4                 not null,
   entrego_id           int4                 null,
   recibio_id           int4                 null,
   hora_cierre          timestamp            null,
   abierta              int4                 not null
      constraint ckc_abierta_cajas_ap check (abierta in (0,1)),
   constraint pk_cajas_aperturas primary key (id),
   constraint fk_cajas_cajas_aperturas foreign key (caja_id)
      references cajas (id)
      on delete restrict on update restrict,
   constraint fk_cajero_cajas_aperturas foreign key (cajero_id)
      references usuarios (id)
      on delete restrict on update restrict,
   constraint fk_entrego_cajas_aperturas foreign key (entrego_id)
      references usuarios (id)
      on delete restrict on update restrict,
   constraint fk_recibio_cajas_aperturas foreign key (recibio_id)
      references usuarios (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Table: monedas                                               */
/*==============================================================*/
create table monedas (
   id                   serial not null,
   moneda               varchar(150)         not null,
   abreviatura          varchar(150)         not null,
   constraint pk_monedas primary key (id)
);
/*==============================================================*/
/* Table: caja_apertura_valores                                 */
/*==============================================================*/
create table caja_apertura_valores (
   id                   serial not null,
   caja_apertura_id     int4                 not null,
   moneda_id            int4                 not null,
   monto                numeric(18,4)        not null,
   cotizacion           numeric(18,4)        null,
   fecha                timestamp            not null,
   constraint pk_caja_apertura_valores primary key (id),
   constraint fk_cajas_a foreign key (caja_apertura_id)
      references cajas_aperturas (id)
      on delete restrict on update restrict,
   constraint fk_monedas foreign key (moneda_id)
      references monedas (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Index: ix_unique_caja_apertura_valores                       */
/*==============================================================*/
create unique index ix_unique_caja_apertura_valores on caja_apertura_valores (
caja_apertura_id,
moneda_id
);
/*==============================================================*/
/* Index: ix_unique_caja                                        */
/*==============================================================*/
create unique index ix_unique_caja on cajas (
local_id,
punto_expedicion
);
/*==============================================================*/
/* Index: ix_unique_cajas_aperturas                             */
/*==============================================================*/
create unique index ix_unique_cajas_aperturas on cajas_aperturas (
caja_id,
fecha
);
/*==============================================================*/
/* Table: categorias                                            */
/*==============================================================*/
create table categorias (
   id                   serial not null,
   categoria_padre      int4                 null,
   nombre               varchar(150)         not null,
   slug                 varchar(150)         not null,
   estado               int2                 not null default 1,
   constraint pk_categorias primary key (id),
   constraint fk_categorias_categorias foreign key (categoria_padre)
      references categorias (id)
);
/*==============================================================*/
/* Index: ix_unique_categorias                                  */
/*==============================================================*/
create unique index ix_unique_categorias on categorias (
categoria_padre,
nombre
);
/*==============================================================*/
/* Index: ix_unique_ciudades                                    */
/*==============================================================*/
create unique index ix_unique_ciudades on ciudades (
departamentos_id,
ciudad
);
/*==============================================================*/
/* Index: ix_unique_slug_ciudades                               */
/*==============================================================*/
create unique index ix_unique_slug_ciudades on ciudades (
slug
);
/*==============================================================*/
/* Table: timbrado                                              */
/*==============================================================*/
create table timbrado (
   id                   serial not null,
   codigo               int4                 not null,
   imprenta             varchar(250)         not null,
   fecha_inicio_vigencia timestamp            not null,
   fecha_fin_vigencia   timestamp            not null
      constraint ckc_fecha_fin_vigenci_timbrado check (fecha_fin_vigencia > fecha_inicio_vigencia),
   inicio_secuencia     int4                 not null,
   fin_secuencia        int4                 not null
      constraint ckc_fin_secuencia_timbrado check (fin_secuencia > inicio_secuencia),
   estado               int4                 not null
      constraint ckc_estado_timbrado check (estado in (0,1)),
   constraint pk_timbrado primary key (id)
);
/*==============================================================*/
/* Table: talonarios                                            */
/*==============================================================*/
create table talonarios (
   id                   serial not null,
   caja_id              int4                 not null,
   timbrado_id          int4                 not null,
   inicio_secuencia     int4                 not null,
   fin_secuencia        int4                 not null,
   estado               int4                 not null
      constraint ckc_estado_talonari check (estado in (0,1)),
   constraint pk_talonarios primary key (id),
   constraint fk_cajas_talonarios foreign key (caja_id)
      references cajas (id)
      on delete restrict on update restrict,
   constraint fk_timbrado_talonarios foreign key (timbrado_id)
      references timbrado (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Table: ventas                                                */
/*==============================================================*/
create table ventas (
   id                   serial not null,
   talonario_id         int4                 null,
   numero_factura       int4                 null,
   proforma             varchar(150)         not null,
   usuario_id           int4                 not null,
   forma_cobro          int4                 not null
      constraint ckc_forma_cobro_ventas check (forma_cobro between 0 and 1 and forma_cobro in (0,1)),
   fecha                timestamp            not null,
   estado               int2                 not null,
   total_venta          decimal(18,2)        not null,
   total_impuesto       decimal(18,2)        not null,
   constraint pk_ventas primary key (id),
   constraint fk_talonarios_ventas foreign key (talonario_id)
      references talonarios (id)
      on delete restrict on update restrict,
   constraint fk_usuarios_ventas foreign key (usuario_id)
      references usuarios (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Table: cobros                                                */
/*==============================================================*/
create table cobros (
   id                   serial not null,
   fecha                timestamp            not null,
   venta_id             int4                 not null,
   moneda_id            int4                 not null,
   total_cobrado        numeric(18,4)        not null,
   factura              varchar(20)          not null,
   cajero_id            int4                 not null,
   cobrador_id          int4                 not null,
   apertura_id          int4                 not null,
   estado               int4                 not null
      constraint ckc_estado_cobros check (estado in (0,1,2)),
   constraint pk_cobros primary key (id),
   constraint fk_cajas_aperturas_cobros foreign key (apertura_id)
      references cajas_aperturas (id)
      on delete restrict on update restrict,
   constraint fk_usuarios_cajero_cobros foreign key (cajero_id)
      references usuarios (id)
      on delete restrict on update restrict,
   constraint fk_usuarios_cobrador_cobros foreign key (cobrador_id)
      references usuarios (id)
      on delete restrict on update restrict,
   constraint fk_monedas_cobros foreign key (moneda_id)
      references monedas (id)
      on delete restrict on update restrict,
   constraint fk_ventas_cobros foreign key (venta_id)
      references ventas (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Index: ix_unique_cobros                                      */
/*==============================================================*/
create unique index ix_unique_cobros on cobros (
venta_id
);
/*==============================================================*/
/* Table: medios_pago                                           */
/*==============================================================*/
create table medios_pago (
   id                   serial not null,
   medio_pago           varchar(100)         not null,
   descripcion          text                 not null,
   estado               int2                 not null default 1
      constraint ckc_estado_medios_p check (estado between 0 and 1 and estado in (0,1)),
   constraint pk_medios_pago primary key (id)
);
/*==============================================================*/
/* Table: entidades_financieras                                 */
/*==============================================================*/
create table entidades_financieras (
   id                   serial not null,
   entidad              varchar(150)         not null,
   estado               int2                 not null
      constraint ckc_estado_entidade check (estado in (0,1)),
   constraint pk_bancos primary key (id)
);
/*==============================================================*/
/* Table: cobros_valores                                        */
/*==============================================================*/
create table cobros_valores (
   id                   serial not null,
   cobro_id             int4                 not null,
   medio_pago_id        int4                 not null,
   moneda_id            int4                 not null,
   banco_id             int4                 null,
   monto                numeric(18,4)        not null,
   cotizacion           numeric(18,4)        null,
   documento            varchar(20)          null,
   fecha                timestamp            not null,
   constraint pk_cobros_valores primary key (id),
   constraint fk_medios_pago_cobros_valores foreign key (medio_pago_id)
      references medios_pago (id)
      on delete restrict on update restrict,
   constraint fk_cobros_cobros_valores foreign key (cobro_id)
      references cobros (id)
      on delete restrict on update restrict,
   constraint fk_monedas_cobros_valores foreign key (moneda_id)
      references monedas (id)
      on delete restrict on update restrict,
   constraint fk_bancos_cobros_valores foreign key (banco_id)
      references entidades_financieras (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Index: ix_unique_cobros_valores                              */
/*==============================================================*/
create unique index ix_unique_cobros_valores on cobros_valores (
cobro_id,
medio_pago_id,
moneda_id,
cotizacion,
documento
);
/*==============================================================*/
/* Index: ix_unique_departamento                                */
/*==============================================================*/
create unique index ix_unique_departamento on departamentos (
paises_id,
departamento
);
/*==============================================================*/
/* Table: impuestos                                             */
/*==============================================================*/
create table impuestos (
   id                   serial not null,
   impuesto             varchar(50)          not null,
   valor                decimal(4,2)         not null,
   constraint pk_impuestos primary key (id)
);
/*==============================================================*/
/* Table: tipos_tienda                                          */
/*==============================================================*/
create table tipos_tienda (
   id                   serial not null,
   tipo_tienda          varchar(150)         not null,
   constraint pk_tipos_tienda primary key (id)
);
/*==============================================================*/
/* Table: tiendas                                               */
/*==============================================================*/
create table tiendas (
   id                   serial not null,
   usuarios_id          int4                 not null,
   tipo_tienda_id       int2                 not null,
   tienda               varchar(150)         not null,
   persona_contacto     varchar(250)         null,
   linea_baja           varchar(250)         null,
   linea_movil          varchar(250)         null,
   descripcion          text                 not null,
   ubicacion            text                 null,
   latitud_gmap         decimal(18,6)        not null,
   longitud_gmap        decimal(18,6)        not null,
   foto                 varchar(255)         null,
   sitio_web            varchar(250)         null,
   direccion            varchar(150)         not null,
   ciudad               int2                 not null,
   slug                 varchar(100)         not null,
   bancos_id            int4                 null,
   cuenta_bancaria      varchar(150)         null,
   cuenta_numero        varchar(250)         null,
   facebook             varchar(150)         null,
   twitter              varchar(150)         null,
   constraint pk_tiendas primary key (id),
   constraint fk_tipos_tienda_tiendas foreign key (tipo_tienda_id)
      references tipos_tienda (id)
      on delete restrict on update restrict,
   constraint fk_bancos_tiendas foreign key (bancos_id)
      references entidades_financieras (id)
      on delete restrict on update restrict,
   constraint fk_usuarios_tiendas foreign key (usuarios_id)
      references usuarios (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Table: tipos_ofertas                                         */
/*==============================================================*/
create table tipos_ofertas (
   id                   serial not null,
   tipo_oferta          varchar(150)         not null,
   constraint pk_tipos_ofertas primary key (id)
);
/*==============================================================*/
/* Table: ofertas                                               */
/*==============================================================*/
create table ofertas (
   id                   serial not null,
   tipo_oferta_id       int4                 null,
   tienda_id            int4                 not null,
   nombre               varchar(150)         not null,
   titulo_corto         varchar(150)         not null,
   slug                 varchar(150)         not null,
   introduccion         text                 not null,
   descripcion          text                 not null,
   condiciones          text                 not null,
   porcentaje_ganancia  decimal(5,2)         not null,
   precio_mercado       decimal(18,2)        not null,
   precio_oferta        decimal(18,2)        not null,
   costo_envio          decimal(18,2)        not null,
   descuento            decimal(18,2)        not null,
   fecha_publicacion    timestamp            not null,
   fecha_fin_publicacion timestamp            not null,
   fecha_expiracion     timestamp            not null,
   compras_maximas      int4                 not null,
   compras_minimas      int4                 not null,
   estado               int2                 not null,
   orden                int4                 not null,
   requiere_reserva     int2                 not null default 0
      constraint ckc_requiere_reserva_ofertas check (requiere_reserva between 0 and 1 and requiere_reserva in (0,1)),
   requiere_individualizar int2                 not null default 0
      constraint ckc_requiere_individu_ofertas check (requiere_individualizar between 0 and 1 and requiere_individualizar in (0,1)),
   template             int2                 not null,
   imagen_principal     varchar(150)         null,
   imagenes             text                 null,
   impuesto_id          int4                 not null,
   cantidad_maxima_venta int2                 not null,
   cantidad_maxima_regalo int2                 not null,
   constraint pk_ofertas primary key (id),
   constraint fk_ofertas_impuestos foreign key (impuesto_id)
      references impuestos (id),
   constraint fk_ofertas_tiendas foreign key (tienda_id)
      references tiendas (id),
   constraint fk_ofertas_tipos_ofertas foreign key (tipo_oferta_id)
      references tipos_ofertas (id)
);
/*==============================================================*/
/* Table: ofertas_individuales                                  */
/*==============================================================*/
create table ofertas_individuales (
   id                   serial not null,
   ofertas_id           int4                 not null,
   color                varchar(150)         null,
   tamano               varchar(150)         null,
   estilo               varchar(150)         null,
   peso                 decimal(18,2)        null,
   largo                decimal(18,2)        null,
   ancho                decimal(18,2)        null,
   cantidad             int4                 not null,
   cantidad_maxima_venta int4                 not null,
   cantidad_maxima_regalo int4                 not null,
   constraint pk_ofertas_individuales primary key (id),
   constraint fk_ofertas_individuales_ofertas foreign key (ofertas_id)
      references ofertas (id)
);
/*==============================================================*/
/* Table: ofertas_reservas                                      */
/*==============================================================*/
create table ofertas_reservas (
   id                   serial not null,
   ofertas_id           int4                 not null,
   fecha_utilizacion    timestamp            not null,
   fecha_fin_utilizacion timestamp            not null,
   hora_utilizacion     timestamp            null,
   hora_fin_utilizacion timestamp            null,
   cantidad             int2                 not null,
   cantidad_maxima_venta int2                 not null,
   cantidad_maxima_regalo int2                 not null,
   constraint pk_ofertas_reservas primary key (id),
   constraint fk_ofertas_reservas_ofertas foreign key (ofertas_id)
      references ofertas (id)
);
/*==============================================================*/
/* Table: detalle_ventas                                        */
/*==============================================================*/
create table detalle_ventas (
   id                   serial not null,
   venta                int4                 not null,
   oferta               int4                 not null,
   oferta_atributo      int4                 null,
   oferta_hora          int4                 null,
   cantidad_venta       int2                 not null,
   cantidad_regalo      int2                 not null,
   fecha_entrega        timestamp            null,
   entregado_por        int4                 null,
   ventas_entregadas    int4                 null,
   regalos_entregados   int4                 null,
   constraint pk_detalle_ventas primary key (id),
   constraint fk_ofertas foreign key (oferta_atributo)
      references ofertas_individuales (id),
   constraint fk_oferta2 foreign key (oferta_hora)
      references ofertas_reservas (id),
   constraint fk_ofertas__detalles_ventas foreign key (oferta)
      references ofertas (id),
   constraint fk_ventas__detalle_ventas foreign key (venta)
      references ventas (id),
   constraint fk_usuarios_detalle_ventas foreign key (entregado_por)
      references usuarios (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Index: ix_unique_detalle_ventas                              */
/*==============================================================*/
create unique index ix_unique_detalle_ventas on detalle_ventas (
venta,
oferta
);
/*==============================================================*/
/* Index: ix_unique_banco                                       */
/*==============================================================*/
create unique index ix_unique_banco on entidades_financieras (
entidad
);
/*==============================================================*/
/* Table: entrega_detalle_venta                                 */
/*==============================================================*/
create table entrega_detalle_venta (
   id                   serial not null,
   usuario_id           int4                 not null,
   fecha                timestamp            not null,
   detalle_venta_id     int4                 not null,
   cantidad_venta       int4                 null,
   cantidad_regalo      int4                 null,
   constraint pk_entrega_detalle_venta primary key (id),
   constraint fk_detalle foreign key (detalle_venta_id)
      references detalle_ventas (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Index: ix_unique_entrega_detalle_venta                       */
/*==============================================================*/
create unique index ix_unique_entrega_detalle_venta on entrega_detalle_venta (
fecha,
detalle_venta_id
);
/*==============================================================*/
/* Index: ix_unique_impuestos                                   */
/*==============================================================*/
create unique index ix_unique_impuestos on impuestos (
impuesto
);
/*==============================================================*/
/* Index: ix_unique_valor                                       */
/*==============================================================*/
create unique index ix_unique_valor on impuestos (
valor
);
/*==============================================================*/
/* Index: ix_unique_locales                                     */
/*==============================================================*/
create unique index ix_unique_locales on locales (
ciudad_id,
nombre
);
/*==============================================================*/
/* Index: ix_unique_establecimiento                             */
/*==============================================================*/
create unique index ix_unique_establecimiento on locales (
establecimiento
);
/*==============================================================*/
/* Index: ix_unique_medios_pago                                 */
/*==============================================================*/
create unique index ix_unique_medios_pago on medios_pago (
medio_pago
);
/*==============================================================*/
/* Table: modos_entrega                                         */
/*==============================================================*/
create table modos_entrega (
   id                   serial not null,
   modo_entrega         varchar(125)         not null,
   descripcion          text                 not null,
   estado               int2                 not null
      constraint ckc_estado_modos_en check (estado between 0 and 1 and estado in (0,1)),
   constraint pk_modos_entrega primary key (id)
);
/*==============================================================*/
/* Index: ix_unique_modos_entrega                               */
/*==============================================================*/
create unique index ix_unique_modos_entrega on modos_entrega (
modo_entrega
);
/*==============================================================*/
/* Index: ix_unique_monedas                                     */
/*==============================================================*/
create unique index ix_unique_monedas on monedas (
abreviatura
);
/*==============================================================*/
/* Index: ix_unique_ofertas                                     */
/*==============================================================*/
create unique index ix_unique_ofertas on ofertas (
tienda_id,
nombre,
fecha_publicacion
);
/*==============================================================*/
/* Table: ofertas_categorias                                    */
/*==============================================================*/
create table ofertas_categorias (
   oferta               int4                 not null,
   categoria            int4                 not null,
   constraint pk_ofertas_categorias primary key (oferta, categoria),
   constraint fk_categor foreign key (categoria)
      references categorias (id),
   constraint fk_ofertas__ofertacategoria foreign key (oferta)
      references ofertas (id)
);
/*==============================================================*/
/* Table: ofertas_ciudades                                      */
/*==============================================================*/
create table ofertas_ciudades (
   ciudades_id          int2                 not null,
   ofertas_id           int4                 not null,
   constraint pk_ofertas_ciudades primary key (ciudades_id, ofertas_id),
   constraint fk_ciudad1 foreign key (ciudades_id)
      references ciudades (id),
   constraint fk_ciudades_ofertas_ofertas foreign key (ofertas_id)
      references ofertas (id)
);
/*==============================================================*/
/* Index: ix_unique_ofertas_individuales                        */
/*==============================================================*/
create unique index ix_unique_ofertas_individuales on ofertas_individuales (
ofertas_id,
color,
tamano,
estilo,
peso
);
/*==============================================================*/
/* Table: ofertas_modos_entrega                                 */
/*==============================================================*/
create table ofertas_modos_entrega (
   ofertas_id           int4                 not null,
   modos_entrega_id     int4                 not null,
   constraint pk_ofertas_modos_entrega primary key (ofertas_id, modos_entrega_id),
   constraint fk_modos_e foreign key (modos_entrega_id)
      references modos_entrega (id),
   constraint fk_ofertas foreign key (ofertas_id)
      references ofertas (id)
);
/*==============================================================*/
/* Index: ix_unique_ofertas_reservas                            */
/*==============================================================*/
create unique index ix_unique_ofertas_reservas on ofertas_reservas (
ofertas_id,
fecha_utilizacion,
hora_utilizacion
);
/*==============================================================*/
/* Index: ix_unique_paises                                      */
/*==============================================================*/
create unique index ix_unique_paises on paises (
pais
);
/*==============================================================*/
/* Index: ix_unique_persona                                     */
/*==============================================================*/
create  index ix_unique_persona on personas (
tipo_documento,
documento
);
/*==============================================================*/
/* Table: roles                                                 */
/*==============================================================*/
create table roles (
   id                   serial not null,
   rol                  varchar(75)          not null,
   descripcion          varchar(250)         not null,
   constraint pk_roles primary key (id)
);
/*==============================================================*/
/* Index: ix_unique_roles                                       */
/*==============================================================*/
create unique index ix_unique_roles on roles (
rol
);
/*==============================================================*/
/* Index: ix_unique_talonarios                                  */
/*==============================================================*/
create unique index ix_unique_talonarios on talonarios (
caja_id,
timbrado_id,
inicio_secuencia
);
/*==============================================================*/
/* Index: ix_unique_tiendas                                     */
/*==============================================================*/
create unique index ix_unique_tiendas on tiendas (
tienda
);
/*==============================================================*/
/* Table: tiendas_categorias                                    */
/*==============================================================*/
create table tiendas_categorias (
   categorias_id        int4                 not null,
   tiendas_id           int4                 not null,
   constraint pk_tiendas_categorias primary key (categorias_id, tiendas_id),
   constraint fk_categor foreign key (categorias_id)
      references categorias (id)
      on delete restrict on update restrict,
   constraint fk_tiendas_tiendas_categorias foreign key (tiendas_id)
      references tiendas (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Index: ix_unique_timbrado                                    */
/*==============================================================*/
create unique index ix_unique_timbrado on timbrado (
codigo
);
/*==============================================================*/
/* Index: ix_unique_tipos_ofertas                               */
/*==============================================================*/
create unique index ix_unique_tipos_ofertas on tipos_ofertas (
tipo_oferta
);
/*==============================================================*/
/* Index: ix_unique_tipos_tienda                                */
/*==============================================================*/
create unique index ix_unique_tipos_tienda on tipos_tienda (
tipo_tienda
);
/*==============================================================*/
/* Index: ix_unique_usuarios                                    */
/*==============================================================*/
create unique index ix_unique_usuarios on usuarios (
username
);
/*==============================================================*/
/* Index: ix_unique_mail                                        */
/*==============================================================*/
create unique index ix_unique_mail on usuarios (
mail
);
/*==============================================================*/
/* Table: usuarios_categorias                                   */
/*==============================================================*/
create table usuarios_categorias (
   usuarios_id          int4                 not null,
   categorias_id        int4                 not null,
   constraint pk_usuarios_categorias primary key (usuarios_id, categorias_id),
   constraint fk_categor foreign key (categorias_id)
      references categorias (id)
      on delete restrict on update restrict,
   constraint fk_usuarios_usuarios_categorias foreign key (usuarios_id)
      references usuarios (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Table: usuarios_ofertas                                      */
/*==============================================================*/
create table usuarios_ofertas (
   id                   serial not null,
   usuario_id           int4                 not null,
   oferta_id            int4                 not null,
   oferta_atributo_id   int4                 null,
   oferta_hora_id       int4                 null,
   cantidad_venta       int2                 not null,
   cantidad_regalo      int2                 not null,
   fecha_marcado        timestamp            null,
   fecha_vencimiento    timestamp            not null,
   tipo_reserva         int4                 not null
      constraint ckc_tipo_reserva_usuarios check (tipo_reserva between 1 and 2 and tipo_reserva in (1,2)),
   constraint pk_usuarios_ofertas primary key (id),
   constraint fk_ofertas_usuarios_ofertas foreign key (oferta_id)
      references ofertas (id)
      on delete restrict on update restrict,
   constraint fk_ofertas foreign key (oferta_hora_id)
      references ofertas_reservas (id)
      on delete restrict on update restrict,
   constraint fk_oferta2 foreign key (oferta_atributo_id)
      references ofertas_individuales (id)
      on delete restrict on update restrict,
   constraint fk_usuarios_usuarios_ofertas foreign key (usuario_id)
      references usuarios (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Index: ix_unique_usuarios_ofertas                            */
/*==============================================================*/
create unique index ix_unique_usuarios_ofertas on usuarios_ofertas (
oferta_id,
usuario_id
);
/*==============================================================*/
/* Table: usuarios_roles                                        */
/*==============================================================*/
create table usuarios_roles (
   roles_id             int4                 not null,
   usuarios_id          int4                 not null,
   constraint pk_usuarios_roles primary key (roles_id, usuarios_id),
   constraint fk_usuarios_usuarios_roles foreign key (usuarios_id)
      references usuarios (id)
      on delete restrict on update restrict,
   constraint fk_roles_usuarios_roles foreign key (roles_id)
      references roles (id)
      on delete restrict on update restrict
);
/*==============================================================*/
/* Index: ix_unique_proforma                                    */
/*==============================================================*/
create unique index ix_unique_proforma on ventas (
proforma
);
/*==============================================================*/
/* Index: ix_unique_nro_factura                                 */
/*==============================================================*/
create unique index ix_unique_nro_factura on ventas (
numero_factura,
talonario_id
);
