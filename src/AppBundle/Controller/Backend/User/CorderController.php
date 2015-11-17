<?php

namespace AppBundle\Controller\Backend\User;

use Ap\ResellerclubBundle\Api\Contacts\Operations\ContactsSearch;
use Ap\ResellerclubBundle\Api\Customers\Operations\CustomerSignup;
use AppBundle\Entity\Corder;
use AppBundle\Entity\Corderdomain;
use AppBundle\Entity\Corderhosting;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CorderController extends Controller
{
	public function newCorderAction($id)
	{
		$user = $this->getDoctrine()->getRepository('AwUserBundle:User')->find($id);

		$order = $this->get('app.order')->createOrder($user);
		$form = $this->get('app.order')->createForm($order, $user);

		return $this->render('AwBackendTemplateBundle:User/Corder:new.html.twig',
			[
				'form'   => $form->createView(),
				'user' => $user,
			]
		);
	}

	public function createCorderAction(Request $request, $id)
	{
		$corder = new Corder();

		$corder->setUser($user = $this->getDoctrine()->getRepository('AwUserBundle:User')->find($id));

		$form = $this->createCreateForm($user, $corder);

		$form->handleRequest($request);

		if ($form->isValid()) {
			$corder->setBegindate($beginDate = new \DateTime());
			$endDate = clone $beginDate;

			$corder->setEnddate($endDate->add(new \DateInterval('P1Y')));
			$corder->setAutorenew(false);

			$em = $this->getDoctrine()->getEntityManager();

			$corderDomain = new Corderdomain();
			$corderDomain->setCorder($corder);

			$corderDomain->setDomain($form->get('corderdomain')->get('domain')->getData());

			$corderDomain->setDomainproduct($domainProduct =  $form->get('corderdomain')->get('domainproduct')->getData());
			$corderDomain->setPrice($domainProduct->getPrice());

			$corderHosting = new Corderhosting();
			$corderHosting->setCorder($corder);

			$corderHosting->setDomaintld($form->get('corderhosting')->get('domaintld')->getData());
			$corderHosting->setHostingproduct($hostingProduct = $form->get('corderhosting')->get('hostingproduct')->getData());
			$corderHosting->setPrice($hostingProduct->getPrice());

			$corder->setCorderdomain($corderDomain);
			$corder->setCorderhosting($corderHosting);

			$em->persist($corder);
			$em->flush();

			return $this->redirectToRoute('backend_user_index');
		}
		return $this->render('AwBackendTemplateBundle:User/Corder:new.html.twig',
			[
				'form'   => $form->createView(),
				'entity' => $corder,
			]
		);
	}

	public function registerCorderAction(Request $request, $id)
	{
		$user = $this->getDoctrine()->getRepository('AwUserBundle:User')->find($id);

		$order = $this->get('app.order')->createOrder($user);
		$form = $this->get('app.order')->createForm($order, $user);

		$form->handleRequest($request);

		$errors = [];
		if ($form->isValid()) {

			try {
				$this->get('app.domain')->checkDomain($form->get('domain')->getData());

				if (!$user->getResellerclubuser()) {
					$customerSignup = new CustomerSignup(
						$user->getEmail(),
						$this->get('app.strong.password')->generateStrongPassword(12),
						$user->getFirstname().' '.$user->getLastname(),
						'N/A',
						$user->getAddress1(),
						$user->getCity(),
						$user->getState(),
						null,
						$user->getCountry(),
						$user->getZipcode(),
						$user->getPhonecc() ? $user->getPhonecc(): '1',
						$user->getPhone(),
						'es'
						)
					;
dump($this->get('ap_resellerclub.api')->setOperation($customerSignup)->getQuery());
dump($this->get('ap_resellerclub.api')->setOperation($customerSignup)->exec());
				}
/*
				$this->get('aw.resellerclub.domain.contact')->checkAndRegisterContact($form->get('contact_register')->getData());
				$this->get('aw.resellerclub.domain.contact')->checkAndRegisterContact($form->get('contact_administrator')->getData());
				$this->get('aw.resellerclub.domain.contact')->checkAndRegisterContact($form->get('contact_billing')->getData());
				$this->get('aw.resellerclub.domain.contact')->checkAndRegisterContact($form->get('contact_technical')->getData());
*/
			} catch(\Exception $e) {
				$errors[] = $e->getMessage();
			}

			if (empty($errors)) {
//				$this->get('resellerclub')->register($form->get('domain')->getData());
			}
dump($errors);
dump($form->get('contact_technical')->getData());
dump(get_object_vars($form->get('contact_technical')->getData()));
dump($form->get('contact_technical')->getData());
dump($form);
die;
		}

		return $this->render('AwBackendTemplateBundle:User/Corder:new.html.twig',
			[
				'form'   => $form->createView(),
				'user' => $user,
				'errors' => $errors
			]
		);
	}

	private function registerDomainAction()
	{
		return;
	}

	private function registerDomainAndPayAction()
	{}

	private function registerHostingAction()
	{}

	private function registerHostingAndPayAction()
	{}

	private function registerDomainAndRegisterHostingAction()
	{}

	private function registerDomainAndRegisterHostingAndPayAction()
	{}
}