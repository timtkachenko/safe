<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        // _wdt
        if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_info
            if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::infoAction',)), array('_route' => '_profiler_info'));
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+)\\.txt$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_phpinfo
            if ($pathinfo === '/_profiler/phpinfo') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::phpinfoAction',  '_route' => '_profiler_phpinfo',);
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+)/search/results$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

            // _profiler_redirect
            if (rtrim($pathinfo, '/') === '/_profiler') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_profiler_redirect');
                }

                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => '_profiler_search_results',  'token' => 'empty',  'ip' => '',  'url' => '',  'method' => '',  'limit' => '10',  '_route' => '_profiler_redirect',);
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
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        // fos_user_security_login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
        }

        // fos_user_security_check
        if ($pathinfo === '/login_check') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
        }

        // fos_user_security_logout
        if ($pathinfo === '/logout') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
        }

        if (0 === strpos($pathinfo, '/profile')) {
            // sonata_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_sonata_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'sonata_user_profile_show');
                }

                return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'sonata_user_profile_show',);
            }
            not_sonata_user_profile_show:

            // sonata_user_profile_edit_authentication
            if ($pathinfo === '/profile/edit-authentication') {
                return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\ProfileController::editAuthenticationAction',  '_route' => 'sonata_user_profile_edit_authentication',);
            }

            // sonata_user_profile_edit
            if ($pathinfo === '/profile/edit-profile') {
                return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\ProfileController::editProfileAction',  '_route' => 'sonata_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/register')) {
            // fos_user_registration_register
            if (rtrim($pathinfo, '/') === '/register') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
            }

            // fos_user_registration_check_email
            if ($pathinfo === '/register/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_check_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
            }
            not_fos_user_registration_check_email:

            // fos_user_registration_confirm
            if (0 === strpos($pathinfo, '/register/confirm') && preg_match('#^/register/confirm/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_confirm;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',)), array('_route' => 'fos_user_registration_confirm'));
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
            if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_resetting_reset;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',)), array('_route' => 'fos_user_resetting_reset'));
            }
            not_fos_user_resetting_reset:

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

        // sonata_cache_esi
        if (0 === strpos($pathinfo, '/sonata/cache/esi') && preg_match('#^/sonata/cache/esi/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'sonata.cache.esi:cacheAction',)), array('_route' => 'sonata_cache_esi'));
        }

        // sonata_cache_ssi
        if (0 === strpos($pathinfo, '/sonata/cache/ssi') && preg_match('#^/sonata/cache/ssi/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'sonata.cache.ssi:cacheAction',)), array('_route' => 'sonata_cache_ssi'));
        }

        // sonata_cache_js_async
        if ($pathinfo === '/sonata/cache/js-async') {
            return array (  '_controller' => 'sonata.cache.js_async:cacheAction',  '_route' => 'sonata_cache_js_async',);
        }

        // sonata_cache_js_sync
        if ($pathinfo === '/sonata/cache/js-sync') {
            return array (  '_controller' => 'sonata.cache.js_sync:cacheAction',  '_route' => 'sonata_cache_js_sync',);
        }

        // sonata_cache_apc
        if (0 === strpos($pathinfo, '/sonata/cache/apc') && preg_match('#^/sonata/cache/apc/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'sonata.cache.apc:cacheAction',)), array('_route' => 'sonata_cache_apc'));
        }

        if (0 === strpos($pathinfo, '/admin')) {
            // sonata_user_admin_security_login
            if ($pathinfo === '/admin/login') {
                return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\AdminSecurityController::loginAction',  '_route' => 'sonata_user_admin_security_login',);
            }

            // sonata_user_admin_security_check
            if ($pathinfo === '/admin/login_check') {
                return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\AdminSecurityController::checkAction',  '_route' => 'sonata_user_admin_security_check',);
            }

            // sonata_user_admin_security_logout
            if ($pathinfo === '/admin/logout') {
                return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\AdminSecurityController::logoutAction',  '_route' => 'sonata_user_admin_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            // sonata_admin_dashboard
            if ($pathinfo === '/admin/dashboard') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::dashboardAction',  '_route' => 'sonata_admin_dashboard',);
            }

            // sonata_admin_retrieve_form_element
            if ($pathinfo === '/admin/core/get-form-field-element') {
                return array (  '_controller' => 'sonata.admin.controller.admin:retrieveFormFieldElementAction',  '_route' => 'sonata_admin_retrieve_form_element',);
            }

            // sonata_admin_append_form_element
            if ($pathinfo === '/admin/core/append-form-field-element') {
                return array (  '_controller' => 'sonata.admin.controller.admin:appendFormFieldElementAction',  '_route' => 'sonata_admin_append_form_element',);
            }

            // sonata_admin_short_object_information
            if ($pathinfo === '/admin/core/get-short-object-description') {
                return array (  '_controller' => 'sonata.admin.controller.admin:getShortObjectDescriptionAction',  '_route' => 'sonata_admin_short_object_information',);
            }

            // sonata_admin_set_object_field_value
            if ($pathinfo === '/admin/core/set-object-field-value') {
                return array (  '_controller' => 'sonata.admin.controller.admin:setObjectFieldValueAction',  '_route' => 'sonata_admin_set_object_field_value',);
            }

        }

        // admin_dashboard
        if (rtrim($pathinfo, '/') === '/admin') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'admin_dashboard');
            }

            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::dashboardAction',  '_route' => 'admin_dashboard',);
        }

        if (0 === strpos($pathinfo, '/admin')) {
            // nxc_safe_whisper_admin_list
            if ($pathinfo === '/admin/nxc/safe/whisper/list') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'nxc.safe.admin.whisper',  '_sonata_name' => 'nxc_safe_whisper_admin_list',  '_route' => 'nxc_safe_whisper_admin_list',);
            }

            // nxc_safe_whisper_admin_create
            if ($pathinfo === '/admin/nxc/safe/whisper/create') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'nxc.safe.admin.whisper',  '_sonata_name' => 'nxc_safe_whisper_admin_create',  '_route' => 'nxc_safe_whisper_admin_create',);
            }

            // nxc_safe_whisper_admin_batch
            if ($pathinfo === '/admin/nxc/safe/whisper/batch') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'nxc.safe.admin.whisper',  '_sonata_name' => 'nxc_safe_whisper_admin_batch',  '_route' => 'nxc_safe_whisper_admin_batch',);
            }

            // nxc_safe_whisper_admin_edit
            if (0 === strpos($pathinfo, '/admin/nxc/safe/whisper') && preg_match('#^/admin/nxc/safe/whisper/(?P<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'nxc.safe.admin.whisper',  '_sonata_name' => 'nxc_safe_whisper_admin_edit',)), array('_route' => 'nxc_safe_whisper_admin_edit'));
            }

            // nxc_safe_whisper_admin_delete
            if (0 === strpos($pathinfo, '/admin/nxc/safe/whisper') && preg_match('#^/admin/nxc/safe/whisper/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'nxc.safe.admin.whisper',  '_sonata_name' => 'nxc_safe_whisper_admin_delete',)), array('_route' => 'nxc_safe_whisper_admin_delete'));
            }

            // nxc_safe_whisper_admin_show
            if (0 === strpos($pathinfo, '/admin/nxc/safe/whisper') && preg_match('#^/admin/nxc/safe/whisper/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'nxc.safe.admin.whisper',  '_sonata_name' => 'nxc_safe_whisper_admin_show',)), array('_route' => 'nxc_safe_whisper_admin_show'));
            }

            // nxc_safe_whisper_admin_export
            if ($pathinfo === '/admin/nxc/safe/whisper/export') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'nxc.safe.admin.whisper',  '_sonata_name' => 'nxc_safe_whisper_admin_export',  '_route' => 'nxc_safe_whisper_admin_export',);
            }

            // admin_sonata_user_user_list
            if ($pathinfo === '/admin/sonata/user/user/list') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_list',  '_route' => 'admin_sonata_user_user_list',);
            }

            // admin_sonata_user_user_create
            if ($pathinfo === '/admin/sonata/user/user/create') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_create',  '_route' => 'admin_sonata_user_user_create',);
            }

            // admin_sonata_user_user_batch
            if ($pathinfo === '/admin/sonata/user/user/batch') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_batch',  '_route' => 'admin_sonata_user_user_batch',);
            }

            // admin_sonata_user_user_edit
            if (0 === strpos($pathinfo, '/admin/sonata/user/user') && preg_match('#^/admin/sonata/user/user/(?P<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_edit',)), array('_route' => 'admin_sonata_user_user_edit'));
            }

            // admin_sonata_user_user_delete
            if (0 === strpos($pathinfo, '/admin/sonata/user/user') && preg_match('#^/admin/sonata/user/user/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_delete',)), array('_route' => 'admin_sonata_user_user_delete'));
            }

            // admin_sonata_user_user_show
            if (0 === strpos($pathinfo, '/admin/sonata/user/user') && preg_match('#^/admin/sonata/user/user/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_show',)), array('_route' => 'admin_sonata_user_user_show'));
            }

            // admin_sonata_user_user_export
            if ($pathinfo === '/admin/sonata/user/user/export') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_export',  '_route' => 'admin_sonata_user_user_export',);
            }

            // admin_sonata_user_group_list
            if ($pathinfo === '/admin/sonata/user/group/list') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_list',  '_route' => 'admin_sonata_user_group_list',);
            }

            // admin_sonata_user_group_create
            if ($pathinfo === '/admin/sonata/user/group/create') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_create',  '_route' => 'admin_sonata_user_group_create',);
            }

            // admin_sonata_user_group_batch
            if ($pathinfo === '/admin/sonata/user/group/batch') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_batch',  '_route' => 'admin_sonata_user_group_batch',);
            }

            // admin_sonata_user_group_edit
            if (0 === strpos($pathinfo, '/admin/sonata/user/group') && preg_match('#^/admin/sonata/user/group/(?P<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_edit',)), array('_route' => 'admin_sonata_user_group_edit'));
            }

            // admin_sonata_user_group_delete
            if (0 === strpos($pathinfo, '/admin/sonata/user/group') && preg_match('#^/admin/sonata/user/group/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_delete',)), array('_route' => 'admin_sonata_user_group_delete'));
            }

            // admin_sonata_user_group_show
            if (0 === strpos($pathinfo, '/admin/sonata/user/group') && preg_match('#^/admin/sonata/user/group/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_show',)), array('_route' => 'admin_sonata_user_group_show'));
            }

            // admin_sonata_user_group_export
            if ($pathinfo === '/admin/sonata/user/group/export') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_export',  '_route' => 'admin_sonata_user_group_export',);
            }

        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'NXC\\SafeBundle\\Controller\\DefaultController::securedAction',  '_route' => '_welcome',);
        }

        // _demo_login
        if ($pathinfo === '/secured/login') {
            return array (  '_controller' => 'NXC\\SafeBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
        }

        // _security_check
        if ($pathinfo === '/secured/login_check') {
            return array (  '_controller' => 'NXC\\SafeBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
        }

        // _demo_logout
        if ($pathinfo === '/secured/logout') {
            return array (  '_controller' => 'NXC\\SafeBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
        }

        // nxc_safe_secured_hello
        if ($pathinfo === '/secured/hello') {
            return array (  'name' => 'World',  '_controller' => 'NXC\\SafeBundle\\Controller\\SecuredController::helloAction',  '_route' => 'nxc_safe_secured_hello',);
        }

        // _demo_secured_hello
        if (0 === strpos($pathinfo, '/secured/hello') && preg_match('#^/secured/hello/(?P<name>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'NXC\\SafeBundle\\Controller\\SecuredController::helloAction',)), array('_route' => '_demo_secured_hello'));
        }

        // _demo_secured_hello_admin
        if (0 === strpos($pathinfo, '/secured/hello/admin') && preg_match('#^/secured/hello/admin/(?P<name>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'NXC\\SafeBundle\\Controller\\SecuredController::helloadminAction',)), array('_route' => '_demo_secured_hello_admin'));
        }

        // nxc_safe_homepage
        if ($pathinfo === '/secured') {
            return array (  '_controller' => 'NXC\\SafeBundle\\Controller\\DefaultController::securedAction',  '_route' => 'nxc_safe_homepage',);
        }

        // viewgrid
        if ($pathinfo === '/viewgrid') {
            return array (  '_controller' => 'EPS\\DemoBundle\\Controller\\DefaultController::indexAction',  '_route' => 'viewgrid',);
        }

        // grid_edit
        if ($pathinfo === '/viewgrid/edit') {
            return array (  '_controller' => 'EPS\\DemoBundle\\Controller\\DefaultController::createAction',  '_route' => 'grid_edit',);
        }

        // multiviewgrid
        if ($pathinfo === '/multi') {
            return array (  '_controller' => 'EPS\\DemoBundle\\Controller\\DefaultController::multigridAction',  '_route' => 'multiviewgrid',);
        }

        // gene
        if ($pathinfo === '/gene') {
            return array (  '_controller' => 'EPS\\DemoBundle\\Controller\\DefaultController::geneDataAction',  '_route' => 'gene',);
        }

        // grid1
        if ($pathinfo === '/grid1') {
            return array (  '_controller' => 'EPS\\DemoBundle\\Controller\\DefaultController::getGrid1',  '_route' => 'grid1',);
        }

        // grid2
        if ($pathinfo === '/grid2') {
            return array (  '_controller' => 'EPS\\DemoBundle\\Controller\\DefaultController::getGrid2',  '_route' => 'grid2',);
        }

        // ajax_title
        if ($pathinfo === '/ajax_title') {
            return array (  '_controller' => 'EPS\\DemoBundle\\Controller\\DefaultController::ajaxTitleAction',  '_route' => 'ajax_title',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
