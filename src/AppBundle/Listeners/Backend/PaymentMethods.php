<?php
namespace AppBundle\Listeners\Backend;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class PaymentMethods
{
    private $router;
    private $doctrine;
    private $twig;

    function __construct(Router $router, Registry $doctrine, \Twig_Environment $twig)
    {
        $this->router = $router;
        $this->doctrine = $doctrine;
        $this->twig = $twig;
    }

    function onKernelRequest(GetResponseEvent $event)
    {
        if (strpos($event->getRequest()->getPathInfo(), $this->router->getRouteCollection()->get('back_index')->getPath()) == 0) {
            $this->twig->addGlobal(
                'paymentMethods',
                $this->doctrine->getRepository('AppBundle:Paymentmethod')->findAll()
            );

            dump($this->doctrine->getRepository('AppBundle:Paymentmethod')->findAll());
        }
    }
}