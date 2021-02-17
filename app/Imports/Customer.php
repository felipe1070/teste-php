<?php

namespace App\Imports;


class Customer
{

    protected $cnpj;
    protected $name;
    protected $businessArea;

    public function __construct($cnpj, $name, $businessArea)
    {
        $this->setCnpj($cnpj);
        $this->setName($name);
        $this->setBusinessArea($businessArea);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     * @return Customer
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBusinessArea()
    {
        return $this->businessArea;
    }

    /**
     * @param mixed $businessArea
     * @return Customer
     */
    public function setBusinessArea($businessArea)
    {
        $this->businessArea = $businessArea;
        return $this;
    }





}
