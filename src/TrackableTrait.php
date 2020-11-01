<?php

namespace EdgarMendozaTech\Trackables;

trait TrackableTrait
{
	public function trackables()
    {
		return $this->morphMany(Trackable::class, 'trackable');
	}
}
