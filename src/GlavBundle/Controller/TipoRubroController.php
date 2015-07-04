<?php

namespace GlavBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GlavBundle\Entity\TipoRubro;
use GlavBundle\Form\TipoRubroType;

/**
 * TipoRubro controller.
 *
 */
class TipoRubroController extends Controller
{

    /**
     * Lists all TipoRubro entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GlavBundle:TipoRubro')->findTipoRubro();

        return $this->render('GlavBundle:TipoRubro:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TipoRubro entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TipoRubro();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tiporubro_show', array('id' => $entity->getId())));
        }

        return $this->render('GlavBundle:TipoRubro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TipoRubro entity.
     *
     * @param TipoRubro $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoRubro $entity)
    {
        $form = $this->createForm(new TipoRubroType(), $entity, array(
            'action' => $this->generateUrl('tiporubro_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoRubro entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoRubro();
        $form   = $this->createCreateForm($entity);

        return $this->render('GlavBundle:TipoRubro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoRubro entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:TipoRubro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoRubro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:TipoRubro:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TipoRubro entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:TipoRubro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoRubro entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:TipoRubro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TipoRubro entity.
    *
    * @param TipoRubro $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoRubro $entity)
    {
        $form = $this->createForm(new TipoRubroType(), $entity, array(
            'action' => $this->generateUrl('tiporubro_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing TipoRubro entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:TipoRubro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoRubro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tiporubro_edit', array('id' => $id)));
        }

        return $this->render('GlavBundle:TipoRubro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TipoRubro entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GlavBundle:TipoRubro')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoRubro entity.');
            }

            //$em->remove($entity);
            $entity->setEstado('0');
            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tiporubro'));
    }

    /**
     * Creates a form to delete a TipoRubro entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tiporubro_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
