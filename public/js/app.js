// JS dynamique pour réservation, login, etc.

// Exemple : Afficher les terrains dynamiquement
async function chargerTerrains() {
  const res = await fetch('/MyStadium/api/terrains.php');
  const terrains = await res.json();
  const list = document.getElementById('liste-terrains');
  if(list) {
    list.innerHTML = '';
    terrains.forEach(t => {
      const div = document.createElement('div');
      div.className = 'terrain-card';
      div.innerHTML = `<h3>${t.name}</h3><p>${t.description}</p><img src='/MyStadium/public/img/${t.image}' style='width:120px;'>`;
      list.appendChild(div);
    });
  }
}

// Exemple : Réservation AJAX
async function reserver() {
  const terrain_id = document.getElementById('terrain').value;
  const res_date = document.getElementById('date').value;
  const res_slot = document.getElementById('slot').value;
  const res = await fetch('/MyStadium/api/reservations.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({terrain_id, res_date, res_slot})
  });
  const result = await res.json();
  alert(result.success ? 'Réservation confirmée !' : 'Erreur : ' + result.message);
}

// Appel automatique sur certaines pages
if(document.getElementById('liste-terrains')) chargerTerrains();
