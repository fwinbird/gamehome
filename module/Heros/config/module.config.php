<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'admin_add' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/admin/heros/add[/]',
                    'defaults' => array(
                        'controller' => 'Heros\Controller\Index',
                        'action' => 'heroadd',
                    ),
                ),
            ),
/*            'admin_add' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/admin/heros/add[/]',
                    'defaults' => array(
                        'controller' => 'Heros\Controller\Index',
                        'action' => 'heroadd',
                    ),
                ),
            ),
*/        ),
    ),
    'di' => array(
        'services' => array(
            'Heros\Model\HeroTable' => 'Heros\Model\HeroTable',
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Heros\Controller\Index' => 'Heros\Controller\IndexController',
        ),
    ),
);