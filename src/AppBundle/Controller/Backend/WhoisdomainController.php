<?php


namespace AppBundle\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class WhoisdomainController extends Controller
{
	public function registeravailabilityAction(Request $request)
	{
		try {
			$this->get('app.domain')->checkDomain($request->get('domain'));

			return new JsonResponse(
				[
					'status' => 1,
					'response' => '1',
					'price' => 10.00
				]
			);
		} catch(\Exception $e) {
			return new JsonResponse(
				[
					'status' => 0,
					'message' => $e->getMessage(),
					'price' => 0.00
				]
			);
		}
	}

	public function transferavailabilityAction()
	{

	}
}