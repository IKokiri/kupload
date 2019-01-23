<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuttner</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
</head>

<body>
    <div class="container text-center">

        <div class="text-center">
            <div>
                <img src="kdb.png" alt="">
            </div>
        </div>
        <br>
        <div class="text-center">
        
        <a id="link" href="">
            <button type="button" class="btn btn-outline-primary btn-lg">Download</button>
        </a>   
        <h4 id="dados">
            </h4> 
        <input type="hidden" id="code" value="<?=$_GET['code']?>">
        </div>


    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</html>

<script>

var server = "http://localhost";

function buscarDownload() {

    var formData = new FormData();
    var code = $("#code").val();
    formData.append('code', code);
    formData.append('action', "download");
    

    $.ajax({
        url: server+"/kupload/app/uploadServer.php",
        type: 'POST',
        dataType: 'JSON',
        data: formData,
        success: function (data) {
            
            nome = data.nomeReal;
            tamanho = (data.size / 1000000).toFixed(2);
            $("#link").attr('href',server+"/kupload/app/files/"+nome)
            $("#dados").html(nome+"<br>("+tamanho+" MB)");

        },
        processData: false,
        cache: false,
        contentType: false
    }).done(function () {
        
    });

}

$(document).ready(function(){
    buscarDownload();
})
</script>