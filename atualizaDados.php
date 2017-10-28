<?php
date_default_timezone_set('America/Recife');
$db = new SQLite3('/usr/share/pythonProjects/cadeado.db');
//$db = new SQLite3('painel_meta.s3db');
$results = $db->query('SELECT * FROM tab1;');
$resultadoconsultaRows = $results->fetchArray(1);

    $linha              =       $resultadoconsultaRows['linha'];			
    $linhaDesc          =       $resultadoconsultaRows['descricao_linha'];			
    $contador           =	$resultadoconsultaRows['contador'];			
    $meta_total         =	$resultadoconsultaRows['meta'];			
    $tempo_ciclo        =	$resultadoconsultaRows['tempo_ciclo'];			
    $hora_inicio	=	$resultadoconsultaRows['hora_inicio'];		
    $minuto_inicio	=	$resultadoconsultaRows['minuto_inicio'];		
    $hora_termino	=	$resultadoconsultaRows['hora_termino'];		
    $minuto_termino	=	$resultadoconsultaRows['minuto_termino'];		
   
    $data           = date('H:i');
    $hora_atual     = date('H');
    $hora_dif       = ($hora_termino - $hora_inicio);
    $hora_dif2      = ($hora_atual - $hora_inicio);
    $meta_hora      = ($meta_total/$hora_dif);
    
    $realizado      = ($contador/$meta_total)*100;
    $realizado      = number_format($realizado, 2, ',','.');
    $no_homens      = ceil(($meta_total * $tempo_ciclo) / ( $hora_dif * 3600));
    
    if($realizado<75){
       $cor ='#f9243f';
    }
    elseif($realizado>=75 &&  $realizado<100){
       $cor ='#ffb53e';
    }
    else
        $cor ='#13A335';


$resultadoconsultaRows["dataAtual"] = $data;
$resultadoconsultaRows["no_homens"] = $no_homens;
$resultadoconsultaRows["realizado"] = '<h1 style="color:'.$cor.'">'.$realizado.'%</h1>';
'<div class="easypiechart chart-'.$cor.'" id="easypiechart-'.$cor.'" data-percent="'.$realizado.'" style="height: 111px;" >
    <span class="percent">'.$realizado.'%</span>
</div>';


echo json_encode($resultadoconsultaRows);