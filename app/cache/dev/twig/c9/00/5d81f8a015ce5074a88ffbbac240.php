<?php

/* YptJqGridBundle::blocks.html.twig */
class __TwigTemplate_c9005d81f8a015ce5074a88ffbbac240 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'jqgrid_definition' => array($this, 'block_jqgrid_definition'),
            'jqgrid_html' => array($this, 'block_jqgrid_html'),
            'jqgrid_js' => array($this, 'block_jqgrid_js'),
            'jqgrid' => array($this, 'block_jqgrid'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('jqgrid_definition', $context, $blocks);
        // line 73
        echo "


";
        // line 76
        $this->displayBlock('jqgrid_html', $context, $blocks);
        // line 82
        echo "


";
        // line 85
        $this->displayBlock('jqgrid_js', $context, $blocks);
        // line 137
        echo "


";
        // line 140
        $this->displayBlock('jqgrid', $context, $blocks);
        // line 144
        echo "

";
    }

    // line 1
    public function block_jqgrid_definition($context, array $blocks = array())
    {
        // line 2
        echo "
// Definitions (";
        // line 3
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "name"), "html", null, true);
        echo ")
var gridSelector            = '#";
        // line 4
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo $this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "name");
        echo "' + (typeof rowId !== 'undefined' ? '_' + rowId : '');
var gridWrapperSelector     = gridSelector + '_wrapper';
var gridPagerSelector       = gridSelector + '_pager';
var gridResetSelector       = gridSelector + '_reset';

var gridOptions = \$.extend(
    {
        url:        '";
        // line 11
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "url"), "html", null, true);
        echo "' + (typeof rowId !== 'undefined' ? '?id=' + rowId : ''),
        colNames:   ";
        // line 12
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo $this->getAttribute($_gridView_, "columnsNames");
        echo ",
        colModel:   ";
        // line 13
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo $this->getAttribute($_gridView_, "getColumnsModels");
        echo ",
        caption:    '";
        // line 14
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "caption"), "html", null, true);
        echo "',
        pager:      gridPagerSelector,

        ";
        // line 18
        echo "        ";
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        if ($this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "subGrid")) {
            // line 19
            echo "            subGrid: true,
            subGridRowExpanded: function(subGridId, rowId) {
                var subGridTableId = '";
            // line 21
            if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "subGrid"), "name"), "html", null, true);
            echo "_' + rowId;
                var subGridPagerId = '";
            // line 22
            if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "subGrid"), "name"), "html", null, true);
            echo "_' + rowId + '_pager';

                jQuery(\"#\" + subGridId)
                    .html('<table id=\"' + subGridTableId + '\" class=\"scroll\"></table>')
                    .append('<div id=\"' + subGridPagerId + '\"></div>');

                // --- SubGrid Creation (";
            // line 28
            if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "subGrid"), "name"), "html", null, true);
            echo ") ---
                ";
            // line 29
            if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
            $context["subGridRenderResult"] = $this->getAttribute($this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "subGrid"), "render", array(), "method");
            // line 30
            echo "                ";
            if (isset($context["subGridRenderResult"])) { $_subGridRenderResult_ = $context["subGridRenderResult"]; } else { $_subGridRenderResult_ = null; }
            $context["subGridView"] = $this->getAttribute($_subGridRenderResult_, "gridView");
            // line 31
            echo "
                ";
            // line 32
            if (isset($context["subGridView"])) { $_subGridView_ = $context["subGridView"]; } else { $_subGridView_ = null; }
            echo $this->env->getExtension('ypt_jq_grid_twig_extension')->renderGridDefinition($_subGridView_);
            echo "
            }
        ";
        } else {
            // line 35
            echo "            subGrid: false
        ";
        }
        // line 37
        echo "    },

    ";
        // line 39
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo $this->getAttribute($_gridView_, "gridOptions");
        echo "
);

// Instance (";
        // line 42
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "name"), "html", null, true);
        echo ")
\$(gridSelector)
    .jqGrid(gridOptions)
    .navGrid(
        gridPagerSelector,
        ";
        // line 47
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo $this->getAttribute($_gridView_, "navigationOptions");
        echo "
    )
    .navSeparatorAdd(gridPagerSelector, {
        sepclass: 'ui-separator',
        sepcontent: ''
    })
    .navButtonAdd(gridPagerSelector, {
        id: gridResetSelector,
        caption: '',
        buttonicon: 'ui-icon-home',
        onClickButton: null,
        position: 'last',
        title: '";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("grid.filter.clear"), "html", null, true);
        echo "',
        cursor: 'pointer'
    })
    .filterToolbar({
        stringResult: true,
        searchOnEnter: true,
        defaultSearch: \"eq\"
    })
;

\$(gridResetSelector).click(function () {
    \$(gridSelector).get(0).clearToolbar();
});
";
    }

    // line 76
    public function block_jqgrid_html($context, array $blocks = array())
    {
        // line 77
        echo "<div id=\"";
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo $this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "name");
        echo "_wrapper\">
    <table class=\"ypt_jqgrid\" id=\"";
        // line 78
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo $this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "name");
        echo "\"></table>
    <div id=\"";
        // line 79
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo $this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "name");
        echo "_pager\"></div>
</div>
";
    }

    // line 85
    public function block_jqgrid_js($context, array $blocks = array())
    {
        // line 86
        echo "<script type=\"text/javascript\">
jqGridInclude(function(){

    (function (\$) {
        'use strict';
        // --- Begin ---

        \$(function () {
            var now = new Date();
            var baseYear = now.getFullYear();

            var openDatePickerFilter = function(el) {
                \$(el).datepicker(datePickerConfig);
            };

            var datePickerConfig = \$.extend(
                \$.datepicker.regional[
                    '";
        // line 103
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo twig_escape_filter($this->env, strtr($this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "culture"), array("_" => "-")), "html", null, true);
        echo "'
                ],

                {
                    minDate: new Date(baseYear - 10, 0, 1),
                    maxDate: new Date(baseYear + 10, 11, 31),
                    dateFormat: '";
        // line 109
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_gridView_, "gridModel"), "datePickerFormat"), "html", null, true);
        echo "',
                    showButtonPanel: true,
                    changeYear: true,
                    changeMonth: true,
                    closeText: '";
        // line 113
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("datepicker.close"), "html", null, true);
        echo "',

                    onSelect: function (dateString, instance) {
                        var fullGridId = \$(this).closest('.ui-jqgrid-view').attr('id');
                        var shortGridId = fullGridId.substring(6);

                        \$('#' + shortGridId).get(0).triggerToolbar();
                    }
                }
            );
            // --- Grid Creation ---
            ";
        // line 124
        if (isset($context["gridView"])) { $_gridView_ = $context["gridView"]; } else { $_gridView_ = null; }
        echo $this->env->getExtension('ypt_jq_grid_twig_extension')->renderGridDefinition($_gridView_);
        echo "
            \$(window)
                .resize(function() {
                    var gridWrapperWidth = \$(gridWrapperSelector).width();
                    \$(gridSelector).setGridWidth(gridWrapperWidth);
                })
                .trigger('resize');
        });
    }(jQuery));
});

</script>
";
    }

    // line 140
    public function block_jqgrid($context, array $blocks = array())
    {
        // line 141
        $this->displayBlock("jqgrid_html", $context, $blocks);
        echo "
";
        // line 142
        $this->displayBlock("jqgrid_js", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "YptJqGridBundle::blocks.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  300 => 142,  296 => 141,  293 => 140,  275 => 124,  261 => 113,  253 => 109,  243 => 103,  224 => 86,  221 => 85,  213 => 79,  208 => 78,  202 => 77,  199 => 76,  181 => 59,  165 => 47,  156 => 42,  149 => 39,  145 => 37,  141 => 35,  134 => 32,  131 => 31,  127 => 30,  124 => 29,  119 => 28,  109 => 22,  104 => 21,  100 => 19,  96 => 18,  89 => 14,  84 => 13,  79 => 12,  74 => 11,  63 => 4,  58 => 3,  55 => 2,  52 => 1,  46 => 144,  44 => 140,  39 => 137,  37 => 85,  32 => 82,  30 => 76,  25 => 73,  23 => 1,);
    }
}
