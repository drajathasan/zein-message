<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-09-25 17:01:02
 * @modify date 2022-09-26 23:22:59
 * @license GPLv3
 * @desc [description]
 */
 
use Zein\Message\Providers\Nsq;

require __DIR__ . '/../vendor/autoload.php';

$nsq = Nsq::init(['host' => 'tcp://localhost:4150']);

$nsq->subscribe('overdueWarning', 'worker1', function($envelope){
    $payload = $envelope->message->body;
        
    echo $payload . PHP_EOL;
    $envelope->finish(); // Finish a message (indicate successful processing) 
});