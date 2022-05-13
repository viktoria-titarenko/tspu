<link rel="stylesheet" href="/portfolionew/css/files.css">
<div id="app" data-app>
    <div class="files">
    <p>Загрузка и просмотр загруженных ранее файлов</p>
</div>
    <div class="flexJustifyBottom">
        <div style="width: 693px">
            <v-file-input v-model="file" s
        @change="saveFile()"
          label="Выберите файл"
          width="30"
        ></v-file-input>
        </div>
        <v-btn style="margin-left: 50px; margin-bottom: 20px;" @click="send_file()">Загрузить файл</v-btn>
</div>
        <div class="tableFile">
            <table class="table table-hover " style="border-color: white;">
                <th scope="col">Название файла</th>
                <th scope="col">Дата загрузки</th>
                <th scope="col">Оценка</th>
                <tr v-for="file in files">
                    <td>{{ file.name }}</td>
                    <td>{{ file.date }}</td>
                    <td>{{ file.description }}</td>
                    <td class="cellRightAlign">
                        <a :href="'/portfolionew/files/download?id=' + file.id" style="text-decoration: none;">
                        <button class="btn btn-primary"  >Скачать</button></a>
                    </td>
                </tr>
            </table>
        </div>
  
</div>

<script src="/portfolionew/js/files.js"></script>