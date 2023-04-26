<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/professionnal/appointment' => [[['_route' => 'app_appointment_index', '_controller' => 'App\\Controller\\AppointmentController::index'], null, ['GET' => 0], null, true, false, null]],
        '/aviability' => [[['_route' => 'aviability', '_controller' => 'App\\Controller\\AviabilityController::index'], null, null, null, false, false, null]],
        '/aviability/edit' => [[['_route' => 'aviabilityEdit', '_controller' => 'App\\Controller\\AviabilityController::add'], null, null, null, true, false, null]],
        '/aviability/new' => [[['_route' => 'aviabilityNew', '_controller' => 'App\\Controller\\AviabilityController::new'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/professionnal/list' => [[['_route' => 'app_professionnal_list_', '_controller' => 'App\\Controller\\ProfessionnalListController::index'], null, null, null, false, false, null]],
        '/profilePatient' => [[['_route' => 'profilePatient', '_controller' => 'App\\Controller\\ProfileController::profilePatient'], null, null, null, false, false, null]],
        '/profilePatient/edit' => [[['_route' => 'editProfilePatient', '_controller' => 'App\\Controller\\ProfileController::editProfilePatient'], null, null, null, false, false, null]],
        '/profilePatient/editPassword' => [[['_route' => 'editProfilePassword', '_controller' => 'App\\Controller\\ProfileController::editProfilePatientPassword'], null, null, null, false, false, null]],
        '/profileProfessionnal' => [[['_route' => 'profileProfessionnal', '_controller' => 'App\\Controller\\ProfileController::profileProfessionnal'], null, null, null, false, false, null]],
        '/profileProfessionnal/edit' => [[['_route' => 'editProfileProfessionnal', '_controller' => 'App\\Controller\\ProfileController::editProfileProfessionnal'], null, null, null, false, false, null]],
        '/profileProfessionnal/editPassword' => [[['_route' => 'editProfessionnalPassword', '_controller' => 'App\\Controller\\ProfileController::editProfileProfessionnalPassword'], null, null, null, false, false, null]],
        '/inscription' => [[['_route' => 'register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/inscriptionPro' => [[['_route' => 'registerPro', '_controller' => 'App\\Controller\\RegistrationController::registerProfessionnals'], null, null, null, false, false, null]],
        '/search/pro' => [[['_route' => 'app_search_pro', '_controller' => 'App\\Controller\\SearchProController::index'], null, null, null, false, false, null]],
        '/connexion' => [[['_route' => 'connexion', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/deconnexion' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/oublieMDP' => [[['_route' => 'forgottenPass', '_controller' => 'App\\Controller\\SecurityController::forgottenPass'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/professionnal/(?'
                    .'|appointment(?'
                        .'|/(?'
                            .'|add/([^/]++)(*:217)'
                            .'|new/([^/]++)(*:237)'
                            .'|([^/]++)(?'
                                .'|/edit(*:261)'
                                .'|(*:269)'
                            .')'
                        .')'
                        .'|show/([^/]++)(*:292)'
                    .')'
                    .'|list/show/([^/]++)(*:319)'
                .')'
                .'|/contact/([^/]++)(*:345)'
                .'|/oublieMDP/([^/]++)(*:372)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        217 => [[['_route' => 'addAppointment', '_controller' => 'App\\Controller\\AppointmentController::add'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        237 => [[['_route' => 'newAppointment', '_controller' => 'App\\Controller\\AppointmentController::new'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        261 => [[['_route' => 'app_appointment_edit', '_controller' => 'App\\Controller\\AppointmentController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        269 => [[['_route' => 'app_appointment_delete', '_controller' => 'App\\Controller\\AppointmentController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        292 => [[['_route' => 'app_appointment_show', '_controller' => 'App\\Controller\\AppointmentController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        319 => [[['_route' => 'show', '_controller' => 'App\\Controller\\ProfessionnalListController::show'], ['id'], null, null, false, true, null]],
        345 => [[['_route' => 'contactPro', '_controller' => 'App\\Controller\\ContactController::index'], ['id'], null, null, false, true, null]],
        372 => [
            [['_route' => 'resetPass', '_controller' => 'App\\Controller\\SecurityController::resetPass'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
