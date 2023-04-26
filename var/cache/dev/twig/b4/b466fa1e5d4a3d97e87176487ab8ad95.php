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

/* appointment/show.html.twig */
class __TwigTemplate_1fa3f4e91787db6b9553340dc06bf3c3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "appointment/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "appointment/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "appointment/show.html.twig", 1);
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

        echo "Appointment";
        
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
<div class=\"container d-flex flex-column justify-content-around \">
<div class=\"card mt-4\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">Profil du Patient </h5>

    ";
        // line 12
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 12, $this->source); })()), "patient", [], "any", false, false, false, 12), "first", [], "any", false, false, false, 12) == false)) {
            // line 13
            echo "    <p>Pas de patient enregister sur ce créneau</p>
    ";
        } else {
            // line 15
            echo "    <h6 class=\"card-subtitle mb-2 text-muted\">Ici vous verrez les données de l'utilisateur</h6>
    <p class=\"card-text\">Nom : ";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 16, $this->source); })()), "patient", [], "any", false, false, false, 16), "first", [], "method", false, false, false, 16), "lastname", [], "any", false, false, false, 16), "html", null, true);
            echo "</p>
    <p class=\"card-text\">Prenom : ";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 17, $this->source); })()), "patient", [], "any", false, false, false, 17), "first", [], "method", false, false, false, 17), "firstname", [], "any", false, false, false, 17), "html", null, true);
            echo "</p>
    <p class=\"card-text\">Adresse : ";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 18, $this->source); })()), "patient", [], "any", false, false, false, 18), "first", [], "method", false, false, false, 18), "adress", [], "any", false, false, false, 18), "html", null, true);
            echo "</p>
    <p class=\"card-text\">Code Postal : ";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 19, $this->source); })()), "patient", [], "any", false, false, false, 19), "first", [], "method", false, false, false, 19), "postalCode", [], "any", false, false, false, 19), "html", null, true);
            echo "</p>
    <p class=\"card-text\">Ville : ";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 20, $this->source); })()), "patient", [], "any", false, false, false, 20), "first", [], "method", false, false, false, 20), "city", [], "any", false, false, false, 20), "html", null, true);
            echo "</p>
    <p class=\"card-text\">Numéro de téléphone : ";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 21, $this->source); })()), "patient", [], "any", false, false, false, 21), "first", [], "method", false, false, false, 21), "phoneNumber", [], "any", false, false, false, 21), "html", null, true);
            echo "</p>
    <p class=\"card-text\">Email : ";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 22, $this->source); })()), "patient", [], "any", false, false, false, 22), "first", [], "method", false, false, false, 22), "email", [], "any", false, false, false, 22), "html", null, true);
            echo "</p>
    ";
        }
        // line 24
        echo "  </div>
</div>


    <div class=\"container d-flex flex-column justify-content-around \">
    <h1>Plus de détails sur le rendez vous en question </h1>

    <table class=\"table\">
        <tbody>
            ";
        // line 33
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 33, $this->source); })()), "patient", [], "any", false, false, false, 33), "first", [], "any", false, false, false, 33) == false)) {
            // line 34
            echo "            <p>Aucun sujet n'a été donné</p>
            ";
        } else {
            // line 36
            echo "            <tr>
                <th>Sujet du rendez vous ?</th>
                <td>";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 38, $this->source); })()), "Title", [], "any", false, false, false, 38), "html", null, true);
            echo "</td>
            </tr>
            ";
        }
        // line 41
        echo "            <tr>
                <th>Début du rendez-vous </th>
                <td>Le ";
        // line 43
        ((twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 43, $this->source); })()), "start", [], "any", false, false, false, 43)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 43, $this->source); })()), "start", [], "any", false, false, false, 43), "d-m-Y à H:i"), "html", null, true))) : (print ("")));
        echo " </td>
            </tr>
            <tr>
                <th>Fin du rendez-vous</th>
                <td>Le ";
        // line 47
        ((twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 47, $this->source); })()), "end", [], "any", false, false, false, 47)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 47, $this->source); })()), "end", [], "any", false, false, false, 47), "d-m-Y à H:i"), "html", null, true))) : (print ("")));
        echo "</td>
            </tr>
        </tbody>
    </table>


    <a class=\"btn btn-warning col-4\" href=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment_edit", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["appointment"]) || array_key_exists("appointment", $context) ? $context["appointment"] : (function () { throw new RuntimeError('Variable "appointment" does not exist.', 53, $this->source); })()), "id", [], "any", false, false, false, 53)]), "html", null, true);
        echo "\">Modification du rendez vous ! </a>

    ";
        // line 55
        echo twig_include($this->env, $context, "appointment/_delete_form.html.twig");
        echo "
    <a class=\"btn btn-success col-4\" href=\"";
        // line 56
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment_index");
        echo "\">Retour à la liste de vos rendez vous </a>
    </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "appointment/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 56,  186 => 55,  181 => 53,  172 => 47,  165 => 43,  161 => 41,  155 => 38,  151 => 36,  147 => 34,  145 => 33,  134 => 24,  129 => 22,  125 => 21,  121 => 20,  117 => 19,  113 => 18,  109 => 17,  105 => 16,  102 => 15,  98 => 13,  96 => 12,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Appointment{% endblock %}

{% block body %}

<div class=\"container d-flex flex-column justify-content-around \">
<div class=\"card mt-4\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">Profil du Patient </h5>

    {% if appointment.patient.first == false %}
    <p>Pas de patient enregister sur ce créneau</p>
    {% else %}
    <h6 class=\"card-subtitle mb-2 text-muted\">Ici vous verrez les données de l'utilisateur</h6>
    <p class=\"card-text\">Nom : {{appointment.patient.first().lastname }}</p>
    <p class=\"card-text\">Prenom : {{appointment.patient.first().firstname }}</p>
    <p class=\"card-text\">Adresse : {{appointment.patient.first().adress }}</p>
    <p class=\"card-text\">Code Postal : {{appointment.patient.first().postalCode }}</p>
    <p class=\"card-text\">Ville : {{appointment.patient.first().city }}</p>
    <p class=\"card-text\">Numéro de téléphone : {{appointment.patient.first().phoneNumber}}</p>
    <p class=\"card-text\">Email : {{appointment.patient.first().email }}</p>
    {% endif %}
  </div>
</div>


    <div class=\"container d-flex flex-column justify-content-around \">
    <h1>Plus de détails sur le rendez vous en question </h1>

    <table class=\"table\">
        <tbody>
            {% if appointment.patient.first == false %}
            <p>Aucun sujet n'a été donné</p>
            {% else %}
            <tr>
                <th>Sujet du rendez vous ?</th>
                <td>{{ appointment.Title }}</td>
            </tr>
            {% endif %}
            <tr>
                <th>Début du rendez-vous </th>
                <td>Le {{ appointment.start ? appointment.start|date('d-m-Y à H:i') : '' }} </td>
            </tr>
            <tr>
                <th>Fin du rendez-vous</th>
                <td>Le {{ appointment.end ? appointment.end|date('d-m-Y à H:i') : '' }}</td>
            </tr>
        </tbody>
    </table>


    <a class=\"btn btn-warning col-4\" href=\"{{ path('app_appointment_edit', {'id': appointment.id}) }}\">Modification du rendez vous ! </a>

    {{ include('appointment/_delete_form.html.twig') }}
    <a class=\"btn btn-success col-4\" href=\"{{ path('app_appointment_index') }}\">Retour à la liste de vos rendez vous </a>
    </div>
    </div>
{% endblock %}
", "appointment/show.html.twig", "C:\\laragon\\www\\cs-lane-stage\\Cs_Lane\\templates\\appointment\\show.html.twig");
    }
}
