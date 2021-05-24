# VueJS + PHP + MySQL

1.- Importar Base de datos en:
```
db/test_form.sql
```
2.- Configurar datos de conexion a base de datos en:
```
php/dbconnection.php
```
## How it works
El funcionamiento es un formulario que se consulta en la tabla users de MySQL

Se hace la consulta mediante axios por peticion post a php para mostrar el unico registro en el formulario

Por ultimo, se pueden modificar los datos, y actualizarlos
Al actualizarse, se presenta un sweetalert2 notificando.!