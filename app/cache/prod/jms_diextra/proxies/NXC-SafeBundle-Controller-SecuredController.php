<?php

namespace EnhancedProxy_8a575de1a86785e1b2d48ab8bb58ad8f78a11998\__CG__\NXC\SafeBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class SecuredController extends \NXC\SafeBundle\Controller\SecuredController
{
    private $__CGInterception__loader;

    public function helloadminAction($name)
    {
        $ref = new \ReflectionMethod('NXC\\SafeBundle\\Controller\\SecuredController', 'helloadminAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($name));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($name), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}