<?php

namespace App\Imports;


class Item
{

    protected $itemId;
    protected $itemQtd;
    protected $itemPrice;

    public function __construct($itemId, $itemQtd, $itemPrice)
    {
        $this->setItemId($itemId);
        $this->setItemQtd(trim($itemQtd));
        $this->setItemPrice(number_format(trim($itemPrice),2,'.',''));

        return $this;
    }

    /**
     * @return mixed
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param mixed $itemId
     * @return Item
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getItemQtd()
    {
        return $this->itemQtd;
    }

    /**
     * @param mixed $itemQtd
     * @return Item
     */
    public function setItemQtd($itemQtd)
    {
        $this->itemQtd = $itemQtd;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getItemPrice()
    {
        return $this->itemPrice;
    }

    /**
     * @param mixed $itemPrice
     * @return Item
     */
    public function setItemPrice($itemPrice)
    {
        $this->itemPrice = $itemPrice;
        return $this;
    }



}
