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

/* _partials/_pagination.html.twig */
class __TwigTemplate_22a87e8869a00e35a12b7426c1435fd8 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_pagination.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_pagination.html.twig"));

        // line 1
        if (((isset($context["pages"]) || array_key_exists("pages", $context) ? $context["pages"] : (function () { throw new RuntimeError('Variable "pages" does not exist.', 1, $this->source); })()) > 1)) {
            // line 2
            echo "
    <nav class=\"mt-2 pt-2\">
        <ul class=\"pagination\">
            <li class=\"page-item\">
            ";
            // line 6
            if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 6, $this->source); })()) > 1)) {
                // line 7
                echo "                <a href=\" ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 7, $this->source); })()), ["id" => (isset($context["pro"]) || array_key_exists("pro", $context) ? $context["pro"] : (function () { throw new RuntimeError('Variable "pro" does not exist.', 7, $this->source); })()), "page" => ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 7, $this->source); })()) - 1)]), "html", null, true);
                echo "\" class=\"page-link\">&lt;</a>
            ";
            } else {
                // line 9
                echo "                <a href=\" ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 9, $this->source); })()), ["id" => (isset($context["pro"]) || array_key_exists("pro", $context) ? $context["pro"] : (function () { throw new RuntimeError('Variable "pro" does not exist.', 9, $this->source); })()), "page" => ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 9, $this->source); })()) - 1)]), "html", null, true);
                echo "\" class=\"page-link disabled\">&lt;</a>
            ";
            }
            // line 11
            echo "            </li>
            ";
            // line 12
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["pages"]) || array_key_exists("pages", $context) ? $context["pages"] : (function () { throw new RuntimeError('Variable "pages" does not exist.', 12, $this->source); })())));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 13
                echo "                <li class=\"page-item ";
                echo ((($context["page"] == (isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 13, $this->source); })()))) ? ("active") : (""));
                echo "\">
                    <a href=\" ";
                // line 14
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 14, $this->source); })()), ["id" => (isset($context["pro"]) || array_key_exists("pro", $context) ? $context["pro"] : (function () { throw new RuntimeError('Variable "pro" does not exist.', 14, $this->source); })()), "page" => $context["page"]]), "html", null, true);
                echo "\" class=\"page-link\">";
                echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                echo "</a>
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "            <li class=\"page-item\">
            ";
            // line 18
            if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 18, $this->source); })()) < (isset($context["pages"]) || array_key_exists("pages", $context) ? $context["pages"] : (function () { throw new RuntimeError('Variable "pages" does not exist.', 18, $this->source); })()))) {
                // line 19
                echo "                <a href=\" ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 19, $this->source); })()), ["id" => (isset($context["pro"]) || array_key_exists("pro", $context) ? $context["pro"] : (function () { throw new RuntimeError('Variable "pro" does not exist.', 19, $this->source); })()), "page" => ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 19, $this->source); })()) + 1)]), "html", null, true);
                echo "\" class=\"page-link\">&gt;</a>
            ";
            } else {
                // line 21
                echo "                <a href=\" ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 21, $this->source); })()), ["id" => (isset($context["pro"]) || array_key_exists("pro", $context) ? $context["pro"] : (function () { throw new RuntimeError('Variable "pro" does not exist.', 21, $this->source); })()), "page" => ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 21, $this->source); })()) + 1)]), "html", null, true);
                echo "\" class=\"page-link disabled\">&gt;</a>
            ";
            }
            // line 23
            echo "            </li>
        </ul>
    </nav>
";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "_partials/_pagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 23,  99 => 21,  93 => 19,  91 => 18,  88 => 17,  77 => 14,  72 => 13,  68 => 12,  65 => 11,  59 => 9,  53 => 7,  51 => 6,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if pages > 1 %}

    <nav class=\"mt-2 pt-2\">
        <ul class=\"pagination\">
            <li class=\"page-item\">
            {% if currentPage > 1 %}
                <a href=\" {{ path(path, {id : pro, page: currentPage - 1}) }}\" class=\"page-link\">&lt;</a>
            {% else %}
                <a href=\" {{ path(path, {id : pro, page: currentPage - 1}) }}\" class=\"page-link disabled\">&lt;</a>
            {% endif %}
            </li>
            {% for page in 1..pages %}
                <li class=\"page-item {{ (page == currentPage) ? 'active' : ''}}\">
                    <a href=\" {{ path(path, {id : pro, page: page}) }}\" class=\"page-link\">{{ page }}</a>
                </li>
            {% endfor %}
            <li class=\"page-item\">
            {% if currentPage < pages %}
                <a href=\" {{ path(path, {id : pro, page: currentPage + 1}) }}\" class=\"page-link\">&gt;</a>
            {% else %}
                <a href=\" {{ path(path, {id : pro, page: currentPage + 1}) }}\" class=\"page-link disabled\">&gt;</a>
            {% endif %}
            </li>
        </ul>
    </nav>
{% endif %}
", "_partials/_pagination.html.twig", "C:\\laragon\\www\\cs-lane-stage\\Cs_Lane\\templates\\_partials\\_pagination.html.twig");
    }
}
