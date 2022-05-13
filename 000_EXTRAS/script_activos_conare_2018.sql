SELECT 
	Id_Act AS 'Id Activo', 
    Id_INS_Act AS 'Activo Institucional',
    Nombre_Act AS 'Nombre',
    Marca_Act AS 'Marca', 
    Modelo_Act AS 'Modelo',
    Numero_Serie_Act AS 'N° Serie', 
    CAST(Descripcion_Act AS CHAR(10000) CHARACTER SET utf8) AS 'Descripción Producto',
    Fecha_Recepcion_Act AS 'Fecha de Ingreso',
    Tiempo_Garantia_Act AS 'Tiempo Garantía',
    Costo_Act AS 'Costo',
    Color_Act AS 'Color',
    Nombre_Zonas_tmp AS 'Ubicación',
    IF(Id_Uni_Act=1,'CONARE',IF(Id_Uni_Act=2,'UNA',IF(Id_Uni_Act=3,'UCR',IF(Id_Uni_Act=4,'UNED',IF(Id_Uni_Act=5,'TEC',IF(Id_Uni_Act=6,'DESCONOCIDO','NULL')))))) AS 'Dueño',
	IF(Verificado_Act=1,'Sí','No') AS 'Verificado',
    CONCAT(Nombre_Per," ",Apellido1_Per," ",Apellido2_Per) AS 'Verificado Por',
	Numero_OC AS 'N° Orden Compra',
    Fecha_OC AS 'Fecha Orden Compra',
    Anno_OC AS 'Año Orden Compra',
    Numero_Compr AS 'Compromiso',
    Numero_Parti AS 'Partida',
    Nombre_Prove AS 'Proveedor',
    Numero_Factu AS 'N° Factura',
    Fecha_Factu AS 'Fecha Factura',
    Numero_Trans AS 'N° Transferencia',
    IF(Desecho_Act=1,'Sí','No') AS 'Desecho',
    CAST(Descripcion_Dese_Act AS CHAR(10000) CHARACTER SET utf8) AS 'Descripción Desecho',
	IF(Donacion_Act=1,'Sí','No') AS 'Donación',
    CAST(Descripcion_Dona_Act AS CHAR(10000) CHARACTER SET utf8) AS 'Descripción Donación',
	IF(Mantenimiento_Act=1,'Sí','No') AS 'Mantenimiento',
    CAST(Descripcion_Mante_Act AS CHAR(10000) CHARACTER SET utf8) AS 'Descripción Mantenimiento'
    
    FROM tab_Activos
    INNER JOIN tab_zonas_tmp ON(Id_Zonas_tmp_Act = Id_Zonas_tmp)
    INNER JOIN tab_usuarios ON(Id_Per_Usu_Act = Id_Per_Usu)
    INNER JOIN tab_personas ON(Id_Per_Usu = Id_Per)
    INNER JOIN tab_facturas ON (Id_Factu_Act = Id_Factu)
    INNER JOIN tab_transferencias ON(Id_Trans_Factu = Id_Trans) 
    INNER JOIN tab_ordenes_compras ON (Id_OC_Factu = Id_OC)
    INNER JOIN tab_compromisos ON (Id_Compr_OC = Id_Compr)
    INNER JOIN tab_proveedores ON (Id_Prove_OC = Id_Prove)
    INNER JOIN tab_partidas ON (Id_Parti_OC = Id_Parti)
    WHERE Activo_Act = '1' 
    AND Id_Uni_Act = 1 