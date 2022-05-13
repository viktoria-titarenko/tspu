<link rel="stylesheet" href="/portfolionew/css/authorization.css">
<div id="app" data-app>
    <div class="aut">
        <v-dialog v-model="dialog" width="400">
            <v-card style="text-align:center; ">
                <v-card-title class="text-h5 black lighten-10" style="justify-content: center;" >
                    ОШИБКА
                </v-card-title>

                <v-card-text style="color: black; font-size: 17px; margin-top: 18px;">
                    {{errorText}}
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <button type="button" class="btn btn-primary" text @click="dialog = false" >Закрыть</button>
                </v-card-actions>
            </v-card>
        </v-dialog>
    
        <div class="mb-3" >
          <label for="inputlogin" class="form-label">login</label>
          <input 
          v-on:keyup.enter="enter"
          v-model="loginstudent"
          type="login" class="form-control" id="inputlogin" >
        </div>
        <div class="mb-3">
          <label for="inputPassword" class="form-label">Password</label>
          <input
          v-on:keyup.enter="enter"
          v-model="passwordstudent"
          type="password" class="form-control" id="inputPassword">
        </div>
    
        <button @click="getstudent" type="submit" class="btn btn-primary">Вход</button>     
    
</div>
</div>
<script src="/portfolionew/js/authorization.js"></script>