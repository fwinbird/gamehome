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
        
        $gameuserData = $gameuserTable->getbyid($id);

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
//        print_r($heroTable);
        $filters = $heroTable->getInputFilter();
//        print_r($filters);
//        die('');
        $filters->setData($unfilteredData);
//        print_r($unfilteredData);
//        die('');
        if ($filters->isValid()) {
//            die('filter is valid');
            $data = $filters->getValues();
//            print_r($data);
//            die('');
/*            $avatarContent = array_key_exists('avatar', $unfilteredData) ? $unfilteredData['avatar'] : NULL;
            
            $bcrypt = new Bcrypt();
            $data['password'] = $bcrypt->create($data['password']);
*/
            if ($heroTable->create($data)) {
//                die('createdtable');
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
        print_r($id);
        print_r($data);
        die();
    	$this->methodNotAllowed();
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