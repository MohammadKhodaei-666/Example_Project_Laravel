<?php


namespace App\Services\Notification\Provider;


use App\Services\Notification\Provider\Contracts\Provider;
use App\User;
use GuzzleHttp\Client;

class SmsProvider implements Provider
{
    private $user;
    private $text;

    public function __construct(User $user, string $text)
    {
        $this->user=$user;
        $this->text=$text;
    }

    public function send(){
        $client=new Client();
        $response=$client->post(config('services.sms.uri'),$this->prepareDataForSms());
        return $response->getBody();
    }

    public function prepareDataForSms(){
        $data=array_merge(
            config('services.sms.auth'),
            [
                'message'=>$this->text,
                'to'=>[$this->user->phone],
                'op'=>'send'
            ]
        );
        return [
            'json'=>$data
        ];
    }

}
