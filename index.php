<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Track Material Design Bootstrap Admin Template</title>
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <!--<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />-->
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!--levar linha de cima para o projeto-->
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
    <style>
    div.sticky{
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        padding: 5px;
        z-index: 3;
    }
    .fixo{
        top: 0;
        right: 0;
        left: 0;
        bottom: 0px;
        z-index: 999;
        /* padding: 30px; */
        position: sticky;
        background-color: rgba(39,60,95,0.9);
    }
    
    .painel{transition:box-shadow .25s;padding:78px;margin:0.5rem 0 1rem 0;}
    .cor1{
        background-color: #0F2040;
        border-radius: 10px;
    }
    .cor2{
        background-color: #182E52;
        color: #fff;
    }
    .padding{
        padding-top: 6px;
        padding-bottom: 25px;
    }
    .padding2{
        padding-top: 3%;
        padding-left: 10%;
    }
    .divinterna{
        padding-top:14px; 
        height: 170px;
    }
    </style>
</head>

<!--<body style="background-color: #0F2040; color: #fff" onload="setTimeout('location.reload()', <?=$tempo_ciclo?>000);">-->
<body class="cor2">
    
<div class="container-fluid padding2">
     
<?php     
  
?>

            <!-- /. ROW  --> 
            <div class="row">
                <div class="cor1 padding text-center col-md-5">
                    <h5>  Nº de Pessoas </h5> 
                    <hr/>
                    <div class="divinterna">
                        <h1 id="no_homens"> </h1> 
                    </div>
                    
                </div>

                <div class="cor2 padding text-center col-md-2"> </div>

                <div class="cor1 padding text-center col-md-5">
                    <h5>  Hora Atual </h5> 
                    <hr/>
                    <div class="divinterna">
                    <h1 id="dataAtual">  </h1> 
                    </div>
                    
                </div>

                <div class="col-md-12" style="line-height: 12px;">
                    &nbsp;
                </div>

                <div class="cor1 padding text-center col-md-5">
                    <h5>  Produzido </h5> 
                    <hr/>
                    <div class="divinterna">
                    <h1 id="contador">   </h1> 
                    </div>
                    
                </div>

                <div class="cor2 padding text-center col-md-2"> </div>

                <div class="cor1 padding text-center col-md-5">
                    <h5>  Realizado </h5> 
                    <hr/>
                    <div class="divinterna">
                    <h1 id="realizado">   </h1> 
                    </div>
                    
                    
                </div>

                <div class="col-md-12" style="line-height: 12px;">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="cor1 padding text-center col-md-10">
                    <h5 class="text-center">  Meta Diária </h5> 
                    <hr/>
                    <div class="divinterna">
                    <h1 class="text-center" id="meta">  </h1> 
                    </div>
                    
                    
                </div>
            </div>
   		
				
    </div>
    <!-- JS Scripts-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/materialize/js/materialize.min.js"></script>
    <script src="assets/js/easypiechart.js"></script>
    <script src="assets/js/easypiechart-data.js"></script>
    <script>
    $(function() {
         ajaxAtualizaDados();         
    });   
    function ajaxAtualizaDados(){
        console.log('atualizaDados');
        setTimeout('ajaxAtualizaDados()', 100); 
    

    $.ajax({
        type: 'POST',
        url: "atualizaDados.php",
        cache: false,
        dataType: 'json',
        data: "teste",
        success: function(data)
        {
            for(var i in data) {
                $("#"+i).html(data[i]);
            }
        },
        error: function()
        {
           console.log("Ocorreu um erro inesperado no sistema!!! ");
        }//FIM DO error: function()
    });// FIM DA FUNÇÃO $.ajax
    }
    </script>
    
</body>

</html>