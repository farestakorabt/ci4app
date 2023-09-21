
<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if(!auth()->loggedIn()): ?>
  <!-- Contenu de la page d'accueil -->
  <section class="connexionPageGeneral">

    <div class="indexGeneralDiv">
      <!-- Titre de la page d'accueil -->
      <h2 class="indexPageH1">Bienvenue sur l'application des adresses non nominatives</h2>

      <!-- Paragraphe d'information -->
      <p class="indexPageParagraphe">
        Cette application vous permettra de faire une demande d'adresse email non nominative.
        Consulter la page dans l'intranet au sujet des adresses non nominatives : <br>
        <a target="_blank" href="https://intranet.inalco.fr/services-administratifs/dsirn/listes-de-diffusion-et-comptes-generiques">
          https://intranet.inalco.fr/services-administratifs/dsirn/listes-de-diffusion-et-comptes-generiques
        </a>                                                                                        
      </p>
      
      <!-- Boutons pour créer un compte et se connecter -->
      <div class="indexPagedivButton">

        <a class="btn btn-primary" href="<?= url_to("register") ?>" role="button" id="">Créer un compte</a>
        <a class="btn btn-primary" href="<?= url_to("login") ?>" role="button" id="">Se connecter</a>

      </div>
    
    </div>
  </section>

<?php endif; ?>



<?= $this->endSection() ?>
