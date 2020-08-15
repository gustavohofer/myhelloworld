<?php

// En el index pondremos la distintas salidas de las vistas al usuario y las distintas acciones que el usuario puede enviar al controlador

//Al requerir desde el index los controladores y modelo habilito a que cualquier vista pueda acceder a los metodos de cada clase 

 require_once "controllers/controller.php"; //Creo un instancia de a partir del requerimiento por unica vez del controlador
 require_once "models/modelo.php";

 require_once "controllers/formularios_controlador.php";

 require_once "models/formularios_modelo.php";

 #require_once "models/conexion.php"; //para probar  la conexion a la base de datos la conexion a la base de datos NO VA EN EL INDEX POR SEGURIDAD!!
 #$conect = Conexion::conectar();
 #echo '<pre>';print_r($conect);echo '</pre>'; // puedo usar tbn var_dump($conect) 


 $mvc = new mvcControLler(); 
 $mvc -> plantilla();
// las variables GET -> URL ---- se ejecutan con el signo de pregunta "?" ?action=..." no $ ... estas variables deben pasar por el controlador en este caso el nombre es action


//dejar abierto el PHP evita que un hacker pueda intruducir codigo JS al final del archivo y asi danar la aplicacion