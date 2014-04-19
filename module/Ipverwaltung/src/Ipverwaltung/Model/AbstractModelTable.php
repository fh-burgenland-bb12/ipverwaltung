<?php

namespace Ipverwaltung\Model;

use Zend\Db\TableGateway\TableGateway;

class AbstractModelTable
{

    /**
     * @var \Zend\Db\TableGateway\TableGateway
     */
    protected $tableGateway;


    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getById($id)
    {
        $primaryFields = $this->getPrimaryFields();

        $selector = array();
        if(count($primaryFields) == 1 && !(is_array($id) ||is_object($id)))
        {
            $selector[current($primaryFields)] = $id;
        }
        elseif(count($primaryFields)> 0 && is_array($id) && count($id) == count($primaryFields))
        {
            foreach($primaryFields as $prim)
            {
                if(!array_key_exists($prim,$id))
                {
                    throw new \Exception('Invalid Selector Array');
                }
                else
                {
                    $selector[$prim] = $id[$prim];
                }
            }
        }
        else
        {
            throw new \Exception('Invalid Selector');
        }

        $rowset = $this->tableGateway->select($selector);
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function save($element)
    {
        if(! $element instanceof ModelInterface)
            throw new \Exception('Element must be an Instance of ModelInterface');

        $data = $element->toArray();
        $primary = array();

        $new = false;

        foreach($element->getPrimaryFields() as $pfield)
        {
            if($primary[$pfield] === null || $primary[$pfield] === 0 )
            {
                $new = true;
            }
            else
            {
                $primary[$pfield] = $data[$pfield];
            }
            unset($data[$pfield]);
        }
        if ($new) {
            $this->tableGateway->insert($data);
            return $this->tableGateway->getLastInsertValue();
        } else {
            if ($this->getGroup($primary)) {
                $this->tableGateway->update($data, $primary);
                return $primary;
            } else {
                throw new \Exception('Element does not exist');
            }
        }
    }

    /**
     * @param array $id
     */
    public function delete($id)
    {
        $selector = array();
        if($id instanceof ModelInterface)
        {
            foreach($id->getPrimaryFields() as $pfield)
            {
                $getter = "get".ucfirst($pfield);
                $selector[$pfield] = $id->$getter();
            }
            if(count($selector)==0)
            {
                throw new \Exception('No Primary Key defined');
            }
        }
        elseif(is_array($id))
        {
            $primaryFields = $this->getPrimaryFields();
            if(count($id) == count($primaryFields))
            {
                foreach($primaryFields as $prim)
                {
                    if(!array_key_exists($prim,$id))
                    {
                        throw new \Exception('Invalid Selector Array');
                    }
                    else
                    {
                        $selector[$prim] = $id[$prim];
                    }
                }
            }
        }
        elseif(count($this->getPrimaryFields()) == 1)
        {
            $selector[current($this->getPrimaryFields())] = $id;
        }
        else
        {
            throw new \Exception('Invalid Datatype');
        }

        $this->tableGateway->delete($selector);
    }

    /**
     * @return array
     * @throws \Exception
     */
    protected function getPrimaryFields()
    {

        $proto = $this->tableGateway->getResultSetPrototype();
        if(! $proto instanceof ModelInterface)
            throw new \Exception('Resultsetprototype must be an Instance of ModelInterface');

        $primaryFields = $proto->getPrimaryFields();
        if(count($primaryFields) == 0)
            throw new \Exception('No Primary Key defined for resultset');

        return $primaryFields;
    }
}
