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
class IndexController extends AbstractRestfulController
{
    /**
     */
    protected $heroTable;

    public function HeroaddAction()
    {
        $heroTable = $this->getHeroTable();
        $filters = $heroTable->getInputFilter();
//        print($unfilteredData);
//        die('dddddddddddddddddddd');
//        $filters->setData($unfilteredData);
        if ($filters->isValid()) {
            die('heroaddAction function');
            $data = $filters->getValues();

            $avatarContent = array_key_exists('avatar', $unfilteredData) ? $unfilteredData['avatar'] : NULL;

            $bcrypt = new Bcrypt();
            $data['password'] = $bcrypt->create($data['password']);

            if ($usersTable->create($data)) {
                if (!empty($avatarContent)) {
                    $userImagesTable = $this->getUserImagesTable();
                    $user = $usersTable->getByUsername($data['username']);

                    $filename = sprintf('public/images/%s.png', sha1(uniqid(time(), TRUE)));
                    $content = base64_decode($avatarContent);
                    $image = imagecreatefromstring($content);

                    if (imagepng($image, $filename) === TRUE) {
                        $userImagesTable->create($user['id'], basename($filename));
                    }
                    imagedestroy($image);

                    $image = $userImagesTable->getByFilename(basename($filename));
                    $usersTable->updateAvatar($image['id'], $user['id']);
                }

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
    protected function getHeroTable()
    {
        if (!$this->heroTable) {
            $sm = $this->getServiceLocator();
            $this->heroTable = $sm->get('Keep\Model\HeroTable');
        }
        return $this->heroTable;
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