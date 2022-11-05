$(() => {
  
  // for delete get
  const url = new URL(document.location);
  const searchParams = url.searchParams;

  let gets = (function () {
    let a = window.location.search;
    let b = new Object();
    a = a.substring(1).split("&");
    for (var i = 0; i < a.length; i++) {
      c = a[i].split("=");
      b[c[0]] = c[1];
    }
    return b;
  })();

  function watchPage(query, val) {
    let pages = $("a[data-page]");
    pages.each(function (key) {
      pages[key].onclick = () => {
        $.ajax({
          method: "POST",
          url: "/content/modules/data_filtering.php",
          data: {
            table: gets.table,
            pagesLoad: pages[key].getAttribute("data-page"),
            query: query,
            val: val,
          },
          cache: false,
        }).done(function (php) {
          $("#results").empty();
          $("#results").append(php);
          watchPage(query, val);
        });
      };
    });
  }

  function creatingRequest(query, val) {
    $.ajax({
      method: "POST",
      url: "/content/modules/data_filtering.php",
      data: { table: gets.table, pagesLoad: 1, query: query, val: val },
      cache: false,
    }).done(function (php) {
      $("#results").empty();
      $("#results").append(php);
      watchPage(query, val);
    });
  }

  creatingRequest("all");

  $("#SORT_DESC").on("click", () => {
    creatingRequest("SORT_DESC", "");
  });

  $("#reset").on("click", () => {
    creatingRequest("all", "");
  });

  $("#SORT_ASC").on("click", () => {
    creatingRequest("SORT_ASC", "");
  });

  $("#val-search").on("input", () => {
    let val = $("#val-search").val();
    creatingRequest("search", val);
  })

  $("#search-rooms").on("click", () => {
    let val = $("#val-search-rooms").val();
    creatingRequest("search-rooms", val);
  });


  let dataNewstenants = $("[save-data]")
  let btnAddUserData = $("#addDataUser")
  let temp
  let arrayDataAdd
  let empt

  btnAddUserData.on("click", ()=>{
    arrayDataAdd = []
    empt = false
    dataNewstenants.each(function(key,val){
      temp = {}
      temp.key = val.name
      if(val.name == "description"){
        if($('#mytextarea').length){
            temp.val = tinymce.get('mytextarea').getContent();
            tinymce.get('mytextarea').setContent("");
        }
        else{
            temp.val = ""
        }
      }else{
        temp.val = val.value
        if(val.getAttribute("dont-clear")){
            if(val.name == "pic"){
                val.setAttribute("value", "nophoto.jpg")
            }
        }else{
          val.value = ""
        }
       
      }
      if(temp.val == ""){
          empt = true
      }

      arrayDataAdd[arrayDataAdd.length] = temp
    })
    if(empt != true){
        $.ajax({
            method: "POST",
            url: "/content/modules/hend-add-news/add-hend.php",
            data: { table: "newstenants",
                    data : arrayDataAdd
            }
        })

        $('.carousel-inner').children().remove()
        $('.carousel-inner').append("<div class='carousel-item active'><img src='/content/layout/resources/img/nophoto.jpg' alt=''></div>")
        
        // delete get
        searchParams.delete("pic");
        window.history.pushState({}, '', url.toString());

        $(".successfully-email").fadeIn(300)
        setTimeout(function(){
            $(".successfully-email").slideUp(200)
        }, 2000);
    }
    else{
        $(".successfully-err").fadeIn(300)
        setTimeout(function(){
            $(".successfully-err").slideUp(200)
        }, 2000);
    }
  })
});
