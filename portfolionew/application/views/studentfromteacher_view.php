<link rel="stylesheet" href="/portfolionew/css/studentfromteacher.css">
<div id="app" data-app>
    <div class="students">
        <p> Выбор студента для просмотра файлов</p>
        <div class="button _flexWrap _flexGap10">
            <button type="button" v-for="student of students" :data-id="student.id" class="btn btn-outline-primary _flexChild4Row"  @click="redirect">{{student.name}}</button>   
        </div>
    </div>
</div>
<script src="/portfolionew/js/studentfromteacher.js"></script>