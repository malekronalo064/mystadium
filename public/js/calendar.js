<!-- public/js/calendar.js : calendrier interactif simple -->
document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');
  if (!calendarEl) return;
  fetch('/MyStadium/controller/calendar_events.php')
    .then(res => res.json())
    .then(events => {
      let html = '<table class="calendar-table"><tr>';
      for (let i = 0; i < events.length; i++) {
        html += '<td class="calendar-cell' + (events[i].reserved ? ' reserved' : '') + '" data-date="' + events[i].date + '">' +
          events[i].date + (events[i].reserved ? '<br><span class="reserved-label">Réservé</span>' : '') + '</td>';
        if ((i + 1) % 7 === 0) html += '</tr><tr>';
      }
      html += '</tr></table>';
      calendarEl.innerHTML = html;
      document.querySelectorAll('.calendar-cell:not(.reserved)').forEach(cell => {
        cell.addEventListener('click', function () {
          document.getElementById('res_date').value = this.dataset.date;
        });
      });
    });
});
