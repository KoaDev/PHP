<?php

class Netstat
{

    public $services = [
        '1' => [
            'name' => 'Apache server',
            'port' => '80',
            'ip' => 'localhost'
        ],
        '2' => [
            'name' => 'Mysql server',
            'port' => '3306',
            'ip' => 'localhost'
        ],
        '3' => [
            'name' => 'FTP server',
            'port' => '21',
            'ip' => 'localhost'
        ],
        '4' => [
            'name' => 'SSH server',
            'port' => '22',
            'ip' => 'localhost'
        ],
        '5' => [
            'name' => 'Internet',
            'port' => '80',
            'ip' => 'google.fr'
        ]
    ];

    public function Check() {

        foreach ($this->services  as $service) {

            $socket = @fsockopen($service['ip'], $service['port'], $errno, $errstr, "1");

            if (!$socket) {

                $data[] = "CLOSE => " . $service['name'] . " (" . $service['ip'] . ":" . $service['port'] . ')';

            } else {

                $data[] = "OPEN => " . $service['name'] . " (" . $service['ip'] . ":" . $service['port'] . ')';

                fclose($socket);

            }
        }
        return $data;
    }
}