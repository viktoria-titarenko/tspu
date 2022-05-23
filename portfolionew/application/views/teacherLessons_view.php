<link rel="stylesheet" href="/portfolionew/css/lessons.css">
<div id="app" data-app>
    <div class="lessons">
        <p class="block1"> Выбор предмета для просмотра файлов</p>
        <div class="button _flexWrap _flexGap10">
            <button type="button" v-for="teacherLesson of teacherLessons" :data-id="teacherLesson.id" class="btn btn-outline-primary _flexChild4Row"  @click="redirect">{{teacherLesson.name}}</button>   
        </div>
    </div>
</div>
<script src="/portfolionew/js/teacherLessons.js"></script>