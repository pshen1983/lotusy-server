<?php
class LookupBusinessEnNameDao extends LookupBusinessEnNameDaoGenerated {

// =========================================================================================================== public

	public static function isEnNameExist($name) {
		$lookup = new LookupBusinessLocationDao();
		$lookup->setServerAddress(Utility::hashString($name));

		$builder = new QueryBuilder($lookup);
		$res = $builder->select('COUNT(*) as count')->where('en_name', $name)->find();

		return $res['count']>0;
	}

// ============================================ override functions ==================================================

	protected function beforeInsert() {
		$sequence = Utility::hashString($this->getEnName());
		$this->setShardId($sequence);
	}

	protected function beforeUpdate() {
		$sequence = Utility::hashString($this->getEnName());
		$this->setServerAddress($sequence);
	}

	protected function isShardBaseObject() {
		return false;
	}
}
?>