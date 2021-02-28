<?php


namespace App\Repositories\Calculation;


use App\Repositories\BasicRepository;
use App\Repositories\MetalPrice\MetalPriceRepositoryInterface;

class CalculationRepository extends BasicRepository implements CalculationRepositoryInterface
{
    /**
     * @var MetalPriceRepositoryInterface
     */
    private $metalPrice;

    public function __construct(MetalPriceRepositoryInterface $metalPriceRepository)
    {
        $this->metalPrice = $metalPriceRepository;
    }

    public function neshabZakatAmount()
    {
        $gold = '';
        $silver = '';
        // get all metal price
        $allMeatlPrices = $this->metalPrice->getAllMetalPriceFromDB();
        foreach ($allMeatlPrices as $item) {
            if ($item->metal_code == 'XAU') {
                $gold = $item->price;
            }
            if ($item->metal_code == 'XAG') {
                $silver = $item->price;
            }
        }
        // price convert into OUNCE to GRAM
        $goldInGram = (87.48 / 28.3495);
        $nishabGold = $goldInGram * $gold; /// min 87.84 gram of gold
        $silverInGream = (612.36 / 28.3495);
        $nishabSilver = ($silverInGream * $silver); // min 612.36 gram of silver

        return ['silver nisab' => $nishabSilver, 'gold nisab' => $nishabGold]; // return total amount of nishab
    }

    public function allCalculationForZakat($data)
    {
        //// for pension
        if (empty($data['pension'])) {
            $pension = $this->pensionCalculation($data['pension_unknown']);
        } else {
            $pension = $data->pension;
        }
        /// trust fund
        $trustCovert = $this->TwentyFivePercentOfMainAmount($data['trust']['stock']);
        $totallTrust = $trustCovert + $data['trust']['others'];

        /// share
        $covertedTrust = $this->TwentyFivePercentOfMainAmount($data['share']['other']);
        $totallShare = $covertedTrust + $data['share']['capital'];


        $cash = $data['cash'];
        $owe = $data['owe_to_me'];
        $business = $data['business'];
        $crypto = $data['crypto'];
        $finalAdditionalOutput = $this->totalAdditionMoney($cash,$owe,0,$totallShare,$pension,$crypto,$business,$totallTrust);
        return $finalAdditionalOutput;
    }

    public function totalAdditionMoney($cash = 0, $owed_to_me = 0, $metal = 0, $share = 0, $pension = 0, $crypto = 0, $business = 0, $trust = 0)
    {
        return ($cash + $owed_to_me + $metal + $share + $pension + $crypto + $business + $trust);

    }

    public function pensionCalculation($data)
    {
        foreach ($data as $key => $item) {
            if ($key == 'bond') {
                $value = $item;
            }
            if ($key == 'shares') {
                $value = ($item * 0.27);
            }
            if ($key == 'real_estate ') {
                $value = ($item * 0.15);
            }
            if ($key == 'mix ') {
                $value = ($item * 0.5);
            }
            if ($key == 'sharia ') {
                $value = ($item * 0.26);
            }
        }
        return $value;
    }

    public function TwentyFivePercentOfMainAmount($data)
    {
        return ($data * .25);
    }
}
