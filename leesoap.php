<?php
function webService($identificacion)
{
      
	$url_w = "https://www.positivasiarp.gov.co:8081/ws/services/pck_webservices_n_ws_integracion?method=f_consulta_afiliado_empresa&as_tipo=$identificacion&as_documento=1";
	$url = (string)(file_get_contents($url_w));
	$url = str_replace('&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot; standalone=&quot;no&quot;?&gt;', '', $url);
	$url = str_replace('<?xml version="1.0" encoding="UTF-8"?><soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><soapenv:Body><f_consulta_afiliado_empresaResponse soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><f_consulta_afiliado_empresaReturn xsi:type="xsd:string">', '', $url);
	$url = str_replace('</f_consulta_afiliado_empresaReturn></f_consulta_afiliado_empresaResponse></soapenv:Body></soapenv:Envelope>', '', $url);
	$url = str_replace('&lt;', '<', $url);
	$url = str_replace('&gt;', '>', $url);
	return simplexml_load_string($url)->d_datos_afiliados_row[0];	
}
$datos = webService("79922514");
echo " -------------- Datos ----------------- <br><br>";
echo "Idempresa: ". $datos->id_empresa;
echo "<br>Razon social: ". $datos->razon_social;
echo "<br>id_persona: ". $datos->id_persona;
echo "<br>nombre_departamento: ". $datos->nombre_departamento;
echo "<br>nombre_municipio: ". $datos->nombre_municipio;
echo "<br>nombre1: ". $datos->nombre1;
echo "<br>nombre2: ". $datos->nombre2;
echo "<br>apellido1: ". $datos->apellido1;
echo "<br>apellido2: ". $datos->apellido2;
echo "<br>email_persona: ". $datos->email_persona;
echo "<br>nombre_ocupacion: ". $datos->nombre_ocupacion;
echo "<br>sexo: ". $datos->sexo;
?>