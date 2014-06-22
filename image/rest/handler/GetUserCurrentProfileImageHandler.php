<?php
class GetUserCurrentProfileImageHandler extends UnauthorizedRequestHandler {

	public function handle($params) {
		$userImage = UserImageDao::getImageDaoByUserId($params['userid']);

		if (!isset($userImage)) {
			global $base_host, $user_image_default;
			header('HTTP/1.0 404 Not Found');
			$filename = $base_host.$user_image_default;
		} else {
			$path = $userImage->var[UserImageDao::PATH];
			$name = $userImage->var[UserImageDao::NAME];
			$filename = $path.$name;
		}

    	header('Content-Type: image/jpeg');
		readfile($filename);
	}
}
?>