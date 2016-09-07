@extends('master')

@section('content')
  <div class="write-blogpost-page-container">
    <p class="editable-intro">I'm the intro</p>
    <p class="editable-body">I'm the body!</p>
      {{-- Button behavior can be modified by passing an object into the buttons array instead of a string. --}}
      <script>
      var editorIntro = new MediumEditor('.editable-intro',{
        toolbar: false
      });
      var editorBody = new MediumEditor('.editable-body',{
        toolbar: {
          buttons: [
            'bold',
            'italic',
            'h1',
            'h2',
            'h3', 
            {
                name: 'quote',
                action: 'append-h6',
                aria: 'Quote',
                tagNames: ['h6'],
                contentDefault: '<b>Quote</b>',
            },
            {
                name: 'pre',
                aria: 'Code',
            },
            'anchor'
        ]
    }
      });</script>
      
      
      <form role="form" method="POST" action="{{ Helper::env_url($route) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}
          {{-- <input id="title" placeholder="title" type="text" name="title" value="{{ (old('title') != '') ? old('title') : $blogpost->title }}">
          <input id="intro" placeholder="intro" type="text" name="intro" value="{{ (old('intro') != '') ? old('intro') : $blogpost->intro }}">
          <textarea id="body" placeholder="body" name="body" rows="8" cols="40">{{ (old('body') != '') ? old('body') : $blogpost->body }}</textarea>
          <input id="file" type="file" name="file"> --}}
          <button type="submit" class="btn">Update</button>                
      </form>
  </div> 
@endsection
