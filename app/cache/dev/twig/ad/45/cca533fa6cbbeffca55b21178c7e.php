<?php

/* WebProfilerBundle:Collector:exception.html.twig */
class __TwigTemplate_ad45cca533fa6cbbeffca55b21178c7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebProfilerBundle:Profiler:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/css/exception.css"), "html", null, true);
        echo "\" />
    ";
        // line 5
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
    }

    // line 8
    public function block_menu($context, array $blocks = array())
    {
        // line 9
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/exception.png"), "html", null, true);
        echo "\" alt=\"Exception\" /></span>
    <strong>Exception</strong>
    <span class=\"count\">
        ";
        // line 13
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        if ($this->getAttribute($_collector_, "hasexception")) {
            // line 14
            echo "            <span>1</span>
        ";
        }
        // line 16
        echo "    </span>
</span>
";
    }

    // line 20
    public function block_panel($context, array $blocks = array())
    {
        // line 21
        echo "    <h2>Exception</h2>

    ";
        // line 23
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        if ((!$this->getAttribute($_collector_, "hasexception"))) {
            // line 24
            echo "        <p>
            <em>No exception was thrown and uncaught during the request.</em>
        </p>
    ";
        } else {
            // line 28
            echo "        ";
            if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
            echo $this->env->getExtension('actions')->renderAction("WebProfilerBundle:Exception:show", array("exception" => $this->getAttribute($_collector_, "exception"), "format" => "html"), array());
            // line 29
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 24,  76 => 23,  59 => 14,  56 => 13,  47 => 9,  435 => 160,  432 => 159,  426 => 158,  423 => 157,  414 => 156,  409 => 155,  405 => 153,  402 => 152,  399 => 151,  396 => 150,  393 => 149,  383 => 147,  380 => 146,  377 => 145,  371 => 141,  368 => 140,  361 => 138,  350 => 131,  347 => 130,  343 => 129,  340 => 128,  335 => 125,  329 => 121,  326 => 120,  319 => 118,  311 => 114,  303 => 110,  294 => 105,  287 => 103,  283 => 101,  280 => 100,  275 => 97,  272 => 96,  267 => 93,  261 => 89,  254 => 87,  251 => 86,  246 => 83,  240 => 79,  233 => 77,  230 => 76,  219 => 69,  216 => 68,  212 => 67,  209 => 66,  204 => 63,  198 => 59,  195 => 58,  191 => 57,  188 => 56,  181 => 53,  173 => 48,  170 => 47,  167 => 46,  161 => 43,  158 => 42,  147 => 39,  139 => 35,  131 => 31,  113 => 24,  99 => 20,  91 => 19,  88 => 18,  85 => 28,  81 => 16,  77 => 15,  74 => 14,  50 => 10,  40 => 6,  36 => 5,  63 => 16,  60 => 9,  48 => 15,  46 => 14,  39 => 11,  37 => 8,  22 => 1,  184 => 54,  176 => 50,  172 => 49,  148 => 42,  137 => 41,  133 => 40,  120 => 27,  117 => 37,  115 => 36,  110 => 23,  107 => 32,  105 => 31,  101 => 29,  90 => 25,  87 => 24,  80 => 22,  70 => 14,  67 => 12,  57 => 16,  54 => 6,  51 => 14,  44 => 8,  32 => 4,  29 => 6,  392 => 163,  381 => 160,  376 => 159,  373 => 158,  367 => 157,  364 => 139,  356 => 135,  353 => 149,  346 => 145,  338 => 141,  330 => 137,  322 => 119,  314 => 115,  306 => 111,  298 => 107,  282 => 109,  274 => 105,  266 => 101,  258 => 88,  248 => 89,  245 => 88,  237 => 78,  234 => 82,  231 => 81,  225 => 73,  222 => 77,  217 => 74,  210 => 72,  200 => 70,  197 => 69,  185 => 64,  177 => 60,  169 => 48,  165 => 46,  162 => 53,  159 => 45,  149 => 49,  143 => 47,  138 => 46,  135 => 45,  132 => 44,  125 => 39,  122 => 41,  119 => 40,  116 => 25,  109 => 36,  104 => 21,  96 => 31,  92 => 29,  89 => 29,  86 => 27,  78 => 23,  75 => 22,  72 => 21,  69 => 20,  62 => 18,  55 => 13,  52 => 12,  49 => 11,  42 => 12,  38 => 5,  35 => 5,  33 => 4,  30 => 3,);
    }
}
