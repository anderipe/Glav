<?php

namespace GlavBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GlavBundle\Entity\Automotor;
use GlavBundle\Entity\Servicio;
use GlavBundle\Entity\Empleado;
use GlavBundle\Form\InformeEmpleadoType;

/**
 * Automotor controller.
 *
 */
class InformeController extends Controller
{

    /**
     * Lists all Automotor entities.
     *
     */
    public function indexAction()
    {
       
    }
    
    public function empleadoAction()
    {
    $data = array();
    $form = $this->createFormBuilder($data)
            ->add('fecha_inicial', 'date')
            ->add('fecha_final', 'date')
    ->getForm();
        
        return $this->render('GlavBundle:Informe:empleado.html.twig', array(
            'form'   => $form->createView(),
        ));
       
    }
    public function informeEmpleadoAction(Request $datos)
    {
        //print_r($datos);exit();
        $fechaInicial =  $datos->get('fecha_inicial');
        $fechaFinal =   $datos->get('fecha_final');

        //exit(\Doctrine\Common\Util\Debug::dump($datos));
        //$form->bind($datos);
        //$datos->get('fecha_inicial')->getData();exit();
        //$form->handleRequest($datos)
        //$fecha->setfechaInicial($form['fecha_inicial']->getData());
        //$estado = "Finalizado";
        
//         $sql="select concat(e.nombre, ' ',e.apellido ) as empleado,a.matricula ,r.valor,sum(p.valor) as prestamo
//         from Servicio s 
//         inner join Automotor a on a.id= s.id_automotor 
//         inner join Empleado e on e.id = s.id_empleado
//         join Rubro r on r.id= s.id_rubro
//         inner join Prestamo p on p.id_empleado = e.id
//         where s.estado_servicio = 'Finalizado' and s.pago = 'Pendiente' and
//         s.fecha_servicio between '".$fechaInicial."' and '".$fechaFinal."'
//         group by s.id
//         order by e.nombre";
        
        $sql="select concat(e.nombre, ' ',e.apellido ) as empleado,a.matricula ,r.valor,sum(p.valor) as prestamo
        from Servicio s 
        inner join Automotor a on a.id= s.id_automotor 
        inner join Empleado e on e.id = s.id_empleado
        inner join Rubro r on r.id= s.id_rubro
        left join Prestamo p on p.id_empleado = e.id
        where s.estado_servicio = 'Finalizado' and s.pago = 'Pendiente' and
        s.fecha_servicio >= '".$fechaInicial."  00:00:00' and s.fecha_servicio <=  '".$fechaFinal."  23:59:59 and p.estado=1'
        group by s.id
        order by e.nombre";

        $con = $this->getDoctrine()->getManager()->getConnection()->prepare($sql);
        $con->execute();
        $entities = $con->fetchAll(); 
        //$sql;exit();

        //exit(\Doctrine\Common\Util\Debug::dump($entities));
        return $this->render('GlavBundle:Informe:index.html.twig', array(
            'entities'   => $entities,
        ));
    }
    
    public function informeSemanalAction()
    {
        
//         $sql="SELECT concat(e.nombre,' ',e.apellido) as empleado ,s.fecha_servicio as fecha ,s.pago,(r.valor * 0.4) as valor
//                 FROM Servicio s
//                 inner join Empleado e on e.id = s.id_empleado
//                 inner join Rubro r on r.id = s.id_rubro
//                 WHERE s.fecha_servicio >= curdate() - INTERVAL DAYOFWEEK(curdate())+7 DAY AND s.fecha_servicio < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY 
//                 and s.estado_servicio = 'Finalizado'";
        
        $sql="SELECT concat(e.nombre,' ',e.apellido) as empleado ,s.fecha_servicio as fecha ,s.pago,(r.valor * 0.4) as valor,s.pago,s.estado as estado
                FROM Servicio s
                inner join Empleado e on e.id = s.id_empleado
                 inner join Rubro r on r.id = s.id_rubro
where s.fecha_servicio between date_sub(now(),INTERVAL 1 WEEK) and now()
and s.estado_servicio = 'Finalizado'";
            
        $con = $this->getDoctrine()->getManager()->getConnection()->prepare($sql);
        $con->execute();
        $entities = $con->fetchAll(); 
        //echo $sql;exit();

        //exit(\Doctrine\Common\Util\Debug::dump($entities));
        return $this->render('GlavBundle:Informe:semanal.html.twig', array(
            'entities'   => $entities,
        ));    
        
        
    }
    
    public function pagarAction(){
        
        $prestamos = "update Prestamo set estado = 2 where estado= 1";
        $con = $this->getDoctrine()->getManager()->getConnection()->prepare($prestamos);
        $con->execute();
        
        $servicios = "update Servicio s set s.pago='Pagado' where s.fecha_servicio                between date_sub(now(),INTERVAL 1 WEEK) and now()
            and s.estado_servicio = 'Finalizado'  ";
        $con = $this->getDoctrine()->getManager()->getConnection()->prepare($servicios);
        $con->execute();
        
               $sql="SELECT concat(e.nombre,' ',e.apellido) as empleado ,s.fecha_servicio as fecha ,s.pago,(r.valor * 0.4) as valor,s.pago , s.estado as estado
                FROM Servicio s
                inner join Empleado e on e.id = s.id_empleado
                 inner join Rubro r on r.id = s.id_rubro
where s.fecha_servicio between date_sub(now(),INTERVAL 1 WEEK) and now()
and s.estado_servicio = 'Finalizado'";
            
        $con = $this->getDoctrine()->getManager()->getConnection()->prepare($sql);
        $con->execute();
        $entities = $con->fetchAll(); 
        //echo $sql;exit();

        //exit(\Doctrine\Common\Util\Debug::dump($entities));
        return $this->render('GlavBundle:Informe:semanal.html.twig', array(
            'entities'   => $entities,
        ));    
        
        
    }
    
    public function excelAction(){
        
        // ask the service for a Excel5
       $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
       
      //llamado a la base de datos       
       $em = $this->getDoctrine()->getManager();
       //$aspirantes = $this->getDoctrine()->getRepository('GlavBundle:Empleado')->findAll(array(),array('nombre' => 'DESC'));
        
       
       //consulta
       $sql = "select s.id,s.observacion,s.fecha_servicio,s.fecha_entrega,s.estado_servicio,s.pago,concat(e.nombre,' ',e.apellido) empleado,e.identificacion,ca.nombre cargo, concat(c.nombre,' ',c.apellido) cliente,c.identificacion cidentificacion,r.nombre rubro,r.valor,a.matricula from Servicio s inner join Empleado e on e.id=s.id_empleado inner join Cliente c on c.id =s.id_cliente inner join Rubro r on r.id = s.id_rubro inner join Cargo ca on c.id = e.id_cargo inner join Automotor a on a.id=s.id_automotor group by s.id ORDER BY `s`.`id` ASC";
        
       $con = $this->getDoctrine()->getManager()->getConnection()->prepare($sql);
       $con->execute();
       $aspirantes = $con->fetchAll(); 
       //trae el nombre del usuario 
       $user = $this->getUser()->getUsername(); 
       

       $phpExcelObject->getProperties()->setCreator($user)
           //->setLastModifiedBy("Giulio De Donato")
           ->setTitle("Historial de Servicios")
           ->setSubject("Historial de Servicios")
           ->setDescription("Test document for Office 2005 XLSX, generated using PHP classes.")
           ->setKeywords("office 2005 openxml php")
           ->setCategory("Test result file");
       
       $phpExcelObject->setActiveSheetIndex(0)
           ->setCellValue('A1', 'nombre')
           ->setCellValue('B1', 'observacion')
           ->setCellValue('C1', 'fecha_servicio')
           ->setCellValue('D1', 'fecha_entrega')
           ->setCellValue('E1', 'estado_servicio')
           ->setCellValue('F1', 'pago')
           ->setCellValue('G1', 'empleado')
           ->setCellValue('H1', 'identificacion')
           ->setCellValue('I1', 'cargo')
           ->setCellValue('J1', 'cliente')
           ->setCellValue('K1', 'identificacion')
           ->setCellValue('L1', 'rubro')
           ->setCellValue('M1', 'valor')
           ->setCellValue('N1', 'matricula');



       $phpExcelObject->getActiveSheet()->setTitle('Simple');
       
   $i = 2;  
   foreach ($aspirantes as $aspirante) 
   {
        $phpExcelObject->setActiveSheetIndex(0)
           ->setCellValue('A'.$i, $aspirante['id'])
           ->setCellValue('B'.$i, $aspirante['observacion'])
           ->setCellValue('C'.$i, $aspirante['fecha_servicio'])
           ->setCellValue('D'.$i, $aspirante['fecha_entrega'])
           ->setCellValue('E'.$i, $aspirante['estado_servicio'])
           ->setCellValue('F'.$i, $aspirante['pago'])
           ->setCellValue('G'.$i, $aspirante['empleado'])
           ->setCellValue('H'.$i, $aspirante['identificacion'])
           ->setCellValue('I'.$i, $aspirante['cargo'])
           ->setCellValue('J'.$i, $aspirante['cliente'])
           ->setCellValue('K'.$i, $aspirante['cidentificacion'])
           ->setCellValue('L'.$i, $aspirante['rubro'])
           ->setCellValue('M'.$i, $aspirante['valor'])
           ->setCellValue('N'.$i, $aspirante['matricula']);




       $phpExcelObject->getActiveSheet()->setTitle('Simple');
       $i++;
   }  
       // Set active sheet index to the first sheet, so Excel opens this as the first sheet
       $phpExcelObject->setActiveSheetIndex(0);

        // create the writer
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // adding headers
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment;filename=Servicios.xls');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');

        return $response; 
    }
    
    public function clienteAction()
    {

        return $this->render('GlavBundle:Informe:cliente.html.twig');
    
    }
    
    
    public function informeClienteAction(Request $datos)
    {
        
        $identificacion = $datos->get('identificacion');
        $em = $this->getDoctrine()->getManager();
        
        $sql = "select f.id,f.observacion,f.total,fu.username ,concat(e.nombre,' ',e.apellido) as empleado,f.fecha from Factura f 
        inner join fos_user fu on fu.id = f.id_usuario
        inner join FacturaDetalle fd on fd.id_factura = f.id 
        inner join Servicio s on s.id = fd.id_servicio 
        inner join Cliente c on c.id = s.id_cliente 
        inner join Empleado e on e.id=s.id_empleado
        where c.identificacion = '".$identificacion."'";
        //echo $sql;exit();   
        $con = $this->getDoctrine()->getManager()->getConnection()->prepare($sql);
        $con->execute();
        $entities = $con->fetchAll(); 
        //print_r($miData);exit();

        //$entities = $em->getRepository('GlavBundle:Factura')->findAll();                    


        return $this->render('GlavBundle:Informe:factura.html.twig', array(
            'entities' => $entities,
        ));
    
        
        
    }
    
}
