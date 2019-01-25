<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kupload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        .card{
            top:10rem;
            left:10rem;
            border-radius: 10px;
            box-shadow: 10px 10px 5px black;
        }
        body{
            background-image: url("../assets/images/back.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</head>
<body>



    <div class="card text-center" style="width: 20rem;">

    <?php
if(isset($_REQUEST['msgErro'])){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
    '<strong>Um erro Ocorreu</strong> <br>'.$_REQUEST['msgErro'].
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
    '<span aria-hidden="true">&times;</span>'.
    '</button>'.
'</div>';
}
?>

        <img id="upload" src="../assets/images/upload.png" style="cursor:pointer;" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text" id="nomeArquivo">                
            </p>

            <form class="form-group" enctype="multipart/form-data" action="uploadServer.php" method="POST">
                <input type="file" style="display:none" name="file" id="file">
                <input class="btn btn-primary" id="enviar" type="submit" value="Enviar">
            </form>

            <div class='input-group mb-3'>
                <a href="<?=(isset($_GET['link'])?$_GET['link']:'')?>">
                    <span class='input-group-text' id='ir-para'> Ir para</span>
                 </a>
                <input class='form-control text-center' readonly type='text' id='link' value="<?=(isset($_GET['link'])?$_GET['link']:'')?>">
                <div class='input-group-append'>
                 <span class='input-group-text' id='status-link'>Copiar</span>
                 
                </div>
            </div>

        </div>
    </div>

    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script>

$(document).ready(function(){



    function toMb(value){

        return (value / 1000000).toFixed(2);
    }

    function copiarLink(){

        copyText = document.getElementById("link");

        copyText.select();
        if(copyText.value){

            document.execCommand("copy");
            $("#status-link").html("Copiado");
        }
        
    }

    $("#upload").click(function(){
        $("#file").trigger("click");

    })

    $("#enviar").click(function(){
        
        $("#upload").attr("src","../assets/images/load.gif")

    })

    $("#file").change(function(prop){

        name = prop.target.files[0].name;
        
        size = prop.target.files[0].size;
        
        sizeMb = toMb(size);

        $("#nomeArquivo").html(name+" "+"<br><b>("+sizeMb+" Mb)</b>");

    })

    $("#status-link").click(function(){
       
        copiarLink(); 
        
    })

    
})

</script>
</body>
</html>