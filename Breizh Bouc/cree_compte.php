
<div id="container">
    <form id="form-test" class="bg-dark" action="connexion.php" method="POST">
        <h1 class="font-color">Création de compte</h1>

        <label><b class="font-color">Adresse email</b></label>
        <input type="text" placeholder="Adresse email" name="mail" required>

        <label><b class="font-color">Nom d'utilisateur</b></label>
        <input type="text" placeholder="Nom d'utilisateur" name="username" required>

        <label><b class="font-color">Mot de passe</b></label>
        <input type="password" placeholder="Mot de passe" name="password" required>

        <label><b class="font-color">Confirmer votre mot de passe</b></label>
        <input type="password" placeholder="Mot de passe" name="confirm-password" required>

        <input type="submit" id='submit' value='Créer' >

    </form>
</div>
