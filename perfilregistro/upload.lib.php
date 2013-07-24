<?php

class Upload 
{
	var $directory;
	var $filename;	
	var $ext;
	var $setfile;

	function SetDirectory($dir) //Especifica el directorio a utilizar para subir los archivos
	{
		if(file_exists($dir))
			$this->directory = $dir;
		elseif($dir == '')
			$this->directory = '';
		return true;
	}	

	function SetFile($filetype) //Recibe el nombre del campo que subio el archivo, fija las variables de la clase ext = extension del archivo, filename el nombre del archivo mas su extension, setfile contiene el nombre del archivo temporal.
	{
		$this->filename = stripslashes($_FILES[$filetype]['name']);
		$this->setfile = $_FILES[$filetype]['tmp_name'];
		$neil = strrpos($this->filename,".");
		if(!$neil) return false;
		if($_FILES[$filetype]['error'] > 0) return false;
		$lagz = strlen($this->filename) - $neil;
		$this->ext = substr($this->filename,$neil+1,$lagz);
		return true;
	}

	function Size($filetype) //recibe el nombre del campo que subio el archivo, retorna el tamaño en bytes del archivo subido, si hubo error retorna false
	{
		if($_FILES[$filetype]['error'] > 0) return false; else
		return $_FILES[$filetype]['size'];
	}	

	function UploadFile($filename = "") //recibe el nombre que se le dara al nuevo archivo y lo mueve al directorio especificado, si no recibe un nombre conserva el nombre original.
	{
		if ($filename == "")
			$filename = $this->filename;
		else
			$filename = $filename.'.'.$this->ext;
		if(isset($this->directory))
		{
			$dir = $this->directory;
			move_uploaded_file($this->setfile, $dir.'/'.$filename);
			return true;
		}
		else
			return false;
	}	

}
?>