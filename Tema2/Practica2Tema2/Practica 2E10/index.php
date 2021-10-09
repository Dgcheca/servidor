<?php
    include "navegador.php";
    ?>

   <!-- Begin Page Content -->
   <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Alumnado</h1>
<p class="mb-4">En este ejercicio tenéis que terminar el ejercicio hecho en clase sobre
un instituto. Debe mostrar información sobre cursos y alumnos. La
información para cada curso es:
• Nombre del curso (1º ESO A, 1º ESO B, 2º Bachillerato A, 1º
DAW, 2º DAW, etc.)
• Etapa educativa (ESO, Bachillerato, Ciclo Medio, Ciclo Superior)
• Año académico (2020, 2021, 2022, 2023, 2024, 2025 … 2030)
La información para cada alumno es:
• Apellidos
• Nombre
• Edad
• DNI
• Email
• Localidad
• Teléfono
• Curso (igual que “Nombre del curso” en Cursos)
• Avatar (una imagen en la carpeta imgs/ con el nombre el dni del
alumno.jpg)
Haremos dos arrays de arrays asociativos para los cursos y para los
alumnos, p. ej. para los cursos sería algo así, con los que quieras añadir:
$cursos = array(
array(“nombre” => “1º DAW”, “etapa” => “Ciclo Superior”, “curso” => 2021),
array(“nombre” => “1º GA”, “etapa” => “Grado Medio”, “curso” => 2021),
array(“nombre” => “1º Laboratorio”, “etapa” => “Grado Medio”, “curso” => 2021)
);
Crearemos una web con un menú lateral donde podamos elegir como
opción “Alumnos” y otra “Cursos”. La primera mostrará todos los alumnos y la
segunda todos los cursos. Ahora no haremos nada más, en próximas prácticas
le añadiremos más funcionalidad a este ejemplo, con lo cual tenéis que
hacerlo bien.

</p>



</div>
<!-- /.container-fluid -->

<?php
    include "pie.php";
    ?>