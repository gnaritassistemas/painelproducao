<?php
date_default_timezone_set('America/Recife');
$client = new SoapClient('http://www4.totvsservicos.com.br:7099/wsexecbo/WebServiceExecBO?wsdl');
$function = 'userLogin';
$arguments= array('userLogin' => array(
                    'arg0'      => 'nunes@gnaritas.com.br'
            ));
$options = array('location' => 'http://www4.totvsservicos.com.br:7099/wsexecbo/WebServiceExecBO');
$token = $client->__soapCall($function, $arguments, $options)->return;

$client = new SoapClient('http://www4.totvsservicos.com.br:7099/wsexecbo/WebServiceExecBO?wsdl');
$function = 'callProcedureWithToken';
$arguments= array('callProcedureWithToken' => array(
                    'arg0'      => trim($token),
                    'arg1'      => 'esp/escp0000.p',
                    'arg2'      => 'pi-param-cad',
                    'arg3'      => '[{"dataType":"integer","name":"linha","value":"1","type":"input"},
                  {"dataType":"character","name":"desc-linha","value":"","type":"output"},
                  {"dataType":"integer","name":"tempo-ciclo","value":"","type":"output"},
                  {"dataType":"integer","name":"hh-ini-prod","value":"","type":"output"},
                  {"dataType":"integer","name":"mm-ini-prod","value":"","type":"output"},
                  {"dataType":"integer","name":"hh-fim-prod","value":"","type":"output"},
                  {"dataType":"integer","name":"mm-fim-prod","value":"","type":"output"},
                  {"dataType":"integer","name":"meta-diaria","value":"","type":"output"}]'
    
            ));

$options      = array('location' => 'http://www4.totvsservicos.com.br:7099/wsexecbo/WebServiceExecBO');
$result       = $client->__soapCall($function, $arguments, $options)->return;
$result       = json_decode($result, true);
$size         = sizeof($result);
$array        = array('descricao_linha = ','tempo_ciclo = ','hora_inicio = ','minuto_inicio = ','hora_termino = ','minuto_termino = ','meta = ');
$stringUpdate = '';
$stringUpdate2 = '';
for($i=0;$i<$size;$i++){
    $stringUpdate .= $result[$i]['value'].',';
}
$stringUpdate = substr($stringUpdate, 0,-1);
$stringUpdate = explode(',',$stringUpdate);

for($i=0; $i<sizeof($stringUpdate); $i++){
    $stringUpdate2 .=  $array[$i]."'$stringUpdate[$i]'".', ';
}
$stringUpdate2 = substr($stringUpdate2, 0,-2);
$stringUpdate2 = 'UPDATE tab1 SET '.$stringUpdate2;
var_dump ($stringUpdate2);
//die();
$db = new SQLite3('painel_meta.s3db');
//$db = new SQLite3('/usr/share/pythonProjects/cadeado.db');
$results = $db->query($stringUpdate2);
?>
