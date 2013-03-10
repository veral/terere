<?php

namespace MejorPromo\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use MejorPromo\BackendBundle\Entity\CajasAperturas;
use MejorPromo\BackendBundle\Form\CajasAperturasType;

/**
 * CajasAperturas controller.
 *
 */
class CajasAperturasController extends Controller
{
    /**
     * Lists all CajasAperturas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BackendBundle:CajasAperturas')->findAll();

        return $this->render('BackendBundle:CajasAperturas:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new CajasAperturas entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new CajasAperturas();
        $form = $this->createForm(new CajasAperturasType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cajasaperturas_show', array('id' => $entity->getId())));
        }

        return $this->render('BackendBundle:CajasAperturas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new CajasAperturas entity.
     *
     */
    public function newAction()
    {
        $entity = new CajasAperturas();
        $form   = $this->createForm(new CajasAperturasType(), $entity);

        return $this->render('BackendBundle:CajasAperturas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CajasAperturas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:CajasAperturas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CajasAperturas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:CajasAperturas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing CajasAperturas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:CajasAperturas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CajasAperturas entity.');
        }

        $editForm = $this->createForm(new CajasAperturasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:CajasAperturas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing CajasAperturas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:CajasAperturas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CajasAperturas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CajasAperturasType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cajasaperturas_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:CajasAperturas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a CajasAperturas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendBundle:CajasAperturas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CajasAperturas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cajasaperturas'));
    }

    /**
     * Creates a form to delete a CajasAperturas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
