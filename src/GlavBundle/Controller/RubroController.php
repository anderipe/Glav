<?php

namespace GlavBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GlavBundle\Entity\Rubro;
use GlavBundle\Entity\TipoRubro;
use GlavBundle\Form\TipoRubroType;
use GlavBundle\Form\RubroType;

/**
 * Rubro controller.
 *
 */
class RubroController extends Controller
{

    /**
     * Lists all Rubro entities.
     *
     */
    public function indexAction()
    {
        //$em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('GlavBundle:Rubro')->findAll();
        //
        $em = $this->getDoctrine()->getManager()->getRepository('GlavBundle:Rubro');
        $entities = $em->findRubro();

        return $this->render('GlavBundle:Rubro:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Rubro entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Rubro();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        //  $rubro = 1 ; exit();

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
//                 $tipoRubro = new TipoRubro();
//                 $formF = $this->createForm(new TipoRubroType(),$tipoRubro);
//                 $formF->handleRequest($request);  

//                 //$tipoRubro->setId(2);
//                 //guardas parent
//                 $em->persist($tipoRubro);
//                 //$book = new Book();
//                 //$book->setPhrase('Write a blog post');
//                 $entity->setIdTipoRubro($tipoRubro->setId(2));
            
            $TipoRubro = $em->getRepository('GlavBundle:TipoRubro')->find(1);
            $entity->setIdTipoRubro($TipoRubro);
            
            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('rubro_show', array('id' => $entity->getId())));
        }

        return $this->render('GlavBundle:Rubro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Rubro entity.
     *
     * @param Rubro $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Rubro $entity)
    {
        $form = $this->createForm(new RubroType(), $entity, array(
            'action' => $this->generateUrl('rubro_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Rubro entity.
     *
     */
    public function newAction()
    {
        $entity = new Rubro();
        $form   = $this->createCreateForm($entity);

        return $this->render('GlavBundle:Rubro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Rubro entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Rubro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rubro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:Rubro:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Rubro entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Rubro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rubro entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GlavBundle:Rubro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Rubro entity.
    *
    * @param Rubro $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Rubro $entity)
    {
        $form = $this->createForm(new RubroType(), $entity, array(
            'action' => $this->generateUrl('rubro_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Rubro entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GlavBundle:Rubro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rubro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('rubro_edit', array('id' => $id)));
        }

        return $this->render('GlavBundle:Rubro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Rubro entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GlavBundle:Rubro')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Rubro entity.');
            }

            //$em->remove($entity);
            $entity->setEstado('0');
            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('rubro'));
    }

    /**
     * Creates a form to delete a Rubro entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rubro_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
