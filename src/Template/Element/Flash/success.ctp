<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-success" role="alert"  onclick="this.classList.add('hidden');"><?= $message ?></div>
