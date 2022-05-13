<!-- ****************************************************************************************************************************** -->
<!-- ****************************************************************************************************************************** -->
<!-- ********************************************  CONFIGURACIÖN  ***************************************************************** -->
<!-- ****************************************************************************************************************************** -->
<!-- ****************************************************************************************************************************** -->
<div class="row">
      <div class="col col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading clearfix">

            <a onclick="imprimirReportePDF()" class="btn_pdf pull-right ">
              <i class="fas fa-file-pdf"></i> 
              PDF 
            </a>
            <a onclick="imprimirReporteExcel()" class="btn_excel pull-right ">
              <i class="fas fa-file-excel"></i> 
              EXCEL 
            </a>
            <a onclick="recargar()"  class="btn_aplicar pull-right"> 
              <i class="fa fa-check-circle"></i> 
              Aplicar Cambios
            </a>
            <a onclick="muestraOcultaConfiguracion('contenedor_Configuracion')"  class="btn_aplicar pull-right">
              <i class="fa fa-cog"></i> 
              Configurar Vista
            </a>
          </div>
          <div class="panel-body" style="display:none;" id="contenedor_Configuracion">
            <div class="row">
              <div class="col col-xs-12 col-lg-12 ">
                <div style="text-align: center;" id="div_mostrar_ocultar">
                  <div id="titulo_marque">Configurar Vista:</div>
                  <p>Ordene las columnas disponibles arrastrando el icono <span class="glyphicon glyphicon-move"></span> y marque la columnas que desea se muestren en el reporte y recuerde aplicar los cambios con el botón de <b>"Aplicar Cambios"</b>para que surjan efecto la modificación.</p>
                  <br />

                  <div style="text-align: center;margin: 0 auto;">
                    <table class="table table-sortable" id="tabla_campos">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Columna</th>
                            <th>Mostrar/Ocultar</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                         <?php 
                          for($i=0; $i < count($campos); $i++){
                            switch ($campos[$i]) {
                              case 'activo':
                                  ?>
                                  <tr draggable="true">
                                      <td>
                                        <span class="glyphicon glyphicon-move"></span>
                                      </td>
                                      <td>
                                        Id Activo
                                        <input type="hidden" id="i_activo" name="campos" value="activo">
                                      </td>
                                      <td>
                                        <input type="checkbox" id="c_activo"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                      </td>
                                  </tr>
                                  <?php
                                  break;
                              case 'nombre':
                                  ?>
                                  <tr draggable="true">
                                      <td>
                                        <span class="glyphicon glyphicon-move"></span>
                                      </td>
                                      <td>
                                        Nombre
                                        <input type="hidden" id="i_nombre" name="campos" value="nombre">
                                      </td>
                                      <td>
                                        <input type="checkbox" id="c_nombre"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                      </td>
                                  </tr>
                                  <?php
                                  break;
                              case 'marca':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Marca
                                          <input type="hidden" id="i_marca" name="campos" value="marca">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_marca"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'modelo':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Modelo
                                          <input type="hidden" id="i_modelo" name="campos" value="modelo">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_modelo"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'color':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Color
                                          <input type="hidden" id="i_color" name="campos" value="color">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_color"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'serie':
                                  ?>
                                  <tr draggable="true">
                                      <td>
                                        <span class="glyphicon glyphicon-move"></span>
                                      </td>
                                      <td>
                                        N° Serie
                                        <input type="hidden" id="i_serie" name="campos" value="serie">
                                      </td>
                                      <td>
                                        <input type="checkbox" id="c_serie"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                      </td>
                                  </tr>
                                  <?php
                                  break;
                              case 'descripcion':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Descripción
                                          <input type="hidden" id="i_descripcion" name="campos" value="descripcion">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_descripcion"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'institucional':
                                  if($Ocultar_Activo_Institucional_ACON !='1'){
                                  ?>
                                  <tr draggable="true">
                                      <td>
                                        <span class="glyphicon glyphicon-move"></span>
                                      </td>
                                      <td>
                                        Activo Institucional
                                        <input type="hidden" id="i_institucional" name="campos" value="institucional">
                                      </td>
                                      <td>
                                        <input type="checkbox" id="c_institucional"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                      </td>
                                  </tr>

                                  <?php
                                }
                                  break;
                              case 'institucion':
                                  ?>
                                  <tr draggable="true">
                                      <td>
                                        <span class="glyphicon glyphicon-move"></span>
                                      </td>
                                      <td>
                                        Institución
                                        <input type="hidden" id="i_institucion" name="campos" value="institucion">
                                      </td>
                                      <td>
                                        <input type="checkbox" id="c_institucion"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                      </td>
                                  </tr>
                                  <?php
                                  break;
                              case 'activoFijo':
                                  ?>
                                  <tr draggable="true">
                                      <td>
                                        <span class="glyphicon glyphicon-move"></span>
                                      </td>
                                      <td>
                                        Activo Fijo
                                        <input type="hidden" id="i_activoFijo" name="campos" value="activoFijo">
                                      </td>
                                      <td>
                                        <input type="checkbox" id="c_activoFijo"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                      </td>
                                  </tr>
                                  <?php
                                  break;
                              case 'fechaRecepcion':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Fecha Recepción
                                          <input type="hidden" id="i_fechaRecepcion" name="campos" value="fechaRecepcion">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_fechaRecepcion"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'tiempoGarantia':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Tiempo Garantía
                                          <input type="hidden" id="i_tiempoGarantia" name="campos" value="tiempoGarantia">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_tiempoGarantia"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'orden':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Orden
                                          <input type="hidden" id="i_orden" name="campos" value="orden">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_orden"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'factura':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Factura
                                          <input type="hidden" id="i_factura" name="campos" value="factura">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_factura"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'costo':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Costo
                                          <input type="hidden" id="i_costo" name="campos" value="costo">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_costo"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'proveedor':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Proveedor
                                          <input type="hidden" id="i_proveedor" name="campos" value="proveedor">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_proveedor"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'compromiso':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Compromiso
                                          <input type="hidden" id="i_compromiso" name="campos" value="compromiso">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_compromiso"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'partida':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Partida
                                          <input type="hidden" id="i_partida" name="campos" value="partida">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_partida"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;

                              case 'transferencia':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Transferencia
                                          <input type="hidden" id="i_transferencia" name="campos" value="transferencia">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_transferencia"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;

                              case 'zona':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Zona
                                          <input type="hidden" id="i_zona" name="campos" value="zona">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_zona"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'responsable':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Responsable
                                          <input type="hidden" id="i_responsable" name="campos" value="responsable">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_responsable"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'custodio':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Custodio
                                          <input type="hidden" id="i_custodio" name="campos" value="custodio">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_custodio"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'desecho':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Desecho
                                          <input type="hidden" id="i_desecho" name="campos" value="desecho">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_desecho"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                               case 'descripcionDesecho':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Desc. Desecho
                                          <input type="hidden" id="i_descripcionDesecho" name="campos" value="descripcionDesecho">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_descripcionDesecho"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'mantenimiento':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Mantenimiento
                                          <input type="hidden" id="i_mantenimiento" name="campos" value="mantenimiento">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_mantenimiento"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                               case 'descripcionmantenimiento':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Desc. Mantenimiento
                                          <input type="hidden" id="i_descripcionmantenimiento" name="campos" value="descripcionmantenimiento">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_descripcionmantenimiento"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;

                              case 'donacion':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Donación
                                          <input type="hidden" id="i_donacion" name="campos" value="donacion">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_donacion"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'descripcionDonacion':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Desc. Donación
                                          <input type="hidden" id="i_descripcionDonacion" name="campos" value="descripcionDonacion">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_descripcionDonacion"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'verificado':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Estado Verificado
                                          <input type="hidden" id="i_verificado" name="campos" value="verificado">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_verificado"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                              case 'verificadoPor':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Verificado Por
                                          <input type="hidden" id="i_verificadoPor" name="campos" value="verificadoPor">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_verificadoPor"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;
                               case 'verificacionFecha':
                                  ?>
                                    <tr draggable="true">
                                        <td>
                                          <span class="glyphicon glyphicon-move"></span>
                                        </td>
                                        <td>
                                          Verificación Fecha
                                          <input type="hidden" id="i_verificacionFecha" name="campos" value="verificacionFecha">
                                        </td>
                                        <td>
                                          <input type="checkbox" id="c_verificacionFecha"  name="mostrar" <?php if($mostrar[$i]==1){?> checked="checked" <?php } ?>>
                                        </td>
                                    </tr>
                                  <?php
                                  break;

                            }
                          }
                        ?>
                        

                  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<div>
<!-- ****************************************************************************************************************************** -->
<!-- ****************************************************************************************************************************** -->
<!-- ********************************************  CONFIGURACIÖN  ***************************************************************** -->
<!-- ****************************************************************************************************************************** -->
<!-- ****************************************************************************************************************************** -->