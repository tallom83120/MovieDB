<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin = "anonymous">
  <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity = "sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin = "anonymous">
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script><!-- script d'insertion du cdn de vue !-->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script><!-- script d'insertion du cdn d'axios !-->
  <link rel="stylesheet" href="CSS/MovieDB.css">
  <title>MovieDB</title>
</head>
<body>

  <div id="app">
    <div class="search">
        <form v-on:submit.prevent="fetchData(saisie)">
          <div class="form-group">
           <input type="text" v-model.string="saisie" placeholder="  Rechercher un film">
           <label for=""></label>
          </div>
          <div>
         <button type="submit">Ok</button>
       </div>
     </form>
   </div>
   <section v-if="errored"> <!-- si erreur detectée, insertion d'un message !-->
     <p>{{ error_message }}</p>
   </section>
      <div v-show="loaded" class="loader"></div>
      <ul>
          <li v-for="donnee in donnees.results">
            <a v-bind:href="'detailmdb.php?id=' + donnee.id">
              <img :src="imageUrl + donnee.poster_path" alt="donnee.title">
              <section>
                  <h2>{{ donnee.original_title }}</h2>
                  <p>{{ donnee.overview }}</p>
              </section>
              </a>
          </li><!--
      --></ul>
  </div>
  <div style="text-align: center"><em>This product uses the TMDb API but is not endorsed or certified by TMDb.</em></div>
  <script src="js/MovieDB.js">
</script>

</body>
</html>
