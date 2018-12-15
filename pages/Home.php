<?php
    session_start();
?>
<!DOCTYPE html>
 <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HomePage</title>
        <link rel="stylesheet" href="../css/style.css">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#chattext").keyup(function(e){
                    if(e.keyCode == 13){
                        var chattext = $("#chattext").val();
                        $.ajax({
                            type:'POST',
                            url:'InsertMessage.php',
                            data:{chattext:chattext},
                            success:function(){
                                $("#chatmessage").load("DisplayMessages.php");
                                $("#chattext").val("");
                            }
                        });
                    }
                });

                setInterval(function(){
                    $("#chatmessage").load("DisplayMessages.php");
                },1500);
                $("#chatmessage").load("DisplayMessages.php");
                
            });
        </script>
    </head>
    <body>
        <h2 style="text-align:center">Welcome <span style="color:green"><?php echo $_SESSION['username'];?></span></h2>
        <h3 style="color:#303030;text-align:center; "><a style="text-decoration:none;color:#303030" href="../logout.php">LogOut</a></h3>
        <br>

        <div id="chatbig">
            <div id="chatmessage">
            </div>
            <textarea id="chattext" name="chattext"></textarea>
        </div>



        
        
    </body>
</html>