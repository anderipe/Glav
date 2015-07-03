<?php

namespace GlavBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GlavBundle\Entity\EmpleadoRepository;
use GlavBundle\Entity\Empleado;
use GlavBundle\Form\EmpleadoType;

/**
 * Empleado controller.
 *
 */
class EmpleadoController extends Controller
{

    /**
     * Lists all Empleado entities.
     *
     */
    public function indexAction()
    {
        //$em = $this->getDoctrine()->getManager();
        $em = $this->getDoctrine()->getManager()->getRepository('GlavBundle:Empleado');
        $entities = $em->findEmpleado();

        //$entities = $em->getRepository('GlavBundle:Empleado')->findAll();

        return $this->render('GlavBundle:Empleado:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Empleado entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Empleado();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('empleado_show', array('id' => $entity->getId())));
        }

        return $this->render('GlavBundle:Empleado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Empleado entity.
     *
     * @param Empleado $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Empleado $entity)
    {
        $form = $this->createForm(new EmpleadoType(), $entity, array(
            'action' => $this->generateUrl('empleado_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Empleado entity.
     *
     */
    public function newAction()
    {
        $entity = new Empleado();
        $form   = $this->createCreateForm($entity);

        return $this->render('GlavBundle:Empleado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Empleado entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Empleado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Empleado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:Empleado:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Empleado entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Empleado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Empleado entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:Empleado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Empleado entity.
    *
    * @param Empleado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Empleado $entity)
    {
        $form = $this->createForm(new EmpleadoType(), $entity, array(
            'action' => $this->generateUrl('empleado_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Empleado entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Empleado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Empleado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('empleado_edit', array('id' => $id)));
        }

        return $this->render('GlavBundle:Empleado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Empleado entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GlavBundle:Empleado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Empleado entity.');
            }

            //$em->remove($entity);
            $entity->setEstado('0');
            $em->persist($entity);

            $em->flush();
        }

        return $this->redirect($this->generateUrl('empleado'));
    }

    /**
     * Creates a form to delete a Empleado entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('empleado_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
