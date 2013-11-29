<?php
include("../application.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
    <head>
        <title>Estad&iacute;sticas Pautas</title>
    </head>

    <body>
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>

        <div id="container1" class="pie" style="min-width: 310px; height: 400px; margin: 0 auto"></div> 
        <div id="container2" class="pie" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <div id="container3" class="pie" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        <?php
        $pautas = $db->sql_query("
	SELECT ies.nombre as institucion, ies.municipio as municipio, iesp.ies_vigilada as vigilada, iesp.codigo_snies_existe as existe, estado_programa as estado, comentarios
        FROM ies_pauta iesp
        LEFT JOIN ies ON ies.id = iesp.codigo_ies
");

        $numNoticia = 1;
        $vigilada = array(0, 0, 0, 0);
        $existe = array(0, 0, 0, 0);
        $estado = array(0, 0, 0, 0);
        echo "Nombre Institucion - Municipio*Senala expresamente que es una IES sujeta a vigilancia del MEN*Codigo del programa se encuentra en SNIES*Estado del programa en SNIES*Comentarios <br />";

        while ($pauta = $db->sql_fetchrow($pautas)) {
            echo $numNoticia . "." . $pauta['institucion'] . "-" . $pauta['municipio'];

            if ($pauta['vigilada'] == 1) {
                echo "*Si";
            } else if ($pauta['vigilada'] == 2) {
                echo "*No";
            }
            $vigilada[$pauta['vigilada']] ++;

            if ($pauta['existe'] == 1) {
                echo "*Si";
            } else if ($pauta['existe'] == 2) {
                echo "*No";
            }
            $existe[$pauta['existe']] ++;

            if ($pauta['estado'] == 1) {
                echo "*Activo";
            } else if ($pauta['estado'] == 2) {
                echo "*Inactivo";
            } else if ($pauta['estado'] == 3) {
                echo "*No Aplica";
            }
            $estado[$pauta['estado']] ++;


            echo "*" . $pauta['comentarios'] . "<br />";
            $numNoticia++;
        }

$vigiladaSi = $vigilada[1];
$vigiladaNo = $vigilada[2];
$existeSi = $existe[1];
$existeNo = $existe[2];
$estadoActivo = $estado[1];
$estadoInactivo = $estado[2];
$estadoNoAplica = $estado[3];

        echo "<br /><br />";
        echo "Numero de Pautas Evaluadas: " . ( --$numNoticia) . "<br />";
        echo "<br/>Vigiladas: <br/>";
        echo "Si: " . $vigiladaSi . " (" . number_format((($vigiladaSi) * (100) / $numNoticia), 2) . "%)<br />";
        echo "No: " . $vigiladaNo . " (" . number_format((($vigiladaNo) * (100) / $numNoticia), 2) . "%)<br />";
        echo "<br/>Existe: <br/>";
        echo "Si: " . $existeSi . " (" . number_format((($existeSi) * (100) / $numNoticia), 2) . "%)<br />";
        echo "No: " . $existeNo . " (" . number_format((($existeNo) * (100) / $numNoticia), 2) . "%)<br />";
        echo "<br/>Estado: <br/>";
        echo "Activo: " . $estadoActivo . " (" . number_format((($estadoActivo) * (100) / $numNoticia), 2) . "%)<br />";
        echo "Inactivo: " . $estadoInactivo . " (" . number_format((($estadoInactivo) * (100) / $numNoticia), 2) . "%)<br />";
        echo "No Aplica: " . $estadoNoAplica . " (" . number_format((($estadoNoAplica) * (100) / $numNoticia), 2) . "%)<br />";
        ?>
    </body>
    <script>
        $(function() {
            $('#container1').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Senala expresamente que es una IES sujeta a vigilancia del MEN'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                        type: 'pie',
                        name: 'Browser share',
                        data: [
                            ['Si', <?php echo $vigiladaSi?>],
                            ['No', <?php echo $vigiladaNo?>]
                        ]
                    }]
            });
            $('#container2').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Codigo del programa se encuentra en SNIES'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                        type: 'pie',
                        name: 'Browser share',
                        data: [
                            ['Si', <?php echo $existeSi?>],
                            ['No', <?php echo $existeNo?>]
                        ]
                    }]
            });
            $('#container3').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Estado del programa en SNIES'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                        type: 'pie',
                        name: 'Browser share',
                        data: [
                            ['Activo', <?php echo $estadoActivo?>],
                            ['No', <?php echo $estadoInactivo?>],
                            ['No Aplica', <?php echo $estadoNoAplica?>]
                        ]
                    }]
            });
        });
    </script>
</html>
