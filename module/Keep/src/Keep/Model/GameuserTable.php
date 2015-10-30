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

class GameuserTable extends AbstractTableGateway implements AdapterAwareInterface
{
    protected $table = 'game_users';

    public function setDbAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->initialize();
    }

    public function create($gameuserData)
    {
//        $gameuserData['createdAt'] = new Expression('NOW()');
        return $this->insert($gameuserData);
    }

    public function getAllRecords(){
        return $this->select(array('id' !== false));
    }

    public function getallinfobyid($id)
    {
        return $this->select(array('id' => $id));
    }

    public function getinfobyid_4($id)
    {
        return $this->select(array('id' => $id),array('id','username','gold','faith'));
//        $result = mysql_query("SELECT * FROM Persons");

    }

    public function updategold($id, $data)
    {
            return $this->update(array(
                'gold' =>$data
            ), array(
                    'id' => $id)
            );
    }

    public function updatefaith($id, $data)
    {
        return $this->update(array(
            'faith' =>$data
        ), array(
                'id' => $id)
        );
    }

    public function getid()
    {
        return $this->id();
    }

    public function getInputFilter()
    {
        $inputFilter = new InputFilter();
        $factory = new InputFactory();

        $inputFilter->add($factory->createInput(array(
            'name'     => 'username',
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
                        'table' => 'game_users',
                        'field' => 'username',
                        'adapter' => $this->adapter
                    )
                )
            ),
        )));

        $inputFilter->add($factory->createInput(array(
            'name'     => 'email',
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
                        'min' => 6,
                        'max' => 254
                    ),
                ),
                array(
                    'name' => 'EmailAddress',
                ),
                array(
                    'name' => 'Zend\Validator\Db\NoRecordExists',
                    'options' => array(
                        'table' => 'game_users',
                        'field' => 'email',
                        'adapter' => $this->adapter
                    )
                )
            ),
        )));

        $inputFilter->add($factory->createInput(array(
            'name'     => 'password',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                ),
            ),
        )));

        $inputFilter->add($factory->createInput(array(
            'name'     => 'name',
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
                        'max' => 25
                    )
                ),
            ),
        )));

        $inputFilter->add($factory->createInput(array(
            'name'     => 'location',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
        )));

        $inputFilter->add($factory->createInput(array(
            'name'     => 'gender',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                array('name' => 'Int'),
            ),
            'validators' => array(
                array(
                    'name' => 'InArray',
                    'options' => array(
                        'haystack' => array('0', '1')
                    )
                ),
            ),
        )));

        return $inputFilter;
    }
}