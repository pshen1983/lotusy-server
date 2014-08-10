<?php
class FollowerDao extends FollowerDaoGenerated {

// ========================================================================================== public

	public static function getFollowerIds($userId) {
		$follower = new FollowerDao();
		$follower->setServerAddress($userId);

		$builder = new QueryBuilder($follower);
		$rows = $builder->select('follower_id')
						->where('user_id', $userId)
						->findList();

		$ids = array();
		foreach ($rows as $row) {
			array_push($ids, $row['follower_id']);
		}

		return $ids;
	}


// ======================================================================================== override

	protected function beforeInsert() {
		$userId = $this->getUserId();
		$sequence = Utility::hashString($userId);
		$this->setShardId($sequence);
	}

	protected function isShardBaseObject() {
		return false;
	}
}
?>