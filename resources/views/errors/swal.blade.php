@if (count($errors) > 0)
  <script type="text/javascript">
    swal("Errors have occured!");
  </script>
    <ul>
      @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
      @endforeach
    </ul>
@elseif(isset($error))
  <script type="text/javascript">
    swal({{$error}});
  </script>
@elseif(isset($error_data))
  <script type="text/javascript">
    swal({{$error}});
  </script>
@endif
