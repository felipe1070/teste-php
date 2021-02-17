<?php

namespace App\Http\Controllers;

use App\Business\ImportBusiness;
use Illuminate\Http\Request;

class ImportController extends Controller
{

    /** @var  ImportBusiness */
    public $importBusiness;

    public function __construct()
    {
        $this->importBusiness = new ImportBusiness();
    }

    public function import(){

        return $this->importBusiness->import();
    }
}
