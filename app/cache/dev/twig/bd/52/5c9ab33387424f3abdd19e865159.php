<?php

/* WebProfilerBundle:Collector:router.html.twig */
class __TwigTemplate_bd525c9ab33387424f3abdd19e865159 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");

        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
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
    public function block_toolbar($context, array $blocks = array())
    {
    }

    // line 6
    public function block_menu($context, array $blocks = array())
    {
        // line 7
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/routing.png"), "html", null, true);
        echo "\" alt=\"Routing\" /></span>
    <strong>Routing</strong>
</span>
";
    }

    // line 13
    public function block_panel($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        if (isset($context["token"])) { $_token_ = $context["token"]; } else { $_token_ = null; }
        echo $this->env->getExtension('actions')->renderAction("WebProfilerBundle:Router:panel", array("token" => $_token_), array());
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  31 => 4,  844 => 469,  841 => 468,  828 => 466,  823 => 465,  819 => 463,  806 => 462,  779 => 457,  776 => 456,  754 => 454,  736 => 453,  731 => 451,  726 => 450,  721 => 449,  716 => 448,  711 => 447,  706 => 446,  703 => 445,  700 => 444,  682 => 443,  671 => 442,  655 => 437,  648 => 435,  643 => 434,  640 => 433,  638 => 432,  624 => 431,  592 => 401,  571 => 398,  553 => 397,  550 => 396,  547 => 395,  539 => 393,  533 => 391,  276 => 138,  228 => 94,  199 => 87,  189 => 85,  152 => 73,  146 => 71,  124 => 57,  114 => 51,  106 => 45,  100 => 43,  97 => 42,  64 => 27,  45 => 10,  41 => 8,  28 => 3,  226 => 71,  202 => 88,  187 => 60,  175 => 81,  160 => 75,  157 => 74,  154 => 56,  111 => 35,  108 => 34,  83 => 35,  43 => 7,  208 => 69,  205 => 68,  190 => 67,  186 => 84,  182 => 64,  178 => 82,  150 => 55,  144 => 54,  129 => 51,  126 => 45,  94 => 41,  71 => 30,  68 => 23,  53 => 14,  27 => 3,  79 => 24,  76 => 23,  59 => 16,  56 => 12,  47 => 9,  435 => 160,  432 => 159,  426 => 158,  423 => 157,  414 => 156,  409 => 155,  405 => 153,  402 => 152,  399 => 151,  396 => 150,  393 => 149,  383 => 147,  380 => 146,  377 => 145,  371 => 141,  368 => 140,  361 => 138,  350 => 131,  347 => 130,  343 => 129,  340 => 128,  335 => 125,  329 => 121,  326 => 120,  319 => 118,  311 => 114,  303 => 110,  294 => 105,  287 => 103,  283 => 101,  280 => 100,  275 => 97,  272 => 96,  267 => 93,  261 => 89,  254 => 87,  251 => 86,  246 => 83,  240 => 79,  233 => 77,  230 => 73,  219 => 69,  216 => 68,  212 => 70,  209 => 67,  204 => 63,  198 => 62,  195 => 86,  191 => 57,  188 => 56,  181 => 53,  173 => 48,  170 => 47,  167 => 77,  161 => 58,  158 => 42,  147 => 39,  139 => 35,  131 => 31,  113 => 41,  99 => 36,  91 => 40,  88 => 18,  85 => 28,  81 => 32,  77 => 33,  74 => 14,  50 => 10,  40 => 6,  36 => 5,  63 => 15,  60 => 25,  48 => 11,  46 => 12,  39 => 11,  37 => 5,  22 => 1,  184 => 54,  176 => 50,  172 => 80,  148 => 42,  137 => 41,  133 => 40,  120 => 27,  117 => 52,  115 => 36,  110 => 23,  107 => 32,  105 => 31,  101 => 31,  90 => 25,  87 => 24,  80 => 34,  70 => 14,  67 => 16,  57 => 24,  54 => 6,  51 => 22,  44 => 8,  32 => 6,  29 => 6,  392 => 163,  381 => 160,  376 => 159,  373 => 158,  367 => 157,  364 => 139,  356 => 135,  353 => 149,  346 => 145,  338 => 141,  330 => 137,  322 => 119,  314 => 115,  306 => 111,  298 => 107,  282 => 109,  274 => 105,  266 => 101,  258 => 88,  248 => 89,  245 => 88,  237 => 78,  234 => 82,  231 => 95,  225 => 73,  222 => 77,  217 => 92,  210 => 89,  200 => 70,  197 => 69,  185 => 64,  177 => 60,  169 => 48,  165 => 46,  162 => 53,  159 => 45,  149 => 49,  143 => 47,  138 => 53,  135 => 52,  132 => 61,  125 => 39,  122 => 44,  119 => 40,  116 => 42,  109 => 39,  104 => 32,  96 => 28,  92 => 29,  89 => 25,  86 => 24,  78 => 21,  75 => 20,  72 => 19,  69 => 20,  62 => 18,  55 => 13,  52 => 14,  49 => 13,  42 => 12,  38 => 7,  35 => 6,  33 => 4,  30 => 3,);
    }
}
