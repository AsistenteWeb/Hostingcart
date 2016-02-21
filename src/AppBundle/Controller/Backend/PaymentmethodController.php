<?php

namespace AppBundle\Controller\Backend;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PaymentmethodController extends Controller
{
  public function indexAction()
  {
    return $this->render('AwBackendTemplateBundle:Paymentmethod:index.html.twig', array(
      'Paymentmethod' => $this->getDoctrine()->getRepository('AppBundle:Paymentmethod')->findAll(),
    ));
  }


}