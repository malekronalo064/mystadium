<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
	<title>Boutique — MyStadium</title>
	<!-- Style global géré par index.css -->
</head>

<body>
<?php include(__DIR__ . "/header.php")?>
<div id="vue-store" class="login-bg" style="background: #111 url('/MyStadium/public/img/shoplogo.png') center/contain no-repeat; min-height: 100vh;">
  <el-card class="card" style="max-width: 900px; width: 100%; margin: 48px auto 32px auto; text-align: center; background: #181818; color: #fff; box-shadow:0 8px 32px #0004; border-radius:18px;">
    <h1 class="login-title" style="font-size:2.3em; color:#fff; font-family:'Montserrat',Arial,sans-serif; font-weight:900; text-transform:uppercase; margin-bottom: 18px;">Boutique officielle</h1>
    <div style="display:flex;flex-wrap:wrap;gap:32px;justify-content:center;align-items:stretch;">
      <el-card v-for="p in products" :key="p.name" style="flex:1 1 220px;min-width:200px;max-width:260px;background:#222;border-radius:12px;padding:24px 12px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">
        <img :src="p.img" :alt="p.name" style="width:120px;border-radius:8px;box-shadow:0 2px 8px #3bb54a22;"/>
        <div style="font-weight:900;font-size:1.1em;margin-top:8px;text-transform:uppercase;">{{ p.name }}</div>
        <div style="color:#3bb54a;font-weight:900;">{{ p.price }}</div>
        <el-button type="success" plain style="margin-top:10px;" @click="addToCart(p)">Ajouter au panier</el-button>
      </el-card>
    </div>
    <div style="margin-top:32px;">
      <a href="/MyStadium/views/index.php" class="btn-main" style="font-size:1.1em; background:#111; color:#3bb54a; border:2px solid #3bb54a; font-weight:900;">Retour à l'accueil</a>
    </div>
    <el-alert v-if="feedback" :title="feedback" :type="feedbackType" show-icon style="margin-top:16px;"></el-alert>
  </el-card>
</div>
<?php include(__DIR__ . "/footer.php")?>
<script>
const { createApp } = Vue;
createApp({
	data() {
		return {
			products: [
				{ name: 'Maillot MyStadium', img: '/MyStadium/public/img/maillot.jpg', price: '29,99€' },
				{ name: 'Ballon officiel', img: '/MyStadium/public/img/ballon.jpg', price: '19,99€' },
				{ name: 'Gourde MyStadium', img: '/MyStadium/public/img/gourde.jpg', price: '9,99€' }
			],
			feedback: '',
			feedbackType: 'success'
		};
	},
	methods: {
		addToCart(product) {
			this.feedback = `${product.name} ajouté au panier !`;
			this.feedbackType = 'success';
			setTimeout(()=>this.feedback='', 2000);
		}
	}
}).use(ElementPlus).mount('#vue-store');
</script>
</body>
</html>
