<?php
class GetBusinessCommentHandler extends AuthorizedRequestHandler {

	public function handle($params) {
		$json = $_GET;
		$json['business_id'] = $params['businessid'];

		$validator = new GetBusinessCommentValidator($json);
		if (!$validator->validate()) {
			return $validator->getMessage();
		}

		$comments = CommentDao::getCommentsByBusinessId ( 
						$json['business_id'], $json['start'], $json['size'] );

		$response = array();
		$response['status'] = 'success';
		$response['comments'] = array();

		$commentIds = array();
		$userIds = array();
		foreach ($comments as $comment) {
			array_push($commentIds, $comment->getId());
			array_push($userIds, $comment->getUserId());
		}

		$request = new GetCommentsImageLinksRequest($commentIds, $this->getAccessToken());
		$links = $request->execute();

		$now = strtotime('now');

		$accessToken = $this->getAccessToken();
		$request = new GetUserNicknamesRequest($userIds, $accessToken);
		$nicknames = $request->execute();

		foreach ($comments as $comment) {
			$commentArr = $comment->toArray();
			$commentArr['user_pic_url'] = $base_image_host.'/display/user/'.$comment->getUserId();
			$commentArr['user_nickname'] = $nicknames[$comment->getUserId()];
			$count = ReplyDao::getReplyCountByCommentId($comment->getId());

			$last = strtotime($commentArr['create_time']);
			$commentArr['create_time'] = $now - $last;

			$commentArr['reply_count'] = (int)$count;
			$commentArr['image_links'] = $links[$comment->getId()];
			array_push($response['comments'], $commentArr);
		}

		return $response;
	}
}
?>