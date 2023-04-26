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

/* professionnal_list/index.html.twig */
class __TwigTemplate_90d0f480b1e426fa43b300f3ac044e1e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "professionnal_list/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "professionnal_list/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "professionnal_list/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Liste des professionnes ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "

    <h1 class=\"text-center\"> Liste des professionnels inscrits ✅</h1>

    
";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["professionnals"]) || array_key_exists("professionnals", $context) ? $context["professionnals"] : (function () { throw new RuntimeError('Variable "professionnals" does not exist.', 11, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["professionnal"]) {
            // line 12
            echo "
    <div class=\"card container d-flex flex-column justify-content-around mt-2\" style=\"width: 30rem;\">
        <img src=\"https://img.freepik.com/vecteurs-premium/icone-medecin-avatar-blanc_136162-58.jpg?w=826\" class=\"card-img-top\" alt=\"...\">
        <div class=\"card-body\">
            <h5 class=\"card-title\"> ";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["professionnal"], "lastname", [], "any", false, false, false, 16), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["professionnal"], "firstname", [], "any", false, false, false, 16), "html", null, true);
            echo "</h5>
            <p class=\"card-text\">Adresse : ";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["professionnal"], "lastname", [], "any", false, false, false, 17), "html", null, true);
            echo "</p>
            <p class=\"card-text\">Code postal:  ";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["professionnal"], "lastname", [], "any", false, false, false, 18), "html", null, true);
            echo "</p>
            <p class=\"card-text\">Ville : ";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["professionnal"], "lastname", [], "any", false, false, false, 19), "html", null, true);
            echo "</p>
            <p class=\"card-text\">Spécialité : ";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["professionnal"], "speciality", [], "any", false, false, false, 20), "getSpecialityLabel", [], "any", false, false, false, 20), "html", null, true);
            echo "</p>
            <p class=\"card-text\">Expertise : ";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["professionnal"], "expertises", [], "any", false, false, false, 21), "html", null, true);
            echo "</p>

            <a href=\" ";
            // line 23
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_professionnal_show", ["id" => twig_get_attribute($this->env, $this->source, $context["professionnal"], "id", [], "any", false, false, false, 23)]), "html", null, true);
            echo "\" class=\"btn btn-primary\">En savoir plus </a>
            <a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contactPro", ["id" => twig_get_attribute($this->env, $this->source, $context["professionnal"], "id", [], "any", false, false, false, 24)]), "html", null, true);
            echo "\" class=\"btn btn-info\">Envoyez un email ?</a>
        </div>
    </div>

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['professionnal'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "professionnal_list/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 29,  136 => 24,  132 => 23,  127 => 21,  123 => 20,  119 => 19,  115 => 18,  111 => 17,  105 => 16,  99 => 12,  95 => 11,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Liste des professionnes {% endblock %}

{% block body %}


    <h1 class=\"text-center\"> Liste des professionnels inscrits ✅</h1>

    
{% for professionnal in professionnals %}

    <div class=\"card container d-flex flex-column justify-content-around mt-2\" style=\"width: 30rem;\">
        <img src=\"https://img.freepik.com/vecteurs-premium/icone-medecin-avatar-blanc_136162-58.jpg?w=826\" class=\"card-img-top\" alt=\"...\">
        <div class=\"card-body\">
            <h5 class=\"card-title\"> {{ professionnal.lastname}} {{ professionnal.firstname}}</h5>
            <p class=\"card-text\">Adresse : {{ professionnal.lastname}}</p>
            <p class=\"card-text\">Code postal:  {{ professionnal.lastname}}</p>
            <p class=\"card-text\">Ville : {{ professionnal.lastname}}</p>
            <p class=\"card-text\">Spécialité : {{ professionnal.speciality.getSpecialityLabel}}</p>
            <p class=\"card-text\">Expertise : {{ professionnal.expertises}}</p>

            <a href=\" {{ path('app_professionnal_show', {id : professionnal.id}) }}\" class=\"btn btn-primary\">En savoir plus </a>
            <a href=\"{{ path('contactPro', {id : professionnal.id}) }}\" class=\"btn btn-info\">Envoyez un email ?</a>
        </div>
    </div>

{% endfor %}


{% endblock %}
", "professionnal_list/index.html.twig", "C:\\laragon\\www\\cs-lane-stage\\Cs_Lane\\templates\\professionnal_list\\index.html.twig");
    }
}
