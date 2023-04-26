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

/* _partials/_nav.html.twig */
class __TwigTemplate_ba082b756ab3a59b586f3fcf6d036d71 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_nav.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_nav.html.twig"));

        // line 1
        echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-primary\">
  <div class=\"container-fluid\">
    <a class=\"navbar-brand\" href=\"";
        // line 3
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        echo "\">DOCTOLANE</a>
    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarColor02\" aria-controls=\"navbarColor02\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
      <span class=\"navbar-toggler-icon\"></span>
    </button>
    <div class=\"collapse navbar-collapse\" id=\"navbarColor02\">
      <ul class=\"navbar-nav me-auto\">
    ";
        // line 9
        if ( !twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 9, $this->source); })()), "user", [], "any", false, false, false, 9)) {
            // line 10
            echo "    
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"";
            // line 12
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
            echo "\">Acceuil
          </a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"";
            // line 16
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("connexion");
            echo "\">Connexion</a>
        </li>
      
    ";
        } elseif ((twig_get_attribute($this->env, $this->source,         // line 19
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 19, $this->source); })()), "user", [], "any", false, false, false, 19) && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER"))) {
            // line 20
            echo "        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"";
            // line 21
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("profilePatient");
            echo "\">Votre profil</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"";
            // line 24
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_search_pro");
            echo "\">Recherchez votre professionnel de santé</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\" ";
            // line 27
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_professionnal_list");
            echo "\">Liste des professionnel</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"";
            // line 30
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            echo "\">Deconnexion</a>
        </li>
    ";
        } elseif ((twig_get_attribute($this->env, $this->source,         // line 32
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 32, $this->source); })()), "user", [], "any", false, false, false, 32) && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_DOCTOR"))) {
            // line 33
            echo "        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"";
            // line 34
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("profileProfessionnal");
            echo "\">Votre profil</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"";
            // line 37
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("aviability");
            echo "\">Vos disponibilités </a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\" ";
            // line 40
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_appointment_index");
            echo "\">Vos rendez vous</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\" ";
            // line 43
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("newAppointment", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 43, $this->source); })()), "user", [], "any", false, false, false, 43), "id", [], "any", false, false, false, 43)]), "html", null, true);
            echo "\">Créer un nouveau rendez vous </a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"";
            // line 46
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            echo "\">Deconnexion</a>
        </li>

    ";
        }
        // line 50
        echo "    </div>
  </div>
</nav>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "_partials/_nav.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 50,  132 => 46,  126 => 43,  120 => 40,  114 => 37,  108 => 34,  105 => 33,  103 => 32,  98 => 30,  92 => 27,  86 => 24,  80 => 21,  77 => 20,  75 => 19,  69 => 16,  62 => 12,  58 => 10,  56 => 9,  47 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\"navbar navbar-expand-lg navbar-dark bg-primary\">
  <div class=\"container-fluid\">
    <a class=\"navbar-brand\" href=\"{{ path('home')}}\">DOCTOLANE</a>
    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarColor02\" aria-controls=\"navbarColor02\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
      <span class=\"navbar-toggler-icon\"></span>
    </button>
    <div class=\"collapse navbar-collapse\" id=\"navbarColor02\">
      <ul class=\"navbar-nav me-auto\">
    {% if not app.user %}
    
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"{{ path('home')}}\">Acceuil
          </a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"{{ path('connexion')}}\">Connexion</a>
        </li>
      
    {% elseif app.user and is_granted('ROLE_USER') %}
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"{{ path('profilePatient')}}\">Votre profil</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"{{ path('app_search_pro')}}\">Recherchez votre professionnel de santé</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\" {{ path('app_professionnal_list') }}\">Liste des professionnel</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"{{ path('app_logout')}}\">Deconnexion</a>
        </li>
    {% elseif app.user and is_granted('ROLE_DOCTOR') %}
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"{{ path('profileProfessionnal')}}\">Votre profil</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"{{ path('aviability')}}\">Vos disponibilités </a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\" {{ path('app_appointment_index') }}\">Vos rendez vous</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\" {{ path('newAppointment', {id : app.user.id}) }}\">Créer un nouveau rendez vous </a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"{{ path('app_logout')}}\">Deconnexion</a>
        </li>

    {% endif %}
    </div>
  </div>
</nav>", "_partials/_nav.html.twig", "C:\\laragon\\www\\cs-lane-stage\\Cs_Lane\\templates\\_partials\\_nav.html.twig");
    }
}
