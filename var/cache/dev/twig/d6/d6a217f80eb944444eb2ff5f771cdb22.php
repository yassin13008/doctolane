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

/* search_pro/index.html.twig */
class __TwigTemplate_9930e677315d13d085e1bbb780a77511 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 2
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "search_pro/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "search_pro/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "search_pro/index.html.twig", 2);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 5
        echo "
<div class=\"container d-flex flex-column col-4 mt-4\">
<div>
    <div></div>
    <h1>Rechercher un professionnel de santé</h1>

    ";
        // line 11
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 11, $this->source); })()), 'form_start');
        echo "
    <p>Recherchez votre professionnel de santé par </p>
    ";
        // line 13
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), "postalCodeOrCity", [], "any", false, false, false, 13), 'row');
        echo "
    <p>Et/ou bien par la spécialités du professionnel</p>
    ";
        // line 15
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 15, $this->source); })()), "speciality", [], "any", false, false, false, 15), 'row');
        echo "
    ";
        // line 16
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 16, $this->source); })()), "search", [], "any", false, false, false, 16), 'row');
        echo "
    ";
        // line 17
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), 'form_end');
        echo "
</div>





<div>
    ";
        // line 25
        if ((((twig_length_filter($this->env, (isset($context["professionals"]) || array_key_exists("professionals", $context) ? $context["professionals"] : (function () { throw new RuntimeError('Variable "professionals" does not exist.', 25, $this->source); })())) == 0) && (twig_length_filter($this->env, (isset($context["speciality"]) || array_key_exists("speciality", $context) ? $context["speciality"] : (function () { throw new RuntimeError('Variable "speciality" does not exist.', 25, $this->source); })())) != 0)) || ((twig_length_filter($this->env, (isset($context["professionals"]) || array_key_exists("professionals", $context) ? $context["professionals"] : (function () { throw new RuntimeError('Variable "professionals" does not exist.', 25, $this->source); })())) != 0) && (twig_length_filter($this->env, (isset($context["speciality"]) || array_key_exists("speciality", $context) ? $context["speciality"] : (function () { throw new RuntimeError('Variable "speciality" does not exist.', 25, $this->source); })())) == 0)))) {
            // line 26
            echo "    
    <h1>Résultats de la recherche</h1>

            ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["professionals"]) || array_key_exists("professionals", $context) ? $context["professionals"] : (function () { throw new RuntimeError('Variable "professionals" does not exist.', 29, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["professional"]) {
                // line 30
                echo "        <div class=\"card\">
                <div class=\"card-header\"> Spécialité : ";
                // line 31
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["professional"], "speciality", [], "any", false, false, false, 31), "getSpecialityLabel", [], "any", false, false, false, 31), "html", null, true);
                echo " </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">Mr ";
                // line 33
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["professional"], "lastname", [], "any", false, false, false, 33), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["professional"], "firstname", [], "any", false, false, false, 33), "html", null, true);
                echo "</h5>
                <p class=\"card-text\">Expertises : ";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["professional"], "expertises", [], "any", false, false, false, 34), "html", null, true);
                echo "</p>
                <a href=\" ";
                // line 35
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_professionnal_show", ["id" => twig_get_attribute($this->env, $this->source, $context["professional"], "id", [], "any", false, false, false, 35)]), "html", null, true);
                echo "\" class=\"btn btn-info\">En savoir plus </a>
            </div>
        </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['professional'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "        
    ";
        } elseif (((        // line 40
(isset($context["professionals"]) || array_key_exists("professionals", $context) ? $context["professionals"] : (function () { throw new RuntimeError('Variable "professionals" does not exist.', 40, $this->source); })()) == 0) && (twig_length_filter($this->env, (isset($context["speciality"]) || array_key_exists("speciality", $context) ? $context["speciality"] : (function () { throw new RuntimeError('Variable "speciality" does not exist.', 40, $this->source); })())) == 0))) {
            // line 41
            echo "        <p>Pas de résultat pour le moment...</p>
    ";
        }
        // line 43
        echo "</div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "search_pro/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 43,  149 => 41,  147 => 40,  144 => 39,  134 => 35,  130 => 34,  124 => 33,  119 => 31,  116 => 30,  112 => 29,  107 => 26,  105 => 25,  94 => 17,  90 => 16,  86 => 15,  81 => 13,  76 => 11,  68 => 5,  58 => 4,  35 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("
{% extends 'base.html.twig' %}

{% block body %}

<div class=\"container d-flex flex-column col-4 mt-4\">
<div>
    <div></div>
    <h1>Rechercher un professionnel de santé</h1>

    {{ form_start(form) }}
    <p>Recherchez votre professionnel de santé par </p>
    {{ form_row(form.postalCodeOrCity) }}
    <p>Et/ou bien par la spécialités du professionnel</p>
    {{ form_row(form.speciality) }}
    {{ form_row(form.search) }}
    {{ form_end(form) }}
</div>





<div>
    {% if professionals|length == 0 and speciality|length != 0 or professionals|length != 0 and speciality|length == 0 %}
    
    <h1>Résultats de la recherche</h1>

            {% for professional in professionals %}
        <div class=\"card\">
                <div class=\"card-header\"> Spécialité : {{ professional.speciality.getSpecialityLabel}} </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">Mr {{ professional.lastname }} {{ professional.firstname }}</h5>
                <p class=\"card-text\">Expertises : {{ professional.expertises}}</p>
                <a href=\" {{ path('app_professionnal_show', {id : professional.id}) }}\" class=\"btn btn-info\">En savoir plus </a>
            </div>
        </div>
            {% endfor %}
        
    {% elseif professionals == 0 and speciality|length == 0  %}
        <p>Pas de résultat pour le moment...</p>
    {% endif %}
</div>
</div>
{% endblock %}", "search_pro/index.html.twig", "C:\\laragon\\www\\cs-lane-stage\\Cs_Lane\\templates\\search_pro\\index.html.twig");
    }
}
