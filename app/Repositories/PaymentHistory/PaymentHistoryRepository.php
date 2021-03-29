<?php


namespace App\Repositories\PaymentHistory;


use Illuminate\Database\Eloquent\Model;

class PaymentHistoryRepository extends \App\Repositories\BasicRepository implements PaymentHistoryRepositoryInterface
{
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

    public function testController()
    {
       return $this->model->OrderBy('created_at', 'desc')->paginate(15);
    }
    public function createPayment($data)
    {
        $value = $this->model;
        $value['first_name'] = $data['first_name'];
        $value['last_name'] = $data['last_name'];
        $value['email'] = $data['email'];
        $value['zakat'] = $data['zakat'];
        $value['sadaqah'] = $data['sadaqah'];
        $value['riba'] = $data['riba'];
        $value->save();
        $result = $value;
        return $result;
    }
    public function totalPaymentCount()
    {
        //$zakat=$this->model->sum('zakat');
        //$sadaqah=$this->model->sum('sadaqah');
        //$riba=$this->model->sum('riba');
        //$totalCost=$zakat+$sadaqah+$riba;
        $count = $this->model->get()->count();
        return $count;
    }
    public function searchData($name){
        $result=$this->model->where('email', 'LIKE', "%$name%")
            ->orWhere('first_name', 'LIKE', "%$name%")
            ->OrderBy('created_at', 'desc')->paginate(15);
        return $result;
    }
}
