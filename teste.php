<?php
  // autoload do composer
  include_once "C:/wamp64/www/Motiro/vendor/autoload.php";

  // Declarações de escopo

  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  define('APPLICATION_NAME', 'Google Calendar API PHP Quickstart');
  define('REDIRECT_URL', $redirect_uri);
  define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
  define('SCOPES', implode(' ', array(
    Google_Service_Calendar::CALENDAR)
  ));

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      // Isso aqui que registra o login e salva na sessão
      if (!headers_sent()) {
        session_start();
      }

      // declaração da API do Google
      $client = new Google_Client();
      $client->setAuthConfig(CLIENT_SECRET_PATH);
      $client->setRedirectUri(REDIRECT_URL);
      $client->setScopes(SCOPES);
      $client->setAccessType('offline');

      // declaração da API do Google Calendar
      $service = new Google_Service_Calendar($client);

      // Se for logout
      if (isset($_REQUEST['logout'])) {
        unset($_SESSION['access_token']);
      }

      // Pega o retorno da solicitação pra abrir a seção
      if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token);
        $_SESSION['access_token'] = $token;
        header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
      }

      // Gera o link de login
      if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
        $client->setAccessToken($_SESSION['access_token']);
      } else {
        $authUrl = $client->createAuthUrl();
      }
    ?>

    <div class="box">
    <?php if (isset($authUrl)): ?>
      <div class="request">
        <a class='login' href='<?= $authUrl ?>'>Connect Me!</a>
      </div>
    <?php else: ?>
      <a class='logout' href='?logout'>Logout</a>

      <?php
        // Teste de solicitação
        
        $calendarId = 'primary';
        $optParams = array(
          'maxResults' => 10,
          'orderBy' => 'startTime',
          'singleEvents' => TRUE,
          'timeMin' => date('c'),
        );
        $results = $service->events->listEvents($calendarId, $optParams);

        if (count($results->getItems()) == 0) {
          echo "No upcoming events found.\n";
        } else {
          echo "Upcoming events:\n";
          foreach ($results->getItems() as $event) {
            $start = $event->start->dateTime;
            if (empty($start)) {
              $start = $event->start->date;
            }
            printf("%s (%s)\n", $event->getSummary(), $start);
          }
      }
      ?>
    <?php endif ?>
    </div>

  </body>
</html>
