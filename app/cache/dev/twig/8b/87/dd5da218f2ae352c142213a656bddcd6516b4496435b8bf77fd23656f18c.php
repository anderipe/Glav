<?php

/* GlavBundle:Factura:new.html.twig */
class __TwigTemplate_8b87dd5da218f2ae352c142213a656bddcd6516b4496435b8bf77fd23656f18c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GlavBundle::layoutAdmin.html.twig", "GlavBundle:Factura:new.html.twig", 1);
        $this->blocks = array(
            'infoUserTop' => array($this, 'block_infoUserTop'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GlavBundle::layoutAdmin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_infoUserTop($context, array $blocks = array())
    {
        echo "\\
<form id=\"factura\" action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("factura_guardar");
        echo "\" method=\"post\" enctype=\"multipart/form-data\" >

    <h1>Factura creation</h1>
<input type=\"hidden\" id=\"usuario\" name=\"usuario\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()), "html", null, true);
        echo "\">

    ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formF"]) ? $context["formF"] : $this->getContext($context, "formF")), 'widget');
        echo "
    <div id=\"informacion\">
        <input type=\"text\" id=\"neto\" name=\"neto\">
        <input type=\"text\" id=\"total\" name=\"total\">


    </div>


    ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "

        <ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("factura");
        echo "\">
        
            <input type=\"submit\" value=\"Guardar\"/>
            Back to the list
        </a>
    </li>
</ul>

</form>
<script type=\"text/javascript\">

window.onload = function() {
    \$('#glavbundle_facturadetalle_id_servicio').on('change', function() {
    //alert( \$(this).find(\":selected\").val());
    servicioId = \$(this).find(\":selected\").val();
    //\$('#informacion').load('";
        // line 38
        echo $this->env->getExtension('routing')->getPath("factura_valor");
        echo "',
            //\$('#dialogoBox').hide();
            \$('#informacion').load('";
        // line 40
        echo $this->env->getExtension('routing')->getPath("factura_valor");
        echo "',{servicioId:servicioId},function()
            {
            });

});
}

function  enviar(){
        alert('hola');

\$.ajax({
        type: \"POST\",
        url: \"";
        // line 52
        echo $this->env->getExtension('routing')->getPath("factura_guardar");
        echo "\",
        data: \$('#factura').serialize(),
        success: function (data)
        {

        }
 });

}
</script>

";
    }

    public function getTemplateName()
    {
        return "GlavBundle:Factura:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 52,  86 => 40,  81 => 38,  63 => 23,  56 => 19,  44 => 10,  39 => 8,  33 => 5,  28 => 4,  11 => 1,);
    }
}
