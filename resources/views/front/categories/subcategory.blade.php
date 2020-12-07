@extends('layouts.front.app')
@section('content')
@section('css')
<style type="text/css">
   .Thumbnail img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;
}
/*.imgclass{
  width: 400px
}*/
.imgclass img{
  width: 100%
}
.Thumbnail img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
.imgclass {
    width: 100%;
    float: left;
}

.imgclass img {
    width: 100%;
    max-width: 500px;
    margin: 50px auto;
    display: block;
}
</style>
@endsection
<!-- ========  Main  ======== -->
   <div class="row  prefference-tabs">
      <div class="col-md-12 prefference-tabs-content">
         <ul class="nav nav-pills mb-3 prefference" id="pills-tab" role="tablist">
            @if(empty($make))
              <li class="nav-item prefference-box no-make" role="presentation">
               <a class="nav-link active" href= "{{ route('front.subcategory.slug') }}">
                  <h2><span>1</span>{{LanguageHelper::getPhrase('cat_make')}}</h2>
                  <section>
                     <span class="car-model">{{LanguageHelper::getPhrase('cat_select_make_below')}}</span>
                  </section>
               </a>
              </li>
              <li class="nav-item prefference-box no-select" role="presentation">
                <h2><span>2</span>{{LanguageHelper::getPhrase('cat_model')}}</h2>
                <section>
                   <span class="car-model"></span>
                </section>
              </li>
              <li class="nav-item prefference-box no-select" role="presentation">
                <h2><span>3</span>{{LanguageHelper::getPhrase('cat_part_group')}}</h2>
                <section>
                   <span class="car-model"></span>
                </section>
              </li>
              <li class="nav-item prefference-box no-select" role="presentation">
                <h2><span>4</span>{{LanguageHelper::getPhrase('cat_part')}}</h2>
                <section>
                   <span class="car-model"></span>
                </section>
              </li>
            @else
              <li class="nav-item prefference-box" role="presentation">
                <?php 
                  $class ='';
                  $class = $cateslug=='' ? 'active' : ''
                ?>
                <a class="nav-link {{$class}}" href= "{{ route('front.subcategory.slug') }}">
                  <h2><span>1</span>{{LanguageHelper::getPhrase('cat_make')}}</h2>
                  <section>
                    <label>{{LanguageHelper::getPhrase('cat_selected_make')}}:</label>
                    <span class="car-model">
                      <img src="{{asset('images/ico_arrow_right.png')}} "> {{ ucwords($make) }}</span>
                    <span>{{LanguageHelper::getPhrase('cat_change_make')}}</span>
                  </section>
                </a>
              </li>
              <li class="nav-item prefference-box no-make" role="presentation">
               <a class="nav-link active" href= "{{ route('front.subcategory.slug') }}">
                  <h2><span>2</span>{{LanguageHelper::getPhrase('cat_model')}}</h2>
                  <section>
                     <span class="car-model">{{LanguageHelper::getPhrase('cat_select_model_below')}}</span>
                  </section>
               </a>
              </li>
              <li class="nav-item prefference-box no-select" role="presentation">
                <h2><span>3</span>{{LanguageHelper::getPhrase('cat_part_group')}}</h2>
                <section>
                   <span class="car-model"></span>
                </section>
              </li>
              <li class="nav-item prefference-box no-select" role="presentation">
                <h2><span>4</span>{{LanguageHelper::getPhrase('cat_part')}}</h2>
                <section>
                   <span class="car-model"></span>
                </section>
              </li>
            @endif
         </ul>
         <div class="tab-content" id="pills-tabContent">
            <!-- =================  Tab 1 ================= -->
            @if($cateslug =='')
            <div class="tab-pane active">
               <div class="row make-model">
                  <div class="col-md-12 make-model-list" >
                    <ul>
                      <?php
                      $previous = null;
                      $isComma = 0;
                      foreach($subcategory as $key => $value) {
                        $firstLetter = substr($value->name, 0, 1);
                        if($previous !== $firstLetter){
                          if(!is_null($previous)){
                            echo '</li>';
                          }
                          echo "<li>";
                          echo "<span>".$firstLetter."</span>";
                          $isComma++;
                        }
                        else echo ',&nbsp';
                        $previous = $firstLetter;
                        $url =route('front.subcategory.slug',[$value->slug]);
                        echo "<a href=$url>".ucwords(strtolower($value->name))."</a>";
                      }
                      ?>
                    </ul>
                  </div>
               </div>
            </div>
            @endif
            <!-- =================  Tab 1 ================= -->
            @if($cateslug)
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
               <div class="row car-model">
                  <div class="col-md-12 car-model-list" >
                     <ul>
                        @if(!empty($subcategory))
                          @foreach($subcategory as $key=>$value)
                            <li>
                              <section><b>{{$value->name}}</b></section>
                              <div>
                              @if(!empty($models))
                                @foreach($models[$value->id] as $key1=>$value1)
                                  @if($bid)
                                    <span><a href="{{ route('front.getpartgroups.slug',[$value1->slug]) }}?b={{$bid}}&m={{$value->id}}&s={{$value1->id}}" class="invert">{{$value1->name}}<b></b></a></span>
                                  @else
                                    <span><a href="{{ route('front.getpartgroups.slug',[$value1->slug]) }}" class="invert">{{$value1->name}}<b></b></a></span>
                                  @endif
                                @endforeach
                              @endif
                            </div>
                            </li>
                          @endforeach
                        @endif
                     </ul>
                  </div>
               </div>
            </div>
            @endif
         </div>
      </div>
   </div>
@endsection
@section('js')
  <script type="text/javascript">
    $( ".Thumbnail img" ).mouseover(function() {
      $('.imgclass img').attr('src',$(this).attr('src'));
    });
</script>
@endsection