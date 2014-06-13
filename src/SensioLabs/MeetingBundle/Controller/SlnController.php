<?php

namespace SensioLabs\MeetingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Conf;
use SensioLabs\Connect\Security\Authentication\Token\ConnectToken;

class SlnController extends BaseController
{
    /**
    * @Conf\Route("/sln_customiser.js", name="sln_customize")
    * @Conf\Template("SensioLabsMeetingBundle:Sln:index.js.twig")
    */
    public function indexAction()
    {
        $token = $this->get('security.context')->getToken();
        $user = $token instanceof ConnectToken ? $token->getApiUser() : null;

        return array('user' => $user);
    }

    /**
     * @Conf\Route("/logout", name="sln_logout")
     */
    public function logoutAction()
    {
        $this->get('security.context')->setToken(null);
        $this->get('request')->getSession()->invalidate();
    }
}
