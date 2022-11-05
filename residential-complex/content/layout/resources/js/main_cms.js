$(()=>{
     // load page
     $(".page_loading").slideUp();
     $("body").removeClass('__lock')
     
    // header start
    
    let heightHeader = $('header').height()
    let heightOther = $('.static-elem')
    let firstStatic = $('.static-elem').first()
    let count = 0 

    function height_calculation(heightHeader,heightOther, firstStatic){
        heightOther.each(function(){
            count = count + $(this).height()
        })
       
        let height = heightHeader - count 
        let heightSearch = firstStatic.height()
        $('.container-for-scroll').height(height) 
        $('.search').height(heightSearch)
    }
    
    height_calculation(heightHeader,heightOther, firstStatic)

    $(window).on('resize', ()=>{
        heightHeader = $('header').height()
        heightOther = $('.static-elem')
        firstStatic = $('.static-elem').first()
        count = 0

        height_calculation(heightHeader,heightOther, firstStatic) 
    })
    // header end

    // calendar start
    let d = new Date();
    function clock() {
        let day = d.getDate();
        let hrs = d.getHours();
        let min = d.getMinutes();
        let sec = d.getSeconds();
       
        let widtInd = $('.line-indicator-blc').width()
        let widthGr = widtInd / 30 * d.getDate()


        $('.line-indicator').width(widthGr)

        $(window).on('resize', ()=>{
            widtInd = $('.line-indicator-blc').width()
            widthGr = widtInd / 30 * d.getDate()
    
            $('.line-indicator').width(widthGr)
        })
        

        var mnt = new Array("января", "февраля", "марта", "апреля", "мая",
        "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря");

        if (day <= 9) day="0" + day;
        if (hrs <= 9) hrs="0" + hrs;
        if (min <= 9) min="0" + min;
        if (sec <= 9) sec="0" + sec;
        
        Date.prototype.addDays = function(days) {
            let date = new Date(this.valueOf());
            date.setDate(date.getDate() + (days));
            return date.getDate();
        }



        for (let i = 1; i <= 7; i++) {
            let getDay
            
            if(d.getDay() == 0){
                getDay =  d.getDay() + 7 
            }
            else{
                getDay =  d.getDay()
            }
            
            if(i == getDay){
                for (let j = (i-1); j >= 1; j--){
                    if(d.addDays(-(j)) == d.getDate()){
                        $('.weekday-day').append("<span class='col weekday-day-active'>" + d.addDays(-(j)) + "</span>")
                    }
                    else{
                        $('.weekday-day').append("<span class='col'>" + d.addDays(-(j)) + "</span>")
                    }
                }
                for (let j = 0; j <= 7-i; j++){
                    if(d.addDays(j) == d.getDate()){
                        $('.weekday-day').append("<span class='col weekday-day-active'>" + d.addDays(j) + "</span>")
                    }
                    else{
                        $('.weekday-day').append("<span class='col'>" + d.addDays(j) + "</span>")
                    }
                }
            }
            
        }
        $("#time").html(day + "-го " + mnt[d.getMonth()] + " " + d.getFullYear() + " г.");
    }
    clock()
    // calendar end

    // to do list start
    

        let ToDoAdd = $('#to-do-add')
        let titleToDo = $('#title-to-do')
        let dscToDo = $('#description-to-do')
        
        let ToDoList = []

        if(localStorage.getItem('todo') != undefined){
            ToDoList = JSON.parse(localStorage.getItem('todo'))
            for (let key in ToDoList){
                if(ToDoList[key].check === true){
                    ToDoList.splice(key, 1);    
                }    
            }
            localStorage.setItem('todo', JSON.stringify(ToDoList))
        }

        addItem()
        searching_elements()
        ToDoAdd.on('click', ()=>{
            if(titleToDo.val() != ""){
                let temp = {}
                let i = ToDoList.length

                temp.todoTitle = titleToDo.val()
                temp.dscToDo =  dscToDo.val()
                temp.check = false
                ToDoList[i] = temp
                localStorage.setItem('todo', JSON.stringify(ToDoList))
                addItem()
                searching_elements()

                titleToDo.val("")
                dscToDo.val("")
            }
        })
        function addItem (){
            $('.d').remove()
            for (let key = (ToDoList.length - 1); key >= 0; key--){
                if(ToDoList[key].check === true){
                    $('.notes').append("<div class='notes-one d'><div class='notes-one-text'><h2 class='title-2 _text-clipping'>" + ToDoList[key].todoTitle + "</h2><p>" + ToDoList[key].dscToDo + "</p></div><div class='notes-one-flag'><div srch='"+ key +"' class='notes-one-flag-img check active'>✓</div></div></div>")
                }
                else{
                    $('.notes').append("<div class='notes-one d'><div class='notes-one-text'><h2 class='title-2 _text-clipping'>" + ToDoList[key].todoTitle + "</h2><p>" + ToDoList[key].dscToDo + "</p></div><div class='notes-one-flag'><div srch='"+ key +"' class='notes-one-flag-img check'>✓</div></div></div>")
                }
            }
            // searching_elements()
        }
        
        function searching_elements(){
            for(let key = ($(".check").length - 1); key >= 0; key--){
                $("[srch='"+ key +"']").on("click",()=>{
                    if(ToDoList[key].check === true){
                        $("[srch='"+ key +"']").removeClass('active')
                        ToDoList[key].check = false 
                        localStorage.setItem('todo', JSON.stringify(ToDoList))
                    }
                    else{
                        $("[srch='"+ key +"']").addClass('active')
                        ToDoList[key].check = true 
                        localStorage.setItem('todo', JSON.stringify(ToDoList))
                    }   
                    })
            }
        }
    // to do end

    // show more task start
        let Show = $(".show-more")
        let notes = $(".notes")

        Show.on("click", ()=>{
            notes.toggleClass("notes-active")
            Show.toggleClass("show-active")
        })
    // show more task end

    let allElem = $('.recent-entries > :not(.notes)')
    let allHeight = $('.recent-entries').height()
    let total = 0

    let allOtherActions = $('.recent-changes-wrapper > :not(.recent-changes)')
    let allH = $('.recent-changes-wrapper').height()
    let recentChanges = $('.recent-changes') 

    function calculationHeight(allElem,total,allHeight,notes){
        allElem.each(function() {   
                total =  total + $( this ).outerHeight() + parseInt($(this).css("margin-bottom"));
        });
        let h = allHeight-total
        notes.height(h)
    }
    calculationHeight(allOtherActions,total,allH, recentChanges)
    calculationHeight(allElem,total,allHeight,notes)

    if($(this).width() < 700){
        $("section").remove();
        $("header").remove();
    }

    $(window).on('resize', ()=>{
        allElem = $('.recent-entries > :not(.notes)')
        allHeight = $('.recent-entries').height()
        allOtherActions = $('.recent-changes-wrapper > :not(.recent-changes)')
        allH = $('.recent-changes-wrapper').height()
        total = 0
        calculationHeight(allElem,total,allHeight, notes)
        calculationHeight(allOtherActions,total,allH, recentChanges)

        if($(this).width() < 700){
            $("section").remove();
            $("header").remove();
        }
        else{
            if($("header").length == 0 && $("section").length == 0){
                location.reload()
            }
        }
    })

    $('.date-mask').mask("9999-99-99", {placeholder: " " });
})