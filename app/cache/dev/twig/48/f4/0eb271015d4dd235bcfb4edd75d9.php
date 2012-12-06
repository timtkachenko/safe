<?php

/* SecurityBundle:Collector:security.html.twig */
class __TwigTemplate_48f40eb271015d4dd235bcfb4edd75d9 extends Twig_Template
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
        // line 4
        echo "    ";
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        if ($this->getAttribute($_collector_, "user")) {
            // line 5
            echo "        ";
            if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
            $context["color_code"] = ((($this->getAttribute($_collector_, "enabled") && $this->getAttribute($_collector_, "authenticated"))) ? ("green") : ("yellow"));
            // line 6
            echo "        ";
            if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
            $context["authentication_color_code"] = ((($this->getAttribute($_collector_, "enabled") && $this->getAttribute($_collector_, "authenticated"))) ? ("green") : ("red"));
            // line 7
            echo "        ";
            if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
            $context["authentication_color_text"] = ((($this->getAttribute($_collector_, "enabled") && $this->getAttribute($_collector_, "authenticated"))) ? ("Yes") : ("No"));
            // line 8
            echo "    ";
        } else {
            // line 9
            echo "        ";
            if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
            $context["color_code"] = (($this->getAttribute($_collector_, "enabled")) ? ("red") : ("black"));
            // line 10
            echo "    ";
        }
        // line 11
        echo "    ";
        ob_start();
        // line 12
        echo "        ";
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        if ($this->getAttribute($_collector_, "user")) {
            // line 13
            echo "            <div class=\"sf-toolbar-info-piece\">
                <b>Logged in as</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-";
            // line 15
            if (isset($context["color_code"])) { $_color_code_ = $context["color_code"]; } else { $_color_code_ = null; }
            echo twig_escape_filter($this->env, $_color_code_, "html", null, true);
            echo "\">";
            if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_collector_, "user"), "html", null, true);
            echo "</span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Authenticated</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-";
            // line 19
            if (isset($context["authentication_color_code"])) { $_authentication_color_code_ = $context["authentication_color_code"]; } else { $_authentication_color_code_ = null; }
            echo twig_escape_filter($this->env, $_authentication_color_code_, "html", null, true);
            echo "\">";
            if (isset($context["authentication_color_text"])) { $_authentication_color_text_ = $context["authentication_color_text"]; } else { $_authentication_color_text_ = null; }
            echo twig_escape_filter($this->env, $_authentication_color_text_, "html", null, true);
            echo "</span>
            </div>
        ";
        } elseif ($this->getAttribute($_collector_, "enabled")) {
            // line 22
            echo "            You are not authenticated.
        ";
        } else {
            // line 24
            echo "            The security is disabled.
        ";
        }
        // line 26
        echo "    ";
        $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 27
        echo "    ";
        ob_start();
        // line 28
        echo "        <img width=\"24\" height=\"28\" alt=\"Security\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAcCAYAAAB75n/uAAAC70lEQVR42u2V3UtTYRzHu+mFwCwK+gO6CEryPlg7yiYx50vDqUwjFIZDSYUk2ZTmCysHvg9ZVggOQZiRScsR4VwXTjEwdKZWk8o6gd5UOt0mbev7g/PAkLONIOkiBx+25/v89vuc85zn2Q5Fo9F95UDwnwhS5HK5TyqVRv8m1JN6k+AiC+fn54cwbgFNIrTQ/J9IqDcJJDGBHsgDgYBSq9W6ysvLPf39/SSUUU7zsQ1yc3MjmN90OBzfRkZG1umzQqGIxPSTkIBjgdDkaGNjoza2kcFgUCE/QvMsq6io2PV6vQu1tbV8Xl7etkql2qqvr/+MbDE/Pz8s9OP2Cjhwwmw29+4R3Kec1WZnZ4fn5uamc3Jyttra2qbH8ero6JgdHh5+CvFHq9X6JZHgzODgoCVW0NPTY0N+ltU2Nzdv4GqXsYSrPp+vDw80aLFYxru6uhyQ/rDb7a8TCVJDodB1jUazTVlxcXGQ5/mbyE+z2u7u7veY38BVT3Z2djopm5qa6isrK/tQWVn5qb29fSGR4DC4PDAwMEsZHuArjGnyGKutq6v7ajQaF6urq9/MzMz0QuSemJiwQDwGkR0POhhXgILjNTU1TaWlpTxlOp1uyWQyaUjMajMzM8Nut/tJQUHBOpZppbCwkM/KytrBznuL9xDVxBMo8KXHYnu6qKjIivmrbIy67x6Px4Yd58W672ApfzY0NCyNjo7OZmRkiAv8fr+O47iwmABXtoXaG3uykF6vX7bZbF6cgZWqqiqezYkKcNtmjO+CF2AyhufgjsvlMiU7vXEF+4C4ALf9CwdrlVAqlcFkTdRqdQSHLUDgBEeSCrArAsiGwENs0XfJBE6ncxm1D8Aj/B6tigkkJSUlmxSwLYhMDeRsyyUCd+lHrWxtbe2aTCbbZTn1ZD92F0Cr8GBfgnsgDZwDt8EzMBmHMXBLqD0PDMAh9Gql3iRIESQSIAXp4CRIBZeEjIvDFZAm1J4C6UK9ROiZcvCn/+8FvwHtDdJEaRY+oQAAAABJRU5ErkJggg==\" />
        <span class=\"sf-toolbar-status sf-toolbar-status-";
        // line 29
        if (isset($context["color_code"])) { $_color_code_ = $context["color_code"]; } else { $_color_code_ = null; }
        echo twig_escape_filter($this->env, $_color_code_, "html", null, true);
        echo "\"></span>
        ";
        // line 30
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        if ($this->getAttribute($_collector_, "user")) {
            echo "<div class=\"sf-toolbar-status sf-toolbar-info-piece-additional\">";
            if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_collector_, "user"), "html", null, true);
            echo "</div>";
        }
        // line 31
        echo "    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 32
        echo "    ";
        if (isset($context["profiler_url"])) { $_profiler_url_ = $context["profiler_url"]; } else { $_profiler_url_ = null; }
        $this->env->loadTemplate("WebProfilerBundle:Profiler:toolbar_item.html.twig")->display(array_merge($context, array("link" => $_profiler_url_)));
    }

    // line 35
    public function block_menu($context, array $blocks = array())
    {
        // line 36
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/security.png"), "html", null, true);
        echo "\" alt=\"\" /></span>
    <strong>Security</strong>
</span>
";
    }

    // line 42
    public function block_panel($context, array $blocks = array())
    {
        // line 43
        echo "    <h2>Security</h2>
    ";
        // line 44
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        if ($this->getAttribute($_collector_, "user")) {
            // line 45
            echo "        <table>
            <tr>
                <th>Username</th>
                <td>";
            // line 48
            if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_collector_, "user"), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <th>Authenticated?</th>
                <td>
                    ";
            // line 53
            if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
            if ($this->getAttribute($_collector_, "authenticated")) {
                // line 54
                echo "                        yes
                    ";
            } else {
                // line 56
                echo "                        no ";
                if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
                if ((!twig_length_filter($this->env, $this->getAttribute($_collector_, "roles")))) {
                    echo "<em>(probably because the user has no roles)</em>";
                }
                // line 57
                echo "                    ";
            }
            // line 58
            echo "                </td>
            </tr>
            <tr>
                <th>Roles</th>
                <td>";
            // line 62
            if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('yaml')->encode($this->getAttribute($_collector_, "roles")), "html", null, true);
            echo "</td>
            </tr>
        </table>
    ";
        } elseif ($this->getAttribute($_collector_, "enabled")) {
            // line 66
            echo "        <p>
            <em>No token</em>
        </p>
    ";
        } else {
            // line 70
            echo "        <p>
            <em>The security component is disabled</em>
        </p>
    ";
        }
    }

    public function getTemplateName()
    {
        return "SecurityBundle:Collector:security.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  203 => 70,  183 => 58,  180 => 57,  174 => 56,  153 => 45,  136 => 37,  130 => 35,  121 => 31,  102 => 27,  95 => 24,  66 => 13,  34 => 5,  31 => 4,  844 => 469,  841 => 468,  828 => 466,  823 => 465,  819 => 463,  806 => 462,  779 => 457,  776 => 456,  754 => 454,  736 => 453,  731 => 451,  726 => 450,  721 => 449,  716 => 448,  711 => 447,  706 => 446,  703 => 445,  700 => 444,  682 => 443,  671 => 442,  655 => 437,  648 => 435,  643 => 434,  640 => 433,  638 => 432,  624 => 431,  592 => 401,  571 => 398,  553 => 397,  550 => 396,  547 => 395,  539 => 393,  533 => 391,  276 => 138,  228 => 94,  199 => 87,  189 => 62,  152 => 73,  146 => 71,  124 => 32,  114 => 51,  106 => 45,  100 => 43,  97 => 42,  64 => 27,  45 => 7,  41 => 6,  28 => 3,  226 => 71,  202 => 88,  187 => 60,  175 => 81,  160 => 75,  157 => 74,  154 => 56,  111 => 35,  108 => 29,  83 => 35,  43 => 7,  208 => 69,  205 => 68,  190 => 67,  186 => 84,  182 => 64,  178 => 82,  150 => 44,  144 => 42,  129 => 51,  126 => 45,  94 => 41,  71 => 30,  68 => 23,  53 => 14,  27 => 3,  79 => 24,  76 => 23,  59 => 11,  56 => 10,  47 => 9,  435 => 160,  432 => 159,  426 => 158,  423 => 157,  414 => 156,  409 => 155,  405 => 153,  402 => 152,  399 => 151,  396 => 150,  393 => 149,  383 => 147,  380 => 146,  377 => 145,  371 => 141,  368 => 140,  361 => 138,  350 => 131,  347 => 130,  343 => 129,  340 => 128,  335 => 125,  329 => 121,  326 => 120,  319 => 118,  311 => 114,  303 => 110,  294 => 105,  287 => 103,  283 => 101,  280 => 100,  275 => 97,  272 => 96,  267 => 93,  261 => 89,  254 => 87,  251 => 86,  246 => 83,  240 => 79,  233 => 77,  230 => 73,  219 => 69,  216 => 68,  212 => 70,  209 => 67,  204 => 63,  198 => 62,  195 => 86,  191 => 57,  188 => 56,  181 => 53,  173 => 48,  170 => 54,  167 => 53,  161 => 58,  158 => 48,  147 => 43,  139 => 35,  131 => 31,  113 => 30,  99 => 26,  91 => 22,  88 => 18,  85 => 28,  81 => 19,  77 => 33,  74 => 14,  50 => 10,  40 => 6,  36 => 5,  63 => 15,  60 => 25,  48 => 11,  46 => 12,  39 => 11,  37 => 5,  22 => 1,  184 => 54,  176 => 50,  172 => 80,  148 => 42,  137 => 41,  133 => 36,  120 => 27,  117 => 52,  115 => 36,  110 => 23,  107 => 32,  105 => 28,  101 => 31,  90 => 25,  87 => 24,  80 => 34,  70 => 15,  67 => 16,  57 => 24,  54 => 6,  51 => 22,  44 => 8,  32 => 6,  29 => 6,  392 => 163,  381 => 160,  376 => 159,  373 => 158,  367 => 157,  364 => 139,  356 => 135,  353 => 149,  346 => 145,  338 => 141,  330 => 137,  322 => 119,  314 => 115,  306 => 111,  298 => 107,  282 => 109,  274 => 105,  266 => 101,  258 => 88,  248 => 89,  245 => 88,  237 => 78,  234 => 82,  231 => 95,  225 => 73,  222 => 77,  217 => 92,  210 => 89,  200 => 70,  197 => 66,  185 => 64,  177 => 60,  169 => 48,  165 => 46,  162 => 53,  159 => 45,  149 => 49,  143 => 47,  138 => 53,  135 => 52,  132 => 61,  125 => 39,  122 => 44,  119 => 40,  116 => 42,  109 => 39,  104 => 32,  96 => 28,  92 => 29,  89 => 25,  86 => 24,  78 => 21,  75 => 20,  72 => 19,  69 => 20,  62 => 12,  55 => 13,  52 => 9,  49 => 8,  42 => 12,  38 => 7,  35 => 6,  33 => 4,  30 => 3,);
    }
}
