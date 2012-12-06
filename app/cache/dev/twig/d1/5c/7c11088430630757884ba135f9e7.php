<?php

/* TwigBundle:Exception:logs.html.twig */
class __TwigTemplate_d15c7c11088430630757884ba135f9e7 extends Twig_Template
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
        echo "<ol class=\"traces logs\">
    ";
        // line 2
        if (isset($context["logs"])) { $_logs_ = $context["logs"]; } else { $_logs_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_logs_);
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 3
            echo "        <li";
            if (isset($context["log"])) { $_log_ = $context["log"]; } else { $_log_ = null; }
            if (($this->getAttribute($_log_, "priority") >= 400)) {
                echo " class=\"error\"";
            } elseif (($this->getAttribute($_log_, "priority") >= 300)) {
                echo " class=\"warning\"";
            }
            echo ">
            ";
            // line 4
            if (isset($context["log"])) { $_log_ = $context["log"]; } else { $_log_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_log_, "priorityName"), "html", null, true);
            echo " - ";
            if (isset($context["log"])) { $_log_ = $context["log"]; } else { $_log_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_log_, "message"), "html", null, true);
            echo "
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 7
        echo "</ol>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:logs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 7,  27 => 3,  104 => 19,  91 => 16,  80 => 15,  63 => 13,  58 => 12,  52 => 11,  125 => 24,  113 => 21,  110 => 20,  105 => 19,  97 => 18,  92 => 17,  89 => 16,  85 => 14,  47 => 7,  45 => 6,  37 => 4,  25 => 3,  22 => 2,  250 => 96,  240 => 90,  236 => 88,  229 => 84,  225 => 83,  220 => 80,  218 => 79,  215 => 78,  212 => 77,  209 => 76,  203 => 72,  200 => 71,  194 => 67,  183 => 63,  179 => 61,  176 => 60,  173 => 59,  166 => 55,  162 => 54,  157 => 51,  155 => 50,  151 => 48,  148 => 47,  145 => 46,  139 => 45,  133 => 44,  128 => 43,  118 => 22,  114 => 20,  109 => 31,  87 => 28,  84 => 27,  69 => 9,  65 => 14,  62 => 22,  41 => 15,  19 => 1,  94 => 39,  88 => 6,  81 => 12,  79 => 26,  59 => 8,  48 => 14,  39 => 8,  35 => 7,  26 => 4,  21 => 1,  49 => 10,  32 => 4,  29 => 3,  60 => 14,  54 => 12,  46 => 9,  40 => 7,  34 => 5,  31 => 6,  28 => 4,);
    }
}
