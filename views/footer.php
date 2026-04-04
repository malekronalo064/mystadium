
<footer class="main-footer" style="background:linear-gradient(90deg,#1e5d2d 60%,#3bb54a 100%);color:#fff;padding:32px 0 0 0;margin-top:48px;box-shadow:0 -2px 12px #1e5d2d22;">
  <div class="footer-content" style="max-width:1400px;margin:0 auto;padding:0 24px;display:flex;flex-wrap:wrap;justify-content:space-between;align-items:flex-start;gap:32px;">
    <div style="flex:1 1 220px;min-width:200px;">
      <a href="/MyStadium/index.php" style="display:flex;align-items:center;gap:10px;text-decoration:none;">
        <img src="/MyStadium/public/img/logo.png" alt="MyStadium" style="height:38px;width:auto;filter:drop-shadow(0 2px 8px #fff8);"/>
        <span style="font-family:'Montserrat',Roboto,'Segoe UI',Arial,sans-serif;font-size:1.3em;font-weight:900;color:#fff;letter-spacing:1px;">MyStadium</span>
      </a>
      <div style="margin-top:12px;font-size:1em;">Leader du foot 5 premium.<br>35 centres en France.</div>
      <div style="margin-top:18px;">
        <a href="http://www.facebook.fr" aria-label="Facebook" style="color:#fff;margin-right:10px;font-size:1.5em;"><i class="fa fa-facebook"></i></a>
        <a href="http://www.instagram.com" aria-label="Instagram" style="color:#fff;margin-right:10px;font-size:1.5em;"><i class="fa fa-instagram"></i></a>
        <a href="http://www.twitter.fr" aria-label="Twitter" style="color:#fff;margin-right:10px;font-size:1.5em;"><i class="fa fa-twitter"></i></a>
        <a href="https://www.youtube.com/" aria-label="YouTube" style="color:#fff;font-size:1.5em;"><i class="fa fa-youtube"></i></a>
      </div>
    </div>
    <div style="flex:1 1 180px;min-width:180px;">
      <h3 style="font-size:1.1em;color:#ffd600;margin-bottom:8px;">Navigation</h3>
      <ul style="list-style:none;padding:0;margin:0;line-height:2;">
        <li><a href="/MyStadium/views/tournois.php" style="color:#fff;text-decoration:none;">Tournois</a></li>
        <li><a href="/MyStadium/views/store.php" style="color:#fff;text-decoration:none;">Boutique</a></li>
        <li><a href="/MyStadium/views/about.php" style="color:#fff;text-decoration:none;">À propos</a></li>
        <li><a href="/MyStadium/views/moncentre.php" style="color:#fff;text-decoration:none;">Mon centre</a></li>
        <li><a href="/MyStadium/views/reserver.php" style="color:#fff;text-decoration:none;">Réserver</a></li>
      </ul>
    </div>
    <div style="flex:1 1 220px;min-width:200px;">
      <h3 style="font-size:1.1em;color:#ffd600;margin-bottom:8px;">Contact</h3>
      <div>Email : <a href="mailto:contact@mystadium.fr" style="color:#fff;text-decoration:underline;">contact@mystadium.fr</a></div>
      <div>Tél : <a href="tel:0123456789" style="color:#fff;text-decoration:underline;">01 23 45 67 89</a></div>
      <div style="margin-top:12px;">123 avenue du Foot, 75000 Paris</div>
    </div>
    <div style="flex:1 1 260px;min-width:220px;">
      <h3 style="font-size:1.1em;color:#ffd600;margin-bottom:8px;">Newsletter</h3>
      <form style="display:flex;gap:8px;align-items:center;" onsubmit="event.preventDefault();alert('Merci pour votre inscription !');">
        <input type="email" placeholder="Votre email" required style="padding:8px 12px;border-radius:6px;border:none;min-width:0;flex:1;"/>
        <button type="submit" class="btn-main" style="background:#ffd600;color:#1e5d2d;font-weight:700;padding:8px 18px;border-radius:6px;border:none;">S'inscrire</button>
      </form>
      <div style="font-size:0.95em;margin-top:8px;">Recevez nos actus, offres et tournois en avant-première.</div>
    </div>
  </div>
  <div style="border-top:1px solid #fff3;margin-top:32px;padding:16px 0 0 0;text-align:center;font-size:0.95em;color:#fff;">
    &copy; MyStadium 2026 &mdash; <a href="/MyStadium/views/about.php" style="color:#ffd600;text-decoration:underline;">Mentions légales</a> &bull; <a href="/MyStadium/views/about.php" style="color:#ffd600;text-decoration:underline;">CGU</a> &bull; <a href="/MyStadium/views/about.php" style="color:#ffd600;text-decoration:underline;">Politique de confidentialité</a>
  </div>
  <style>
    @media (max-width: 900px) {
      .footer-content { flex-direction:column;gap:18px; }
    }
    .main-footer a:hover { color:#ffd600 !important; }
  </style>
</footer>