<?php
class Message
{
	static function display($msg, $url)
	{
		Session::write('message', $msg);
		header("Location: {$url}");
		die();
	}

	static function getMessage()
	{
		$message = Session::read('message');

		if($message != null)
			return $message;
		
		return null;
	}

	static function deleteMessage()
	{
		Session::delete('message');
	}
}