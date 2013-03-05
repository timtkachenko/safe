<?php

namespace NXC\SafeBundle\Twig;
use Ypt\JqGridBundle\Twig\JqGridExtension as BaseJqGridExtension;
use Ypt\JqGridBundle\Grid\GridView;

class JqGridExtension extends BaseJqGridExtension
{
    //const DEFAULT_TEMPLATE = 'NXCSafeBundle:Grid:blocks.html.twig';
    const DEFAULT_TEMPLATE = 'NXCSafeBundle::blocks.html.twig';
    public $tpl = null;
    public function __construct($router)
    {
        $this->router = $router;
    }
    public function getTpl() {
        return $this->tpl;
    }

    public function setTpl($tpl) {
        $this->tpl = $tpl;
    }

    public function getName()
    {
        return 'ypt_jq_grid_twig_extension';
    }
}
