<?php


namespace ATimofeev\Timer;


class Timer
{
    private float $start;
    private bool $isRun;
    private array $interval = [];


    public function start()
    {
        $this->start = hrtime(true);
        $this->isRun = true;
    }

    public function pause()
    {
        if (!$this->isRun) {
            throw new TimerNotRunningException('Timer not running');
        }

        $time = hrtime(true);
        $interval = $time - $this->start;
        $this->start = 0;

        array_push($this->interval, $interval);
    }

    public function proceed()
    {
        $this->start = hrtime(true);
    }

    public function resume()
    {
        if (!$this->isRun) {
            throw new TimerNotRunningException('Timer not running');
        }
        $stop = hrtime(true);
        $time = $stop - $this->start;

        foreach ($this->interval as $saved) {
            $time += $saved;
        }

        return $time;
    }

    public function stop()
    {
        $this->isRun = false;
    }


}
