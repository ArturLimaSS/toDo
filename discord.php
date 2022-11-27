<?php

ini_set('memory_limit', '-1');

use Discord\Discord;
use Discord\Parts\Embed\Embed;
use Discord\WebSockets\Event;
use Discord\Parts\Channel\Message;

include 'vendor/autoload.php';

$discord = new Discord([
    'token' => 'MTA0NjQ2ODY0NjMwMzY5ODk0NQ.GldD13.L3akjU6pXyYab5A1USqJE6hLLMsABu-RXNtRpY'
]);

$discord->on('ready', function (Discord $discord) {
    foreach ($discord->guilds as $guild) {
        echo "Guild: {$guild->name} (" . $guild->members->count() . " membros)" . PHP_EOL;
        echo "Channels: " . PHP_EOL;
        foreach ($guild->channels as $channel) {
            echo "\t\t{$channel->name}" . PHP_EOL;
        }
        echo "Membros: " . PHP_EOL;
        foreach ($guild->members as $member) {;
            echo "\t\t{$member->user->username}" . PHP_EOL;
        }
    }
    echo "BotPHP Online..." . PHP_EOL;
});

$discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {

    $embed = new Embed($discord);
    $embed->setTitle('Uma mensagem embed')
        ->setDescription("O campo descrição!")
        ->setFooter('Conteudo do rodapé')
        ->setColor(0xFF0000)
        ->addField([
            'name' => "Campo 1:",
            'value' => 'Valor campo 1',
            'inline' => false,
        ])
        ->addField([
            'name' => 'Campo 2',
            'value' => "Valor Campo 2",
            'inline' => false,
        ]);


    $message->channel->sendEmbed($embed);
});


$discord->run();
