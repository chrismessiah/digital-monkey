<div id="category-popup">
  <div class="triangle"></div>
  <div class="content">
    @foreach ($categories as $category)
      <div>{{$category->name}}</div>
    @endforeach
  </div>
</div>
