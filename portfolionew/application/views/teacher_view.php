<link rel="stylesheet" href="/portfolionew/css/teacher.css">
<div id="app" data-app>
  <div class="teacher">
    <p> Авторизация преподавателя по имени</p>
  <v-autocomplete 
  :items="teacher"
  v-model="teacherInfo"
  label="Выбрать преподавателя"
  item-text="name"
  item-value="id"
  filled
  placeholder="Начните вводить ваше имя"
  v-on:change="redirect"
>
              <template v-slot:item="data">
                <template>
                  <v-list-item-content>
                    <v-list-item-title>{{data.item.name}}</v-list-item-title>
                    <v-list-item-subtitle> {{data.item.position}} </v-list-item-subtitle>
                  </v-list-item-content>
                </template>
              </template>
</v-autocomplete>
</div>
</div>


<script src="/portfolionew/js/teacher.js"></script>