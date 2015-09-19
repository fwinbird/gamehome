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
            'keep-heroadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/hero/add[/]',
                    'defaults' => array(
//                        'controller' => 'Keep\Controller\Index',
                        'controller' => 'Hero\Controller\Add',
//                        'action' => 'heroadd',
                    ),
                ),
            ),

            'keep-campadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/camp/add[/]',
                    'defaults' => array(
                        'controller' => 'Camp\Controller\Add',
//                        'action' => 'campadd',
                    ),
                ),
            ),

            'keep-raceadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/race/add[/]',
                    'defaults' => array(
                        'controller' => 'Race\Controller\Add',
//                        'action' => 'raceadd',
                    ),
                ),
            ),

            'keep-skilladd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/skill/add[/]',
                    'defaults' => array(
                        'controller' => 'Skill\Controller\Add',
//                        'action' => 'skilladd',
                    ),
                ),
            ),

            'keep-stepadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/step/add[/]',
                    'defaults' => array(
                        'controller' => 'Step\Controller\Add',
//                        'action' => 'stepadd',
                    ),
                ),
            ),

            'keep-vocationadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/vocation/add[/]',
                    'defaults' => array(
                        'controller' => 'Vocation\Controller\Add',
//                        'action' => 'vocationadd',
                    ),
                ),
            ),
        ),
    ),
    'di' => array(
        'services' => array(
            'Keep\Model\HeroTable' => 'Keep\Model\HeroTable',
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Hero\Controller\Add' => 'Keep\Controller\HeroController',
            'Camp\Controller\Add' => 'Keep\Controller\CampController',
            'Race\Controller\Add' => 'Keep\Controller\RaceController',
            'Step\Controller\Add' => 'Keep\Controller\StepController',
            'Skill\Controller\Add' => 'Keep\Controller\SkillController',
            'Vocation\Controller\Add' => 'Keep\Controller\VocationController',
        ),
    ),
);