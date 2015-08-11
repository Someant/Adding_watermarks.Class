<?php
class addwatermark
{
	private $stamp;	//WaterMarks File
	private $im;	//Original Picture
	private $path;	//New images path
	private $dir;	
	private $key;
	private $value;	
	private $config; //config
	
	public function Adding_watermarks($stamp,$im,$path)
	{	
		/*
		 * PHP GD
		 * adding watermark to an image with GD library
		 */
		
		// Load the watermark and the photo to apply the watermark to
		$stamp = imagecreatefrompng($stamp);
		
		$im_array=count(explode('.',$im));
		if(explode('.',$im)[($im_array-1)]=='jpg')
		{
			$im = imagecreatefromjpeg($im);
		}
		
		if(explode('.',$im)[($im_array-1)]=='png')
		{
			$im = imagecreatefrompng($im);
		}
		
		
		// Set the margins for the stamp and get the height/width of the stamp image
		$marge_right = 10;
		$marge_bottom = 10;
		$sx = imagesx($stamp);
		$sy = imagesy($stamp);
		
		// Copy the stamp image onto our photo using the margin offsets and the photo 
		// width to calculate positioning of the stamp. 
		imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
		
		//mkdir		
		if($this->k('/',$path))
		{
			$count=count(explode('/',$path));
			$dir=explode(explode('/',$path)[$count-1],$path);
			$this->mkdirs($dir[0]);
		}
		
		
		// Output and free memory
		header('Content-type: image/'.explode('.',$path)[1]);
		imagepng($im,$path);
		imagedestroy($im);
		//var_dump($im);
		return $path;	
	}
	
	//create dir	
	public function mkdirs($dir,$mode=0777)
	{
		if(is_dir($dir)||@mkdir($dir,$mode)){
			return true;
		}
		if(!$this->mkdirs(dirname($dir),$mode)){
			return false;
		}
		return @mkdir($dir,$mode);
	}
	
	
	public function k($key,$value)
	{
		$str=explode($key,$value);
		if(count($str)>1)
			return true;
		else
			return false;
	}	

}
?>