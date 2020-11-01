<?php

namespace EdgarMendozaTech\Trackables;

use Illuminate\Queue\SerializesModels;

class Tracked
{
    use SerializesModels;

    public $trackable;
    public $type;
    public $from;
    public $position;

    public function __construct($trackable, $type, $from=null, $position=null)
    {
        $this->trackable = $trackable;
        $this->type = $type;
        $this->from = $from;
        $this->position = $position;
    }
}
