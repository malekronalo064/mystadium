<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Réserver un terrain — MyStadium</title>
</head>
<body>
<?php include(__DIR__ . "/header.php")?>
<div class="login-bg" style="background: #111 url('/MyStadium/public/img/reservform.jpg') center/cover no-repeat; min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
  <section class="card" style="max-width: 480px; width: 100%; margin: 48px 0; text-align: center; background: #181818; color: #fff; box-shadow:0 8px 32px #0004; border-radius:18px;">
    <h1 class="login-title" style="font-size:2.2em; color:#3bb54a; font-family:'Montserrat',Arial,sans-serif; font-weight:900; text-transform:uppercase; margin-bottom: 18px;">Réserver un terrain</h1>
    <div id="vue-reservation">
      <el-form :model="form" :rules="rules" ref="reservationForm" label-width="120px" @submit.prevent="onSubmit">
        <el-form-item label="Terrain" prop="terrain">
          <el-select v-model="form.terrain" placeholder="Choisir un terrain">
            <el-option v-for="t in terrains" :key="t.id" :label="t.name" :value="t.id"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="Date" prop="date">
          <el-date-picker v-model="form.date" type="date" placeholder="Choisir une date" format="YYYY-MM-DD" value-format="YYYY-MM-DD" style="width:100%"></el-date-picker>
        </el-form-item>
        <el-form-item label="Créneau" prop="slot">
          <el-select v-model="form.slot" placeholder="Choisir un créneau">
            <el-option v-for="s in slots" :key="s" :label="s" :value="s"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="onSubmit" :loading="loading">Réserver</el-button>
        </el-form-item>
        <el-alert v-if="feedback" :title="feedback" :type="feedbackType" show-icon style="margin-top:16px;"></el-alert>
      </el-form>
    </div>
    <script>
const { createApp } = Vue;
createApp({
  data() {
    return {
      form: { terrain: '', date: '', slot: '' },
      terrains: [],
      slots: [
        '08:00-09:00','09:00-10:00','10:00-11:00','11:00-12:00','12:00-13:00','13:00-14:00','14:00-15:00','15:00-16:00','16:00-17:00','17:00-18:00','18:00-19:00','19:00-20:00','20:00-21:00'
      ],
      rules: {
        terrain: [{ required: true, message: 'Champ obligatoire.', trigger: 'change' }],
        date: [{ required: true, message: 'Champ obligatoire.', trigger: 'change' }],
        slot: [{ required: true, message: 'Champ obligatoire.', trigger: 'change' }]
      },
      loading: false,
      feedback: '',
      feedbackType: 'success'
    };
  },
  mounted() {
    fetch('/MyStadium/api/terrains.php').then(r=>r.json()).then(terrains=>{ this.terrains = terrains; });
  },
  methods: {
    async onSubmit() {
      this.$refs.reservationForm.validate(async valid => {
        if (!valid) return;
        this.loading = true;
        this.feedback = '';
        try {
          const res = await fetch('/MyStadium/api/reservations.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(this.form),
            credentials: 'same-origin'
          });
          const result = await res.json();
          if(result.success) {
            this.feedback = 'Votre réservation a bien été prise en compte.';
            this.feedbackType = 'success';
            setTimeout(()=>window.location.href='/MyStadium/views/mesreservations.php', 1800);
          } else {
            this.feedback = result.message || 'Erreur lors de la réservation.';
            this.feedbackType = 'error';
          }
        } catch (err) {
          this.feedback = 'Erreur réseau.';
          this.feedbackType = 'error';
        }
        this.loading = false;
      });
    }
  }
}).use(ElementPlus).mount('#vue-reservation');
</script>
  </section>
</div>
<?php include(__DIR__ . "/footer.php")?>
</body>
</html>
        </div>
        <div class="form-group">
          <input type="email" required name="email" placeholder="Email" class="input-field" />
        </div>
        <div class="form-group">
          <input type="text" required name="tel" placeholder="Téléphone" class="input-field" />
        </div>
        <div class="form-group">
          <label for="res_date" style="color:#1e5d2d;font-weight:bold;">Date de réservation</label>
          <input type="date" required id="res_date" name="date" min="<?=$mindate?>" class="input-field" />
        </div>
        <div class="form-group">
          <label for="slot" style="color:#1e5d2d;font-weight:bold;">Choix de terrain</label>
          <select name="slot" id="slot" class="input-field">
            <option value="TERRAIN-1">TERRAIN-1</option>
            <option value="TERRAIN-2">TERRAIN-2</option>
            <option value="TERRAIN-3">TERRAIN-3</option>
            <option value="TERRAIN-4">TERRAIN-4</option>
            <option value="TERRAIN-5">TERRAIN-5</option>
            <option value="TERRAIN-6">TERRAIN-6</option>
          </select>
        </div>
        <div class="form-group">
          <label for="amount" style="color:#1e5d2d;font-weight:bold;">Montant (€)</label>
          <input type="number" id="amount" name="amount" class="input-field" min="1" value="10" required />
        </div>
        <button type="submit" class="btn-main">Valider la réservation</button>
        <button id="pay-btn" class="btn-main" style="margin-top:10px;background:#3bb54a;" type="button">Payer en ligne</button>
      </form>
      <script src="https://js.stripe.com/v3/"></script>
      <script src="/MyStadium/public/js/payment.js"></script>
    </div>
  </div>
  <?php include(__DIR__ . "/footer.php")?>
</body>
</html>
