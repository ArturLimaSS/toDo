<?php 

ini_set('memory_limit', '-1');
use Discord\Discord;
use Discord\Parts\Embed\Embed;

include '../vendor/autoload.php';

$discord= new Discord([
    'token' => 'MTA0NjQ2ODY0NjMwMzY5ODk0NQ.GldD13.L3akjU6pXyYab5A1USqJE6hLLMsABu-RXNtRpY',
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
});
 
$discord->run();
