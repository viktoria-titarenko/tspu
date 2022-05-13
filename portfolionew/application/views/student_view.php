<link rel="stylesheet" href="/portfolionew/css/student.css">
<div id="app" data-app>
  <div class="students">
    <p> Авторизация студента по имени и номеру группы</p>
  <v-autocomplete 
  :items="students"
  v-model="studentInfo"
  label="Выбрать студента"
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
                    <v-list-item-subtitle>{{data.item.group}} группа</v-list-item-subtitle>
                  </v-list-item-content>
                </template>
              </template>
</v-autocomplete>
</div>
</div>
</div>

<script src="/portfolionew/js/student.js"></script>
