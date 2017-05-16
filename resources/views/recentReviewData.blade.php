 @foreach ($reviews as $key => $rel)  
    <div class="col-md-12">
  <div class="name">  <h3>{{$rel->name}}</h3></div>
<div class="description">
 <p>{{$rel->description}}</p>
</div>
<div class="created_at">
 <p>{{date('d-m-Y H:i:s', strtotime($rel->created_at))}}</p>
</div>
    </div>
  
      @endforeach