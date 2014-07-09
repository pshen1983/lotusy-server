<?php
class BusinessDao extends BusinessDaoGenerated {

// =========================================================================================================== public

	public static function getBusinessIdsByName($name, $field) {
		$lookup = null;
		$table = '';
		$bid = '';
		$column = '';

		switch ($field) {
			case BusinessDao::NAMEEN:
				$lookup = new LookupBusinessEnNameDao();
				$bid = 'business_id';
				$column = 'en_name';
				break;
			case BusinessDao::NAMETW:
				$lookup = new LookupBusinessTwNameDao();
				$bid = 'business_id';
				$column = 'tw_name';
				break;
			case BusinessDao::NAMEZH:
				$lookup = new LookupBusinessZhNameDao();
				$bid = 'business_id';
				$column = 'zh_name';
				break;
			default:
				return array();
				break;
		}

		$lookup->setServerAddress( Utility::hashString($name) );

		$builder = new QueryBuilder($lookup);
		$rows = $builder->select($bid)->where($column, '%'.$name.'%', 'LIKE')->findList();

		$atReturn = array();
		foreach ($rows as $row) {
			array_push($atReturn, $row[$bid]);
		}

		return $atReturn;
	}

// ============================================ override functions ==================================================

	protected function beforeInsert() {
		$this->setVerified('N');

		$lookup = new LookupBusinessLocationDao();
		$lookup->setLat($this->getLat());
		$lookup->setLng($this->getLng());
		$lookup->setBusinessId($this->getId());
		$lookup->setVerified($this->getVerified());
		$lookup->save();

		$lookup = new LookupBusinessUserDao();
		$lookup->setUserId($this->getUserId());
		$lookup->setBusinessId($this->getId());
		$lookup->save();

		$lookup = new LookupBusinessZhNameDao();
		$lookup->setZhName($this->getNameZh());
		$lookup->setBusinessId($this->getId());
		$lookup->save();

		$lookup = new LookupBusinessTwNameDao();
		$lookup->setTwName($this->getNameTw());
		$lookup->setBusinessId($this->getId());
		$lookup->save();

		$lookup = new LookupBusinessEnNameDao();
		$lookup->setEnName($this->getNameEn());
		$lookup->setBusinessId($this->getId());
		$lookup->save();
	}

    protected function beforeUpdate() {
    	$lookup = LookupBusinessLocationDao::getLookupWithBusiness($this);
    	if ($this->getVerified()!=$lookup->getVerified()) {
    		$lookup->setVerified($this->getVerified());
    		$lookup->save();
    	}
    }

	protected function isShardBaseObject() {
		return true;
	}
}
?>