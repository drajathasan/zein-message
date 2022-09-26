<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-09-25 15:34:32
 * @modify date 2022-09-25 17:00:13
 * @license GPLv3
 * @desc [description]
 */

namespace Zein\Message\Providers;

abstract class Contract
{
    protected string $error = '';
    protected array $trace = [];

    abstract public static function init(array $data);
    abstract public function publish(string $topic, string $body);
    abstract public function subscribe(string $topic, string $channel, ?float $timeout = 0);

    public function getError()
    {
        return $this->error;    
    }

    public function getTrace()
    {
        return $this->trace;
    }
}