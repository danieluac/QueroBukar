<?php
use Fonte\Basedados\Capsula\Capsula;

$capsula = new Capsula();
$capsula->Conectando
        ([
            "motor" => "mysql",
            "endereco" => "localhost",
            "bdados" => "Querobukar",
            "usuario" => "root",
            "senha" => "",
            "charset" => "utf8"
        ]);

        $capsula->Selado();
