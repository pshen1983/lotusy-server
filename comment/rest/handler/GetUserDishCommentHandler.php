<?php
class GetUserDishCommentHandler extends UnauthorizedRequestHandler {

	public function handle($params) {
		$json = $_GET;
		$json['user_id'] = $params['userid'];
		$json['dish_id'] = $params['dishid'];

		$validator = new GetUserDishCommentValidator($json);
		if (!$validator->validate()) {
			return $validator->getMessage();
		}

		$commentId = LookupCommentDishDao::getUserDishComment($params['dishid'], $params['userid']);
		$comment = new CommentDao($commentId);

		if (!$comment->isFromDatabase()) {
			header('HTTP/1.0 404 Not Found');
			$response = array('status'=>'error');
			$response['description'] = 'cannot_find_comment';
			return $response;
		}

		$response = $comment->toArray();

		$now = strtotime('now');
		$last = strtotime($response['create_time']);
		$response['create_time'] = $now - $last;

		$response['status'] = 'success';

		return $response;
	}
}
?>