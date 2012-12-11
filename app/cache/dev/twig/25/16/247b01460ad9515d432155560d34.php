<?php

/* WebProfilerBundle:Collector:time.html.twig */
class __TwigTemplate_2516247b01460ad9515d432155560d34 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");

        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
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
        $context["__internal_babe51c5cea245c5a7e1fd76ddd992b9936e1a05"] = $this;
        // line 5
        if ((!array_key_exists("colors", $context))) {
            // line 6
            $context["colors"] = array("default" => "#aacd4e", "section" => "#666", "event_listener" => "#3dd", "event_listener_loading" => "#add", "template" => "#dd3", "doctrine" => "#d3d", "propel" => "#f4d", "child_sections" => "#eed");
        }
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 18
    public function block_toolbar($context, array $blocks = array())
    {
        // line 19
        echo "    ";
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        $context["total_time"] = ((twig_length_filter($this->env, $this->getAttribute($_collector_, "events"))) ? (sprintf("%.0f ms", $this->getAttribute($_collector_, "totaltime"))) : ("n/a"));
        // line 20
        echo "    ";
        ob_start();
        // line 21
        echo "        <img width=\"16\" height=\"28\" alt=\"Time\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAcCAYAAABoMT8aAAABqUlEQVR42t2Vv0sCYRyHX9OmEhsMx/YKGlwLQ69DTEUSBJEQEy5J3FRc/BsuiFqEIIcQIRo6ysUhoaBBWhoaGoJwiMJLglRKrs8bXgienmkQdPDAwX2f57j3fhFJkkbiPwTK5bIiFoul3kmPud8MqKMewDXpwuGww+12n9hsNhFnlijYf/Z4PDmO45Yxo+10ZFGTyWRMEItU6AdCx7lczkgd6n7J2Wx2xm63P6jJMk6n80YQBBN1aUDv9XqvlAbbm2LE7/cLODRB0un0VveAeoDC8/waCQQC18MGQqHQOcEKvw8bcLlcL6TfYnVtCrGRAlartUUYhmn1jKg/E3USjUYfhw3E4/F7ks/nz4YNFIvFQ/ogbUYikdefyqlU6gnuOg2YK5XKvs/n+xhUDgaDTVEUt+HO04ABOBA5isViDTU5kUi81Wq1AzhWMEkDGmAEq2C3UCjcYXGauDvfEsuyUjKZbJRKpVvM8IABU9SVX+cxYABmwIE9cFqtVi9xtgvsC2AHbIAFoKey0gdlHEyDObAEWLACFsEsMALdIJ80+dK0bTS95v7+v/AJnis0eO906QwAAAAASUVORK5CYII=\"/>
        <span>";
        // line 22
        if (isset($context["total_time"])) { $_total_time_ = $context["total_time"]; } else { $_total_time_ = null; }
        echo twig_escape_filter($this->env, $_total_time_, "html", null, true);
        echo "</span>
    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 24
        echo "    ";
        ob_start();
        // line 25
        echo "        <div class=\"sf-toolbar-info-piece\">
            <b>Total time</b>
            <span>";
        // line 27
        if (isset($context["total_time"])) { $_total_time_ = $context["total_time"]; } else { $_total_time_ = null; }
        echo twig_escape_filter($this->env, $_total_time_, "html", null, true);
        echo "</span>
        </div>
    ";
        $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 30
        echo "    ";
        if (isset($context["profiler_url"])) { $_profiler_url_ = $context["profiler_url"]; } else { $_profiler_url_ = null; }
        $this->env->loadTemplate("WebProfilerBundle:Profiler:toolbar_item.html.twig")->display(array_merge($context, array("link" => $_profiler_url_)));
    }

    // line 33
    public function block_menu($context, array $blocks = array())
    {
        // line 34
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/time.png"), "html", null, true);
        echo "\" alt=\"Timeline\" /></span>
    <strong>Timeline</strong>
</span>
";
    }

    // line 40
    public function block_panel($context, array $blocks = array())
    {
        // line 41
        echo "    <h2>Timeline</h2>
    ";
        // line 42
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        if (twig_length_filter($this->env, $this->getAttribute($_collector_, "events"))) {
            // line 43
            echo "        ";
            $this->displayBlock("panelContent", $context, $blocks);
            echo "
    ";
        } else {
            // line 45
            echo "        <p>
            <em>No timing events have been recorded. Are you sure that debugging is enabled in the kernel?</em>
        </p>
    ";
        }
    }

    // line 51
    public function block_panelContent($context, array $blocks = array())
    {
        // line 52
        echo "    <form id=\"timeline-control\" action=\"\" method=\"get\">
        <input type=\"hidden\" name=\"panel\" value=\"time\" />
        <table>
            <tr>
                <th style=\"width: 20%\">Total time</th>
                <td>";
        // line 57
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        echo twig_escape_filter($this->env, sprintf("%.0f", $this->getAttribute($_collector_, "totaltime")), "html", null, true);
        echo " ms</td>
            </tr>
            <tr>
                <th>Initialization time</th>
                <td>";
        // line 61
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        echo twig_escape_filter($this->env, sprintf("%.0f", $this->getAttribute($_collector_, "inittime")), "html", null, true);
        echo " ms</td>
            </tr>
            <tr>
                <th>Threshold</th>
                <td><input type=\"number\" size=\"3\" name=\"threshold\" value=\"1\" min=\"0\" /> ms</td>
            </tr>
        </table>
    </form>

    <h3>
        ";
        // line 71
        if (isset($context["profile"])) { $_profile_ = $context["profile"]; } else { $_profile_ = null; }
        echo (($this->getAttribute($_profile_, "parent")) ? ("Request") : ("Main Request"));
        echo "
        <small>
            - ";
        // line 73
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($_collector_, "events"), "__section__"), "totaltime"), "html", null, true);
        echo " ms
            ";
        // line 74
        if (isset($context["profile"])) { $_profile_ = $context["profile"]; } else { $_profile_ = null; }
        if ($this->getAttribute($_profile_, "parent")) {
            // line 75
            echo "                - <a href=\"";
            if (isset($context["profile"])) { $_profile_ = $context["profile"]; } else { $_profile_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("token" => $this->getAttribute($this->getAttribute($_profile_, "parent"), "token"), "panel" => "time")), "html", null, true);
            echo "\">parent</a>
            ";
        }
        // line 77
        echo "        </small>
    </h3>

    ";
        // line 80
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        $context["max"] = $this->getAttribute($this->getAttribute($this->getAttribute($_collector_, "events"), "__section__"), "endtime");
        // line 81
        echo "
    ";
        // line 82
        if (isset($context["token"])) { $_token_ = $context["token"]; } else { $_token_ = null; }
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        if (isset($context["colors"])) { $_colors_ = $context["colors"]; } else { $_colors_ = null; }
        echo $context["__internal_babe51c5cea245c5a7e1fd76ddd992b9936e1a05"]->getdisplay_timeline(("timeline_" . $_token_), $this->getAttribute($_collector_, "events"), $_colors_);
        echo "

    ";
        // line 84
        if (isset($context["profile"])) { $_profile_ = $context["profile"]; } else { $_profile_ = null; }
        if (twig_length_filter($this->env, $this->getAttribute($_profile_, "children"))) {
            // line 85
            echo "        ";
            if (isset($context["profile"])) { $_profile_ = $context["profile"]; } else { $_profile_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($_profile_, "children"));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 86
                echo "            ";
                if (isset($context["child"])) { $_child_ = $context["child"]; } else { $_child_ = null; }
                $context["events"] = $this->getAttribute($this->getAttribute($_child_, "getcollector", array(0 => "time"), "method"), "events");
                // line 87
                echo "            <h3>
                Sub-request \"<a href=\"";
                // line 88
                if (isset($context["child"])) { $_child_ = $context["child"]; } else { $_child_ = null; }
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("token" => $this->getAttribute($_child_, "token"), "panel" => "time")), "html", null, true);
                echo "\">";
                if (isset($context["child"])) { $_child_ = $context["child"]; } else { $_child_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($_child_, "getcollector", array(0 => "request"), "method"), "requestattributes"), "get", array(0 => "_controller"), "method"), "html", null, true);
                echo "</a>\"
                <small> - ";
                // line 89
                if (isset($context["events"])) { $_events_ = $context["events"]; } else { $_events_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_events_, "__section__"), "totaltime"), "html", null, true);
                echo " ms</small>
            </h3>

            ";
                // line 92
                if (isset($context["child"])) { $_child_ = $context["child"]; } else { $_child_ = null; }
                if (isset($context["events"])) { $_events_ = $context["events"]; } else { $_events_ = null; }
                if (isset($context["colors"])) { $_colors_ = $context["colors"]; } else { $_colors_ = null; }
                echo $context["__internal_babe51c5cea245c5a7e1fd76ddd992b9936e1a05"]->getdisplay_timeline(("timeline_" . $this->getAttribute($_child_, "token")), $_events_, $_colors_);
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 94
            echo "    ";
        }
        // line 95
        echo "
    <script type=\"text/javascript\">//<![CDATA[
        /**
         * In-memory key-value cache manager
         */
        var cache = new function() {
            \"use strict\";
            var dict = {};

            this.get = function(key) {
                return dict.hasOwnProperty(key)
                    ? dict[key]
                    : null;
                }

            this.set = function(key, value) {
                dict[key] = value;

                return value;
            }
        };

        /**
         * Query an element with a CSS selector.
         *
         * @param  string selector a CSS-selector-compatible query string.
         *
         * @return DOMElement|null
         */
        function query(selector)
        {
            \"use strict\";
            var key = 'SELECTOR: ' + selector;

            return cache.get(key) || cache.set(key, document.querySelector(selector));
        }

        /**
         * Canvas Manager
         */
        function CanvasManager(requests, maxRequestTime) {
            \"use strict\";

            var _drawingColors  = ";
        // line 138
        if (isset($context["colors"])) { $_colors_ = $context["colors"]; } else { $_colors_ = null; }
        echo twig_jsonencode_filter($_colors_);
        echo ",
                _storagePrefix  = 'sf2/profiler/timeline',
                _threshold      = 1,
                _requests       = requests,
                _maxRequestTime = maxRequestTime;

            /**
             * Check whether this event is a child event.
             *
             * @return true if it is.
             */
            function isChildEvent(event)
            {
                return '__section__.child' === event.name;
            }

            /**
             * Check whether this event is categorized in 'section'.
             *
             * @return true if it is.
             */
            function isSectionEvent(event)
            {
                return 'section' === event.category;
            }

            /**
             * Get the width of the container.
             */
            function getContainerWidth()
            {
                return query('#collector_content h2').clientWidth;
            }

            /**
             * Draw one canvas.
             *
             * @param request   the request object
             * @param max       <subjected for removal>
             * @param threshold the threshold (lower bound) of the length of the timeline (in miliseconds).
             * @param width     the width of the canvas.
             */
            this.drawOne = function(request, max, threshold, width)
            {
                \"use strict\";
                var text,
                    ms,
                    xc,
                    drawableEvents,
                    mainEvents,
                    elementId    = 'timeline_' + request.id,
                    canvasHeight = 0,
                    gapPerEvent  = 38,
                    colors = _drawingColors,
                    space  = 10.5,
                    ratio  = (width - space * 2) / max,
                    h = space,
                    x = request.left * ratio + space, // position
                    canvas = cache.get(elementId) || cache.set(elementId, document.getElementById(elementId)),
                    ctx    = canvas.getContext(\"2d\");

                // Filter events whose total time is below the threshold.
                drawableEvents = request.events.filter(function(event) {
                    return event.totaltime >= threshold;
                });

                canvasHeight += gapPerEvent * drawableEvents.length;

                canvas.width  = width;
                canvas.height = canvasHeight;

                ctx.textBaseline = \"middle\";
                ctx.lineWidth = 0;

                // For each event, draw a line.
                ctx.strokeStyle = \"#dfdfdf\";

                drawableEvents.forEach(function(event) {
                    event.periods.forEach(function(period) {
                        var timelineHeadPosition = x + period.begin * ratio;

                        if (isChildEvent(event)) {
                            ctx.fillStyle = colors.child_sections;
                            ctx.fillRect(timelineHeadPosition, 0, (period.end - period.begin) * ratio, canvasHeight);
                        } else if (isSectionEvent(event)) {
                            var timelineTailPosition = x + period.end * ratio;

                            ctx.beginPath();
                            ctx.moveTo(timelineHeadPosition, 0);
                            ctx.lineTo(timelineHeadPosition, canvasHeight);
                            ctx.moveTo(timelineTailPosition, 0);
                            ctx.lineTo(timelineTailPosition, canvasHeight);
                            ctx.fill();
                            ctx.closePath();
                            ctx.stroke();
                        }
                    });
                });

                // Filter for main events.
                mainEvents = drawableEvents.filter(function(event) {
                    return ! isChildEvent(event)
                });

                // For each main event, draw the visual presentation of timelines.
                mainEvents.forEach(function(event) {

                    h += 8;

                    // For each sub event, ...
                    event.periods.forEach(function(period) {
                        // Set the drawing style.
                        ctx.fillStyle   = colors['default'];
                        ctx.strokeStyle = colors['default'];

                        if (colors[event.name]) {
                            ctx.fillStyle   = colors[event.name];
                            ctx.strokeStyle = colors[event.name];
                        } else if (colors[event.category]) {
                            ctx.fillStyle   = colors[event.category];
                            ctx.strokeStyle = colors[event.category];
                        }

                        // Draw the timeline
                        var timelineHeadPosition = x + period.begin * ratio;

                        if ( ! isSectionEvent(event)) {
                            ctx.fillRect(timelineHeadPosition, h + 3, 2, 6);
                            ctx.fillRect(timelineHeadPosition, h, (period.end - period.begin) * ratio || 2, 6);
                        } else {
                            var timelineTailPosition = x + period.end * ratio;

                            ctx.beginPath();
                            ctx.moveTo(timelineHeadPosition, h);
                            ctx.lineTo(timelineHeadPosition, h + 11);
                            ctx.lineTo(timelineHeadPosition + 8, h);
                            ctx.lineTo(timelineHeadPosition, h);
                            ctx.fill();
                            ctx.closePath();
                            ctx.stroke();

                            ctx.beginPath();
                            ctx.moveTo(timelineTailPosition, h);
                            ctx.lineTo(timelineTailPosition, h + 11);
                            ctx.lineTo(timelineTailPosition - 8, h);
                            ctx.lineTo(timelineTailPosition, h);
                            ctx.fill();
                            ctx.closePath();
                            ctx.stroke();

                            ctx.beginPath();
                            ctx.moveTo(timelineHeadPosition, h);
                            ctx.lineTo(timelineTailPosition, h);
                            ctx.lineTo(timelineTailPosition, h + 2);
                            ctx.lineTo(timelineHeadPosition, h + 2);
                            ctx.lineTo(timelineHeadPosition, h);
                            ctx.fill();
                            ctx.closePath();
                            ctx.stroke();
                        }
                    });

                    h += 30;

                    ctx.beginPath();
                    ctx.strokeStyle = \"#dfdfdf\";
                    ctx.moveTo(0, h - 10);
                    ctx.lineTo(width, h - 10);
                    ctx.closePath();
                    ctx.stroke();
                });

                h = space;

                // For each event, draw the label.
                mainEvents.forEach(function(event) {

                    ctx.fillStyle = \"#444\";
                    ctx.font = \"12px sans-serif\";
                    text = event.name;
                    ms = \" ~ \" + (event.totaltime < 1 ? event.totaltime : parseInt(event.totaltime, 10)) + \" ms\";
                    if (x + event.starttime * ratio + ctx.measureText(text + ms).width > width) {
                        ctx.textAlign = \"end\";
                        ctx.font = \"10px sans-serif\";
                        xc = x + event.endtime * ratio - 1;
                        ctx.fillText(ms, xc, h);

                        xc -= ctx.measureText(ms).width;
                        ctx.font = \"12px sans-serif\";
                        ctx.fillText(text, xc, h);
                    } else {
                        ctx.textAlign = \"start\";
                        ctx.font = \"12px sans-serif\";
                        xc = x + event.starttime * ratio + 1;
                        ctx.fillText(text, xc, h);

                        xc += ctx.measureText(text).width;
                        ctx.font = \"10px sans-serif\";
                        ctx.fillText(ms, xc, h);
                    }

                    h += gapPerEvent;
                });
            };

            this.drawAll = function(width, threshold)
            {
                \"use strict\";

                width     = width || getContainerWidth();
                threshold = threshold || this.getThreshold();

                var self = this;

                _requests.forEach(function(request) {
                    self.drawOne(request, maxRequestTime, threshold, width);
                });
            };

            this.getThreshold = function() {
                var threshold = localStorage.getItem(_storagePrefix + '/threshold');

                if (threshold === null) {
                    return _threshold;
                }

                _threshold = parseInt(threshold);

                return _threshold;
            };

            this.setThreshold = function(threshold)
            {
                _threshold = threshold;

                localStorage.setItem(_storagePrefix + '/threshold', threshold);

                return this;
            };
        };

        function canvasAutoUpdateOnResizeAndSubmit(e) {
            e.preventDefault();
            canvasManager.drawAll();
        }

        function canvasAutoUpdateOnThresholdChange(e) {
            canvasManager
                .setThreshold(query('input[name=\"threshold\"]').value)
                .drawAll();
        }

        var requests_data = {
            \"max\": ";
        // line 391
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        echo twig_escape_filter($this->env, sprintf("%F", $this->getAttribute($this->getAttribute($this->getAttribute($_collector_, "events"), "__section__"), "endtime")), "html", null, true);
        echo ",
            \"requests\": [
";
        // line 393
        if (isset($context["token"])) { $_token_ = $context["token"]; } else { $_token_ = null; }
        if (isset($context["profile"])) { $_profile_ = $context["profile"]; } else { $_profile_ = null; }
        if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
        echo $context["__internal_babe51c5cea245c5a7e1fd76ddd992b9936e1a05"]->getdump_request_data($_token_, $_profile_, $this->getAttribute($_collector_, "events"), $this->getAttribute($this->getAttribute($this->getAttribute($_collector_, "events"), "__section__"), "origin"));
        echo "

";
        // line 395
        if (isset($context["profile"])) { $_profile_ = $context["profile"]; } else { $_profile_ = null; }
        if (twig_length_filter($this->env, $this->getAttribute($_profile_, "children"))) {
            // line 396
            echo "                ,
";
            // line 397
            if (isset($context["profile"])) { $_profile_ = $context["profile"]; } else { $_profile_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($_profile_, "children"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 398
                if (isset($context["child"])) { $_child_ = $context["child"]; } else { $_child_ = null; }
                if (isset($context["collector"])) { $_collector_ = $context["collector"]; } else { $_collector_ = null; }
                echo $context["__internal_babe51c5cea245c5a7e1fd76ddd992b9936e1a05"]->getdump_request_data($this->getAttribute($_child_, "token"), $_child_, $this->getAttribute($this->getAttribute($_child_, "getcollector", array(0 => "time"), "method"), "events"), $this->getAttribute($this->getAttribute($this->getAttribute($_collector_, "events"), "__section__"), "origin"));
                if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
                echo (($this->getAttribute($_loop_, "last")) ? ("") : (","));
                echo "
";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        }
        // line 401
        echo "            ]
        };

        var canvasManager = new CanvasManager(requests_data.requests, requests_data.max);

        query('input[name=\"threshold\"]').value = canvasManager.getThreshold();
        canvasManager.drawAll();

        // Update the colors of legends.
        var timelineLegends = document.querySelectorAll('.sf-profiler-timeline > .legends > span[data-color]');

        for (var i = 0; i < timelineLegends.length; ++i) {
            var timelineLegend = timelineLegends[i];

            timelineLegend.style.borderLeftColor = timelineLegend.getAttribute('data-color');
        }

        // Bind event handlers
        var elementTimelineControl  = query('#timeline-control'),
            elementThresholdControl = query('input[name=\"threshold\"]');

        window.onresize                 = canvasAutoUpdateOnResizeAndSubmit;
        elementTimelineControl.onsubmit = canvasAutoUpdateOnResizeAndSubmit;

        elementThresholdControl.onclick  = canvasAutoUpdateOnThresholdChange;
        elementThresholdControl.onchange = canvasAutoUpdateOnThresholdChange;
        elementThresholdControl.onkeyup  = canvasAutoUpdateOnThresholdChange;
    //]]></script>
";
    }

    // line 431
    public function getdump_request_data($_token = null, $_profile = null, $_events = null, $_origin = null)
    {
        $context = $this->env->mergeGlobals(array(
            "token" => $_token,
            "profile" => $_profile,
            "events" => $_events,
            "origin" => $_origin,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 432
            $context["__internal_ad691f38a8e962c590dec943708fe65a24113ab3"] = $this;
            // line 433
            echo "                {
                    \"id\": \"";
            // line 434
            if (isset($context["token"])) { $_token_ = $context["token"]; } else { $_token_ = null; }
            echo twig_escape_filter($this->env, $_token_, "html", null, true);
            echo "\",
                    \"left\": ";
            // line 435
            if (isset($context["events"])) { $_events_ = $context["events"]; } else { $_events_ = null; }
            if (isset($context["origin"])) { $_origin_ = $context["origin"]; } else { $_origin_ = null; }
            echo twig_escape_filter($this->env, sprintf("%F", ($this->getAttribute($this->getAttribute($_events_, "__section__"), "origin") - $_origin_)), "html", null, true);
            echo ",
                    \"events\": [
";
            // line 437
            if (isset($context["events"])) { $_events_ = $context["events"]; } else { $_events_ = null; }
            echo $context["__internal_ad691f38a8e962c590dec943708fe65a24113ab3"]->getdump_events($_events_);
            echo "
                    ]
                }
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 442
    public function getdump_events($_events = null)
    {
        $context = $this->env->mergeGlobals(array(
            "events" => $_events,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 443
            if (isset($context["events"])) { $_events_ = $context["events"]; } else { $_events_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_events_);
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["name"] => $context["event"]) {
                // line 444
                if (isset($context["name"])) { $_name_ = $context["name"]; } else { $_name_ = null; }
                if (("__section__" != $_name_)) {
                    // line 445
                    echo "                        {
                            \"name\": \"";
                    // line 446
                    if (isset($context["name"])) { $_name_ = $context["name"]; } else { $_name_ = null; }
                    echo twig_escape_filter($this->env, $_name_, "html", null, true);
                    echo "\",
                            \"category\": \"";
                    // line 447
                    if (isset($context["event"])) { $_event_ = $context["event"]; } else { $_event_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_event_, "category"), "html", null, true);
                    echo "\",
                            \"origin\": ";
                    // line 448
                    if (isset($context["event"])) { $_event_ = $context["event"]; } else { $_event_ = null; }
                    echo twig_escape_filter($this->env, sprintf("%F", $this->getAttribute($_event_, "origin")), "html", null, true);
                    echo ",
                            \"starttime\": ";
                    // line 449
                    if (isset($context["event"])) { $_event_ = $context["event"]; } else { $_event_ = null; }
                    echo twig_escape_filter($this->env, sprintf("%F", $this->getAttribute($_event_, "starttime")), "html", null, true);
                    echo ",
                            \"endtime\": ";
                    // line 450
                    if (isset($context["event"])) { $_event_ = $context["event"]; } else { $_event_ = null; }
                    echo twig_escape_filter($this->env, sprintf("%F", $this->getAttribute($_event_, "endtime")), "html", null, true);
                    echo ",
                            \"totaltime\": ";
                    // line 451
                    if (isset($context["event"])) { $_event_ = $context["event"]; } else { $_event_ = null; }
                    echo twig_escape_filter($this->env, sprintf("%F", $this->getAttribute($_event_, "totaltime")), "html", null, true);
                    echo ",
                            \"periods\": [";
                    // line 453
                    if (isset($context["event"])) { $_event_ = $context["event"]; } else { $_event_ = null; }
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($_event_, "periods"));
                    $context['loop'] = array(
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    );
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["period"]) {
                        // line 454
                        echo "{\"begin\": ";
                        if (isset($context["period"])) { $_period_ = $context["period"]; } else { $_period_ = null; }
                        echo twig_escape_filter($this->env, sprintf("%F", $this->getAttribute($_period_, 0)), "html", null, true);
                        echo ", \"end\": ";
                        if (isset($context["period"])) { $_period_ = $context["period"]; } else { $_period_ = null; }
                        echo twig_escape_filter($this->env, sprintf("%F", $this->getAttribute($_period_, 1)), "html", null, true);
                        echo "}";
                        if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
                        echo (($this->getAttribute($_loop_, "last")) ? ("") : (", "));
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['length'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['period'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 456
                    echo "]
                        }";
                    // line 457
                    if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
                    echo (($this->getAttribute($_loop_, "last")) ? ("") : (","));
                    echo "
";
                }
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['event'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 462
    public function getdisplay_timeline($_id = null, $_events = null, $_colors = null)
    {
        $context = $this->env->mergeGlobals(array(
            "id" => $_id,
            "events" => $_events,
            "colors" => $_colors,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 463
            echo "    <div class=\"sf-profiler-timeline\">
        <div class=\"legends\">
            ";
            // line 465
            if (isset($context["colors"])) { $_colors_ = $context["colors"]; } else { $_colors_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_colors_);
            foreach ($context['_seq'] as $context["category"] => $context["color"]) {
                // line 466
                echo "                <span data-color=\"";
                if (isset($context["color"])) { $_color_ = $context["color"]; } else { $_color_ = null; }
                echo twig_escape_filter($this->env, $_color_, "html", null, true);
                echo "\">";
                if (isset($context["category"])) { $_category_ = $context["category"]; } else { $_category_ = null; }
                echo twig_escape_filter($this->env, $_category_, "html", null, true);
                echo "</span>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['category'], $context['color'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 468
            echo "        </div>
        <canvas width=\"680\" height=\"\" id=\"";
            // line 469
            if (isset($context["id"])) { $_id_ = $context["id"]; } else { $_id_ = null; }
            echo twig_escape_filter($this->env, $_id_, "html", null, true);
            echo "\" class=\"timeline\"></canvas>
    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:time.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  844 => 469,  841 => 468,  828 => 466,  823 => 465,  819 => 463,  806 => 462,  779 => 457,  776 => 456,  754 => 454,  736 => 453,  731 => 451,  726 => 450,  721 => 449,  716 => 448,  711 => 447,  706 => 446,  703 => 445,  700 => 444,  682 => 443,  671 => 442,  655 => 437,  648 => 435,  643 => 434,  640 => 433,  638 => 432,  624 => 431,  592 => 401,  571 => 398,  553 => 397,  550 => 396,  547 => 395,  539 => 393,  533 => 391,  276 => 138,  228 => 94,  199 => 87,  189 => 85,  152 => 73,  146 => 71,  124 => 57,  114 => 51,  106 => 45,  100 => 43,  97 => 42,  64 => 27,  45 => 20,  41 => 19,  28 => 3,  226 => 71,  202 => 88,  187 => 60,  175 => 81,  160 => 75,  157 => 74,  154 => 56,  111 => 35,  108 => 34,  83 => 35,  43 => 7,  208 => 69,  205 => 68,  190 => 67,  186 => 84,  182 => 64,  178 => 82,  150 => 55,  144 => 54,  129 => 51,  126 => 45,  94 => 41,  71 => 30,  68 => 23,  53 => 14,  27 => 3,  79 => 24,  76 => 23,  59 => 16,  56 => 12,  47 => 9,  435 => 160,  432 => 159,  426 => 158,  423 => 157,  414 => 156,  409 => 155,  405 => 153,  402 => 152,  399 => 151,  396 => 150,  393 => 149,  383 => 147,  380 => 146,  377 => 145,  371 => 141,  368 => 140,  361 => 138,  350 => 131,  347 => 130,  343 => 129,  340 => 128,  335 => 125,  329 => 121,  326 => 120,  319 => 118,  311 => 114,  303 => 110,  294 => 105,  287 => 103,  283 => 101,  280 => 100,  275 => 97,  272 => 96,  267 => 93,  261 => 89,  254 => 87,  251 => 86,  246 => 83,  240 => 79,  233 => 77,  230 => 73,  219 => 69,  216 => 68,  212 => 70,  209 => 67,  204 => 63,  198 => 62,  195 => 86,  191 => 57,  188 => 56,  181 => 53,  173 => 48,  170 => 47,  167 => 77,  161 => 58,  158 => 42,  147 => 39,  139 => 35,  131 => 31,  113 => 41,  99 => 36,  91 => 40,  88 => 18,  85 => 28,  81 => 32,  77 => 33,  74 => 14,  50 => 10,  40 => 6,  36 => 5,  63 => 15,  60 => 25,  48 => 21,  46 => 12,  39 => 11,  37 => 5,  22 => 1,  184 => 54,  176 => 50,  172 => 80,  148 => 42,  137 => 41,  133 => 40,  120 => 27,  117 => 52,  115 => 36,  110 => 23,  107 => 32,  105 => 31,  101 => 31,  90 => 25,  87 => 24,  80 => 34,  70 => 14,  67 => 16,  57 => 24,  54 => 6,  51 => 22,  44 => 8,  32 => 6,  29 => 6,  392 => 163,  381 => 160,  376 => 159,  373 => 158,  367 => 157,  364 => 139,  356 => 135,  353 => 149,  346 => 145,  338 => 141,  330 => 137,  322 => 119,  314 => 115,  306 => 111,  298 => 107,  282 => 109,  274 => 105,  266 => 101,  258 => 88,  248 => 89,  245 => 88,  237 => 78,  234 => 82,  231 => 95,  225 => 73,  222 => 77,  217 => 92,  210 => 89,  200 => 70,  197 => 69,  185 => 64,  177 => 60,  169 => 48,  165 => 46,  162 => 53,  159 => 45,  149 => 49,  143 => 47,  138 => 53,  135 => 52,  132 => 61,  125 => 39,  122 => 44,  119 => 40,  116 => 42,  109 => 39,  104 => 32,  96 => 28,  92 => 29,  89 => 25,  86 => 24,  78 => 21,  75 => 20,  72 => 19,  69 => 20,  62 => 18,  55 => 13,  52 => 10,  49 => 9,  42 => 12,  38 => 18,  35 => 6,  33 => 4,  30 => 5,);
    }
}
