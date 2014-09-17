<?php
class PostCommentImageHandler extends AuthorizedRequestHandler {

	public function handle($params) {
		global $comment_image_dir;

		$userId = $this->getUserId();

		$fileName = 'fast_'.date('YmdHis').'_'.$userId.'_'.rand (0, 10000).'.png';

		$this->saveFile($comment_image_dir, $fileName);
		$imageId = $this->saveFastImageDao($comment_image_dir, $fileName);
		$this->saveLookupDaos($userId, $params['commentid'], $imageId);

		$atReturn['status'] = 'success';
		$atReturn['image_id'] = $imageId;

		return $atReturn;
	}

	private function saveFile($path, $name) {
		$imageDate = Utility::getRawRequestData();

		file_put_contents($path.$name, $imageDate);
	}

	private function saveFastImageDao($path, $name) {
		$commentImage = new FastImageDao();
		$commentImage->setName($name);
		$commentImage->setPath($path);
		$commentImage->save();

		return $commentImage->getId();
	}

	private function saveLookupDaos($userId, $commentId, $imageId) {
		$lookupComment = new LookupCommentImageDao();
		$lookupComment->setFastId($imageId);
		$lookupComment->setCommentId($commentId);
		$lookupComment->save();

		$lookupUser = new LookupUserImageDao();
		$lookupUser->setFastId($imageId);
		$lookupUser->setUserId($userId);
		$lookupUser->setType(LookupUserImageDao::TYPE_COMMENT);
		$lookupUser->save();
	}
}
?>