<?php
class Util
{
    static function unmask($cpf)
    {
        return preg_replace("/[^0-9]/", "", $cpf);
    }

    static function maskTel($num)
    {
        if(strlen($num) == 10)
            return mask($num, "(##) ####-####");
        else
            return mask($num, "(##) #####-####");
    }

	static function merge(array $data, $merge)
	{
		$args = func_get_args();
        $return = current($args);

        while (($arg = next($args)) !== false) {
            foreach ((array) $arg as $key => $val) {
                if (!empty($return[$key]) && is_array($return[$key]) && is_array($val)) {
                    $return[$key] = self::merge($return[$key], $val);
                } elseif (is_int($key) && isset($return[$key])) {
                    $return[] = $val;
                } else {
                    $return[$key] = $val;
                }
            }
        }
        return $return;
	}
	public static function get(array $data, $path) {
        if (empty($data)) {
            return null;
        }
        if (is_string($path) || is_numeric($path)) {
            $parts = explode('.', $path);
        } else {
            $parts = $path;
        }
        foreach ($parts as $key) {
            if (is_array($data) && isset($data[$key])) {
                $data = &$data[$key];
            } else {
                return null;
            }
        }
        return $data;
    }
}
