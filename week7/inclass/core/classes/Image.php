<?php
/*
EXAMPLE:

   $path='/somepath/to/an/image.jpg';

   $newpath = '/some/other/path/for/the/image.jpg';
   $image = new image();

   //Get image from $path;
   $image->byStr($path);

   //Resize the image to $width, $height
   $image->resize($width,$height);

   //Save the image to $newpath
   $image->jpeg($newpath);
*/


class Image
{
    var $im;
    var $fonts;
    
    //Creates a new class
    function __construct($str='')
    {
        $this->im = null;
        if($str!='')
        {
        	$this->byStr($str);
        }
        $this->fonts = array();
    }
    
    //Loads a font
    function loadFont($font,$name='')
    {
        $this->fonts['name']=imageloadfont($font);
    }
    
    //Writes a char to the image on position
    function char($char,$x,$y,$font=1,$color='')
    {
        if($color=='')
        {
            $color = imagecolorallocate ($this->im, 255, 0,0);
        }
        imagechar($this->im,$font,$x,$y,$char,$color);
    }

    //get the type of an image: supports only png, jpg and gif.
    //$path is the location of the image.
    function getType($path)
    {
      $a = getimagesize($path);
			switch($a[2])
      {
          case 3:
          return 'png';
          break;
          case 2:
          return 'jpg';
          break;
          case 1:
          return 'gif';
      }
      return false;
    }
    
    //set the image from a resource.
    function byResource($resource)
    {
        $this->im = $resource;
    }
    
    //Sets the image from a path.
    function byStr($str)
    {
        if($str)
        {
            $a = getimagesize($str);            
            switch($a[2])
            {
                case 3:
                $this->im =imagecreatefrompng ($str);
                break;
                case 2:
                $this->im =imagecreatefromjpeg ($str);
                break;
                default:
                $this->im =imagecreatefromgif ($str);
            }
        }
    }
    
    function getWidth()
    {
        return imagesx($this->im);
    }
    
    function getHeight()
    {
        return imagesy($this->im);
    }
    
    //Tag the image in the bottom right corner with another image
    function tag($path,$x=-1,$y=-1)
    {
        $im = new rgImage();
        $im->byStr($path);
        $x = $this->getWidth()-$im->getWidth();
        $y = $this->getHeight()-$im->getHeight();
        imagecopyresized ($this->im, $im->im, $x, $y, 0, 0, $this->getWidth(), $this->getHeight(), $this->getWidth(), $this->getHeight());
    }
    
    //Output or save the image
    function gif($path=null)
    {
        if($path)
        {
            $h = fopen($path,'w');
            fclose($h);
            return imagegif($this->im,$path);
            //chmod($path,0777);
        }
        else

        {
            return imagegif($this->im);
            
        }
    }
    
     //Output or save the image
    function png($path=null)
    {
        if($path)
        {
            $h = fopen($path,'w');
            fclose($h);
            return imagepng($this->im,$path);
            //chmod($path,0777);
        }
        else
        {
            return imagepng($this->im);
            
        }
    }
    
    //Output or save the image
    function jpeg($path=null)
    {
        if($path)
        {
            $h = fopen($path,'w');
            fclose($h);
            $var = imagejpeg($this->im,$path,100);
            //chmod($path,0777);
            return $var;
        }
        else
        {
            return imagejpeg($this->im);
        }
    }
    
    function jpg($path=null)
    {
    	return $this->jpeg($path);
    }
    
    //Return a copy of the image
    function copy()
    {
        $im = imagecreatetruecolor($this->getWidth(),$this->getHeight());
        imagecopy ( $im, $this->im, 0, 0, 0, 0, $this->getWidth(), $this->getHeight());
        $im1 = new Image();
        $im1->byResource($im);
        return $im1;
    }
    
    //Resize the image
    function resize($width,$height=null)
    {
        $proportion = $width / $this->getWidth();
        if($height==null)
        {
            $height = round(($proportion*$this->getHeight()));
        }
        global $_USER;
        $im = imagecreatetruecolor($width,$height);
//        imagecopyresized ( $im, $this->im, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        imagecopyresampled ($im, $this->im, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->im=$im;
    }
		
		//Resize the image using the height as the control, rather than the width
		function resizeH($height)
		{
			$proportion = $height / $this->getHeight(); 
			$width = round($proportion * $this->getWidth());
			$im = imagecreatetruecolor($width,$height);
			imagecopyresampled ($im, $this->im, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->im = $im; 
		}
		
		//Added function to do simple file upload.  This will move the file rather than copying it & leaving the original in the temp folder.
		function uploadFile($file, $path){
			//ini_set("safe_mode","0");
			if ($file['name'] > '') {
				$fileName = $file['name'];		
				if (is_uploaded_file($file['tmp_name'])) { //may need to tack on ['field'] here if there are more images than one in the $_FILE
					//server uploads the file to the temp location
					//now move to the correct location
					move_uploaded_file($file['tmp_name'], $path.$fileName);
					//chmod($path.$fileName, 0775 );
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}
	
	// This will upload an image, copy it, and scale the copy down if the dimensions are beyond our desired w & h
	// You do need to specify both a width & height, it will use the larger one to determine the appropriate scale.  The smaller one won't be used. 
	// field = the name of the image form field
	function postImage($file, $newName, $dir, $w = false, $h = false)
		{
			//check the type - only want jpg, gif or png.
			$type = $this->getType($file['tmp_name']);
			if (($type != 'jpg') && ($type != 'jpeg') && ($type != 'gif') && ($type != 'png'))  
				return false; 
			
			//first we post up the original file unchanged
			if (!$this->uploadFile($file,$dir)) {
				return false;   
			}
			
			//now we create a new scaled version if needed
			if (($w) && ($h)){ 
				$this->byStr($dir.$file['name']); //get the image from the path
				$t = $this->copy(); 
				if($t->getWidth() > $t->getHeight() && $t->getWidth() > $w){
					$t->resize($w);
				}
				elseif ($t->getWidth() < $t->getHeight() && $t->getHeight() > $h){
					$t->resizeH($h); 
				}
				elseif ($t->getWidth() == $t->getHeight() && $t->getWidth() > $w){
					//its a perfect square, but still too big
					$t->resize($w);
				}
			
				//now save the new image. 
				if ($type == 'jpg' || $type == 'jpeg')
					$t->jpeg($dir.$newName);
				if ($type == 'png')
					$t->png($dir.$newName);
				if ($type == 'gif')
					$t->gif($dir.$newName);
			}	
			return true;
		}

	//this function generates a thumbnail version of an image already on the server. 
	//the new file will be prefaced with "t_"
	function thumbnail($imgName, $dir, $w, $h)
	{
		$this->byStr($dir.$imgName); //get the image from the path
		$t = $this->copy();
		if($t->getWidth() > $t->getHeight() && $t->getWidth() > $w){
			$t->resize($w);
		}
		elseif ($t->getWidth() < $t->getHeight() && $t->getHeight() > $h){
			$t->resizeH($h); 
		}
		elseif ($t->getWidth() == $t->getHeight() && $t->getWidth() > $w){
			//its a perfect square, but still too big
			$t->resize($w);
		}
		
		$type = $this->getType($dir.$imgName);
		if (($type != 'jpg') && ($type != 'jpeg') && ($type != 'gif') && ($type != 'png'))  
				return false; 
			
		//now save the new image. 
		if ($type == 'jpg' || $type == 'jpeg')
			$t->jpeg($dir.'t_'.$imgName);
		if ($type == 'png')
			$t->png($dir.'t_'.$imgName);
		if ($type == 'gif')
			$t->gif($dir.'t_'.$imgName);
		
		return true;
	}
}
?>