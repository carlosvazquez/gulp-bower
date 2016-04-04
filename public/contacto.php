<?php require_once 'include/header.php'; ?>
<?php require_once 'include/navbar.php'; ?>


  <!--parallax 1 -->
  <section class="parallax1">
    <div class="container">
      <div id="anchor-point" class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5 slideintro">
          <h1>Contáctenos</h1>
          <p class="lead">Para cualquier pregunta o comentario rellene el siguiente formulario o escríbanos a: PO Box 5620, Chula Vista, CA 91912</p>
          <p><strong>Por email:</strong> info@moderntonalharmony.com</p>
          <p><strong>Skype:</strong> ModernTonalHarmony</p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7 slideintro slideform">
          <form action="send.php" method="post">
            <div class="form-group">
              <label for="name">Nombre completo</label>
              <input data-validation="length" data-validation-length="min4" data-validation-error-msg="Falta su nombre." type="text" class="form-control" id="name" name="name" placeholder="Nombre Completo">
            </div>
            <div class="form-group">
              <label for="email">Correo electrónico</label>
              <input data-validation="email" data-validation-error-msg="Falta su correo electrónico." type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="subject">Asunto</label>
              <input data-validation="length" data-validation-length="min4" data-validation-error-msg="Agregue el tema o asunto." type="text" class="form-control" id="subject" name="subject" placeholder="Asunto">
            </div>
            <div class="form-group">
              <label for="message">Comentarios</label>
              <textarea class="form-control" rows="3" id="message" name="message" data-validation="length" data-validation-length="min10" data-validation-error-msg="Agregue su mensaje."></textarea>
            </div>
            <button type="submit" class="btn btn-default">Enviar</button>
            <div class="g-recaptcha" data-sitekey="6Lcm_RoTAAAAABff2gJiazMfJlyJHuexQilqjWqS"></div>
          </form>
        </div>
      </div>
    </div>
  </section>


  <?php require_once 'include/footer.php'; ?>
