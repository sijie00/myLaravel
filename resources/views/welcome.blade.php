@extends('layouts.app')
@section('content')

<div id="carousel" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image:url('/img/img1.jpg'); height:500px;background-size:cover;"></div>
      <div class="carousel-item" style="background-image:url('/img/img2.jpg');height:500px;background-size:cover;"></div>
      <div class="carousel-item" style="background-image:url('/img/img3.jpg');height:500px;background-size:cover;"></div>
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
</div>
  
<!-- About Us -->
<div class="container medium-paragraph text-justify my-2" id="about">
    <h3>About Us</h3>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit,ation ullamcorper suscipit lobortis nislsedis nostrud. Exerci tation ullamcorper suscipit ut aliquip ex ea commodo consequat. 
        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl. ad minim veniam, quis 
        nostrud.Exerci tation ullamcorper suscipit ut aliquip ex ea commodo consequat.Ut wisi enim ad minim veniam, quis nostrud
        ci tation ullamcorper suscipit lobortis nisl.Exerci tation ullamcorper suscipit ut ait amet, consectetur adipisicing 
        elit, it amet, consectetur adipisicing elit.lido eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud.pisicing elit,
    </p>
    <p >
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. 
        Ut wisi enim ad minim veniam, quis nostrud. Exerci tation ullamcorper suscipit ut aliquip ex ea commodo consequat. 
        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl. ad minim veniam, quis 
       nostrud.Exerci tation ullamcorper suscipit ut aliquip ex ea commodo consequat.Ut wisi enim ad minim veniam, quis nostrud
       ci tation ullamcorper suscipit lobortis nisl.Exerci tation ullamcorper suscipit ut ait amet, consectetur adipisicing 
       elit, it amet, consectetur adipisicing elit.liquip ex ea commodo consequat.Ut wisi enim ad minim veniam, quis nostrud
       ci tation ullamcorper suscipit lobortis nisl.Exerci ta.
   </p>
   <p>
       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
        Ut wisi enim ad minim veniam, quis nostrud.Exerci tation ullamcorper suscipit ut aliquip ex ea commodo consequat. 
       Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl.
       Exerci tation ullamcorper suscipit ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et. 
       Ut wisi enim ad minim veniam, quis noUt wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl.
    </p>
</div>
        

@endsection
