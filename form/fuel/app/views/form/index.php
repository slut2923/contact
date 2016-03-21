<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Practice Form</title>
    <?php echo Asset::css('form.css'); ?>
  </head>
  <body>
    <div class ="form">
      <h1>Practice Form</h1>
      <?php echo Form::open(); ?>
        <table>
          <tr>
            <th><span class="alert">※</span>名前</th>
            <td>
              <?php echo Form::input('name', Session::get_flash('name'), array('placeholder' => '田中 太郎', )); ?>
              <?php if ($val->error('name')): ?>
                <p class="alert"><?php echo $val->error('name'); ?></p>
              <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th><span class="alert">※</span>電話番号</th>
            <td>
              <?php echo Form::input('tel', Session::get_flash('tel'), array('type' => 'number', 'placeholder' => '09012345678', )); ?>
              <?php if ($val->error('tel')): ?>
                <p class="alert"><?php echo $val->error('tel'); ?></p>
              <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th><span class="alert">※</span>Email</th>
            <td>
              <?php echo Form::input('email', Session::get_flash('email'), array('type' => 'email', 'placeholder' => 'example@icloud.com', )); ?>
              <?php if ($val->error('email')): ?>
                <p class="alert"><?php echo $val->error('email'); ?></p>
              <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th><span class="alert">※</span>お問い合わせ内容</th>
            <td>
              <?php echo Form::textarea('content', Session::get_flash('content'), array('rows' => '6', 'placeholder' => 'ここに内容を入力してください', )); ?>
              <?php if ($val->error('content')): ?>
                <p class="alert"><?php echo $val->error('content'); ?></p>
              <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th></th>
            <td>
              <?php echo Form::submit('submit', '内容確認', array('class' => 'btn', )); ?>
              <?php echo Form::hidden(Config::get('security.csrf_token_key'), Security::fetch_token()); ?>
            </td>
          </tr>
        </table>
      <?php echo Form::close(); ?>
    </div>
  </body>
</html>
