<?php
class GetDishImageHandler extends UnauthorizedRequestHandler {

	public function handle($params) {
		if (LookupDishImageDao::isDishImageExist($params['dishid'], $params['imageid'])) {
			$fastImage = new FastImageDao($params['imageid']);
	
			if (!$fastImage->isFromDatabase()) {
				global $base_host, $comment_image_default;
				header('HTTP/1.0 404 Not Found');
				$filename = $base_host.$comment_image_default;
			} else {
				$path = $fastImage->getPath();
				$name = $fastImage->getName();
				$filename = $path.$name;
			}
		} else {
			$filename = 'default_file.php';
		}

    	header('Content-Type: image/png');
		readfile($filename);
	}
}
?>