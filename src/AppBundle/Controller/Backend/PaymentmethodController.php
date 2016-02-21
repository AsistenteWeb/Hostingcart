<?php

namespace AppBundle\Controller\Backend;


use AppBundle\Entity\Paymentmethod;
use AppBundle\Form\Backend\Paymentmethod\PaymentmethodType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PaymentmethodController extends Controller
{
    public function indexAction()
    {
        return $this->render('AwBackendTemplateBundle:Paymentmethod:index.html.twig', array(
            'paymentmethods' => $this->getDoctrine()->getRepository('AppBundle:Paymentmethod')->findAll(),
        ));
    }

    public function newAction()
    {
        $form = $this->createCreateForm($paymentMethod = new Paymentmethod());

        return $this->render('AwBackendTemplateBundle:Paymentmethod:new.html.twig', array(
            'form'   => $form->createView(),
            'entity' => $paymentMethod,
        ));
    }

    public function editAction($id)
    {
        if (!($paymentMethod = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paymentmethod')->find($id))) {
            throw $this->createNotFoundException('No se encuentra el método de pago.');
        }

        return $this->render('AwBackendTemplateBundle:Paymentmethod:edit.html.twig', array(
            'entity' => $paymentMethod,
            'form' => $this->createEditForm($paymentMethod)->createView(),
        ));
    }

    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        if (!($paymentMethod = $em->getRepository('AppBundle:Paymentmethod')->find($id))) {
            throw $this->createNotFoundException('El método de pago no existe.');
        }

        $editForm = $this->createEditForm($paymentMethod);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            $em->flush();

            return $this->redirect($this->generateUrl('paymentmethod_index'));
        }


        return $this->render('AwBackendTemplateBundle:Paymentmethod:edit.html.twig', array(
            'entity'      => $paymentMethod,
            'form'   => $editForm->createView(),
        ));
    }

    public function createAction(Request $request)
    {
        $form = $this->createCreateForm($paymentMethod = new Paymentmethod());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paymentMethod);
            $em->flush();

            return $this->redirect($this->generateUrl('paymentmethod_index'));
        }

        return $this->render('AwBackendTemplateBundle:Paymentmethod:new.html.twig', array(
            'entity' => $paymentMethod,
            'form'   => $form->createView(),
        ));
    }

    private function createCreateForm(Paymentmethod $paymentMethod)
    {
        $form = $this->createForm(
            new PaymentmethodType(),
            $paymentMethod,
            array(
                'action' => $this->generateUrl('paymentmethod_create'),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Crear Metodo de Pago'));

        return $form;
    }

    private function createEditForm(Paymentmethod $paymentmethod)
    {
        $form = $this->createForm(
            new PaymentmethodType(),
            $paymentmethod,
            array(
                'action' => $this->generateUrl('paymentmethod_update', array('id' => $paymentmethod->getId())),
                'method' => 'PUT',
            )
        );
        $form->add('submit', 'submit', array('label' => 'Actualizar'));
        return $form;
    }
}