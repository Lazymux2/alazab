
$("#new").on('click',function () {
  
  new_dept();
});
function new_dept(){
  $("#deptimg").attr('src',"");
  $(".deptid").removeAttr("value");
  $("#titel").val('');
  $('#desc').val('');
  $("#image").attr('required','required');
  $('.table_moreitems table tbody').html('');
  $(".table_moreitems table").hide(200);


}

$(document).ready(function(){
 $('.toast').addClass('show');
  });


$('#moreOrder').click(function(){


  var count=$('#count').val();
  $(this).attr('disabled','disabled');
  $('table *').animate({opacity:'.6'},'fast');
  $(this).parent().append('<div class"col-12 " id="loadpro" align="center"><h1 align="center" style="font-size: xx-large !important; z-index:1; position: fixed; top:50%; right:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;margin-left: 501px !important;"'+'+><span class="fa fa-spinner fa-spin"></span></h1></div>')
  var size=$("#size").val();
  $.ajax({
    url:'getorders?count='+count+'&size='+size+'&Ajax=Ajax',
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

//$("#listitemser").on('load',function () {

  //alert($(this).val());
//});


$("#lisloc").on('change',function(){

  var lid=$(this).val();

  if(lid!="" ){

    
    $("body").parent().append('<div class"col-12 " id="loadpro" align="center"><h1 align="center" style="font-size: 80pt !important; z-index:1; position: fixed; top:50%; right:50%; left:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;"'+'+><span class="fa fa-spinner fa-spin"></span></h1></div>');

    $("#imageloc").attr('src',"../myimages/bg-images/loading.gif");
    
    $.ajax({
      url:'getlocinfo?lid='+lid,
      method:'GET',
      data:{},
      dataType:'json',
      success:function(data){
        $("#dellocbtn").css('visibility','visible');
        $("#dlid").val(data.id);
        $("#lid").val(data.id);
        $("#imageloc").attr('src',data.img);
        $("#name").val(data.name);
        $("#phone").val(data.phone);
        $("#address").val(data.address);
        $("#addurl").val(data.addurl);
        $("#img").removeAttr("required");
        $("#loadpro").hide(500);
        $("#loadpro").remove();
        
    
      }
    });
  }




});





$(document).ready(function(){
  $("#searchProdectsAdmin ").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("table tbody  .showData").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});



function filldept(id){

  alert(id);

}













  $("#listitemser").on('change',function(){

    var id=$(this).val();

    
    if(id!=""){
   
      $("body").parent().append('<div class"col-12 " id="loadpro" align="center"><h1 align="center" style="font-size: 80pt !important; z-index:1; position: fixed; top:50%; right:50%; left:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;"'+'+><span class="fa fa-spinner fa-spin"></span></h1></div>');

    //alert($(this).val());
    
    var form=$(this).parent().parent();
    
    form.animate({opacity:'0.3'},1000);
    //$(this).parent().parent().

    $("#deptimg").attr('src',"../myimages/bg-images/loading.gif");
    
      $.ajax({

        url:'getitemsfordept?id='+id,
        method:'GET',
        data:{},
        dataType:'json',
        success:function(data){
        $('.table_moreitems table tbody').html(data.items_result);
      
        $(".table_moreitems table").css('visibility','visible');
        $(".table_moreitems table").show(200);
      $('#titel').val(data.titel);
      $('#desc').val(data.desc);
      $(".deptid").val(data.id);
      $("#deldeptbtn").css('visibility','visible');
      // $("#deldeptbtn").removeAttr("disabled");

      $("#count").val(data.count);
      $("#image").removeAttr("required");
      $("#deptimg").attr('src', data.img);
    
      $("#deptimg").parent().click(showimgModel(data.img));
      $("#loadpro").fadeOut(1000);
      $("#loadpro").remove();
      $("#size").val(data.size);
      $("#sizelable").text(data.count+" من: "+data.size);
      if(data.count<data.size){

        $("#showmorebtn").show(500);
      }
      else
      $("#showmorebtn").hide();
      
      form.animate({opacity:'1'},'fast');
      //e({opacity:'1'},1000);
    }
    });



    }
    else if(id=="")
    new_dept();



  });



 
  $(document).ready(function(){
    $("#searchMitem").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#Mitemtable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });


  $("#Simgs").on('load',function(){
    $('#Simgs img').attr('src',"../myimages/bg-images/loading.gif");


  });
$(document).ready(function(){


});



  var lodeFile=function (event) {
    var img= $("#Simgs");
    var inner='';
    //img.html('<img src="myimages/bg-images/loading.gif" width="80%" /> ');
  for(i=0; i<(event.target.files).length; i++){
    var url1=URL.createObjectURL(event.target.files[i]);

    inner+='<div class="col-lg-2 col-md-4 col-sm-6 border"><img class="img-thumbnail" src="'+url1+'"  /></div>';


  }
  
  img.append(inner);
    
  }





  
  var lodeFileDept=function (event) {
    var img= $("#deptimg");
    
    img.attr('src','../myimages/bg-images/loading.gif');
    img.attr('src',URL.createObjectURL(event.target.files[0]));
    
  }

  var lodeFileLoc=function (event) {
    var img= $("#imageloc");
    
    img.attr('src','../myimages/bg-images/loading.gif');
    img.attr('src',URL.createObjectURL(event.target.files[0]));
    
  }

function delimgitem(img,id,el) {



  
  if(confirm('Are You Sure ?')){

  

    $.ajax({
  
      url:'delimg?id='+id+'&img='+img,
      method:'GET',
      data:{},
    
    dataType:'json',
            success:function(data){
              console.log(data);
              if(data.state=="ok")
              el.parent().remove();
  
  
              
    }
});
  }
  else
  return;
  
}






function swapiframe(rem,ad){
  $("body").parent().append('<div class"col-12 " id="loadpro" align="center"><h1 align="center" style="font-size: 80pt !important; z-index:1; position: fixed; top:50%; right:50%; left:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;"'+'+><span class="fa fa-spinner fa-spin"></span></h1></div>');

  
  $('#Aiframe').removeClass(rem);
  $('#Aiframe').addClass(ad);
  $('#loadpro').hide(500);
  $('#loadpro').remove();

}



function fileChange(e) { 


  document.getElementById('inp_img').value = '';

  for (var i = 0; i < e.target.files.length; i++) { 
  
    var file = e.target.files[i];

    if (file.type == "image/jpeg" || file.type == "image/png") {

        var reader = new FileReader();  
        reader.onload = function(readerEvent) {

          var image = new Image();
          image.onload = function(imageEvent) { 

              var max_size = 250;
              var w = image.width;
              var h = image.height;
                
              if (w > h) {  if (w > max_size) { h*=max_size/w; w=max_size; }
              } else     {  if (h > max_size) { w*=max_size/h; h=max_size; } }
            
              var canvas = document.createElement('canvas');
              canvas.width = w;
              canvas.height = h;
       //       canvas.style='background-color: #FF0000';
        
              //canvas.st


            var chim=250-h;
            var chwi=250-w;
            
            //image.
           // var ctx;
          var ctx= canvas.getContext('2d');
            ctx.drawImage(image,0,0,w,h);

            ctx.fillStyle='#fff';

            canvas.id='red';
          
            var convasimg=document.createElement('canvas');
          convasimg.width=255;
          convasimg.height=255;
            var ctximg=convasimg.getContext('2d');
            
            ctximg.fillStyle='#fff';
            ctximg.fillRect(0,0,255,255);
            ctximg.putImageData(ctx.getImageData(0,0,250,250),chwi/2,chim/2,0,0,w,h); 
            
      if (file.type == "image/jpeg") {
                var dataURL = convasimg.toDataURL("image/jpeg", 1);
              } 
              else {
                                var dataURL = convasimg.toDataURL("image/png");    
              }
            
              
              document.getElementById('inp_img').value += dataURL + '|';
          }
          image.src = readerEvent.target.result;
        }
        reader.readAsDataURL(file);
    } else {
        document.getElementById('imagefiles').value = ''; 
        alert('Please only select images in JPG- or PNG-format.');   
        return false;
    }
  }

}


$('#imagefiles').on('change',function(event) {

  alert(event.target.files.length);
  fileChange(event);
  lodeFile(event);
});

$('#imagefilesDB').on('change',function(event) {

  fileChange(event);
  lodeFileDept(event);
});

$('#imagefilesLoc').on('change',function(event) {

  fileChange(event);
  lodeFileLoc(event);
});








  $("#showmorebtn").on('click',function(){
  
    var morebtn= $("#showmorebtn h2").html();
    $("#showmorebtn h2").html('<span class="fa fa-spinner fa-spin"></span>');
      $(this).attr('disabled','disabled');
    
      
      var count=$("#count").val();
      var size=$("#size").val();
      var id=$("#listitemser").val();
      $("table").parent().append('<div class"col-12 " id="loadpro" align="center"><h1 align="center" style="font-size: 80pt !important; z-index:1; position: fixed; top:50%; right:50%; left:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;"'+'+><span class="fa fa-spinner fa-spin"></span></h1></div>');

    $("table").animate({opacity:'0.2'},'slow');
  
    $.ajax({
      url:'getitemsfordept?id='+id+'&count='+count+'&size='+size,
      method:"GET",
      data:{},
      dataType:"JSON",
      success:function(data){

        $("table tbody").append(data.trows);
        if(data.stat=="no")
        $("#showmorebtn").hide();

        else if(data.stat=="ok"){
        $("#showmorebtn h2").html(morebtn);
        $("#showmorebtn").removeAttr('disabled');
        
      }
      $("#sizelable").text(data.count+"من :"+data.size);
      
        $("#loadpro").hide(500);
        $("#loadpro").remove();
        $("table").animate({opacity:'1'},'fast');
        $("#count").val(data.count);
        





      }


    });


  
  });


  function submit_form(ob,fr){

    ob.html('<h1 align="center" style="font-size: 80pt !important; z-index:1; position: fixed; top:50%; right:50%; left:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;"'+'+><span class="fa fa-spinner fa-spin"></span></h1>');
    
    ob.attr('disabled','disabled');

    $(fr).submit();

  }




//Send Emailes


function acceptOrder(ob,id){
  var btn=ob.html();
  ob.html('<b class="text-danger fa fa-spinner fa-spin fa-2x"></b>');
  ob.attr('disabled','disabled');


  $.ajax({
    url:'acceptOrder?id='+id,
    method:'get',
    data:{},
    dataType:'JSON',
    success:function(data){


      $('stat'+id).html('<b id="stat" class="text-success fa fa-check p-2 fa-1x"> Ok</b>');
//      $('.tr'+id).slideUp(1000);


    },
    error:function(data){

      ob.html(btn);
      ob.parent().prepend('<p id="errormess" class="alert alert-danger">' + data.responseJSON.message + '</p>');

    }



  })



}
function denyOrder(ob,id){

  var btn=ob.html();
  ob.html('<b class="text-danger fa fa-spinner fa-spin fa-2x"></b>');
  ob.attr('disabled','disabled');


  $.ajax({
    url:'denyOrder?id='+id,
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







  function showMoreProdect(){

    //var count=$("#count").val();

    
    //$("#showmorebtn").add
    /*
    $.ajax({
      url:purl,
      method:"GET",
      data:{},
      dataType:"JSON",
      success:function(data){



      }


    });
*/







  }

//submet form mitems Prodecut
/*
<script type="text/javascript">
        
    $(document).ready(function(){
    
    
      
    $("#prodForm").on('submit',function(e){
    
      $.ajaxSetup({
    headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
      });
    
    
    
    
    e.preventDefault();
    
    $(this).parent().append('<div class"col-12 " id="loadpro" align="center"><h1 align="center" style="font-size: xx-large !important; z-index:1; position: fixed; top:50%; right:50%; text-align: center !important;     font-size: 120 !important; text-align: center !important;margin-left: 501px !important;"'+'+><span class="fa fa-spinner fa-spin"></span></h1></div>');
    
    var formData=new FormData(this);
                  $.ajax({
                    
                    method:'post',
                    url:'Mitemadd',
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData:false,
                    success:function(data){
    
                    },
                    error:function(data){
                      console.log(data);
                    }
    
    
    
                  });
    
    
    
    
    });
    
    });
    
        </script>
    */