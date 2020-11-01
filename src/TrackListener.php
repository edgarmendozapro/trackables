<?php

namespace EdgarMendozaTech\Trackables;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TrackListener
{
    private $trackableService;

    public function __construct()
    {
        $this->trackableService = new TrackableService();
    }

    public function handle(Tracked $tracked)
    {
        $this->trackableService->create($tracked->trackable, $tracked->type, null, null);
    }
}
