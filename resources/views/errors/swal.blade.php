@if (count($errors) > 0)
  <script type="text/javascript">
    swal("Errors have occured!");
  </script>
    <ul>
      @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
      @endforeach
    </ul>
@endif