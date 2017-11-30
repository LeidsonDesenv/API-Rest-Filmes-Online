<template lang="html">

  <div class="row">

    <div class="col-md-8 col-md-offset-2">

      <div class="clearfix" style="background-color: white; padding: 5px;margin: 10px; border: 1px solid gray">
        <h3>Novo Filme</h3>
        <form class="form-group" @submit.prevent="registerNewMovie()">

          <label>Filme:</label>
          <input class="form-control" type="text" name="name" v-model="movie.name" value="">
          <label>Diretor:</label>
          <select class="form-control" name="director" v-model="movie.director_id">
            <option v-for="director in directors" :value="director.id"> {{ director.name }} </option>
          </select>
          <label>Ano de Lançamento:</label>
          <input class="form-control" type="text" name="release_year" v-model="movie.release_year">
          <label>Elenco:</label>
          <input class="form-control" type="text" name="star_list" v-model="movie.star_list">
          <label>Classificação Indicativa:</label>
          <!-- 'Livre' , '10' , '12', '14', '16' , '18' -->
          <select class="form-control" name="classId" v-model="movie.classId">
            <option value="Livre">Livre </option>
            <option value="10">10 </option>
            <option value="12">12 </option>
            <option value="14">14 </option>
            <option value="16">16 </option>
            <option value="18">18 </option>
          </select>
          <label>Categoria:</label>
          <select class="form-control" name="category" v-model="movie.category_id">
            <option v-for="category in categories" :value="category.id"> {{ category.category }} </option>
          </select>
          <button class="btn btn-primary" style="margin-top:5px" type="submit" name="cadastrar">Cadastrar</button>
        </form>

        <h1 style="background-color:#2ab27b;color:#fff;padding:5px">Movies</h1>
          <div v-if="movies">
            <div v-for="( movie, index ) in movies" class="clearfix"
             style="background-color: white; border-bottom: 1px solid gray; margin-bottom: 5px ">
              <h3>Filme:{{ movie.name }}</h3>
              <p>
                Diretor:{{ movie.director }} <br/>
                Ano de Lançamento: {{ movie.release_year }} <br/>
                Elenco: {{ movie.star_list }} <br/>
                Classificação Indicativa: {{ movie.classId }} <br/>
                Categoria:{{ movie.category }} <br/>
                <div class="pull-right btn btn-group">
                  <button class="btn btn-warning" type="button" @click="editModal(index)" name="button">Editar</button>
                  <button class="btn btn-default" type="button" @click="delMovie(index, movie.id)">Deletar</button>
                </div>

              </p>
          </div>

          </div>


        </div>
      </div>

      <div class="modal fade" tabindex="-1" role="dialog" id="editform">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Editar Filme</h4>
            </div>
            <div class="modal-body">
              <form class="form-group">
                <label>Filme:</label>
                <input class="form-control" type="text"  v-model="movie_for_update.name" >
                <label>Diretor:</label>
                <select class="form-control" name="director" v-model="movie_for_update.director_id">
                  <option v-for="director in directors" :value="director.id"> {{ director.name }} </option>
                </select>
                <label>Ano de Lançamento:</label>
                <input class="form-control" type="text" name="release_year" v-model="movie_for_update.release_year">
                <label>Elenco:</label>
                <input class="form-control" type="text" name="star_list" v-model="movie_for_update.star_list">
                <label>Classificação Indicativa:</label>
                <!-- 'Livre' , '10' , '12', '14', '16' , '18' -->
                <select class="form-control" name="classId" v-model="movie_for_update.classId">
                  <option value="Livre">Livre </option>
                  <option value="10">10 </option>
                  <option value="12">12 </option>
                  <option value="14">14 </option>
                  <option value="16">16 </option>
                  <option value="18">18 </option>
                </select>
                <label>Categoria:</label>
                <select class="form-control" name="category" v-model="movie_for_update.category_id">
                  <option v-for="category in categories" :value="category.id"> {{ category.category }} </option>
                </select>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-primary" @click="updateMovie(movie_for_update.id)">Salvar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
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
        director_id: '',
        category: '',
        category_id: ''
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
      categories: [],
      movie_for_update: {}
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
      var vm = this;
      var movie = vm.movie;
      axios.post('/movies',  movie )
                   .then(response => {
                     this.movies.push( response.data.movie);
                   });
    },
    editModal(index){
      this.movie_for_update = this.movies[index];
      $("#editform").modal("show");
    },
    updateMovie(id){
      var vm = this;
      var updatemovie = vm.movie_for_update;
      axios.put('/movies/'+ id , updatemovie  )
              .then(response => {
                alert("Dados Atualizados com sucesso");
                $("#editform").modal("hide");
              });

    },
    delMovie(index, id){
      if(confirm("Deseja mesmo deletar ?")){
        axios.delete('/movies/'+ id)
                      .then(response =>{
                        alert("Filme deletado com sucesso!");
                        this.movies.splice(index, 1);
                      });
      }else {
        return false;
      }
    }
  }
}
</script>

<style lang="css">
</style>
