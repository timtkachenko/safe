<?php

/* WebProfilerBundle:Profiler:base.html.twig */
class __TwigTemplate_78abc78f1cef9827dd23e62c5b760574 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" type=\"image/x-icon\" sizes=\"16x16\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/favicon.ico"), "html", null, true);
        echo "\" />
        ";
        // line 8
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "        ";
        $this->env->loadTemplate("WebProfilerBundle:Profiler:toolbar_style.html.twig")->display(array_merge($context, array("position" => "top", "floatable" => false)));
        // line 12
        echo "    </head>
    <body>
        ";
        // line 14
        $this->displayBlock('body', $context, $blocks);
        // line 15
        echo "    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Profiler";
    }

    // line 8
    public function block_head($context, array $blocks = array())
    {
        // line 9
        echo "            <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/css/profiler.css"), "html", null, true);
        echo "\" />
        ";
    }

    // line 14
    public function block_body($context, array $blocks = array())
    {
        echo "";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 9,  60 => 8,  48 => 15,  46 => 14,  39 => 11,  37 => 8,  22 => 1,  184 => 32,  176 => 50,  172 => 49,  148 => 42,  137 => 41,  133 => 40,  120 => 38,  117 => 37,  115 => 36,  110 => 33,  107 => 32,  105 => 31,  101 => 29,  90 => 25,  87 => 24,  80 => 22,  70 => 14,  67 => 19,  57 => 16,  54 => 6,  51 => 14,  44 => 9,  32 => 4,  29 => 6,  392 => 163,  381 => 160,  376 => 159,  373 => 158,  367 => 157,  364 => 156,  356 => 150,  353 => 149,  346 => 145,  338 => 141,  330 => 137,  322 => 133,  314 => 129,  306 => 125,  298 => 121,  282 => 109,  274 => 105,  266 => 101,  258 => 97,  248 => 89,  245 => 88,  237 => 83,  234 => 82,  231 => 81,  225 => 78,  222 => 77,  217 => 74,  210 => 72,  200 => 70,  197 => 69,  185 => 64,  177 => 60,  169 => 48,  165 => 46,  162 => 53,  159 => 45,  149 => 49,  143 => 47,  138 => 46,  135 => 45,  132 => 44,  125 => 39,  122 => 41,  119 => 40,  116 => 39,  109 => 36,  104 => 35,  96 => 31,  92 => 29,  89 => 28,  86 => 27,  78 => 23,  75 => 22,  72 => 20,  69 => 19,  62 => 18,  55 => 13,  52 => 12,  49 => 11,  42 => 12,  38 => 6,  35 => 5,  33 => 7,  30 => 3,);
    }
}
