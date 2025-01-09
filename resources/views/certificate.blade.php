<x-admin.home-layout>
<div class="blog_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="blog_taital">My <span class="blog_taital_1">Certificate</span></h1>
                  <p class="blog_text">upidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
               </div>
            </div>
         </div>
         <div class="blog_section_2">
            <div class="container">
               <div class="row">
               @foreach($certificate as $certificate)
                  <div class="col-md-4">
                     <div class="blog_box">
                        <div class="">
                           <h4 class="date_text">{{$certificate->issued_at}}</h4>
                           <h4 class="prep_text">{{$certificate->name}}</h4>
                        </div>
                        <p class="lorem_text">{{$certificate->description}}</p>
                     </div>
                  </div>
                @endforeach
               </div>
               <div class="readmore_bt_1"><a href="#">Read More</a></div>
            </div>
         </div>
      </div>
</x-admin.home-layout>