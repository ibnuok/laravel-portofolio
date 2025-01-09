<x-admin.home-layout>
<div class="portfolio_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="portfolio_taital">My <span class="portfolio_taital_1">Project</span></h1>
               </div>
            </div>
            <div class="portfolio_section">
               <div class="portfolio_section_2">
                  <div class="row">
                    @foreach($projects as $project)
                     <div class="col-md-8">
                        <div class="container_main">
                           <img src="images/img-1.png" alt="" class="image">
                           <div class="overlay">
                              <div class="text">
                                <div class="btn_main">
                                    <div class="buy_bt"><a href="#">{{$project->name}}</a></div>
                                    <div class="buy_bt"><a href="{{$project->link}}">View Project</a></div>
                                    <div class="buy_bt"><a href="#">{{$project->description}}</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
            </div>
            <div class="seemore_bt"><a href="#">See More</a></div>
         </div>
      </div>
</x-admin.home-layout>
