<?php
// echo hello world, mostrar en pantalla del navegador un mensaje
echo "Hello World - AHORA SI QUE SI! \n" . "<br>";


// phpinfo();
// echo "hello world";
// echo xdebug_info();

$a = 5;
$b = 10;
$c = $a + $b;
echo $c;

// @a = 2;
// @b = 3;
echo $a + $b;
if ($a > $b) {
  echo "a es mayor que b \n";
} else {
  echo "a NO es mayor que b";
}
for ($i = 0; $i < 10; $i++) {
  echo $i;
}

?>

<!-- // $_SESSION['nombre'] = "Juan";
// $_SESSION['apellido'] = "Perez";

// $_SESSION['Datos']["nombre"] = "Pepe";
// $_SESSION['Datos']["apellido"] = "Gomez";


// // ASignar con una sola linea los valores de datos
// $_SESSION['Datos'] = array("nombre" => "Pepe", "apellido" => "Gomez");
// //otra forma
// $_SESSION['Datos'] = ["nombre" => "Pepe", "apellido" => "Gomez"]; -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>hola mundo</h1>
  <p> eñ resultado de i es: <?php echo $i ?> </p>
  <?php echo "el resultado de i es: $i" ?> <!-- esto es un comentario -->
  </p>
</body>

</html>