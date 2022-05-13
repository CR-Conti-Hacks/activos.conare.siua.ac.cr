<?php
    // Include the main TCPDF library (search for installation path).
    require_once('../../../Include/Miniaplicaciones/tcpdf/config/tcpdf_config_alt.php');
    require_once('../../../Include/Miniaplicaciones/tcpdf/tcpdf.php');

    /**************************************************/
    /************  Parametros de documento ************/
    /**************************************************/
    $Orientacion  = 'P'; //P=vertical / L=horizontal
    $Unidad = 'mm'; //pt=point, mm=millimeter, cm=centimeter, in=inch
    $Formato_Pagina = 'A4';
    $Codificacion = 'UTF-8';

    /**************************************************/
    /************   Parametros de autor    ************/
    /**************************************************/
    $Creador = "Sistema SAE";
    $Autor ="Gustavo Matamoros González";
    $Titulo="Detalle de Persona";
    $Persona ="Gustavo Matamoros González";
    $Asunto="Asunto del reporte";
    $Palabras_Claves ="palabra1, palabra2, palabra3";
    
   
    /**************************************************/
    /************   Parametros de header   ************/
    /**************************************************/
   
    

    // Creamos funciones para generar encabezados personalizados
    class MYPDF extends TCPDF {
    
        //Encabezado
        public function Header($image_file) {
            //Verificamos si se envia un logo
            $Img_Logo = (isset($_GET['Logo'])) ? $_GET['Logo'] : '';
            $Titulo="Detalle de Persona";
            $Persona ="Gustavo Matamoros González";
            $Orientacion  = 'P'; //P=vertical / L=horizontal
            
            //Dibujar un rectangulo
            //X, Y , width, height
            $this->Rect(0, 0, 300, 15,'F',array(),array(38, 103, 201));
            
            if($Img_Logo !=''){
                $extension = substr($Img_Logo, -3, 3); //obtenemos la extension
                $image_file = $Img_Logo;
                /*Image (
                        $file,
                        $x='',
                        $y='',
                        $w=0,
                        $h=0,
                        $type='',
                        $link='',
                        $align='',
                        $resize=false,
                        $dpi=300,
                        $palign='',
                        $ismask=false,
                        $imgmask=false,
                        $border=0,
                        $fitbox=false,
                        $hidden=false,
                        $fitonpage=false,
                        $alt=false,
                        $altimgs=array())
                        http://www.tcpdf.org/doc/code/classTCPDF.html#a714c2bee7d6b39d4d6d304540c761352
                */
                $this->Image(
                        $image_file, //Direccion del archivo
                        2, //Eje X ->
                        2, //Eje Y 
                        '', //Ancho
                        10, //Alto
                        $extension, //Tipo JGP o PNG
                        '', //Link de la imagen a una pagina web
                        'T', //align T: top-right for LTR or top-left for RTL    M: middle-right for LTR or middle-left for RTL    B: bottom-right for LTR or bottom-left for RTL    N: next line
                        false, //resize
                        300, //dpi
                        '', //palign
                        false,
                        false,
                        0, //border
                        false,
                        false,
                        false);
            }
    
            
            //Estilo de Fuente
            //Courier / Helvetica / Arial / Times / Symbol / ZapfDingbats
            //Estilo: empty string: regular / B: bold / I: italic / U: underline or any combination.
            //Size: Font size in points
            $this->SetFont('helvetica', 'B', 15);
            // Titulo
            /*
             *TCPDF::Cell 	(
             *      $w,
                    $h = 0,
                    $txt = '',
                    $border = 0,
                    $ln = 0,
                    $align = '',    L or empty string: left align (default value)    C: center    R: right align    J: justify
                    $fill = false, (boolean) Indicates if the cell background must be painted (true) or transparent (false). 
                    $link = '',
                    $stretch = 0,
                    $ignore_min_height = false,
                    $calign = 'T',
                    $valign = 'M' 
            ) 		
             **/
            if($Orientacion == 'P'){
                $Titulo_Ancho = 195;
            }else if($Orientacion=='P'){
                $Titulo_Ancho = 280;
            }
            $this->SetTextColor(255,255,255);
            $this->SetY(7);
            $this->Cell($Titulo_Ancho, 10, $Titulo.': '.$Persona, 0, false, 'C', 0, '', 0, false, 'C', 'C');
        }
    
        // Page footer
        public function Footer() {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }
    
   

        //Crear un nuevo documento
        //Orientacion de la pagina
        //Unidad de medida solo sirve con mm
        //Formato de pagina solo sirve con A4
        //Unicode = true
        //Codificacion = UTF-8
        //Diskcache = false
        $pdf = new MYPDF($Orientacion, $Unidad, $Formato_Pagina, true, $Codificacion, false);
    
        //Informacion del documento
        $pdf->SetCreator($Creador);
        $pdf->SetAuthor($Autor);
        $pdf->SetTitle($Titulo);
        $pdf->SetSubject($Asunto);
        $pdf->SetKeywords($Palabras_Claves);
        
        // add a page
        $pdf->AddPage();

        $html = '<br><br><br>
                <style>
                .tabla{
                    margin: 0 auto;
                    text-align: center;
                    border:none
                    margin:0 auto;
                    width:100%;
                    text-align:center;
                    background-color:#FFFFFF;
                    border-collapse: collapse;
                }
                tr, td{
                    border:0px solid #EAEAEA;
                }
                .subtitulo{
                    margin:0 auto;
                    text-align:center;
                    background-color:#1E91D0;
                    color:#FFF;
                }
                .celda_titulo{
                    background-color:#C4CCD1;
                }
                .izquierda{
                    text-align:left;
                }
                .centrado{
                    text-align:center;
                }
                </style>
                    <table class="tabla">
                        <tbody>
                            <tr>
                                <td class="subtitulo" colspan="2">Detalle de información</td>
                            </tr>
                            <tr>
                                <td>
                                <br>
                                <br>
                                <br>
                                <br>
                                Fotografía:
                                </td>
                                <td align="center">
                                    <br>
                                    <br>
                                    <img src="http://desarrollo.siua.ac.cr/Sistemas/SAE2016/img/Usuarios/1-1162-0857.jpg" style="height: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="subtitulo" colspan="2">Datos de Persona</td>
                            </tr>
                            <tr>
                                <td class="celda_titulo izquierda">Cédula:</td>
                                <td class="izquierda">1-1162-0857</td>
                            </tr>
                            <tr>
                                <td class="celda_titulo izquierda">Nombre:</td>
                                <td class="izquierda">Gustavo Matamoros González</td>
                            </tr>
                            <tr>
                                <td class="celda_titulo izquierda">Género:</td>
                                <td class="izquierda">Masculino</td>
                            </tr>
                            <tr>
                                <td class="subtitulo" colspan="2">Datos de ubicación</td>
                            </tr>
                            <tr>
                                <td class="celda_titulo izquierda">Dirección:</td>
                                <td class="izquierda">800 mts noreste de la pulpería el corazón de Jesús, Concepción de San Rafel de Heredia</td>
                            </tr>
                            <tr>
                                <td class="celda_titulo izquierda">País:</td>
                                <td class="izquierda">Costa Rica</td>
                            </tr>
                            <tr>
                                <td class="celda_titulo izquierda">Provincia:</td>
                                <td class="izquierda">Heredia</td>
                            </tr>
                            <tr>
                                <td class="celda_titulo izquierda">Cantón:</td>
                                <td class="izquierda">San Rafael</td>
                            </tr>
                            <tr>
                                <td class="celda_titulo izquierda">Distrito:</td>
                                <td class="izquierda">Concepción</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="tabla">
                        <tbody>
                            <tr>
                                <td class="subtitulo" colspan="4">Teléfonos:</td>
                            </tr>
                            <tr>
                                <td class="celda_titulo centrado">Teléfono:</td>
                                <td class="celda_titulo centrado">Tipo de teléfono:</td>
                                <td class="celda_titulo centrado">Notificación:</td>
                                <td class="celda_titulo centrado">Público:</td>
                            </tr>
                            <tr class="centrado">
                                <td class="centrado"> 60462663 </td>
                                <td class="centrado"> Celular </td>
                                <td class="centrado">
                                    <img style=" width: 20px;" src="http://desarrollo.siua.ac.cr/Sistemas/SAE2016/img/SAE/si.png">
                                </td>
                                <td class="centrado">
                                    <img style=" width: 20px;" src="http://desarrollo.siua.ac.cr/Sistemas/SAE2016/img/SAE/no.png">
                                </td>
                            </tr>
                            <tr class="centrado">
                                <td class="centrado"> 22366389 </td>
                                <td class="centrado"> Habitación </td>
                                <td class="centrado">
                                    <img style=" width: 20px;" src="http://desarrollo.siua.ac.cr/Sistemas/SAE2016/img/SAE/no.png">
                                </td>
                                <td class="centrado">
                                    <img style=" width: 20px;" src="http://desarrollo.siua.ac.cr/Sistemas/SAE2016/img/SAE/si.png">
                                </td>
                            </tr>
                        </tbody>
                    </table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

    
        function Nombre_archivo($nombre) {
     
            // Tranformamos todo a minusculas
             
            $nombre = strtolower($nombre);
             
            //Rememplazamos caracteres especiales latinos
             
            $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
             
            $repl = array('a', 'e', 'i', 'o', 'u', 'n');
             
            $nombre = str_replace ($find, $repl, $nombre);
             
            // Añaadimos los guiones
             
            $find = array(' ', '&', '\r\n', '\n', '+'); 
            $nombre = str_replace ($find, '-', $nombre);
             
            // Eliminamos y Reemplazamos demás caracteres especiales
             
            $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
             
            $repl = array('', '-', '');
             
            $nombre = preg_replace ($find, $repl, $nombre);
             
            return $nombre;
             
        }

        $Nom_arch = Nombre_archivo($Titulo." ".$Persona);

        
$pdf->lastPage();

//Close and output PDF document
$pdf->Output($Nom_arch, 'I');

//============================================================+
// END OF FILE
//============================================================+
