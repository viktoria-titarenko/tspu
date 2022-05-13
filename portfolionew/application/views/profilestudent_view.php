<div id="app" data-app>
    <h3 style="margin-left: 305px;">Профиль обучающегося</h3> 
<div class="first" style="display: flex; margin-top: 20px;">
    <img style="height: 150px; margin-left:50px; margin-right: 100px; margin-top: 10px;" :src = "students[0].foto">
    <div class="teacherTable">
        <table class="table">
                <tr v-for="information in informations">
                     <td> 
                    Фамилия, имя, отчество (при наличии)</td>
                    <td>{{information.name}}</td>
                </tr>
                    <tr v-for="information in informations"> 
                        <td>  Факультет</td>
                        <td>{{information.faculty}}</td>
                    </tr>
                    <tr v-for="information in informations"> 
                        <td>  Группа</td>
                        <td>{{information.groupnumber}}</td>
                    </tr>
                    <tr v-for="information in informations"> 
                        <td> Курс</td>
                        <td>{{information.course}}</td>
                    </tr>
                    <tr v-for="information in informations">
                         <td>  Направление подготовки</td>
                         <td>{{information.direction}}</td>
                    </tr>
                    
        </table>
    </div>
</div>
</div>

<script src="/portfolionew/js/profilestudent.js"></script>