<?php

class DateRangeException extends Exception { }

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
     public static function notEmpty($key)
    {
        // TODO: Fill in this function
        if(isset($_REQUEST[$key]) && $_REQUEST[$key] != ''){
            return true;
        }
        return false;
    }

    public static function has($key)
    {
        // TODO: Fill in this function
        if(isset($_REQUEST[$key])){
            return true;
        }
        return false;
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        // TODO: Fill in this function
        if(self::has($key)){
            return $_REQUEST[$key];
        }
        return $default;
    }

    public static function escape($input)
    {
        return htmlspecialchars(strip_tags($input));
    }

    public static function getString($key, $min = 1, $max = 254)
    {
        $value = trim(self::get($key));
        var_dump($key);

        if(!self::notEmpty($key)){
            throw new OutOfRangeException(self::formatKey($key) . ' is out of range!');
        } 

        if (!is_string($value)) {
            throw new DomainException(self::formatKey($key) . ' must be a string!');
        }  

        if ($key != 'url') {
            if(preg_match('/[\d]/', $value)) {
                throw new DomainException(self::formatKey($key) . ' must be a string!');
            }
        }

        if(!is_string($value) || !is_numeric($min) && !is_numeric($max)) {
            throw new InvalidArgumentException(self::formatKey($key) . ' must be a string and the number of characters must be numeric values!');
        } 

        if (strlen($value) < $min || strlen($value) > $max) {
            throw new LengthException(self::formatKey($key) . ' must be between ' . $min . ' characters and ' . $max . ' characters long!');
        }
        return $value;
    }

    public static function getNumber($key, $min = 1, $max = 99999999999)
    {
        $value = trim(str_replace(',', '', self::get($key)));

        if (!self::notEmpty($key)){
            throw new OutOfRangeException(self::formatKey($key) . ' is out of range!');
        } else if (!is_numeric($value)) {
            throw new DomainException(self::formatKey($key) . ' must be a number!');
        } else if(!is_numeric($value) || $value < 0 || !is_numeric($min) && !is_numeric($max)){
            throw new Exception(self::formatKey($key) . ' must be a positive number!');
        } else if ($value < $min || $value > $max) {
            throw new RangeException(self::formatKey($key) . ' must be between ' . $min . ' characters and ' . $max . ' characters long!');
        }
        return $value;
    }

    public static function getDate($key, $min = '1776-07-04', $max = 'next month')
    {
        $date = self::get($key);
        $min = new DateTime($min);
        $max = new DateTime($max);
        try {
            $dateObj = new DateTime($date);

            if ($dateObj < $min) {
                throw new DateRangeException(self::formatKey($key) .' too far in the past.');
            }

            if ($dateObj > $max) {
                throw new DateRangeException(self::formatKey($key) . ' too far in the future.');
            }

            return $dateObj;
            
        } catch (DateRangeException $e) {
            throw new Exception( $e->getMessage() );
        } catch (Exception $e) {
            throw new Exception('Please enter a valid date.');
        }
        
    }

    public static function formatKey($key)
    {
        $key = ucfirst($key);
        $key = str_replace('_', ' ', $key);

        return $key;
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
