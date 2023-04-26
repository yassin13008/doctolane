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

/* appointment/index.html.twig */
class __TwigTemplate_3c8ae0f9bc43de39ba76e0c8474bdebc extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "appointment/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "appointment/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "appointment/index.html.twig", 1);
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

        echo "La liste de vous rendez-vous ";
        
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
<div class=\"calendrier\"></div>

<div class=\"container\">
    <h1>Vos rendez vous</h1>
    <p>Vous retrouvez ici la liste des patients qui souhaite prendre rendez vous avec vous </br>
    Vous vous pouvez à tous moments voir le détais du patient, modifier ou supprimer le rendez vous en question. </br>
    <strong class=\"text-info\">Remarque : </strong>Si le nom et le prénom ne sont pas inscrit, c'est que personne n'a encore pris ce créneaux </p>

    <table class=\"table\">
        <thead class=\"bg-info\">
            <tr>
                <th scope=\"col\">Nom</th>
                <th scope=\"col\">Prenom</th>
                <th scope=\"col\">Objet</th>
                <th scope=\"col\">Début</th>
                <th scope=\"col\">Fin</th>
                <th scope=\"col\">Action</th>
            </tr>
        </thead>
        <tbody>



        ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["appointments"]) || array_key_exists("appointments", $context) ? $context["appointments"] : (function () { throw new RuntimeError('Variable "appointments" does not exist.', 30, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["appointment"]) {
            // line 31
            echo "            <tr>

            ";
            // line 33
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["appointment"], "patient", [], "any", false, false, false, 33), "first", [], "any", false, false, false, 33) == false)) {
                // line 34
                echo "            <td>Aucun patient n'a pris ce créneax</td>
            <td>Aucun patient n'a pris ce créneax</td>
            ";
            } else {
                // line 37
                echo "                <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["appointment"], "patient", [], "any", false, false, false, 37), "first", [], "method", false, false, false, 37), "lastname", [], "any", false, false, false, 37), "html", null, true);
                echo "</td>
                <td>";
                // line 38
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["appointment"], "patient", [], "any", false, false, false, 38), "first", [], "method", false, false, false, 38), "firstname", [], "any", false, false, false, 38), "html", null, true);
                echo "</td>
            ";
            }
            // line 40
            echo "                <td>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["appointment"], "Title", [], "any", false, false, false, 40), "html", null, true);
            echo "</td>
                <td> <span class=\"text-success\">Début du rendez vous :</span> Le ";
            // line 41
            ((twig_get_attribute($this->env, $this->source, $context["appointment"], "start", [], "any", false, false, false, 41)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["appointment"], "start", [], "any", false, false, false, 41), "d-m-Y à H:i", "Europe/Paris"), "html", null, true))) : (print ("")));
            echo "</td>
                <td> <span class=\"text-danger\">Fin du rendez vous :</span> Le ";
            // line 42
            ((twig_get_attribute($this->env, $this->source, $context["appointment"], "end", [], "any", false, false, false, 42)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["appointment"], "end", [], "any", false, false, false, 42), "d-m-Y à H:i", "Europe/Paris"), "html", null, true))) : (print ("")));
            echo "</td>
                <td>
                    <a class=\"btn btn-outline-primary\" href=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment_show", ["id" => twig_get_attribute($this->env, $this->source, $context["appointment"], "id", [], "any", false, false, false, 44)]), "html", null, true);
            echo "\">Plus de détails</a>
                    <a class=\"btn btn-outline-warning\" href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["appointment"], "id", [], "any", false, false, false, 45)]), "html", null, true);
            echo "\">Modifier votre rendez vous </a>
                </td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 49
            echo "            <tr>
                <td colspan=\"5\">no records found</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['appointment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "        </tbody>
    </table>

</div>
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "appointment/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 53,  167 => 49,  158 => 45,  154 => 44,  149 => 42,  145 => 41,  140 => 40,  135 => 38,  130 => 37,  125 => 34,  123 => 33,  119 => 31,  114 => 30,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}La liste de vous rendez-vous {% endblock %}

{% block body %}

<div class=\"calendrier\"></div>

<div class=\"container\">
    <h1>Vos rendez vous</h1>
    <p>Vous retrouvez ici la liste des patients qui souhaite prendre rendez vous avec vous </br>
    Vous vous pouvez à tous moments voir le détais du patient, modifier ou supprimer le rendez vous en question. </br>
    <strong class=\"text-info\">Remarque : </strong>Si le nom et le prénom ne sont pas inscrit, c'est que personne n'a encore pris ce créneaux </p>

    <table class=\"table\">
        <thead class=\"bg-info\">
            <tr>
                <th scope=\"col\">Nom</th>
                <th scope=\"col\">Prenom</th>
                <th scope=\"col\">Objet</th>
                <th scope=\"col\">Début</th>
                <th scope=\"col\">Fin</th>
                <th scope=\"col\">Action</th>
            </tr>
        </thead>
        <tbody>



        {% for appointment in appointments %}
            <tr>

            {% if appointment.patient.first == false %}
            <td>Aucun patient n'a pris ce créneax</td>
            <td>Aucun patient n'a pris ce créneax</td>
            {% else %}
                <td>{{ appointment.patient.first().lastname }}</td>
                <td>{{ appointment.patient.first().firstname }}</td>
            {% endif %}
                <td>{{ appointment.Title }}</td>
                <td> <span class=\"text-success\">Début du rendez vous :</span> Le {{ appointment.start ? appointment.start|date('d-m-Y à H:i', 'Europe/Paris') : '' }}</td>
                <td> <span class=\"text-danger\">Fin du rendez vous :</span> Le {{ appointment.end ? appointment.end|date('d-m-Y à H:i', 'Europe/Paris') : '' }}</td>
                <td>
                    <a class=\"btn btn-outline-primary\" href=\"{{ path('app_appointment_show', {'id': appointment.id}) }}\">Plus de détails</a>
                    <a class=\"btn btn-outline-warning\" href=\"{{ path('app_appointment_edit', {'id': appointment.id}) }}\">Modifier votre rendez vous </a>
                </td>
            </tr>
        {% else %}
            <tr>
                <td colspan=\"5\">no records found</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

</div>
    {# <a href=\"{{ path('app_appointment_new') }}\">Create new</a> #}
{% endblock %}
", "appointment/index.html.twig", "C:\\laragon\\www\\cs-lane-stage\\Cs_Lane\\templates\\appointment\\index.html.twig");
    }
}
