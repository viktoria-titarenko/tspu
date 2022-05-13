
<link rel="stylesheet" href="/portfolionew/css/progress.css">
<div id="app" data-app> 
    <div class="btn-group">
        <v-menu offset-y v-for="course in coursesCount">
          <template v-slot:activator="{ on, attrs }">
            <button
              :course = "course"
              v-bind="attrs"
              v-on="on"
              class="btn btn-primary active" aria-current="page"
              @click="getmarks">
              {{course}} курс
            </button>
          </template>
        </v-menu>
    </div>
<div class="tableFile" >
            <table class="table table-bordered mytable"  style="border-color: black;" v-if = "table1">
                <th style="text-align: center;" scope="col">Наименование дисциплины</th>
                <th  style="text-align: center;"scope="col">Осенний семестр</th>
                <tr class="mytable" v-for="lesson in lessonsemester1">
                    <td class="td"> <ins>{{ lesson.discipline }}</ins></td>
                    <td class="tdd" v-bind:class="{ red:(lesson.mark_name == 'не явился' || (lesson.mark_name == 'не зачтено')), green: (lesson.mark_name == 'отлично' || (lesson.mark_name == 'хорошо') || (lesson.mark_name == 'удовлетв.') || (lesson.mark_name == 'зачтено')) }">{{lesson.marks}} <ins>{{ lesson.mark_name }}</ins></td>
                   
                </tr>
            </table>
        </div>
        <div class="table2" >
            <table class="table table-bordered mytable"  style="border-color: black;" v-if = "table2">
                <th style="text-align: center;" scope="col">Наименование дисциплины</th>
                <th  style="text-align: center;"scope="col">Весенний семестр</th>
                <tr class="mytable" v-for="lesson in lessonsemester2">
                    <td class="td"><ins>{{ lesson.discipline }}</ins></td>
                    <td class="tdd" v-bind:class="{ red:((lesson.mark_name == 'не явился') || (lesson.mark_name == 'не зачтено')), green: (lesson.mark_name == 'отлично' || (lesson.mark_name == 'хорошо') || (lesson.mark_name == 'удовлетв.') || (lesson.mark_name == 'зачтено')) }">{{lesson.marks}} <ins>{{ lesson.mark_name }}</ins></td>
                   
                </tr>
            </table>
        </div>
        <div class="ps" style="display: flex; flex-direction: row; margin-top: 15px; margin-left: 150px;" v-if = "table1">
            <p class="redp">Дисциплина сдана</p>
            <p class="greenp">Дисциплина не сдана</p>
        </div>
</div>


<script src="/portfolionew/js/progress.js"></script>