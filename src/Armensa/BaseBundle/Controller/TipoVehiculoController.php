<?php

namespace Armensa\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Armensa\BaseBundle\Entity\TipoVehiculo;
use Armensa\BaseBundle\Form\TipoVehiculoType;

/**
 * TipoVehiculo controller.
 *
 * @Route("/tipovehiculo")
 */
class TipoVehiculoController extends Controller
{

    /**
     * Lists all TipoVehiculo entities.
     *
     * @Route("/", name="tipovehiculo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ArmensaBaseBundle:TipoVehiculo')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TipoVehiculo entity.
     *
     * @Route("/", name="tipovehiculo_create")
     * @Method("POST")
     * @Template("ArmensaBaseBundle:TipoVehiculo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TipoVehiculo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipovehiculo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TipoVehiculo entity.
     *
     * @param TipoVehiculo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoVehiculo $entity)
    {
        $form = $this->createForm(new TipoVehiculoType(), $entity, array(
            'action' => $this->generateUrl('tipovehiculo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoVehiculo entity.
     *
     * @Route("/new", name="tipovehiculo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TipoVehiculo();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TipoVehiculo entity.
     *
     * @Route("/{id}", name="tipovehiculo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArmensaBaseBundle:TipoVehiculo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoVehiculo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TipoVehiculo entity.
     *
     * @Route("/{id}/edit", name="tipovehiculo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArmensaBaseBundle:TipoVehiculo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoVehiculo entity.');
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
    * Creates a form to edit a TipoVehiculo entity.
    *
    * @param TipoVehiculo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoVehiculo $entity)
    {
        $form = $this->createForm(new TipoVehiculoType(), $entity, array(
            'action' => $this->generateUrl('tipovehiculo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing TipoVehiculo entity.
     *
     * @Route("/{id}", name="tipovehiculo_update")
     * @Method("PUT")
     * @Template("ArmensaBaseBundle:TipoVehiculo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArmensaBaseBundle:TipoVehiculo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoVehiculo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipovehiculo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TipoVehiculo entity.
     *
     * @Route("/{id}", name="tipovehiculo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ArmensaBaseBundle:TipoVehiculo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoVehiculo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipovehiculo'));
    }

    /**
     * Creates a form to delete a TipoVehiculo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipovehiculo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
