<?php
use Fabiang\Xmpp\Client;
use Fabiang\Xmpp\Protocol\ProtocolImplementationInterface;
use Fabiang\Xmpp\Protocol\Roster;
use Fabiang\Xmpp\Protocol\Presence;
use Fabiang\Xmpp\Protocol\Message;

class XMPPConnectionManager
{
    protected $client;

    public function __construct($domain, $port, $username, $password, ProtocolImplementationInterface $protocol)
    {
        $this->client = new Client($domain, $port, $username, $password, $protocol);
    }

    public function sendMessage($to, $body, $type = 'chat')
    {
       
            // fetch roster list; users and their groups
            $this->client->send(new Roster);
            // set status to online
            $this->client->send(new Presence);

            // send a message to another user
            $message = new Message;
            $message->setMessage($body)
                ->setTo($to)
                ->setType($type);
            $this->client->send($message);

            // // join a channel
            // $channel = new Presence;
            // $channel->setTo($to)
            //     ->setNickName('mynick');
            // $this->client->send($channel);

            // // send a message to the above channel
            // $message = new Message;
            // $message->setMessage('test')
            //     ->setTo($to)
            //     ->setType($type);
            // $this->client->send($message);
        }
    
}

