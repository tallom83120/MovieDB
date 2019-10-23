new Vue({
el: "#app",
data: {
    donnees: [],
    saisie: null,
    baseUrl: 'https://api.themoviedb.org/3',
    apiKey: 'f33cd318f5135dba306176c13104506a',
    imageUrl: 'https://image.tmdb.org/t/p/w342',
    loaded: true,
    errored: false,
    error_message: ''

},
created: function() {
  this.fetchData();
},
mounted() {
  axios
      .get(this.baseUrl + '/discover/movie?api_key=' + this.apiKey + '&query=' + this.saisie)
      .then(response => {
          this.donnees = response.data;
          this.loaded = false;
      });
},
methods: {
    // Fetch data from the API
    fetchData: function(saisie) {
    axios
        .get(this.baseUrl + '/search/movie?api_key=' + this.apiKey + '&query=' + this.saisie)
        .then(response => {
            this.donnees = response.data;
            this.loaded = false;
        })
        .catch(error => {
          this.errored = true,
        this.error_message = 'Nous sommes dÃ©solÃ©s, \'${saisie}\' n\'a pas Ã©tÃ© trouvÃ©. Tapez une nouvelle recherche'
      })
      if(this.donnees == null) {
        this.errored = true,
      this.error_message = 'Nous sommes dÃ©solÃ©s, \'${saisie}\' n\'a pas Ã©tÃ© trouvÃ©. Tapez une nouvelle recherche'
    };
  }
}
});
 //http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=avenger*/*/