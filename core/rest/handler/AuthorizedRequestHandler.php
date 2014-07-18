<?php
abstract class AuthorizedRequestHandler implements RequestHandler {

	private $userId = null;
	private $accessToken = null;

	public function execute($params) {

		if (!$this->validateAuthenticationHeader()) {
			header('HTTP/1.0 401 Unauthorized');

			$response = array();
			$response['status'] = 'error';
			$response['description'] = 'unauthorized_request';
		} else {
			$response = $this->handle($params);
		}

		return json_encode($response);
	}

	protected function getUserId() {
		return $this->userId;
	}

	private function validateAuthenticationHeader() {
		$headers = apache_request_headers();
		$valid = isset($headers['Authorization']);

		if ($valid) {
			$accessToken = explode(' ', $headers['Authorization']);
			$valid = $accessToken[0] == 'Bearer';
		}

		if ($valid) {
			$this->accessToken = $accessToken[1];
			$request = new GetAccessTokenInfoRequest($this->accessToken);
			$response = $request->execute();

			if ($response['status']=='success') {
				$valid = $response['expires_in']>0;
			} else {
				$valid = false;
			}
		}

		if ($valid) {
			$this->userId = $response['user_id'];
		}

		return $valid;
	}

	protected function getAccessToken() {
		return $this->accessToken;
	}

	abstract public function handle($params);
}
?>