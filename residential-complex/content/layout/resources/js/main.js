$(()=>{

    // load page
    $(".page_loading").slideUp();
    $("body").removeClass('__lock')

// header
    let url=document.location.href;
    $.each($(".nav-list a"),function(){
        $(this).on("click", ()=>{
            $('.header').removeClass('header_active')
            $('body').removeClass('__closed')
            $('.mobile-back').removeClass('__active')
            $('.logo-link').removeClass('__hidden')

            calculationWidth(allLinks,total,allHeader,dropPoint)
        })
        if(this.href==url){$(this).addClass('nav-list--active');};
    });
    function calculationWidth(allLinks,total,allHeader,dropPoint){
        let check = false
        allLinks.each(function() {
                total =  total + $( this ).outerWidth() + parseInt($(this).css("margin-right"));
                if(total < (allHeader-dropPoint)){
                    $(this).show()
                }
                else{
                   $(this).hide()
                   check = true
                }
                if(check == true){
                    $(".burger-wrapper").show()
                }
                else{
                    $(".burger-wrapper").hide()
                }
            });
            return(total)
    }

    let total = 0
    let logoHeader = $('.logo-header').width();
    let allHeader = $('.header-container').width();
    let allLinks = $('.nav-list').find('a');
    let dropPoint = logoHeader + 100;

    calculationWidth(allLinks,total,allHeader,dropPoint)
    
    $(window).on('resize', function(){
        logoHeader = $('.logo-header').width();
        allHeader = $('.header-container').width();
        allLinks = $('.nav-list').find('a');
        dropPoint = logoHeader + 100;

        calculationWidth(allLinks,total,allHeader,dropPoint)
    
        $('.header').removeClass('header_active')
        $('body').removeClass('__closed')
        $('.mobile-back').removeClass('__active')
        $('.logo-link').removeClass('__hidden')
    });
   
    $('.header').find('.nav').css("right", "-100vw")
    $(".burger").on( "click", ()=>{
        $('.header').toggleClass('header_active')
        $('.header').find('.nav').css("right", "-100vw")
        $('body').toggleClass('__closed')
        $('.mobile-back').toggleClass('__active')
        $('.logo-link').toggleClass('__hidden')
        allLinks.show()
    })
    
    $(".mobile-back").on( "click", ()=>{
        $('.header').toggleClass('header_active')
        $('body').toggleClass('__closed')
        $('.mobile-back').toggleClass('__active')
        $('.logo-link').toggleClass('__hidden')

        logoHeader = $('.logo-header').width();
        allHeader = $('.header-container').width();
        dropPoint = logoHeader + 100;
        calculationWidth(allLinks,total,allHeader,dropPoint)
    })

    $(window).on( "scroll", ()=>{

        let target = $(this).scrollTop();
        let pageHeight = $(this).height();     
        let headerHeight = $('footer').offset();
        if($("footer").length) {
            if((headerHeight.top-pageHeight) < target){
                $('header').slideUp(300)
            }
            else{
                $('header').slideDown(300)
            }
        }
        if(target == 0) {
            $('.line').hide()
        }
        else{
            $('.line').show()
        }
    
    });
// header end

// theme start
let themeSwitch = $('.theme_switch')
if($('.theme_switch').length > 0){

    if(localStorage.getItem('theme') === 'white'){
        $('body').addClass('light_theme')
    }
    else{
        $('body').removeClass('light_theme')
    }
    
    themeSwitch.on('click', ()=>{
        if(localStorage.getItem('theme') === 'white'){
            localStorage.removeItem('theme')
            $('body').removeClass('light_theme')
        }
        else{
            localStorage.setItem('theme', 'white')
            $('body').addClass('light_theme')
        }  
    })
}
// theme end

$('.phone-mask').mask("+7 (999) 999-99-99", {placeholder: " " });

// ajax start

    let sendRequest = $('#reception-add')
    let sendAsk = $('#ask-add')
    let empty
    let ArrayVal

    
    sendRequest.on('click', ()=>{
            empty = false
            ArrayVal = []
            $('input[reception]').each(function(key){
                let temp = []
               
                temp.name = $('input[reception]')[key].name
                temp.value = $('input[reception]')[key].value
               
                if(temp.name != "action"){
                    if(temp.value == ""){
                        empty = true
                    }
                }
    
                ArrayVal[ArrayVal.length] = temp
    
            })
            if(empty == true){
                $(".successfully-err").fadeIn(300)
                setTimeout(function(){
                    $(".successfully-err").slideUp(200)
                }, 1500);
            }else{
            $.ajax({
                method: "POST",
                url: "/content/modules/hend_mail.php",
                data: ArrayVal
            })
            $('input[reception]').each(function(key){
                if($('input[reception]')[key].name != "action"){
                    $('input[reception]')[key].value = ""
                }
            })
            $(".successfully-email").fadeIn(300)
            setTimeout(function(){
                $(".successfully-email").slideUp(200)
            }, 1500);
        }
    })

    sendAsk.on('click', ()=>{
      
        empty = false
        ArrayVal = []

        $('input[ask]').each(function(key){
            let temp = []

            temp.name = $('input[ask]')[key].name
            temp.value = $('input[ask]')[key].value
            
            if(temp.name != "action"){
                if(temp.value == ""){
                    empty = true
                }
            }

            ArrayVal[ArrayVal.length] = temp
    
        })
        if(empty == true){
            $(".successfully-err").fadeIn(300)
            setTimeout(function(){
                $(".successfully-err").slideUp(200)
            }, 1500);
        }else{
        $.ajax({
            method: "POST",
            url: "/content/modules/hend_mail.php",
            data: ArrayVal
        })

        $('input[ask]').each(function(key){
            if($('input[ask]')[key].name != "action"){
                $('input[ask]')[key].value = ""
            }
        })

        $(".successfully-email").fadeIn(300)
        setTimeout(function(){
            $(".successfully-email").slideUp(200)
        }, 1500);
    }
    })
    
    $('.appartments-blocks-grid-blc').toggleClass("appartments-blocks-grid-blc-active")

    $('.show-more').on("click", ()=>{
        $('.appartments-blocks-grid-blc').toggleClass("appartments-blocks-grid-blc-active")
        // $('.appartments-blocks-grid-blc').fadeIn(1000)
        $('.more-data').show()
        $('.show-more').slideUp(200)
    })

    $('.more-data').on("click", ()=>{
        window.location.href = "/list_elements.php?table=apartments";
    })


    $(".edit-photo").on("click", ()=>{
        $(".edit-photo").hide()
        $(".photo_add").fadeIn(800)
    })

// ajax end

})