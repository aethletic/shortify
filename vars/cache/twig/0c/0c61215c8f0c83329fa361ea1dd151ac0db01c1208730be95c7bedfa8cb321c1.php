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

/* home.html */
class __TwigTemplate_2a459742e520ca8ccd74452d77deb3f25ab42df95804dafbcfb55daea280155a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
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
        $this->parent = $this->loadTemplate("template/template.html", "home.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "<!-- Информация о том что ссылка создана -->
<div id=\"successCreated\" class=\"d-none\">
    <div class=\"alert alert-success alert-dismissible small fade show mb-2\" role=\"alert\">
        <strong>Успешно!</strong> Короткая ссылка успешно создана
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
        </button>
    </div>

    <input id=\"shortUrl\" class=\"form-control mb-2\" type=\"text\" name=\"\" value=\"\" readonly>

    <div class=\"mb-4\">
        <button class=\"btn btn-success\" type=\"button\" name=\"button\" onclick=\"copyToClipboard()\"><i class=\"fas fa-copy\"></i> Скопировать</button>
        <a class=\"btn btn-primary\" href=\"/\">Создать ещё</a>
    </div>

</div>
<!-- Конец Информация о том что ссылка создана -->

<div id=\"errorCreated\" class=\"alert alert-danger alert-dismissible small fade show d-none\" role=\"alert\"></div>

<!-- Блок с ошибкой при создании ссылки -->
";
        // line 28
        if (0 === twig_compare(($context["error"] ?? null), true)) {
            // line 29
            echo "<div class=\"alert alert-danger alert-dismissible small fade show\" role=\"alert\">
    <strong>";
            // line 30
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
        // line 36
        echo "<!-- Конец Блок с ошибкой при создании ссылки -->

<div id=\"main\" class=\"\">
    <!-- Полная ссылка, кнопка -->
    <div class=\"row\">
        <div class=\"col-md-12 col-12 col-sm-12 col-lg-10\">
            <input id=\"fullUrl\" type=\"text\" class=\"form-control \" placeholder=\"https://example.com\" aria-describedby=\"addon-wrapping\">
        </div>

        <div class=\"col-md col col-lg-2 mt-sm-2 mt-lg-0 mt-2 \">
            <button id=\"createShortUrl\" class=\"btn btn-primary w-100\" type=\"button\" name=\"button\">Создать</button>
        </div>
    </div>
    <!-- Конец Полная ссылка, кнопка -->

    <!-- Дополнительные параметры -->
    <div class=\"row\">
        <div class=\"col-auto\">
            <label class=\"mb-0 mt-2 text-muted text-size-14\" for=\"\">Оставьте поле пустым, имя будет сгенирировано автоматически</label>
            <div class=\"input-group flex-nowrap\">
                <div class=\"input-group-prepend\">
                    <span class=\"input-group-text\" id=\"addon-wrapping\"><i class=\"fas fa-link\"></i></span>
                </div>
                <input id=\"code\" type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Короткое имя ссылки\" aria-describedby=\"addon-wrapping\">
            </div>
        </div>

        <div class=\"col-auto\">
            <label class=\"mb-0 mt-2 text-muted text-size-14\" for=\"\">Срок действия ссылки</label>
            <div class=\"input-group\">
                <div class=\"input-group-prepend\">
                    <label class=\"input-group-text\" for=\"inputGroupSelect01\"><i class=\"far fa-calendar-alt\"></i></label>
                </div>
                <select id=\"expire\" class=\"form-control form-control-sm\">
                    <option value=\"1\">1 минута</option>
                    <option value=\"2\">5 минут</option>
                    <option value=\"3\">30 минут</option>
                    <option value=\"4\">1 час</option>
                    <option value=\"5\" selected>День</option>
                    <option value=\"6\">Неделя</option>
                    <option value=\"7\">Месяц</option>
                    <option value=\"0\">Бесконечно</option>
                </select>
            </div>
        </div>
    </div>
    <!-- Конец Дополнительные параметры -->
</div>
";
    }

    // line 86
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 87
        echo "<script type=\"text/javascript\">
    \$(document).ready(function() {
        \$(\"#createShortUrl\").click(function() {
            var data = {};
                data.fullUrl = \$(\"#fullUrl\").val().trim();
                data.code = \$(\"#code\").val().trim();
                data.expire = \$(\"#expire option:selected\").val();

            \$.ajax({
                type: 'POST',
                url: '/api/createShortUrl',
                data: JSON.stringify(data),
                success: function(data) {
                    console.log(data);
                    if (data.error) {
                        \$(\"#errorCreated\").text(data.message);
                        \$(\"#errorCreated\").removeClass('d-none');
                    } else {
                        \$(\"#shortUrl\").val(data.shortUrl);
                        \$(\"#main\").hide();
                        \$(\"#errorCreated\").hide();
                        \$(\"#successCreated\").removeClass();
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    });

    function copyToClipboard() {
        document.querySelector(\"#shortUrl\").select();
        document.execCommand(\"copy\");
    }
</script>
";
    }

    public function getTemplateName()
    {
        return "home.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 87,  150 => 86,  98 => 36,  87 => 30,  84 => 29,  82 => 28,  58 => 6,  54 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"template/template.html\" %}

{% block title %}{% endblock %}

{% block content %}
<!-- Информация о том что ссылка создана -->
<div id=\"successCreated\" class=\"d-none\">
    <div class=\"alert alert-success alert-dismissible small fade show mb-2\" role=\"alert\">
        <strong>Успешно!</strong> Короткая ссылка успешно создана
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
        </button>
    </div>

    <input id=\"shortUrl\" class=\"form-control mb-2\" type=\"text\" name=\"\" value=\"\" readonly>

    <div class=\"mb-4\">
        <button class=\"btn btn-success\" type=\"button\" name=\"button\" onclick=\"copyToClipboard()\"><i class=\"fas fa-copy\"></i> Скопировать</button>
        <a class=\"btn btn-primary\" href=\"/\">Создать ещё</a>
    </div>

</div>
<!-- Конец Информация о том что ссылка создана -->

<div id=\"errorCreated\" class=\"alert alert-danger alert-dismissible small fade show d-none\" role=\"alert\"></div>

<!-- Блок с ошибкой при создании ссылки -->
{% if error == true %}
<div class=\"alert alert-danger alert-dismissible small fade show\" role=\"alert\">
    <strong>{{ caption }}</strong> {{ message }}
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
        <span aria-hidden=\"true\">&times;</span>
    </button>
</div>
{% endif %}
<!-- Конец Блок с ошибкой при создании ссылки -->

<div id=\"main\" class=\"\">
    <!-- Полная ссылка, кнопка -->
    <div class=\"row\">
        <div class=\"col-md-12 col-12 col-sm-12 col-lg-10\">
            <input id=\"fullUrl\" type=\"text\" class=\"form-control \" placeholder=\"https://example.com\" aria-describedby=\"addon-wrapping\">
        </div>

        <div class=\"col-md col col-lg-2 mt-sm-2 mt-lg-0 mt-2 \">
            <button id=\"createShortUrl\" class=\"btn btn-primary w-100\" type=\"button\" name=\"button\">Создать</button>
        </div>
    </div>
    <!-- Конец Полная ссылка, кнопка -->

    <!-- Дополнительные параметры -->
    <div class=\"row\">
        <div class=\"col-auto\">
            <label class=\"mb-0 mt-2 text-muted text-size-14\" for=\"\">Оставьте поле пустым, имя будет сгенирировано автоматически</label>
            <div class=\"input-group flex-nowrap\">
                <div class=\"input-group-prepend\">
                    <span class=\"input-group-text\" id=\"addon-wrapping\"><i class=\"fas fa-link\"></i></span>
                </div>
                <input id=\"code\" type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Короткое имя ссылки\" aria-describedby=\"addon-wrapping\">
            </div>
        </div>

        <div class=\"col-auto\">
            <label class=\"mb-0 mt-2 text-muted text-size-14\" for=\"\">Срок действия ссылки</label>
            <div class=\"input-group\">
                <div class=\"input-group-prepend\">
                    <label class=\"input-group-text\" for=\"inputGroupSelect01\"><i class=\"far fa-calendar-alt\"></i></label>
                </div>
                <select id=\"expire\" class=\"form-control form-control-sm\">
                    <option value=\"1\">1 минута</option>
                    <option value=\"2\">5 минут</option>
                    <option value=\"3\">30 минут</option>
                    <option value=\"4\">1 час</option>
                    <option value=\"5\" selected>День</option>
                    <option value=\"6\">Неделя</option>
                    <option value=\"7\">Месяц</option>
                    <option value=\"0\">Бесконечно</option>
                </select>
            </div>
        </div>
    </div>
    <!-- Конец Дополнительные параметры -->
</div>
{% endblock %}

{% block js %}
<script type=\"text/javascript\">
    \$(document).ready(function() {
        \$(\"#createShortUrl\").click(function() {
            var data = {};
                data.fullUrl = \$(\"#fullUrl\").val().trim();
                data.code = \$(\"#code\").val().trim();
                data.expire = \$(\"#expire option:selected\").val();

            \$.ajax({
                type: 'POST',
                url: '/api/createShortUrl',
                data: JSON.stringify(data),
                success: function(data) {
                    console.log(data);
                    if (data.error) {
                        \$(\"#errorCreated\").text(data.message);
                        \$(\"#errorCreated\").removeClass('d-none');
                    } else {
                        \$(\"#shortUrl\").val(data.shortUrl);
                        \$(\"#main\").hide();
                        \$(\"#errorCreated\").hide();
                        \$(\"#successCreated\").removeClass();
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    });

    function copyToClipboard() {
        document.querySelector(\"#shortUrl\").select();
        document.execCommand(\"copy\");
    }
</script>
{% endblock %}
", "home.html", "/var/www/voicfy/app/views/home.html");
    }
}
