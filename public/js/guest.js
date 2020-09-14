 //handle Navbar switches
 $('nav a, nav p').css('color','rgb(245, 245, 245)');
 var mq = window.matchMedia( "(min-width: 992px)" );
                    if (mq.matches) {
 $('#home-link').addClass("a-before-home");
                    }
 $(window).scroll(function () { //on scroll event on window
     let position = $(this).scrollTop(); //position scrolled sofar
 
     $('section').each(function() { //for each loop(chcecks for every element with that class)
     //for your every section on site or your class of main sections you are targetting
         let target = $(this).offset().top;
        //  console.log(position);//each element position from top
         let targetBot = target + $(this).height();
 
         let id = $(this).attr('id'); //this element ID - should be same as data-id on your nav link
         //$('nav a[data-id=' + id + ']').removeClass('hovered'); //clearing
        
         if (position > target && targetBot > position) { 
             //if you are scrolled over element with some id  change nav options
             if(id == 'home'){
                    $('nav a, nav p').css('color','rgb(245, 245, 245)');
                    $('nav ').get(0).style.borderBottom = "1px solid rgb(245, 245, 245)";
                    var mq = window.matchMedia( "(min-width: 992px)" );
                    if (mq.matches) {
                     $('nav a[href =' + '"#'+id + '"]').get(0).classList.add("a-before-home");
                     $('#about-link').removeClass("a-before-about");
                     $('#services-link').removeClass("a-before-services");
                     $('#skills-link').removeClass("a-before-skills");
                     $('#works-link').removeClass("a-before-works");
                     $('#contact-link').removeClass("a-before-contact");
                    
                    }
                    else{
                     $(".navbar").addClass("navbar-dark");
                     $('.navbar').removeClass('navbar-light')
                    }
                    
             }
             else if(id == 'about'){
                 $('nav a , nav p').css('color','rgb(245, 245, 245)');
                 $('nav ').get(0).style.borderBottom = "1px solid rgb(245, 245, 245)";
                 var mq = window.matchMedia( "(min-width: 992px)" );
                 if (mq.matches) {
                 $('nav a[href =' + '"#'+id + '"]').get(0).classList.add("a-before-about");
                 $('#home-link').removeClass("a-before-home");
                 $('#services-link').removeClass("a-before-services");
                 $('#skills-link').removeClass("a-before-skills");
                 $('#works-link').removeClass("a-before-works");
                 $('#contact-link').removeClass("a-before-contact");
                
                 }
                 else{ $(".navbar").addClass("navbar-light");
                 $('.navbar').removeClass('navbar-dark');
             }
                 
             
             }
             else if(id == 'services'){
                 $('nav a , nav p').css('color','rgb(245, 245, 245)');
                 $('nav ').get(0).style.borderBottom = "1px solid rgb(245, 245, 245)";
                 var mq = window.matchMedia( "(min-width: 992px)" );
                 if (mq.matches) {
                 $('nav a[href =' + '"#'+id + '"]').get(0).classList.add("a-before-services");
                 $('#home-link').removeClass("a-before-home");
                 $('#about-link').removeClass("a-before-about");
                 $('#skills-link').removeClass("a-before-skills");
                 $('#works-link').removeClass("a-before-works");
                 $('#contact-link').removeClass("a-before-contact");
       
                 }
                 else{ $(".navbar").addClass("navbar-light");
                 $('.navbar').removeClass('navbar-dark');
             }
              
             }
             else if(id == 'skills'){
                 $('nav a , nav p').css('color','rgb(245, 245, 245)');
                 $('nav ').get(0).style.borderBottom = "1px solid rgb(245, 245, 245)";
                 var mq = window.matchMedia( "(min-width: 992px)" );
                 if (mq.matches) {
                 $('nav a[href =' + '"#'+id + '"]').get(0).classList.add("a-before-skills");
                 $('#home-link').removeClass("a-before-home");
                 $('#about-link').removeClass("a-before-about");
                 $('#services-link').removeClass("a-before-services");
                 $('#works-link').removeClass("a-before-works");
                 $('#contact-link').removeClass("a-before-contact");
          
                 }
                 else{ $(".navbar").addClass("navbar-light");
                 $('.navbar').removeClass('navbar-dark');
                 }
             
 
             }
             else if(id == 'works'){
                 $('nav a , nav p').css('color','rgb(245, 245, 245)');
                 $('nav ').get(0).style.borderBottom = "1px solid rgb(245, 245, 245)";
                 var mq = window.matchMedia( "(min-width: 992px)" );
                 if (mq.matches) {
                 $('nav a[href =' + '"#'+id + '"]').get(0).classList.add("a-before-works");
                 $('#home-link').removeClass("a-before-home");
                 $('#about-link').removeClass("a-before-about");
                 $('#services-link').removeClass("a-before-services");
                 $('#skills-link').removeClass("a-before-skills");
                 $('#contact-link').removeClass("a-before-contact");
                
                 }
                 else{ $(".navbar").addClass("navbar-light");
                 $('.navbar').removeClass('navbar-dark');
                 
             }
            
 
             }
             else{
                 $('nav a , nav p').css('color','rgb(245, 245, 245)');
                 $('nav ').get(0).style.borderBottom = "1px rgb(245, 245, 245) ";
                 var mq = window.matchMedia( "(min-width: 992px)" );
                 if (mq.matches) {
                 $('nav a[href =' + '"#'+id + '"]').get(0).classList.add("a-before-contact");
                 $('#home-link').removeClass("a-before-home");
                 $('#about-link').removeClass("a-before-about");
                 $('#services-link').removeClass("a-before-services");
                 $('#skills-link').removeClass("a-before-skills");
                 $('#works-link').removeClass("a-before-works");
                
                 }
                 else{ $(".navbar").addClass("navbar-light");
                 $('.navbar').removeClass('navbar-dark');
                 
             
 
             }
              
              
             
         }
     }
     });
 
 });
 
 //fns to scroll slwoly
 $(document).ready(function(){

  var locale = location.href;
  //  var domain = document.location.hostname;
  // $("#home-link ,#contact-link,#works-link,#about-link,#skills-link , #services-link ").click(function(e) {
  //     e.preventDefault();
  //     var locale = location.href;
  //     if(locale != ''){
  //       window.location.href = "/";
  //       }
  // });

     $("#home-link").click(function(e) {
       e.preventDefault();
      
           $('html, body').animate({
             scrollTop: $($.attr(this, 'href')).offset().top 
           }, 1000);
     });
   });
   $(document).ready(function(){  
     $("#about-link").click(function(e) {
       e.preventDefault();
       $('html, body').animate({
         scrollTop: $($.attr(this, 'href')).offset().top+(20)
       }, 1000);
     });
   });
   $(document).ready(function(){  
     $("#skills-link").click(function(e) {
       e.preventDefault();
       $('html, body').animate({
         scrollTop: $($.attr(this, 'href')).offset().top+(20)
       }, 1000);
     });
   });
   $(document).ready(function(){  
     $("#works-link").click(function(e) {
       e.preventDefault();
       $('html, body').animate({
         scrollTop: $($.attr(this, 'href')).offset().top+(20)
       }, 1000);
     });
   });
   $(document).ready(function(){  
     $("#services-link").click(function(e) {
       e.preventDefault();
       $('html, body').animate({
         scrollTop: $($.attr(this, 'href')).offset().top+(20)
       }, 1000);
     });
   });
   $(document).ready(function(){  
     $("#contact-link").click(function(e) {
       e.preventDefault();
       $('html, body').animate({
         scrollTop: $($.attr(this, 'href')).offset().top+(20)
       }, 1000);
     });
   });
   function redirecttoservices(){
     window.location.assign("services.html");
   }
 

   function redirectoprevwork(){
    window.location.assign("prevwork.html");
}
function gotowork(){
    window.location.assign("work.html");
}