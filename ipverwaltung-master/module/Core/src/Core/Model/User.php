<?php

namespace Core\Model;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;


class User extends AbstractDbAware implements AdapterAwareInterface
{
    public $userId;
    public $username;
    public $salt;
    public $status;
    public $email;
    public $password;

    protected $groups = null;



    public function __sleep()
    {
        return array('userId','username','salt','status','email','password');
    }


    public function exchangeArray($data)
    {
        $this->userId = (isset($data['userId'])) ? $data['userId'] : null;
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->salt = (isset($data['salt'])) ? $data['salt'] : null;
        $this->status = (isset($data['status'])) ? $data['status'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->password = (isset($data['password'])) ? $data['password'] : null;
    }


    public function getGroups()
    {
        if(null === $this->groups)
        {
            $sql = new \Zend\Db\Sql\Sql($this->getDb());
            $select = $sql->select('group') ->columns(array('groupId','name'))
                ->join('userGroup','userGroup.groupId= group.groupId',array())
                ->where('userId = :user')
            ;
            //echo $select->getSqlString();
            //echo "<br>User: ".var_export($this->userId)."<br>";
            $result = $sql->prepareStatementForSqlObject($select)->execute(array(':user'=>$this->userId));
            foreach($result as $res)
            {
                $userRoles[] = $res;
            }
            $this->groups = $userRoles;
        }
        return $this->groups;
    }
}
