<?php

namespace GlavBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GlavBundle\Entity\Cargo;
use GlavBundle\Form\CargoType;

/**
 * Cargo controller.
 *
 */
class CargoController extends Controller
{

    /**
     * Lists all Cargo entities.
     *
     */
    public function indexAction()
    {
//         $em = $this->getDoctrine()->getManager();
//         $entities = $em->getRepository('GlavBundle:Cargo')->findAll();
        
        $em = $this->getDoctrine()->getManager()->getRepository('GlavBundle:Cargo');
        $entities = $em->findCargo();
        
        $breadcrumb = $this->generateUrl('cargo');

        return $this->render('GlavBundle:Cargo:index.html.twig', array(
            'entities' => $entities, 'breadcrumb' => $breadcrumb
        ));
    }
    /**
     * Creates a new Cargo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Cargo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cargo_show', array('id' => $entity->getId())));
        }

        return $this->render('GlavBundle:Cargo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Cargo entity.
     *
     * @param Cargo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Cargo $entity)
    {
        $form = $this->createForm(new CargoType(), $entity, array(
            'action' => $this->generateUrl('cargo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Cargo entity.
     *
     */
    public function newAction()
    {
        $entity = new Cargo();
        $form   = $this->createCreateForm($entity);

        return $this->render('GlavBundle:Cargo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cargo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Cargo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cargo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:Cargo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cargo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Cargo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cargo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:Cargo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Cargo entity.
    *
    * @param Cargo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cargo $entity)
    {
        $form = $this->createForm(new CargoType(), $entity, array(
            'action' => $this->generateUrl('cargo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Cargo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Cargo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cargo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cargo_edit', array('id' => $id)));
        }

        return $this->render('GlavBundle:Cargo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Cargo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GlavBundle:Cargo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cargo entity.');
            }

            //$em->remove($entity);
            $entity->setEstado('0');
            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cargo'));
    }

    /**
     * Creates a form to delete a Cargo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cargo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
