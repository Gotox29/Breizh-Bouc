
<div id="container">
    <form id="form-test" action="connexion.php" method="POST">
        <h1>Création de compte</h1>

        <label><b>Adresse email</b></label>
        <input type="text" placeholder="Adresse email" name="mail" required>

        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Nom d'utilisateur" name="username" required>

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Mot de passe" name="password" required>

        <label><b>Confirmer votre mot de passe</b></label>
        <input type="password" placeholder="Mot de passe" name="confirm-password" required>

        <input type="submit" id='submit' value='Créer' >

    </form>
</div>
