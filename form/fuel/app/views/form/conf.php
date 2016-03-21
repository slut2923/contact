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
      <p>以下の内容でよろしければ、『送信する』を押してください。</p>
      <?php echo Form::open(array('action' => 'form/comp')); ?>
        <table>
          <tr>
            <th>お名前</th>
            <td><?php echo $name; ?></td>
          </tr>
          <tr>
            <th>電話番号</th>
            <td><?php echo $tel; ?></td>
          </tr>
          <tr>
            <th>Email</th>
            <td><?php echo $email; ?></td>
          </tr>
          <tr>
            <th>お問い合わせ内容</th>
            <td><?php echo $content; ?></td>
          </tr>
          <tr>
            <th></th>
            <td>
              <?php echo Form::submit('back','修正する', array('class' => 'btn left', )); ?>
              <?php echo Form::submit('submit','送信する', array('class' => 'btn left', )); ?>
              <?php echo Form::hidden(Config::get('security.csrf_token_key'), Security::fetch_token()); ?>
            </td>
          </tr>
        </table>
      <?php echo Form::close(); ?>
    </div>
  </body>
</html>
