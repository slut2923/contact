<?php
class Controller_Form extends Controller
{
	private $fields = array('name', 'tel', 'email', 'content');

	public function action_index()
	{
		if (Input::post('submit')) {
			foreach ($this->fields as $value) {
				Session::set_flash($value, Input::post($value));
			}
		}

		$val = Validation::forge();
		$val->add('name', '名前')
			->add_rule('required');
		$val->add('tel', '電話番号')
			->add_rule('required');
		$val->add('email', 'Email')
			->add_rule('required')
			->add_rule('valid_email');
		$val->add('content', 'お問い合わせ内容')
			->add_rule('required');

		if ($val->run() and Security::check_token()) {
			Response::redirect('form/conf');
		}

		$data = array();

		$data['val'] = $val;

		return Response::forge(View::forge(('form/index'),$data));
	}

	public function action_conf()
	{
		$data = array();
		foreach ($this->fields as $value) {
			$data[$value] = Session::get_flash($value);
			Session::keep_flash($value);
		}

		return Response::forge(View::forge(('form/conf'), $data));
	}

	public function action_comp()
	{
		$data = array();
		if (Input::post('back')) {
			foreach ($this->fields as $value) {
				Session::keep_flash($value);
			}
			Response::redirect('/');
		}

		if (!Security::check_token()) {
			$data['message'] = "ページ遷移が不正です";
			return View::forge('form/comp', $data);
		}
		// ここからわからん
		// if (Session::get_flash('email')) {
		// 	$mail = array();
		// 	foreach ($this->fields as $value) {
		// 		$mail[$value] = Session::get_flash($value);
		// 	}
		// 	$body = View::forge('', $mail);
		// 	$email = Eamil::forge();
		// 	$email->from(Session::get_flash('email'), Session::get_flash('name'));
		// 	$email->to(Config::get(''));
		// 	$email->subject('【fuweb.info】お問い合わせ');
		// 	$email->body(mb_convert_encoding($body, 'jis'));
		//
		// 	try{
		// 		$email->send();
		// 	} catch(\EmailValidationFailedException $e) {
		// 		$message = "送信に失敗しました。送信先のメールアドレスが正しくありません";
		// 	} catch(\EmailSendingFailedException $e) {
		// 		$message = "送信に失敗しました。";
		// 	}
			$message = '送信が完了しました。ありがとうございました。';
		// } else {
		// 	$message = 'お問い合わせフォームが正しく送信されていません。';
		// }
		// ここまでわからん

		$data['message'] = $message;

		return Response::forge(View::forge('form/comp', $data));
	}
}
