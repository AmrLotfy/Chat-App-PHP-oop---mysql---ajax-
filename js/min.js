$(document).ready(function(){
    $("#chattext").keyup(function(e){
        if(e.keyCode == 13){
            var chattext = $("#chattext").val();
            $.ajax({
                type:'POST',
                url:'../pages/InsertMessage.php',
                data:{chattext:chattext},
                success:function(){
                    $("#chattext").val("");
                }
            });
        }
    });
});