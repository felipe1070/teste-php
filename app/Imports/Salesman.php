<?php

namespace App\Imports;


class Salesman
{

    protected $cpf;
    protected $name;
    protected $salary;

    public function __construct($cpf, $name, $salary)
    {
        $this->setCpf(trim($cpf));
        $this->setName($name);
        $this->setSalary(number_format(trim($salary),2,'.',''));

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     * @return Salesman
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
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
     * @return Salesman
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     * @return Salesman
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
        return $this;
    }


}
