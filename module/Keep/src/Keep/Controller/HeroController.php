<?php
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

/**

 */
class HeroController extends AbstractRestfulController
{
    protected $heroTable;

    public function get($username)
    {
        die('get function herocontroller');
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
//        die('getlist  herocontroller');
        $heroTable = $this->getHeroTable();
        $herosData = $heroTable->getAllRecords();
        if ($herosData !== false) {
            return new JsonModel($herosData);
        } else {
            throw new \Exception('No hero exist', 404);
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
//        die('die create herocontroller');
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
        die('update herocontroller');
        $this->methodNotAllowed();
    }

    /**
     * Method not available for this endpoint
     *
     * @return void
     */
    public function delete($id)
    {
        die('delete herocontroller');
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
    protected function getHeroTable()
    {
        if (!$this->heroTable) {
            $sm = $this->getServiceLocator();
            $this->heroTable = $sm->get('Keep\Model\HeroTable');
        }
        return $this->heroTable;
    }

}