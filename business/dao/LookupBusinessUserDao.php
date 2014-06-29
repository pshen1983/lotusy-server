<?php
class LookupBusinessUserDao extends LookupBusinessUserDaoGenerated {

// ============================================ override functions ==================================================

	protected function beforeInsert() {
		$sequence = $this->getUserId();
		$this->setShardId($sequence);
	}

	protected function isShardBaseObject() {
		return false;
	}
}
?>