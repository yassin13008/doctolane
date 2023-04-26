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

/* professionnal_list/show.html.twig */
class __TwigTemplate_0df5c6e64f000cb01a6f36e3fc42c11b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "professionnal_list/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "professionnal_list/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "professionnal_list/show.html.twig", 1);
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

        echo "Votre professionnel de santé ";
        
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

    <h1 class=\"text-center\"> Votre professionnel de santé en détail !✅</h1>


    <div class=\"card container d-flex flex-column justify-content-around \" style=\"width: 30rem;\">
        <img src=\"https://img.freepik.com/vecteurs-premium/icone-medecin-avatar-blanc_136162-58.jpg?w=826\" class=\"card-img-top\" alt=\"...\">
        <div class=\"card-body\">
            <h5 class=\"card-title\"> ";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["professionnal"]) || array_key_exists("professionnal", $context) ? $context["professionnal"] : (function () { throw new RuntimeError('Variable "professionnal" does not exist.', 14, $this->source); })()), "lastname", [], "any", false, false, false, 14), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["professionnal"]) || array_key_exists("professionnal", $context) ? $context["professionnal"] : (function () { throw new RuntimeError('Variable "professionnal" does not exist.', 14, $this->source); })()), "firstname", [], "any", false, false, false, 14), "html", null, true);
        echo "</h5>
            <p class=\"card-text\">Adresse : ";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["professionnal"]) || array_key_exists("professionnal", $context) ? $context["professionnal"] : (function () { throw new RuntimeError('Variable "professionnal" does not exist.', 15, $this->source); })()), "adress", [], "any", false, false, false, 15), "html", null, true);
        echo "</p>
            <p class=\"card-text\">Code postal:  ";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["professionnal"]) || array_key_exists("professionnal", $context) ? $context["professionnal"] : (function () { throw new RuntimeError('Variable "professionnal" does not exist.', 16, $this->source); })()), "postalCode", [], "any", false, false, false, 16), "html", null, true);
        echo "</p>
            <p class=\"card-text\">Ville : ";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["professionnal"]) || array_key_exists("professionnal", $context) ? $context["professionnal"] : (function () { throw new RuntimeError('Variable "professionnal" does not exist.', 17, $this->source); })()), "city", [], "any", false, false, false, 17), "html", null, true);
        echo "</p>
            <p class=\"card-text\">E-mail : ";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["professionnal"]) || array_key_exists("professionnal", $context) ? $context["professionnal"] : (function () { throw new RuntimeError('Variable "professionnal" does not exist.', 18, $this->source); })()), "email", [], "any", false, false, false, 18), "html", null, true);
        echo "</p>
            <p class=\"card-text\">Numéro de téléphone : ";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["professionnal"]) || array_key_exists("professionnal", $context) ? $context["professionnal"] : (function () { throw new RuntimeError('Variable "professionnal" does not exist.', 19, $this->source); })()), "phoneNumber", [], "any", false, false, false, 19), "html", null, true);
        echo "</p>
            <p class=\"card-text\">Spécialité : ";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["professionnal"]) || array_key_exists("professionnal", $context) ? $context["professionnal"] : (function () { throw new RuntimeError('Variable "professionnal" does not exist.', 20, $this->source); })()), "speciality", [], "any", false, false, false, 20), "getSpecialityLabel", [], "any", false, false, false, 20), "html", null, true);
        echo "</p>
            <p class=\"card-text\">Expertise : ";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["professionnal"]) || array_key_exists("professionnal", $context) ? $context["professionnal"] : (function () { throw new RuntimeError('Variable "professionnal" does not exist.', 21, $this->source); })()), "expertises", [], "any", false, false, false, 21), "html", null, true);
        echo "</p>
            <a href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contactPro", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["professionnal"]) || array_key_exists("professionnal", $context) ? $context["professionnal"] : (function () { throw new RuntimeError('Variable "professionnal" does not exist.', 22, $this->source); })()), "id", [], "any", false, false, false, 22)]), "html", null, true);
        echo "\" class=\"btn btn-outline-info\">Envoyez un email ?</a>
        </div>
    </div>
    <div class=\"card container d-flex flex-column justify-content-around \" style=\"widtth: 30rem\">

        <h2>Les créneau disponible de votre praticien</h2>

        ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["appointments"]) || array_key_exists("appointments", $context) ? $context["appointments"] : (function () { throw new RuntimeError('Variable "appointments" does not exist.', 29, $this->source); })()), "data", [], "any", false, false, false, 29));
        foreach ($context['_seq'] as $context["_key"] => $context["appointment"]) {
            // line 30
            echo "
        ";
            // line 31
            if ((twig_get_attribute($this->env, $this->source, $context["appointment"], "isDispo", [], "any", false, false, false, 31) == false)) {
                // line 32
                echo "        
        <div class=\"card-body\">


            <p>Jour et heure du créneau  : Le ";
                // line 36
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["appointment"], "getStart", [], "any", false, false, false, 36), "d-m-Y à H-i"), "html", null, true);
                echo "</p>
            <a class=\"btn btn-warning disabled\" href=\"#\">Ce créneau n'est plus disponible </a>

        ";
            } else {
                // line 40
                echo "        
            
            <p>Jour et heure du créneau  : ";
                // line 42
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["appointment"], "getStart", [], "any", false, false, false, 42), "d-m-Y à H-i"), "html", null, true);
                echo "</p>
            <a class=\"btn btn-success col-2\" href=\"";
                // line 43
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("addAppointment", ["id" => twig_get_attribute($this->env, $this->source, $context["appointment"], "id", [], "any", false, false, false, 43)]), "html", null, true);
                echo "\">Prendre ce créneau ?</a>

        ";
            }
            // line 46
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['appointment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "
        ";
        // line 48
        $context["path"] = "show";
        // line 49
        echo "        ";
        $context["pro"] = twig_get_attribute($this->env, $this->source, (isset($context["professionnal"]) || array_key_exists("professionnal", $context) ? $context["professionnal"] : (function () { throw new RuntimeError('Variable "professionnal" does not exist.', 49, $this->source); })()), "id", [], "any", false, false, false, 49);
        // line 50
        echo "        ";
        $context["pages"] = twig_get_attribute($this->env, $this->source, (isset($context["appointments"]) || array_key_exists("appointments", $context) ? $context["appointments"] : (function () { throw new RuntimeError('Variable "appointments" does not exist.', 50, $this->source); })()), "pages", [], "any", false, false, false, 50);
        // line 51
        echo "        ";
        $context["currentPage"] = twig_get_attribute($this->env, $this->source, (isset($context["appointments"]) || array_key_exists("appointments", $context) ? $context["appointments"] : (function () { throw new RuntimeError('Variable "appointments" does not exist.', 51, $this->source); })()), "page", [], "any", false, false, false, 51);
        // line 52
        echo "
        ";
        // line 53
        $this->loadTemplate("_partials/_pagination.html.twig", "professionnal_list/show.html.twig", 53)->display($context);
        // line 54
        echo "        </div>

    </div>



";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "professionnal_list/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  203 => 54,  201 => 53,  198 => 52,  195 => 51,  192 => 50,  189 => 49,  187 => 48,  184 => 47,  178 => 46,  172 => 43,  168 => 42,  164 => 40,  157 => 36,  151 => 32,  149 => 31,  146 => 30,  142 => 29,  132 => 22,  128 => 21,  124 => 20,  120 => 19,  116 => 18,  112 => 17,  108 => 16,  104 => 15,  98 => 14,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Votre professionnel de santé {% endblock %}

{% block body %}


    <h1 class=\"text-center\"> Votre professionnel de santé en détail !✅</h1>


    <div class=\"card container d-flex flex-column justify-content-around \" style=\"width: 30rem;\">
        <img src=\"https://img.freepik.com/vecteurs-premium/icone-medecin-avatar-blanc_136162-58.jpg?w=826\" class=\"card-img-top\" alt=\"...\">
        <div class=\"card-body\">
            <h5 class=\"card-title\"> {{ professionnal.lastname}} {{ professionnal.firstname}}</h5>
            <p class=\"card-text\">Adresse : {{ professionnal.adress}}</p>
            <p class=\"card-text\">Code postal:  {{ professionnal.postalCode}}</p>
            <p class=\"card-text\">Ville : {{ professionnal.city}}</p>
            <p class=\"card-text\">E-mail : {{ professionnal.email}}</p>
            <p class=\"card-text\">Numéro de téléphone : {{ professionnal.phoneNumber}}</p>
            <p class=\"card-text\">Spécialité : {{ professionnal.speciality.getSpecialityLabel}}</p>
            <p class=\"card-text\">Expertise : {{ professionnal.expertises}}</p>
            <a href=\"{{ path('contactPro', {id : professionnal.id}) }}\" class=\"btn btn-outline-info\">Envoyez un email ?</a>
        </div>
    </div>
    <div class=\"card container d-flex flex-column justify-content-around \" style=\"widtth: 30rem\">

        <h2>Les créneau disponible de votre praticien</h2>

        {% for appointment in appointments.data %}

        {% if appointment.isDispo == false %}
        
        <div class=\"card-body\">


            <p>Jour et heure du créneau  : Le {{ appointment.getStart | date('d-m-Y à H-i')}}</p>
            <a class=\"btn btn-warning disabled\" href=\"#\">Ce créneau n'est plus disponible </a>

        {% else %}
        
            
            <p>Jour et heure du créneau  : {{ appointment.getStart | date('d-m-Y à H-i')}}</p>
            <a class=\"btn btn-success col-2\" href=\"{{ path('addAppointment', {id : appointment.id})}}\">Prendre ce créneau ?</a>

        {% endif %}
        {% endfor %}

        {% set path = 'show' %}
        {% set pro = professionnal.id %}
        {% set pages = appointments.pages %}
        {% set currentPage = appointments.page %}

        {% include \"_partials/_pagination.html.twig\" %}
        </div>

    </div>



{% endblock %}
", "professionnal_list/show.html.twig", "C:\\laragon\\www\\cs-lane-stage\\Cs_Lane\\templates\\professionnal_list\\show.html.twig");
    }
}
