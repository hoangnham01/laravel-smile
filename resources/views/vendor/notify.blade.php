<script type="text/javascript">
  <?php
  if (!empty($notify = Session::get('success'))) {
    echo 'smileNotify("success", ' . (is_array($notify) ? json_encode($notify) : '"' . $notify . '"') . ');';
  }
  if (!empty($notify = Session::get('warning'))) {
    echo 'smileNotify("warning", ' . (is_array($notify) ? json_encode($notify) : '"' . $notify . '"') . ');';
  }
  if (!empty($notify = Session::get('error'))) {
    echo 'smileNotify("error", ' . (is_array($notify) ? json_encode($notify) : '"' . $notify . '"') . ');';
  }
  if (!empty($notify = Session::get('info'))) {
    echo 'smileNotify("info", ' . (is_array($notify) ? json_encode($notify) : '"' . $notify . '"') . ');';
  }
  ?>
</script>