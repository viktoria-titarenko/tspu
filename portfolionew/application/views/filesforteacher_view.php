<link rel="stylesheet" href="/portfolionew/css/files.css">
<div id="app" data-app>
    <div class="files">
    <p class="block1">Просмотр загруженных файлов</p>
    </div>
        <div class="tableFile">
            <table class="table table-hover " style="border-color: white;">
                <th scope="col">Название файла</th>
                <th scope="col">Дата загрузки</th>
                <th scope="col">Выбрать оценку</th>
                <th scope="col">Выбранная оценка</th>
                <tr v-for="file in files">
                    <td>{{ file.name }}</td>
                    <td>{{ file.date }}</td>
                    <td ><div class="btn-group" >
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" >
                          Выбрать оценку
                        </button>
                        <ul class="dropdown-menu"  >
                          <li v-for="mark in marks" v-on:click="sendmark" >
                              <a v-on:click="redirect" class="dropdown-item" :mark-id="mark.id" :file-id ="file.id" >{{mark.mark}}</a></li>
                        </ul>
                      </div>
                    </td>
                  <td > {{file.description}} </td>
                    <td  >
                        <a :href="'/portfolionew/files/download?id=' + file.id" style="text-decoration: none;">
                        <button class="btn btn-primary" >Скачать</button></a>
                    </td>
                </tr>
            </table>
        </div>
</div>
<script src="/portfolionew/js/filesforteacher.js"></script>