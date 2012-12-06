<?php

/* WebProfilerBundle:Profiler:toolbar.html.twig */
class __TwigTemplate_50f94525b12e45cfabc4e67f41b51d55 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- START of Symfony2 Web Debug Toolbar -->
";
        // line 2
        if (isset($context["position"])) { $_position_ = $context["position"]; } else { $_position_ = null; }
        if (("normal" != $_position_)) {
            // line 3
            echo "    ";
            if (isset($context["position"])) { $_position_ = $context["position"]; } else { $_position_ = null; }
            $this->env->loadTemplate("WebProfilerBundle:Profiler:toolbar_style.html.twig")->display(array_merge($context, array("position" => $_position_, "floatable" => true)));
            // line 4
            echo "    <div style=\"clear: both; height: 38px;\"></div>
";
        }
        // line 6
        echo "
<div class=\"sf-toolbarreset\">
    ";
        // line 8
        if (isset($context["templates"])) { $_templates_ = $context["templates"]; } else { $_templates_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_templates_);
        foreach ($context['_seq'] as $context["name"] => $context["template"]) {
            // line 9
            echo "        ";
            if (isset($context["template"])) { $_template_ = $context["template"]; } else { $_template_ = null; }
            if (isset($context["profile"])) { $_profile_ = $context["profile"]; } else { $_profile_ = null; }
            if (isset($context["name"])) { $_name_ = $context["name"]; } else { $_name_ = null; }
            if (isset($context["profiler_url"])) { $_profiler_url_ = $context["profiler_url"]; } else { $_profiler_url_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_template_, "renderblock", array(0 => "toolbar", 1 => array("collector" => $this->getAttribute($_profile_, "getcollector", array(0 => $_name_), "method"), "profiler_url" => $_profiler_url_, "token" => $this->getAttribute($_profile_, "token"), "name" => $_name_)), "method"), "html", null, true);
            // line 15
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['template'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 17
        echo "
    ";
        // line 18
        if (isset($context["position"])) { $_position_ = $context["position"]; } else { $_position_ = null; }
        if (("normal" != $_position_)) {
            // line 19
            echo "        <a class=\"hide-button\" title=\"Close Toolbar\" onclick=\"
            var p = this.parentNode;
            p.style.display = 'none';
            (p.previousElementSibling || p.previousSibling).style.display = 'none';
        \"></a>
    ";
        }
        // line 25
        echo "</div>
<!-- END of Symfony2 Web Debug Toolbar -->
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 3,  19 => 1,  168 => 64,  145 => 59,  103 => 38,  73 => 22,  65 => 18,  548 => 162,  542 => 161,  537 => 158,  529 => 155,  525 => 153,  521 => 151,  511 => 149,  504 => 148,  501 => 147,  496 => 146,  490 => 144,  487 => 143,  482 => 142,  472 => 134,  468 => 132,  465 => 131,  459 => 130,  454 => 129,  449 => 126,  443 => 122,  440 => 121,  436 => 120,  433 => 119,  428 => 116,  422 => 112,  419 => 111,  415 => 110,  412 => 109,  407 => 106,  389 => 103,  374 => 101,  358 => 97,  354 => 95,  320 => 86,  301 => 84,  286 => 80,  278 => 78,  270 => 77,  263 => 74,  255 => 73,  250 => 71,  238 => 69,  218 => 67,  194 => 65,  179 => 59,  134 => 50,  84 => 21,  58 => 10,  171 => 58,  163 => 63,  155 => 51,  123 => 42,  98 => 33,  203 => 70,  183 => 58,  180 => 57,  174 => 56,  153 => 61,  136 => 37,  130 => 35,  121 => 31,  102 => 28,  95 => 24,  66 => 13,  34 => 4,  31 => 3,  844 => 469,  841 => 468,  828 => 466,  823 => 465,  819 => 463,  806 => 462,  779 => 457,  776 => 456,  754 => 454,  736 => 453,  731 => 451,  726 => 450,  721 => 449,  716 => 448,  711 => 447,  706 => 446,  703 => 445,  700 => 444,  682 => 443,  671 => 442,  655 => 437,  648 => 435,  643 => 434,  640 => 433,  638 => 432,  624 => 431,  592 => 401,  571 => 398,  553 => 397,  550 => 396,  547 => 395,  539 => 393,  533 => 391,  276 => 138,  228 => 94,  199 => 87,  189 => 62,  152 => 50,  146 => 51,  124 => 32,  114 => 51,  106 => 39,  100 => 37,  97 => 42,  64 => 16,  45 => 7,  41 => 6,  28 => 3,  226 => 71,  202 => 88,  187 => 60,  175 => 81,  160 => 75,  157 => 56,  154 => 55,  111 => 32,  108 => 31,  83 => 28,  43 => 7,  208 => 69,  205 => 68,  190 => 67,  186 => 84,  182 => 64,  178 => 66,  150 => 60,  144 => 42,  129 => 51,  126 => 45,  94 => 41,  71 => 19,  68 => 23,  53 => 14,  27 => 3,  79 => 24,  76 => 17,  59 => 18,  56 => 17,  47 => 8,  435 => 160,  432 => 159,  426 => 158,  423 => 157,  414 => 156,  409 => 155,  405 => 153,  402 => 152,  399 => 151,  396 => 150,  393 => 105,  383 => 147,  380 => 146,  377 => 145,  371 => 141,  368 => 140,  361 => 98,  350 => 131,  347 => 91,  343 => 90,  340 => 128,  335 => 125,  329 => 89,  326 => 88,  319 => 118,  311 => 114,  303 => 110,  294 => 81,  287 => 103,  283 => 101,  280 => 100,  275 => 97,  272 => 96,  267 => 93,  261 => 89,  254 => 87,  251 => 86,  246 => 70,  240 => 79,  233 => 77,  230 => 68,  219 => 69,  216 => 68,  212 => 70,  209 => 67,  204 => 63,  198 => 62,  195 => 86,  191 => 57,  188 => 69,  181 => 53,  173 => 65,  170 => 54,  167 => 53,  161 => 58,  158 => 62,  147 => 43,  139 => 35,  131 => 49,  113 => 30,  99 => 26,  91 => 32,  88 => 18,  85 => 28,  81 => 19,  77 => 33,  74 => 14,  50 => 10,  40 => 6,  36 => 5,  63 => 15,  60 => 25,  48 => 7,  46 => 12,  39 => 11,  37 => 8,  22 => 2,  184 => 54,  176 => 50,  172 => 80,  148 => 47,  137 => 41,  133 => 44,  120 => 27,  117 => 36,  115 => 36,  110 => 23,  107 => 32,  105 => 28,  101 => 34,  90 => 25,  87 => 24,  80 => 23,  70 => 25,  67 => 16,  57 => 14,  54 => 6,  51 => 8,  44 => 7,  32 => 4,  29 => 4,  392 => 163,  381 => 160,  376 => 159,  373 => 158,  367 => 157,  364 => 99,  356 => 135,  353 => 149,  346 => 145,  338 => 141,  330 => 137,  322 => 119,  314 => 115,  306 => 85,  298 => 107,  282 => 109,  274 => 105,  266 => 101,  258 => 88,  248 => 89,  245 => 88,  237 => 78,  234 => 82,  231 => 95,  225 => 73,  222 => 77,  217 => 92,  210 => 89,  200 => 66,  197 => 66,  185 => 60,  177 => 60,  169 => 48,  165 => 46,  162 => 53,  159 => 53,  149 => 49,  143 => 50,  138 => 44,  135 => 52,  132 => 61,  125 => 46,  122 => 37,  119 => 44,  116 => 43,  109 => 40,  104 => 32,  96 => 28,  92 => 25,  89 => 28,  86 => 29,  78 => 21,  75 => 20,  72 => 15,  69 => 14,  62 => 19,  55 => 13,  52 => 10,  49 => 15,  42 => 9,  38 => 6,  35 => 5,  33 => 6,  30 => 3,);
    }
}
