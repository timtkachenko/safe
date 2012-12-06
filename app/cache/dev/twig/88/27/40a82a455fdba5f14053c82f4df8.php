<?php

/* NXCSafeBundle:Default:index.html.twig */
class __TwigTemplate_882740a82a455fdba5f14053c82f4df8 extends Twig_Template
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

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "
Hello ";
        // line 4
        if (isset($context["name"])) { $_name_ = $context["name"]; } else { $_name_ = null; }
        echo twig_escape_filter($this->env, $_name_, "html", null, true);
        echo "!
--------
";
        // line 6
        if (isset($context["encrypted"])) { $_encrypted_ = $context["encrypted"]; } else { $_encrypted_ = null; }
        echo twig_escape_filter($this->env, $_encrypted_, "html", null, true);
        echo "
<br>
";
        // line 8
        if (isset($context["decrypted"])) { $_decrypted_ = $context["decrypted"]; } else { $_decrypted_ = null; }
        echo twig_escape_filter($this->env, $_decrypted_, "html", null, true);
        echo "
<br>
--------
<br>
";
        // line 12
        if (isset($context["encoded"])) { $_encoded_ = $context["encoded"]; } else { $_encoded_ = null; }
        echo twig_escape_filter($this->env, $_encoded_, "html", null, true);
        echo "
<br>
";
        // line 14
        if (isset($context["decoded"])) { $_decoded_ = $context["decoded"]; } else { $_decoded_ = null; }
        echo twig_escape_filter($this->env, $_decoded_, "html", null, true);
        echo "
--------
";
    }

    public function getTemplateName()
    {
        return "NXCSafeBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 14,  54 => 12,  46 => 8,  40 => 6,  34 => 4,  31 => 3,  28 => 2,);
    }
}
