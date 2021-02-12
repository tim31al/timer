<?php


namespace ATimofeev\Timer;


class Clock
{
    private Timer $timer;

    /**
     * Clock constructor.
     */
    public function __construct()
    {
        $this->timer = new Timer();
    }

    public function start($showMessage = false){
        if ($showMessage) {
            echo 'Timer stated'.PHP_EOL;
        }

        $this->timer->start();
    }

    public function stopAndResume($showMessage = false) {
        if ($showMessage) {
            echo 'Timer stopped'.PHP_EOL;
        }

        echo $this->showTime();

        $this->timer->stop();
    }

    public function pauseAndResume($showMessage = false) {
        if ($showMessage) {
            echo 'Timer paused'.PHP_EOL;
        }

        echo $this->showTime();

        $this->timer->pause();
    }

    public function proceedClock($showMessage = false) {
        if ($showMessage) {
            echo 'Timer proceed'.PHP_EOL;
        }

        $this->timer->proceed();
    }

    public function stop() {
        $this->timer->stop();
    }

    public function pause() {
        $this->timer->pause();
    }


    private function showTime(): string
    {
        $interval = $this->timer->resume();
        $time = $interval / 1e+9;

        return sprintf('Running time %.6f sec %s', $time, PHP_EOL);
    }


}
