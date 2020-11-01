<?php

namespace EdgarMendozaTech\Trackables;

use Illuminate\Support\Facades\Auth;

class TrackableService
{
    protected $ipService;

    public function __construct() {
        $this->ipService = new IpService();
    }

	public function create($trackable, $type, $from, $position) {
        if(Auth::check() && Auth::user()->type === "admin") {
            return;
        }

        $ip = $this->ipService->getIp();

        if($ip === null) {
            return;
        }

        $lastTrackable = $trackable->trackables()
                                ->where('ip', $ip)
                                ->where('type', $type)
                                ->where('created_at', 'like', date('Y-m-d')."%")
                                ->first();

		if($lastTrackable != null) {
			return;
		}

		$track = new Trackable([
			'ip' => $ip,
            'type' => $type,
            'from' => $from,
            'position' => $position,
		]);
		$track->trackable()->associate($trackable);

		if(Auth::check()) {
			$track->user()->associate(Auth::user());
		}

		$track->save();

        if($type == "visualization") {
            $trackable->views_count = $trackable->views_count + 1;
            $trackable->save();
        }
	}
}
