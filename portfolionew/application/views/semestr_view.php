
<link rel="stylesheet" href="/portfolionew/css/semestr.css">
<div id="app" data-app>
  <!-- <div class="course">
    <p> Текущий семестр </p>
    <button
        class="btn btn-outline-primary _flexChild4Row">
          {{coursee}} курс
        </button>
  </div> -->
    <div class="semestr">
        <p class="block1"> Выбор семестра для загрузки файлов </p>
    </div> 
   
    <div class="_flexWrap _flexGap10">
    <v-menu offset-y v-for="course in coursesCount">
      <template v-slot:activator="{ on, attrs }">
        <button
          v-bind="attrs"
          v-on="on"
        class="btn btn-outline-primary _flexChild4Row">
          {{course}} курс
        </button>
      </template>
      <v-list class="_flexWrap _flexGap10">
        <v-list-item
        >
        <div class="_flexWrap _flexGap10">
            <button type="button" :data-id="course * 2 - 1" class="btn btn-outline-primary _flexChild4Row" @click="redirect">{{course * 2 - 1}} семестр</button>
            <button type="button" :data-id="course * 2" class="btn btn-outline-primary _flexChild4Row" @click="redirect">{{course * 2}} семестр</button>
        </div>
        </v-list-item>
      </v-list>
    </v-menu>
</div>
    <!-- <div class="_flexWrap _flexGap10">
        <button type="button" :data-id="semestr" class="btn btn-outline-primary _flexChild4Row" v-for="semestr in semestrs" @click="redirect">Семестр {{semestr}}</button>
    </div> -->
</div>
<script src="/portfolionew/js/semestr.js"></script>