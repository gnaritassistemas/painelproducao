<?php
$client = new SoapClient('http://www4.totvsservicos.com.br:7099/wsexecbo/WebServiceExecBO?wsdl');
$function = 'callProcedureWithToken';
$arguments= array('callProcedureWithToken' => array(
                    'arg0'      => '893B6BC010C9BEDCAA89096B2DC14209',
                    'arg1'      => 'esp/escp0000.p',
                    'arg2'      => 'pi-param-cad',
                    'arg3'      => ' [{"dataType":"integer","name":"linha","value":"1","type":"input"},
                  {"dataType":"character","name":"desc-linha","value":"","type":"output"},
                  {"dataType":"integer","name":"tempo-ciclo","value":"","type":"output"},
                  {"dataType":"integer","name":"hh-ini-prod","value":"","type":"output"},
                  {"dataType":"integer","name":"mm-ini-prod","value":"","type":"output"},
                  {"dataType":"integer","name":"hh-fim-prod","value":"","type":"output"},
                  {"dataType":"integer","name":"mm-fim-prod","value":"","type":"output"},
                  {"dataType":"integer","name":"meta-diaria","value":"","type":"output"}]'
    
            ));
//$options = array('location' => 'http://18.231.69.186:8080/wsexecbo/WebServiceExecBO');
$options = array('location' => 'http://www4.totvsservicos.com.br:7099/wsexecbo/WebServiceExecBO');
$result = $client->__soapCall($function, $arguments, $options)->return;
//$result = stripslashes(json_encode($result));
//$result = str_replace( '[', '', $result);
//$result = str_replace( ']', '', $result);
//$result = str_replace( ']', '', $result);
//echo json_encode($result);
//echo json_decode($result);
echo $result;
?>
