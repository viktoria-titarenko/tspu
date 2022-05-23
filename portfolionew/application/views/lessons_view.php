<link rel="stylesheet" href="/portfolionew/css/lessons.css">
<div id="app" data-app>
    <div class="lessons">
        <p class="block1"> Выбор предмета для загрузки файлов</p>
        <div class="button _flexWrap _flexGap10">
            <button type="button" :data-id="lesson.id" class="btn btn-outline-primary _flexChild4Row" v-for="lesson of lessons" @click="redirect">{{lesson.name}}</button>   
        </div>
    </div>
</div>
<script src="/portfolionew/js/lessons.js"></script>