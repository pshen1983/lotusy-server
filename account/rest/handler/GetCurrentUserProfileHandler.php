<?php
class GetCurrentUserProfileHandler extends UnauthorizedRequestHandler {

	public function handle($params) {
		$validator = new GetCurrentUserProfileValidator($params);
		if (!$validator->validate()) {
			return $validator->getMessage();
		} 

		$user = new UserDao($validator->getUserId());

		$user->var[UserDao::LASTLOGIN] = gmdate('Y-m-d H:i:s');
		$user->save();

		$response = $user->var;
		$response['status'] = 'success';

		return $response;
	}
}
?>