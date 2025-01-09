<x-admin.home-layout>
<div class="services_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="services_taital">My <span class="portfolio_taital_1">Skill</span></h1>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="services_section_2">
               <div class="row justify-center align-item-center">
                @foreach($skills as $skill)
                  <div class="col-lg-3 col-sm-6">
                     <div class="box_main ">
                        <div class="app_icon"><img src="images/icon-3.png"></div>
                        <div class="app_icon_1"><img src="images/icon-7.png"></div>
                        <h4 class="services_text">{{ $skill->title}}</h4>
                     </div>
                  </div>
                  <div class="container text-white">
                        <p>{{$skill->description}}</p>
                    </div>
                @endforeach
               </div>
               <div class="readmore_bt"><a href="#">Read More</a></div>
            </div>
         </div>
      </div>
</x-admin.home-layout>
