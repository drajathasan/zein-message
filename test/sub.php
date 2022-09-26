<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-09-25 17:01:02
 * @modify date 2022-09-25 17:02:05
 * @license GPLv3
 * @desc [description]
 */
 
use Zein\Message\Providers\Nsq;

require __DIR__ . '/../vendor/autoload.php';

$nsq = Nsq::init(['host' => 'tcp://localhost:4150']);

$nsq->subscribe('overdueWarning', 'worker1');