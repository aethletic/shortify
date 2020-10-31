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

/* template/template.html */
class __TwigTemplate_462050b373ad3028f33b441421ef885d4974f4695be968e376c8662383dd32ee extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'css' => [$this, 'block_css'],
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
            'js' => [$this, 'block_js'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html lang=\"en\">

<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"theme-color\" content=\"#007bff\" />

    <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"favicon.png\">
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/app.css\">

    ";
        // line 15
        $this->displayBlock('css', $context, $blocks);
        // line 16
        echo "
    <title>";
        // line 17
        $this->displayBlock('title', $context, $blocks);
        echo "Shortify</title>
</head>

<body>
    <div class=\"container\">
        <!-- Шапка -->
        <header>
            <div class=\"row\">
                <div class=\"col\">
                    <a class=\"shortify-logo text-primary\" href=\"/\">
                        shortify.
                    </a>

                </div>

                <div class=\"col-12 col-sm-auto col-md-auto col-lg-auto m-0 my-auto\">
                    <div class=\"row\">
                        <div class=\"col-auto\">
                            <a href=\"/\" class=\"btn btn-link p-0 mt-1 mb-2 mb-sm-0 mb-md-0 mb-lg-0 nav-item\">Создать</a>
                        </div>
                        <div class=\"col-auto\">
                            <a href=\"/stat\" class=\"btn btn-link p-0 mt-1 mb-2 mb-sm-0 mb-md-0 mb-lg-0 nav-item\">Статистика</a>
                        </div>
                        <div class=\"col-auto\">
                            <a href=\"/top\" class=\"btn btn-link p-0 mt-1 mb-2 mb-sm-0 mb-md-0 mb-lg-0 nav-item\">Топ</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"lead text-size-14 mt-0 mb-sm-4 mb-md-4 mb-lg-4 mb-0 d-none d-sm-block d-md-block\">
                Создание коротких ссылок без регистрации
            </div>
        </header>
        <!-- Конец Шапка -->

        ";
        // line 53
        $this->displayBlock('content', $context, $blocks);
        // line 54
        echo "    </div>

    <!--<footer>-->
    <!--\t<div class=\"text-center text-muted small mt-4\">&copy; 2020 Shortify.</div>-->
    <!--</footer>-->

    <script src=\"https://code.jquery.com/jquery-3.4.1.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\" integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\" crossorigin=\"anonymous\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js\" integrity=\"sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6\" crossorigin=\"anonymous\"></script>

    ";
        // line 64
        $this->displayBlock('js', $context, $blocks);
        // line 65
        echo "</body>

</html>
";
    }

    // line 15
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 17
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 53
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 64
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "template/template.html";
    }

    public function getDebugInfo()
    {
        return array (  142 => 64,  136 => 53,  130 => 17,  124 => 15,  117 => 65,  115 => 64,  103 => 54,  101 => 53,  62 => 17,  59 => 16,  57 => 15,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"en\">

<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"theme-color\" content=\"#007bff\" />

    <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"favicon.png\">
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/app.css\">

    {% block css %}{% endblock %}

    <title>{% block title %}{% endblock %}Shortify</title>
</head>

<body>
    <div class=\"container\">
        <!-- Шапка -->
        <header>
            <div class=\"row\">
                <div class=\"col\">
                    <a class=\"shortify-logo text-primary\" href=\"/\">
                        shortify.
                    </a>

                </div>

                <div class=\"col-12 col-sm-auto col-md-auto col-lg-auto m-0 my-auto\">
                    <div class=\"row\">
                        <div class=\"col-auto\">
                            <a href=\"/\" class=\"btn btn-link p-0 mt-1 mb-2 mb-sm-0 mb-md-0 mb-lg-0 nav-item\">Создать</a>
                        </div>
                        <div class=\"col-auto\">
                            <a href=\"/stat\" class=\"btn btn-link p-0 mt-1 mb-2 mb-sm-0 mb-md-0 mb-lg-0 nav-item\">Статистика</a>
                        </div>
                        <div class=\"col-auto\">
                            <a href=\"/top\" class=\"btn btn-link p-0 mt-1 mb-2 mb-sm-0 mb-md-0 mb-lg-0 nav-item\">Топ</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"lead text-size-14 mt-0 mb-sm-4 mb-md-4 mb-lg-4 mb-0 d-none d-sm-block d-md-block\">
                Создание коротких ссылок без регистрации
            </div>
        </header>
        <!-- Конец Шапка -->

        {% block content %}{% endblock %}
    </div>

    <!--<footer>-->
    <!--\t<div class=\"text-center text-muted small mt-4\">&copy; 2020 Shortify.</div>-->
    <!--</footer>-->

    <script src=\"https://code.jquery.com/jquery-3.4.1.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\" integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\" crossorigin=\"anonymous\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js\" integrity=\"sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6\" crossorigin=\"anonymous\"></script>

    {% block js %}{% endblock %}
</body>

</html>
", "template/template.html", "/var/www/voicfy/app/views/template/template.html");
    }
}
