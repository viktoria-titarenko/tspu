<div id="app" data-app>
    <h3 style="margin-left: 305px;">Профиль преподавателя</h3> 
<div class="first" style="display: flex; margin-top: 20px;">
    <img style="height: 150px; margin-left:50px; margin-right: 100px; margin-top: 10px;" :src = "teachers[0].foto">
    <div class="teacherTable">
        <table class="table">
            <tr >
                <tr v-for="information in informations"> <td> 
                    Фамилия, имя, отчество (при наличии)</td><td>{{information.name}}</td></tr>
                <tr v-for="information in informations"> <td> 
                    Должность</td><td>{{information.position}}</td></tr>
                    
        </table>
    </div>
</div>
</div>

<script src="/portfolionew/js/profileteacher.js"></script>