<?php
date_default_timezone_set('America/Recife');

//$db = new SQLite3('/usr/share/pythonProjects/cadeado.db');
$db 			= new SQLite3('painel_meta.s3db');
$results 		= $db->query("SELECT * FROM tab1;");
$resultadoconsultaRows 	= $results->fetchArray(1);

//ASSOCIANDO VARIAVEIS VINDA DA CONSULTA

    $linha              = $resultadoconsultaRows['linha'];			
    $linhaDesc          = $resultadoconsultaRows['descricao_linha'];			
    $contador           = $resultadoconsultaRows['contador'];			
    $meta_total         = $resultadoconsultaRows['meta'];			
    $tempo_ciclo        = $resultadoconsultaRows['tempo_ciclo'];			
    $hora_inicio		= $resultadoconsultaRows['hora_inicio'];
    $hora_inicio        = ($hora_inicio * 60);
    $minuto_inicio		= $resultadoconsultaRows['minuto_inicio'];		
    $hora_termino		= $resultadoconsultaRows['hora_termino'];		
    $hora_termino		= ($hora_termino *60);		
    $minuto_termino		= $resultadoconsultaRows['minuto_termino'];		

//DEFININDO VARIAVEIS PARA CALCULO DE META	   

    $data           	= date('H:i');
    $hora_atual     	= date('H');
    $minuto_atual     	= date('i');
    $hora_atual     	= ($hora_atual * 60);
    $hora_dif       	= ( ($hora_termino + $minuto_termino) - ($hora_inicio + $minuto_inicio));
    $hora_dif2      	= ( ($hora_termino + $minuto_termino) - ($hora_atual + $minuto_atual) );
    $hora_dif3      	= ( ($hora_atual + $minuto_atual) - ($hora_inicio + $minuto_inicio) );
    $meta_hora      	= ($meta_total/$hora_dif)*$hora_dif3;
    $realizado 	    	= ($contador/$meta_hora)*100;	
    $no_homens      	= ceil((($meta_total - $contador) * $tempo_ciclo) / ($hora_dif2 * 60));
    $no_homens      	= $no_homens < 3 ? $no_homens = 3 : $no_homens;
   
    //echo $data.'---'.($hora_dif2 * 60); die();
//FLAG PARA DEFINIR A COR EM RELAÇÃO AO REALIZADO    

    if($realizado<75){
       $cor ='#f9243f';
    }
    elseif($realizado>=75 &&  $realizado<100){
       $cor ='#ffb53e';
    }
    elseif($realizado>=100){
        $cor ='#13A335';
    }	

//FORMATANDO O REALIZADO DEPOIS E ASSOCIANDO AO VETOR O RESTANTE DOS DADOS NECESSÁRIOS

    $realizado      					= number_format($realizado, 2, ',','.');
    $resultadoconsultaRows["dataAtual"] = $data;
    $resultadoconsultaRows["no_homens"] = $no_homens;
    $resultadoconsultaRows["realizado"] = '<h1 style="color:'.$cor.'">'.$realizado.'%</h1>';

    if( $contador != 0 && ($hora_atual + $minuto_atual == ($hora_inicio+$minuto_inicio -15)) ){
        $db->exec("UPDATE tab1 SET contador = 0;");
	$resultadoconsultaRows["webservice"] = "";
    }    
    
echo json_encode($resultadoconsultaRows);
?>