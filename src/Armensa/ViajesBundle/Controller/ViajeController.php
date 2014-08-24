<?php

namespace Armensa\ViajesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Armensa\ViajesBundle\Entity\Viaje;
use Armensa\ViajesBundle\Form\ViajeType;

/**
 * Viaje controller.
 *
 * @Route("/viaje")
 */
class ViajeController extends Controller
{

    /**
     * Lists all Viaje entities.
     *
     * @Route("/", name="viaje")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ArmensaViajesBundle:Viaje')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Viaje entity.
     *
     * @Route("/", name="viaje_create")
     * @Method("POST")
     * @Template("ArmensaViajesBundle:Viaje:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Viaje();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('viaje_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Viaje entity.
     *
     * @param Viaje $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Viaje $entity)
    {
        $form = $this->createForm(new ViajeType(), $entity, array(
            'action' => $this->generateUrl('viaje_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Viaje entity.
     *
     * @Route("/new", name="viaje_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Viaje();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Viaje entity.
     *
     * @Route("/{id}", name="viaje_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArmensaViajesBundle:Viaje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Viaje entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Viaje entity.
     *
     * @Route("/{id}/edit", name="viaje_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArmensaViajesBundle:Viaje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Viaje entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Viaje entity.
    *
    * @param Viaje $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Viaje $entity)
    {
        $form = $this->createForm(new ViajeType(), $entity, array(
            'action' => $this->generateUrl('viaje_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Viaje entity.
     *
     * @Route("/{id}", name="viaje_update")
     * @Method("PUT")
     * @Template("ArmensaViajesBundle:Viaje:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArmensaViajesBundle:Viaje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Viaje entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('viaje_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Viaje entity.
     *
     * @Route("/{id}", name="viaje_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ArmensaViajesBundle:Viaje')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Viaje entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('viaje'));
    }

    /**
     * Creates a form to delete a Viaje entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('viaje_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
