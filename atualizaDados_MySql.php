<?php
include './conexao.php';
$sql = 'SELECT * FROM tab1';
$sqlExec    = mysqli_query($conexao,$sql);
    
    $resultadoconsultaRows = mysqli_fetch_assoc($sqlExec);

    $linha              =       $resultadoconsultaRows['linha'];			
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
//'<div class="easypiechart chart-'.$cor.'" id="easypiechart-'.$cor.'" data-percent="'.$realizado.'" style="height: 111px;" >
//    <span class="percent">'.$realizado.'%</span>
//</div>';
 if($contador<8000){
     $contador = $contador+1;
    //flag para teste incrementando o contador da produção
        $sqlUpdate        = 'update tab1 set contador ='.$contador;
        $sqlUpdateExec    = mysqli_query($conexao,$sqlUpdate);
    }


echo json_encode($resultadoconsultaRows);