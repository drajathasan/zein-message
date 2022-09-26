<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-09-25 15:45:13
 * @modify date 2022-09-25 17:07:06
 * @license GPLv3
 * @desc [description]
 */

use Zein\Message\Providers\Nsq;

require __DIR__ . '/../vendor/autoload.php';

$nsq = Nsq::init(['host' => 'tcp://localhost:4150']);

$nsq->publish('overdueWarning', 'Kamu itu terlambat tahu gak :P!');