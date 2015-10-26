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
/*    public function getInputFilter()
    {
        $inputFilter = new InputFilter();
        $factory = new InputFactory();

        $inputFilter->add($factory->createInput(array(
            'name'     => 'campname',
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
                        'table' => 'camp',
                        'field' => 'campname',
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
    */
}