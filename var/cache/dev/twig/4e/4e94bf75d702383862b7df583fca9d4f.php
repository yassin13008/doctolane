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

/* aviability/generate.html.twig */
class __TwigTemplate_3db798b7bf79e544c9b1349e06195006 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "aviability/generate.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "aviability/generate.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "aviability/generate.html.twig", 1);
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

        // line 4
        echo "Ajouts de nouvelles dispo
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 7
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 8
        echo "
<div class=\"container d-flex flex-column col-4 mt-4\">

    <div>
        <h2>Rappel de vos anciennes disponibilité</h2>

            <p>Disponibilité de départ : ";
        // line 14
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "user", [], "any", false, false, false, 14), "aviability", [], "any", false, false, false, 14), "getStartDate", [], "any", false, false, false, 14), "d-m-Y à H:i"), "html", null, true);
        echo " </br>
            Disponibilité de fin : ";
        // line 15
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 15, $this->source); })()), "user", [], "any", false, false, false, 15), "aviability", [], "any", false, false, false, 15), "getEndDate", [], "any", false, false, false, 15), "d-m-Y à H:i"), "html", null, true);
        echo " </br>
            L'heure à laquelle vous voulez commencez : ";
        // line 16
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 16, $this->source); })()), "user", [], "any", false, false, false, 16), "aviability", [], "any", false, false, false, 16), "getStartTime", [], "any", false, false, false, 16), "H:i"), "html", null, true);
        echo "</br>
            L'heure à laquelle vous voulez finir : ";
        // line 17
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "user", [], "any", false, false, false, 17), "aviability", [], "any", false, false, false, 17), "getEndTime", [], "any", false, false, false, 17), "H:i"), "html", null, true);
        echo "</br>
            Durée de vos rendez-vous :";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 18, $this->source); })()), "user", [], "any", false, false, false, 18), "aviability", [], "any", false, false, false, 18), "getDurationDate", [], "any", false, false, false, 18), "html", null, true);
        echo "  minutes</br>
            Délai entre vos rendez vous : ";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 19, $this->source); })()), "user", [], "any", false, false, false, 19), "aviability", [], "any", false, false, false, 19), "getGapDate", [], "any", false, false, false, 19), "html", null, true);
        echo "  minutes</p>

        <h3 class=\"text-warning\">Remarque : </h3>
        <p>Vos disponibilité doivent être posterieur à vos anciennes disponibilité. </p>
        <p>Mettre de nouvelles disponibilité va vous faire générer de nouveau créneaux selon les infos que vous avez renseignées mais aussi d'éditer vos disponibilité</br>
        <span class=\"text-danger\">Pour rappel :</span></br> si vous voulez bloquer un créneau, il suffira d'en rajouter un et de le décochez la case disponible </p>

    </div>

    <h2>Mettez vos disponibilités</h1>

    ";
        // line 30
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 30, $this->source); })()), 'form_start');
        echo "

";
        // line 34
        echo "    ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 34, $this->source); })()), "startDate", [], "any", false, false, false, 34), 'row');
        echo "
    ";
        // line 35
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), "endDate", [], "any", false, false, false, 35), 'row');
        echo "
    ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 36, $this->source); })()), "startTime", [], "any", false, false, false, 36), 'row');
        echo "
    ";
        // line 37
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 37, $this->source); })()), "endTime", [], "any", false, false, false, 37), 'row');
        echo "
    ";
        // line 38
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "durationDate", [], "any", false, false, false, 38), 'row');
        echo "
    ";
        // line 39
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "gapDate", [], "any", false, false, false, 39), 'row');
        echo "


    ";
        // line 42
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 42, $this->source); })()), 'widget');
        echo "
<button class=\"btn btn-outline-success\">Confirmer vos disponibilités</button>
    ";
        // line 44
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), 'form_end');
        echo "

</div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "aviability/generate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 44,  164 => 42,  158 => 39,  154 => 38,  150 => 37,  146 => 36,  142 => 35,  137 => 34,  132 => 30,  118 => 19,  114 => 18,  110 => 17,  106 => 16,  102 => 15,  98 => 14,  90 => 8,  80 => 7,  69 => 4,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}
Ajouts de nouvelles dispo
{% endblock %}

{% block body %}

<div class=\"container d-flex flex-column col-4 mt-4\">

    <div>
        <h2>Rappel de vos anciennes disponibilité</h2>

            <p>Disponibilité de départ : {{ app.user.aviability.getStartDate | date ('d-m-Y à H:i')}} </br>
            Disponibilité de fin : {{ app.user.aviability.getEndDate | date ('d-m-Y à H:i')}} </br>
            L'heure à laquelle vous voulez commencez : {{ app.user.aviability.getStartTime | date ('H:i')}}</br>
            L'heure à laquelle vous voulez finir : {{ app.user.aviability.getEndTime | date ('H:i')}}</br>
            Durée de vos rendez-vous :{{ app.user.aviability.getDurationDate}}  minutes</br>
            Délai entre vos rendez vous : {{ app.user.aviability.getGapDate}}  minutes</p>

        <h3 class=\"text-warning\">Remarque : </h3>
        <p>Vos disponibilité doivent être posterieur à vos anciennes disponibilité. </p>
        <p>Mettre de nouvelles disponibilité va vous faire générer de nouveau créneaux selon les infos que vous avez renseignées mais aussi d'éditer vos disponibilité</br>
        <span class=\"text-danger\">Pour rappel :</span></br> si vous voulez bloquer un créneau, il suffira d'en rajouter un et de le décochez la case disponible </p>

    </div>

    <h2>Mettez vos disponibilités</h1>

    {{ form_start(form)}}

{# Fait attention, les attributs que j'ai rejouté à mon formulaire sont inscript en JSON TYPE #}
{# Je le l'ai pas fait sur le email et user name car deja fait sur le fichier RegistrationType pour pas engorger la page twig #}
    {{form_row(form.startDate)}}
    {{form_row(form.endDate)}}
    {{form_row(form.startTime)}}
    {{form_row(form.endTime)}}
    {{form_row(form.durationDate)}}
    {{form_row(form.gapDate)}}


    {{ form_widget(form)}}
<button class=\"btn btn-outline-success\">Confirmer vos disponibilités</button>
    {{ form_end(form)}}

</div>

{% endblock %}", "aviability/generate.html.twig", "C:\\laragon\\www\\cs-lane-stage\\Cs_Lane\\templates\\aviability\\generate.html.twig");
    }
}
