<?php

namespace App\Http\Controllers;

use App\Repositories\Converter\ConverterRepository;
use App\Repositories\Converter\ConverterRepositoryInterface;
use App\Repositories\Zakat\ZakatRepositoryInterface;
use Illuminate\Http\Request;

class ZakatCalculatorController extends Controller
{

    /**
     * @var ZakatRepositoryInterface
     */
    private $zakatRepository;
    /**
     * @var ConverterRepositoryInterface
     */
    private $convertRepository;

    public function __construct(ZakatRepositoryInterface $zakatRespository,ConverterRepositoryInterface $converterRepository)
    {
        $this->zakatRepository = $zakatRespository;
        $this->convertRepository = $converterRepository;
    }

    public function newTest()
    {

    }

}
