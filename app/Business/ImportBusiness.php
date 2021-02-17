<?php

namespace App\Business;

use App\Imports\Customer;
use App\Imports\Item;
use App\Imports\Sales;
use App\Imports\Salesman;

class ImportBusiness
{


    public function import(){

        try{
            $listSalesman = [];
            $listCustomer = [];
            $listSales = [];
            $totalSalary = 0;
            $biggestSale = false;
            $lowestSale = false;
            foreach (file(base_path().'/data/in/in.dat') as $row1){
                $row = explode(',', $row1);

                switch ($row[0]){
                    case '001':
                        $salesman = new Salesman($row[1], $row[2], $row[3]);
                        $listSalesman[] = $salesman;
                        $totalSalary += $salesman->getSalary();
                        break;
                    case '002':
                        $listCustomer[] = new Customer($row[1], $row[2], $row[3]);
                        break;
                    case '003':

                        $items = $this->getInbetweenStrings('[',']', $row1);
                        $listItems = [];
                        foreach ($items as $item){
                            $itemTratament = explode('-', $item);
                            $listItems[] = new Item($itemTratament[0], $itemTratament[1], $itemTratament[2]);
                        }

                        /** @var Sales $sale */
                        $sale = new Sales($row[1], $listItems, end($row));
                        $listSales[] = $sale;

                        if(!$biggestSale) {
                            $biggestSale = $sale;
                        }elseif($biggestSale->getTotalSale() < $sale->getTotalSale()){
                            $biggestSale = $sale;
                        }

                        if(!$lowestSale){
                            $lowestSale = $sale;
                        }elseif($lowestSale->getTotalSale() > $sale->getTotalSale()){
                            $lowestSale = $sale;
                        }

                        break;
                }
            }

            $qtdSalesman = count($listSalesman);
            $qtdCustomer = count($listCustomer);
            $salaryMedia = number_format($totalSalary / $qtdSalesman,2,'.','');

            $this->export($qtdSalesman, $qtdCustomer, $salaryMedia, $biggestSale, $lowestSale);

            return response()->json(['success' => true, 'message'=>'Arquivo gerado com sucesso'], 200);

        }catch (\Exception $exception){

            return response()->json(['success' => false, 'message'=>$exception->getMessage()], 500);

        }

    }


    public function export($qtdSalesman, $qtdCustomer, $salaryMedia, $biggestSale, $lowestSale){
        $fileLocation = base_path().'/data/out/out.dat';
        $file = fopen($fileLocation,"w");

        $content = "Number of sellers: ". $qtdSalesman;
        $content .= "\nNumber of customers: ". $qtdCustomer;
        $content .= "\nNaverage salary: ". $salaryMedia;
        $content .= "\nBiggest sale: ". $biggestSale->getSaleId();
        $content .= "\nWorst seller: ". $lowestSale->getSalesmanId();
        fwrite($file,$content);
        fclose($file);
    }

    function getInbetweenStrings($start, $end, $content){
        $r = explode($start, $content);
        if (isset($r[1])){
            $r = explode($end, $r[1]);
            return explode(',',$r[0]);
        }
        return '';
    }
}
