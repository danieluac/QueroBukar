
<div class="col-md-4 azul-car-f">

    <video autoplay="" width="250" height="250"></video>
    <canvas id="canvas" width="250" height="250"></canvas>
    <img src="" width="250" height="250" id="foto">
    <input type="button" value="Iniciar" id="start" class="btn btn-success col-md-12">
     <input type="button" value="Parar" id="stopbt" class="btn btn-danger col-md-12">
     <input type="button" value="Criar" onclick="Foto();" class="btn btn-danger col-md-12">
    
</div>

 <!-- Scripts -->
    <script src="<?= $this->asset('js/jquery.min.js')?>"></script>
    <script src="<?= $this->asset('bootstrap/dist/js/bootstrap.min.js')?>"></script>
     <script src="<?= $this->asset('js/webcam.js')?>"></script>

<script type="text/javascript">
    window.URL = window.URL || window.webkitURL;
    navigator.getUserMedia = 
                                navigator.getUserMedia || 
                                navigator.webkitGetUserMedia || 
                                navigator.mozGetUserMedia || 
                                navigator.msGetUserMedia ||
                                navigator.oGetUserMedia;
    var video = document.querySelector('video');
    var canvas = document.getElementById("canvas");
    var foto = document.getElementById("foto");
    var context = canvas.getContext("2d");
    var cameraStream = '';
    $("#start").on('click',function(){
        if(navigator.getUserMedia)
        {
            navigator.getUserMedia(
                    {audio: false, video: true},
            function(stream){
                cameraStream = stream;
                video.src = window.URL.createObjectURL(stream); 
               // video.play();
            },
            function (){
                document.writeln("Actualize o teu hardware para a reprodução de video");
            }
            );
        }else
        {
            document.writeln("Captura de video não é suportado");
        }
        });
        function Foto()
        {
            context.drawImage(video,0,0);
            foto.setAttribute('src',canvas.toDataURL('image/png'));
        }
        document.querySelector("#stopbt").addEventListener(
                'click', function(e)
        {
            video.src= '';
            cameraStream.stop();
        });
</script>

</body>
</html>