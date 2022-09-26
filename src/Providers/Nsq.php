<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-09-25 15:39:09
 * @modify date 2022-09-25 17:05:46
 * @license GPLv3
 * @desc [description]
 */

namespace Zein\Message\Providers;

use Exception;
use Nsq\Writer;
use Nsq\Envelope;
use Nsq\Subscriber;

class Nsq extends Contract
{
    private $writer;
    private $subscriber;

    public static function init(array $data)
    {
        $nsq = new Nsq;
        $nsq->writer = new Writer($data['host']);
        $nsq->subscriber = new Subscriber($data['host']);
        return $nsq;
    }

    public function publish(string $topic, string $body)
    {
        try {
            $this->writer->pub($topic, $body);
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            $this->trace = $e->getTrace();
        }
    }

    public function subscribe(string $topic, string $channel, ?float $timeout = 0)
    {
        $generator = $this->subscriber->subscribe($topic, $channel, 5);
        foreach ($generator as $envelope) {
            if (null === $envelope) {
                // No message received while timeout
                // Good place to pcntl_signal_dispatch() or whatever
                
                continue;
            }
        
            if ($envelope instanceof Envelope) {
                $payload = $envelope->message->body;
        
                echo $payload . PHP_EOL;
                $envelope->finish(); // Finish a message (indicate successful processing)        
            }
        }
    }
}