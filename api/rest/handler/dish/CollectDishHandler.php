<?php
class CollectDishHandler extends AuthorizedRequestHandler {

    public function handle($params) {
        $params['userid'] = $this->getUserId();

        $validator = new CollectDishValidator($params);
        if (!$validator->validate()) {
            return $validator->getMessage();
        }

        $dishDao = new DishDao($params['dishid']);

        $dishActivity = new DishActivityDao();
        $dishActivity->setDishId($params['dishid']);
        $dishActivity->setBusinessId($dishDao->getBusinessId());
        $dishActivity->setUserId($validator->getUserId());
        $dishActivity->setActivity(DishActivityDao::LIST_COLLECTION);
        
        if ($dishActivity->save()) {
            DishActivityDao::deleteUserDishHitlist($this->getUserId(), $params['dishid']);

            $user = User::alloc()->initWithId($params['userid']);
            $res = $user->adjustRank();

            $response = array();
            $response['status'] = 'success';
            $response['rankup'] = ($res==1);
        } else {
            $response['status'] = 'success';
            $response['description'] = 'Error occur when save activity.';
        }

        return $response;
    }
}
?>