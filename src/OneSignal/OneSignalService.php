<?php

namespace Services\OneSignal;

use Services\OneSignal\Response\Notification;

class OneSignalService
{
    public function sendNotification(OneSignalNotification $notification)
    {
        $client = resolve('GuzzleHttp');
        $response = $client->request('POST', 'https://onesignal.com/api/v1/notifications', [
            'json' => $notification->toArray(),
            'headers' => [
                'Content-Type'  =>  'application/json; charset=utf-8',
                'Authorization' => 'Basic ' . config('oneSignal.restKey')
            ]
        ]);
    }

    /**
     * Return All Notifications
     *
     * @param integer $limit
     * @param integer $offset
     * @return \Illuminate\Support\Collection
     */
    public function getNotifications($limit = 50, $offset = 0) : \Illuminate\Support\Collection
    {
        $client = resolve('GuzzleHttp');
        $response =  $client->request('GET', 'https://onesignal.com/api/v1/notifications', [
            'query' => [
                "app_id" => config('oneSignal.appKey'),
                "limit" => $limit,
                "offset" => $offset
            ],
            'headers' => [
                'Content-Type'  =>  'application/json; charset=utf-8',
                'Authorization' => 'Basic ' . config('oneSignal.restKey')
            ]
        ]);

        $results =  json_decode($response->getBody()->getContents(), true);
        $notifications = $results["notifications"];
        $results["notifications"] = collect([]);
        foreach ($notifications as $notification) {
            $results["notifications"]->push(new Notification($notification));
        }
        return collect($results);
    }
}
