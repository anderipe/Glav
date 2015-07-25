<?php

namespace GlavBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GlavBundle\Entity\Prestamo;
use GlavBundle\Form\PrestamoType;

/**
 * Prestamo controller.
 *
 */
class PrestamoController extends Controller
{

    /**
     * Lists all Prestamo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GlavBundle:Prestamo')->findAll();
        $sql = "select p.* , concat(e.nombre,' ' ,e.apellido) as empleado from Prestamo p      inner join Empleado e on e.id = p.id_empleado where p.estado <> 0";
        $con = $this->getDoctrine()->getManager()->getConnection()->prepare($sql);
        $con->execute();
        //$em = $this->getDoctrine()->getManager()->getRepository('GlavBundle:Prestamo');
        //$entities = $em->findPrestamo();
        $entities = $con->fetchAll(); 
        

        return $this->render('GlavBundle:Prestamo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Prestamo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Prestamo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prestamo_show', array('id' => $entity->getId())));
        }

        return $this->render('GlavBundle:Prestamo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Prestamo entity.
     *
     * @param Prestamo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Prestamo $entity)
    {
        $form = $this->createForm(new PrestamoType(), $entity, array(
            'action' => $this->generateUrl('prestamo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Prestamo entity.
     *
     */
    public function newAction()
    {
        $entity = new Prestamo();
        $form   = $this->createCreateForm($entity);

        return $this->render('GlavBundle:Prestamo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Prestamo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Prestamo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prestamo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:Prestamo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Prestamo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Prestamo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prestamo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:Prestamo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Prestamo entity.
    *
    * @param Prestamo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Prestamo $entity)
    {
        $form = $this->createForm(new PrestamoType(), $entity, array(
            'action' => $this->generateUrl('prestamo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Prestamo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Prestamo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prestamo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('prestamo_edit', array('id' => $id)));
        }

        return $this->render('GlavBundle:Prestamo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Prestamo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GlavBundle:Prestamo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Prestamo entity.');
            }

            //$em->remove($entity);
            $entity->setEstado('0');
            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prestamo'));
    }

    /**
     * Creates a form to delete a Prestamo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('prestamo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
    
    public function valorPrestamoAction(Request $datos)
    {
        $em = $this->getDoctrine()->getManager();
        $idServicio = $datos->get('servicioId');
        $servicio = $em->getRepository('GlavBundle:Servicio')->find($idServicio);
        $valor = $servicio->getIdRubro()->getValor();
        $neto = $valor * 0.84;
        //echo $neto;exit();
        $valor= 'Neto<br><input type="text" id="neto" value="'.$neto.'"><br>Total<br><input type="text" id="total" value="'.$valor.'">';
        echo $valor;exit();
        

        $entities = $em->getRepository('GlavBundle:Factura')->findAll();

        return $this->render('GlavBundle:Factura:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function totalPrestamoAction(Request $datos)
    {
        //echo 'hola';exit();
        $em = $this->getDoctrine()->getManager();
        $idEmpleado = $datos->get('servicioId');
        //$sql =  "SELECT SUM(r.valor) FROM `Servicio` s inner join Rubro r on r.id=s.id_rubro where id_empleado=".$idEmpleado."";
        //echo $sql;exit();
        //$servicio = $em->getRepository('GlavBundle:Servicio')->findOneBy(array('id_empleado' => $idEmpleado,'pago' => 'Pendiente'));
        //echo $servicio->getIdRubro()->getValor();exit();
        
        $dql = "SELECT SUM(r.valor) FROM GlavBundle\Entity\Servicio s 
        inner join GlavBundle\Entity\Rubro r WITH r.id=s.id_rubro 
        " .
       "WHERE s.id_empleado = ?1 and s.pago = ?2 and s.estadoServicio = ?3 ";
        $balance = $em->createQuery($dql)
              ->setParameter(1, $idEmpleado)
              ->setParameter(2, "Pendiente")
              ->setParameter(3, "Finalizado")            
              ->getSingleScalarResult();
        $balance = $balance * 0.4;
        
//         $dqlPrestamo="SELECT SUM(p.valor) FROM GlavBundle\Entity\Prestamo p
//             inner join GlavBundle\Entity\Empleado e WITH e.id=p.id_empleado
//             inner join GlavBundle\Entity\Servicio s WITH s.id_empleado=e.id
//             inner join GlavBundle\Entity\Rubro r WITH r.id=s.id_rubro ".
//             "WHERE p.id_empleado = ?1 and p.estado = ?2  ";
//             
//             
//                
//         $debe = $em->createQuery($dqlPrestamo)
//               ->setParameter(1, $idEmpleado)
//               ->setParameter(2, 1)
//               ->getSingleScalarResult();
        
        
        $sql = "SELECT p.valor as valor FROM Prestamo p
            inner join Empleado e on e.id=p.id_empleado
            inner join Servicio s on s.id_empleado=e.id
            inner join Rubro r on r.id=s.id_rubro 
            WHERE p.id_empleado = ".$idEmpleado." and p.estado = 1
            group by p.id";
        //echo $sql;exit();   
        //$where = "WHERE CONCAT(c.identificacion, ' ',c.nombre, ' ',c.apellido) like '%".$datos->get('cliente')."%'";   
        $con = $this->getDoctrine()->getManager()->getConnection()->prepare($sql);
        $con->execute();
        $entities = $con->fetchAll();
        
        //print_r($entities);exit();
        $debe = 0;
        
        foreach ($entities as $entitie){
            
            $debe+=$entitie['valor'];
            
            //echo $entitie->getValor();   
        }       
        
           //echo $debe;exit(); 
            

        
        //echo $debe->getSql();exit();
        
               //echo $debe.' '.$balance;exit();
        
        $disponible = $balance - $debe ;
         

        //return $balance;
        $valor= '<br><input type="hidden" id="neto" value="'.$disponible.'" readonly >';
     
        echo $valor;exit();

        
        //         $entity = new Prestamo();
        //         $form   = $this->createCreateForm($entity);

        //         return $this->render('GlavBundle:Prestamo:prestamo.html.twig', array(
        //             'entity' => $entity,
        //             'form'   => $form->createView(),
        //             'balance'=> $balance,

        //         ));

        
        //$valor= 'Total disponible<br><input type="text" id="neto" value="'.$balance.'" readonly >';
        //echo $valor;exit();
                
        //exit();
        //        
        
        //         $em = $this->getDoctrine()->getEntityManager();
        //         $con = $this->getDoctrine()->getManager()->getConnection()->prepare($sql);
        //         $con->execute();
        //         echo $suma = $con->getResult();  
        //         exit();
        
        //print_r($servicio);exit();
        //echo $valor = $servicio->getIdRubro()->getValor();exit();
        //$sql ='SELECT r.valor FROM `Servicio` s inner join Rubro r on r.id=s.id_rubro where id_empleado='.$idEmpleado.'';
        //)->setParameter('name', $vendorCategoryName);
        //$con = $this->getDoctrine()->getManager()->getConnection()->prepare($sql);
        //$con->execute();
        //         //echo $result = $con->fetchOne($sql, Doctrine::HYDRATE_ARRAY);exit();
        //         echo $miData = $con->getSingleResult();exit();  
        //         $data = $this->entidadesAction();
        //         //echo $neto;exit();
        //         $valor= 'Neto<br><input type="text" id="neto" value="'.$neto.'"><br>Total<br><input type="text" id="total" value="'.$valor.'">';
        //         echo $valor;exit();


        //         $entities = $em->getRepository('GlavBundle:Factura')->findAll();

        //         return $this->render('GlavBundle:Factura:index.html.twig', array(
        //             'entities' => $entities,
        //));
    }
}
