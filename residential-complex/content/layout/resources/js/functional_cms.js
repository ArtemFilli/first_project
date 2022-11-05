$(()=>{
    let data = $('.changing_table_data')
    let btnAdd = $('[name="btnAdd"]')
    let btnEd = $('[name="btnEd"]')
    let btndel = $('[name="btnDel"]')
    let btnSave = $('[name="save_edit"]')
    let idData = $('.id')
    let AddDatadb =  $('[name="add_data"]')
    let generatorPass = $('[name="generator"]')
    let empty

    const url = new URL(document.location);
    const searchParams = url.searchParams;

    if($('.changing_table_active').length == 0){
        btnEd.slideUp()
        btndel.slideUp()
    }
    setInterval(function() { if($('.changing_table_active').length == 0){
        btnEd.slideUp()
        btndel.slideUp()
    }}, 100)

    let str

    function selectItem(){
        for(let key = 0; key < data.length; key++){
            data[key].onclick = function() {
                for(let i = 0; i < data.length; i++){
                    if(i == key){
                    }
                    else{
                        data[i].classList.remove('changing_table_active')
                    }
                }
                
                str = idData[key].innerHTML.trim();
                data[key].classList.toggle('changing_table_active')
                btnEd.show(100)
                btndel.show(100);
            }
        }
    }

    function $_GET() {
        var p = window.location.search;
        p = p.match(new RegExp('=([^&=]+)'));
        return p ? p[1] : false;
    }
    selectItem()
 
    btndel.on("click", ()=>{
            $.ajax({
                method: "POST",
                url: "/admin/working/handlers/del.php",
                data: { table: $_GET(),
                        id: str
                }
              })
              $(".changing_table_active").remove();
              $(".successfully-del").fadeIn(300)
              setTimeout(function(){
                $(".successfully-del").slideUp(200)
              }, 1500);
    })

    btnEd.on("click", ()=>{    
        window.location.href = "/admin/working/handlers/ed.php?table=" + $_GET() + "&" + "id=" + str;
    })
    btnAdd.on("click", ()=>{    
        window.location.href = "/admin/working/handlers/add.php?table=" + $_GET();
    })

    let SaveDate = []
    let gets = (function() {
        let a = window.location.search;
        let b = new Object();
        a = a.substring(1).split("&");
        for (var i = 0; i < a.length; i++) {
          c = a[i].split("=");
            b[c[0]] = c[1];
        }
        return b;
    })();

    btnSave.on("click", ()=>{
        empty = false
        
        textArea = ""

        if($('#mytextarea').length != 0){
            textArea = tinymce.get('mytextarea').getContent();
        }

        for(let key = 0; key < $('[data="save"]').length; key++){
            if($('[data="save"]')[key].getAttribute("transformations")){
                if(textArea == ""){
                    empty = true
                }
            }else{
                if($('[data="save"]')[key].value == ""){
                    empty = true
                }
            }
        }

        if(empty == true){
            $(".error-type").fadeIn(300)
            setTimeout(function(){
                $(".error-type").slideUp(200)
            }, 1500);
        }else{
            editDate("/admin/working/handlers/ed_hend.php");
            SaveDate = []
            $(".successfully-ed").fadeIn(300)
            setTimeout(function(){
                $(".successfully-ed").slideUp(200)
            }, 1500);
        }
        
    })

    AddDatadb.on("click", ()=>{
        empty = false
        
        textArea = ""

        if($('#mytextarea').length != 0){
            textArea = tinymce.get('mytextarea').getContent();
        }

        for(let key = 0; key < $('[data="save"]').length; key++){
            if($('[data="save"]')[key].getAttribute("transformations")){
                if(textArea == ""){
                    empty = true
                }
            }else{
                if($('[data="save"]')[key].value == ""){
                    empty = true
                }
            }
        }

        if(empty == true){
            $(".error-type").fadeIn(300)
            setTimeout(function(){
                $(".error-type").slideUp(200)
            }, 1500);
        }else{
            editDate("/admin/working/handlers/add_hend.php");

            $('.blc-add-pic').children().remove()
            $('.blc-add-pic').append("<div class='img-data'><img src='/content/layout/resources/img/nophoto.jpg' alt=''></div>")

            searchParams.delete("pic");
            window.history.pushState({}, '', url.toString());
            
            SaveDate = []
            for(let key = 0; key < $('[data="save"]').length; key++){
                if($('[data="save"]')[key].name == "pic"){
                    $('[data="save"]')[key].setAttribute("value", "nophoto.jpg")
                }
                if($('[data="save"]')[key].getAttribute("dont-clear")){
                   
                }else{
                    $('[data="save"]')[key].value = ""
                    if($('#mytextarea').length != 0){
                        tinymce.get('mytextarea').setContent("")
                    }
                }
            }
            watchGenerorPass()
            $(".successfully-add").fadeIn(300)
            setTimeout(function(){
                $(".successfully-add").slideUp(200)
            }, 1500);
        }
    })

    function editDate(path){
        let textArea
        if($('#mytextarea').length != 0){
            textArea = tinymce.get('mytextarea').getContent();
        }
    
        for(let key = 0; key < $('[data="save"]').length; key++){
            strSaveName = $('[data="save"]')[key].getAttribute('name');
        
            if($('[data="save"]')[key].getAttribute("transformations")){
                strSave = textArea;
            }
            else{
                strSave = $('[data="save"]')[key].value;
            }
            SaveDate[SaveDate.length] = strSave
        }
        $.ajax({
            method: "POST",
            url: path,
            data: { table: gets["table"],
                    data: SaveDate
            }
        })
    }

    function watchGenerorPass(){
        generatorPass.on("click", ()=>{
            let randomstring = Math.random().toString(36).slice(-8);
            $('[modif="pass"]').val(randomstring)
        })
    }
    watchGenerorPass()

    // del pic

    let pics = $('button[pic]')

    $.each(pics, function(key){
        pics[key].onclick = function() {
            let strPic = []
            let pic = $(this).attr('pic');

            if(gets.pic){
                a = gets.pic.substring(0).split(",");
            }
            else{
                a = $('[name="pic"]').val().substring(0).split(",")
            }

            $.each(a,function(i, val){
                if(val == pic){
                    
                }else{
                    strPic[strPic.length] = val; 
                }
            })
            if(gets.id){
                window.location.href = window.location.pathname + "?table=" + $_GET() + "&id=" + gets.id + "&pic=" + strPic.toString();
            }else{
                window.location.href = window.location.pathname + "?table=" + $_GET() + "&pic=" + strPic.toString();
            }
        }
    })
    
        let idCheckMarker = ""
    
        $('.check_out_btn').each(function(key){
            $('.check_out_btn')[key].onclick = ()=>{
                $('.check_out_btn')[key].classList.toggle('check_out_btn_active')
                idCheckMarker = $('.check_out_btn')[key].name
                $.ajax({
                    method: "POST",
                    url: "/admin/working/handlers/check_action.php",
                    data:{ id: idCheckMarker}
                })
            }
        })

        $('#search').hideseek({
            highlight: true,
            ignore: '.ignore',
        });


        var options = {
            valueNames: [ 'title', 'id', 'desc', 'date', 'login', 'apatrament', 'fio', 'view', 'active']
          };
          
          var userList = new List('data-table', options);

})
