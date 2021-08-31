




$("#c_city").on('keyup', function () {

  if ($(".c_loc").val() == "")
    getIp();
});






function getIp() {
  if (navigator.geolocation) {

    navigator.geolocation.getCurrentPosition(showPos);
  }
  else {
    $(".c_loc").val('NotSuport');
  }
}

function showPos(pos) {
  $(".c_loc").val(pos.coords.latitude + "," + pos.coords.longitude);
}




$(document).ready(function () {

  function showimgModel(img) {
    $("#myModal .modal-body").html("<img src='" + img + "' class='img-thumbnail' />");
    $("#myModal").addClass('show');

  }

});




function backToPro() {

  $("#listProdect").animate({ opacity: '0.2' }, 'slow');
  // div.animate({width: '+200px', opacity: '1'}, "slow");
  //div.animate({height:'-100px',opacity:'1'},'slow');
  //div.animate({width: '-100px', opacity: '1'}, "slow");
  // $("#listProdect").fadeOut(1000);
  $("#listProdect").parent().append('<div class"col-12 " id="loadpro" align="center"><h1 align="center" style="font-size: xx-large !important; z-index:1; position: fixed; top:50%; right:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;margin-left: 501px !important;"' + '+><span class="fa fa-spinner fa-spin"></span></h1></div>');
  lisPro.pop();
  lisurl.pop();
  //alert(lisPro.length);
  //alert(lisPro[0]);

  window.history.pushState('', 'New Page Title', lisurl[lisurl.length-1]);

  $("#listProdect").html(lisPro[lisPro.length - 1]);
  $("#loadpro").fadeOut(1000);
  $("#loadpro").remove();
  $("#listProdect").animate({ opacity: '1' }, 'fast');

}


function showDept(info, divp, id) {


  $("#listProdect").animate({ opacity: '0.2' }, 'slow');
  $("#listProdect").parent().append('<div class"col-12 " id="loadpro" align="center"><h1 align="center" style="font-size: xx-large !important; z-index:1; position: fixed; top:50%; right:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;margin-left: 501px !important;"' + '+><span class="fa fa-spinner fa-spin"></span></h1></div>');

  $("#did").val(id);

  $("#txt").remove();

  window.history.pushState('', 'New Page Title', '/ShowItems?id=' + id + '&count=8');

  lisurl[lisurl.length]='/ShowItems?id=' + id + '&count=8';
  $("#depts a").removeClass("active");
  $("#demo a").removeClass("active");
  $("#deptlist a").removeClass("active");
  $(".d" + id).addClass("active");
  //divp.addClass("active");

  if (info != '') {


    $.ajax({

      url: info,
      method: 'GET',
      data: {},
      dataType: 'JSON',
      success: function (data) {

        //console.log(data);

        $("#listProdect").html(data.rows);
        $("#count").val(data.count);
        $("#size").val(data.size);
        $("#loadpro").fadeOut(800);
        $("#loadpro").remove();
        $("#listProdect").animate({ opacity: '1' }, 'fast');
        //alert(data.podecut+"");
        if (data.stat == "ok")
          $("#showmorebtn").show();
        else
          $("#showmorebtn").hide();

        lisPro[lisPro.length] = $("#listProdect").html();

      }
      ,
      error: function (error) {
        alert(error);
      }
    });

  }



}
let lisPro = [];
let lisurl=[];
lisurl[0]=window.location.href;
lisPro[0] = $("#listProdect").html();


function showProduct(info, divp, id) {

  //e.preventDefault();
  window.history.pushState('', 'New Page Title', '/deatils?id=' + id);


  lisurl[lisurl.length]='/deatils?id=' + id;
  //window.history.replaceState({}, '','/deatils?id='+id);

  $("#listProdect").animate({ opacity: '0.2' }, 'slow');
  $("#listProdect").parent().append('<div class"col-12 " id="loadpro" align="center"><h1 align="center" style="font-size: xx-large !important; z-index:1; position: fixed; top:50%; right:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;margin-left: 501px !important;"' + '+><span class="fa fa-spinner fa-spin"></span></h1></div>');

  //var e=divp.event;


  $("#count").val(0);

  if (info != '') {


    $.ajax({

      url: info,
      method: 'GET',
      data: {},
      dataType: 'JSON',
      success: function (data) {

        //console.log(data);

        // document.URL.;
        // alert(document.domain);
        //window.location.search;
        //window.
        $("#listProdect").html(data.podecut);
        $("#loadpro").fadeOut(1000);
        $("#loadpro").remove();
        $("#listProdect").animate({ opacity: '1' }, 'fast');
        
        lisPro[lisPro.length] = $("#listProdect").html();


      }
      ,
      error: function (error) {
        alert(error);
      }
    });

  }

}

function openNav() {
  var wid=screen.width;
  if(wid<768)
  document.getElementById("mySidenav").style.width = "85%";

  else
  document.getElementById("mySidenav").style.width = "65%";
  //  document.getElementById("app").style.marginRight = "250px";
  // document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
  //$("#main").fadeOut({opacity: '0.4'},1000);
  $("#app").animate({ opacity: '0.4' }, 'fast');
  //$("body").css("backgroundColor","rgba(0,0,0,0.4) !important");
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  //document.getElementById("app").style.marginRight = "0";
  $("#app").fadeIn(500);
  $("#app").animate({ opacity: '1' }, 'fast');

}


function showimg(img) {

  $("#mainimg").attr('src',  img );

}


let moreitems = $(".rowitems").html();
$(document).on('keyup', '#searchitems', function () {


  var searchitems = $(this).val();

  var itemid = $("#itemid").val();
  if (searchitems != '') {

    $.ajax({

      url: '/searchitems?searchitems=' + searchitems + '&itemid=' + itemid,
      method: 'GET',
      data: {},
      dataType: 'json',
      success: function (data) {
        console.log(data.row_result);

        $('.rowitems').html(data.row_result);





      }
    });
  }
  else
    $('.rowitems').html(moreitems);
});




$(document).ready(function () {
  $("#searchitemsf").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#itemsrow .card ").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function () {
  $("#searchProdects").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#listProdect .product-grid").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
$(document).ready(function () {
  $("#ebutton").click(function () {
    var div = $("#listProdect .product-grid").on('load', function () {
      var div = $(this);
    });

    div.fadeOut(1000);
    div.fadeIn(1000);
    //div.animate({height: '120%', opacity: '0.4'}, "slow");
    // div.animate({width: '120%', opacity: '0.8'}, "slow");
    div.animate({ height: '90%', opacity: '0.4' }, "slow");
    div.animate({ height: '100%', opacity: '0.7' }, 'slow');
    div.animate({ width: '100%', opacity: '1' }, "slow");

    // div.slideDown();
    // div.finish();
  });
});


$("#showmorebtn").on('click', function () {



  var morebtn = $("#showmorebtn h2").html();
  $("#showmorebtn h2").html('<span class="fa fa-spinner fa-spin"></span>');
  $(this).attr('disabled', 'disabled');
  $("#listProdect").append('<div class="col-md-3 col-sm-6 mt-2 mb-2 loading" align="center"><h1 class="mt-4"> <span class="fa fa-spinner fa-spin"></span></h1></div>');
  $("#listProdect").append('<div class="col-md-3 col-sm-6 mt-2 mb-2 loading" align="center"><h1 class="mt-4"> <span class="fa fa-spinner fa-spin"></span></h1></div>');
  $("#listProdect").append('<div class="col-md-3 col-sm-6 mt-2 mb-2 loading" align="center"><h1 class="mt-4"> <span class="fa fa-spinner fa-spin"></span></h1></div>');
  $("#listProdect").append('<div class="col-md-3 col-sm-6 mt-2 mb-2 loading" align="center"><h1 class="mt-4"> <span class="fa fa-spinner fa-spin"></span></h1></div>');
  $("#listProdect").append('<div class="col-md-3 col-sm-6 mt-2 mb-2 loading" align="center"><h1 class="mt-4"> <span class="fa fa-spinner fa-spin"></span></h1></div>');
  $("#listProdect hr").css("color", "red")
    .slideUp(2000);





  var did = $("#did").val();
  var count = $("#count").val();
  var titel = $("#titel").val();
  var size = $("#size").val();
  var txt = $("#txt").val();
  var turl = '';
  if (txt != null || txt !=undefined)
{    turl = '/showmore?id=' + did + '&titel=' + titel + '&count=' + count + '&txt=' + txt + '&size=' + size;
}
  else
 {   turl = '/showmore?id=' + did + '&titel=' + titel + '&count=' + count + '&size=' + size+"&Ajax=Ajax";
 
}

  $.ajax({

    url: turl,
    method: 'get',
    data: {},
    dataType: 'JSON',
    success: function (data) {

      $(".loading").remove();
      $("#listProdect").append(data.rows);
      $("#count").val(data.count);

      if(txt==undefined){
      window.history.pushState('', 'New Page Title', '/ShowItems?id=' + did + '&count=' + data.count);
    lisPro[lisPro.length]='/ShowItems?id=' + did + '&count=' + data.count;
    }
      else{
   window.history.pushState('', 'New Page Title', '/MainSearch?bydept=' + did + '&titel=' + titel + '&count=' + data.count + '&searchtxt=' + txt + '&size=' + size+'&FromMain=yes');
     
   lisPro[lisPro.length]='/MainSearch?bydept=' + did + '&titel=' + titel + '&count=' + data.count + '&searchtxt=' + txt + '&size=' + size+'&FromMain=yes';
    }
      //else
      //window.history.pushState('', 'New Page Title', '/MainSearch?id=' + did + '&count=' + data.count);

      lisPro[lisPro.length] = $("#listProdect").html();
      if (data.stat == 'ok') {
        $("#showmorebtn h2").html(morebtn);
        $('#showmorebtn').removeAttr('disabled');

      }
      else {
        $("#showmorebtn").hide();
        $("#showmorebtn h2").html(morebtn);
        $('#showmorebtn').removeAttr('disabled');

      }



    },
    complete: function () {

    },
    error:function(data)
    {
      console.log(data);
    }




  });






});
$("#listProdect .product-grid").on('loadedmetadata', function () {
  var div = $(this);

  div.fadeOut(1000);
  div.fadeIn(1000);
  div.animate({ height: '120%', opacity: '0.4' }, "slow");
  div.animate({ width: '120%', opacity: '0.8' }, "slow");
  div.animate({ height: '100%', opacity: '0.4' }, "slow");
  div.animate({ width: '100%', opacity: '1' }, "slow");
});
//Active menu11 load
$(document).ready(function () {
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a,#backtop,a[href^='#footer']").on('click', function (event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function () {

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
      //$(this).hide();
    } // End if
  });
});



function sub(event) {

  event.preventDefault();
  alert('Okk');

}


$(".custom-file-input").on("change", function () {

  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$('.SearchingForm').on('submit', function (e) {
  e.preventDefault();
  // this.





  var txt = $(this).children('input:text').val();
  txt = $(this).find('input:text').val();
  // closest(":text").val();
  //$("#searchProdects2").val();
  //$($(this)+" 

  $(this).parent().append('<input type="hidden" name="txt" id="txt" value="'+txt+'"/>');

  if (txt.length > 0) {

    $("#listProdect").animate({ opacity: '0.2' }, 'slow');
    $("#listProdect").parent().append('<div class"col-12 " id="loadpro" align="center"><h1 align="center" style="font-size: xx-large !important; z-index:1; position: fixed; top:50%; right:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;margin-left: 501px !important;"' + '+><span class="fa fa-spinner fa-spin"></span></h1></div>');

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var formData = new FormData(this);

    $.ajax({

      method: 'post',
      url: 'MainSearch',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {

        console.log(data);
        $("#did").val(data.id);
        $("#count").val(data.count);
        $("#size").val(data.size);
        $("#loadpro").hide(500);
        $("#loadpro").remove();
        $("#listProdect").html(data.rows);

        lisPro[lisPro.length] = $("#listProdect").html();

       // MainSearch?bydept=all&titel=Search
        window.history.pushState('', 'New Page Title', '/MainSearch?bydept=' + data.id + '&count=' + data.count+'&searchtxt='+txt+'&FromMain=yes');

        lisurl[lisurl.length]='/MainSearch?bydept=' + data.id + '&count=' + data.count+'&searchtxt='+txt+'&FromMain=yes';
        $("#txt").val(txt);
        $("#listProdect").animate({ opacity: '1' }, 'fast');

        if (data.stat == "no")
          $("#showmorebtn").hide();
        else
          $("#showmorebtn").show();

        if (data.count == 0) {

          $("#listProdect").html('<div class="alert alert-danger col-12 mt-4  alert-dismissible"><button type="button" class="close" onclick="backToPro()" data-dismiss="alert">&times;</button> <strong>Sorry!</strong>No Data  </div>');
        }


        console.log(data.rows);

      },
      error: function (data) {
        console.log(data);
      }



    });






  }



});




function sendorder(thi, e) {
  e.preventDefault();



  if (navigator.onLine == true) {




    $("#errormess").hide(200);
    $("#errormess").remove();
    $(".sendorder").attr('disabled', 'disabled');
    $('.orderForm').parent().append('<div class"col-12 " id="loadpro" align="center"><h1 align="center" style="font-size: xx-large !important; z-index:1; position: fixed; top:50%; right:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;margin-left: 501px !important;"' + '+><span class="fa fa-spinner fa-spin"></span></h1></div>');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var formData = new FormData(thi);



    $.ajax({

      method: 'post',
      url: 'order',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {


        console.log(data);
        $(".orderNow").slideUp(100);
        $('.orderForm').slideUp(500);
        $('.orderForm').parent().html('<div class="alert alert-success col-12 mt-4  alert-dismissible"><button type="button" class="close"  data-dismiss="alert">&times;</button> <strong>Done!</strong>تم ارسال طلبك  </div>');

        window.location.assign('myorders?noAjax=noAjax&count=0');
   
   
      },
      error: function (data) {
        console.log(data);
        $("#loadpro").remove();
        $(".sendorder").removeAttr('disabled');
        $('.orderForm').append('<div id="errormess" class="alert alert-danger col-12 mt-4  alert-dismissible"><button type="button" class="close"  data-dismiss="alert">&times;</button> <strong>Opps!</strong>حدث خطاء ما في الشبكة حاول مرة اخرى</div>');

      }



    });









  }
  else {
    $('.orderForm').append('<div class="alert alert-danger col-12 mt-4  alert-dismissible"><button type="button" class="close"  data-dismiss="alert">&times;</button> <strong>Opps!</strong>انت غير متصل بالانترنت</div>');
  }
}









function registerForm(thi, e, formm, proid) {
  e.preventDefault();


  formm.append('<div class"col-12 " id="loadpro" align="center"><h1 align="center" style="font-size: xx-large !important; z-index:1; position: fixed; top:50%; right:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;margin-left: 501px !important;"' + '+><span class="fa fa-spinner fa-spin"></span></h1></div>');

  $("#errormess").hide(200);
  $("#errormess").remove();



  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var formData = new FormData(thi);



  $.ajax({

    method: 'post',
    url: 'register',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {


      //alert('Sessuce');
      formm.slideUp(600);
      $("#loadpro").hide(1000);
      $("#loadpro").remove();

      if (proid != "")
        window.location.assign('order?proid=' + proid);

      $("#loginModel").modal("hide");
      // $(".orderNow").
      //$('.orderForm').slideUp(500);
      //  $('.orderForm').parent().html('<div class="alert alert-success col-12 mt-4  alert-dismissible"><button type="button" class="close"  data-dismiss="alert">&times;</button> <strong>Done!</strong>تم ارسال طلبك  </div>');
    },
    error: function (data) {
      
      
      formm.append('<p id="errormess" class="alert alert-danger"> Error</p>');
      
      $("#loadpro").hide(200);
      $("#loadpro").remove();

      console.log(data.responseJSON.message);
      formm.append('<p id="errormess" class="alert alert-danger">' + data.responseJSON.message + '</p>');
      

    }



  });

}


function loginForm(thi, e, formm, proid) {

  e.preventDefault();


  formm.append('<div class"col-12 " id="loadpro" align="center"><h1 align="center" style="font-size: xx-large !important; z-index:1; position: fixed; top:50%; right:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;margin-left: 501px !important;"' + '+><span class="fa fa-spinner fa-spin"></span></h1></div>');


  $("#errormess").hide(200);
  $("#errormess").remove();


  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var formData = new FormData(thi);



  $.ajax({

    method: 'post',
    url: 'login',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {


      //alert('Sessuce');
      formm.slideUp(600);
      $("#loadpro").hide(1000);
      $("#loadpro").remove();
      if (proid != "")
        window.location.assign('order?proid=' + proid);

      $("#loginModel").modal("hide");
      // $(".orderNow").
      //$('.orderForm').slideUp(500);
      //  $('.orderForm').parent().html('<div class="alert alert-success col-12 mt-4  alert-dismissible"><button type="button" class="close"  data-dismiss="alert">&times;</button> <strong>Done!</strong>تم ارسال طلبك  </div>');
    },
    error: function (data) {

      $("#loadpro").hide(200);
      $("#loadpro").remove();
      formm.append('<p id="errormess" class="alert alert-danger">Erorr !</p>');

      console.log(data.responseJSON.message);
      formm.append('<p id="errormess" class="alert alert-danger">' + data.responseJSON.message + '</p>');
    


    }



  });


}




$(document).ready(function(){
  $("#searchProdectsOrder ").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("table tbody  .showData").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


function deleteOrder(ob,id){

  var btn=ob.html();
  ob.html('<b class="text-danger fa fa-spinner fa-spin fa-2x"></b>');
  ob.attr('disabled','disabled');


  $.ajax({
    url:'deleteOrder?id='+id,
    method:'get',
    data:{},
    dataType:'JSON',
    success:function(data){


      $('.tr'+id).slideUp(1000);


    },
    error:function(data){

      ob.html(btn);
      ob.parent().prepend('<p id="errormess" class="alert alert-danger">' + data.responseJSON.message + '</p>');

    }



  })




}


$('#moreOrder').click(function(){


  var count=$('#count').val();
  $(this).attr('disabled','disabled');
  $('table *').animate({opacity:'.6'},'fast');
  $(this).parent().append('<div class"col-12 " id="loadpro" align="center"><h1 align="center" style="font-size: xx-large !important; z-index:1; position: fixed; top:50%; right:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;margin-left: 501px !important;"'+'+><span class="fa fa-spinner fa-spin"></span></h1></div>')
  var size=$("#size").val();
  $.ajax({
    url:'myorders?count='+count+'&size='+size+'&Ajax=Ajax',
    method:'GET',
    data:{},
    dataType:'JSON',
    success:function(data){

      $("#tbody").append(data.rows);
      $("#count").val(data.count);
      $("#sizelable").text(data.count+"من :"+data.size);
      if(data.stat=='No'){
        $("#moreOrder").hide();

      }
      $("#loadpro").hide(500);
      
      $('table *').animate({opacity:'1'},'fast');
  
      $("#loadpro").remove();

    },
    error:function(data){

    },
  });


});






/*
$(document).ready(function(){
  $(".btn-primary").click(function(){
    $(".collapse").collapse('toggle');
  });
  $(".btn-success").click(function(){
    $(".collapse").collapse('show');
  });
  $(".btn-warning").click(function(){
    $(".collapse").collapse('hide');
  });
  $(".collapse").on('show.bs.collapse', function(){
    alert('The collapsible content is about to be shown.');
  });
  $(".collapse").on('shown.bs.collapse', function(){
    alert('The collapsible content is now fully shown.');
  });
  $(".collapse").on('hide.bs.collapse', function(){
    alert('The collapsible content is about to be hidden.');
  });
  $(".collapse").on('hidden.bs.collapse', function(){
    alert('The collapsible content is now hidden.');
  });
});



/*
$(document).ready(function(){
    $("#searchitems").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $(".rowitems *").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });

 /*

 var myApp=angular.module("myapp",[]).constant('API_URL', 'http://localhost:8000/api/v1/');;

 myApp.config(function ($interpolateProvider) {
  $interpolateProvider.startSymbol('[[');
  $interpolateProvider.endSymbol(']]');
});

 myApp.controller("cont", function($scope,$http){


  $http({
    method: 'GET',
    url: API_URL + "items"
}).then(function (response) {
    $scope.items = response.data.items;
    console.log(response);
}, function (error) {
    console.log(error);
    alert('This is embarassing. An error has occurred. Please check the log for details');
});


      $scope.Name=["Ahmed","ALi","Mo","Salh","Hpo"];


  } );

  */