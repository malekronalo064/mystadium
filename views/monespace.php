<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/MyStadium/public/css/login.css"/>
    <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
    <link rel="stylesheet" href="/MyStadium/public/css/monespace.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Mon espace — MyStadium</title>
    <!-- Style global géré par index.css -->
</head>
<body>
    <?php include(__DIR__ . "/header.php")?>
                <div class="login-bg" style="background: #111 url('/MyStadium/public/img/signupbackground1.jpg') center/cover no-repeat; min-height: 100vh;">
                    <section class="monespace-main">
                        <div class="monespace-title" id="user-welcome">Bienvenue !</div>
                        <div class="monespace-section-title">Votre espace personnel</div>
                        <div class="monespace-userinfo">
                            <div><strong>Nom :</strong> <span id="user-lastname"></span></div>
                            <div><strong>Prénom :</strong> <span id="user-firstname"></span></div>
                            <div><strong>Email :</strong> <span id="user-email"></span></div>
                            <div><strong>Téléphone :</strong> <span id="user-telephone"></span></div>
                        </div>
                        <div class="monespace-section-title">Changer mon mot de passe</div>
                        <form id="change-password-form" class="monespace-form" autocomplete="off">
                            <div class="field-group">
                                <label for="old-password">Ancien mot de passe</label>
                                <input type="password" id="old-password" autocomplete="current-password" required>
                                <button type="button" class="pwd-eye-btn" tabindex="-1" onclick="togglePwd('old-password', this)"><i class="fa fa-eye"></i></button>
                                <div class="field-error" id="err-old-password"></div>
                            </div>
                            <div class="field-group">
                                <label for="new-password">Nouveau mot de passe</label>
                                <input type="password" id="new-password" autocomplete="new-password" required>
                                <button type="button" class="pwd-eye-btn" tabindex="-1" onclick="togglePwd('new-password', this)"><i class="fa fa-eye"></i></button>
                                <div class="field-error" id="err-new-password"></div>
                            </div>
                            <div class="field-group">
                                <label for="new-password2">Confirmer le nouveau mot de passe</label>
                                <input type="password" id="new-password2" autocomplete="new-password" required>
                                <button type="button" class="pwd-eye-btn" tabindex="-1" onclick="togglePwd('new-password2', this)"><i class="fa fa-eye"></i></button>
                                <div class="field-error" id="err-new-password2"></div>
                            </div>
                            <button type="submit" class="btn-main">Valider</button>
                            <div id="change-pwd-feedback"></div>
                            <div style="margin-top:10px;color:#bbb;font-size:0.93em;">Le mot de passe doit contenir au moins 10 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.</div>
                        </form>
                        <a href="/MyStadium/views/logout.php" class="btn-main" style="width:100%;margin-bottom:8px;">Se déconnecter</a>
                    </section>
                    <script src="/MyStadium/public/js/app.js"></script>
                    <script>
                    async function chargerInfosUtilisateur() {
                        try {
                            const res = await fetch('/MyStadium/api/user.php', {credentials:'same-origin'});
                            if (!res.ok) throw new Error('Erreur réseau (' + res.status + ')');
                            const data = await res.json();
                            if (data.success) {
                                document.getElementById('user-welcome').textContent = 'Bienvenue, ' + (data.user.firstname || data.user.login) + ' !';
                                document.getElementById('user-lastname').textContent = data.user.lastname || '';
                                document.getElementById('user-firstname').textContent = data.user.firstname || '';
                                document.getElementById('user-email').textContent = data.user.email || '';
                                document.getElementById('user-telephone').textContent = data.user.telephone || '';
                            } else {
                                window.location.href = '/MyStadium/views/connexion.php';
                            }
                        } catch (e) {
                            const main = document.querySelector('.monespace-main');
                            if(main) {
                                main.innerHTML = '<div class="monespace-alert monespace-alert-error">Erreur lors du chargement de vos informations.<br>'+e.message+'</div>';
                            }
                        }
                    }
                    chargerInfosUtilisateur();

                    // Afficher/masquer mot de passe
                    function togglePwd(inputId, btn) {
                        const input = document.getElementById(inputId);
                        const eye = btn.querySelector('i');
                        if (input.type === 'password') {
                            input.type = 'text';
                            eye.classList.remove('fa-eye');
                            eye.classList.add('fa-eye-slash');
                        } else {
                            input.type = 'password';
                            eye.classList.remove('fa-eye-slash');
                            eye.classList.add('fa-eye');
                        }
                    }

                    // Gestion du changement de mot de passe moderne
                    document.getElementById('change-password-form').onsubmit = async function(e) {
                        e.preventDefault();
                        // Reset erreurs
                        ['old-password','new-password','new-password2'].forEach(id => {
                            document.getElementById(id).classList.remove('error');
                            document.getElementById('err-'+id).textContent = '';
                        });
                        const oldPwd = document.getElementById('old-password').value;
                        const newPwd = document.getElementById('new-password').value;
                        const newPwd2 = document.getElementById('new-password2').value;
                        let hasError = false;
                        // Vérif ancien mdp
                        if (!oldPwd) {
                            document.getElementById('old-password').classList.add('error');
                            document.getElementById('err-old-password').textContent = 'Champ obligatoire.';
                            hasError = true;
                        }
                        // Vérif nouveau mdp
                        if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\d]).{10,}$/.test(newPwd)) {
                            document.getElementById('new-password').classList.add('error');
                            document.getElementById('err-new-password').textContent = 'Mot de passe trop faible.';
                            hasError = true;
                        }
                        // Vérif confirmation
                        if (newPwd !== newPwd2) {
                            document.getElementById('new-password2').classList.add('error');
                            document.getElementById('err-new-password2').textContent = 'Les mots de passe ne correspondent pas.';
                            hasError = true;
                        }
                        if (hasError) return;
                        const feedback = document.getElementById('change-pwd-feedback');
                        feedback.innerHTML = '';
                        try {
                            const res = await fetch('/MyStadium/api/change_password.php', {
                                method: 'POST',
                                headers: {'Content-Type': 'application/json'},
                                body: JSON.stringify({old_password: oldPwd, new_password: newPwd}),
                                credentials: 'same-origin'
                            });
                            const data = await res.json();
                            if (data.success) {
                                feedback.innerHTML = '<div class="monespace-alert monespace-alert-success">'+data.message+'</div>';
                                document.getElementById('change-password-form').reset();
                            } else {
                                // Si erreur sur ancien mdp
                                if (data.message && data.message.toLowerCase().includes('ancien')) {
                                    document.getElementById('old-password').classList.add('error');
                                    document.getElementById('err-old-password').textContent = data.message;
                                } else {
                                    feedback.innerHTML = '<div class="monespace-alert monespace-alert-error">'+data.message+'</div>';
                                }
                            }
                        } catch (err) {
                            feedback.innerHTML = '<div class="monespace-alert monespace-alert-error">Erreur réseau.</div>';
                        }
                    }
                    </script>
            </section>
        </div>
        <?php include(__DIR__ . "/footer.php")?>
</body>
</html>