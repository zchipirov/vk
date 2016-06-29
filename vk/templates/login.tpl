{include file="logheader.tpl" title=foo}
    <div class="container">

      <form class="form-signin" role="form" id="auth" name="auth" method="POST">
        <h2 class="form-signin-heading">Авторизация</h2>
        <input type="text" id="login" name="login" class="form-control" placeholder="Логин" required autofocus>
        <input type="password" id="passwd" name="passwd" class="form-control" placeholder="Пароль" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">¬ход</button>
      </form>

    </div> <!-- /container -->
{include file="logfooter.tpl"}