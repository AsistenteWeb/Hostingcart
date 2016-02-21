<?php

namespace AppBundle\Controller\Backend;


use AppBundle\Entity\Paymentmethod;
use AppBundle\Form\Backend\Paymentmethod\PaymentmethodType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

        return $this->render('AwBackendTemplateBundle:Hostingplan:new.html.twig', array(
            'form'   => $form->createView(),
            'entity' => $paymentMethod,
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
}