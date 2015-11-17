<?php

namespace AppBundle\Controller\Backend;

use AppBundle\Entity\Hostaction;
use AppBundle\Entity\Hostingproduct;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Hostingplan;
use AppBundle\Form\Backend\Hosting\HostingplanType;

class HostingplanController extends Controller
{
    public function indexAction()
    {
        return $this->render('AwBackendTemplateBundle:Hostingplan:index.html.twig', array(
            'hostings' => $this->getDoctrine()->getManager()->getRepository('AppBundle:Hostingplan')->listPlans(),
        ));
    }

    public function newAction()
    {
        $form = $this->createCreateForm($hosting = new Hostingplan());

        return $this->render('AwBackendTemplateBundle:Hostingplan:new.html.twig', array(
            'form'   => $form->createView(),
            'entity' => $hosting,
        ));
    }

    public function createAction(Request $request)
    {
        $form = $this->createCreateForm($hosting = new Hostingplan());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $hosting = $this->addHostingManyProducts(
                $hosting,
                [
                    'register' => $form->get('register')->getData()->getPrice(),
                    'renew' => $form->get('renew')->getData()->getPrice(),
                    'suspend' => 0,
                    'terminated' => 0,
                    'change' => 0
                ]
            );

            $em = $this->getDoctrine()->getManager();
            $em->persist($hosting);
            $em->flush();

            return $this->redirect($this->generateUrl('hostingplan'));
        }

        return $this->render('AwBackendTemplateBundle:Hostingplan:new.html.twig', array(
            'entity' => $hosting,
            'form'   => $form->createView(),
        ));
    }

    public function editAction($id)
    {
        if (!($hostingplan = $this->getDoctrine()->getManager()->getRepository('AppBundle:Hostingplan')->find($id))) {
            throw $this->createNotFoundException('No se encuentra el hosting.');
        }

        return $this->render('AwBackendTemplateBundle:Hostingplan:edit.html.twig', array(
            'entity' => $hostingplan,
            'form' => $this->createEditForm($hostingplan)->createView(),
        ));
    }


    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        if (!($hostingplan = $em->getRepository('AppBundle:Hostingplan')->find($id))) {
            throw $this->createNotFoundException('El plan de hosting no existe.');
        }

        $editForm = $this->createEditForm($hostingplan);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            $em->flush();

            return $this->redirect($this->generateUrl('hostingplan'));
        }


        return $this->render('AwBackendTemplateBundle:Hostingplan:edit.html.twig', array(
            'entity'      => $hostingplan,
            'edit_form'   => $editForm->createView(),
        ));
    }

    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Hostingplan')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Hostingplan entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('hostingplan'));
    }

    private function createEditForm(Hostingplan $hostingplan)
    {
        $em = $this->getDoctrine()->getManager();
        $hostRegisterAction = $em->getRepository('AppBundle:Hostaction')->findOneBy(['alias' => 'register']);
        $hostRenewAction = $em->getRepository('AppBundle:Hostaction')->findOneBy(['alias' => 'renew']);

        $hostRegisterProduct = $em->getRepository('AppBundle:Hostingproduct')->findBy(['hostingplan' => $hostingplan, 'hostaction' => $hostRegisterAction])[0];
        $hostRenewProduct = $em->getRepository('AppBundle:Hostingproduct')->findBy(['hostingplan' => $hostingplan, 'hostaction' => $hostRenewAction])[0];

        $form = $this->createForm(
            new HostingplanType($hostRegisterProduct, $hostRenewProduct),
            $hostingplan,
            array(
                'action' => $this->generateUrl('hostingplan_update', array('id' => $hostingplan->getId())),
                'method' => 'PUT',
            )
        );
        $form->add('submit', 'submit', array('label' => 'Actualizar'));
        return $form;
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hostingplan_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    private function createCreateForm(Hostingplan $hostingplan)
    {
        $form = $this->createForm(
            new HostingplanType(),
            $hostingplan,
            array(
                'action' => $this->generateUrl('hostingplan_create'),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Crear Plan Hosting'));

        return $form;
    }

    private function addHostingManyProducts(Hostingplan $hostingplan, $prices)
    {
        $product = $this->getDoctrine()->getRepository('AppBundle:Product')->findOneBy(['name' => 'hosting']);

        foreach ($prices as $action => $price) {
            $hostingplan->addHostingproduct(
                $this->createHostingProduct($product, $hostingplan, $action, $price)
            );
        }

        return $hostingplan;
    }

    private function createHostingProduct(Product $product, Hostingplan $hostingplan, $productString, $price = 0)
    {
        if (!($action = $this->getDoctrine()->getRepository('AppBundle:Hostaction')->findOneBy(['alias' => $productString]))) {
            throw new \Exception($productString." action doesn't exist");
        }

        $hostingProduct = new Hostingproduct();
        $hostingProduct
            ->setProduct($product)
            ->setHostaction($action)
            ->setHostingplan($hostingplan)
            ->setPrice($price)
        ;
        return $hostingProduct;
    }
}
