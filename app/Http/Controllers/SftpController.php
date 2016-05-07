<?php namespace App\Http\Controllers;

use SSH;

class SftpController extends Controller {

	public function index()
	{		
		$localFile 	= env('SFTP_LOCAL_FILE');
		$keyphrase = env('SFTP_KEYPHRASE');

		$expCommand = "/home/ngage360/public_html/resources/expect/sftp.exp " . $keyphrase . " " . $localFile; 

		try{
			$expResult = shell_exec($expCommand);
			echo $expResult;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

}
