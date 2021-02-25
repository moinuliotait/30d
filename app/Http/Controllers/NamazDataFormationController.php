<?php

namespace App\Http\Controllers;

use App\Http\Resources\MonthAllEventResource;
use App\Http\Resources\NamazTimeResource;
use App\Repositories\Namaz\NamazRepositoryInterface;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Http\Request;

class NamazDataFormationController extends Controller
{
    /**
     * @var NamazRepositoryInterface
     */
    private $namazRepository;

    public function __construct(NamazRepositoryInterface $namazRepository)
    {
        $this->namazRepository = $namazRepository;
    }

    public function prayerTimeForSpecificDay(Request $request)
    {
        $currentDay = $this->DateFormat($request->timestamp,'d');
        $currentMonth = $this->DateFormat($request->timestamp,'m');
        $currentYear =  $this->DateFormat($request->timestamp,'Y');

        $recentDay = '';

        $get = $this->namazRepository->prayerTimeForSpecificDay($currentMonth,$currentYear);
        foreach ($get->data as $data) {
            if ($data->date->gregorian->day == $currentDay) {
               $recentDay = new NamazTimeResource($data);
            }
        }
        $currentMonthData = NamazTimeResource::collection($get->data);
        $previousMonth= $this->previousMonthNamazTime($currentMonth,$currentYear);
        $nextMonth= $this->NextMonthNamazTime($currentMonth,$currentYear);

        return [
            'status'=>true,
            'todayData'=>$recentDay,
            'currentMonth'=>$currentMonthData,
            'previousMonth'=>$previousMonth,
            'nextMonth'=>$nextMonth
        ];
    }

    private function previousMonthNamazTime($currentMonth,$currentYear)
    {
        $newMonth = $currentMonth == 1 ? 12 : $currentMonth - 1 ;
        $newYear = $currentMonth == 1 ? $currentYear - 1 : $currentYear;
        $previousMonth = $this->namazRepository->prayerTimeForSpecificDay($newMonth,$newYear);
        return NamazTimeResource::collection($previousMonth->data);
    }

    private function NextMonthNamazTime($currentMonth,$currentYear)
    {
        $newMonth = $currentMonth == 12 ? 1 : $currentMonth + 1 ;
        $newYear = $currentMonth == 12 ? $currentYear + 1 : $currentYear;
        $nextMonth = $this->namazRepository->prayerTimeForSpecificDay($newMonth,$newYear);
        return NamazTimeResource::collection($nextMonth->data);
    }

    public function eachMonthAllEventList(Request $request)
    {
        $currentMonth = $this->DateFormat($request->timestamp,'m');
        $currentYear =  $this->DateFormat($request->timestamp,'Y');
        $allEvent = [];
        $get = $this->namazRepository->prayerTimeForSpecificDay($currentMonth,$currentYear);
        foreach ($get->data as $data) {
            if (!empty($data->date->hijri->holidays)) {
               $allEvent[] = new MonthAllEventResource($data);
            }
        }
        return ['status'=>true,'data'=>$allEvent ? $allEvent:'No data available'];
    }

    private function DateFormat($time,$format)
    {
       return  Carbon::createFromTimestamp($time)->format($format);
    }
}
