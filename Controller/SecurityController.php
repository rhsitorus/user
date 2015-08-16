<?php

namespace Rofil\Admin\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
	/**
	 * @Route("/auth/login", name="auth.login")
	 * @Template
	 */
	public function loginAction()
	{
		$request = $this->getRequest();
		$session = $request->getSession();
		
		if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
			$error   = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
		} else {
			$error   = $session->get(SecurityContext::AUTHENTICATION_ERROR);
			$session->remove(SecurityContext::AUTHENTICATION_ERROR);
		}

		return array(
			// last username entered by the user
			'last_username' => $session->get(SecurityContext::LAST_USERNAME),
			'error'         => $error,
		);
	}
}