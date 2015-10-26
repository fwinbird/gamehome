<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Keep\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Zend\Crypt\Password\Bcrypt;

/**

 */
class GameuserController extends AbstractRestfulController
{
    /**
     */
    protected $gameuserTable;

    public function get($id)
    {
    	$gameuserTable = $this->getGameuserTable();
        $gameuserData = $gameuserTable->getallinfobyid($id);
        $mainuserDate = $gameuserTable->getinfobyid_4($id);

//        $JData = new JsonModel($gameuserData);
//        print_r($JData);
//        $mainDate = array("id"=> $JData->get('id'), "username" =>$JData->get('username') , "gold" =>$JData->get('gold') ,"faith" => $JData->get('faith'));
//        $mainDate = array("id" => $JData[0]->id);
//        return $JData;
        if ($gameuserData !== false) {
            return new JsonModel($gameuserData);
        } else {
            throw new \Exception('Gameuser not found', 404);
        }

    }

    public function getList()
    {
        die('getlist');
    	$this->methodNotAllowed();
    }

    public function create($unfilteredData)
    {
        $heroTable = $this->getHeroTable();
        $filters = $heroTable->getInputFilter();
        $filters->setData($unfilteredData);

        if ($filters->isValid()) {
            $data = $filters->getValues();
            if ($heroTable->create($data)) {
                $result = new JsonModel(array(
                    'result' => true
                ));
            } else {
                $result = new JsonModel(array(
                    'result' => false
                )); 
            }
        } else {
            die('filter is not valid');
            $result = new JsonModel(array(
                'result' => false,
                'errors' => $filters->getMessages()
            ));
        }
        return $result;
    }

    public function update($id, $data)
    {
        $gameuserTable = $this->getGameuserTable();

        if(array_key_exists('gold',$data))
        {
            $value = $data['gold'];
//            if(is_int($value))
                if(1<=$value&&$value<=100000)
                    $gameuserTable->updategold($id, $value);
        }

        if(array_key_exists('faith',$data))
        {
            $value = $data['faith'];
//            if(is_int($value))
                if(1<=$value&&$value<=100000)
                    $gameuserTable->updatefaith($id, $value);
        }
        return;
    }

    public function delete($id)
    {
		die('delete');
    	$this->methodNotAllowed();
    }
    
    protected function methodNotAllowed()
    {
        $this->response->setStatusCode(\Zend\Http\PhpEnvironment\Response::STATUS_CODE_405);
    }

    protected function getGameuserTable()
    {
        if (!$this->gameuserTable) {
            $sm = $this->getServiceLocator();
            $this->gameuserTable = $sm->get('Keep\Model\GameuserTable');
        }
        return $this->gameuserTable;
    }


}