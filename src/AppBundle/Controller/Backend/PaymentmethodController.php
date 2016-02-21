<?php

namespace AppBundle\Controller\Backend;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PaymentmethodController extends Controller
{
  public function indexAction()
  {
    return $this->render('AwBackendTemplateBundle:Paymentmethod:index.html.twig', array(
      'paymentmethods' => $this->getDoctrine()->getRepository('AppBundle:Paymentmethod')->findAll(),
    ));
  }


}