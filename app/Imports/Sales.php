<?php

namespace App\Imports;


class Sales
{

    protected $saleId;
    protected $items;
    protected $salesmanId;

    public function __construct($saleId, $items, $salesmanId)
    {
        $this->setSaleId($saleId);
        $this->setItems($items);
        $this->setSalesmanId($salesmanId);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSaleId()
    {
        return $this->saleId;
    }

    /**
     * @param mixed $saleId
     * @return Sales
     */
    public function setSaleId($saleId)
    {
        $this->saleId = $saleId;
        return $this;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return Sales
     */
    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSalesmanId()
    {
        return $this->salesmanId;
    }

    /**
     * @param mixed $salesmanId
     * @return Sales
     */
    public function setSalesmanId($salesmanId)
    {
        $this->salesmanId = $salesmanId;
        return $this;
    }


    public function getTotalSale(){

        $total = 0;
        /** @var Item $item */
        foreach ($this->getItems() as $key => $item){
            $total += number_format($item->getItemPrice() * $item->getItemQtd(),2,'.','');
        }

        return $total;
    }


}
