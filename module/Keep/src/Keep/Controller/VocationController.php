<?php
/**
 * Created by PhpStorm.
 * User: ZGK
 * Date: 2015/9/19
 * Time: 20:49
 */
/**
 * Created by PhpStorm.
 * User: ZGK
 * Date: 2015/9/19
 * Time: 18:00
 */
namespace Keep\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Zend\Crypt\Password\Bcrypt;

class VocationController extends AbstractRestfulController
{
    protected $vocationTable;

    public function getallnamesAction()
    {
 //       die('getallnames function');
        $vocationTable = $this->getVocationTable();
        $vocationNames = $vocationTable->getAllNames();

        //对数据库返回的记录做处理
        $vnames=array();
        $i=0;
        foreach($vocationNames as $v)
        {
//            print_r($v);
//            print_r($v['VocationName']);
//            print_r($v['TextCN']);
//            print_r('<br/>');
            $vnames[$i]=$v['VocationName'] . $v['TextCN'];
            print_r($vnames[$i]);
            $i++;
        }


        if ($vnames !== false) {
//            return new JsonModel($vnames);
            return $vnames;
        } else {
            throw new \Exception('No vocation exist', 404);
        }
    }
    public function get($username)
    {
        die('get function');
        $usersTable = $this->getUsersTable();
        $userImagesTable = $this->getUserImagesTable();

        $userData = $usersTable->getByUsername($username);

        if ($userData !== false) {
            $userData['avatar'] = $userImagesTable->getById($userData['avatar_id']);
            return new JsonModel($userData);
        } else {
            throw new \Exception('User not found', 404);
        }
    }

    public function getList()
    {
//        die('getlist  vocationcontroller');
        $vocationTable = $this->getVocationTable();
        $vocationsData = $vocationTable->getAllRecords();
        if ($vocationsData !== false) {
            return new JsonModel($vocationsData);
        } else {
            throw new \Exception('No vocation exist', 404);
        }
    }

    /**
     * This method inspects the request and routes the data
     * to the correct method
     *
     * @return void
     */
    public function create($unfilteredData)
    {
        $vocationTable = $this->getVocationTable();
        $filters = $vocationTable->getInputFilter();
        $filters->setData($unfilteredData);
        if ($filters->isValid()) {
            $data = $filters->getValues();
            if ($vocationTable->create($data)) {
                $result = new JsonModel(array(
                    'result' => true
                ));
            } else {
                $result = new JsonModel(array(
                    'result' => false
                ));
            }
        } else {
            $result = new JsonModel(array(
                'result' => false,
                'errors' => $filters->getMessages()
            ));
        }
        return $result;
    }

    /**
     * Method not available for this endpoint
     *
     * @return void
     */
    public function update($id, $data)
    {
        die('update');
        $this->methodNotAllowed();
    }

    /**
     * Method not available for this endpoint
     *
     * @return void
     */
    public function delete($id)
    {
        die('delete');
        $this->methodNotAllowed();
    }

    protected function methodNotAllowed()
    {
        $this->response->setStatusCode(\Zend\Http\PhpEnvironment\Response::STATUS_CODE_405);
    }

    /**
     * This is a convenience method to load the usersTable db object and keeps track
     * of the instance to avoid multiple of them
     *
     * @return UsersTable
     */
    protected function getVocationTable()
    {
        if (!$this->vocationTable) {
            $sm = $this->getServiceLocator();
            $this->vocationTable = $sm->get('Keep\Model\VocationTable');
        }
        return $this->vocationTable;
    }

    /**
     * This is a convenience method to load the userImagesTable db object and keeps track
     * of the instance to avoid multiple of them
     *
     * @return UserImagesTable
     */
    protected function getUserImagesTable()
    {
        if (!$this->userImagesTable) {
            $sm = $this->getServiceLocator();
            $this->userImagesTable = $sm->get('Users\Model\UserImagesTable');
        }
        return $this->userImagesTable;
    }
}