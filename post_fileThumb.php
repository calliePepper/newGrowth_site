<?php
    $ds = DIRECTORY_SEPARATOR;  //1
 
    $storeFolder = 'uploads';   //2    
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    if (!empty($_FILES)) {

    class Image {
    
        var $uploaddir;
        var $quality = 80;
        var $ext;
        var $dst_r;
        var $img_r;
        var $img_w;
        var $img_h;
        var $output;
        var $data;
        var $datathumb;
        
        function setFile($src = null) {
            $this->ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));
            if(is_file($src) && ($this->ext == "jpg" OR $this->ext == "jpeg")) {
                $this->img_r = ImageCreateFromjpeg($src);
            } elseif(is_file($src) && $this->ext == "png") {
                $this->img_r = ImageCreateFrompng($src);      
            } elseif(is_file($src) && $this->ext == "gif") {
                $this->img_r = ImageCreateFromgif($src);
            }
            $this->img_w = imagesx($this->img_r);
            $this->img_h = imagesy($this->img_r);
        }
        
        function resize($largestSide = 100) {
                $width = imagesx($this->img_r);
                $height = imagesy($this->img_r);
                $newWidth = 0;
                $newHeight = 0;
            
                if($width > $height){
                     $newWidth = 180;
                     $newHeight = $height * ($newWidth / $width);
                }else{
                     $newHeight = 180;
                     $newWidth = $width * ($newHeight / $height);
                }
        
            $this->dst_r = ImageCreateTrueColor($newWidth, $newHeight);
            imagecopyresampled($this->dst_r, $this->img_r, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            $this->img_r = $this->dst_r;
            $this->img_h = $newHeight;
            $this->img_w = $newWidth;
        }
        
        function createFile($output_filename = null) {
            if($this->ext == "jpg" OR $this->ext == "jpeg") {
                if ($this->ext == 'jpeg') {
                    $output_filename = substr($output_filename,0,-5); 
                } else {
                    $output_filename = substr($output_filename,0,-4); 
                }   
                imagejpeg($this->dst_r, $this->uploaddir.$output_filename.$bonus.'.'.$this->ext, $this->quality);
            } elseif($this->ext == "png") {
                $output_filename = substr($output_filename,0,-4);              
                imagepng($this->dst_r, $this->uploaddir.$output_filename.'.'.$this->ext);
            } elseif($this->ext == "gif") {
                $output_filename = substr($output_filename,0,-4);              
                imagegif($this->dst_r, $this->uploaddir.$output_filename.'.'.$this->ext);
            }
            $this->output = $this->uploaddir.$output_filename.'.'.$this->ext;
        }
        
        function setUploadDir($dirname) {
            $this->uploaddir = $dirname;
        }
        
        function flush() {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetFile = str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
            
            imagedestroy($this->dst_r);
            unlink($targetFile);
            imagedestroy($this->img_r);
            
        }
    
    }

     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
    $fileName = $_FILES['file']['name'];
 
    move_uploaded_file($tempFile,$targetFile); //6

    
    $image = new Image();
    $image->setFile($targetFile);
    $image->setUploadDir($targetPath);
    $image->resize(180);
    $image->createFile($fileName);
    $image->flush();

    echo 'Success! with ' . $targetFile;
}
?>