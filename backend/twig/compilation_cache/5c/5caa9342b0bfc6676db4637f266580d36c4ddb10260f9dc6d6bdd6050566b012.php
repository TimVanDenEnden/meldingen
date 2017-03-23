<?php

/* empty.tpl */
class __TwigTemplate_91c52ccfd7661fba7281481541db6f450b23ee058b26c7f486dc791e88c205c4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>

<head>
    <meta charset=\"UTF-8\">
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <title>Meldingen</title>
    <!-- Favicon-->
    <link rel=\"icon\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/favicon.jpg\" type=\"image/x-icon\">

    <!-- Google Fonts -->
    <link href=\"https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\" type=\"text/css\">

    <!-- Bootstrap Core Css -->
    <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/bootstrap/css/bootstrap.css\" rel=\"stylesheet\">

    <!-- Waves Effect Css -->
    <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/node-waves/waves.css\" rel=\"stylesheet\" />

    <!--WaitMe Css-->
    <link href=\"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/waitme/waitMe.css\" rel=\"stylesheet\" />

        <!-- Bootstrap Material Datetime Picker Css -->
    <link href=\"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css\" rel=\"stylesheet\" />

    <!-- Bootstrap Select Css -->
    <link href=\"";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/bootstrap-select/css/bootstrap-select.css\" rel=\"stylesheet\" />

    <!-- Animation Css -->
    <link href=\"";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/animate-css/animate.css\" rel=\"stylesheet\" />

    <!-- Custom Css -->
    <link href=\"";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/css/style.css\" rel=\"stylesheet\">
    <link href=\"";
        // line 35
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/css/meldingen.css\" rel=\"stylesheet\">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href=\"";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/css/themes/all-themes.css\" rel=\"stylesheet\" />
</head>

<body class=\"theme-red\">
    <!-- Page Loader -->
    <div class=\"page-loader-wrapper\">
        <div class=\"loader\">
            <div class=\"preloader\">
                <div class=\"spinner-layer pl-red\">
                    <div class=\"circle-clipper left\">
                        <div class=\"circle\"></div>
                    </div>
                    <div class=\"circle-clipper right\">
                        <div class=\"circle\"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <section style=\"display: none\">
        <aside id=\"leftsidebar\" class=\"sidebar\">
            <div class=\"menu\">
                <ul class=\"list\">
                    <li class=\"header active\"></li>
                </ul>
            </div>
        </aside>
    </section>
    <section class=\"content\">
\t\t";
        // line 68
        echo (isset($context["CONTENT"]) ? $context["CONTENT"] : null);
        echo "
    </section>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
    <script>
        \$('.btn-toggle').click(function() {
            \$(this).find('.btn').toggleClass('active');  
            
            if (\$(this).find('.btn-primary').size()>0) {
                \$(this).find('.btn').toggleClass('btn-primary');
            }
            if (\$(this).find('.btn-danger').size()>0) {
                \$(this).find('.btn').toggleClass('btn-danger');
            }
            if (\$(this).find('.btn-success').size()>0) {
                \$(this).find('.btn').toggleClass('btn-success');
            }
            if (\$(this).find('.btn-info').size()>0) {
                \$(this).find('.btn').toggleClass('btn-info');
            }
            
            \$(this).find('.btn').toggleClass('btn-default');
               
        });
    </script>

    <!-- Jquery Core Js -->
    <script src=\"";
        // line 94
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/jquery/jquery.min.js\"></script>

    <!-- Bootstrap Core Js -->
    <script src=\"";
        // line 97
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/bootstrap/js/bootstrap.js\"></script>

    <!-- Select Plugin Js -->
    <script src=\"";
        // line 100
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/bootstrap-select/js/bootstrap-select.js\"></script>

    <!-- Slimscroll Plugin Js -->
    <script src=\"";
        // line 103
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/jquery-slimscroll/jquery.slimscroll.js\"></script>

        <!-- Autosize Plugin Js -->
    <script src=\"";
        // line 106
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/autosize/autosize.js\"></script>

    <!-- Waves Effect Plugin Js -->
    <script src=\"";
        // line 109
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/node-waves/waves.js\"></script>

    <!-- Moment Plugin Js -->
    <script src=\"";
        // line 112
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/momentjs/moment.js\"></script>

    <!-- Wait Me Plugin Js -->
    <script src=\"";
        // line 115
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/waitme/waitMe.js\"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src=\"";
        // line 118
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js\"></script>

    <!-- Custom Js -->
    <script src=\"";
        // line 121
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/js/admin.js\"></script>
    <script src=\"";
        // line 122
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/js/pages/cards/basic.js\"></script>
    <script src=\"";
        // line 123
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/js/pages/forms/basic-form-elements.js\"></script>

    <!-- Demo Js -->
    <script src=\"";
        // line 126
        echo twig_escape_filter($this->env, (isset($context["SiteURL"]) ? $context["SiteURL"] : null), "html", null, true);
        echo "frontend/assets/js/demo.js\"></script>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "empty.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 126,  209 => 123,  205 => 122,  201 => 121,  195 => 118,  189 => 115,  183 => 112,  177 => 109,  171 => 106,  165 => 103,  159 => 100,  153 => 97,  147 => 94,  118 => 68,  85 => 38,  79 => 35,  75 => 34,  69 => 31,  63 => 28,  57 => 25,  51 => 22,  45 => 19,  39 => 16,  29 => 9,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "empty.tpl", "G:\\School\\AO - Projecten\\Meldingen\\frontend\\templates\\empty.tpl");
    }
}
