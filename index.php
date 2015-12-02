<html>
<head>
	<title>CEMON</title>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="jquery\jquery-2.1.4.js"></script>
    <script src="jquery\jquery-2.1.4.min.js  "></script>  
    <script type="text/javascript">
        function probarcomponente(componente) {
            var fecha = $("#month").val();
            $.ajax({
                type: 'GET',
                url: 'http://localhost/ws/cliente.php',
                data: {fecha: fecha, componente: componente, servicio: componente},
                success: function(data) {
                    json_data = JSON.parse(data)
                    $("#"+componente).html(json_data.frase);
                    var current_value = $("#current_value").val() * json_data.probabilidad/100;
                    $("#current_value").val(current_value);
                    $("#Final").html($("#current_value").val()*100);
                }
            });
            return false;
        }
    </script>
</head>
<body>
	 <form name="Demo" action="" method="post">
            <div>
                Periodo a chequear: <input id="month" type="month" name="month"><br><br>
                <a href="#" id="enlacehardware" onclick="probarcomponente('Hardware');">Probar Hardware</a><div id="Hardware"></div><br>
                <a href="#" id="enlacebasededatos" onclick="probarcomponente('DataBase');">Probar Base de Datos</a><div id="DataBase"></div><br>
                <a href="#" id="enlaceaplicacion" onclick="probarcomponente('Aplicacion');">Probar Aplicacion</a><div id="Aplicacion"></div><br>
                <a href="#" id="enlaceconexion" onclick="probarcomponente('Conexion');">Probar Conexion</a><div id="Conexion"></div><br>
                <a href="#" id="enlacerouter" onclick="probarcomponente('Router');">Probar Router</a><div id="Router"></div><br>
                <input id="current_value" type="hidden" value="1"><div>Porcentaje de Disponibilidad del Sistema</div>
                <div id="Final"></div><br>
            </div>
        </form>
</body>
</html>