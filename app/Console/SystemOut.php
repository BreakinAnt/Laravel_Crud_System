<?php
namespace App\Console;

class SystemOut {
    public static function print($output){
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln($output);
    }
}