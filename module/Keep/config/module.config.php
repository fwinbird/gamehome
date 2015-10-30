<?php

return array(
    'router' => array(
        'routes' => array(
            'keep-heroadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/hero/add[/]',
                    'defaults' => array(
                        'controller' => 'Hero\Controller\Add',
//                        'action' => 'heroadd',
                    ),
                ),
            ),

            'keep-herodisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/hero[/]',
                    'defaults' => array(
                        'controller' => 'Hero\Controller\Display',
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

            'keep-campdisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/camp[/]',
                    'defaults' => array(
                        'controller' => 'Camp\Controller\Display',
                    ),
                ),
            ),

            'keep-racedisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/race[/]',
                    'defaults' => array(
                        'controller' => 'Race\Controller\Display',
                    ),
                ),
            ),

            'keep-skilldisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/skill[/]',
                    'defaults' => array(
                        'controller' => 'Skill\Controller\Display',
                    ),
                ),
            ),

            'keep-stepdisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/step[/]',
                    'defaults' => array(
                        'controller' => 'Step\Controller\Display',
                    ),
                ),
            ),

            'keep-vocationdisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/vocation[/]',
                    'defaults' => array(
                        'controller' => 'Vocation\Controller\Display',
                    ),
                ),
            ),

            'keep-gameuser-info' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/gameuser/:id[/]',
                    'constraints' => array(
                        'id' => '\d*',
                    ),
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Gameuser',
                    ),
                ),
            ),

            'keep-gameuser-updategold' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/gameuser/updategold[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Gameuser',
                    ),
                ),
            ),

            'keep-gameuser-update' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/gameuser/update/:id[/]',
                    'constraints' => array(
                        'id' => '\d*',
                    ),
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Gameuser',
                    ),
                ),
            ),
            'keep-gameuser-register' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/gameuser/register[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Gameuser',
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
            'Hero\Controller\Display' => 'Keep\Controller\HeroController',
            'Camp\Controller\Add' => 'Keep\Controller\CampController',
            'Race\Controller\Add' => 'Keep\Controller\RaceController',
            'Step\Controller\Add' => 'Keep\Controller\StepController',
            'Skill\Controller\Add' => 'Keep\Controller\SkillController',
            'Vocation\Controller\Add' => 'Keep\Controller\VocationController',
            'Camp\Controller\Display' => 'Keep\Controller\CampController',
            'Race\Controller\Display' => 'Keep\Controller\RaceController',
            'Step\Controller\Display' => 'Keep\Controller\StepController',
            'Skill\Controller\Display' => 'Keep\Controller\SkillController',
            'Vocation\Controller\Display' => 'Keep\Controller\VocationController',
            'Keep\Controller\Gameuser' => 'Keep\Controller\GameuserController',
        ),
    ),
);