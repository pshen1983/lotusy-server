<?php
class GetUserFollowingsHandler extends AuthorizedRequestHandler {

    public function handle($params) {
        $json = $_GET;
        $json['userid'] = $params['userid'];

        $validator = new GetUserFollowingsValidator($json);
        if (!$validator->validate()) {
            return $validator->getMessage();
        }

        $user = User::alloc()->initWithId($params['userid']);
        $followings = $user->getFollowingUsers($json['start'], $json['size']);

        $response = array();
        $response['status'] = 'success';
        $response['users'] = array();
        foreach ($followings as $userId=>$following) {
            $isFollowing = FollowerDao::isFollower($userId, $this->getUserId());
            $following['following'] = $isFollowing;
            $response['users'][] = $following;
        }

        return $response;
    }
}