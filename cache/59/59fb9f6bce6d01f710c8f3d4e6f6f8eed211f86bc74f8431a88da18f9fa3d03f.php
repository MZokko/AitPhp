<?php

/* home.twig */
class __TwigTemplate_435f862df5b788ce9e82eb854712046ce6e905b42566203f9b14ab4161cfb863 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<doctype <!DOCTYPE html>
<html>
    <head>
        <link rel=\"stylesheet\" href=\"node_modules/bootstrap/dist/css/bootstrap.css\" />
        <link rel=\"stylesheet\" href=\"node_modules/font-awesome/css/font-awesome.css\" />
        <script src=\"node_modules/jquery/dist/jquery.js\"></script>
        <script src=\"node_modules/boostrap/dist/js/bootstrap.js\"></script>
        <script src=\"node_modules/propper.js/dist/umd/propper.js\"></script>
    </head>
    
    <body>
        <div class=\"container\">
            <div class = \"row\">
               
               ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 16
            echo "                   <div class=\"col-md-3\">
                       <h3>";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "name", array()), "html", null, true);
            echo "</h3>
                       <img class = \"img-fluid\" src=\"images/products/products/";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "image_file_name", array()), "html", null, true);
            echo "\">
                       <h5>";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "price", array()), "html", null, true);
            echo "</h5>
                       <p>";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "description", array()), "html", null, true);
            echo "</p>
                   </div>
               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "                
            </div>
        </div>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 23,  58 => 20,  54 => 19,  50 => 18,  46 => 17,  43 => 16,  39 => 15,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "home.twig", "/home/ubuntu/workspace/templates/home.twig");
    }
}
