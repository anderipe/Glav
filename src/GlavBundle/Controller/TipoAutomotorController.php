<?php

namespace GlavBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GlavBundle\Entity\TipoAutomotor;
use GlavBundle\Form\TipoAutomotorType;

/**
 * TipoAutomotor controller.
 *
 */
class TipoAutomotorController extends Controller
{

    /**
     * Lists all TipoAutomotor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GlavBundle:TipoAutomotor')->findAll();

        return $this->render('GlavBundle:TipoAutomotor:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TipoAutomotor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TipoAutomotor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoautomotor_show', array('id' => $entity->getId())));
        }

        return $this->render('GlavBundle:TipoAutomotor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TipoAutomotor entity.
     *
     * @param TipoAutomotor $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoAutomotor $entity)
    {
        $form = $this->createForm(new TipoAutomotorType(), $entity, array(
            'action' => $this->generateUrl('tipoautomotor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoAutomotor entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoAutomotor();
        $form   = $this->createCreateForm($entity);

        return $this->render('GlavBundle:TipoAutomotor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoAutomotor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:TipoAutomotor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoAutomotor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:TipoAutomotor:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TipoAutomotor entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:TipoAutomotor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoAutomotor entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:TipoAutomotor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TipoAutomotor entity.
    *
    * @param TipoAutomotor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoAutomotor $entity)
    {
        $form = $this->createForm(new TipoAutomotorType(), $entity, array(
            'action' => $this->generateUrl('tipoautomotor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing TipoAutomotor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:TipoAutomotor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoAutomotor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipoautomotor_edit', array('id' => $id)));
        }

        return $this->render('GlavBundle:TipoAutomotor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TipoAutomotor entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GlavBundle:TipoAutomotor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoAutomotor entity.');
            }

            //$em->remove($entity);
            $entity->setEstado('0');
            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipoautomotor'));
    }

    /**
     * Creates a form to delete a TipoAutomotor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoautomotor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
