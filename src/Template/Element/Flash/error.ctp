<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-dismissible alert-error" onclick="this.classList.add('hidden');" role="alert"><?= $message ?></div>
