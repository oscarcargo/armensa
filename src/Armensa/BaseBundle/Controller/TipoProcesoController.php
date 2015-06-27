<?php

namespace Armensa\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Armensa\BaseBundle\Entity\TipoProceso;
use Armensa\BaseBundle\Form\TipoProcesoType;

/**
 * TipoProceso controller.
 *
 * @Route("/tipoproceso")
 */
class TipoProcesoController extends Controller
{

    /**
     * Lists all TipoProceso entities.
     *
     * @Route("/", name="tipoproceso")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ArmensaBaseBundle:TipoProceso')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TipoProceso entity.
     *
     * @Route("/", name="tipoproceso_create")
     * @Method("POST")
     * @Template("ArmensaBaseBundle:TipoProceso:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TipoProceso();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoproceso_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TipoProceso entity.
     *
     * @param TipoProceso $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoProceso $entity)
    {
        $form = $this->createForm(new TipoProcesoType(), $entity, array(
            'action' => $this->generateUrl('tipoproceso_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoProceso entity.
     *
     * @Route("/new", name="tipoproceso_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TipoProceso();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TipoProceso entity.
     *
     * @Route("/{id}", name="tipoproceso_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArmensaBaseBundle:TipoProceso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoProceso entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TipoProceso entity.
     *
     * @Route("/{id}/edit", name="tipoproceso_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArmensaBaseBundle:TipoProceso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoProceso entity.');
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
    * Creates a form to edit a TipoProceso entity.
    *
    * @param TipoProceso $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoProceso $entity)
    {
        $form = $this->createForm(new TipoProcesoType(), $entity, array(
            'action' => $this->generateUrl('tipoproceso_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing TipoProceso entity.
     *
     * @Route("/{id}", name="tipoproceso_update")
     * @Method("PUT")
     * @Template("ArmensaBaseBundle:TipoProceso:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArmensaBaseBundle:TipoProceso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoProceso entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipoproceso_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TipoProceso entity.
     *
     * @Route("/{id}", name="tipoproceso_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ArmensaBaseBundle:TipoProceso')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoProceso entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipoproceso'));
    }

    /**
     * Creates a form to delete a TipoProceso entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoproceso_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
