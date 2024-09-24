<?php
require __DIR__ . '/../vendor/autoload.php';
use LaraCore\Support\Facades\LaraException;

set_exception_handler(["Lara\LaraCore\\Support\\Facades\\LaraException","ExceptionHandler"]);



require __DIR__."\\..\\bootstrap\\app.php";

