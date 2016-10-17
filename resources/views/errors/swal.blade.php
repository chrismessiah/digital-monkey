@if (count($errors) > 0)
  <?php
  $array = $errors->all();
  $string = 'The following errors have occured: \n';
  for ($i=0; $i < sizeof($array); $i++) { 
    $string = $string.'\n   '.($i+1).'.  '.$array[$i];
  }
  ?>
    <script type="text/javascript">
      swal({
        title: "Oh no!",
        text: "<?php echo $string ?>",
        type: "warning"
      });
    </script>
@elseif(isset($error))
  <script type="text/javascript">
    swal({{$error}});
  </script>
@elseif(isset($error_data))
  <script type="text/javascript">
    swal({{$error}});
  </script>
@endif
