<?php

/* GlavBundle:Servicio:index.html.twig */
class __TwigTemplate_7b3bfc8007c449cee4befbcd583b2f59ecdb1511f13e441997386ba12ebd539c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GlavBundle::layoutAdmin.html.twig", "GlavBundle:Servicio:index.html.twig", 1);
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

    // line 3
    public function block_infoUserTop($context, array $blocks = array())
    {
        // line 4
        echo "    <h1>Servicio list</h1>
    ";
        // line 7
        echo "        <div id=\"informacion\">

    <table class=\"table table-striped table-bordered bootstrap-datatable datatable\">

        <thead>
            <tr>
                <th>Id</th>
                <th>Modelo</th>
                <th>Matricula</th>
                <th>Empleado</th>
                <th>Estadoservicio</th>
                <th>Observacion</th>
                <th>Fecha_servicio</th>
                <th>Fecha_entrega</th>
                <th>Pago</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Modelo</th>
                <th>Matricula</th>
                <th>Empleado</th>
                <th>Estadoservicio</th>
                <th>Observacion</th>
                <th>Fecha_servicio</th>
                <th>Fecha_entrega</th>
                <th>Pago</th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody>
        ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 41
            echo "            <tr>
                <td><a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("servicio_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "id", array()), "html", null, true);
            echo "</a></td>
                <td>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "modelo", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "matricula", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "empleado", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "estado_servicio", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "observacion", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 48
            if ($this->getAttribute($context["entity"], "fecha_servicio", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "fecha_servicio", array()), "Y-m-d H:i:s"), "html", null, true);
            }
            echo "</td>
                <td>";
            // line 49
            if ($this->getAttribute($context["entity"], "fecha_entrega", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "fecha_entrega", array()), "Y-m-d H:i:s"), "html", null, true);
            }
            echo "</td>
                <td>";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "pago", array()), "html", null, true);
            echo "</td>
                <td>
                <ul>
                    <li>
                        <a href=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("servicio_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">show</a>
                    </li>
                    <li>
                        <a href=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("servicio_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">edit</a>
                    </li>
                </ul>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "        </tbody>
    </table>

        <ul>
        <li>
            <a href=\"";
        // line 68
        echo $this->env->getExtension('routing')->getPath("servicio_new");
        echo "\">
                Create a new entry
            </a>
        </li>
    </ul>
    </div>

    ";
    }

    public function getTemplateName()
    {
        return "GlavBundle:Servicio:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 68,  139 => 63,  127 => 57,  121 => 54,  114 => 50,  108 => 49,  102 => 48,  98 => 47,  94 => 46,  90 => 45,  86 => 44,  82 => 43,  76 => 42,  73 => 41,  69 => 40,  34 => 7,  31 => 4,  28 => 3,  11 => 1,);
    }
}
