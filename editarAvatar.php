
<div class="modal fade" id="avatar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Imagen de Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="text-center mb-3">cambia un avatar</h5>
        <!-- genera la variable con el id recibido -->
        <?php $id=$_GET["id"]?>
        <!-- abre la pagina cambiarAvatar pasando el nombre del archivo para el campo 'avatar' y el id correspondiente por $_GET-->
            <a href="cambiarAvatar.php?avatar=perfilDesconocido.png & id=<?=$id?>"><img src="images/avatar/perfilDesconocido.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=perfilHombre.png & id=<?=$id?>"><img src="images/avatar/perfilHombre.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=perfilMujer.png & id=<?=$id?>"><img src="images/avatar/perfilMujer.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar01.png & id=<?=$id?>"><img src="images/avatar/avatar01.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar02.png & id=<?=$id?>"><img src="images/avatar/avatar02.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar03.png & id=<?=$id?>"><img src="images/avatar/avatar03.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar04.png & id=<?=$id?>"><img src="images/avatar/avatar04.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar05.png & id=<?=$id?>"><img src="images/avatar/avatar05.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar06.png & id=<?=$id?>"><img src="images/avatar/avatar06.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar07.png & id=<?=$id?>"><img src="images/avatar/avatar07.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar08.png & id=<?=$id?>"><img src="images/avatar/avatar08.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar09.png & id=<?=$id?>"><img src="images/avatar/avatar09.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar10.png & id=<?=$id?>"><img src="images/avatar/avatar10.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar11.png & id=<?=$id?>"><img src="images/avatar/avatar11.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar12.png & id=<?=$id?>"><img src="images/avatar/avatar12.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar13.png & id=<?=$id?>"><img src="images/avatar/avatar13.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar14.png & id=<?=$id?>"><img src="images/avatar/avatar14.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar15.png & id=<?=$id?>"><img src="images/avatar/avatar15.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar16.png & id=<?=$id?>"><img src="images/avatar/avatar16.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar17.png & id=<?=$id?>"><img src="images/avatar/avatar17.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar18.png & id=<?=$id?>"><img src="images/avatar/avatar18.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar19.png & id=<?=$id?>"><img src="images/avatar/avatar19.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar20.png & id=<?=$id?>"><img src="images/avatar/avatar20.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar21.png & id=<?=$id?>"><img src="images/avatar/avatar21.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar22.png & id=<?=$id?>"><img src="images/avatar/avatar22.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar23.png & id=<?=$id?>"><img src="images/avatar/avatar23.png" style="width:80px"></a>
            <a href="cambiarAvatar.php?avatar=avatar24.png & id=<?=$id?>"><img src="images/avatar/avatar24.png" style="width:80px"></a>

          <div class="d-flex mt-5">
            <div class="d-flex justify-content-center col-12">
              <!-- formulario que envía los datos por $_POST a la pagina cambiarAvatar con los datos de la imagen por $_FILES y el id por $_POST -->
              <form class="form" action="cambiarAvatar.php" method="POST" enctype="multipart/form-data">
                <h5 class="mt-3">O sube tu propia imagen</h5>
                <div class="input-group mt-3">
                  <div class="custom-file">
                    <input id="inputGroupFile01" type="file" class="custom-file-input" name="imagen">
                    <label class="custom-file-label" for="inputGroupFile01">elegir foto de perfil</label>
                  </div>
                  <button class="btn btn-primary ml-2" value=<?=$_GET["id"]?> type="submit" name="id">Aceptar</button>
                </div>
              </form>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>
