<?php
/**
*@author  				The-Di-Lab
*@email   				thedilab@gmail.com
*@website 				www.the-di-lab.com
*@version              1.0
**/
class Downloader {
		
		private $_folderName;
		private $_files;	
		private $_tempDir;
		private $_tempFile;
		private $_msg;
		private $_autoDelete;
		private $_debug;
				
        /**
         * Constructor
         */
        public function __construct()
        {
        	
        	$this->_folderName  = 'download';        	
        	$this->_files	    = array();        	
        	$this->_tempDir     = dirname(__FILE__);
        	$this->_tempFile    = '';
        	$this->_msg		    = array();        	
        	$this->_autoDelete  = true;
        	$this->_debug 		= false;
        }
        
        /*
        * enable debug, so error message can be showed
        * @return void
        * @access public
        */
        public function enableDebug()
        {
        	$this->_debug = true;
        }
        
        /*
        * get array messages
        * @return array
        * @access public
        */
        public function getMsg()
        {
        	return $this->_msg;
        }
        
        /*
         * auto delete temp files after download
         * $param  bool
         * @return void
         * @access public
         */
        public function setAutoDelete($bool)
        {
        	if(is_bool($bool)){
        		$this->_autoDelete=$bool;
        	}
        }
        
        /*
        * set file name for the downloaded file
        * @param string 
        * @return void
        * @access public
        */
        public function setFolderName($name)
        {
        	if(!empty($name)){
        		$this->_folderName = $name;
        	}        	
        }
                        
        /*
        * set files to download
        * @param string/array file path/folder path
        * @return void 
        * @access public
        */
        public function setFiles($files) 
        {
        	if(!is_array($files)){
        		$files = array($files);
	        }	        
	        foreach($files as $file){
	        	//add from folder, recursive call
				if(is_dir($file)){
					foreach(glob($file.'/*') as $sub ){
						$this->setFiles($sub);
					}		
				//add file
				}else{
					$this->_files[]=$file;		    	
				}
	        }   	        
        }
        
        /*
        * start download
        * @return void 
        * @access public
        */
        public function download()
        {  
        	//set some config value
        	ini_set("max_execution_time", 0);
        	//hide all error message
        	if(!$this->_debug){
        		error_reporting(0);
        	}        	       	
        	$temp=array();
			$this->_tempFile = $this->_tempDir.'/'.$this->_folderName;
			$temp[]=$this->_tempFile;
			$downloadFile =$this->_tempFile;
			//create download temp folder and add files to it		
			if($this->_createDownload($this->_tempFile,$this->_files)){
				//zip file 
	        	if(!$this->_createZip($this->_tempFile,$this->_tempFile.'.zip',true)){
	        		return false;
	        	}
        		$downloadFile = $this->_tempFile.'.zip';
        		$temp[]       = $downloadFile;	        	  	
	        	//download it
				$this->_chunkDownload($downloadFile);	        	
	        	//delete temp files
	        	if($this->_autoDelete){
	        		if(!$this->_clearTempFiles($temp)){
	        			return false;
	        		}
	        	}
			}else{
				return false;
			}
			return true;
        }
        
        /*
        * download the zip file by chunks
        * @param string file
        * @return void
        * @access private
        */
        private function _chunkDownload($file)
        {
	          //then send the headers to force download the zip file
			  header("Content-type: application/zip");
			  header("Content-Disposition: attachment; filename=".basename($file));
			  header("Pragma: no-cache");
			  header("Expires: 0");
			  header('Content-Length: ' . filesize($file));	 
			  //send by chunks
			  $size = intval(sprintf("%u", filesize($file))); 
			  $chunkSize = 1 * (1024 * 1024); // how many bytes per chunk
			  if ($size > $chunkSize) {
					$handle = fopen($file, 'rb');
					$buffer = '';
					while (!feof($handle)) {
					  $buffer = fread($handle, $chunkSize);
					  echo $buffer;
					  ob_flush();
					  flush();
					}
					fclose($handle);
			  } else {
					readfile($file);
			  }
        }
        
        /*
        * create download folder and add files to it
        * @param string destination
        * @param array array of files
        * @return bool 
        * @access private
        */
        private function _createDownload($des,$files)
        {        	
        	$ok=true;
        	//create download folder
			if(file_exists($des)){
				if(!is_writable($des)){
					$this->_setMsg($des.' is not writable by PHP',__LINE__);
					return false;
				}				
			}else{
				if(!mkdir($des, 0777, true)){
					$this->_setMsg($des.' can not be created by PHP',__LINE__);
					return false;
				}
				chmod($des, 0777);
			}
			//copy files to the folder
			if(sizeof($files)>0){
				foreach($files as $file){
					if(!file_exists($file)){
						$ok=false;
						$this->_setMsg($file.' does not exist',__LINE__);
					}else{
						if(!copy($file,$des.'/'.basename($file))){
							$ok=false;
							$this->_setMsg('Unable to copy file '.$file,__LINE__);
						}
					}					
				}
			}	
			return $ok;
        }
        
        /*
        * create zip file and add files to the zip
        * @param string destination
        * @param bool overwrite
        * @return bool 
        * @access private
        */
		private function _createZip($folder,$destination='',$overwrite = true) 
		{		   
		  //if the zip file already exists and overwrite is false, return false
		  if(file_exists($destination) && !$overwrite){
		  	 $this->_setMsg($destination.' already exists',__LINE__);
		  	 return false; 
		  }
		  if(file_exists($folder)){
		  	  //get files from temp folder
		  	  $files=array();
		  	  foreach(glob($folder.'/*') as $file){
		  	  	$files[]=$file;
		  	  }
			  //vars
			  $validFiles = array();
			  //if files were passed in...
			  if(is_array($files)) {
			    //cycle through each file
			    foreach($files as $file) {
			      //make sure the file exists
			      if(file_exists($file)) {
			        $validFiles[] = $file;
			      }
			    }
			  }
			  //if we have good files.
			  if(count($validFiles)) {
			    //create the archive
			    $zip = new ZipArchive();
			    $ok  = $zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE);
			    if($ok!== true) {
			      $this->_setMsg('Unable to create zip file: '.$ok,__LINE__);
			      return false;
			    }
			    //add the files
			    foreach($validFiles as $file) {
			      if(!$zip->addFile($file,basename($file))){
			      	$this->_setMsg('Unable to add file '.$file.' to zip',__LINE__);
			      }
			    }		   
			    $zip->close();		    
			    //check to make sure the file exists
			    return file_exists($destination);
			  }else{
			    return false;
			  }
		  }
		}
      			
		/*
		 * delete temp files
		 * @param array files
		 * @return bool 
         * @access private
		 */
		private function _clearTempFiles($files)
		{	
			$ok=true;
			if(sizeof($files)>0){
				foreach ($files as $file){
					if(!file_exists($file)||!is_writable($file)){
							$this->_setMsg($file.' does not exist or it is not writable by PHP',__LINE__);
							$ok=false;
					}else{
						//remove folder
						if(is_dir($file)){
							foreach(glob($file.'/*') as $single){
								$this->_clearTempFiles(array($single));
							}	
							if(!rmdir($file)){
								$this->_setMsg('Unable to remove folder '.$file,__LINE__);
							}
						//remove file
						}else{
							if(!unlink($file)){
								$this->_setMsg('Unable to remove file '.$file,__LINE__);
								$ok=false;
							}
						}						
					}
				}	
			}
			return $ok;
		}

		/*
		 * set error message
		 * 
		 */
		private function _setMsg($msg,$line)
		{
			if($this->_debug){
        		$this->_msg[] = 'line '.$line.': '.$msg;
        	} 			
		}
}