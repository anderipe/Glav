<?php

namespace GlavBundle\Controller;
use GlavBundle\Entity\Servicio;
use GlavBundle\Entity\Cliente;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GlavBundle:Default:index.html.twig', array('name' => $name));
    }
    public function homeAction()
    {
        
        $em = $this->getDoctrine()->getManager();
        $sqlServicio ="SELECT  SUBSTR(estado_servicio, 1, 3) as nombre , COUNT( estado_servicio) as servicios FROM Servicio s WHERE DATE(s.fecha_servicio) = CURDATE() group by estado_servicio   ";
        $con = $this->getDoctrine()->getManager()->getConnection()->prepare($sqlServicio);
        $con->execute();
        $entities = $con->fetchAll(); 
        
        
        $Clientedql = "SELECT COUNT(c.id) FROM GlavBundle\Entity\Cliente c 
        ";
        $cliente = $em->createQuery($Clientedql)->getSingleScalarResult();
        
        $Rubrodql = "SELECT COUNT(r.id) FROM GlavBundle\Entity\Rubro r 
        ";
        $rubro = $em->createQuery($Rubrodql)->getSingleScalarResult();
        
        $Automotordql = "SELECT COUNT(a.id) FROM GlavBundle\Entity\Automotor a 
        ";
        $automotor = $em->createQuery($Automotordql)->getSingleScalarResult();
        
                
        $Facturadql = "SELECT COUNT(f.id) FROM GlavBundle\Entity\Factura f 
        ";
        $factura = $em->createQuery($Facturadql)->getSingleScalarResult();
        
        
        $sqlEmpleado="select count(s.id) as total,concat(e.nombre,' ',e.apellido)as nombre 
        from Empleado e inner join Servicio s on s.id_empleado = e.id 
        where s.fecha_servicio between date_sub(now(),INTERVAL 1 WEEK) and now()
        group by e.id  order by total desc  limit 6";
        $con = $this->getDoctrine()->getManager()->getConnection()->prepare($sqlEmpleado);
        $con->execute();
        $empleado = $con->fetchAll(); 
        
        $sqlFacturaTotal = "select (r.valor*0.6) as total from Servicio s
inner join Rubro r on r.id = s.id_rubro
where s.fecha_servicio >= CURDATE()";
         $con = $this->getDoctrine()->getManager()->getConnection()->prepare($sqlFacturaTotal);
        $con->execute();
        $total = $con->fetchAll(); 
        
        //print_r($total);exit();
        
        
        
        return $this->render('GlavBundle:Default:index.html.twig', array(
            'entities' => $entities,'cliente' => $cliente,'empleado'=>$empleado,'rubro'=>$rubro,'factura'=>$factura,'automotor'=>$automotor,'total'=>$total));
    }
}
