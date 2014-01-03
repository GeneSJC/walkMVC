<?php

class RecoverLogic
{
	
	/**
	 * 1. Get the email request param
	 * 2. Check in the db - if not there, show error message on same page
	 * 3. Send an email link 
	 * 		- /user/resetpwd/:$randomNum
	 * 		- link will have random #
	 * 		- we will have a recover_tbl where we store:
	 * 			> userid, date, random #
	 * 
	 * 4. /user/reset/:$randomNum goes to
	 * 		- if $randomNum valid, show reset view
	 * 		- reset_pwd.tpl
	 */
	public function actionSendRecoverEmail()
	{
		BaseAppUtil::xlog ("enter actionSendRecoverEmail");
		
		// 1. Logic to get the email and see if it exists
		$recoverFormConfig =  new RecoverFormConfig();
		$emailQueryArr = $recoverFormConfig->getEmailQueryArray();
		if ( $emailQueryArr == null )
		{
			echo "Missing fields";
			return;
		}
		
		// var_dump($emailQueryArr);
		
		BaseAppUtil::xlog ("email = " . $emailQueryArr['email'] );
		
		$adapter = getDbAdapter();
		$userMapper = new UserMapper($adapter);
		$user = $userMapper->first($emailQueryArr);
		
		if (! $user)
		{
			return Msg::NO_SESSION;
		}

		$resetKey = $this->saveResetKey( $emailQueryArr['email'] );
		if ($resetKey)
		{
			BaseAppUtil::xlog ("sending Recover email");
			BaseAppUtil::sendRecoverEmail($emailQueryArr['email'], $resetKey); // FIXME - add try/catch
			return Msg::SEND_RECOVER_EMAIL_SUCCEEDED;
		}
		
		BaseAppUtil::xlog ("send failed");
		
		return Msg::SEND_EMAIL_FAILED; // unexpected error FIXME create constants
	}
	
	private function saveResetKey($email=null)
	{
		BaseAppUtil::xlog ("Enter saveResetKey with email = $email");
		
		BaseAppUtil::xlog ( "11 trying to save key info :  $email ");
		$resetKey = randString(10);
		BaseAppUtil::xlog ("22 trying to save key info :$resetKey  $email ");
			
		// echo "TODO: [SAVE GENERATED KEY & SEND EMAIL] Got user for recover email: " . $_POST['email'];
		// echo "random string: " . $resetKey;
		
		// need to save the info
		$adapter = getDbAdapter();
		$recoverMapper = new RecoverMapper($adapter);
		
		$recoverEntity = $recoverMapper->get();
		
		$recoverEntity->email = $email;
		$recoverEntity->reset_key = $resetKey;
		
		BaseAppUtil::xlog ("trying to save key info: $resetKey  $email ");
		
		$recoverMapper->save($recoverEntity);
		
		return $resetKey;
	}
}
