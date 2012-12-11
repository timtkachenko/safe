<?php

/* WebProfilerBundle:Collector:events.html.twig */
class __TwigTemplate_ab3273ade150516c9207ee78fa3e0ef4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");

        $this->blocks = array(
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
            'panelContent' => array($this, 'block_panelContent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebProfilerBundle:Profiler:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["__internal_f85bc735069170ee7881ef6f78d470bcdfe9e65f"] = $this;
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/events.png"), "html", null, true);
        echo "\" alt=\"Events\" /></span>
    <strong>Events</strong>
</span>
";
    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        if (twig_length_filter($this->env, $this->getAttribute($_collector_, "calledlisteners"))) {
            // line 14
            echo "        ";
            $this->displayBlock("panelContent", $context, $blocks);
            echo "
    ";
        } else {
            // line 16
            echo "        <h2>Events</h2>
        <p>
            <em>No events have been recorded. Are you sure that debugging is enabled in the kernel?</em>
        </p>
    ";
        }
    }

    // line 23
    public function block_panelContent($context, array $blocks = array())
    {
        // line 24
        echo "    <h2>Called Listeners</h2>

    <table>
        <tr>
            <th>Event name</th>
            <th>Priority</th>
            <th>Listener</th>
        </tr>
        ";
        // line 32
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_collector_, "calledlisteners"));
        foreach ($context['_seq'] as $context["_key"] => $context["listener"]) {
            // line 33
            echo "            <tr>
                <td><code>";
            // line 34
            if (isset($context["listener"])) { $_listener_ = $context["listener"]; } else { $_listener_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_listener_, "event"), "html", null, true);
            echo "</code></td>
                <td><code>";
            // line 35
            if (isset($context["listener"])) { $_listener_ = $context["listener"]; } else { $_listener_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_listener_, "priority"), "html", null, true);
            echo "</code></td>
                <td><code>";
            // line 36
            if (isset($context["listener"])) { $_listener_ = $context["listener"]; } else { $_listener_ = null; }
            echo $context["__internal_f85bc735069170ee7881ef6f78d470bcdfe9e65f"]->getdisplay_listener($_listener_);
            echo "</code></td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listener'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 39
        echo "    </table>

    ";
        // line 41
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        if ($this->getAttribute($_collector_, "notcalledlisteners")) {
            // line 42
            echo "        <h2>Not Called Listeners</h2>

        <table>
            <tr>
                <th>Event name</th>
                <th>Priority</th>
                <th>Listener</th>
            </tr>
            ";
            // line 50
            if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
            $context["listeners"] = $this->getAttribute($_collector_, "notcalledlisteners");
            // line 51
            echo "            ";
            if (isset($context["listeners"])) { $_listeners_ = $context["listeners"]; } else { $_listeners_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_sort_filter(twig_get_array_keys_filter($_listeners_)));
            foreach ($context['_seq'] as $context["_key"] => $context["listener"]) {
                // line 52
                echo "                <tr>
                    <td><code>";
                // line 53
                if (isset($context["listeners"])) { $_listeners_ = $context["listeners"]; } else { $_listeners_ = null; }
                if (isset($context["listener"])) { $_listener_ = $context["listener"]; } else { $_listener_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_listeners_, $_listener_, array(), "array"), "event"), "html", null, true);
                echo "</code></td>
                    <td><code>";
                // line 54
                if (isset($context["listeners"])) { $_listeners_ = $context["listeners"]; } else { $_listeners_ = null; }
                if (isset($context["listener"])) { $_listener_ = $context["listener"]; } else { $_listener_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_listeners_, $_listener_, array(), "array"), "priority"), "html", null, true);
                echo "</code></td>
                    <td><code>";
                // line 55
                if (isset($context["listeners"])) { $_listeners_ = $context["listeners"]; } else { $_listeners_ = null; }
                if (isset($context["listener"])) { $_listener_ = $context["listener"]; } else { $_listener_ = null; }
                echo $context["__internal_f85bc735069170ee7881ef6f78d470bcdfe9e65f"]->getdisplay_listener($this->getAttribute($_listeners_, $_listener_, array(), "array"));
                echo "</code></td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listener'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 58
            echo "        </table>
    ";
        }
    }

    // line 62
    public function getdisplay_listener($_listener = null)
    {
        $context = $this->env->mergeGlobals(array(
            "listener" => $_listener,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 63
            echo "    ";
            if (isset($context["listener"])) { $_listener_ = $context["listener"]; } else { $_listener_ = null; }
            if (($this->getAttribute($_listener_, "type") == "Closure")) {
                // line 64
                echo "        Closure
    ";
            } elseif (($this->getAttribute($_listener_, "type") == "Function")) {
                // line 66
                echo "        ";
                if (isset($context["listener"])) { $_listener_ = $context["listener"]; } else { $_listener_ = null; }
                $context["link"] = $this->env->getExtension('code')->getFileLink($this->getAttribute($_listener_, "file"), $this->getAttribute($_listener_, "line"));
                // line 67
                echo "        ";
                if (isset($context["link"])) { $_link_ = $context["link"]; } else { $_link_ = null; }
                if ($_link_) {
                    echo "<a href=\"";
                    if (isset($context["link"])) { $_link_ = $context["link"]; } else { $_link_ = null; }
                    echo twig_escape_filter($this->env, $_link_, "html", null, true);
                    echo "\">";
                    if (isset($context["listener"])) { $_listener_ = $context["listener"]; } else { $_listener_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_listener_, "function"), "html", null, true);
                    echo "</a>";
                } else {
                    if (isset($context["listener"])) { $_listener_ = $context["listener"]; } else { $_listener_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_listener_, "function"), "html", null, true);
                }
                // line 68
                echo "    ";
            } elseif (($this->getAttribute($_listener_, "type") == "Method")) {
                // line 69
                echo "        ";
                if (isset($context["listener"])) { $_listener_ = $context["listener"]; } else { $_listener_ = null; }
                $context["link"] = $this->env->getExtension('code')->getFileLink($this->getAttribute($_listener_, "file"), $this->getAttribute($_listener_, "line"));
                // line 70
                echo "        ";
                if (isset($context["listener"])) { $_listener_ = $context["listener"]; } else { $_listener_ = null; }
                echo $this->env->getExtension('code')->abbrClass($this->getAttribute($_listener_, "class"));
                echo "::";
                if (isset($context["link"])) { $_link_ = $context["link"]; } else { $_link_ = null; }
                if ($_link_) {
                    echo "<a href=\"";
                    if (isset($context["link"])) { $_link_ = $context["link"]; } else { $_link_ = null; }
                    echo twig_escape_filter($this->env, $_link_, "html", null, true);
                    echo "\">";
                    if (isset($context["listener"])) { $_listener_ = $context["listener"]; } else { $_listener_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_listener_, "method"), "html", null, true);
                    echo "</a>";
                } else {
                    if (isset($context["listener"])) { $_listener_ = $context["listener"]; } else { $_listener_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_listener_, "method"), "html", null, true);
                }
                // line 71
                echo "    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:events.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  208 => 69,  205 => 68,  190 => 67,  186 => 66,  182 => 64,  178 => 63,  150 => 55,  144 => 54,  129 => 51,  126 => 50,  94 => 35,  71 => 24,  68 => 23,  53 => 14,  27 => 3,  79 => 24,  76 => 23,  59 => 16,  56 => 13,  47 => 9,  435 => 160,  432 => 159,  426 => 158,  423 => 157,  414 => 156,  409 => 155,  405 => 153,  402 => 152,  399 => 151,  396 => 150,  393 => 149,  383 => 147,  380 => 146,  377 => 145,  371 => 141,  368 => 140,  361 => 138,  350 => 131,  347 => 130,  343 => 129,  340 => 128,  335 => 125,  329 => 121,  326 => 120,  319 => 118,  311 => 114,  303 => 110,  294 => 105,  287 => 103,  283 => 101,  280 => 100,  275 => 97,  272 => 96,  267 => 93,  261 => 89,  254 => 87,  251 => 86,  246 => 83,  240 => 79,  233 => 77,  230 => 71,  219 => 69,  216 => 68,  212 => 70,  209 => 66,  204 => 63,  198 => 59,  195 => 58,  191 => 57,  188 => 56,  181 => 53,  173 => 48,  170 => 47,  167 => 62,  161 => 58,  158 => 42,  147 => 39,  139 => 35,  131 => 31,  113 => 41,  99 => 36,  91 => 19,  88 => 18,  85 => 28,  81 => 32,  77 => 15,  74 => 14,  50 => 10,  40 => 6,  36 => 5,  63 => 16,  60 => 9,  48 => 15,  46 => 12,  39 => 11,  37 => 8,  22 => 1,  184 => 54,  176 => 50,  172 => 49,  148 => 42,  137 => 41,  133 => 40,  120 => 27,  117 => 37,  115 => 36,  110 => 23,  107 => 32,  105 => 31,  101 => 29,  90 => 25,  87 => 24,  80 => 22,  70 => 14,  67 => 12,  57 => 16,  54 => 6,  51 => 14,  44 => 8,  32 => 5,  29 => 6,  392 => 163,  381 => 160,  376 => 159,  373 => 158,  367 => 157,  364 => 139,  356 => 135,  353 => 149,  346 => 145,  338 => 141,  330 => 137,  322 => 119,  314 => 115,  306 => 111,  298 => 107,  282 => 109,  274 => 105,  266 => 101,  258 => 88,  248 => 89,  245 => 88,  237 => 78,  234 => 82,  231 => 81,  225 => 73,  222 => 77,  217 => 74,  210 => 72,  200 => 70,  197 => 69,  185 => 64,  177 => 60,  169 => 48,  165 => 46,  162 => 53,  159 => 45,  149 => 49,  143 => 47,  138 => 53,  135 => 52,  132 => 44,  125 => 39,  122 => 41,  119 => 40,  116 => 42,  109 => 39,  104 => 21,  96 => 31,  92 => 29,  89 => 34,  86 => 33,  78 => 23,  75 => 22,  72 => 21,  69 => 20,  62 => 18,  55 => 13,  52 => 12,  49 => 13,  42 => 12,  38 => 7,  35 => 6,  33 => 4,  30 => 3,);
    }
}
