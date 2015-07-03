<?php

namespace GlavBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GlavBundle\Entity\Servicio;
use GlavBundle\Form\ServicioType;

/**
 * Servicio controller.
 *
 */
class ServicioController extends Controller
{

    /**
     * Lists all Servicio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sql = "select s.id , a.modelo , a.matricula ,concat(e.nombre,' ',e.apellido )as empleado ,s.estado_servicio,s.fecha_servicio,s.fecha_entrega, s.observacion,s.pago from Servicio s inner join Automotor a on a.id=s.id_automotor inner join Empleado e on e.id=s.id_empleado";

        $con = $this->getDoctrine()->getManager()->getConnection()->prepare($sql);
        $con->execute();
        $entities = $con->fetchAll(); 
        //print_r($entities);exit();
        //$entities = $em->getRepository('GlavBundle:Servicio')->findAll();

        return $this->render('GlavBundle:Servicio:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Servicio entity.
     *
     */
    public function createAction(Request $request)
    {
        //echo $request->getLocale();exit();
        $entity = new Servicio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('servicio_show', array('id' => $entity->getId())));
        }

        return $this->render('GlavBundle:Servicio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Servicio entity.
     *
     * @param Servicio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Servicio $entity)
    {
        $form = $this->createForm(new ServicioType(), $entity, array(
            'action' => $this->generateUrl('servicio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Servicio entity.
     *
     */
    public function newAction()
    {
        $entity = new Servicio();
        $form   = $this->createCreateForm($entity);

        return $this->render('GlavBundle:Servicio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Servicio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Servicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servicio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:Servicio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Servicio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Servicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servicio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:Servicio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Servicio entity.
    *
    * @param Servicio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Servicio $entity)
    {
        $form = $this->createForm(new ServicioType(), $entity, array(
            'action' => $this->generateUrl('servicio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Servicio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Servicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servicio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('servicio_edit', array('id' => $id)));
        }

        return $this->render('GlavBundle:Servicio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Servicio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GlavBundle:Servicio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Servicio entity.');
            }

            //$em->remove($entity);
            $entity->setEstado('0');
            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('servicio'));
    }

    /**
     * Creates a form to delete a Servicio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('servicio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
    public function buscarMatriculaAction(Request $datos)
    {
      $em = $this->getDoctrine()->getManager();
      $sql = "select s.id , a.modelo , a.matricula ,concat(e.nombre,' ',e.apellido )as empleado ,s.estado_servicio,s.fecha_servicio,s.fecha_entrega, s.observacion,s.pago from Servicio s inner join Automotor a on a.id=s.id_automotor inner join Empleado e on e.id=s.id_empleado";
        $where = "WHERE CONCAT(a.matricula) like '%".$datos->get('matricula')."%'";   
        $con = $this->getDoctrine()->getManager()->getConnection()->prepare($sql.' '.$where);
        $con->execute();
        $entities = $con->fetchAll(); 
        //print_r($entities);exit();
        //$entities = $em->getRepository('GlavBundle:Servicio')->findAll();

        return $this->render('GlavBundle:Servicio:buscar.html.twig', array(
            'entities' => $entities,
        ));   
        
        
    }
}
