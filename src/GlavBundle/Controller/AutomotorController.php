<?php

/**
  * @author Anderson Pinto  <anderipe@gmail.com>
  *@version 2.0
  * @copyright [src/controller]  [20 [74] ] 2015/06 Autolavado [ Metodos ]
  */

namespace GlavBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GlavBundle\Entity\Automotor;
use GlavBundle\Form\AutomotorType;

/**
 * Automotor controller.
 *
 */
class AutomotorController extends Controller
{

    /**
     * Lists all Automotor entities.
     *
     */
    public function indexAction()
    {
        //$em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('GlavBundle:Automotor')->findAll();
        //$entities = $em->getRepository('GlavBundle:Automotor')->findBy(array('estado'=> '1'));
        
        $em = $this->getDoctrine()->getManager()->getRepository('GlavBundle:Automotor');
        $entities = $em->findAutomotor();
        
        
        return $this->render('GlavBundle:Automotor:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Automotor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Automotor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('automotor_show', array('id' => $entity->getId())));
        }

        return $this->render('GlavBundle:Automotor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Automotor entity.
     *
     * @param Automotor $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Automotor $entity)
    {
        $form = $this->createForm(new AutomotorType(), $entity, array(
            'action' => $this->generateUrl('automotor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Automotor entity.
     *
     */
    public function newAction()
    {
        $entity = new Automotor();
        $form   = $this->createCreateForm($entity);

        return $this->render('GlavBundle:Automotor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Automotor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Automotor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Automotor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:Automotor:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Automotor entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Automotor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Automotor entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:Automotor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Automotor entity.
    *
    * @param Automotor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Automotor $entity)
    {
        $form = $this->createForm(new AutomotorType(), $entity, array(
            'action' => $this->generateUrl('automotor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Automotor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Automotor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Automotor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('automotor_edit', array('id' => $id)));
        }

        return $this->render('GlavBundle:Automotor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Automotor entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GlavBundle:Automotor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Automotor entity.');
            }

            //$em->remove($entity);
            //
            $entity->setEstado('0');
            $em->persist($entity);

            $em->flush();
        }

        return $this->redirect($this->generateUrl('automotor'));
    }

    /**
     * Creates a form to delete a Automotor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('automotor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
