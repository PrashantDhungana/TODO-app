@extends('NavbarTemplate')

@section('head-link')
<script
src="{{asset('js/jquery/jquery-3.4.1.min.js')}}"
crossorigin="anonymous"></script>
@endsection
@section('content')
<style>
	.Todo{
		position: absolute;
		top: 35%;
		left: 26%;
		color: white;
	}
	#incomplete{
    margin-top: 10px;
    max-width: 900px;
  }

table{
  width:700px;
}
  table,tr,td,th{
    border: none;
  }

  #text:focus{
    -moz-box-shadow:    0px 1px 10px 5px #2c657e;
    -webkit-box-shadow: 0px 1px 10px 5px #2c657e;
    box-shadow:         0px 1px 10px 5px #2c657e;
  }
  .form-control,.form-control:focus{
    background-color: #343a40;
    color: white;
  }
  .form-control::placeholder{
    color:cyan;
    opacity: 0.6;
  }
</style>
<style type="text/css">

  .wrap
  {
    position: absolute;
    width: 70%;
    top: 25%;
    left: 60%;
    transform: translate(-50%,-50%);
  }
  .wrap #F
  {
    text-align: center;
    font-size: 50px;
  }
  #searching
  {
    width: 100%;
    position: relative;
  }
  .searchhere
  {
    border-radius: 25px 0px 0px 25px;
    float: left;
    width: 70%;
    border: 3px solid white;      
    padding: 11px;
  }
  .searchbtn
  {
    color: white;
    position: absolute;
    width: 50px;
    height: 51px;
    border: 2px solid #ffffff; 
    background-color: #2c657e; 
    cursor: pointer;
    border-radius: 0px 25px 25px 0px;
  }
  .wrap #searching .searchbtn .fas
  {
    color: white;
  }
  #searching:focus,.searchhere:focus,.wrap:focus,.searchbtn:focus{
    outline: none;
    box-shadow: 0px 1px 10px 5px #2c657e;;


  }

  .recommended
  {
    position: absolute;
    top: 18%;
    left: 12%;
    width: 1170px;
    height: 450px;
    border-radius: 15px;
    background-color: white; 
    border: 2px solid white;
  }
  .recommended p
  {
    text-align: center;
    padding-top: 6px;
    padding-left: 6px;
    font-size: 20px;
    color: #5f2c7e;
    font-family: 'Titillium Web', sans-serif;
  }
  #c1 .card
  {
    color: #7e7e37;
    position: absolute;
    top: 22%;
    left: 1%;
    width: 270px;
    height: 250px;
    font-size: 15px;
    text-align: center;
  }
  #c2 .card
  {
    color: #5f2c7e;
    position: absolute;
    top: 22%;
    left: 26%;
    width: 270px;
    height: 250px;
    font-size: 15px;
    text-align: center;
  }
  #c3 .card
  {
    color: #5f2c7e;
    position: absolute;
    top: 22%;
    left: 51%;
    width: 270px;
    height: 250px;
    font-size: 15px;
    text-align: center;
  }
  #c4 .card
  {
    color: #5f2c7e;
    position: absolute;
    top: 22%;
    left: 76%;
    width: 270px;
    height: 250px;
    font-size: 15px;
    text-align: center;
  }
  .card .card-body a
  {
    color: #5d112e;
  }
  .card .card-body a:hover
  {
    color: #dca79e;
    text-decoration: none;
  }

  .sidebar ul li ul li
  {
    display: none;
  }
  .sidebar ul li:hover ul li
  {
    display: block;
    padding-left: 20px;
  }
  .cr_ad{
    display: none;
  }
  .btn:hover .cr_ad{
    display: inline-block;
  }

</style>
@if (session()->has('status'))
<div class="alert {{ session()->get('status')[0] }}">
  {{ session()->get('status')[1]}}
</div>
@endif
<div class="wrap"> 
 <div id="searching">
  <div>
    <input type="text" id="searchText" class="searchhere" placeholder="Search Todo List" >
    <a href="#"><button type="submit" class="searchbtn"><i class="fas fa-search"></i></button>
    </a>
  </div>    
</div>
</div>
<script>
  $(function(){
    //For Completed using Ajax
      // $("#completed").click(function(e){
      //   e.preventDefault();
      //   var val=$(this).prop("value");
      //   $.get('completed', {id: val },function(data){
      //     console.log(data);
      // });
      //   });
     //For Edit AJAX
      $(".edit").click(function(e){
              e.preventDefault();
              var id2=$(this).prop("value");
              // $(this).closest(".disappear").replaceWith('<tr><td></td><td><textarea></textarea></td></tr>');

              $.get('edit', {id: id2 },function(data){

                var obj = JSON.parse(data);
                $(self).closest(".disappear").replaceWith('<tr><td></td><td><textarea></textarea></td></tr>');
                // var tag=$(".edit").parent().remove();
                // console.log(tag);
                // console.log(obj[0].id);
                

      });
        });

      //When clicking edit button
      $(".edit").click(function(){
        console.log($(this).find(".grabThis").val());

      });
      //Hide the Success or Failure Div after sometime
      setTimeout(function() {
        $('.alert').fadeOut('fast');
      }, 3000);


      $(document).keydown(function(e) {
          if(e.key == "a" && e.ctrlKey) {
              e.preventDefault();
              $("#addNew").click();
          }
      });

          $("#addNew").click(function() {
        $('html, body').animate({
            scrollTop: $("#incomplete").offset().top
        }, 2000);
    });
      //One checkbox click then select all
      $("#mainCheck").click(function(){
        if (this.checked==true) {
              //Appear a Delete All button if all the checkbox selected
              $('.h5').after("<input type='submit' class='btn btn-danger' id='deleteAll' value='Delete Selected'>")
            }
            else{
              $("#deleteAll").remove();
            }
          //Select all Checkbox
          $('input:checkbox').prop('checked',this.checked);
        });





// $("$edit").click(function(){
//     $.get('editdata',{name:edit},function(data){

//     });

// });


        $("#searchText").keyup(function(){
            var search=$(this).val();
            if ($.trim(search) !='') {
              $.get('getdata', {name: search},function(data){
                var obj = JSON.parse(data);
                // var myid="";
                $(".disappear").hide();
                $(".temp").hide();
                for(var key in obj){
                  
                  $("table").append("<tr class='temp'><td><input type='checkbox'></td><td>"+obj[key].Tasks+"</td><br><td><a href='#' role='button' class='btn btn-warning'>Incomplete</a></td><td><a href='#' role='button' class='btn btn-primary' >Edit</a></td><td><a href='todo/del/' role='button' class='btn btn-danger'>Delete</a></td></tr>");
                  
                }


                // obj.foreach(myFunction);

                // function myFunction(item){
                // }
                // for
              });
            }
            else{
                $(".disappear").show();
                $(".temp").remove();


            }
        });


      $("#addNew").click(function(){
        $("#ShiftEnter").show();
        if ($("#new").length==0) {
          $("table").append("<tr id='new'><td></td><td><textarea id='text' placeholder='Add new List' class='form-control' style='resize:none;' name='newToDo' required></textarea></td><td><button type='submit' class='btn btn-success' id='addBtn' value='Add New List'><i class='fas fa-plus' title='Add list'></i></button></td><td><a role='button' class='btn btn-danger' id='hide' title='Cancel'><i class='far fa-window-close'></i></a></td>");
          $("#text").focus();
          $("#hide").click(function(){
            $("#new").remove();
            $("#ShiftEnter").hide();

          });

          $("#text").keydown(function(e){
            if( e.which === 13 && e.shiftKey){
               e.preventDefault();
              $("form").submit();
            } 
            if(e.which === 27){
              $("#hide").click();
            }       
          });




          //Add a new Task using Ctrl+N
          // $(window).keydown(function(e){
          //   if( e.which === 13 && e.shiftKey){
          //      e.preventDefault();
          //      alert('Key');
          //   }        
          // });


            // $("#addBtn").click(function(){

            //     $.post($("myForm").attr("action"),$("#myForm:input").serializeArray(),function(info){
            //       $("#result").html(info);
            //     });

            //     $("#myForm").submit(function(){
            //         return false;
            //     });

            // });
          }
          else{
            $("#text").focus();
          }
        });
    });
  </script>
  <div class="Todo">
    <form action="newdata" method="POST" id="myForm">
      @csrf
   <h5 class="h5">Recent Lists</h5>
   <input type="button" class="btn btn-primary" value="Add New" id="addNew" title="Keyboard Shortcut: Ctrl+a">
   <div id="incomplete">
      <table>
        <tr>
          <th><input type="checkbox" id="mainCheck"></th>
          <th>Tasks</th>
          <th colspan="3">Actions</th>
        </tr>
        @foreach($tasks as $task)
        <tr class="disappear">
         <td><input type="checkbox" name="check[]" value="{{$task->id}}"></td>
         <td id="content">
            <div style="border-left: 2px solid #2c657e; height: 30px;" >
            <input type="hidden" value="{{$task->Tasks}}" class="grabThis">
            @php
            if(!function_exists('converttoURL'))
            {
              function converttoURL($input) 
              {
               $pattern = '@(http(s)?://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
               return $output = preg_replace($pattern, '<a href="http$2://$3" target="_blank">$0</a>', $input);
             }
             /*   function phoneNumber($input){
             $pattern = '/^([\+]{0,1}977){0,1}9[0-9]{9}+$/';
             return $output = preg_replace($pattern, '<a href="#">$0</a>', $input);
           }*/
         }
         $output=converttoURL($task->Tasks);
         echo $output;
         //$output=phoneNumber($task->Tasks);
         @endphp
          </div>
<small class="form-text text-muted" title="{{$task->created_at->format('Y/m/d h:m:s')}}">Created {{$task->created_at->diffForHumans()}}</small>
     </td>
     <td><a href="completed/{{$task->id}}" class="btn btn-success" title="Completed" id="completed"><i class="far fa-check-square"></i></a></td>
     <td><a role="button" class="btn btn-primary edit" value="{{$task->id}}" title="Edit"><i class="far fa-edit"></i></a></td>
     <!-- <td><a href="todo/del/{{$task->id}}" role="button" class="glyphicon">&#xe020;</a></td> -->
     <!-- <td><a href="todo/del/{{$task->id}}" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-trash"></span> Trash 
        </a></td> -->
        <td><a href="todo/del/{{$task->id}}" role="button" class="btn btn-danger" title="Delete"><i class="far fa-trash-alt"></i></a></td>
     <td><a href="todo/incomplete/{{$task->id}}" role="button" class="btn btn-warning" title="Incomplete"><i class="fas fa-times-circle"></i></a></td>
   </tr>
   @endforeach
 </table>
</form>
</div>
 <label id="ShiftEnter" style="display: none; opacity: 0.5;">Press Shift+Enter to Add the task.</label>
{{$tasks->links()}}

</div>

@endsection

@section('body-color')#212529 @endsection
@section('title') Todo @endsection
