$(document).ready(function(){
	$("#register").hide();//hide registration form on page load
    $("#login_tab").click(function(){
        $("#register").hide();//hide registration form
        $("#login").show();//Show Login form
    });
    $("#register_tab").click(function(){
        $("#login").hide();//Hide Login form
        $("#register").show();//Show registration form
    });
//Delete todo item using AJAX
$("#todo").on("click", "#todo_display .delete", function() {
         var clickedID = this.id.split('-'); //Split ID string and store them all in the array
         var DbNumberID = clickedID[1]; //get number from array
         var myData = 'todo_id='+ DbNumberID; //build a post data structure
         $('#item_'+DbNumberID).addClass( "sel" );
         $(this).hide(); //hide currently clicked delete button
         jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "include/delete.php", //Where to make Ajax calls
            dataType:"text", 
            data:myData, //Form variables
            success:function(response){
                //on success, hide  element user wants to delete.
                $('#item_'+DbNumberID).fadeOut();
            },
            error:function (xhr, ajaxOptions, thrownError){
                //On error, alert user
                alert(thrownError);
            }
            });
    });


//Mark an item done using AJAX
$("#todo").on("click", "#todo_display .done-btn", function() {
         var clickedID = this.id.split('-'); //Split ID string and store them all in the array
         var DbNumberID = clickedID[1]; //get number from array
         var myData;
          //build a post data structure
         if (clickedID[0]=='done') {
            myData = 'as=done&todo_id='+ DbNumberID;
            jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "include/change_status.php", //Where to make Ajax calls
            dataType:"text", 
            data:myData, //Form variables
            success:function(response){
                //on success, add an image before the ToDo item and remove the Mark Button
                $('#todo-'+DbNumberID).addClass("done");
                $('#done-'+DbNumberID).hide();
            },
            error:function (xhr, ajaxOptions, thrownError){
                //On error, alert user
                alert(thrownError);
            }
            });
         }
         
    });

//Add new ToDo using AJAX
    $("#add_todo").click(function() {    
            if($("#add_todo_text").val()==='')
            {
                //If input field is blank then display an alert.
                alert("Please enter some text!");
                return false;
            }
            $("#add_todo").hide(); //hide submit button
            $("#LoadingImage").show(); //show loading image
            var myData = 'add_todo_text='+ $("#add_todo_text").val(); //build a post data structure
            jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "include/add.php", //Where to make Ajax calls
            dataType:"text", 
            data:myData, //Form variables
            success:function(response){
                $("#todo_display").append(response);//append new item to the list
                $("#add_todo_text").val(''); //empty input field
                $("#add_todo").show(); //show submit button
                $("#LoadingImage").hide(); //hide loading image

            },
            error:function (xhr, ajaxOptions, thrownError){
                $("#add_todo").show(); //show submit button
                $("#LoadingImage").hide(); //hide loading image
                alert(thrownError);
            }
            });
    });

   
});