<?php

namespace Pepe\SistemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pepe\SistemBundle\Entity\Turno;
use Pepe\SistemBundle\Form\TurnoType;

/**
 * Turno controller.
 *
 */
class TurnoController extends Controller
{

    /**
     * Lists all Turno entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SistemBundle:Turno')->findAll();

        return $this->render('SistemBundle:Turno:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Turno entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Turno();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('turno_show', array('id' => $entity->getId())));
        }

        return $this->render('SistemBundle:Turno:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Turno entity.
     *
     * @param Turno $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Turno $entity)
    {
        $form = $this->createForm(new TurnoType(), $entity, array(
            'action' => $this->generateUrl('turno_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Turno entity.
     *
     */
    public function newAction()
    {
        $entity = new Turno();
        $form   = $this->createCreateForm($entity);

        return $this->render('SistemBundle:Turno:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Turno entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemBundle:Turno')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Turno entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SistemBundle:Turno:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Turno entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemBundle:Turno')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Turno entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SistemBundle:Turno:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Turno entity.
    *
    * @param Turno $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Turno $entity)
    {
        $form = $this->createForm(new TurnoType(), $entity, array(
            'action' => $this->generateUrl('turno_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Turno entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemBundle:Turno')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Turno entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('turno_edit', array('id' => $id)));
        }

        return $this->render('SistemBundle:Turno:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Turno entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SistemBundle:Turno')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Turno entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('turno'));
    }

    /**
     * Creates a form to delete a Turno entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('turno_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
