<template lang="html">

  <div class="row">

    <div class="col-md-8 col-md-offset-2">

      <div class="clearfix" style="background-color: white; padding: 5px;margin: 10px; border: 1px solid gray">
        <h3>Novo Filme</h3>
        <form class="form-group">

          <label>Filme:</label>
          <input class="form-control" type="text" name="" value="">
          <label>Diretor:</label>
          <select class="form-control" name="">
            <option v-for="director in directors" :value="director.id"> {{ director.name }} </option>
          </select>
          <label>Ano de Lançamento:</label>
          <input class="form-control" type="text" name="" value="">
          <label>Elenco:</label>
          <input class="form-control" type="text" name="" value="">
          <label>Classificação Indicativa:</label>
          <select class="form-control" name="">
            <option value=""> </option>
          </select>
          <label>Categoria:</label>
          <select class="form-control" name="">
            <option v-for="category in categories" :value="category.id"> {{ category.category }} </option>
          </select>
        </form>

        <h1 style="background-color:#2ab27b;color:#fff;padding:5px">Movies</h1>
          <div v-if="movies">
            <div v-for="movie in movies" class="clearfix"
             style="background-color: white; border-bottom: 1px solid gray; margin-bottom: 5px ">
              <h3>Filme:{{ movie.name }}</h3>
              <p>
                Diretor:{{ movie.director }} <br/>
                Ano de Lançamento: {{ movie.release_year }} <br/>
                Elenco: {{ movie.star_list }} <br/>
                Classificação Indicativa: {{ movie.classId }} <br/>
                Categoria:{{ movie.category }} <br/>
              </p>
          </div>

          </div>


        </div>
      </div>
  </div>

</template>

<script>

export default {
  data(){
    return{
      movie: {
        name: '',
        release_year: '',
        star_list: '',
        classId: '',
        director: '',
        category: ''
      },
      director:{
        id: '',
        name: '',
        description: ''
      },
      category:{
        id: '',
        category: '',
        description: ''
      },
      movies: [],
      directors: [],
      categories: []
    }
  },
  mounted(){
    this.getMovies();
    this.getDirectors();
    this.getCategories();
  },
  methods:{
    getMovies(){
      axios.get('/movies')
      .then(response =>{
        this.movies = response.data.movies;
      });
    },
    getDirectors(){
      axios.get('/directors')
      .then(response =>{
        this.directors = response.data.directors;
      });
    },
    getCategories(){
      axios.get("/categories")
      .then(response =>{
        this.categories = response.data.categories;
      });
    },

    registerNewMovie(){
      axios.post('/movie', {
        name: movie.name,
        release_year: movie.release_year,
        star_list: movie.star_list,
        classId: movie.classId,
        director: movie.director,
        category: movie.category
               })
                   .then(response => {

                       this.movies.push(response.data.movie);



                   });
    }
  }
}
</script>

<style lang="css">
</style>
