<link rel="stylesheet" href="/portfolionew/css/group.css">
<div id="app" data-app>
    <div class="group">
        <p> Выбор группы для просмотра файлов</p>
        <div class="button _flexWrap _flexGap10">
            <button type="button" :data-id="group.id" class="btn btn-outline-primary _flexChild4Row" v-for="group of groups" @click="redirect">{{group.groupnumber}}</button>   
        </div>
    </div>
</div>
<script src="/portfolionew/js/group.js"></script>