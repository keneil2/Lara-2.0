<?php
namespace Lara\LaraCore\Factory;
// NB: may need to add more methods to this but I aint see them now
interface ConfigFactory{
    /**
     * this will get the configuration for a specific value using the 'dot' notation where the filename followed by the config value you want
     * @return mixed
     */
    public function get( string $name);



    /**
     * this will set the config name where the using the dot notation : filename.key, value
     * @param mixed $name
     * @param mixed $value
     * @return void
     */
    public function set(string $name, string $value);


}