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

/* appointment/edit.html.twig */
class __TwigTemplate_2d679289fe543638f44a8ede8879ad3c extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "appointment/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "appointment/edit.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "appointment/edit.html.twig", 1);
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

        echo "Edit Appointment";
        
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
<div class=\"container d-flex flex-column justify-content-around col-6\">
<h1 class=\"text-center mt-5\">Votre calendrier de rendez vous </h1>
<p>Ce calendrier corresponds à vos disponibilité</p>
<p>Il vous servira de repère pour prévoir votre nouveau rendez vous </p>
<div id=\"calendrier\"></div>

<div class=\"container d-flex flex-column justify-content-around \">
    <h3>ATTENTION :</h3>
    <p>La modification des heures de rendez vous respecte certaines règles </br>
    Nous vous avons mis un calendrier pour que vous puissiez voir vos créneaux afficher </br>
    Si vous modifiez la date et l'heure de rendez vous, la date doit se situer <strong class=\"text-danger\"> après le dernier rendez vous généré par vos disponibilités. </strong> </br>
    La date de votre rendez vous doit toujours être après la dernière date de votre rendez-vous</br>
    <strong class=\"text-danger\">ATTENTION : </strong> En décochant la disponibilité, vous rendez le rendez-vous indisponible </br>
    <strong class=\"text-warning\">INFOS :</strong>Lorsqu'un client prends ce créneaux, il devient automatique indisponible
    Si vous voulez crée un nouveau rendez vous, cliquer juste ici <a class=\"nav-link btn btn-outline-primary\" href=\" ";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("newAppointment", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 21, $this->source); })()), "user", [], "any", false, false, false, 21), "id", [], "any", false, false, false, 21)]), "html", null, true);
        echo "\">Créer un nouveau rendez vous </a></br>
    </p>
</div>

<div class=\"container d-flex flex-column justify-content-around \">
    <h2>Modifiez la date et le sujet du rendez vous </h1>


    ";
        // line 29
        echo twig_include($this->env, $context, "appointment/_form.html.twig", ["button_label" => "Mise à jour"]);
        echo "

    <a class =\"btn btn-outline-info col-4\"href=\"";
        // line 31
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment_index");
        echo "\">Retour à la liste</a>

    ";
        // line 33
        echo twig_include($this->env, $context, "appointment/_delete_form.html.twig");
        echo "

</div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 39
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 40
        echo "<script>
    window.onload = ()=> {
        let calendarElt = document.querySelector('#calendrier');

        let calendar = new FullCalendar.Calendar(calendarElt, {
            initialView: 'timeGridWeek',
            locale: 'fr',
            timeZone : 'Europe/Paris',
            headerToolbar: {
                start: 'prev, next today',
                center: 'title',
                end: 'dayGridMonth, timeGridWeek'
            },
            events: ";
        // line 53
        echo (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 53, $this->source); })());
        echo "
        })

        calendar.render();
    }
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "appointment/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 53,  152 => 40,  142 => 39,  127 => 33,  122 => 31,  117 => 29,  106 => 21,  89 => 6,  79 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Edit Appointment{% endblock %}

{% block body %}

<div class=\"container d-flex flex-column justify-content-around col-6\">
<h1 class=\"text-center mt-5\">Votre calendrier de rendez vous </h1>
<p>Ce calendrier corresponds à vos disponibilité</p>
<p>Il vous servira de repère pour prévoir votre nouveau rendez vous </p>
<div id=\"calendrier\"></div>

<div class=\"container d-flex flex-column justify-content-around \">
    <h3>ATTENTION :</h3>
    <p>La modification des heures de rendez vous respecte certaines règles </br>
    Nous vous avons mis un calendrier pour que vous puissiez voir vos créneaux afficher </br>
    Si vous modifiez la date et l'heure de rendez vous, la date doit se situer <strong class=\"text-danger\"> après le dernier rendez vous généré par vos disponibilités. </strong> </br>
    La date de votre rendez vous doit toujours être après la dernière date de votre rendez-vous</br>
    <strong class=\"text-danger\">ATTENTION : </strong> En décochant la disponibilité, vous rendez le rendez-vous indisponible </br>
    <strong class=\"text-warning\">INFOS :</strong>Lorsqu'un client prends ce créneaux, il devient automatique indisponible
    Si vous voulez crée un nouveau rendez vous, cliquer juste ici <a class=\"nav-link btn btn-outline-primary\" href=\" {{ path('newAppointment', {id : app.user.id}) }}\">Créer un nouveau rendez vous </a></br>
    </p>
</div>

<div class=\"container d-flex flex-column justify-content-around \">
    <h2>Modifiez la date et le sujet du rendez vous </h1>


    {{ include('appointment/_form.html.twig', {'button_label': 'Mise à jour'}) }}

    <a class =\"btn btn-outline-info col-4\"href=\"{{ path('app_appointment_index') }}\">Retour à la liste</a>

    {{ include('appointment/_delete_form.html.twig') }}

</div>
</div>
{% endblock %}

{% block javascripts %}
<script>
    window.onload = ()=> {
        let calendarElt = document.querySelector('#calendrier');

        let calendar = new FullCalendar.Calendar(calendarElt, {
            initialView: 'timeGridWeek',
            locale: 'fr',
            timeZone : 'Europe/Paris',
            headerToolbar: {
                start: 'prev, next today',
                center: 'title',
                end: 'dayGridMonth, timeGridWeek'
            },
            events: {{ data|raw}}
        })

        calendar.render();
    }
</script>
{% endblock %}
", "appointment/edit.html.twig", "C:\\laragon\\www\\cs-lane-stage\\Cs_Lane\\templates\\appointment\\edit.html.twig");
    }
}
