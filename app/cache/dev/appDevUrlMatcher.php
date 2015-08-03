<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/prestamo')) {
            // prestamo
            if (rtrim($pathinfo, '/') === '/prestamo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'prestamo');
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\PrestamoController::indexAction',  '_route' => 'prestamo',);
            }

            // prestamo_show
            if (preg_match('#^/prestamo/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'prestamo_show')), array (  '_controller' => 'GlavBundle\\Controller\\PrestamoController::showAction',));
            }

            // prestamo_new
            if ($pathinfo === '/prestamo/new') {
                return array (  '_controller' => 'GlavBundle\\Controller\\PrestamoController::newAction',  '_route' => 'prestamo_new',);
            }

            // prestamo_create
            if ($pathinfo === '/prestamo/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_prestamo_create;
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\PrestamoController::createAction',  '_route' => 'prestamo_create',);
            }
            not_prestamo_create:

            // prestamo_edit
            if (preg_match('#^/prestamo/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'prestamo_edit')), array (  '_controller' => 'GlavBundle\\Controller\\PrestamoController::editAction',));
            }

            // prestamo_update
            if (preg_match('#^/prestamo/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_prestamo_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'prestamo_update')), array (  '_controller' => 'GlavBundle\\Controller\\PrestamoController::updateAction',));
            }
            not_prestamo_update:

            // prestamo_delete
            if (preg_match('#^/prestamo/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_prestamo_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'prestamo_delete')), array (  '_controller' => 'GlavBundle\\Controller\\PrestamoController::deleteAction',));
            }
            not_prestamo_delete:

            // prestamo_total
            if ($pathinfo === '/prestamo/valor') {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_prestamo_total;
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\PrestamoController::totalPrestamoAction',  '_route' => 'prestamo_total',);
            }
            not_prestamo_total:

        }

        if (0 === strpos($pathinfo, '/factura')) {
            if (0 === strpos($pathinfo, '/facturadetalle')) {
                // facturadetalle
                if (rtrim($pathinfo, '/') === '/facturadetalle') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'facturadetalle');
                    }

                    return array (  '_controller' => 'GlavBundle\\Controller\\FacturaDetalleController::indexAction',  '_route' => 'facturadetalle',);
                }

                // facturadetalle_show
                if (preg_match('#^/facturadetalle/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'facturadetalle_show')), array (  '_controller' => 'GlavBundle\\Controller\\FacturaDetalleController::showAction',));
                }

                // facturadetalle_new
                if ($pathinfo === '/facturadetalle/new') {
                    return array (  '_controller' => 'GlavBundle\\Controller\\FacturaDetalleController::newAction',  '_route' => 'facturadetalle_new',);
                }

                // facturadetalle_create
                if ($pathinfo === '/facturadetalle/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_facturadetalle_create;
                    }

                    return array (  '_controller' => 'GlavBundle\\Controller\\FacturaDetalleController::createAction',  '_route' => 'facturadetalle_create',);
                }
                not_facturadetalle_create:

                // facturadetalle_edit
                if (preg_match('#^/facturadetalle/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'facturadetalle_edit')), array (  '_controller' => 'GlavBundle\\Controller\\FacturaDetalleController::editAction',));
                }

                // facturadetalle_update
                if (preg_match('#^/facturadetalle/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_facturadetalle_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'facturadetalle_update')), array (  '_controller' => 'GlavBundle\\Controller\\FacturaDetalleController::updateAction',));
                }
                not_facturadetalle_update:

                // facturadetalle_delete
                if (preg_match('#^/facturadetalle/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_facturadetalle_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'facturadetalle_delete')), array (  '_controller' => 'GlavBundle\\Controller\\FacturaDetalleController::deleteAction',));
                }
                not_facturadetalle_delete:

            }

            // factura
            if (rtrim($pathinfo, '/') === '/factura') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'factura');
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\FacturaController::indexAction',  '_route' => 'factura',);
            }

            // factura_show
            if (preg_match('#^/factura/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'factura_show')), array (  '_controller' => 'GlavBundle\\Controller\\FacturaController::showAction',));
            }

            // factura_new
            if ($pathinfo === '/factura/new') {
                return array (  '_controller' => 'GlavBundle\\Controller\\FacturaController::newAction',  '_route' => 'factura_new',);
            }

            // factura_create
            if ($pathinfo === '/factura/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_factura_create;
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\FacturaController::createAction',  '_route' => 'factura_create',);
            }
            not_factura_create:

            // factura_edit
            if (preg_match('#^/factura/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'factura_edit')), array (  '_controller' => 'GlavBundle\\Controller\\FacturaController::editAction',));
            }

            // factura_update
            if (preg_match('#^/factura/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_factura_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'factura_update')), array (  '_controller' => 'GlavBundle\\Controller\\FacturaController::updateAction',));
            }
            not_factura_update:

            // factura_delete
            if (preg_match('#^/factura/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_factura_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'factura_delete')), array (  '_controller' => 'GlavBundle\\Controller\\FacturaController::deleteAction',));
            }
            not_factura_delete:

            // factura_valor
            if ($pathinfo === '/factura/valor') {
                return array (  '_controller' => 'GlavBundle\\Controller\\FacturaController::valorServicioAction',  '_route' => 'factura_valor',);
            }

            // factura_guardar
            if ($pathinfo === '/factura/guardar') {
                return array (  '_controller' => 'GlavBundle\\Controller\\FacturaController::guardarFacturaAction',  '_route' => 'factura_guardar',);
            }

            // factura_buscar_cliente
            if ($pathinfo === '/factura/buscar') {
                return array (  '_controller' => 'GlavBundle\\Controller\\FacturaController::buscarClienteAction',  '_route' => 'factura_buscar_cliente',);
            }

            // factura_imprimir
            if (0 === strpos($pathinfo, '/factura/imprimir') && preg_match('#^/factura/imprimir/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'factura_imprimir')), array (  '_controller' => 'GlavBundle\\Controller\\FacturaController::imprimirAction',));
            }

        }

        if (0 === strpos($pathinfo, '/servicio')) {
            // servicio
            if (rtrim($pathinfo, '/') === '/servicio') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'servicio');
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\ServicioController::indexAction',  '_route' => 'servicio',);
            }

            // servicio_show
            if (preg_match('#^/servicio/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_show')), array (  '_controller' => 'GlavBundle\\Controller\\ServicioController::showAction',));
            }

            // servicio_new
            if ($pathinfo === '/servicio/new') {
                return array (  '_controller' => 'GlavBundle\\Controller\\ServicioController::newAction',  '_route' => 'servicio_new',);
            }

            // servicio_create
            if ($pathinfo === '/servicio/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_servicio_create;
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\ServicioController::createAction',  '_route' => 'servicio_create',);
            }
            not_servicio_create:

            // servicio_edit
            if (preg_match('#^/servicio/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_edit')), array (  '_controller' => 'GlavBundle\\Controller\\ServicioController::editAction',));
            }

            // servicio_update
            if (preg_match('#^/servicio/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_servicio_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_update')), array (  '_controller' => 'GlavBundle\\Controller\\ServicioController::updateAction',));
            }
            not_servicio_update:

            // servicio_delete
            if (preg_match('#^/servicio/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_servicio_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_delete')), array (  '_controller' => 'GlavBundle\\Controller\\ServicioController::deleteAction',));
            }
            not_servicio_delete:

            // servicio_buscar_matricula
            if ($pathinfo === '/servicio/matricula') {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_servicio_buscar_matricula;
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\ServicioController::buscarMatriculaAction',  '_route' => 'servicio_buscar_matricula',);
            }
            not_servicio_buscar_matricula:

        }

        if (0 === strpos($pathinfo, '/automotor')) {
            // automotor
            if (rtrim($pathinfo, '/') === '/automotor') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'automotor');
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\AutomotorController::indexAction',  '_route' => 'automotor',);
            }

            // automotor_show
            if (preg_match('#^/automotor/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'automotor_show')), array (  '_controller' => 'GlavBundle\\Controller\\AutomotorController::showAction',));
            }

            // automotor_new
            if ($pathinfo === '/automotor/new') {
                return array (  '_controller' => 'GlavBundle\\Controller\\AutomotorController::newAction',  '_route' => 'automotor_new',);
            }

            // automotor_create
            if ($pathinfo === '/automotor/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_automotor_create;
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\AutomotorController::createAction',  '_route' => 'automotor_create',);
            }
            not_automotor_create:

            // automotor_edit
            if (preg_match('#^/automotor/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'automotor_edit')), array (  '_controller' => 'GlavBundle\\Controller\\AutomotorController::editAction',));
            }

            // automotor_update
            if (preg_match('#^/automotor/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_automotor_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'automotor_update')), array (  '_controller' => 'GlavBundle\\Controller\\AutomotorController::updateAction',));
            }
            not_automotor_update:

            // automotor_delete
            if (preg_match('#^/automotor/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_automotor_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'automotor_delete')), array (  '_controller' => 'GlavBundle\\Controller\\AutomotorController::deleteAction',));
            }
            not_automotor_delete:

            // automotor_servicio
            if ($pathinfo === '/automotor/servicio') {
                return array (  '_controller' => 'GlavBundle\\Controller\\AutomotorController::servicioAction',  '_route' => 'automotor_servicio',);
            }

        }

        if (0 === strpos($pathinfo, '/rubro')) {
            // rubro
            if (rtrim($pathinfo, '/') === '/rubro') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'rubro');
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\RubroController::indexAction',  '_route' => 'rubro',);
            }

            // rubro_show
            if (preg_match('#^/rubro/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'rubro_show')), array (  '_controller' => 'GlavBundle\\Controller\\RubroController::showAction',));
            }

            // rubro_new
            if ($pathinfo === '/rubro/new') {
                return array (  '_controller' => 'GlavBundle\\Controller\\RubroController::newAction',  '_route' => 'rubro_new',);
            }

            // rubro_create
            if ($pathinfo === '/rubro/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_rubro_create;
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\RubroController::createAction',  '_route' => 'rubro_create',);
            }
            not_rubro_create:

            // rubro_edit
            if (preg_match('#^/rubro/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'rubro_edit')), array (  '_controller' => 'GlavBundle\\Controller\\RubroController::editAction',));
            }

            // rubro_update
            if (preg_match('#^/rubro/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_rubro_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'rubro_update')), array (  '_controller' => 'GlavBundle\\Controller\\RubroController::updateAction',));
            }
            not_rubro_update:

            // rubro_delete
            if (preg_match('#^/rubro/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_rubro_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'rubro_delete')), array (  '_controller' => 'GlavBundle\\Controller\\RubroController::deleteAction',));
            }
            not_rubro_delete:

        }

        if (0 === strpos($pathinfo, '/tipo')) {
            if (0 === strpos($pathinfo, '/tiporubro')) {
                // tiporubro
                if (rtrim($pathinfo, '/') === '/tiporubro') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'tiporubro');
                    }

                    return array (  '_controller' => 'GlavBundle\\Controller\\TipoRubroController::indexAction',  '_route' => 'tiporubro',);
                }

                // tiporubro_show
                if (preg_match('#^/tiporubro/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tiporubro_show')), array (  '_controller' => 'GlavBundle\\Controller\\TipoRubroController::showAction',));
                }

                // tiporubro_new
                if ($pathinfo === '/tiporubro/new') {
                    return array (  '_controller' => 'GlavBundle\\Controller\\TipoRubroController::newAction',  '_route' => 'tiporubro_new',);
                }

                // tiporubro_create
                if ($pathinfo === '/tiporubro/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_tiporubro_create;
                    }

                    return array (  '_controller' => 'GlavBundle\\Controller\\TipoRubroController::createAction',  '_route' => 'tiporubro_create',);
                }
                not_tiporubro_create:

                // tiporubro_edit
                if (preg_match('#^/tiporubro/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tiporubro_edit')), array (  '_controller' => 'GlavBundle\\Controller\\TipoRubroController::editAction',));
                }

                // tiporubro_update
                if (preg_match('#^/tiporubro/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_tiporubro_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tiporubro_update')), array (  '_controller' => 'GlavBundle\\Controller\\TipoRubroController::updateAction',));
                }
                not_tiporubro_update:

                // tiporubro_delete
                if (preg_match('#^/tiporubro/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_tiporubro_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tiporubro_delete')), array (  '_controller' => 'GlavBundle\\Controller\\TipoRubroController::deleteAction',));
                }
                not_tiporubro_delete:

            }

            if (0 === strpos($pathinfo, '/tipoautomotor')) {
                // tipoautomotor
                if (rtrim($pathinfo, '/') === '/tipoautomotor') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'tipoautomotor');
                    }

                    return array (  '_controller' => 'GlavBundle\\Controller\\TipoAutomotorController::indexAction',  '_route' => 'tipoautomotor',);
                }

                // tipoautomotor_show
                if (preg_match('#^/tipoautomotor/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tipoautomotor_show')), array (  '_controller' => 'GlavBundle\\Controller\\TipoAutomotorController::showAction',));
                }

                // tipoautomotor_new
                if ($pathinfo === '/tipoautomotor/new') {
                    return array (  '_controller' => 'GlavBundle\\Controller\\TipoAutomotorController::newAction',  '_route' => 'tipoautomotor_new',);
                }

                // tipoautomotor_create
                if ($pathinfo === '/tipoautomotor/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_tipoautomotor_create;
                    }

                    return array (  '_controller' => 'GlavBundle\\Controller\\TipoAutomotorController::createAction',  '_route' => 'tipoautomotor_create',);
                }
                not_tipoautomotor_create:

                // tipoautomotor_edit
                if (preg_match('#^/tipoautomotor/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tipoautomotor_edit')), array (  '_controller' => 'GlavBundle\\Controller\\TipoAutomotorController::editAction',));
                }

                // tipoautomotor_update
                if (preg_match('#^/tipoautomotor/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_tipoautomotor_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tipoautomotor_update')), array (  '_controller' => 'GlavBundle\\Controller\\TipoAutomotorController::updateAction',));
                }
                not_tipoautomotor_update:

                // tipoautomotor_delete
                if (preg_match('#^/tipoautomotor/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_tipoautomotor_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tipoautomotor_delete')), array (  '_controller' => 'GlavBundle\\Controller\\TipoAutomotorController::deleteAction',));
                }
                not_tipoautomotor_delete:

            }

        }

        if (0 === strpos($pathinfo, '/c')) {
            if (0 === strpos($pathinfo, '/cliente')) {
                // cliente
                if (rtrim($pathinfo, '/') === '/cliente') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'cliente');
                    }

                    return array (  '_controller' => 'GlavBundle\\Controller\\ClienteController::indexAction',  '_route' => 'cliente',);
                }

                // cliente_show
                if (preg_match('#^/cliente/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cliente_show')), array (  '_controller' => 'GlavBundle\\Controller\\ClienteController::showAction',));
                }

                // cliente_new
                if ($pathinfo === '/cliente/new') {
                    return array (  '_controller' => 'GlavBundle\\Controller\\ClienteController::newAction',  '_route' => 'cliente_new',);
                }

                // cliente_create
                if ($pathinfo === '/cliente/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_cliente_create;
                    }

                    return array (  '_controller' => 'GlavBundle\\Controller\\ClienteController::createAction',  '_route' => 'cliente_create',);
                }
                not_cliente_create:

                // cliente_edit
                if (preg_match('#^/cliente/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cliente_edit')), array (  '_controller' => 'GlavBundle\\Controller\\ClienteController::editAction',));
                }

                // cliente_update
                if (preg_match('#^/cliente/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_cliente_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cliente_update')), array (  '_controller' => 'GlavBundle\\Controller\\ClienteController::updateAction',));
                }
                not_cliente_update:

                // cliente_delete
                if (preg_match('#^/cliente/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_cliente_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cliente_delete')), array (  '_controller' => 'GlavBundle\\Controller\\ClienteController::deleteAction',));
                }
                not_cliente_delete:

            }

            if (0 === strpos($pathinfo, '/cargo')) {
                // cargo
                if (rtrim($pathinfo, '/') === '/cargo') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'cargo');
                    }

                    return array (  '_controller' => 'GlavBundle\\Controller\\CargoController::indexAction',  '_route' => 'cargo',);
                }

                // cargo_show
                if (preg_match('#^/cargo/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cargo_show')), array (  '_controller' => 'GlavBundle\\Controller\\CargoController::showAction',));
                }

                // cargo_new
                if ($pathinfo === '/cargo/new') {
                    return array (  '_controller' => 'GlavBundle\\Controller\\CargoController::newAction',  '_route' => 'cargo_new',);
                }

                // cargo_create
                if ($pathinfo === '/cargo/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_cargo_create;
                    }

                    return array (  '_controller' => 'GlavBundle\\Controller\\CargoController::createAction',  '_route' => 'cargo_create',);
                }
                not_cargo_create:

                // cargo_edit
                if (preg_match('#^/cargo/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cargo_edit')), array (  '_controller' => 'GlavBundle\\Controller\\CargoController::editAction',));
                }

                // cargo_update
                if (preg_match('#^/cargo/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_cargo_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cargo_update')), array (  '_controller' => 'GlavBundle\\Controller\\CargoController::updateAction',));
                }
                not_cargo_update:

                // cargo_delete
                if (preg_match('#^/cargo/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_cargo_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cargo_delete')), array (  '_controller' => 'GlavBundle\\Controller\\CargoController::deleteAction',));
                }
                not_cargo_delete:

            }

        }

        if (0 === strpos($pathinfo, '/empleado')) {
            // empleado
            if (rtrim($pathinfo, '/') === '/empleado') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'empleado');
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\EmpleadoController::indexAction',  '_route' => 'empleado',);
            }

            // empleado_show
            if (preg_match('#^/empleado/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'empleado_show')), array (  '_controller' => 'GlavBundle\\Controller\\EmpleadoController::showAction',));
            }

            // empleado_new
            if ($pathinfo === '/empleado/new') {
                return array (  '_controller' => 'GlavBundle\\Controller\\EmpleadoController::newAction',  '_route' => 'empleado_new',);
            }

            // empleado_create
            if ($pathinfo === '/empleado/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_empleado_create;
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\EmpleadoController::createAction',  '_route' => 'empleado_create',);
            }
            not_empleado_create:

            // empleado_edit
            if (preg_match('#^/empleado/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'empleado_edit')), array (  '_controller' => 'GlavBundle\\Controller\\EmpleadoController::editAction',));
            }

            // empleado_update
            if (preg_match('#^/empleado/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_empleado_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'empleado_update')), array (  '_controller' => 'GlavBundle\\Controller\\EmpleadoController::updateAction',));
            }
            not_empleado_update:

            // empleado_delete
            if (preg_match('#^/empleado/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_empleado_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'empleado_delete')), array (  '_controller' => 'GlavBundle\\Controller\\EmpleadoController::deleteAction',));
            }
            not_empleado_delete:

        }

        if (0 === strpos($pathinfo, '/informe')) {
            // informe
            if (rtrim($pathinfo, '/') === '/informe') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'informe');
                }

                return array (  '_controller' => 'GlavBundle\\Controller\\InformeController::empleadoAction',  '_route' => 'informe',);
            }

            // informe_empleado
            if ($pathinfo === '/informe/empleado') {
                return array (  '_controller' => 'GlavBundle\\Controller\\InformeController::informeEmpleadoAction',  '_route' => 'informe_empleado',);
            }

            // semanal_empleado
            if ($pathinfo === '/informe/semanal') {
                return array (  '_controller' => 'GlavBundle\\Controller\\InformeController::informeSemanalAction',  '_route' => 'semanal_empleado',);
            }

            // pagar
            if ($pathinfo === '/informe/pagar') {
                return array (  '_controller' => 'GlavBundle\\Controller\\InformeController::pagarAction',  '_route' => 'pagar',);
            }

            // excel
            if ($pathinfo === '/informe/excel') {
                return array (  '_controller' => 'GlavBundle\\Controller\\InformeController::excelAction',  '_route' => 'excel',);
            }

            // cliente_consultar
            if ($pathinfo === '/informe/cliente') {
                return array (  '_controller' => 'GlavBundle\\Controller\\InformeController::clienteAction',  '_route' => 'cliente_consultar',);
            }

            // cliente_factura
            if ($pathinfo === '/informe/factura') {
                return array (  '_controller' => 'GlavBundle\\Controller\\InformeController::informeClienteAction',  '_route' => 'cliente_factura',);
            }

            // excel_cliente
            if ($pathinfo === '/informe/excelEmpleado') {
                return array (  '_controller' => 'GlavBundle\\Controller\\InformeController::excelEmpleadoAction',  '_route' => 'excel_cliente',);
            }

        }

        // homepage
        if ($pathinfo === '/app/example') {
            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_security_login;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }
                not_fos_user_security_login:

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_security_logout;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }
            not_fos_user_security_logout:

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_profile_edit;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }
            not_fos_user_profile_edit:

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_registration_register;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }
                not_fos_user_registration_register:

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        // glav_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'glav_homepage');
            }

            return array (  '_controller' => 'GlavBundle\\Controller\\DefaultController::homeAction',  '_route' => 'glav_homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
