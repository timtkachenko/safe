<?php

/* EPSDemoBundle:Default:index.html.twig */
class __TwigTemplate_6e849f533f72998260c8ef3ed604b25b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("NXCSafeBundle::layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "NXCSafeBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<h1>Messages</h1>

";
        // line 8
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo $this->env->getExtension('ypt_jq_grid_twig_extension')->renderGrid($_gridView_);
        echo "


<br/>
<a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("multiviewgrid"), "html", null, true);
        echo "\">Multi grid</a>
<br/>
<a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("gene"), "html", null, true);
        echo "\">Generate dummy data</a>


";
    }

    public function getTemplateName()
    {
        return "EPSDemoBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 14,  43 => 12,  35 => 8,  31 => 6,  28 => 5,);
    }
}
