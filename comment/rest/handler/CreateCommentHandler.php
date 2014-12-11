<?php
class CreateCommentHandler extends AuthorizedRequestHandler {

	public function handle($params) {
		$json = Utility::getJsonRequestData();

		$validator = new CreateCommentValidator($json);
		if (!$validator->validate()) {
			return $validator->getMessage();
		}

		$json['user_id'] = $this->getUserId();

		$comment = new CommentDao();
        $comment->setBusinessId(!empty($json['business_id']) ? $json['business_id'] : '');
        $comment->setDishId(!empty($json['dish_id']) ? $json['dish_id'] : '');
        $comment->setUserId($this->getUserId());
        $comment->setLat($json['lat']);
        $comment->setLng($json['lng']);
        $comment->setMessage($json['message']);

		$accessToken = $this->getAccessToken();
		$request = new GetUserNicknamesRequest(array($this->getUserId()), $accessToken);
		$nicknames = $request->execute();

		$response = array();
		if ($comment->save()) {
			$response = $comment->toArray();
			$response['user_pic_url'] = $base_image_host.'/display/user/'.$comment->getUserId();
			$response['user_nickname'] = $nicknames[$this->getUserId()];
			$response['create_time'] = 0;
			$response['status'] = 'success';
		} else {
			header('HTTP/1.0 500 Internal Server Error');
			$response['status'] = 'error';
			$response['description'] = 'internal_server_error';
		}

		return $response;
	}
}
?>