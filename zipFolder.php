
private function zipFolder($tempFolder){
		// Get real path for our folder
		$rootPath = realpath("/tmp/" . $tempFolder);
		//$rootPath = realpath("/tmp/20170224033104");
		
		//\Yii::info($rootPath, 'cart');	
		//\Yii::info('/tmp/' . $tempFolder . '.zip', 'cart');	
		
		
		// Initialize archive object
		$zip = new \ZipArchive();
		//\Yii::info($zip, 'cart');	
		$zip->open("/tmp/" . $tempFolder . ".zip", \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
		//$zip->open('/tmp/aa.zip', \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
		//\Yii::info($zip, 'cart');	
		// Create recursive directory iterator
		/** @var SplFileInfo[] $files */
		$files = new \RecursiveIteratorIterator(
			new \RecursiveDirectoryIterator($rootPath),
			\RecursiveIteratorIterator::LEAVES_ONLY
		);
		//\Yii::info($files, 'cart');	
		foreach ($files as $name => $file)
		{
				//\Yii::info($file, 'cart');	
			// Skip directories (they would be added automatically)
			if (!$file->isDir())
			{
				// Get real and relative path for current file
				$filePath = $file->getRealPath();
				$relativePath = substr($filePath, strlen($rootPath) + 1);
				//\Yii::info($relativePath, 'cart');	

				// Add current file to archive
				$zip->addFile($filePath, $relativePath);
			}
		}

		// Zip archive will be created only after closing object
		$res = $zip->close();	
		//\Yii::info($res, 'cart');		
	
	}



