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

/* home/index.html.twig */
class __TwigTemplate_e659c89bac579917d9616ff1e4278d4c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "home/index.html.twig", 1);
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

        echo "Bienvenue sur Docto Lane
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        echo "
";
        // line 8
        if ( !twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 8, $this->source); })()), "user", [], "any", false, false, false, 8)) {
            // line 9
            echo "

    <div class=\"container d-flex flex-column justify-content-around \">

\t<div class=\"\">
\t\t<h1>Bienvenue sur Docto Lane! ✅</h1>

\t\t    <p>Ce site va vous permettre de prendre rendez vous avec des
\t\t\t    <strong class=\"text-danger\">professionnels de la santé
\t\t\t    </strong>
\t\t    </p>
\t\t    <p>Nous avons une liste de spécialiste et d'expert non-exhaustive qui vous permettra de trouver le professionnel qui vous faut !</p>

\t\t    <p>Pour vous :
\t\t\t    <strong class=\"text-danger\">professionnel de la santé
\t\t\t    </strong>
\t\t    </p>
\t\t    <p>Nous vous mettons à disposition un système de rendez-vous personnalisable</p>
\t\t    <p>Vous serez en mesure de :</p>
\t                </br>
\t                Contactez vos patients
                    </br>
                    Gérer vos disponibilité
                    </br>
                    Annuler ou modifier un rendez vous !
            </p>
            <p>Convaincu ?</p>
        </div>
        <div class=\"d-flex justify-content-around\">
            <a href=\" ";
            // line 38
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("register");
            echo "\" class=\"btn btn-success\">Inscrivez vous en tant que particulier</a>
            <a href=\"";
            // line 39
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("registerPro");
            echo "\" class=\"btn btn-danger\">Inscrivez vous en tant que professionnels de la santé</a>
        </div>
    </div>

";
        } elseif ((twig_get_attribute($this->env, $this->source,         // line 43
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 43, $this->source); })()), "user", [], "any", false, false, false, 43) && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER"))) {
            // line 44
            echo "
\t<div class=\"container d-flex flex-column justify-content-around \">
\t\t<div class=\"\">
\t\t<h1>Bienvenue sur Docto Lane! Cher patient !!! ✅</h1>

\t\t    <p>Ce site va vous permettre de prendre rendez vous avec des
\t\t\t    <strong class=\"text-danger\">professionnels de la santé
\t\t\t    </strong>
\t\t    </p>
\t\t    <p>Nous avons une liste de spécialiste et d'expert non-exhaustive qui vous permettra de trouver le professionnel qui vous faut !</p>

\t\t    <p>Une barre de recherche est mis en place pour que vous cherchez le spécialiste qu'il vous faut selon les professionnels enregistrés sur notre site </p>
\t\t\t<p>Vous pouvez aussi modifier votre profils </p>
\t\t\t<a href=\"";
            // line 57
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("profilePatient");
            echo "\" class=\"btn btn-outline-secondary\">Accedez à votre profil !</a>
        </div>
\t</div>

";
        } elseif ((twig_get_attribute($this->env, $this->source,         // line 61
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 61, $this->source); })()), "user", [], "any", false, false, false, 61) && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_DOCTOR"))) {
            // line 62
            echo "
\t<div class=\"container d-flex flex-column justify-content-around \">
\t\t<div class=\"\">
\t\t<h1>Bienvenue sur Docto Lane! Cher professionnel !!! ✅</h1>

\t\t    <p>Ce site va vous permettre de gérer les patients qui souhaite prendre rendez-vous avec vous mais aussi de les contacter en cas de besoin 
\t\t    </p>
\t\t\t<p>Vous pouvez aussi modifier votre profils </p>
\t\t\t<a href=\"";
            // line 70
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("profileProfessionnal");
            echo "\" class=\"btn btn-outline-secondary\">Accedez à votre profil !</a>
        </div>
\t</div>
";
        }
        // line 74
        echo "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "home/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 74,  172 => 70,  162 => 62,  160 => 61,  153 => 57,  138 => 44,  136 => 43,  129 => 39,  125 => 38,  94 => 9,  92 => 8,  89 => 7,  79 => 6,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Bienvenue sur Docto Lane
{% endblock %}

{% block body %}

{% if not app.user %}


    <div class=\"container d-flex flex-column justify-content-around \">

\t<div class=\"\">
\t\t<h1>Bienvenue sur Docto Lane! ✅</h1>

\t\t    <p>Ce site va vous permettre de prendre rendez vous avec des
\t\t\t    <strong class=\"text-danger\">professionnels de la santé
\t\t\t    </strong>
\t\t    </p>
\t\t    <p>Nous avons une liste de spécialiste et d'expert non-exhaustive qui vous permettra de trouver le professionnel qui vous faut !</p>

\t\t    <p>Pour vous :
\t\t\t    <strong class=\"text-danger\">professionnel de la santé
\t\t\t    </strong>
\t\t    </p>
\t\t    <p>Nous vous mettons à disposition un système de rendez-vous personnalisable</p>
\t\t    <p>Vous serez en mesure de :</p>
\t                </br>
\t                Contactez vos patients
                    </br>
                    Gérer vos disponibilité
                    </br>
                    Annuler ou modifier un rendez vous !
            </p>
            <p>Convaincu ?</p>
        </div>
        <div class=\"d-flex justify-content-around\">
            <a href=\" {{path('register')}}\" class=\"btn btn-success\">Inscrivez vous en tant que particulier</a>
            <a href=\"{{ path('registerPro')}}\" class=\"btn btn-danger\">Inscrivez vous en tant que professionnels de la santé</a>
        </div>
    </div>

{% elseif app.user and is_granted('ROLE_USER') %}

\t<div class=\"container d-flex flex-column justify-content-around \">
\t\t<div class=\"\">
\t\t<h1>Bienvenue sur Docto Lane! Cher patient !!! ✅</h1>

\t\t    <p>Ce site va vous permettre de prendre rendez vous avec des
\t\t\t    <strong class=\"text-danger\">professionnels de la santé
\t\t\t    </strong>
\t\t    </p>
\t\t    <p>Nous avons une liste de spécialiste et d'expert non-exhaustive qui vous permettra de trouver le professionnel qui vous faut !</p>

\t\t    <p>Une barre de recherche est mis en place pour que vous cherchez le spécialiste qu'il vous faut selon les professionnels enregistrés sur notre site </p>
\t\t\t<p>Vous pouvez aussi modifier votre profils </p>
\t\t\t<a href=\"{{ path('profilePatient')}}\" class=\"btn btn-outline-secondary\">Accedez à votre profil !</a>
        </div>
\t</div>

{% elseif app.user and is_granted('ROLE_DOCTOR') %}

\t<div class=\"container d-flex flex-column justify-content-around \">
\t\t<div class=\"\">
\t\t<h1>Bienvenue sur Docto Lane! Cher professionnel !!! ✅</h1>

\t\t    <p>Ce site va vous permettre de gérer les patients qui souhaite prendre rendez-vous avec vous mais aussi de les contacter en cas de besoin 
\t\t    </p>
\t\t\t<p>Vous pouvez aussi modifier votre profils </p>
\t\t\t<a href=\"{{ path('profileProfessionnal')}}\" class=\"btn btn-outline-secondary\">Accedez à votre profil !</a>
        </div>
\t</div>
{% endif %}

{% endblock %}

", "home/index.html.twig", "C:\\laragon\\www\\cs-lane-stage\\Cs_Lane\\templates\\home\\index.html.twig");
    }
}
