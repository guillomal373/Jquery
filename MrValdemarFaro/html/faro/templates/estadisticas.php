<?php

class Institucion{
    var $id;
    var $nombre;
    var $tipo;
    var $puntaje;
    var $municipio;
    var $principal;
} $instituciones = new Institucion();

include("../application.php");

$estatuto_contratacion = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$estatuto_contratacion[-1] = 0;
$estatuto_bienestar = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$estatuto_bienestar[-1] = 0;
$estatuto_docente = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$estatuto_docente[-1] = 0;
$reglamento = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$reglamento[-1] = 0;
$estatuto_general = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$estatuto_general[-1] = 0;
$justificacion = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$justificacion[-1] = 0;
$incremento_pecuniarios = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$incremento_pecuniarios[-1] = 0;
$actos_pecuniarios = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$actos_pecuniarios[-1] = 0;
$valores_pecuniarios = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$valores_pecuniarios[-1] = 0;

$webs = $db->sql_query("
	SELECT  ies.nombre AS institucion,
                ies.municipio AS municipio,
                iw.estatuto_contratacion, 
                iw.estatuto_bienestar, 
                iw.estatuto_docente, 
                iw.reglamento, 
                iw.estatuto_general, 
                iw.justificacion, 
                iw.incremento_pecuniarios,
                iw.actos_pecuniarios, 
                iw.valores_pecuniarios
        FROM ies_website iw
        LEFT JOIN ies
        ON ies.id = iw.codigo_ies
");

$total = 1;
while ($web = $db->sql_fetchrow($webs)) {
    $estatuto_contratacion[$web['estatuto_contratacion']]++;
    $estatuto_bienestar[$web['estatuto_bienestar']]++;
    $estatuto_docente[$web['estatuto_docente']]++;
    $reglamento[$web['reglamento']]++;
    $estatuto_general[$web['estatuto_general']]++;
    $justificacion[$web['justificacion']]++;
    $incremento_pecuniarios[$web['incremento_pecuniarios']]++;
    $actos_pecuniarios[$web['actos_pecuniarios']]++;
    $valores_pecuniarios[$web['valores_pecuniarios']]++;
    $total++;
}

//total = 100%
//  n  ->  X%     n*100/TOTAL
// "0"=>"No Aplica","1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"
echo "Estatuto Contratacion: <br />";
echo " - No Aplica (" . $estatuto_contratacion[0] . "): " . ($estatuto_contratacion[0] * 100) / $total . "%<br />";
echo " - Dificil (" . $estatuto_contratacion[1] . "): " . ($estatuto_contratacion[1] * 100) / $total . "%<br />";
echo " - Medio: (" . $estatuto_contratacion[2] . "): " . ($estatuto_contratacion[2] * 100) / $total . "%<br />";
echo " - Facil: (" . $estatuto_contratacion[3] . "): " . ($estatuto_contratacion[3] * 100) / $total . "%<br />";
echo " - Home: (" . $estatuto_contratacion[4] . "): " . ($estatuto_contratacion[4] * 100) / $total . "%<br />";
echo " - No Publica: (" . $estatuto_contratacion[-1] . "):" . ($estatuto_contratacion[-1] * 100) / $total . "%<br />";

//"1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"
echo "<br />estatuto_bienestar: <br />";
echo " - Dificil (" . $estatuto_bienestar[1] . "): " . ($estatuto_bienestar[1] * 100) / $total . "%<br />";
echo " - Medio: (" . $estatuto_bienestar[2] . "): " . ($estatuto_bienestar[2] * 100) / $total . "%<br />";
echo " - Facil: (" . $estatuto_bienestar[3] . "): " . ($estatuto_bienestar[3] * 100) / $total . "%<br />";
echo " - Home: (" . $estatuto_bienestar[4] . "): " . ($estatuto_bienestar[4] * 100) / $total . "%<br />";
echo " - No Publica: (" . $estatuto_bienestar[-1] . "): " . ($estatuto_bienestar[-1] * 100) / $total . "%<br />";

//"1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"
echo "<br />estatuto_docente: <br />";
echo " - Dificil (" . $estatuto_docente[1] . "): " . ($estatuto_docente[1] * 100) / $total . "%<br />";
echo " - Medio: (" . $estatuto_docente[2] . "): " . ($estatuto_docente[2] * 100) / $total . "%<br />";
echo " - Facil: (" . $estatuto_docente[3] . "): " . ($estatuto_docente[3] * 100) / $total . "%<br />";
echo " - Home: (" . $estatuto_docente[4] . "): " . ($estatuto_docente[4] * 100) / $total . "%<br />";
echo " - No Publica: (" . $estatuto_docente[-1] . "): " . ($estatuto_docente[-1] * 100) / $total . "%<br />";

//"1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"
echo "<br />reglamento: <br />";
echo " - Dificil (" . $reglamento[1] . "): " . ($reglamento[1] * 100) / $total . "%<br />";
echo " - Medio: (" . $reglamento[2] . "): " . ($reglamento[2] * 100) / $total . "%<br />";
echo " - Facil: (" . $reglamento[3] . "): " . ($reglamento[3] * 100) / $total . "%<br />";
echo " - Home: (" . $reglamento[4] . "): " . ($reglamento[4] * 100) / $total . "%<br />";
echo " - No Publica: (" . $reglamento[-1] . "): " . ($reglamento[-1] * 100) / $total . "%<br />";

//"1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"
echo "<br />estatuto_general: <br />";
echo " - Dificil (" . $estatuto_general[1] . "): " . ($estatuto_general[1] * 100) / $total . "%<br />";
echo " - Medio: (" . $estatuto_general[2] . "): " . ($estatuto_general[2] * 100) / $total . "%<br />";
echo " - Facil: (" . $estatuto_general[3] . "): " . ($estatuto_general[3] * 100) / $total . "%<br />";
echo " - Home: (" . $estatuto_general[4] . "): " . ($estatuto_general[4] * 100) / $total . "%<br />";
echo " - No Publica: (" . $estatuto_general[-1] . "):" . ($estatuto_general[-1] * 100) / $total . "%<br />";

//"0"=>"No Aplica","1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"
echo "<br />justificacion: <br />";
echo " - No Aplica (" . $justificacion[0] . "): " . ($justificacion[0] * 100) / $total . "%<br />";
echo " - Dificil (" . $justificacion[1] . "): " . ($justificacion[1] * 100) / $total . "%<br />";
echo " - Medio: (" . $justificacion[2] . "): " . ($justificacion[2] * 100) / $total . "%<br />";
echo " - Facil: (" . $justificacion[3] . "): " . ($justificacion[3] * 100) / $total . "%<br />";
echo " - Home: (" . $justificacion[4] . "): " . ($justificacion[4] * 100) / $total . "%<br />";
echo " - No Publica: (" . $justificacion[-1] . "):" . ($justificacion[-1] * 100) / $total . "%<br />";

//"1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"
echo "<br />incremento_pecuniarios : <br />";
echo " - Dificil (" . $incremento_pecuniarios[1] . "): " . ($incremento_pecuniarios[1] * 100) / $total . "%<br />";
echo " - Medio: (" . $incremento_pecuniarios[2] . "): " . ($incremento_pecuniarios[2] * 100) / $total . "%<br />";
echo " - Facil: (" . $incremento_pecuniarios[3] . "): " . ($incremento_pecuniarios[3] * 100) / $total . "%<br />";
echo " - Home: (" . $incremento_pecuniarios[4] . "): " . ($incremento_pecuniarios[4] * 100) / $total . "%<br />";
echo " - No Publica: (" . $incremento_pecuniarios[-1] . "): " . ($incremento_pecuniarios[-1] * 100) / $total . "%<br />";

//"1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"
echo "<br />actos_pecuniarios : <br />";
echo " - Dificil (" . $actos_pecuniarios[1] . "): " . ($actos_pecuniarios[1] * 100) / $total . "%<br />";
echo " - Medio: (" . $actos_pecuniarios[2] . "): " . ($actos_pecuniarios[2] * 100) / $total . "%<br />";
echo " - Facil: (" . $actos_pecuniarios[3] . "): " . ($actos_pecuniarios[3] * 100) / $total . "%<br />";
echo " - Home: (" . $actos_pecuniarios[4] . "): " . ($actos_pecuniarios[4] * 100) / $total . "%<br />";
echo " - No Publica: (" . $actos_pecuniarios[-1] . "): " . ($actos_pecuniarios[-1] * 100) / $total . "%<br />";

//"1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"
echo "<br />valores_pecuniarios : <br />";
echo " - Dificil (" . $valores_pecuniarios[1] . "): " . ($valores_pecuniarios[1] * 100) / $total . "%<br />";
echo " - Medio: (" . $valores_pecuniarios[2] . "): " . ($valores_pecuniarios[2] * 100) / $total . "%<br />";
echo " - Facil: (" . $valores_pecuniarios[3] . "): " . ($valores_pecuniarios[3] * 100) / $total . "%<br />";
echo " - Home: (" . $valores_pecuniarios[4] . "): " . ($valores_pecuniarios[4] * 100) / $total . "%<br />";
echo " - No Publica: (" . $valores_pecuniarios[-1] . "): " . ($valores_pecuniarios[-1] * 100) / $total . "%<br />";

//escalafon Instituciones (Nombres, Puntajes)
$institucionesEscalafon = array();
$institucionesOficiales = array();
$institucionesPublicas = array();

$resultWebs = $db->sql_query("
	SELECT ies.*, w.* 
        FROM ies_website w
        LEFT JOIN ies ON ies.id = w.codigo_ies
");

while ( $web = $db->sql_fetchrow($resultWebs)) {
    $institucionTemp = new Institucion();
    $institucionTemp->id = $web['codigo'];
    $institucionTemp->nombre = $web['nombre'];
    $institucionTemp->principal = $web['id_tipo'];
    $institucionTemp->tipo = $web['id_sector'];
    $institucionTemp->municipio = $web['municipio'];
    $institucionTemp->puntaje = 0;
    if ( $web['valores_pecuniarios'] > 0 )
        $institucionTemp->puntaje += $web['valores_pecuniarios'];
    if ( $web['actos_pecuniarios'] > 0 ) 
        $institucionTemp->puntaje += $web['actos_pecuniarios'];
    if ( $web['incremento_pecuniarios'] > 0 ) 
        $institucionTemp->puntaje += $web['incremento_pecuniarios'];
    if ( $web['justificacion'] > 0 ) 
        $institucionTemp->puntaje += $web['justificacion'];
    if ( $web['estatuto_general'] > 0 ) 
        $institucionTemp->puntaje += $web['estatuto_general'];
    if ( $web['reglamento'] > 0 ) 
        $institucionTemp->puntaje += $web['reglamento'];
    if ( $web['estatuto_docente'] > 0 ) 
        $institucionTemp->puntaje += $web['estatuto_docente'];
    if ( $web['estatuto_bienestar'] > 0 ) 
        $institucionTemp->puntaje += $web['estatuto_bienestar'];
    if ( $web['estatuto_contratacion'] > 0 ) 
        $institucionTemp->puntaje += $web['estatuto_contratacion'];
    array_push($institucionesEscalafon, $institucionTemp);
}

//ORDENAR
for ($i = 0; $i < count($institucionesEscalafon); $i++){
    for ($j= 0; $j < count($institucionesEscalafon); $j++){
        if ( $institucionesEscalafon[$j]->puntaje < $institucionesEscalafon[$i]->puntaje ) {
            $instTemp = $institucionesEscalafon[$i];
            $institucionesEscalafon[$i] = $institucionesEscalafon[$j];
            $institucionesEscalafon[$j] = $instTemp;
        }
    }
}

for ($i = 0; $i < count($institucionesEscalafon); $i++){
    if ( $institucionesEscalafon[$i]->tipo == 1 ){
        array_push($institucionesPublicas, $institucionesEscalafon[$i]);
    } else array_push($institucionesOficiales, $institucionesEscalafon[$i]);
}

echo "<br /><br /> --------------------- <strong>INSTITUCIONES PRIVADAS</strong> --------------------- <br />";
/*echo "<pre>";
print_r($institucionesOficiales);
echo "</pre>";*/
for ($i = 0; $i < count($institucionesOficiales); $i++){
    echo ($i+1).",".$institucionesOficiales[$i]->nombre."( ".$institucionesOficiales[$i]->municipio." ),".$institucionesOficiales[$i]->puntaje."<br/>";
}

echo "<br /><br /> --------------------- <strong>INSTITUCIONES OFICIAL</strong> --------------------- <br />";
for ($i = 0; $i < count($institucionesPublicas); $i++){
    echo ($i+1).",".$institucionesPublicas[$i]->nombre."( ".$institucionesOficiales[$i]->municipio." ),".$institucionesPublicas[$i]->puntaje."<br/>";
}
/*echo "<pre>";
print_r($institucionesPublicas);
echo "</pre>";*/
