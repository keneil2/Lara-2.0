<?php

use Lara\App\Application;
use Lara\Contianer;
use LaraCore\Support\Facades\LaraException;


Application::getAppInstance()->withRoute([


    __DIR__."//..//routes//web.php",


])->withException(


    // put exception here I think ???



)->create();
