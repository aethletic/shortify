<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* stat.html */
class __TwigTemplate_7c653c00297970a65f213f68cd61cfa3b2cc6173249b173fe08136d0c08594ba extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'css' => [$this, 'block_css'],
            'content' => [$this, 'block_content'],
            'js' => [$this, 'block_js'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "template/template.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("template/template.html", "stat.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Статистика - ";
    }

    // line 5
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css\">
";
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        if (0 === twig_compare(($context["error"] ?? null), true)) {
            // line 11
            echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
    <strong>";
            // line 12
            echo twig_escape_filter($this->env, ($context["caption"] ?? null), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
            echo "
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
        <span aria-hidden=\"true\">&times;</span>
    </button>
</div>
";
        }
        // line 18
        echo "
<!-- Короткая ссылка, кнопка -->
<div class=\"row\">
    <div class=\"col-md-12 col-12 col-sm-12 col-lg-10\">
        <input id=\"shortUrl\" type=\"text\" class=\"form-control \" placeholder=\"https://go.botify.ru/shorturl или shorturl\" aria-describedby=\"addon-wrapping\">
        <label class=\"mb-0 mt-0 text-muted text-size-14\" for=\"\">Вставьте короткую ссылку, чтобы увидеть статистику</label>
    </div>

    <div class=\"col-md col col-lg-2 mt-sm-2 mt-lg-0 mt-2 \">
        <button id=\"getStat\" class=\"btn btn-primary w-100\" type=\"button\" name=\"button\">Проверить</button>
    </div>
</div>
<!-- Конец Короткая ссылка, кнопка -->

";
        // line 32
        if (($context["show_stat"] ?? null)) {
            // line 33
            echo "<!-- Блок с информацией о ссылке -->
<div class=\"card mt-4 mb-4\">
    <div class=\"card-header text-muted text-size-14 font-weight-bold\">
        Статистика: ";
            // line 36
            echo twig_escape_filter($this->env, ($context["code"] ?? null), "html", null, true);
            echo "
    </div>

    <div class=\"card-body text-muted \">
        <div class=\"row\">
            <div class=\"col mb\">
                <div class=\"text-size-14\">
                    <strong>Исходная ссылка:</strong> <a href=\"";
            // line 43
            echo twig_escape_filter($this->env, ($context["full_url"] ?? null), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, ($context["full_url"] ?? null), "html", null, true);
            echo "</a>
                </div>
                <div class=\"text-size-14 mb-2\">
                    <strong>Короткая ссылка:</strong> <a href=\"";
            // line 46
            echo twig_escape_filter($this->env, ($context["short_url"] ?? null), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, ($context["short_url"] ?? null), "html", null, true);
            echo "</a>
                </div>

                <div class=\"text-size-14\">
                    <strong>Срок действия ссылки:</strong> ";
            // line 50
            echo twig_escape_filter($this->env, ($context["expire_name"] ?? null), "html", null, true);
            echo "
                </div>
                <div class=\"text-size-14\">
                    <strong>Дата создания:</strong> ";
            // line 53
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["create_date"] ?? null), "d.m.Y H:i:s"), "html", null, true);
            echo "
                </div>
                <div class=\"text-size-14 mb-2\">
                    <strong>Срок истекает:</strong>
                    ";
            // line 57
            if (0 === twig_compare(($context["expire_date"] ?? null), 0)) {
                // line 58
                echo "                        Никогда
                    ";
            } else {
                // line 60
                echo "                        ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["expire_date"] ?? null), "d.m.Y H:i:s"), "html", null, true);
                echo "
                    ";
            }
            // line 62
            echo "
                </div>
                <div class=\"text-size-14\">
                    <strong>Переходов:</strong> ";
            // line 65
            echo twig_escape_filter($this->env, ($context["clicks"] ?? null), "html", null, true);
            echo "
                </div>
            </div>

            <div class=\"col-auto\">
                <div class=\"d-none d-md-block float-right\">
                    <canvas id=\"myChart\" ></canvas>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Конец Блок с информацией о ссылке -->

<!-- Блоки с информацией о переходах -->
<div class=\"card text-muted mb-4\">
    <div class=\"card-header text-size-14 font-weight-bold\">
        Информация о переходах
    </div>
    ";
            // line 85
            if (1 === twig_compare(twig_length_filter($this->env, ($context["visitors"] ?? null)), 0)) {
                // line 86
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["visitors"] ?? null));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["visitor"]) {
                    // line 87
                    echo "            <div class=\"pl-4 pr-4 pb-2\">
                <div class=\"row\">
                    <div class=\"mt-2 small col-sm-12 col-12 col-md-12 col-lg-auto\">
                        <strong>";
                    // line 90
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["visitor"], "visit_date", [], "any", false, false, false, 90), "d.m.Y H:i:s"), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["visitor"], "ip", [], "any", false, false, false, 90), "html", null, true);
                    echo "</strong>
                    </div>
                </div>

                ";
                    // line 94
                    if ((((twig_get_attribute($this->env, $this->source, $context["visitor"], "country", [], "any", false, false, false, 94) && twig_get_attribute($this->env, $this->source, $context["visitor"], "city", [], "any", false, false, false, 94)) && twig_get_attribute($this->env, $this->source, $context["visitor"], "region", [], "any", false, false, false, 94)) && twig_get_attribute($this->env, $this->source, $context["visitor"], "countryCode", [], "any", false, false, false, 94))) {
                        // line 95
                        echo "                    <div class=\"row\">
                        <div class=\"small col-sm-12 col-12 col-md-12 col-lg-auto\">
                            <img class=\"\" src=\"https://www.countryflags.io/";
                        // line 97
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["visitor"], "countryCode", [], "any", false, false, false, 97), "html", null, true);
                        echo "/shiny/16.png\" alt=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["visitor"], "countryCode", [], "any", false, false, false, 97), "html", null, true);
                        echo "\"> ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["visitor"], "country", [], "any", false, false, false, 97), "html", null, true);
                        echo ", ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["visitor"], "city", [], "any", false, false, false, 97), "html", null, true);
                        echo ", ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["visitor"], "region", [], "any", false, false, false, 97), "html", null, true);
                        echo "
                        </div>
                    </div>
                ";
                    }
                    // line 101
                    echo "
                <div class=\"row\">
                    <div class=\"small col-sm-12 col-12 col-md-12 col-lg-auto\">
                        ";
                    // line 104
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["visitor"], "useragent", [], "any", false, false, false, 104), "html", null, true);
                    echo "
                    </div>
                </div>
            </div>

            ";
                    // line 109
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 109), false)) {
                        // line 110
                        echo "                <hr class=\"mt-0 mb-0\" />
            ";
                    }
                    // line 112
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['visitor'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 114
                echo "    ";
            } else {
                // line 115
                echo "    <div class=\"small mb-0 p-3\">
        Ещё никто не перешёл по ссылке
    </div>
    ";
            }
            // line 119
            echo "</div>
<!-- Конец Блоки с информацией о переходах -->
";
        }
    }

    // line 124
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 125
        echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js\"></script>
<script type=\"text/javascript\" src=\"https://cdn.jsdelivr.net/npm/chartjs-plugin-colorschemes@0.4.0\"></script>

<script>
    \$(document).ready(function() {
        \$(\"#getStat\").click(function() {
            let shortUrl = \$(\"#shortUrl\").val().trim();
            if (shortUrl) {
                code = shortUrl.split('/').pop();
                window.location.replace(`/stat/\${code}`);
            }
        });

        ";
        // line 138
        if (($context["show_stat"] ?? null)) {
            // line 139
            echo "        var data = {
            labels: ";
            // line 140
            echo ($context["chartLabels"] ?? null);
            echo ",
            datasets: [{
                label: '# of Cities',
                data: ";
            // line 143
            echo twig_escape_filter($this->env, ($context["chartData"] ?? null), "html", null, true);
            echo ",
            }]
        };

        var ctx = \$(\"#myChart\");

        Chart.defaults.global.legend.display = false;

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                plugins: {
                    colorschemes: {
                        scheme: 'tableau.Classic20'
                    }
                }
            }
        });
        ";
        }
        // line 163
        echo "
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "stat.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  346 => 163,  323 => 143,  317 => 140,  314 => 139,  312 => 138,  297 => 125,  293 => 124,  286 => 119,  280 => 115,  277 => 114,  262 => 112,  258 => 110,  256 => 109,  248 => 104,  243 => 101,  228 => 97,  224 => 95,  222 => 94,  213 => 90,  208 => 87,  190 => 86,  188 => 85,  165 => 65,  160 => 62,  154 => 60,  150 => 58,  148 => 57,  141 => 53,  135 => 50,  126 => 46,  118 => 43,  108 => 36,  103 => 33,  101 => 32,  85 => 18,  74 => 12,  71 => 11,  69 => 10,  65 => 9,  60 => 6,  56 => 5,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"template/template.html\" %}

{% block title %}Статистика - {% endblock %}

{% block css %}
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css\">
{% endblock %}

{% block content %}
{% if error == true %}
<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
    <strong>{{ caption }}</strong> {{ message }}
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
        <span aria-hidden=\"true\">&times;</span>
    </button>
</div>
{% endif %}

<!-- Короткая ссылка, кнопка -->
<div class=\"row\">
    <div class=\"col-md-12 col-12 col-sm-12 col-lg-10\">
        <input id=\"shortUrl\" type=\"text\" class=\"form-control \" placeholder=\"https://go.botify.ru/shorturl или shorturl\" aria-describedby=\"addon-wrapping\">
        <label class=\"mb-0 mt-0 text-muted text-size-14\" for=\"\">Вставьте короткую ссылку, чтобы увидеть статистику</label>
    </div>

    <div class=\"col-md col col-lg-2 mt-sm-2 mt-lg-0 mt-2 \">
        <button id=\"getStat\" class=\"btn btn-primary w-100\" type=\"button\" name=\"button\">Проверить</button>
    </div>
</div>
<!-- Конец Короткая ссылка, кнопка -->

{% if show_stat %}
<!-- Блок с информацией о ссылке -->
<div class=\"card mt-4 mb-4\">
    <div class=\"card-header text-muted text-size-14 font-weight-bold\">
        Статистика: {{ code }}
    </div>

    <div class=\"card-body text-muted \">
        <div class=\"row\">
            <div class=\"col mb\">
                <div class=\"text-size-14\">
                    <strong>Исходная ссылка:</strong> <a href=\"{{ full_url }}\" target=\"_blank\">{{ full_url }}</a>
                </div>
                <div class=\"text-size-14 mb-2\">
                    <strong>Короткая ссылка:</strong> <a href=\"{{ short_url }}\" target=\"_blank\">{{ short_url }}</a>
                </div>

                <div class=\"text-size-14\">
                    <strong>Срок действия ссылки:</strong> {{ expire_name }}
                </div>
                <div class=\"text-size-14\">
                    <strong>Дата создания:</strong> {{ create_date | date(\"d.m.Y H:i:s\")}}
                </div>
                <div class=\"text-size-14 mb-2\">
                    <strong>Срок истекает:</strong>
                    {% if expire_date == 0 %}
                        Никогда
                    {% else %}
                        {{ expire_date | date(\"d.m.Y H:i:s\") }}
                    {% endif %}

                </div>
                <div class=\"text-size-14\">
                    <strong>Переходов:</strong> {{ clicks }}
                </div>
            </div>

            <div class=\"col-auto\">
                <div class=\"d-none d-md-block float-right\">
                    <canvas id=\"myChart\" ></canvas>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Конец Блок с информацией о ссылке -->

<!-- Блоки с информацией о переходах -->
<div class=\"card text-muted mb-4\">
    <div class=\"card-header text-size-14 font-weight-bold\">
        Информация о переходах
    </div>
    {% if visitors|length > 0 %}
        {% for visitor in visitors %}
            <div class=\"pl-4 pr-4 pb-2\">
                <div class=\"row\">
                    <div class=\"mt-2 small col-sm-12 col-12 col-md-12 col-lg-auto\">
                        <strong>{{ visitor.visit_date | date(\"d.m.Y H:i:s\")}}, {{ visitor.ip }}</strong>
                    </div>
                </div>

                {% if visitor.country and visitor.city and visitor.region and visitor.countryCode %}
                    <div class=\"row\">
                        <div class=\"small col-sm-12 col-12 col-md-12 col-lg-auto\">
                            <img class=\"\" src=\"https://www.countryflags.io/{{ visitor.countryCode }}/shiny/16.png\" alt=\"{{ visitor.countryCode }}\"> {{ visitor.country }}, {{ visitor.city }}, {{ visitor.region }}
                        </div>
                    </div>
                {% endif %}

                <div class=\"row\">
                    <div class=\"small col-sm-12 col-12 col-md-12 col-lg-auto\">
                        {{ visitor.useragent }}
                    </div>
                </div>
            </div>

            {% if loop.last == false %}
                <hr class=\"mt-0 mb-0\" />
            {% endif %}

        {% endfor %}
    {% else %}
    <div class=\"small mb-0 p-3\">
        Ещё никто не перешёл по ссылке
    </div>
    {% endif %}
</div>
<!-- Конец Блоки с информацией о переходах -->
{% endif %}
{% endblock %}

{% block js %}
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js\"></script>
<script type=\"text/javascript\" src=\"https://cdn.jsdelivr.net/npm/chartjs-plugin-colorschemes@0.4.0\"></script>

<script>
    \$(document).ready(function() {
        \$(\"#getStat\").click(function() {
            let shortUrl = \$(\"#shortUrl\").val().trim();
            if (shortUrl) {
                code = shortUrl.split('/').pop();
                window.location.replace(`/stat/\${code}`);
            }
        });

        {% if show_stat %}
        var data = {
            labels: {{ chartLabels|raw}},
            datasets: [{
                label: '# of Cities',
                data: {{ chartData }},
            }]
        };

        var ctx = \$(\"#myChart\");

        Chart.defaults.global.legend.display = false;

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                plugins: {
                    colorschemes: {
                        scheme: 'tableau.Classic20'
                    }
                }
            }
        });
        {% endif %}

    });
</script>
{% endblock %}
", "stat.html", "/var/www/voicfy/app/views/stat.html");
    }
}
