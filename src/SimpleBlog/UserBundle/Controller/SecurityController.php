<?php

namespace SimpleBlog\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class SecurityController extends \FOS\UserBundle\Controller\SecurityController
{
    protected $is_header_form = false;

    public function headerLoginAction(Request $request)
    {
        $this->is_header_form = true;
        return parent::loginAction($request);
    }

    protected function renderLogin(array $data)
    {
        if ($this->is_header_form) {
            $template = sprintf('FOSUserBundle:Security:header_login.html.%s', $this->container->getParameter('fos_user.template.engine'));

            return $this->container->get('templating')->renderResponse($template, $data);
        } else {
            return parent::renderLogin($data);
        }
    }
}
