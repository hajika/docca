<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AttributeKeyValue;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Attributekeyvalue controller.
 *
 */
class AttributeKeyValueController extends Controller
{
    /**
     * Lists all attributeKeyValue entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $attributeKeyValues = $em->getRepository('AppBundle:AttributeKeyValue')->findAll();

        return $this->render('attributekeyvalue/index.html.twig', array(
            'attributeKeyValues' => $attributeKeyValues,
        ));
    }

    /**
     * Creates a new attributeKeyValue entity.
     *
     */
    public function newAction(Request $request)
    {
        $attributeKeyValue = new Attributekeyvalue();
        $form = $this->createForm('AppBundle\Form\AttributeKeyValueType', $attributeKeyValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($attributeKeyValue);
            $em->flush($attributeKeyValue);

            return $this->redirectToRoute('attributekeyvalue_show', array('id' => $attributeKeyValue->getId()));
        }

        return $this->render('attributekeyvalue/new.html.twig', array(
            'attributeKeyValue' => $attributeKeyValue,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a attributeKeyValue entity.
     *
     */
    public function showAction(AttributeKeyValue $attributeKeyValue)
    {
        $deleteForm = $this->createDeleteForm($attributeKeyValue);

        return $this->render('attributekeyvalue/show.html.twig', array(
            'attributeKeyValue' => $attributeKeyValue,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing attributeKeyValue entity.
     *
     */
    public function editAction(Request $request, AttributeKeyValue $attributeKeyValue)
    {
        $deleteForm = $this->createDeleteForm($attributeKeyValue);
        $editForm = $this->createForm('AppBundle\Form\AttributeKeyValueType', $attributeKeyValue);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('attributekeyvalue_edit', array('id' => $attributeKeyValue->getId()));
        }

        return $this->render('attributekeyvalue/edit.html.twig', array(
            'attributeKeyValue' => $attributeKeyValue,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a attributeKeyValue entity.
     *
     */
    public function deleteAction(Request $request, AttributeKeyValue $attributeKeyValue)
    {
        $form = $this->createDeleteForm($attributeKeyValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($attributeKeyValue);
            $em->flush($attributeKeyValue);
        }

        return $this->redirectToRoute('attributekeyvalue_index');
    }

    /**
     * Creates a form to delete a attributeKeyValue entity.
     *
     * @param AttributeKeyValue $attributeKeyValue The attributeKeyValue entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AttributeKeyValue $attributeKeyValue)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('attributekeyvalue_delete', array('id' => $attributeKeyValue->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
