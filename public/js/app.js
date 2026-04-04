
// LOGIN
async function login() {
  const login = document.getElementById('login-username').value;
  const password = document.getElementById('login-password').value;
  const res = await fetch('/MyStadium/api/login.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({login, password}),
    credentials: 'same-origin'
  });
  const data = await res.json();
  if (data.success) {
    window.location.href = '/MyStadium/views/monespace.php';
  } else {
    alert(data.message);
  }
}

// REGISTER
async function register() {
  const firstname = document.getElementById('reg-firstname').value;
  const lastname = document.getElementById('reg-lastname').value;
  const email = document.getElementById('reg-email').value;
  const telephone = document.getElementById('reg-telephone').value;
  const loginVal = document.getElementById('reg-login').value;
  const password = document.getElementById('reg-password').value;
  const res = await fetch('/MyStadium/api/register.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({firstname, lastname, email, telephone, login: loginVal, password}),
    credentials: 'same-origin'
  });
  const data = await res.json();
  if (data.success) {
    alert('Inscription réussie ! Connectez-vous.');
    window.location.href = '/MyStadium/views/connexion.php';
  } else {
    alert(data.message);
  }
}

// RÉSERVER
async function reserver() {
  const terrain_id = document.getElementById('terrain').value;
  const res_date = document.getElementById('date').value;
  const res_slot = document.getElementById('slot').value;
  const res = await fetch('/MyStadium/api/reservations.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({terrain_id, res_date, res_slot}),
    credentials: 'same-origin'
  });
  const result = await res.json();
  if(result.success) {
    alert('Réservation confirmée !');
    window.location.href = '/MyStadium/views/mesreservations.php';
  } else {
    alert('Erreur : ' + result.message);
  }
}

// CHARGER LES TERRAINS DANS LE FORMULAIRE
if(document.getElementById('terrain')) {
  fetch('/MyStadium/api/terrains.php').then(r=>r.json()).then(terrains=>{
    const select = document.getElementById('terrain');
    terrains.forEach(t=>{
      const opt = document.createElement('option');
      opt.value = t.id; opt.textContent = t.name;
      select.appendChild(opt);
    });
  });
}

// CHARGER MES RÉSERVATIONS
async function chargerMesReservations() {
  const res = await fetch('/MyStadium/api/reservations.php', {credentials:'same-origin'});
  const reservations = await res.json();
  const table = document.getElementById('mes-reservations-table');
  if(table) {
    table.innerHTML = `<tr><th>Terrain</th><th>Date</th><th>Créneau</th><th>Action</th></tr>`;
    if(reservations.length === 0) {
      table.innerHTML += `<tr><td colspan='4' style='text-align:center;color:#c62828;'>Aucune réservation trouvée.</td></tr>`;
    } else {
      reservations.forEach(r => {
        table.innerHTML += `<tr><td>${r.terrain_id}</td><td>${r.res_date}</td><td>${r.res_slot}</td><td><button onclick="annulerReservation(${r.id})">Annuler</button></td></tr>`;
      });
    }
  }
}

// ANNULER UNE RÉSERVATION
async function annulerReservation(id) {
  if(!confirm('Annuler cette réservation ?')) return;
  const res = await fetch('/MyStadium/api/reservations.php', {
    method: 'DELETE',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({id}),
    credentials: 'same-origin'
  });
  const data = await res.json();
  if(data.success) {
    chargerMesReservations();
  } else {
    alert(data.message);
  }
}

// CHARGER INFOS UTILISATEUR
async function chargerInfosUtilisateur() {
  const res = await fetch('/MyStadium/api/user.php', {credentials:'same-origin'});
  const data = await res.json();
  if(data.success) {
    // Remplir les champs ou afficher les infos dans la page
    // Exemple : document.getElementById('user-email').textContent = data.user.email;
  }
}

// ADMIN : CHARGER RÉSERVATIONS ET UTILISATEURS
async function chargerAdmin() {
  const res = await fetch('/MyStadium/api/admin.php', {credentials:'same-origin'});
  const data = await res.json();
  if(data.success) {
    // Afficher data.reservations et data.users dans la page admin
  } else {
    alert('Accès refusé');
    window.location.href = '/MyStadium/views/connexion.php';
  }
}
