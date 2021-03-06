<?php

namespace PHPBS\Components\Navbar\Link;

use PHPBS\Load;
use PHPBS\ParamMissingException;

class NavbarLink
{

    private $content;

    function __construct(array $params = null)
    {
        
        $this->getNavbarLink($params);

    }

    private function getNavbarLink(array $params = null)
    {

        if(!isset($params['active']))
        {

            $params['active'] = false;

        }

        if(!isset($params['target']))
        {

            $params['target'] = '_self';

        }

        $send = ['params' => $params];

        ob_start();
        Load::component('Navbar/Link/NavbarLinkComponent', $send);
        $this->content = ob_get_clean();
    }

    public function getContent()
    {

        return $this->content;
        
    }

}