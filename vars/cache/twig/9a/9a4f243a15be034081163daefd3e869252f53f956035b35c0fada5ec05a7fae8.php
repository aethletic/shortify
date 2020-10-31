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

/* top.html */
class __TwigTemplate_f0f11216a20b67bdfaeeb6b5b513d2a35a56cb5a9857568eb07652ccced5c188 extends Template
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
        $this->parent = $this->loadTemplate("template/template.html", "top.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Топ - ";
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "<div class=\"h4 text-muted\">
    Топ 10 по переходам
</div>
<ul class=\"list-group text-muted\">
";
        // line 10
        if (1 === twig_compare(twig_length_filter($this->env, ($context["top"] ?? null)), 0)) {
            // line 11
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["top"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                // line 12
                echo "        <li class=\"list-group-item small\">
            ";
                // line 13
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 13), "html", null, true);
                echo ". <a href=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "code", [], "any", false, false, false, 13), "html", null, true);
                echo "\" target=\"_blank\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "code", [], "any", false, false, false, 13), "html", null, true);
                echo "</a>

            (Переходов: ";
                // line 15
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "clicks", [], "any", false, false, false, 15), "html", null, true);
                echo ", <a href=\"/stat/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "code", [], "any", false, false, false, 15), "html", null, true);
                echo "\">смотреть статистику</a>)
        </li>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 19
            echo "    Записей не найдено
";
        }
        // line 21
        echo "</ul>

";
    }

    // line 25
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        echo "
";
    }

    public function getTemplateName()
    {
        return "top.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 26,  127 => 25,  121 => 21,  117 => 19,  97 => 15,  88 => 13,  85 => 12,  67 => 11,  65 => 10,  59 => 6,  55 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"template/template.html\" %}

{% block title %}Топ - {% endblock %}

{% block content %}
<div class=\"h4 text-muted\">
    Топ 10 по переходам
</div>
<ul class=\"list-group text-muted\">
{% if top|length > 0 %}
    {% for t in top %}
        <li class=\"list-group-item small\">
            {{ loop.index }}. <a href=\"/{{t.code}}\" target=\"_blank\">{{t.code}}</a>

            (Переходов: {{ t.clicks}}, <a href=\"/stat/{{t.code}}\">смотреть статистику</a>)
        </li>
    {% endfor %}
{% else %}
    Записей не найдено
{% endif %}
</ul>

{% endblock %}

{% block js %}

{% endblock %}
", "top.html", "/var/www/voicfy/app/views/top.html");
    }
}
