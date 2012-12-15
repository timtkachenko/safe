<?php

/* NXCSafeBundle::layout.html.twig */
class __TwigTemplate_193b2e36517ae77fcdad5d5137b104c4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'content_header' => array($this, 'block_content_header'),
            'content_header_more' => array($this, 'block_content_header_more'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" sizes=\"16x16\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmedemo/css/demo.css"), "html", null, true);
        echo "\" />
        <link href=\"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css\" type=\"text/css\" rel=\"stylesheet\" />
        ";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 15
        echo "
        ";
        // line 16
        $this->displayBlock('javascripts', $context, $blocks);
        // line 23
        echo "    </head>
    <body>
        <div>
            ";
        // line 26
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 27
            echo "                ";
            if (isset($context["app"])) { $_app_ = $context["app"]; } else { $_app_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute($_app_, "user"), "username")), "FOSUserBundle"), "html", null, true);
            echo " |
                <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_logout"), "html", null, true);
            echo "\">
                    ";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html", null, true);
            echo "
                </a>
            ";
        } else {
            // line 32
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_login"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.login", array(), "FOSUserBundle"), "html", null, true);
            echo "</a>
            ";
        }
        // line 34
        echo "        </div>
        <div id=\"symfony-wrapper\">
            <div id=\"symfony-header\">
                <a href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_welcome"), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmedemo/images/logo.gif"), "html", null, true);
        echo "\" alt=\"Symfony logo\" />
                </a>
                <form id=\"symfony-search\" method=\"GET\" action=\"http://symfony.com/search\">
                    <label for=\"symfony-search-field\"><span>Search on Symfony Website</span></label>
                    <input name=\"q\" id=\"symfony-search-field\" type=\"search\" placeholder=\"Search on Symfony website\" class=\"medium_txt\" />
                    <input type=\"submit\" class=\"symfony-button-grey\" value=\"OK\" />
                </form>
            </div>

            ";
        // line 47
        if (isset($context["app"])) { $_app_ = $context["app"]; } else { $_app_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($_app_, "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 48
            echo "                <div class=\"flash-message\">
                    <em>Notice</em>: ";
            // line 49
            if (isset($context["flashMessage"])) { $_flashMessage_ = $context["flashMessage"]; } else { $_flashMessage_ = null; }
            echo twig_escape_filter($this->env, $_flashMessage_, "html", null, true);
            echo "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 52
        echo "
            ";
        // line 53
        $this->displayBlock('content_header', $context, $blocks);
        // line 64
        echo "
            <div class=\"symfony-content\">
                ";
        // line 66
        $this->displayBlock('content', $context, $blocks);
        // line 68
        echo "            </div>

            ";
        // line 70
        if (array_key_exists("code", $context)) {
            // line 71
            echo "                <h2>Code behind this page</h2>
                <div class=\"symfony-content\">";
            // line 72
            if (isset($context["code"])) { $_code_ = $context["code"]; } else { $_code_ = null; }
            echo $_code_;
            echo "</div>
            ";
        }
        // line 74
        echo "        </div>
    </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Demo Bundle";
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "            <!-- jQuery code -->
            <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/themes/redmond/jquery-ui-1.9.2.custom.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
            <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/yptjqgrid/css/ui.jqgrid.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
            <!-- base application asset -->
        ";
    }

    // line 16
    public function block_javascripts($context, array $blocks = array())
    {
        // line 17
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/jquery-1.8.3.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/jquery-ui-1.9.2.custom.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/jquery-ui-i18n.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/yptjqgrid/js/i18n/grid.locale-en.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/yptjqgrid/js/jquery.jqGrid.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        ";
    }

    // line 53
    public function block_content_header($context, array $blocks = array())
    {
        // line 54
        echo "                <ul id=\"menu\">
                    ";
        // line 55
        $this->displayBlock('content_header_more', $context, $blocks);
        // line 58
        echo "                </ul>

                <div style=\"clear: both\"></div>
                ";
        // line 61
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 63
        echo "            ";
    }

    // line 55
    public function block_content_header_more($context, array $blocks = array())
    {
        // line 56
        echo "                        <li><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("nxc_safe_homepage"), "html", null, true);
        echo "\">Demo Home</a></li>
                    ";
    }

    // line 61
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 62
        echo "                ";
    }

    // line 66
    public function block_content($context, array $blocks = array())
    {
        // line 67
        echo "                ";
    }

    public function getTemplateName()
    {
        return "NXCSafeBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 67,  239 => 66,  235 => 62,  232 => 61,  225 => 56,  222 => 55,  218 => 63,  216 => 61,  211 => 58,  209 => 55,  206 => 54,  203 => 53,  197 => 21,  193 => 20,  189 => 19,  185 => 18,  180 => 17,  177 => 16,  170 => 12,  166 => 11,  163 => 10,  160 => 9,  154 => 5,  148 => 74,  142 => 72,  139 => 71,  137 => 70,  133 => 68,  131 => 66,  127 => 64,  125 => 53,  122 => 52,  112 => 49,  109 => 48,  104 => 47,  92 => 38,  88 => 37,  83 => 34,  75 => 32,  69 => 29,  65 => 28,  59 => 27,  57 => 26,  52 => 23,  50 => 16,  47 => 15,  45 => 9,  40 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
