<?php
class GetMeBuddyAddSuggestHandler extends AuthorizedRequestHandler {

    public function handle($params) {
        $userId = $this->getUserId();
        $user = User::alloc()->initWithId($userId);

        $followingSuggest = $user->getUsersWithSimilarFollowing(0, 5);
        $dishSuggest = $user->getUsersWithSimilarTaste(0, 5, true);

        $list = $followingSuggest;
        foreach ($dishSuggest as $userId=>$detail) {
            if (isset($list[$userId])) {
                $list[$userId] = $list[$userId] + $detail;
            } else {
                $list[$userId] = $detail;
            }
        }

        $response = array('status'=>'success');
        $response['list'] = $list;

        return $response;
    }
}
?>