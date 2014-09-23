<?php

namespace Pepe\SistemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pepe\SistemBundle\Entity\Egreso;
use Pepe\SistemBundle\Form\EgresoType;

/**
 * Egreso controller.
 *
 */
class EgresoController extends Controller
{

    /**
     * Lists all Egreso entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SistemBundle:Egreso')->findAll();

        return $this->render('SistemBundle:Egreso:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Egreso entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Egreso();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('egreso_show', array('id' => $entity->getId())));
        }

        return $this->render('SistemBundle:Egreso:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Egreso entity.
     *
     * @param Egreso $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Egreso $entity)
    {
        $form = $this->createForm(new EgresoType(), $entity, array(
            'action' => $this->generateUrl('egreso_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Egreso entity.
     *
     */
    public function newAction()
    {
        $entity = new Egreso();
        $form   = $this->createCreateForm($entity);

        return $this->render('SistemBundle:Egreso:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Egreso entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemBundle:Egreso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Egreso entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SistemBundle:Egreso:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Egreso entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemBundle:Egreso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Egreso entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SistemBundle:Egreso:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Egreso entity.
    *
    * @param Egreso $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Egreso $entity)
    {
        $form = $this->createForm(new EgresoType(), $entity, array(
            'action' => $this->generateUrl('egreso_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Egreso entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemBundle:Egreso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Egreso entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('egreso_edit', array('id' => $id)));
        }

        return $this->render('SistemBundle:Egreso:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Egreso entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SistemBundle:Egreso')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Egreso entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('egreso'));
    }

    /**
     * Creates a form to delete a Egreso entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('egreso_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
