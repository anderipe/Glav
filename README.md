//Servicio se realice en un boton que hay agregar matricula
//servicio observacion no sea obligatorio(Se deja "sin observacion" se deja por defecto)(ok)
//imprimir informe empleado, adicional ver fechas de reportes visualizar(ok)
//fecha inicial digitada para el excel
//excel aparecer valor de lavadero y valor del empleado(ok)




//En la tabla servicio no aparece el search (ok)
//NO genera factura de nuevos servicios(ok)
//Mensaje de confirmacion para las acciones(ok)(automotor)
//dejar por defecto un tipo de rubro y un tipo de automotor llamado estadar(ok)(tipoRubro)
//cambiar la informacion del boton de buscar servicio , debe aparecer la placa(ok)
//verificar el informe por fechas(ok)
//Plantilla (ok)

Documentacion Tecnica

http://drum-barcode.codio.io:3000/docs/index.html


Documentacion Base de datos

https://drum-barcode.codio.io/GlavDb.html



// La opcion servicio gratis no aparece en los registros de servicio
// Cuando se muestra el informe de empleados no carga la plantilla completa
//Los ultimos empleados, clientes servicios no aparecen con una factura y tampoco dentro de los informes de pagos de los empleados y no se ve actualizado en las graficas ninguno de los movimientos


//debe desaparecer el servicio al momento de facturarse
//al momento de crear ekl usuario automaticamente se loguea con este
//Al crear cargo que menus quedan creados para el cargo(eso no tiene nada que ver con los cargos)(se crean los usuarios master que soliciten y los demas son operarios)
//manual tecnico(A)(se deja comentariado el codigo al final para no realizar este)

// las graficas deben ser semanales de los operarios (ok)
// la barra de servicios va serdiaria(ok)
// el excel va tener todos los datos del servicio(ok)
// consultar factura(ok)
//Ya se dejo el eliminar en automotor que actualiza el estado(ok todos)

//Generar dos veces la misma factura en una hoja(osea quiere que salga horizontal ? para ahorrar papel)(ok toca oficio)
//Agregar la placa del vehiculo al informe de excel(ok)
//Estado de registro de servicio por defecto finalizado(ok)
//No aparece el boton prestamo(ok)
//No toma la tabla para la opcion show en facturay no carga el icono para el boton pdf(ok)
//Incluir en la factura el nombre de la persona que lo atendio(ok)
// En el informe no tiene claridad en lo que presenta es necesario mostrar el acumulado de lo que lleva el negocio acumulado( osea el total de ganancias del local?)(ok total facturas diarias)




SELECT estado_servicio , COUNT( estado_servicio) AS servicios FROM Servicio s group by estado_servicio ;


//EL pago se debe realizar global , no se puede independiente para cada empleado.Porque no sabria los prestamos a que servicio estan asociados

//confirmar los permisos para aplicar la seguridad (A)
//definir los datos dle informe de excel

Explicar a chiqui(M)
usuario user ++++++++++++
arreglar los permisos del menu

Realizar los manuelas (A)


Cambiar los nombres de los label(M)(actualizar y eliminar)(ok cliente)(se cambian directamente en el controlador)

El boton borrar no funciona tipo de servicio( el aplicativo maneja entidad relacion , debido a esto no puede eliminaramnejar estado por un campo independiente)

consolidar de lunes a domingo el saldo disponible (M)(Pruebas)


restablecer contraseña (crear correo de gmail para el envio de correos)(A)(problema con gmail por la ubicacion de codio )

Cuanto tipo de usuario sea jefe de patio no aparecer tipo de automotor


Crear un boton que deje el pago al dia  al empleado con el lavadero(M)(opcional)(pruebas)

factura cliente habilitar(consultar factura)

// error si no selecciona el estado del servicio





Eliminar Observacion
*******************************
Prestamo
***********************
Ordenar campos Eliminar el hash(A)


Listos

las fechas de nacimiento no cuenta con los años anteriores suficientes (permitir annos viejos)(M)(Ok)

diseño de la ventana de Show o resumen mejorar(Aplicar css)(M)(ok show cliente)

Que el Empleado de Patio puede visualziar le informe de empleados por fecha (ok)

Restriccion de prestamo(M)(ok)

crear boton de index(M)(ok)

Registro de Servicio Crear Id Cliente tiene campo buscar pero no los otros(M)(ok)
No muestra todos los campos para editar factura (la idea es que no deje editar nada )(se arreglaron los que si dejaba , esto se hace porq q cualquier los podria modificar y no cuadraria los valores con los del sistema)(ok)
Lista prestamo no aparece columna nombre operario(M)(ok)
permite realizar prestamos sin saldo disponible(M)(Ok)

Revisar las operaciones de prestamo(M)(ok)

Campo con estado para el prestamo (ok)

Agregar valor del rubro al servicio(M)(ok)

al crear un nuevo prestamo me muestra de nuevo el ultimo valor(M)(ok) (la condificiones son que el servicio debe estar pendiente y finalizado , en  el prestamo estado debe ser 1)



Descripcion aumentar la cantidad de caracteres
**************************
Considerar la necesidad de los menus tipo de automotor automotor rubro tipo de rubro

********************
FACTURA


Consulta de prestamo para el nuevo valor permitido

SELECT (SUM(r.valor)* 0.4) - sum(p.valor) FROM Servicio s 
inner join Rubro r on r.id=s.id_rubro 
inner join Prestamo p on p.id=s.id_empleado
WHERE  s.pago = "Pendiente" and s.id_empleado = 2 and p.estado = 1 



Consulta semanal


SELECT fecha_servicio FROM Servicio WHERE fecha_servicio >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND fecha_servicio < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY

SELECT concat(e.nombre,' ',e.apellido) as empleado ,s.fecha_servicio,s.pago,r.valor
FROM Servicio s
inner join Empleado e on e.id = s.id_empleado
inner join Rubro r on r.id = s.id_rubro
WHERE s.fecha_servicio >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND s.fecha_servicio < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY 
and s.estado_servicio = "Finalizado"


Plantilla 

select s.*,a.matricula from Servicio s inner join Automotor a on a.id= s.id_automotor where s.estado_servicio = "Finalizado" and fecha_servicio between '2011-03-17' and '2016-03-17'


http://themifycloud.com/downloads/janux-free-responsive-admin-dashboard-template/

Cuando llame el servicio en el select hay que visualizar con el placa del vehiculo(preguntar)
Generar boton pdf en  la lista de factura(ok)
EL buscar se realizara por cliente en factura(ok)
El buscar se realiza por estado en Servicio(ok)
quitar el servicio en prestamo para que aparezca el total de recaudo ue ha realizado ese dia (tiene que estar finalizado)(ok)
al actualizar a finalizar el servidor si lo dejaen blancco tome la hora del sistema(ok)
crear informe de total a pagar del empleado con su respectivo esta por fecha pdf finalizados  , total * 40% menos prestamo pdf()

Se debe realizar consultas de pagos a los empleados semanales (obligatorio) y historico
Validar que se le entregue el dinero al empleado(ok) se creo un campo en el servicio


Opcional 


Botones con iconos en las tablas
Grafica de los servicios finalizados

Realizar copia de los archivos

Inicializar el servidor 
php app/console server:run localhost:3000  


//Realiza la copia de los archivos del sevidor
git clone https://github.com/anderipe/glav.git 


// Realiza la descarga de la base de datos de git
git fetch

// desca los archivos q cambiaron
git pull


// estado de git
git status

Crear base datos

php app/console doctrine:database:create

Cambiar el Idioma(no me funciono)

php app/console translation:update  es GlavBundle --force 


Crear base de datos con las entitys
 
 php app/console doctrine:schema:update --force 
 
 
 // Muestra que cambios se vna hacer en la base datos
 php app/console doctrine:schema:update --dump-sql
 
 Si saba se de datos ya existe 
  y la queremos importar 
  
php app/console doctrine:mapping:convert xml ./src/Acme/DemoBundle/Resources/config/doctrine/metadata/orm --from-database --force
php app/console doctrine:mapping:import AcmeDemoBundle annotation
php app/console doctrine:generate:entities AcmeDemoBundle

Para eliminar la cache utilizamos :

php app/console cache:clear

php app/console cache:clear --env=prod


Generar getter and setter 

php app/console doctrine:generate:entities GlavBundle/Entity/Prestamo


Generar el crud con la consola 

php app/console generate:doctrine:crud --entity=GlavBundle:Factura

sobre escribr crud

php app/console generate:doctrine:crud --overwrite --entity=GlavBundle:TipoRubro 

-----Tareas---------

Que no se vea el hash

Los campos de estado deben desaparecer

Dejar fijo del Iva


Mejorar los label

Estados del servicio

Iniciado , finalizado , anulado , en espera

1.16
cuando realiza la factura el estado vacambiar ha estado facturado
que el servicio siempre entre ha estado pendiente
autocompletar para los listados de clientes

Agregar register al role administrador
ventana de deslogado aplicar plantilla(ok)
Configurar el boton de home
Eliminar la columna hash de la lista
el tamaño de las tablas esta desproporcionado y no se puede mover la ventana para mirar todas las columnas
Agregar label al campo hora
Los campos de fecha no genera fecha actual

preguntar cuando se realizaria el despuesto d elo que se le presta al operario

# Symfony (2.6.4)


## Using the Pack

To use the Pack, we created 2 menu options, which you can find on the right of the menu. These menus can be configured in the `.codio` file.


1. **Configure Project** : Select this when you first access the project to configures the Symfony Site Timezones for your Project.
1. **Symfony Config**: This previews your app. Note the Preview menu allows you to select 'Inside Codio' or 'New Browser Tab'. 

## Configure Symfony
To configure your Symfony Site Timezones

1. Go to the Run menu.
1. Select `Configure Project`.

If you prefer to run the configuration script yourself, open the terminal (Tools>Terminal) and enter

    bash symfonyconfig.sh
    
## Accessing the application

To access your Symfony application

1. Go to the Preview menu.
1. Select `Symfony Config`.


We set this up using https so it can be previewed inside a Codio Tab.

## How the Pack was prepared
This Starter Pack was built on the `LAMP+Composer` Codio Certified Stack.

## Useful Links

- [Symfony Site](http://symfony.com)
- [Symfony Docs](http://symfony.com/doc/current/index.html)


