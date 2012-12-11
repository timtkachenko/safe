<?php

/* WebProfilerBundle:Profiler:base_js.html.twig */
class __TwigTemplate_cc86b1526fc3cea692a45de4cb24e880 extends Twig_Template
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
        echo "<script type=\"text/javascript\">/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},
            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },
            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },
            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },
            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            };

        return {
            hasClass: hasClass,
            removeClass: removeClass,
            addClass: addClass,
            request: request,
            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },
            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }

        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  64 => 21,  54 => 15,  50 => 7,  27 => 3,  104 => 19,  91 => 16,  80 => 15,  63 => 13,  58 => 12,  52 => 11,  40 => 7,  125 => 24,  113 => 21,  110 => 20,  105 => 19,  97 => 18,  92 => 17,  89 => 16,  85 => 14,  47 => 7,  45 => 12,  37 => 4,  28 => 4,  25 => 2,  22 => 2,  250 => 96,  240 => 90,  236 => 88,  229 => 84,  225 => 83,  220 => 80,  218 => 79,  215 => 78,  212 => 77,  209 => 76,  203 => 72,  200 => 71,  194 => 67,  183 => 63,  179 => 61,  176 => 60,  173 => 59,  166 => 55,  162 => 54,  157 => 51,  155 => 50,  151 => 48,  148 => 47,  145 => 46,  139 => 45,  133 => 44,  128 => 43,  118 => 22,  114 => 20,  109 => 31,  87 => 28,  84 => 27,  69 => 9,  65 => 14,  62 => 22,  41 => 15,  34 => 6,  19 => 1,  94 => 39,  88 => 6,  81 => 12,  79 => 26,  59 => 8,  48 => 14,  39 => 8,  35 => 7,  31 => 5,  26 => 4,  21 => 1,  49 => 14,  46 => 9,  32 => 4,  29 => 3,);
    }
}
