<?php

namespace App\Service;

class Calculator{
    public function getTotalHT(array $products){
        $totalHT=0;
        foreach($products as $product){
            $totalHT+=$product["product"]->getPrice()*$product["quantity"];
        }
        return $totalHT;
    }

    public function getTotalTTC(array $products, $tva){
        $totalHT=$this->getTotalHT($products);
        $totalTTC = $totalHT + $totalHT * ($tva / 100);
        return $totalTTC;
    }
}