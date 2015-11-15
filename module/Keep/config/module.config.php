<?php

return array(
    'router' => array(
        'routes' => array(
            'keep-heroadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/hero/add[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Hero',
//                        'action' => 'heroadd',
                    ),
                ),
            ),

            'keep-herodisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/hero[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Hero',
                    ),
                ),
            ),

            'keep-campadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/camp/add[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Camp',
//                        'action' => 'campadd',
                    ),
                ),
            ),

            'keep-raceadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/race/add[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Race',
//                        'action' => 'raceadd',
                    ),
                ),
            ),

            'keep-skilladd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/skill/add[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Skill',
//                        'action' => 'skilladd',
                    ),
                ),
            ),

            'keep-stepadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/step/add[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Step',
//                        'action' => 'stepadd',
                    ),
                ),
            ),

            'keep-vocationadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/vocation/add[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Vocation',
//                        'action' => 'vocationadd',
                    ),
                ),
            ),

            'keep-campdisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/camp[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Camp',
                    ),
                ),
            ),

            'keep-racedisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/race[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Race',
                    ),
                ),
            ),

            'keep-skilldisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/skill[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Skill',
                    ),
                ),
            ),

            'keep-stepdisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/step[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Step',
                    ),
                ),
            ),

            'keep-vocationdisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/vocation[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Vocation',
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
            'keep-vocation-getname' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/vocation/getname[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Vocation',
                        'action' => 'getallnames',
                    ),
                ),
            ),

            'keep-race-getname' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/keep/race/getname[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Race',
                    ),
                ),
            ),


        ),
    ),
    'di' => array(
        'services' => array(
            'Keep\Model\HeroTable' => 'Keep\Model\HeroTable',
            'Keep\Model\CampTable' => 'Keep\Model\CampTable',
            'Keep\Model\RaceTable' => 'Keep\Model\RaceTable',
            'Keep\Model\SkillTable' => 'Keep\Model\SkillTable',
            'Keep\Model\StepTable' => 'Keep\Model\StepTable',
            'Keep\Model\VocationTable' => 'Keep\Model\VocationTable',
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Keep\Controller\Hero' => 'Keep\Controller\HeroController',
            'Keep\Controller\Camp' => 'Keep\Controller\CampController',
            'Keep\Controller\Race' => 'Keep\Controller\RaceController',
            'Keep\Controller\Step' => 'Keep\Controller\StepController',
            'Keep\Controller\Skill' => 'Keep\Controller\SkillController',
            'Keep\Controller\Vocation' => 'Keep\Controller\VocationController',
            'Keep\Controller\Gameuser' => 'Keep\Controller\GameuserController',
        ),
    ),
);