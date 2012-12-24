<?php

namespace NXC\SafeBundle\Twig;
use Ypt\JqGridBundle\Twig\JqGridExtension as BaseJqGridExtension;
use Ypt\JqGridBundle\Grid\GridView;

class JqGridExtension extends BaseJqGridExtension
{
    const DEFAULT_TEMPLATE = 'NXCSafeBundle:Grid:blocks.html.twig';

    public function __construct($router)
    {
        $this->router = $router;
    }

    public function getName()
    {
        return 'ypt_jq_grid_twig_extension';
    }
}
