<?php
class Config
{
	private static $instance;
	private $data = array();

	public static function getInstance()
	{
        if (static::$instance === null)
        {
            static::$instance = new self();
        }
        return static::$instance;
    }

	static function load($files, $path)
	{
		$instance = self::getInstance();
		if(is_array($files))
		{
			foreach($files as $file)
				self::load($file, $path);
		}
		else
		{
			$instance->add(require $path . $files . ".php");
		}
	}

	public static function add(array $configs)
	{
		$instance = self::getInstance();
		$instance->data = Util::merge($instance->data, $configs);
	}

	public static function get($name = null, $default = null)
	{
        $instance = self::getInstance();
        if ($name === null)
        {
            return $instance->data;
        }
        else
        {
            $data = Util::get($instance->data, $name);
            if ($data !== null)
            {
                return $data;
            }
            return $default;
        }
    }
}