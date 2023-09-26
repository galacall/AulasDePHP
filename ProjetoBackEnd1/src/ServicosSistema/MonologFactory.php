<?php

namespace App\ServicosSistema;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MonologFactory{

    private static $logger;

    public static function getInstance(){
        if(self::$logger == null){
            self::$logger = new Logger('MEUAPP');
            self::$logger->pushHandler(new StreamHandler('meuslogs.log', Level::Debug));
            return self::$logger;
        } else {
            return self::$logger;
        }
    }
}

/* INCLUIR __DIRETÓRIO__ "/sair do src/entrar na vendor/selecionar o arquivo autoload
$logger = Monolog
Igual o log catch, é usado um log de instância 
-> = acessar atributos e métodos de instância
:: = acessar atributos e métodos estáticos (Static) */