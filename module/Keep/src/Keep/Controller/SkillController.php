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

class SkillController extends AbstractRestfulController
{
    protected $skillTable;

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

    /**
     * Method not available for this endpoint
     *
     * @return void
     */
    public function getList()
    {
        die('getlist');
        $this->methodNotAllowed();
    }

    /**
     * This method inspects the request and routes the data
     * to the correct method
     *
     * @return void
     */
    public function create($unfilteredData)
    {

        $skillTable = $this->getSkillTable();
//        print_r($skillTable);
        $filters = $skillTable->getInputFilter();
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
            if ($skillTable->create($data)) {
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
    protected function getSkillTable()
    {
        if (!$this->skillTable) {
            $sm = $this->getServiceLocator();
            $this->skillTable = $sm->get('Keep\Model\SkillTable');
        }
        return $this->skillTable;
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