<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuttner</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">

        <style>
        
        .card{
            border-radius: 10px;
            box-shadow: 10px 10px 5px black;
            min-width:240px
        }
        body{
            background-image: url("back.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="row">
        &nbsp;
    </div>

    <div class="row">
        <div class="alert alert-primary" role="alert">
            Sobre a <a href="http://www.kuttner.com.br" class="alert-link">Kuttner</a>
        </div>
    </div>

    <div class="card row" style="width: 30%;">
    <br>
        <img src="kdb.png" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title" id="dados"></h5>
            
            <a  id="link" href="#" class="btn btn-primary">Download</a>
            <input type="hidden" id="code" value="<?=$_GET['code']?>">
        </div>
    </div>
</div>
<!-- MODAL SOBRE KUTTNER -->
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Kuttner do Brasil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Nós temos como filosofia sermos exigentes com o nosso trabalho, pois entendemos que somente dessa maneira poderemos atender com competência as necessidades específicas de nossos clientes. Para atingir esse objetivo, desenvolvemos continuamente nossas tecnologias. Estar atualizados e cientes do melhor estado da técnica, significa para nós poder sempre oferecer o que há de melhor no mercado. Exigentes, modernos e comprometidos, assim a Kuttner define o seu sucesso. 
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL SOBRE KUTTNER -->
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

var server = "http://201.49.127.157:9003";

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

        // $(".modal").show();
})
</script>