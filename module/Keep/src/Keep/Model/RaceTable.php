<?php
/**
 * Created by PhpStorm.
 * User: ZGK
 * Date: 2015/9/19
 * Time: 18:39
 */
namespace Keep\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\Sql\Expression;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

class RaceTable extends AbstractTableGateway implements AdapterAwareInterface
{
    protected $table = 'race';

    /**
     * Set db adapter
     *
     * @param Adapter $adapter
     */
    public function setDbAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->initialize();
    }

    public function create($raceData)
    {
        $raceData['CreatedAt'] = new Expression('NOW()');
        return $this->insert($raceData);
    }

    public function getAllRecords(){
        return $this->select(array('RaceID' !== false));
    }
    
    public function getAllNames(){
        $racenames = $this->sql->select()->columns(array('RaceName','TextCN'))->where(array('RaceID' !== false))->order('RaceName ASC');
        return $this->selectWith($racenames) ;
    }

    public function getInputFilter()
    {
        $inputFilter = new InputFilter();
        $factory = new InputFactory();

        $inputFilter->add($factory->createInput(array(
            'name'     => 'racename',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                ),
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 1,
                        'max' => 50
                    ),
                ),
                array(
                    'name' => 'Zend\Validator\Db\NoRecordExists',
                    'options' => array(
                        'table' => 'race',
                        'field' => 'RaceName',
                        'adapter' => $this->adapter
                    )
                )
            ),
        )));

        $inputFilter->add($factory->createInput(array(
            'name'     => 'textcn',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                ),
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 1,
                        'max' => 50
                    ),
                ),
            ),
        )));

        return $inputFilter;
    }
}