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

/* aviability/index.html.twig */
class __TwigTemplate_fef8e19b625533eb295b2a052c890aed extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "aviability/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "aviability/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "aviability/index.html.twig", 1);
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
        echo "Vos disponibilités
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
";
        // line 9
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 9, $this->source); })()), "user", [], "any", false, false, false, 9), "aviability", [], "any", false, false, false, 9) == null)) {
            // line 10
            echo "
    <h1>Si nous n'avez pas de disponibilé renseignées</h1>
    <p><strong>Attention : </strong>La mise en place de vos disponibilité va générer un nombre de rendez selon les informations que vous avez saisie  </br> 
    Une fois celle-ci crée, lors de la modification, vous allez de nouveau générer de nouvelles disponibilités</br>
    Vous pouvez rajouter un nouveau créneau en cas de besoin</p>
    <a class=\"btn btn-primary\" href=\" ";
            // line 15
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("aviabilityNew");
            echo "\">Ajouter vos disponibilité</a>
";
        } else {
            // line 17
            echo "
<div class=\"container d-flex flex-column col-4 mt-4\">

    <h1>Vos disponibilité</h1>

    <p>Disponibilité de départ : ";
            // line 22
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 22, $this->source); })()), "user", [], "any", false, false, false, 22), "aviability", [], "any", false, false, false, 22), "getStartDate", [], "any", false, false, false, 22), "d-m-Y à H:i"), "html", null, true);
            echo " </p>
    <p>Disponibilité de fin : ";
            // line 23
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 23, $this->source); })()), "user", [], "any", false, false, false, 23), "aviability", [], "any", false, false, false, 23), "getEndDate", [], "any", false, false, false, 23), "d-m-Y à H:i"), "html", null, true);
            echo " </p>
    <p>L'heure à laquelle vous voulez commencez : ";
            // line 24
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 24, $this->source); })()), "user", [], "any", false, false, false, 24), "aviability", [], "any", false, false, false, 24), "getStartTime", [], "any", false, false, false, 24), "H:i"), "html", null, true);
            echo " </p>
    <p>L'heure à laquelle vous voulez finir : ";
            // line 25
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 25, $this->source); })()), "user", [], "any", false, false, false, 25), "aviability", [], "any", false, false, false, 25), "getEndTime", [], "any", false, false, false, 25), "H:i"), "html", null, true);
            echo " </p>
    <p>Durée de vos rendez-vous :";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 26, $this->source); })()), "user", [], "any", false, false, false, 26), "aviability", [], "any", false, false, false, 26), "getDurationDate", [], "any", false, false, false, 26), "html", null, true);
            echo "  minutes</p>
    <p>Délai entre vos rendez vous : ";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "user", [], "any", false, false, false, 27), "aviability", [], "any", false, false, false, 27), "getGapDate", [], "any", false, false, false, 27), "html", null, true);
            echo "  minutes</p>

    <p><strong class='text-danger'>Attention : </strong>La mise en place de vos disponibilité à générer un nombre de rendez selon les informations que vous avez saisie </br>
    Je vous conseille d'aller voir la page vos rendez vous </br> <a class=\"btn btn-outline-primary\" href=\" ";
            // line 30
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment_index");
            echo "\">Vos rendez vous</a> </br>
    Une fois celle-ci crée, lors de la modification, vous allez de nouveau générer de nouvelles disponibilités</br>
    Vous pouvez rajouter un nouveau créneau en cas de besoin si vous ne voulez pas par la suite</p>
    <a class=\"btn btn-warning\" href=\"";
            // line 33
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("aviabilityEdit");
            echo "\">Généré de nouvelles disponibilités</a>

</div>

";
        }
        // line 38
        echo "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "aviability/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 38,  146 => 33,  140 => 30,  134 => 27,  130 => 26,  126 => 25,  122 => 24,  118 => 23,  114 => 22,  107 => 17,  102 => 15,  95 => 10,  93 => 9,  90 => 8,  80 => 7,  69 => 4,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}
Vos disponibilités
{% endblock %}

{% block body %}

{% if app.user.aviability == null %}

    <h1>Si nous n'avez pas de disponibilé renseignées</h1>
    <p><strong>Attention : </strong>La mise en place de vos disponibilité va générer un nombre de rendez selon les informations que vous avez saisie  </br> 
    Une fois celle-ci crée, lors de la modification, vous allez de nouveau générer de nouvelles disponibilités</br>
    Vous pouvez rajouter un nouveau créneau en cas de besoin</p>
    <a class=\"btn btn-primary\" href=\" {{ path('aviabilityNew')}}\">Ajouter vos disponibilité</a>
{% else %}

<div class=\"container d-flex flex-column col-4 mt-4\">

    <h1>Vos disponibilité</h1>

    <p>Disponibilité de départ : {{ app.user.aviability.getStartDate | date ('d-m-Y à H:i')}} </p>
    <p>Disponibilité de fin : {{ app.user.aviability.getEndDate | date ('d-m-Y à H:i')}} </p>
    <p>L'heure à laquelle vous voulez commencez : {{ app.user.aviability.getStartTime | date ('H:i')}} </p>
    <p>L'heure à laquelle vous voulez finir : {{ app.user.aviability.getEndTime | date ('H:i')}} </p>
    <p>Durée de vos rendez-vous :{{ app.user.aviability.getDurationDate}}  minutes</p>
    <p>Délai entre vos rendez vous : {{ app.user.aviability.getGapDate}}  minutes</p>

    <p><strong class='text-danger'>Attention : </strong>La mise en place de vos disponibilité à générer un nombre de rendez selon les informations que vous avez saisie </br>
    Je vous conseille d'aller voir la page vos rendez vous </br> <a class=\"btn btn-outline-primary\" href=\" {{ path('app_appointment_index') }}\">Vos rendez vous</a> </br>
    Une fois celle-ci crée, lors de la modification, vous allez de nouveau générer de nouvelles disponibilités</br>
    Vous pouvez rajouter un nouveau créneau en cas de besoin si vous ne voulez pas par la suite</p>
    <a class=\"btn btn-warning\" href=\"{{ path('aviabilityEdit')}}\">Généré de nouvelles disponibilités</a>

</div>

{% endif %}

{% endblock %}", "aviability/index.html.twig", "C:\\laragon\\www\\cs-lane-stage\\Cs_Lane\\templates\\aviability\\index.html.twig");
    }
}
